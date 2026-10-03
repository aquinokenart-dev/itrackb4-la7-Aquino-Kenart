@extend('layout.app')

@section('title', 'Add Movies')

@section('content')
<div class = "card">
    <div class="card-body">
        <h3 class="card-title">
            Add Movies
        </h3>
        <form method="POST"action="{{ route('movies.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form label" for="name">Title</label>
                <input type="text"name="name" class="form-control" value="{{ old('title') }}">
                @error('title')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

             <div class="mb-3">
                <label class="form label" for="name">Genre</label>
                <select name="genre" class="form-select">
                    <option value="">Select Genre</option>
                    <option value="Action">@selected(old('genre') == 'Action')</option>
                    <option value="Comedy">@selected(old('genre') == 'Comedy')</option>
                    <option value="Fantasy">@selected(old('genre') == 'Fantasy')</option>
                </select>
                @error('genre')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            
             <div class="mb-3">
                <label class="form label" for="name">Rating</label>
                <input type="text"name="name" class="form-control" value="{{ old('rating') }}">
                @error('rating')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

             <div class="mb-3">
                <label class="form label" for="name">Year</label>
                <input type="text"name="name" class="form-control" value="{{ old('year') }}">
                @error('year')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        
        </form>
    </div>

</div>
