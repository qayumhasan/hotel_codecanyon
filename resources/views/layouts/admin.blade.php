<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title',$companyinformation->company_name)</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('public/uploads/logo/'.$logos->favicon)}}" />
    <!-- backend css -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/assets/css/backend.css?v=1.0.1">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- Line awesome css -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <!-- remixicon css -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/assets/vendor/remixicon/fonts/remixicon.css">
    <!-- dripicons css -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/assets/vendor/@icon/dripicons/dripicons.css">
    <!-- datepiker css -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/assets/css/datepiker.css">
    <!-- fullcalendar css -->
    <link rel='stylesheet' href="{{asset('public/backend')}}/assets/vendor/fullcalendar/core/main.css" />
    <link rel='stylesheet' href="{{asset('public/backend')}}/assets/vendor/fullcalendar/daygrid/main.css" />
    <link rel='stylesheet' href="{{asset('public/backend')}}/assets/vendor/fullcalendar/timegrid/main.css" />
    <link rel='stylesheet' href="{{asset('public/backend')}}/assets/vendor/fullcalendar/list/main.css" />
    <link rel="stylesheet" href="{{asset('public/backend')}}/assets/vendor/mapbox/mapbox-gl.css">
    <!-- izitost css -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/assets/css/izitost.css">
    <!-- tagsinput css -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/assets/Bootstrap-4-Tag-Input-Plugin-jQuery/tagsinput.css">
    <!-- jquery js -->
    <script src="{{asset('public/backend')}}/assets/js/jquery-3.4.1.js"></script>
