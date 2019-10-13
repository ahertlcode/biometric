@extends('layouts.bulma')
@section('title', 'creating new admin')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="list">
        <li class="list-item"><strong>USER_TYPE</strong>:&nbsp;{{ $user_type->user_type }}</li>
    </div>
@endsection
