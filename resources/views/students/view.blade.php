@extends('layouts.bulma')
@section('title', 'creating new admin')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="list">
        <li class="list-item"><strong>MATRIC_NUMBER</strong>:&nbsp;{{ $student->matric_number }}</li>
        <li class="list-item"><strong>FIRST_NAME</strong>:&nbsp;{{ $student->first_name }}</li>
        <li class="list-item"><strong>MIDDLE_NAME</strong>:&nbsp;{{ $student->middle_name }}</li>
        <li class="list-item"><strong>LAST_NAME</strong>:&nbsp;{{ $student->last_name }}</li>
        <li class="list-item"><strong>LEVEL_ID</strong>:&nbsp;{{ $student->level_id }}</li>
        <li class="list-item"><strong>DEPARTMENT_ID</strong>:&nbsp;{{ $student->department_id }}</li>
        <li class="list-item"><strong>CREATED_AT</strong>:&nbsp;{{ $student->created_at }}</li>
        <li class="list-item"><strong>UPDATED_AT</strong>:&nbsp;{{ $student->updated_at }}</li>
    </div>
@endsection