</head>
<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <div class="iq-sidebar  sidebar-default ">
            <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
                <a href="{{route('admin.main.dashboard')}}" class="header-logo">
                    <img src="{{asset('public/uploads/logo/'.$logos->logo)}}" class="img-fluid rounded-normal light-logo" alt="logo">
                    <img src="{{asset('public/uploads/logo/'.$logos->logo)}}" class="img-fluid rounded-normal darkmode-logo" alt="logo">
                </a>
                <div class="iq-menu-bt-sidebar">
                    <i class="las la-bars wrapper-menu"></i>
                </div>
            </div>
            <div class="data-scrollbar" data-scroll="1">
                <nav class="iq-sidebar-menu">
                    <ul id="iq-sidebar-toggle" class="iq-menu">
                        <li class="{{route('admin.main.dashboard')}}">
                            <a href="{{route('admin.main.dashboard')}}">
                                <i class="las la-home"></i><span>Dashboards</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="#user" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <i class="far fa-user"></i><span>User</span>
                                <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                            </a>
                            <ul id="user" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="{{ request()->routeIs('admin.user.create*') ? 'active' : '' }}">
                                    <a href="{{route('admin.user.create')}}">
                                        <i class="las la-list-alt"></i><span>User Add</span>
                                    </a>
                                </li>
                                <li class="{{ request()->routeIs('admin.user*') ? 'active' : '' }} ">
                                    <a href="{{route('admin.user')}}">
                                        <i class="las la-list-alt"></i><span>User List</span>
                                    </a>
                                </li>
                                <li class="{{ request()->routeIs('admin.userrole.permission*') ? 'active' : '' }} ">
                                    <a href="{{route('admin.userrole.permissionnew')}}">
                                        <i class="las la-list-alt"></i><span>Role Permission</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- Employee addon section start from here -->
                            @if($permit->active('employee'))
                            <li>
                                <a href="#employee" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                    <i class="fas fa-users-cog"></i><span>Employee</span>
                                    <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                    <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                                </a>
                                <ul id="employee" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                    <li class="{{ request()->routeIs('admin.employee.create*') ? 'active' : '' }}">
                                        <a href="{{route('admin.employee.create')}}">
                                            <i class="las la-list-alt"></i><span>Employee Add</span>
                                        </a>
                                    </li>
                                    <li class="{{ request()->routeIs('admin.employee.index*') ? 'active' : '' }} ">
                                        <a href="{{route('admin.employee.index')}}">
                                            <i class="las la-list-alt"></i><span>Employee List</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                             @endif
                            <!-- Employee addon section end from here -->
                            <!-- Department start from here -->
                            <li class="{{ request()->routeIs('admin.department.list*') ? 'active' : '' }}">
                                <a href="{{route('admin.department.list')}}">
                                    <i class="fa fa-university" aria-hidden="true"></i><span>Department</span>
                                </a>
                            </li>
                        <!-- Department end from here -->
                        <li>
                            <a href="#branch" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <i class="fas fa-laptop-house"></i><span>Branch</span>
                                <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                            </a>
                            <ul id="branch" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            <li class="{{ request()->routeIs('admin.branch.create*') ? 'active' : '' }}">
                                    <a href="{{route('admin.branch.create')}}">
                                        <i class="las la-list-alt"></i><span>Add Branch</span>
                                    </a>
                                </li>

                                <li class="{{ request()->routeIs('admin.branch.index*') ? 'active' : '' }}">
                                    <a href="{{route('admin.branch.index')}}">
                                        <i class="las la-list-alt"></i><span>All Branch</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                         <li>
                            <a href="#floor" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <i class="fas fa-building"></i><span>Floor</span>
                                <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                            </a>
                            <ul id="floor" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="{{ request()->routeIs('admin.floor.create*') ? 'active' : '' }}">
                                    <a href="{{route('admin.floor.create')}}">
                                        <i class="las la-list-alt"></i><span>Add Floor</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#supplier" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <i class="fab fa-product-hunt"></i><span>Supplier</span>
                                <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                            </a>
                            <ul id="supplier" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                            <li class="{{ request()->routeIs('admin.supplier.create*') ? 'active' : '' }}">
                                    <a href="{{route('admin.supplier.create')}}">
                                        <i class="las la-list-alt"></i><span>Add Supplier</span>
                                    </a>
                                </li>
                                <li class="{{ request()->routeIs('admin.supplier.index*') ? 'active' : '' }}">
                                    <a href="{{route('admin.supplier.index')}}">
                                        <i class="las la-list-alt"></i><span>All Supplier</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                        <li>
                            <a href="#settings" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <i class="fas fa-cogs"></i><span>Settings</span>
                                <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                            </a>
                            <ul id="settings" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="{{ request()->routeIs('admin.settings.general*') ? 'active' : '' }} ">
                                    <a href="{{route('admin.settings.general')}}">
                                        <i class="las la-id-card"></i><span>General Settings</span>
                                    </a>
                                </li>
                                <li class="{{ request()->routeIs('currency*') ? 'active' : '' }}">
                                    <a href="{{route('currency')}}">
                                    <i class="far fa-money-bill-alt"></i><span>Currency</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#inventory" class="collapsed" data-toggle="collapse" aria-expanded="false">
                            <i class="fab fa-product-hunt"></i><span>Inventory</span>
                                <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                                <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                            </a>
                            <ul id="inventory" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="{{ request()->routeIs('admin.orderrecusition.manage*') ? 'active' : '' }}">
                                    <a href="{{route('admin.orderrecusition.manage')}}">
                                        <i class="las la-list-alt"></i><span>Order Recusition</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div class="p-3"></div>
            </div>
        </div>
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                        <i class="ri-menu-line wrapper-menu"></i>
                        <a href="index.html" class="header-logo">
                            <img src="{{asset('public/uploads/logo/'.$logos->logo)}}" class="img-fluid rounded-normal light-logo" alt="logo">
                            <img src="{{asset('public/backend')}}/assets/images/logo-white.png" class="img-fluid rounded-normal darkmode-logo" alt="logo">
                        </a>
                    </div>
                    <div class="iq-search-bar device-search">
                        <form action="#" class="searchbox">
                            <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                            <input type="text" class="text search-input" placeholder="Search here...">
                        </form>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="change-mode">
                            <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                                <div class="custom-switch-inner">
                                    <p class="mb-0"> </p>
                                    <input type="checkbox" class="custom-control-input" id="dark-mode" data-active="true">
                                    <label class="custom-control-label" for="dark-mode" data-mode="toggle">
                                        <span class="switch-icon-left"><i class="a-left ri-moon-clear-line"></i></span>
                                        <span class="switch-icon-right"><i class="a-right ri-sun-line"></i></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                            <i class="ri-menu-3-line"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                <li class="nav-item nav-icon search-content">
                                    <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-search-line"></i>
                                    </a>
                                    <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                        <form action="#" class="searchbox p-2">
                                            <div class="form-group mb-0 position-relative">
                                                <input type="text" class="text search-input font-size-12" placeholder="type here to search...">
                                                <a href="#" class="search-link"><i class="las la-search"></i></a>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li class="nav-item nav-icon dropdown">
                                    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-mail-line  bg-orange p-2 rounded-small"></i>
                                        <span class="bg-primary"></span>
                                    </a>
                                    <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <div class="card shadow-none m-0">
                                            <div class="card-body p-0 ">
                                                <div class="cust-title p-3">
                                                    <h5 class="mb-0">All Messages</h5>
                                                </div>
                                                <div class="p-3">
                                                    @php
                                                    $allmessage=App\Models\ContactMessage::where('is_seen',0)->orderBy('id','DESC')->get();
                                                    @endphp
                                                    @foreach($allmessage as $data)
                                                    <a href="{{route('admin.email')}}" class="iq-sub-card">
                                                        <div class="media align-items-center">
                                                            <div class="media-body ml-3">
                                                                <h6 class="mb-0 ">{!! Str::limit($data->message,25) !!}</h6>
                                                                <small class="float-left font-size-12">{{$data->created_at}}</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    @endforeach
                                                </div>
                                                <a class="right-ic btn btn-primary btn-block position-relative p-2" href="{{route('admin.email')}}" role="button">
                                                    <div class="dd-icon"><i class="las la-arrow-right mr-0"></i></div>
                                                    View All
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item iq-full-screen"><a href="#" class="" id="btnFullscreen"><i class="ri-fullscreen-line"></i></a></li>
                                <li class="caption-content">
                                    <a href="#" class="iq-user-toggle">
                                        <img src="{{asset('public/uploads/admin/'.Auth::user()->profile_photo_path)}}" class="img-fluid rounded" alt="user">
                                    </a>
                                    <div class="iq-user-dropdown">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center mb-0">
                                                <div class="header-title">
                                                    <h4 class="card-title mb-0">Profile</h4>
                                                </div>
                                                <div class="close-data text-right badge badge-primary cursor-pointer"><i class="ri-close-fill"></i></div>
                                            </div>
                                            <div class="data-scrollbar" data-scroll="2">
                                                <div class="card-body">
                                                    <div class="profile-header">
                                                        <div class="cover-container ">
                                                            <div class="media align-items-center mb-4">
                                                                <img src="{{asset('public/uploads/admin/'.Auth::user()->profile_photo_path)}}" alt="profile-bg" class="rounded img-fluid avatar-80">
                                                                <div class="media-body profile-detail ml-3">
                                                                    <h4>{{Auth::user()->name}}</h4>
                                                                    <div class="d-flex flex-wrap">
                                                                        <p class="mb-1">{{Auth::user()->userRole->role_name}}</p>
                                                                        <a href="{{ route('admin.logout') }}" class="ml-3">Sign Out</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6  col-6 pr-0">
                                                                <div class="profile-details text-center">
                                                                    <a href="{{url('admin/user/view/'.Auth::user()->id)}}" class="iq-sub-card bg-primary-light rounded-small p-2">
                                                                        <div class="rounded iq-card-icon-small">
                                                                            <i class="ri-file-user-line"></i>
                                                                        </div>
                                                                        <h6 class="mb-0">My Profile</h6>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6  col-md-6 col-6">
                                                                <div class="profile-details text-center">
                                                                    <a href="{{url('admin/user/edit/'.Auth::user()->id)}}" class="iq-sub-card bg-danger-light rounded-small p-2">
                                                                        <div class="rounded iq-card-icon-small">
                                                                            <i class="ri-profile-line"></i>
                                                                        </div>
                                                                        <h6 class="mb-0 ">Edit Profile</h6>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6  col-6 pr-0">
                                                                <div class="profile-details text-center">
                                                                    <a href="{{route('password.chamge')}}" class="iq-sub-card bg-success-light rounded-small p-2">
                                                                        <div class="rounded iq-card-icon-small">
                                                                            <i class="ri-account-box-line"></i>
                                                                        </div>
                                                                        <h6 class="mb-0 ">Change Password</h6>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="p-3"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- yieldd -->
        @yield('content')
        <!-- Media manager model start from here -->
        <div class="modal fade" id="imageuploadmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">File Manager</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="showImage">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary uploadbtn" data-toggle="modal" data-target="#imageuploadbtn" data-whatever="@mdo"><i class="fa fa-upload"></i>Upload Image</button>
                        <button type="button" class="btn btn-primary" id="usefile" data-dismiss="modal">Use File</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="imageuploadbtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Image Upload</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.media.file.upload')}}" id="store_media_form" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                <small class="header_error text-danger"></small>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Upload Image</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="">SoftWare Version: 1.1</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    Copyright 2020 <a href="#">DurbarIt</a> All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>
    @include('../layouts/inc/footer_menu')
    <!-- Backend Bundle JavaScript -->
    <script src="{{asset('public/backend')}}/assets/js/backend-bundle.min.js"></script>
    <!-- Flextree Javascript-->
    <script src="{{asset('public/backend')}}/assets/js/flex-tree.min.js"></script>
    <script src="{{asset('public/backend')}}/assets/js/tree.js"></script>
    <script src="{{asset('public/backend')}}/assets/Bootstrap-4-Tag-Input-Plugin-jQuery/tagsinput.js"></script>
    <!-- Table Treeview JavaScript -->
    <script src="{{asset('public/backend')}}/assets/js/table-treeview.js"></script>
    <!-- Masonary Gallery Javascript -->
    <script src="{{asset('public/backend')}}/assets/js/masonry.pkgd.min.js"></script>
    <script src="{{asset('public/backend')}}/assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- Mapbox Javascript -->
    <script src="{{asset('public/backend')}}/assets/js/mapbox-gl.js"></script>
    <script src="{{asset('public/backend')}}/assets/js/mapbox.js"></script>
    <!-- Fullcalender Javascript -->
    <script src="{{asset('public/backend')}}//assets/vendor/fullcalendar/core/main.js"></script>
    <script src="{{asset('public/backend')}}//assets/vendor/fullcalendar/daygrid/main.js"></script>
    <script src="{{asset('public/backend')}}/assets/vendor/fullcalendar/timegrid/main.js"></script>
    <script src="{{asset('public/backend')}}/assets/vendor/fullcalendar/list/main.js"></script>
    <!-- SweetAlert JavaScript -->
    <script src="{{asset('public/backend')}}/assets/js/sweetalert.js"></script>
    <!-- Vectoe Map JavaScript -->
    <script src="{{asset('public/backend')}}/assets/js/vector-map-custom.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{asset('public/backend')}}/assets/js/customizer.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{asset('public/backend')}}/assets/js/chart-custom.js"></script>
    <!-- slider JavaScript -->
    <script src="{{asset('public/backend')}}/assets/js/slider.js"></script>
    <!-- alert -->
    <script src="{{asset('public/backend')}}/assets/js/izitost.js"></script>
    <!-- ckeditor js -->
    <script src="{{asset('public/backend')}}/assets/js/ckeditor.js"></script>
    <script>
        @if(Session::has('messege'))
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
            case 'success':
                iziToast.success({
                    message: '{{ Session::get('messege')}}',
                    'position': 'topCenter'
                });
                brack;
            case 'info':
                iziToast.info({
                    message: '{{ Session::get('messege')}}',
                    'position': 'topRight'
                });
                brack;
            case 'warning':
                iziToast.warning({
                    message: '{{ Session::get('messege')}}',
                    'position': 'topRight'
                });
                break;
            case 'error':
                iziToast.error({
                    message: '{{ Session::get('messege')}}',
                    'position': 'topRight'
                });
                break;
        }
        @endif
    </script>
    <script src="{{asset('public/backend')}}/assets/js/sweetalert.min.js"></script>
    <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                    title: "Are you Want to delete?",
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal("Safe Data!");
                    }
                });
        });
    </script>
    <!-- show media file -->
    <script>
        window.onload = function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'get',
                url: "{{ route('admin.media.file.show') }}",
                success: function(data) {
                    $('#showImage').html(data);
                }
            });
        };
    </script>
    <!-- store media file -->
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('submit', '#store_media_form', function(e) {
                e.preventDefault();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                console.log(request);
                $.ajax({
                    url: url,
                    type: type,
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        $('#showImage').html(data);
                        $('#imageuploadbtn').modal('hide');
                        setInterval(function() {
                        }, 700);
                    },
                    error: function(err) {
                        if (err.responseJSON.errors.image) {
                            $('.header_error').html('The image field is required');
                        }
                    }
                });
            });
        });
    </script>
    <!-- pagination area start -->
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.pagination-item', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url: url,
                    type: "get",
                    success: function(data) {
                        $('#showImage').html(data);
                        $('#imageuploadbtn').modal('hide');
                    },
                });
            });
        });
    </script>
    <!-- SHOW MEDIA FIELE -->
    <script>
        function deleteImg(el) {
            $(el).closest('.img_item').remove();
            var id = $(el).attr("data-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ url('admin/media/manager/delete') }}/" + id,
                success: function(data) {
                    $('#showImage').html(data);
                }
            });
        }
    </script>

    <!-- push js -->
    @yield('scripts')
    <!-- date piker js -->
    <script src="{{asset('public/backend')}}/assets/js/datepiker.js"></script>
    <!-- app JavaScript -->
    <script src="{{asset('public/backend')}}/assets/js/app.js"></script>
</body>
</html>