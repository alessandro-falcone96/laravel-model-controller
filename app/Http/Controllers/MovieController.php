<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    protected $requestValidation = [];

    public function __construct()
    {
        $this->requestValidation = [
            'title' => 'required | string | max:100',
            'director' => 'required | string | max:50',
            'genre' => 'required | string | max:100',
            'duration' => 'required | string | max:25',
            'plot' => 'required | string',
            'year' => 'required'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();

        return view('movies.index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | string | max:100',
            'director' => 'required | string | max:50',
            'genre' => 'required | string | max:100',
            'duration' => 'required | string | max:25',
            'plot' => 'required | string',
            'year' => 'required'
        ]);

        $data = $request->all();

        $movieNew = new Movie();
        $movieNew->title = $data['title'];
        $movieNew->director = $data['director'];
        $movieNew->genre = $data['genre'];
        $movieNew->duration = $data['duration'];
        $movieNew->plot = $data['plot'];
        $movieNew->year = $data['year'];
        // $movieNew->image_cover = $data['image_cover'];

        $movieNew->save();

        return redirect()->route('movies.index', $movieNew)->with('message', 'Il film ?? stato aggiunto');
    }

    /**
     * Display the specified resource.
     *
     * @param  Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {

        return view('movies.show', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', ['movie' => $movie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required | string | max:100',
            'director' => 'required | string | max:50',
            'genre' => 'required | string | max:100',
            'duration' => 'required | string | max:25',
            'plot' => 'required | string',
            'year' => 'required'
        ]);

        $movie->update($request->all());

        return redirect()->route('movies.show', $movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        
        return redirect()->route('movies.index')->with('message', 'Il film ?? stato eliminato');
    }
}
