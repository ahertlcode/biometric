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
            <td style="width:5%;vertical-align:middle;">
                @yield('upload')
            </td>
            <td style="width:30%;vertical-align:middle;" align="center">
                @yield('download-icons')
            </td>
            <td style="width:15%; vertical-align:middle;">
                @yield('add-new')
            </td>
            <td style="width:50%">&nbsp;</td>
        </tr>
    </thead>
</table>
@yield('data-table')
@endsection