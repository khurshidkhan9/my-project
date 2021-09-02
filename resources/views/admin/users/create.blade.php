@extends('layouts.master')



@section('content')


    <div class="row">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Create User</div>

                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success"> {{ Session::get('success') }}</div>
                        @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger"> {{ Session::get('error') }}</div>
                        @endif

                    <form method="post" action="{{URL('admin/users')}}" enctype="multipart/form-data">
                        <div class="form-group">

                            @csrf

                            <label class="label">User Image: </label>

                            <input type="file" name="file" class="" required />

                        </div>
                        <div class="form-group">


                            <label class="label">User Name: </label>

                            <input type="text" name="name" class="form-control" required />

                        </div>
                        <div class="form-group">


                            <label class="label">User email: </label>

                            <input type="text" name="email" class="form-control" required />

                        </div>
                        <div class="form-group">


                            <label class="label">User Password: </label>

                            <input type="password" name="password" class="form-control" required />

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
