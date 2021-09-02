@extends('layouts.master')

@section('content')



    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-comments"></i>
                    </div>
                    <div class="mr-5">Total comments {{ count($comment) }}</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ URL('admin/comments') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5">Total Posts {{ count($post) }}</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ URL('admin/posts') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                    </div>
                    <div class="mr-5">Total Photos {{ count($photo) }}</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ URL('admin/photos') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-life-ring"></i>
                    </div>
                    <div class="mr-5">Total Users {{ count($user) }}</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ URL('admin/users') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Area Chart Example-->
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Area Chart Example
                </div>
                <div class="card-body">
                    <canvas id="myAreaChart" width="100%" height="30"></canvas>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="panel-title">Last 10 Registered Users</h3>
                </div>
                <div class="card-body card-full">
                    <table class="table table-bordered table-condensed table-responsive" id="table">
                        <thead>
                            <tr>
                                <th>Profile Photo</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Registered On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $obj)

                                <tr>
                                    <td><a class="btnInfo" href="#"><img class="rounded" src="{{ $obj->img_path != null ? asset($obj->img_path) : asset('storage/uploads/static-img/avatar7.png')}}"
                                                width="80"></a></td>
                                    <td><a class="btnInfo"
                                            href="{{ route('users.show', $obj->id) }}">{{ $obj->name }}</a></td>
                                    <td>{{ $obj->email }}</td>
                                    <td>{{ $obj->created_at->format('j F, Y \\a\\t h:i A') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/.Panel -->



        </div>
    </div>

@endsection
