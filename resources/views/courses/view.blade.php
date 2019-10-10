@extends('layouts.bulma')
@section('title', 'creating new admin')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="list">
        <li class="list-item"><strong>COURSE_CODE</strong>:&nbsp;{{ $course->course_code }}</li>
        <li class="list-item"><strong>COURSE_TITLE</strong>:&nbsp;{{ $course->course_title }}</li>
        <li class="list-item"><strong>CREATED_AT</strong>:&nbsp;{{ $course->created_at }}</li>
        <li class="list-item"><strong>UPDATED_AT</strong>:&nbsp;{{ $course->updated_at }}</li>
    </div>
@endsection
