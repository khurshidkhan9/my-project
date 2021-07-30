@extends('layouts.master')



@section('content')


    <div class="row">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Update Post</div>

                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success"> {{ Session::get('success') }}</div>
                        @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger"> {{ Session::get('error') }}</div>
                        @endif

                    <form method="post" action="{{ route('admin.posts') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <img src="{{asset($post->img_path)}}"  width="100px" alt="" srcset="">
                        </div>
                        <div class="form-group">


                            <label class="label">Post Image: </label>

                            <input type="file" name="file" class="" required />

                        </div>

                        <div class="form-group">

                            @csrf

                            <label class="label">Post Title: </label>

                            <input type="text" name="title" class="form-control" value="{{$post->title}}" required />

                        </div>

                        <div class="form-group">

                            <label class="label">Post Body: </label>

                            <textarea class="form-control" id="tinymce" value="{{ $post->body}}" name="body" rows="3" placeholder="Enter a description for your post"></textarea>
                            <br>
                            <div class="form-group">

                                <input type="submit" value="Update" class="btn btn-success" />
    
                                <a class="btn" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    show body content <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                                </a>
                            </div>
                              <div class="collapse" id="collapseExample">
                            <div class="col-6">
                                {!!$post->body!!}
                            </div>
                            </div>


                        </div>

                      

                    </form>

                </div>

            </div>

        </div>

    </div>


@endsection
