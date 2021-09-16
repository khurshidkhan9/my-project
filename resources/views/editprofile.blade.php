@extends('layouts.app')

@section('content')

<div class="container emp-profile mt-5 mb-5">
    <form method="post" id="upload-image-form" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4">
                @if (Session::has('success'))
            <div class="alert alert-success"> {{ Session::get('success') }}</div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger"> {{ Session::get('error') }}</div>
        @endif
                <div>
                    <img  class="img-center img-circle" src="{{ asset(Auth::user()->img_path) }}" alt=""/>
                    {{-- <div class="btn dento-btn">
                        Change Photo --}}
                        <input id="image-input" class="btn dento-btn mt-3" type="file" name="file" style="display: block;margin-left: auto;margin-right: auto;" />
                        <span class="text-danger" id="image-input-error"></span>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                    {{-- </div> --}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                            <h5>
                                {{Auth::user()->name}}
                            </h5>
                            <h6>
                                @if (Auth::user()->is_admin == 1)
                                    {{__('Admin')}}
                                @else
                                {{__('Member')}}
                                    
                                @endif
                            </h6>
                            <br>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <input type="submit" class="btn dento-btn" name="btnAddMore" value="Edit Profile"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
          
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane f
                    <br>ade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" id="" value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="email" id="" value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="phone" id="" value="{{Auth::user()->phone}}">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Profession</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="address" id="" value="{{Auth::user()->address}}">
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </form>           
</div>



@endsection
