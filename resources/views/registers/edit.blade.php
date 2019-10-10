@extends('layouts.bulma')
@section('title', 'Editing Register')
@section('sidebar')
@parent
@endsection
@section('content')
<form action="{{ route('registers.update',$register->id) }}" class="form container" method="PUT" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <h1 class="title is-3">EDIT REGISTER</h1>
    
    <div class="field">
        <label class="label">Course</label>
        <div class="select" style="width:100%;">
            <select class="input @error('course_id') is-invalid @enderror" >
                <option value="-1">Select Course </option>
                @foreach($courses as $course)
                <option value="{{$course->id}}">{{$course->course}}</option>
                @endforeach
            </select>
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