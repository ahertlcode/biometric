@extends('layouts.table')
@section('upload')
    <!--
    <a href="{{ URL::to('users/getFile') }}" title="upload file">
        <i class="fas fa-file-upload fa-2x"></i>
    </a>-->
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
            <a href="{{ route('users.create') }}" class="tag">Add New</a>
        </div>
    </div>-->
@endsection

@section('data-table')
    <table id="user" class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <th>S/N</th>
            <th>USER NAME </th>
            <th>USER TYPE </th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th style="width:5%;">&nbsp;</th>
            <th style="width:5%;">&nbsp;</th>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach($users as $user)
            <?php $i += 1; ?>
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $user->user_name }}</td>
                <td>{{ $user->user_type }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>
                    <a href="{{ URL::to('users/'.$user->id.'/edit') }}" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('users.show',$user->id) }}" title="View.">
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
            var table = $("#user").DataTable({
                buttons:[
                    'copy', 'excel', 'pdf'
                ]
            });
            table.buttons().container()
                .appendTo( $('.downloads') );
        });
    </script>
@endsection
