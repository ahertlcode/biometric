@extends('layouts.bulma')
@section('title', 'creating new admin')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="list">
        <li class="list-item"><strong>LEVEL</strong>:&nbsp;{{ $level->level }}</li>
    </div>
@endsection
