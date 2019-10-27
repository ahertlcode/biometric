@extends('layouts.table')
@section('upload')
    <!--
    <a href="{{ URL::to('registers/getFile') }}" title="upload file">
        <i class="fas fa-file-upload fa-2x"></i>
    </a>
    -->
@endsection
@section('download-icons')
    <div class="downloads"></div>
@endsection
@section('add-new')
    <!--
    <div class="control">
        <div class="tags has-addons">
            <span class="tag is-success">
                +
            </span>
            <a href="{{ route('registers.create') }}" class="tag">Add New</a>
        </div>
    </div>-->
@endsection

@section('data-table')
    <table id="register" class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <th>S/N</th>
            <th>NAME </th>
            <th>COURSE </th>
            <th>DATE</th>
            <th style="width:5%;">&nbsp;</th>
            <th style="width:5%;">&nbsp;</th>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach($registers as $register)
            <?php $i += 1; ?>
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $register->user_id }}</td>
                <td>{{ $register->course }}</td>
                <td>{{ $register->created_at }}</td>
                <td>
                    <a href="{{ URL::to('registers/'.$register->id.'/edit') }}" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('registers.show',$register->id) }}" title="View.">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            var table = $("#register").DataTable({
                buttons:[
                    'copy', 'excel', 'pdf'
                ]
            });
            table.buttons().container()
                .appendTo( $('.downloads') );
        });
    </script>
@endsection
