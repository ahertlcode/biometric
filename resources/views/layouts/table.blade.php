@extends('layouts.bulma')
@section('title')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection
@section('content')
<table class="table is-fullwidth" style="border:none;">
    <thead>
        <tr>
            <td style="width:50%;vertical-align:middle;">
                @yield('search')
            </td>
            <td style="width:35%;vertical-align:middle;" align="center">
                @yield('download-icons')
            </td>
            <td style="width:15%; vertical-align:middle;">
                @yield('add-new')
            </td>
        </tr>
    </thead>
</table>
@yield('data-table')
@endsection