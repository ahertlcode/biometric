@extends('layouts.bulma')
@section('title', 'creating new admin')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="list">
        <li class="list-item"><strong>COURSE_ID</strong>:&nbsp;{{ $register->course_id }}</li>
        <li class="list-item"><strong>CREATED_AT</strong>:&nbsp;{{ $register->created_at }}</li>
        <li class="list-item"><strong>UPDATED_AT</strong>:&nbsp;{{ $register->updated_at }}</li>
    </div>
@endsection
