@extends('layouts.master')



@section('content')

    <div class="row">

        <div class="col-lg-12 m-3">

            <div class="pull-left">

                <h2>Edit Photo</h2>

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

        <form action="{{ route('photos.store') }}" enctype="multipart/form-data" class="dropzone dropzone-style" id="my-awesome-dropzone">

            @csrf
            <div class="form-group">
                <label for="my-input">Title</label>
                <input id="my-input" class="form-control" type="text" name="name">
            </div>
        </form>

    </div>

</div>




@endsection
