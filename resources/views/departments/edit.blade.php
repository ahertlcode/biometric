@extends('layouts.bulma')
@section('title', 'Editing Department')
@section('sidebar')
@parent
@endsection
@section('content')
<form action="{{ route('departments.update',$department->id) }}" class="form container" method="PUT" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <h1 class="title is-3">EDIT DEPARTMENT</h1>
    
    <div class="field">
        <label class="label">Department</label>
        <div class="control">
            <input id="department" name="department" class="input @error('department') is-invalid @enderror" value="{{ old('department', $department->department ?? '') }}" type="text"  required>
            @error('department')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>    
    <div class="field">
        <label class="label">Faculty</label>
        <div class="select" style="width:100%;">
            <select id="faculty_id" name="faculty_id" class="input @error('faculty_id') is-invalid @enderror" >
                <option value="-1">Select Faculty </option>
                @foreach($faculties as $faculty)
                <option value="{{$faculty->id}}">{{$faculty->faculty}}</option>
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