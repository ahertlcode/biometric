@extends('layouts.bulma')
@section('title', 'creating new admin')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="list">
        <li class="list-item"><strong>SECTION_NAME</strong>:&nbsp;{{ $section->section_name }}</li>
        <li class="list-item"><strong>CREATED_AT</strong>:&nbsp;{{ $section->created_at }}</li>
        <li class="list-item"><strong>UPDATED_AT</strong>:&nbsp;{{ $section->updated_at }}</li>
    </div>
@endsection
