@extends('layouts.bulma')
@section('content')
    <form method="POST" action="{{ route('users.upload') }}" enctype="multipart/form-data" class="form container">
        @csrf
        <h1 class="title is-3">USERS MASS UPLOAD</h1>
        <div class="field">
            <div class="file has-name is-boxed">
                <label class="file-label">
                    <input class="file-input" type="file" name="user_file" id="user_file">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Choose a file…
                        </span>
                    </span>
                </label>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-medium">
                    Upload
                </button>
            </div>
        </div>
    </form>
@endsection
