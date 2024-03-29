<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Amin education admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/js/dist/dropzone.css') }}" rel="stylesheet">

    <script type="text/javascript" src="{{ asset('admin/js/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/tinymce/init_tinymce.js') }}"></script>
    <script src="{{ asset('admin/js/dist/dropzone.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="{{ URL('/') }}">Amin Foundation - Fundraiser &amp; Admin Panel</a>

        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for..." aria-label="Search"
                    aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <span class="badge badge-danger">9+</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <a class="nav-link" href="{{URL('./')}}">View Site</a>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset(Auth::user()->img_path) }}" width="30" alt="" srcset=""> 
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider">

                    </div>
                 </div>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a class="dropdown-item" href="{{ route('Profile') }}">{{ __('Profile') }}</a>
                </div>
            </li>
            </div>
            </li>
        </ul>

    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ URL('admin/home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <h6 class="dropdown-header">Login Screens:</h6>
                    <a class="dropdown-item" href="login.html">Login</a>
                    <a class="dropdown-item" href="register.html">Register</a>
                    <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Other Pages:</h6>
                    <a class="dropdown-item" href="404.html">404 Page</a>
                    <a class="dropdown-item" href="blank.html">Blank Page</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="postsDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Users</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="postsDropdown">
                    <a class="dropdown-item" href="{{ URL('admin/users') }}">Show All Users</a>
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Create Users</h6>
                    <a class="dropdown-item" href="{{ URL('admin/users/create') }}">Create New User</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="postsDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Posts</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="postsDropdown">
                    <a class="dropdown-item" href="{{ URL('admin/posts') }}">Show All Posts</a>
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Create Posts</h6>
                    <a class="dropdown-item" href="{{ URL('admin/posts/create') }}">Create New post</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="photoDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Photos</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="photoDropdown">
                    <a class="dropdown-item" href="{{ URL('admin/photos') }}">Show All Photos</a>
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Create Photos</h6>
                    <a class="dropdown-item" href="{{ URL('admin/photos/create') }}">Create New photo</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="msgDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-text-height"></i>
                    <span>Messages</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="msgDropdown">
                    <a class="dropdown-item" href="{{ URL('admin/messages') }}">Show All Messages</a>
                </div>
            </li>
        </ul>

        <div id="content-wrapper">
            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ URL('admin/home') }}">Dashboard</a>
                    </li>
                    <?php $segments = ''; ?>
                    @foreach (Request::segments() as $segment)
                        <?php $segments .= '/' . $segment; ?>
                        <li class="breadcrumb-item">
                            <a href="{{ URL($segments) }}">{{ $segment }}</a>
                        </li>
                    @endforeach
                </ol>


                @yield('content')

            </div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © Amin Foundation - Fundraiser 2021 Made BY Khurshidkhan</span>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin.min.js') }}"></script>

    <!-- Demo scripts for this page-->
    <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>

</body>
<script type="text/javascript">
    $(document).ready(function() {

        $('#master').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $(".sub_chk").prop('checked', true);
            } else {
                $(".sub_chk").prop('checked', false);
            }
        });

        $('.delete_all').on('click', function(e) {

            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });

            if (allVals.length <= 0) {
                alert("Please select row.");
            } else {

                var check = confirm("Are you sure you want to delete ?");
                if (check == true) {

                    var join_selected_values = allVals.join(",");

                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + join_selected_values,
                        success: function(data) {

                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });

                    $.each(allVals, function(index, value) {
                        $('table tr').filter("[data-row-id='" + value + "']").remove();
                    });
                }
            }
        });

        // $('[data-toggle=confirmation]').confirmation({  
        //     rootSelector: '[data-toggle=confirmation]',  
        //     onConfirm: function (event, element) {  
        //         element.trigger('confirm');  
        //     }  
        // });  

        // $(document).on('confirm', function (e) {  
        //     var eele = e.target;  
        //     e.preventDefault();  

        //     $.ajax({  
        //         url: ele.href,  
        //         type: 'DELETE',  
        //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},  
        //         success: function (data) {  
        //             if (data['success']) {  
        //                 $("#" + data['tr']).slideUp("slow");  
        //                 alert(data['success']);  
        //             } else if (data['error']) {  
        //                 alert(data['error']);  
        //             } else {  
        //                 alert('Whoops Something went wrong!!');  
        //             }  
        //         },  
        //         error: function (data) {  
        //             alert(data.responseText);  
        //         }  
        //     });  

        //     return false;  
        // });  
    });
</script>

</html>
