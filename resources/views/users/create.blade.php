@extends('layouts.bulma')
@section('title', 'creating new user')
@section('sidebar')
@parent
@endsection
@section('content')
<form action="{{ route('users.store') }}" class="form container" method="POST" enctype="multipart/form-data">
    @csrf

    <h1 class="title is-3">ADD USER</h1>
    
    <div class="field">
        <label class="label">User Name </label>
        <div class="control">
            <input id="user_name" name="user_name" class="input @error('user_name') is-invalid @enderror" value="{{ old('user_name', $user->user_name ?? '') }}" type="text"  required>
            @error('user_name')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>    
    <div class="field">
        <label class="label">User Type</label>
        <div class="select" style="width:100%;">
            <select id="user_type_id" name="user_type_id" class="input @error('user_type_id') is-invalid @enderror" >
                <option value="-1">Select User Type </option>
                @foreach($user_types as $user_type)
                <option value="{{$user_type->id}}">{{$user_type->user_type}}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    <div class="field">
        <label class="label">Email</label>
        <div class="control">
            <input id="email" name="email" class="input @error('email') is-invalid @enderror" value="{{ old('email', $user->email ?? '') }}" type="text"  required>
            @error('email')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>    
    <div class="field">
        <label class="label">Phone</label>
        <div class="control">
            <input id="phone" name="phone" class="input @error('phone') is-invalid @enderror" value="{{ old('phone', $user->phone ?? '') }}" type="text"  required>
            @error('phone')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>    
    <div class="field">
        <label class="label">Password</label>
        <div class="control">
            <input id="password" name="password" class="input @error('password') is-invalid @enderror" value="{{ old('password', $user->password ?? '') }}" type="password"  required>
            @error('password')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>    
    <div class="field">
        <label class="label">Password Confirmation </label>
        <div class="control">
            <input id="password_confirmation" name="password_confirmation" class="input @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation', $user->password_confirmation ?? '') }}" type="password"  required>
            @error('password_confirmation')
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