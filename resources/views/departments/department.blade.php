@extends('layouts.table')
@section('search')
    <div class="field">
        <div class="control has-icons-right">
            <input type="text" class="input">
            <span class="icon is-right">
                <i class="fa fa-search"></i>
            </span>
        </div>
    </div>
@endsection

@section('download-icons')
    <a href="#" title="export to pdf">
        <i class="fas fa-file-pdf fa-2x"></i>
    </a>&nbsp;&nbsp;
    <a href="#" title="export to excel">
        <i class="fas fa-file-excel fa-2x"></i>
    </a>&nbsp;&nbsp;
    <a href="#" title="export to csv">
        <i class="fas fa-file-alt fa-2x"></i>
    </a>&nbsp;&nbsp;
    <a href="#" title="upload file">
        <i class="fas fa-file-upload fa-2x"></i>
    </a>
@endsection

@section('add-new')
    <div class="control">
        <div class="tags has-addons">
            <span class="tag">
                Add New
            </span>
            <a href="{{ route('departments.create') }}" class="tag is-success">+</a>
        </div>
    </div>
@endsection

@section('data-table')
    <table class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <th>S/N</th>
            <th>department_name</th>
            <th>faculty_id</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th colspan="2" style="width:5%;">&nbsp;</th>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach($departments as $department)
            <?php $i += 1; ?>
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $department->department_name }}</td>
                <td>{{ $department->faculty_id }}</td>
                <td>{{ $department->created_at }}</td>
                <td>{{ $department->updated_at }}</td>
                <td>
                    <a href="{{ URL::to('departments/'.$department->id.'/edit') }}" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('departments.show',$department->id) }}" title="View.">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
