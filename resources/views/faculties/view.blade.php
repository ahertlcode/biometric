@extends('layouts.bulma')
@section('title', 'creating new admin')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="list">
        <li class="list-item"><strong>FACULTY_NAME</strong>:&nbsp;{{ $faculty->faculty_name }}</li>
        <li class="list-item"><strong>CREATED_AT</strong>:&nbsp;{{ $faculty->created_at }}</li>
        <li class="list-item"><strong>UPDATED_AT</strong>:&nbsp;{{ $faculty->updated_at }}</li>
    </div>
@endsection
