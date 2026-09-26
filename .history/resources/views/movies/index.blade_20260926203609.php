@extends('layouts.app')

@section('title', 'Movie List')

@section('content')
    <h2>All Movies</h2>

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
                    <td>
                        <a href="{{ route('movies.show', $movie['id']) }}">{{ $movie['title'] }}</a>
                    </td>
                    <td>{{ $movie['genre'] }}</td>
                    <td>{{ $movie['rating'] }}</td>
                    <td>
                        {{ $movie['year'] }}
                        @if ($movie['year'] >= 2015)
                            <span class="badge bg-primary">New Release</span>
                        @else
                            <span class="badge bg-secondary">Classic</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">There are no movies available yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection