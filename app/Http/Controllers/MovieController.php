<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\User;

class MovieController extends Controller
{
    
    public function index() {

        $search = request('search');

        if($search) {

            $movies = Movie::where([
                ['name', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $movies = Movie::all();
        }        
    
        return view('welcome',['movies' => $movies, 'search' => $search]);

    }

    public function create() {
        return view('movies.create');
    }

    public function store(Request $request) {

        $movie = new Movie;

        $movie->name = $request->name;
        $movie->genres = $request->genres;
        $movie->premierYear = $request->premierYear;
        $movie->trailer = $request->trailer;

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/movies'), $imageName);

            $movie->image = $imageName;

        }

        $user = auth()->user();
        $movie->user_id = $user->id;

        $movie->save();

        return redirect('/')->with('msg', 'Filme criado com sucesso!');

    }

    public function show($id) {

        $movie = Movie::findOrFail($id);

        $movieOwner = User::where('id', $movie->user_id)->first()->toArray();

        return view('movies.show', ['movie' => $movie, 'movieOwner' => $movieOwner]);
        
    }

    public function dashboard() {

        
        $user = auth()->user();

        $movies = $user->movies;


        return view('movies.dashboard', 
            ['movies' => $movies]
        );

    }

    public function destroy($id) {

        Movie::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Filme excluído com sucesso!');

    }

    public function edit($id) {

        $user = auth()->user();

        $movie = Movie::findOrFail($id);

        if($user->id != $movie->user_id) {
            return redirect('/dashboard');
        }

        return view('movies.edit', ['movie' => $movie]);

    }

    public function update(Request $request) {

        $data = $request->all();

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/movies'), $imageName);

            $data['image'] = $imageName;

        }

        Movie::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Filme editado com sucesso!');

    }

}