@extends('layouts.master')

@section('content')
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Messages Table
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Create date</th>
                            <th width="280px">Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Create date</th>
                            <th width="280px">Action</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($messages as $msg)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $msg->name }}</td>
                                <td>{{ $msg->email }}</td>
                                <td>{{ $msg->phone }}</td>
                                <td>{{ $msg->subject }}</td>
                                <td><textarea> {{ $msg->message }}</textarea></td>
                                <td>{{ $msg->created_at }}</td>
                                <td>

                                    <form action="{{ route('messages.destroy', $msg->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-info" href="{{ route('users.show', $msg->id) }}">Show</a>
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
