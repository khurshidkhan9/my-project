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
                            <th>Role</th>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
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
                                <td><img src="{{ $user->img_path ? asset($user->img_path) : asset('storage/uploads/static-img/avatar7.png') }}" width="100px" alt="" srcset=""></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->is_admin == 1)
                                    <span class="badge badge-pill badge-success">Admin</span>
                                    @else
                                    <span class="badge badge-pill badge-info">Member</span>
                                    @endif
                                </td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->comments->count() }}</td>
                                <td>
                                    
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="badge badge-info" href="{{ route('users.show', $user->id) }}"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                        <a class="badge badge-primary" href="{{ route('users.edit', $user->id) }}"><i class="fas fa-pencil-alt"></i></a>

                                        <button type="submit" class="badge badge-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>

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
