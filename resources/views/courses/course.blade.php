@extends('layouts.table')
@section('upload')
    <a href="{{ URL::to('courses/getFile') }}" title="upload file">
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
            <a href="{{ route('courses.create') }}" class="tag">Add New</a>
        </div>
    </div>
@endsection

@section('data-table')
    <table id="course" class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <th>S/N</th>
            <th>COURSE</th>
            <th>COURSE TITLE </th>
            <th style="width:5%;">&nbsp;</th>
            <th style="width:5%;">&nbsp;</th>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach($courses as $course)
            <?php $i += 1; ?>
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $course->course }}</td>
                <td>{{ $course->course_title }}</td>
                <td>
                    <a href="{{ URL::to('courses/'.$course->id.'/edit') }}" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('courses.show',$course->id) }}" title="View.">
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
            var table = $("#course").DataTable({
                buttons:[
                    'copy', 'excel', 'pdf'
                ]
            });
            table.buttons().container()
                .appendTo( $('.downloads') );
        });
    </script>
@endsection
