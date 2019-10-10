@extends('layouts.bulma')
@section('title', 'creating new section')
@section('sidebar')
@parent
@endsection
@section('content')
<form action="{{ route('sections.store') }}" class="form container" method="POST" enctype="multipart/form-data">
    @csrf

    <h1 class="title is-3">ADD SECTION</h1>
    
    <div class="field">
        <label class="label">Section Name </label>
        <div class="control">
            <input id="section_name" name="section_name" class="input @error('section_name') is-invalid @enderror" value="{{ old('section_name') }}" type="text"  required>
            @error('section_name')
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