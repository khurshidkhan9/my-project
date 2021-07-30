@extends('layouts.master')



@section('content')

    <div class="row">

        <div class="col-lg-12 m-3">

            <div class="pull-left">

                <h2>Edit Product</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('photos.index') }}"> Back</a>

            </div>

        </div>

    </div>
<hr>

<div class="row m-3">
    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="col-md-3">
        <div class="card">

            <div class="col-xs-8 col-sm-8 col-md-8">

                <div class="form-group">

                    <strong>Name:</strong>

                    {{ $photo->name }}

                </div>
                <div class="form-group">

                    <strong>Image:</strong>

                    <img src="{{ asset($photo->photo_path) }}" width="300px" alt="" srcset="">


                </div>

            </div>
        </div>
    </div>





    <div class="col-md-3">

        <form action="{{ route('photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data">

            @csrf

            @method('PUT')


            <div class="form-group">
                <label>Add Name</label>
                <div class="input-group">
                   <input class="form-control" type="text" name="name" id="">
                </div>
                <img id='img-upload' />
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file">
                            Browse… <input type="file" name="image">
                        </span>
                    </span>
                </div>
                <img id='img-upload' />
            </div>
            <div class="form-group">
                <input type="submit" value="Upload">
            </div>
        </form>
    </div>

</div>




@endsection
