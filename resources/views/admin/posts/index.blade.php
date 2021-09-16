@extends('layouts.master')

@section('content')
    <!-- DataTables Example -->
    <div class="mb-2">
        <a href="{{ URL('admin/posts/create') }}" class="btn btn-primary">Create Post</a>
        <button class="btn btn-danger delete_all" data-url="{{ url('admin/posts') }}">Delete All Selected</button>
    </div>
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
                            <th>Title</th>
                            <th>Description</th>
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
                        @foreach ($posts as $key=>$post)
                            <tr id="tr_{{ $post->id }}">
                                <td><input type="checkbox" class="sub_chk" data-id="{{ $post->id }}"></td>
                                <td>{{ ++$key }}</td>
                                <td><img src="{{ asset($post->img_path) }}" width="100px" alt="" srcset=""></td>
                                <td>{{ $post->title }}</td>
                                <td> <textarea name="" id="" cols="20" rows="3"> {{ $post->body }}</textarea></td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->comments->count() }}</td>
                                <td>

                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-info" href="{{ route('posts.show', $post->id) }}"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                        <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}"><i class="fas fa-pencil-alt"></i></a>

                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>

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
