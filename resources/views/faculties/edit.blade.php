@extends('layouts.bulma')
@section('title', 'Editing Faculty')
@section('sidebar')
@parent
@endsection
@section('content')
<form action="{{ route('faculties.update',$faculty->id) }}" class="form container" method="PUT" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <h1 class="title is-3">EDIT FACULTY</h1>
    
    <div class="field">
        <label class="label">Faculty Name </label>
        <div class="control">
            <input id="faculty_name" name="faculty_name" class="input @error('faculty_name') is-invalid @enderror" value="{{ old('faculty_name') }}" type="text"  required>
            @error('faculty_name')
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