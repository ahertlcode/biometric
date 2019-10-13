@extends('layouts.bulma')
@section('title', 'creating new faculty')
@section('sidebar')
@parent
@endsection
@section('content')
<form action="{{ route('faculties.store') }}" class="form container" method="POST" enctype="multipart/form-data">
    @csrf

    <h1 class="title is-3">ADD FACULTY</h1>
    
    <div class="field">
        <label class="label">Faculty</label>
        <div class="control">
            <input id="faculty" name="faculty" class="input @error('faculty') is-invalid @enderror" value="{{ old('faculty',faculties->faculty) }}" type="text"  required>
            @error('faculty')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="field is-grouped">
        <p class="control">
            <button type="submit" class="button is-primary">
                Submit
            </button>
        </p>
        <p class="control">
            <button type="reset" class="button is-light">
                Clear
            </button>
        </p>
    </div>
</form>
@endsection