@extends('layouts.bulma')
@section('title', 'creating new admin')
@section('sidebar')
@parent
@endsection
@section('content')
<form action="{{ route('admins.store') }}" class="form container" method="POST" enctype="multipart/form-data">
    @csrf

    <h1 class="title is-3">ADD ADMIN</h1>

    <div class="field">
        <label class="label">Staff Number </label>
        <div class="control">
            <input id="staff_number" name="staff_number" class="input @error('staff_number') is-invalid @enderror" value="{{ old('staff_number') }}" type="text" >
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
            <input id="name" name="name" class="input @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text"  required>
            @error('name')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="field">
        <label class="label">Designation</label>
        <div class="control">
            <input id="designation" name="designation" class="input @error('designation') is-invalid @enderror" value="{{ old('designation') }}" type="text" >
            @error('designation')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="field">
        <label class="label">Section</label>
        <div class="select" style="width:100%;">
            <select class="input @error('section_id') is-invalid @enderror" >
                <option value="-1">Select Section </option>
                @foreach($sections as $section)
                <option value="{{$section->id}}">{{$section->section_name}}</option>
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