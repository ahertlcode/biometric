@extends('layouts.bulma')
@section('title', 'creating new admin')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="list">
        <li class="list-item"><strong>COURSE</strong>:&nbsp;{{ $course->course }}</li>
        <li class="list-item"><strong>COURSE_TITLE</strong>:&nbsp;{{ $course->course_title }}</li>
    </div>
@endsection
