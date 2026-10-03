<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) 
    {
        $genre = $request->query('genre', 'all');
        $year  = $request->query('year', 'all');

        $movies = $this->movies();

        if ($genre !== 'all') {
            $movies = array_filter($movies, fn($m) => $m['genre'] === $genre);
        }

        if ($year !== 'all') {
            $movies = array_filter($movies, fn($m) => $m['year'] == $year);
        }

        return view('movies.index', [
            'movies' => $movies,
            'genre'  => $genre,
            'year'   => $year,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title'  => 'required|string|max:100',
        'price'  => 'required|numeric|min:1',
        'genre'  => 'required|in:Action,Comedy,Fantasy',
        'rating' => 'required|numeric|min:0|max:10',
        'year'   => 'required|integer|min:1900|max:2030',
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $movies = $this->movies();

        if (!isset($movies[$id])) {
            abort(404);
        }

        return view('movies.show', ['movie' => $movies[$id]]);
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
        $path = storage_path('app/movies.json');

        return json_decode(file_get_contents($path), true);
    }

    private function saveMovies(array $movies){
        file_put_contents(
            storage_path('app/movies.json'),
            json_encode($movies, JSON_PRETTY_PRINT)
        );
    }

}