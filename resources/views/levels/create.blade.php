@extends('layouts.bulma')
@section('title', 'creating new level')
@section('sidebar')
@parent
@endsection
@section('content')
<form action="{{ route('levels.store') }}" class="form container" method="POST" enctype="multipart/form-data">
    @csrf

    <h1 class="title is-3">ADD LEVEL</h1>
    
    <div class="field">
        <label class="label">Level</label>
        <div class="control">
            <input id="level" name="level" class="input @error('level') is-invalid @enderror" value="{{ old('level', $level->level ?? '') }}" type="text"  required>
            @error('level')
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