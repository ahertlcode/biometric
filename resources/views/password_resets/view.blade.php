@extends('layouts.bulma')
@section('title', 'creating new admin')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="list">
        <li class="list-item"><strong>EMAIL</strong>:&nbsp;{{ $password_reset->email }}</li>
        <li class="list-item"><strong>TOKEN</strong>:&nbsp;{{ $password_reset->token }}</li>
    </div>
@endsection
