@extends('layouts.table')
@section('upload')
    <a href="{{ URL::to('admins/getFile') }}" title="upload file">
        <i class="fas fa-file-upload fa-2x"></i>
    </a>
@endsection
@section('download-icons')
    <div class="downloads"></div>
@endsection
@section('add-new')
    <div class="control">
        <div class="tags has-addons">
            <span class="tag is-success">
                +
            </span>
            <a href="{{ route('admins.create') }}" class="tag">Add New</a>
        </div>
    </div>
@endsection

@section('data-table')
    <table id="admin" class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <th>S/N</th>
            <th>USER ID </th>
            <th>STAFF NUMBER </th>
            <th>NAME</th>
            <th>DESIGNATION</th>
            <th>SECTION ID </th>
            <th style="width:5%;">&nbsp;</th>
            <th style="width:5%;">&nbsp;</th>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach($admins as $admin)
            <?php $i += 1; ?>
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $admin->user_id }}</td>
                <td>{{ $admin->staff_number }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->designation }}</td>
                <td>{{ $admin->section_id }}</td>
                <td>
                    <a href="{{ URL::to('admins/'.$admin->id.'/edit') }}" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('admins.show',$admin->id) }}" title="View.">
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
            var table = $("#admin").DataTable({
                buttons:[
                    'copy', 'excel', 'pdf'
                ]
            });
            table.buttons().container()
                .appendTo( $('.downloads') );
        });
    </script>
@endsection
