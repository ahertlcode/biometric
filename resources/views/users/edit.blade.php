@extends('layouts.bulma')
@section('title', 'Editing User')
@section('sidebar')
@parent
@endsection
@section('content')
<form action="{{ route('users.update',$user->id) }}" class="form container" method="PUT" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <h1 class="title is-3">EDIT USER</h1>
    
    <div class="field">
        <label class="label">User Name </label>
        <div class="control">
            <input id="user_name" name="user_name" class="input @error('user_name') is-invalid @enderror" value="{{ old('user_name',users->user_name) }}" type="text"  required>
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
            <input id="email" name="email" class="input @error('email') is-invalid @enderror" value="{{ old('email',users->email) }}" type="text"  required>
            @error('email')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>    
    <div class="field">
        <label class="label">Email Verified At </label>
        <div class="control">
            <input id="email_verified_at" name="email_verified_at" class="input @error('email_verified_at') is-invalid @enderror" value="{{ old('email_verified_at',users->email_verified_at) }}" type="text" >
            @error('email_verified_at')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>    
    <div class="field">
        <label class="label">Phone</label>
        <div class="control">
            <input id="phone" name="phone" class="input @error('phone') is-invalid @enderror" value="{{ old('phone',users->phone) }}" type="text"  required>
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
            <input id="password" name="password" class="input @error('password') is-invalid @enderror" value="{{ old('password',users->password) }}" type="text"  required>
            @error('password')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>    
    <div class="field">
        <label class="label">Fingerprint</label>
        <div class="control">
            <input id="fingerprint" name="fingerprint" class="input @error('fingerprint') is-invalid @enderror" value="{{ old('fingerprint',users->fingerprint) }}" type="text" >
            @error('fingerprint')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>    
    <div class="field">
        <label class="label">Api Token </label>
        <div class="control">
            <input id="api_token" name="api_token" class="input @error('api_token') is-invalid @enderror" value="{{ old('api_token',users->api_token) }}" type="text" >
            @error('api_token')
            <span class="notification is-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>    
    <div class="field">
        <label class="label">Remember Token </label>
        <div class="control">
            <input id="remember_token" name="remember_token" class="input @error('remember_token') is-invalid @enderror" value="{{ old('remember_token',users->remember_token) }}" type="text" >
            @error('remember_token')
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