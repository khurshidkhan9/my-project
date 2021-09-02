@extends('layouts.master')

@section('content')
     <!-- DataTables Example -->
     <div class="mb-2">
       <a href="{{ URL('admin/photos/create') }}" class="btn btn-primary">Create Photos</a>
       <button class="btn btn-danger delete_all" data-url="{{ url('admin/photos') }}">Delete All Selected</button>  
     </div>
     <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          All Photos Table</div>
        <div class="card-body">
          {{-- alert message --}}
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        {{-- table data --}}
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th width="50px"><input type="checkbox" id="master"></th>  
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Create date</th>
                    <th width="280px">Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th width="50px"></th>  
                  <th>ID</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Create date</th>
                  <th width="280px">Action</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($photos as $key=>$photo)
                <tr id="tr_{{$photo->id}}">  
                  <td><input type="checkbox" class="sub_chk" data-id="{{$photo->id}}"></td>  
                  <td>{{ ++$key }}</td>  
                  {{-- <td>{{ $loop->iteration }}</td> --}}
                  <td><img src="{{ asset($photo->photo_path) }}" width="100px" alt="" srcset=""></td>
                  <td>{{ $photo->name }}</td>
                  <td>{{ $photo->created_at }}</td>
                  <td>

                    <form action="{{ route('photos.destroy',$photo->id) }}" method="POST">
    
         
    
                        <a class="btn btn-info" href="{{ route('photos.show',$photo->id) }}">Show</a>
    
          
    
                        <a class="btn btn-primary" href="{{ route('photos.edit',$photo->id) }}">Edit</a>
    
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