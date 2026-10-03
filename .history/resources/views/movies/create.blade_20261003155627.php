@extends('layouts.app')

@section('title', 'Add Movie')

@section('content')
    <h2>Add a New Movie</h2>

    <form method="POST" action="{{ route('movies.store') }}">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price"
                   class="form-control @error('price') is-invalid @enderror"
                   value="{{ old('price') }}" step="1" min="1">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <select name="genre" id="genre"
                    class="form-select @error('genre') is-invalid @enderror">
                <option value="">-- Select genre --</option>
                <option value="Action"  @selected(old('genre') === 'Action')>Action</option>
                <option value="Comedy"  @selected(old('genre') === 'Comedy')>Comedy</option>
                <option value="Fantasy" @selected(old('genre') === 'Fantasy')>Fantasy</option>
            </select>
            @error('genre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" name="rating" id="rating"
                   class="form-control @error('rating') is-invalid @enderror"
                   value="{{ old('rating') }}" step="0.1" min="0" max="10">
            @error('rating')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" id="year"
                   class="form-control @error('year') is-invalid @enderror"
                   value="{{ old('year') }}" min="1900" max="2030">
            @error('year')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Movie</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection