@extends('layouts.bulma')
@section('title', 'creating new admin')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="list">
        <li class="list-item"><strong>DEPARTMENT</strong>:&nbsp;{{ $department->department }}</li>
        <li class="list-item"><strong>FACULTY_ID</strong>:&nbsp;{{ $department->faculty_id }}</li>
    </div>
@endsection
