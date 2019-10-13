@extends('layouts.bulma')
@section('title', 'creating new lecturer')
@section('sidebar')
@parent
@endsection
@section('content')
<form action="{{ route('lecturers.store') }}" class="form container" method="POST" enctype="multipart/form-data">
    @csrf

    <h1 class="title is-3">ADD LECTURER</h1>
    
    <div class="field">
        <label class="label">Staff Number </label>
        <div class="control">
            <input id="staff_number" name="staff_number" class="input @error('staff_number') is-invalid @enderror" value="{{ old('staff_number',lecturers->staff_number) }}" type="text"  required>
            @error('staff_number')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>    
    <div class="field">
        <label class="label">Name</label>
        <div class="control">
            <input id="name" name="name" class="input @error('name') is-invalid @enderror" value="{{ old('name',lecturers->name) }}" type="text"  required>
            @error('name')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>    
    <div class="field">
        <label class="label">Department</label>
        <div class="select" style="width:100%;">
            <select id="department_id" name="department_id" class="input @error('department_id') is-invalid @enderror" >
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