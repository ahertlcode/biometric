@extends('layouts.bulma')
@section('title', 'creating new user_type')
@section('sidebar')
@parent
@endsection
@section('content')
<form action="{{ route('user_types.store') }}" class="form container" method="POST" enctype="multipart/form-data">
    @csrf

    <h1 class="title is-3">ADD USER TYPE</h1>
    
    <div class="field">
        <label class="label">User Type </label>
        <div class="control">
            <input id="user_type" name="user_type" class="input @error('user_type') is-invalid @enderror" value="{{ old('user_type') }}" type="text"  required>
            @error('user_type')
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