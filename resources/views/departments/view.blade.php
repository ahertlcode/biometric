@extends('layouts.bulma')
@section('title', 'creating new admin')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="list">
        <li class="list-item"><strong>DEPARTMENT_NAME</strong>:&nbsp;{{ $department->department_name }}</li>
        <li class="list-item"><strong>FACULTY_ID</strong>:&nbsp;{{ $department->faculty_id }}</li>
        <li class="list-item"><strong>CREATED_AT</strong>:&nbsp;{{ $department->created_at }}</li>
        <li class="list-item"><strong>UPDATED_AT</strong>:&nbsp;{{ $department->updated_at }}</li>
    </div>
@endsection
