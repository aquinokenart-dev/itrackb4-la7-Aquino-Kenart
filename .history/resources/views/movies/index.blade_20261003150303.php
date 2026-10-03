@extends('layouts.app')

@section('title', 'Movie List')

@section('content')
    <h2>All Movies</h2>

    <p>
        Active filters:
        @if ($genre === 'all' && $year === 'all')
            None (showing everything)
        @else
            @if ($genre !== 'all')
                <span class="badge bg-info text-dark">Genre: {{ $genre }}</span>
            @endif
            @if ($year !== 'all')
                <span class="badge bg-info text-dark">Year: {{ $year }}</span>
            @endif
        @endif
    </p>

    <div class="mb-3">
    <a href="{{ route('movies.create') }}" class="btn btn-success">Add New Movie</a>
    </div>

    <div class="mb-2">
        <strong>Genre:</strong>
        <a href="{{ route('movies.index', ['genre' => 'Action',  'year' => $year]) }}" class="btn btn-sm btn-outline-primary">Action</a>
        <a href="{{ route('movies.index', ['genre' => 'Comedy',  'year' => $year]) }}" class="btn btn-sm btn-outline-primary">Comedy</a>
        <a href="{{ route('movies.index', ['genre' => 'Fantasy', 'year' => $year]) }}" class="btn btn-sm btn-outline-primary">Fantasy</a>
    </div>

    <div class="mb-3">
        <strong>Year:</strong>
        <a href="{{ route('movies.index', ['genre' => $genre, 'year' => 2001]) }}" class="btn btn-sm btn-outline-primary">2001</a>
        <a href="{{ route('movies.index', ['genre' => $genre, 'year' => 2002]) }}" class="btn btn-sm btn-outline-primary">2002</a>
        <a href="{{ route('movies.index', ['genre' => $genre, 'year' => 2004]) }}" class="btn btn-sm btn-outline-primary">2004</a>
        <a href="{{ route('movies.index', ['genre' => $genre, 'year' => 2010]) }}" class="btn btn-sm btn-outline-primary">2010</a>
        <a href="{{ route('movies.index', ['genre' => $genre, 'year' => 2013]) }}" class="btn btn-sm btn-outline-primary">2013</a>
        <a href="{{ route('movies.index', ['genre' => $genre, 'year' => 2019]) }}" class="btn btn-sm btn-outline-primary">2019</a>

        <a href="{{ route('movies.index') }}" class="btn btn-sm btn-secondary ms-3">Clear all filters</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Rating</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($movies as $movie)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('movies.show', $movie['id']) }}">{{ $movie['title'] }}</a></td>
                    <td>{{ $movie['genre'] }}</td>
                    <td>{{ $movie['rating'] }}</td>
                    <td>{{ $movie['year'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No movies found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection