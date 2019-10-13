@extends('layouts.bulma')
@section('title', 'creating new admin')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="list">
        <li class="list-item"><strong>USER_NAME</strong>:&nbsp;{{ $user->user_name }}</li>
        <li class="list-item"><strong>USER_TYPE_ID</strong>:&nbsp;{{ $user->user_type_id }}</li>
        <li class="list-item"><strong>EMAIL</strong>:&nbsp;{{ $user->email }}</li>
        <li class="list-item"><strong>EMAIL_VERIFIED_AT</strong>:&nbsp;{{ $user->email_verified_at }}</li>
        <li class="list-item"><strong>PHONE</strong>:&nbsp;{{ $user->phone }}</li>
        <li class="list-item"><strong>PASSWORD</strong>:&nbsp;{{ $user->password }}</li>
        <li class="list-item"><strong>FINGERPRINT</strong>:&nbsp;{{ $user->fingerprint }}</li>
        <li class="list-item"><strong>API_TOKEN</strong>:&nbsp;{{ $user->api_token }}</li>
        <li class="list-item"><strong>REMEMBER_TOKEN</strong>:&nbsp;{{ $user->remember_token }}</li>
        <li class="list-item"><strong>ONLINE</strong>:&nbsp;{{ $user->online }}</li>
    </div>
@endsection
