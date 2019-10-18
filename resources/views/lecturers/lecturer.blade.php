@extends('layouts.table')
@section('upload')
    <a href="{{ URL::to('lecturers/getFile') }}" title="upload file">
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
            <a href="{{ route('lecturers.create') }}" class="tag">Add New</a>
        </div>
    </div>
@endsection

@section('data-table')
    <table id="lecturer" class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <th>S/N</th>
            <th>USER ID </th>
            <th>STAFF NUMBER </th>
            <th>NAME</th>
            <th>DEPARTMENT ID </th>
            <th style="width:5%;">&nbsp;</th>
            <th style="width:5%;">&nbsp;</th>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach($lecturers as $lecturer)
            <?php $i += 1; ?>
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $lecturer->user_id }}</td>
                <td>{{ $lecturer->staff_number }}</td>
                <td>{{ $lecturer->name }}</td>
                <td>{{ $lecturer->department_id }}</td>
                <td>
                    <a href="{{ URL::to('lecturers/'.$lecturer->id.'/edit') }}" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('lecturers.show',$lecturer->id) }}" title="View.">
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
            var table = $("#lecturer").DataTable({
                buttons:[
                    'copy', 'excel', 'pdf'
                ]
            });
            table.buttons().container()
                .appendTo( $('.downloads') );
        });
    </script>
@endsection
