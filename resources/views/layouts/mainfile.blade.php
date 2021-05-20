<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title',$seo->meta_title)</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('public/uploads/logo/'.$logos->favicon)}}" />

    <link rel="stylesheet" href="{{asset('public/backend')}}/assets/css/backend.css?v=1.0.1">
    <link rel="stylesheet" href="{{asset('public/backend')}}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{asset('public/backend')}}/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{asset('public/backend')}}/assets/vendor/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="{{asset('public/backend')}}/assets/vendor/@icon/dripicons/dripicons.css">

    <link rel='stylesheet' href="{{asset('public/backend')}}/assets/vendor/fullcalendar/core/main.css" />
    <link rel='stylesheet' href="{{asset('public/backend')}}/assets/vendor/fullcalendar/daygrid/main.css" />
    <link rel='stylesheet' href="{{asset('public/backend')}}/assets/vendor/fullcalendar/timegrid/main.css" />
    <link rel='stylesheet' href="{{asset('public/backend')}}/assets/vendor/fullcalendar/list/main.css" />
    <link rel="stylesheet" href="{{asset('public/backend')}}/assets/vendor/mapbox/mapbox-gl.css">
    <link rel="stylesheet" href="{{asset('public/backend')}}/assets/css/izitost.css">
    <link rel="stylesheet" href="{{asset('public/backend')}}/slick.css">
    <link rel="stylesheet" href="{{asset('public/backend')}}/slick-theme.css">
    <link rel="stylesheet" href="{{asset('public/backend')}}/assets/Bootstrap-4-Tag-Input-Plugin-jQuery/tagsinput.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;1,400&display=swap" rel="stylesheet">
