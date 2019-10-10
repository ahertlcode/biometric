@extends('layouts.bulma')
@section('title', 'Editing Course')
@section('sidebar')
@parent
@endsection
@section('content')
<form action="{{ route('courses.update',$course->id) }}" class="form container" method="PUT" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <h1 class="title is-3">EDIT COURSE</h1>
    
    <div class="field">
        <label class="label">Course Code </label>
        <div class="control">
            <input id="course_code" name="course_code" class="input @error('course_code') is-invalid @enderror" value="{{ old('course_code') }}" type="text"  required>
            @error('course_code')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>    
    <div class="field">
        <label class="label">Course Title </label>
        <div class="control">
            <input id="course_title" name="course_title" class="input @error('course_title') is-invalid @enderror" value="{{ old('course_title') }}" type="text"  required>
            @error('course_title')
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