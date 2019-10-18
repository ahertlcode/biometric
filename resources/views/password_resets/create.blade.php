@extends('layouts.bulma')
@section('title', 'creating new password_reset')
@section('sidebar')
@parent
@endsection
@section('content')
<form action="{{ route('password_resets.store') }}" class="form container" method="POST" enctype="multipart/form-data">
    @csrf

    <h1 class="title is-3">ADD PASSWORD RESET</h1>
    
    <div class="field">
        <label class="label">Email</label>
        <div class="select" style="width:100%;">
            <select id="email" name="email" class="input @error('email') is-invalid @enderror" >
                <option value="-1">Select Email</option>
                @foreach($emails as $email)
                <option value="{{$email->id}}">{{$email->email}}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    <div class="field">
        <label class="label">Token</label>
        <div class="control">
            <input id="token" name="token" class="input @error('token') is-invalid @enderror" value="{{ old('token', $password_reset->token ?? '') }}" type="text"  required>
            @error('token')
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