</head>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <style>
        .form-control {
            border: 1px solid #443f3f;
        }

        .title-area {
            display: block;
            font-family: "Poppins", sans-serif;
            font-size: 22px;
            font-weight: 700;
            color: #374a5e;
        }

        .card_overlay {
            position: relative;
            overflow: hidden;
        }

        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0;
            transition: .5s ease;
            background-color: #05bbc9;
        }

        .card_overlay:hover .overlay {
            opacity: .5;
        }

        .overlay h3 {
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .slick-arrow {
            padding: 0 1%;
            line-height: 270%;
            /* border: 1px solid #535f6b; */
            border-radius: 50%;
            margin-right: 10px;

        }

        .card.card-block.card_overlay.asifvai {
            background: #f0f7ff;
        }

        .white-bg-menu .iq-menu-horizontal .iq-sidebar-menu .iq-menu>li {
            margin-right: 45px;
        }
        .admin_center{
            position: absolute;
            top: 10%;
            left: 20%;
            right: 20%;
            bottom: 10%;
            text-align: center;
        }
        .admin_img{
            padding: 5% 0;
        }
    </style>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">

        @php
        $roleid=Auth::user()->user_role;
        $access=App\Models\UserRole::where('id',$roleid)->first();

        @endphp

        <div class="container">
            <div class="admin_center">

                <div class="row">

                    @if($access->admin==1)
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="{{url('admin/dashboard')}}">
                            <div class="card card-block card_overlay">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="admin_img" >
                                            <img src="{{asset('public/backend/assets/admin/admin.png')}}" alt="" />
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="mb-1 title-area">Admin</h3>
                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @else
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="">
                            <div class="card card-block card_overlay asifvai">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="">
                                            <img src="{{asset('public/backend/assets/admin/admin.jpg')}}" alt="" />
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="mb-1 title-area"><i class="fa fa-times" style="color:red"></i>Admin</h3>
                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif


                    @if($access->front_office==1)
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="{{route('admin.hotel')}}">
                            <div class="card card-block card_overlay">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="admin_img">
                                            <img src="{{asset('public/backend/assets/admin/front-office.png')}}" alt="" />
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="mb-1 title-area">Front Office</h3>
                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                    @else
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="#">
                            <div class="card card-block card_overlay asifvai">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="admin_img">
                                            <img src="{{asset('public/backend/assets/admin/front-office.jpg')}}" alt="" />
                                        </div>
                                        <div class="mt-4">

                                            <h3 class="mb-1 title-area"><i class="fa fa-times" style="color:red"></i> Front Office</h3>

                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                    @endif


                    @if($access->food_beverage==1)
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="{{route('admin.foodandbeverage.create')}}">
                            <div class="card card-block card_overlay">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="admin_img">
                                            <img src="{{asset('public/backend/assets/admin/foodandbav.png')}}" alt="" />
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="mb-1 title-area">Food & Beverage</h3>
                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                    @else
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="">
                            <div class="card card-block card_overlay asifvai">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="admin_img">
                                            <img src="{{asset('public/backend/assets/admin/foodandbav.png')}}" alt="" />
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="mb-1 title-area"><i class="fa fa-times" style="color:red"></i> Food & Beverage</h3>
                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                    @endif


                    @if($access->house_kipping==1)
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="{{route('admin.housekipping.home')}}">
                            <div class="card card-block card_overlay">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="admin_img">
                                            <img src="{{asset('public/backend/assets/admin/housekeeper.png')}}" alt="" />
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="mb-1 title-area">House Keeping</h3>
                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                    @else
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="#">
                            <div class="card card-block card_overlay asifvai">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="admin_img">
                                            <img src="{{asset('public/backend/assets/admin/housekeeper.png')}}" alt="" />
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="mb-1 title-area"><i class="fa fa-times" style="color:red"></i> House Keeping</h3>
                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>

                    @endif


                    @if($access->restuarent==1)
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="{{route('admin.chui.restaurant')}}">
                            <div class="card card-block card_overlay">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="admin_img">
                                            <img src="{{asset('public/backend/assets/admin/restaurant.png')}}" alt="" />
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="mb-1 title-area">Restaurant</h3>
                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @else
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="#">
                            <div class="card card-block card_overlay asifvai">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="admin_img">
                                            <img src="{{asset('public/backend/assets/admin/restaurant.png')}}" alt="" />
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="mb-1 title-area"><i class="fa fa-times" style="color:red"></i> Restaurant</h3>
                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endif




                    @if($access->payroll==1)
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="{{route('admin.payroll.index')}}">
                            <div class="card card-block card_overlay">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="admin_img">
                                            <img src="{{asset('public/backend/assets/admin/payroll.png')}}" alt="" />
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="mb-1 title-area">Payroll</h3>
                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                    @else
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="#">
                            <div class="card card-block card_overlay asifvai">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="admin_img">
                                            <img src="{{asset('public/backend/assets/admin/payroll.png')}}" alt="" />
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="mb-1 title-area"><i class="fa fa-times" style="color:red"></i> Payroll</h3>
                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                    @if($access->banquet==1)
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="{{route('admin.banquet.dashboard')}}">
                            <div class="card card-block card_overlay">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="admin_img">
                                            <img src="{{asset('public/backend/assets/admin/banquet.png')}}" alt="" />
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="mb-1 title-area">Banquet</h3>
                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                    @else
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="#">
                            <div class="card card-block card_overlay asifvai">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="admin_img">
                                            <img src="{{asset('public/backend/assets/admin/banquet.png')}}" alt="" />
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="mb-1 title-area"><i class="fa fa-times" style="color:red"></i> Banquet</h3>
                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                    @endif


                    @if($access->accounts==1)
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="{{route('admin.account.home')}}">
                            <div class="card card-block card_overlay">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="admin_img">
                                            <img src="{{asset('public/backend/assets/admin/account.png')}}" alt="" />
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="mb-1 title-area">Accounts</h3>
                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                    @else
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="">
                            <div class="card card-block card_overlay asifvai">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="admin_img">
                                            <img src="{{asset('public/backend/assets/admin/account.png')}}" alt="" />
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="mb-1 title-area"><i class="fa fa-times" style="color:red"></i> Accounts</h3>
                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>

                    @endif



                    @if($access->inventory==1)
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="{{route('admin.inventory.home')}}">
                            <div class="card card-block card_overlay">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="admin_img">
                                            <img src="{{asset('public/backend/assets/admin/inventory.png')}}" alt="" />
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="mb-1 title-area">Inventory</h3>
                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>

                    @else
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="#">
                            <div class="card card-block card_overlay asifvai">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="admin_img">
                                            <img src="{{asset('public/backend/assets/admin/inventory.png')}}" alt="" />
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="mb-1 title-area"><i class="fa fa-times" style="color:red"></i> Inventory</h3>
                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                    @endif


                    @if($access->stock==1)
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="{{route('admin.physicalstock.dashboard')}}">
                            <div class="card card-block card_overlay">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="admin_img">
                                            <img src="{{asset('public/backend/assets/admin/stock.png')}}" alt="" />
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="mb-1 title-area">Stock</h3>
                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @else
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <a href="#">
                            <div class="card card-block card_overlay asifvai">
                                <div class="card-body p-0">
                                    <div class="top-block-one text-center">
                                        <div class="admin_img">
                                            <img src="{{asset('public/backend/assets/admin/stock.png')}}" alt="" />
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="mb-1 title-area"> <i class="fa fa-times" style="color:red"></i> Stock</h3>
                                        </div>
                                    </div>
                                    <div class="overlay">

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endif
                </div>

            </div>
        </div>
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

        <script>
            @if(Session::has('messege'))
            var type = "{{Session::get('alert-type','info')}}"
            switch (type) {
                case 'success':

                    iziToast.success({
                        message: '{{ Session::get('
                        messege ')}}',
                        'position': 'topCenter'
                    });
                    brack;
                case 'info':
                    iziToast.info({
                        message: '{{ Session::get('
                        messege ') }}',
                        'position': 'topRight'
                    });
                    brack;
                case 'warning':
                    iziToast.warning({
                        message: '{{ Session::get('
                        messege ') }}',
                        'position': 'topRight'
                    });
                    break;
                case 'error':
                    iziToast.error({
                        message: '{{ Session::get('
                        messege ') }}',
                        'position': 'topRight'
                    });
                    break;
            }
            @endif
        </script>
        <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
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


        <!-- app JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

        <script src="{{asset('public/backend')}}/assets/js/app.js"></script>
        <script src="{{asset('public/backend')}}/slick.js"></script>
        <script>
            $(document).ready(function() {


                $('.slick_slider').slick({
                    slidesToShow: 8,
                    slidesToScroll: 8,
                    infinite: true,
                    speed: 300,
                    nextArrow: '<i class="fas fa-arrow-right"></i>',
                    prevArrow: '<i class="fas fa-arrow-left"></i>'
                });
            });
        </script>


</body>

</html>