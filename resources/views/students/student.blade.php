@extends('layouts.table')
@section('upload')
    <a href="{{ URL::to('students/getFile') }}" title="upload file">
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
            <a href="{{ route('students.create') }}" class="tag">Add New</a>
        </div>
    </div>
@endsection

@section('data-table')
    <table id="student" class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <th>S/N</th>
            <th>USER ID </th>
            <th>MATRIC NUMBER </th>
            <th>FIRST NAME </th>
            <th>MIDDLE NAME </th>
            <th>LAST NAME </th>
            <th>LEVEL ID </th>
            <th>DEPARTMENT ID </th>
            <th style="width:5%;">&nbsp;</th>
            <th style="width:5%;">&nbsp;</th>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach($students as $student)
            <?php $i += 1; ?>
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $student->user_id }}</td>
                <td>{{ $student->matric_number }}</td>
                <td>{{ $student->first_name }}</td>
                <td>{{ $student->middle_name }}</td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->level_id }}</td>
                <td>{{ $student->department_id }}</td>
                <td>
                    <a href="{{ URL::to('students/'.$student->id.'/edit') }}" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('students.show',$student->id) }}" title="View.">
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
            var table = $("#student").DataTable({
                buttons:[
                    'copy', 'excel', 'pdf'
                ]
            });
            table.buttons().container()
                .appendTo( $('.downloads') );
        });
    </script>
@endsection
