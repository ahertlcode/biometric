@extends('layouts.bulma')
@section('title', 'creating new admin')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="list">
        <li class="list-item"><strong>USER_ID</strong>:&nbsp;{{ $lecturer->user_id }}</li>
        <li class="list-item"><strong>STAFF_NUMBER</strong>:&nbsp;{{ $lecturer->staff_number }}</li>
        <li class="list-item"><strong>NAME</strong>:&nbsp;{{ $lecturer->name }}</li>
        <li class="list-item"><strong>DEPARTMENT_ID</strong>:&nbsp;{{ $lecturer->department_id }}</li>
    </div>
@endsection
