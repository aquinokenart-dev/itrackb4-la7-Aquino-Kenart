@extends('layouts.app')

@section('title', 'Movie List')

@section('content')
    @php

        $keepGenre = $genre === 'all' ? null : $genre;
        $keepYear  = $year  === 'all' ? null : $year;
    @endphp

    <h2>All Movies</h2>

    {{-- B5: say which filters are active --}}
    <p class="mb-3">
        Active filters:
        @if ($genre === 'all' && $year === 'all')
            <span class="text-muted">None (showing everything)</span>
        @else
            @if ($genre !== 'all')
                <span class="badge bg-info text-dark">Genre: {{ $genre }}</span>
            @endif
            @if ($year !== 'all')
                <span class="badge bg-info text-dark">Year: {{ $year }}</span>
            @endif
        @endif
        <span class="ms-2 text-muted">({{ count($movies) }} {{ count($movies) === 1 ? 'movie' : 'movies' }})</span>
    </p>


    <div class="mb-2">
        <strong>Genre:</strong>
        <a href="{{ route('movies.index', ['year' => $keepYear]) }}"
           class="btn btn-sm {{ $genre === 'all' ? 'btn-primary' : 'btn-outline-primary' }}">All</a>
        @foreach ($genres as $g)
            <a href="{{ route('movies.index', ['genre' => $g, 'year' => $keepYear]) }}"
               class="btn btn-sm {{ $genre === $g ? 'btn-primary' : 'btn-outline-primary' }}">{{ $g }}</a>
        @endforeach
    </div>

    <div class="mb-3">
        <strong>Year:</strong>
        <a href="{{ route('movies.index', ['genre' => $keepGenre]) }}"
           class="btn btn-sm {{ $year === 'all' ? 'btn-primary' : 'btn-outline-primary' }}">All</a>
        @foreach ($years as $y)
            <a href="{{ route('movies.index', ['genre' => $keepGenre, 'year' => $y]) }}"
               class="btn btn-sm {{ $year === (string) $y ? 'btn-primary' : 'btn-outline-primary' }}">{{ $y }}</a>
        @endforeach

        {{-- B3: clear both at once --}}
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
                    <td colspan="5">There are no movies available for these filters.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection