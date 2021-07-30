@extends('layouts.master')

@section('content')
     <!-- DataTables Example -->
     <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          Data Table Example</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Create date</th>
                    <th>Comments</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Create date</th>
                  <th>Comments</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($posts as $post)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->body }}</td>
                  <td>{{ $post->created_at }}</td>
                  <td>{{ $post->comment }}</td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
@endsection