@extends('layouts.app')

@section('title', 'Filtered Movies')

@section('content')
    <h2>Showing genre: {{ $activeGenre ?? 'All' }}</h2>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Genre</th>
                <th>Rating</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($movies as $movie)
                <tr>
                    <td>{{ $movie['title'] }}</td>
                    <td>{{ $movie['genre'] }}</td>
                    <td>{{ $movie['rating'] }}</td>
                    <td>{{ $movie['year'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No movies found for this genre.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('movies.index') }}" class="btn btn-primary mt-3">Back to Movie List</a>
@endsection