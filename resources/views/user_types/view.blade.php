@extends('layouts.bulma')
@section('title', 'creating new admin')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="list">
        <li class="list-item"><strong>USER_TYPE</strong>:&nbsp;{{ $user_type->user_type }}</li>
        <li class="list-item"><strong>CREATED_AT</strong>:&nbsp;{{ $user_type->created_at }}</li>
        <li class="list-item"><strong>UPDATED_AT</strong>:&nbsp;{{ $user_type->updated_at }}</li>
    </div>
@endsection
