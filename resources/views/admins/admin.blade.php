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
            <a href="{{ route('admins.create') }}" class="tag is-success">+</a>
        </div>
    </div>
@endsection

@section('data-table')
    <table class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <th>S/N</th>
            <th>staff_number</th>
            <th>name</th>
            <th>designation</th>
            <th>section_id</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th colspan="2" style="width:5%;">&nbsp;</th>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach($admins as $admin)
            <?php $i += 1; ?>
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $admin->staff_number }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->designation }}</td>
                <td>{{ $admin->section_id }}</td>
                <td>{{ $admin->created_at }}</td>
                <td>{{ $admin->updated_at }}</td>
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
