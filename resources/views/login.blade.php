<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ReSAS Portal</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('css/horizontal-layout/materialdesignicons.css')}}">
    <link rel="stylesheet" href="{{url('vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{url('css/horizontal-layout/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{url('images/favicon.png')}}" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-3">
                        <div class="brand-logo">
                            <img src="" alt="Evas logo">
                        </div>
                        <h4>Welcome back!</h4>

                        <form class="pt-3" action="{{'login' }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail">{{ __('E-Mail Address') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="fa fa-envelope"></i>
                      </span>
                                    </div>
                                    <input type="text" name="email" class="form-control form-control-lg border-left-0 @error('email') is-invalid @enderror" id="emailAddress" placeholder="Email Address" value="{{ old('email') }}" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword">{{ __('Password') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="fa fa-lock "></i>
                      </span>
                                    </div>
                                    <input type="password" name="password" class="form-control form-control-lg border-left-0 @error('password') is-invalid @enderror" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input">
                                        Keep me signed in
                                    </label>
                                </div>
                                <a href="#" class="auth-link text-black" data-toggle="modal" data-target="#forgotModal">Forgot password?</a>
                            </div>
                            <div class="my-3">
                                <button type="submit" class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">LOGIN</a>
                            </div>
                            <!---
                            <div class="mb-2 d-flex">
                              <button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">
                                <i class="mdi mdi-facebook mr-2"></i>Facebook
                              </button>
                              <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
                                <i class="mdi mdi-google mr-2"></i>Google
                              </button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                              Forgot your password? <a href="" class="text-primary">Reset</a>
                            </div>
                          -->
                        </form>
                    </div>
                </div>

                <!-- The Modal -->
                <div class="modal" id="forgotModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Reset your password</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>

                                    <button type="submit" class="btn btn-success">Submit</button>

                                </form>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 login-half-bg d-flex flex-row">

                    <p class="text-white font-weight-medium text-center flex-grow align-self-end">
                        Evas is a product of Westpoint Consult Ltd. It is a corporation organized and existing
                        under the laws of the Federal Republic of Nigeria with its head office located at: Cadastral Zone Fo3
                        Usman District-Onex Abuja.
                        <br>
                        Copyright &copy; {{date('Y')}}  All rights reserved.
                    </p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{url('vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{url('js/off-canvas.js')}}"></script>
<script src="{{url('js/hoverable-collapse.js')}}"></script>
<script src="{{url('js/template.js')}}"></script>
<script src="{{url('js/settings.js')}}"></script>
<script src="{{url('js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<!-- End custom js for this page-->
</body>

</html>
