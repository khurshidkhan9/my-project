@extends('layouts.master')

@section('content')
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example
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
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset($post->img_path) }}" width="100px" alt="" srcset=""></td>
                                <td>{{ $post->title }}</td>
                                <td> <textarea name="" id="" cols="30" rows="10"> {{ $post->body }}</textarea></td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->comments->count() }}</td>
                                <td>

                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('posts.show', $post->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')

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
