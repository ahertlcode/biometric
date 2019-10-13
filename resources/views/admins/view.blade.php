@extends('layouts.bulma')
@section('title', 'creating new admin')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="list">
        <li class="list-item"><strong>USER_ID</strong>:&nbsp;{{ $admin->user_id }}</li>
        <li class="list-item"><strong>STAFF_NUMBER</strong>:&nbsp;{{ $admin->staff_number }}</li>
        <li class="list-item"><strong>NAME</strong>:&nbsp;{{ $admin->name }}</li>
        <li class="list-item"><strong>DESIGNATION</strong>:&nbsp;{{ $admin->designation }}</li>
        <li class="list-item"><strong>SECTION_ID</strong>:&nbsp;{{ $admin->section_id }}</li>
    </div>
@endsection
