@extends('layouts.master')



@section('content')


    <div class="row">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Create Post</div>

                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success"> {{ Session::get('success') }}</div>
                        @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger"> {{ Session::get('error') }}</div>
                        @endif

                    <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                        <div class="form-group">

                            @csrf

                            <label class="label">Post Image: </label>

                            <input type="file" name="file" class="" required />

                        </div>

                        <div class="form-group">

                            @csrf

                            <label class="label">Post Title: </label>

                            <input type="text" name="title" class="form-control" required />

                        </div>

                        <div class="form-group">

                            <label class="label">Post Body: </label>

                            <textarea name="body" rows="10" cols="30" class="form-control" required></textarea>

                        </div>

                        <div class="form-group">

                            <input type="submit" class="btn btn-success" />

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>


@endsection
