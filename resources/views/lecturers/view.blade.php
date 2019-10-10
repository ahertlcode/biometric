@extends('layouts.bulma')
@section('title', 'creating new admin')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="list">
        <li class="list-item"><strong>STAFF_NUMBER</strong>:&nbsp;{{ $lecturer->staff_number }}</li>
        <li class="list-item"><strong>NAME</strong>:&nbsp;{{ $lecturer->name }}</li>
        <li class="list-item"><strong>DEPARTMENT_ID</strong>:&nbsp;{{ $lecturer->department_id }}</li>
        <li class="list-item"><strong>CREATED_AT</strong>:&nbsp;{{ $lecturer->created_at }}</li>
        <li class="list-item"><strong>UPDATED_AT</strong>:&nbsp;{{ $lecturer->updated_at }}</li>
    </div>
@endsection
