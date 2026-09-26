<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) 
    {
        $genre = $request ->query ('genre', 'all');
        $year = $request ->query ('year', 'all');

        $movies = this->getMovies();

        if ($genre !== 'all') {
            $movies = array_filter($movies, fn($m) => ['genre'] === $genre);
        }

        if ($year !== 'all') {
            $movies = array_filter($movies, fn($m) => ['year'] === $year);
        }
        return view('movies.index', [
            'movies' => $movies,
            'genre' => $genre,
            'year' => $year,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       // $movies = $this->movies();
       // if (!isset($movies[$id])) {
           // abort(404);
        //}
        //return view('movies.show', ['movie' => $movies[$id]]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Filter movies by genre.
     */
    public function filter($genre = null)
    {
        $movies = $this->movies();
        if ($genre) {
            $movies = array_filter($movies, function ($movie) use ($genre) {
                return $movie['genre'] === $genre;
            });
        }

        return view('movies.filter', ['movies' => $movies, 'activeGenre' => $genre]);
    }

    /**
     * Movie data helper.
     */
    private function movies()
    {
        return [
            1 => ['id' => 1, 'title' => 'Spider-Man', 'price' => 250, 'genre' => 'Action', 'rating' => 9.1, 'year' => 2002],
            2 => ['id' => 2, 'title' => 'Gagamboy', 'price' => 200, 'genre' => 'Comedy', 'rating' => 8.5, 'year' => 2004],
            3 => ['id' => 3, 'title' => 'Harry Potter', 'price' => 300, 'genre' => 'Fantasy', 'rating' => 9.7, 'year' => 2001],
            4 => ['id' => 4, 'title' => 'Grown Ups', 'price' => 250, 'genre' => 'Comedy', 'rating' => 8.6, 'year' => 2010],
            5 => ['id' => 5, 'title' => 'Grown Ups 2', 'price' => 250, 'genre' => 'Comedy', 'rating' => 8.9, 'year' => 2013],
            6 => ['id' => 6, 'title' => 'Avengers: Endgame', 'price' => 350, 'genre' => 'Action', 'rating' => 9.8, 'year' => 2019],
        ];
    }
}