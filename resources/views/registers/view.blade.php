@extends('layouts.bulma')
@section('title', 'creating new admin')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="list">
        <li class="list-item"><strong>USER_ID</strong>:&nbsp;{{ $register->user_id }}</li>
        <li class="list-item"><strong>COURSE_ID</strong>:&nbsp;{{ $register->course_id }}</li>
    </div>
@endsection
