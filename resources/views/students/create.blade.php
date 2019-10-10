@extends('layouts.bulma')
@section('title', 'creating new student')
@section('sidebar')
@parent
@endsection
@section('content')
<form action="{{ route('students.store') }}" class="form container" method="POST" enctype="multipart/form-data">
    @csrf

    <h1 class="title is-3">ADD STUDENT</h1>
    
    <div class="field">
        <label class="label">Matric Number </label>
        <div class="control">
            <input id="matric_number" name="matric_number" class="input @error('matric_number') is-invalid @enderror" value="{{ old('matric_number') }}" type="text"  required>
            @error('matric_number')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>    
    <div class="field">
        <label class="label">First Name </label>
        <div class="control">
            <input id="first_name" name="first_name" class="input @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" type="text"  required>
            @error('first_name')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>    
    <div class="field">
        <label class="label">Middle Name </label>
        <div class="control">
            <input id="middle_name" name="middle_name" class="input @error('middle_name') is-invalid @enderror" value="{{ old('middle_name') }}" type="text" >
            @error('middle_name')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>    
    <div class="field">
        <label class="label">Last Name </label>
        <div class="control">
            <input id="last_name" name="last_name" class="input @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" type="text"  required>
            @error('last_name')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>    
    <div class="field">
        <label class="label">Level</label>
        <div class="select" style="width:100%;">
            <select class="input @error('level_id') is-invalid @enderror" >
                <option value="-1">Select Level </option>
                @foreach($levels as $level)
                <option value="{{$level->id}}">{{$level->level}}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    <div class="field">
        <label class="label">Department</label>
        <div class="select" style="width:100%;">
            <select class="input @error('department_id') is-invalid @enderror" >
                <option value="-1">Select Department </option>
                @foreach($departments as $department)
                <option value="{{$department->id}}">{{$department->department}}</option>
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