<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>LGA Revenue Stream Portal</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{url('vendors/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{url('vendors/css/vendor.bundle.base.css')}}">
        <link rel="stylesheet" href="{{url('vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{url('vendors/jquery-toast-plugin/jquery.toast.min.css')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{url('vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{url('css/horizontal-layout/style.css')}}">
        <link rel="stylesheet" href="{{url('css/horizontal-layout/evas-style.css')}}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{url('images/favicon.ico')}}" />
    </head>
    <body>
        <div class="container-scroller">
            <!-- partial:partials/_horizontal-navbar.html -->
            <div class="horizontal-menu">
                <nav class="navbar top-navbar col-lg-12 col-12 p-0">
                    <div class="container">
                        <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
                            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                                <a class="navbar-brand brand-logo" href="{{url('/dashboard')}}"><img src="../../images/logo/evas_logo_max.png" alt="logo"/> &nbsp; 
                                    Revenue Stream Automation System
                                </a>

                                <a class="navbar-brand brand-logo-mini" href="{{url('/dashboard')}}"><img src="../../images/logo/evas_logo_min.png" alt="logo"/></a>

                            </div>
                            <ul class="navbar-nav navbar-nav-right">

                                <li class="nav-item nav-profile dropdown">
                                    <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown" style="color:#fff">
                                        <img src="../../images/user.png" alt="profile"/>
                                        <span class="nav-profile-name">Evan Morales &nbsp; <i class="fa fa-caret-down"></i></a></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                        <a class="dropdown-item" href="#">
                                            <i class="fa fa-money text-primary"></i>
                                            Sales
                                        </a>

                                        <a class="dropdown-item">
                                            <i class="fa fa-key text-primary"></i>
                                            Change password
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item">
                                            <i class="fa fa-lock text-primary"></i>
                                            Logout
                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item nav-toggler-item-right d-lg-none">
                                    <button class="navbar-toggler align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                                        <span class="mdi mdi-menu"></span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
               @include('general.menu_content')
            </div>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <div class="main-panel">
                @include('general.flash')
                @yield('main_content')
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <footer class="footer text-white">
                        <div class="w-100 clearfix">
                            <h3 class="card-title color-white">ReSAS</h3>
                            <span class="color-white d-block text-left text-sm-left d-sm-inline-block font-weight-normal">
                                ReSAS is a product of Westpoint Consult Ltd. It is a corporation organized and existing<br>
                                under the laws of the Federal Republic of Nigeria with its head office located at: Cadastral Zone Fo3 <br>
            Usman District-Onex Abuja.
                            </span>
                            <span class="float-none float-sm-center d-block mt-1 mt-sm-0 text-right color-white">West Point Consult Copyright ©  <?=date("Y") ?> All rights reserved.</span>
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->


        <!-- plugins:js -->

        <script src="{{url('/vendors/js/vendor.bundle.base.js')}}"></script>

        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{url('vendors/chart.js/Chart.min.js')}}"></script>
        <script src="{{url('/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{url('/js/off-canvas.js')}}"></script>
        <script src="{{url('/js/hoverable-collapse.js')}}"></script>
        <script src="{{url('/js/template.js')}}"></script>
        <script src="{{url('/js/settings.js')}}"></script>
        <script src="{{url('/js/todolist.js')}}"></script>
        <script src="{{url('vendors/datatables.net/jquery.dataTables.js')}}"></script>
        <script src="{{url('vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
        <script src="{{url('vendors/jquery-toast-plugin/jquery.toast.min.js')}}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{url('js/dashboard.js')}}"></script>
        <script src="{{url('/js/todolist.js')}}"></script>
        @yield('js')
        <!-- End custom js for this page-->
    </body>

</html>
