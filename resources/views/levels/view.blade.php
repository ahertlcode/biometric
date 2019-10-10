@extends('layouts.bulma')
@section('title', 'creating new admin')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="list">
        <li class="list-item"><strong>LEVEL</strong>:&nbsp;{{ $level->level }}</li>
        <li class="list-item"><strong>CREATED_AT</strong>:&nbsp;{{ $level->created_at }}</li>
        <li class="list-item"><strong>UPDATED_AT</strong>:&nbsp;{{ $level->updated_at }}</li>
    </div>
@endsection
