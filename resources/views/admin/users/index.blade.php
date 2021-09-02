@extends('layouts.master')

@section('content')
    <div class="mb-2">
        <a href="{{ URL('admin/user/create') }}" class="btn btn-primary">Create User</a>
        <button class="btn btn-danger delete_all" data-url="{{ url('admin/users') }}">Delete All Selected</button>
    </div>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Post Table
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="50px"><input type="checkbox" id="master"></th>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Create date</th>
                            <th>Comments</th>
                            <th width="280px">Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th width="50px"></th>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Create date</th>
                            <th>Comments</th>
                            <th width="280px">Action</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $key=>$user)
                            <tr id="tr_{{ $user->id }}">
                                <td><input type="checkbox" class="sub_chk" data-id="{{ $user->id }}"></td>
                                <td>{{ ++$key }}</td>
                                <td><img src="{{ asset($user->img_path) }}" width="100px" alt="" srcset=""></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->comments->count() }}</td>
                                <td>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>

                                        <button type="submit" class="btn btn-danger">Delete</button>

                                    </form>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
@endsection
