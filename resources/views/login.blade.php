<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="{{ asset('menu_2') }}/assets/images/favicon_1.ico">

    <title>Masuk Dulu</title>

    <link href="{{ asset('menu_2') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    <script src="{{ asset('menu_2') }}/assets/js/modernizr.min.js"></script>

</head>

<body>

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class=" card-box">
            <div class="panel-heading">
                <h3 class="text-center"> {{ __('Login') }} <strong class="text-custom"></strong> </h3>
            </div>


            <div class="panel-body">
                <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <input class="form-control" required="" placeholder="Username" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  required="" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light"
                                type="submit">{{ __('Login') }}</button>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                        </div>
                    </div>

                    <div class="form-group m-t-30 m-b-0">
                        <div class="col-sm-12">
                            <a href="{{ asset('menu_2') }}/page-recoverpw.html" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot your
                                password?</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <p>Don't have an account? <a href="{{ asset('menu_2') }}/page-register.html" class="text-primary m-l-5"><b>Sign Up</b></a></p>

            </div>
        </div>

    </div>




    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="{{ asset('menu_2') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('menu_2') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('menu_2') }}/assets/js/detect.js"></script>
    <script src="{{ asset('menu_2') }}/assets/js/fastclick.js"></script>
    <script src="{{ asset('menu_2') }}/assets/js/jquery.slimscroll.js"></script>
    <script src="{{ asset('menu_2') }}/assets/js/jquery.blockUI.js"></script>
    <script src="{{ asset('menu_2') }}/assets/js/waves.js"></script>
    <script src="{{ asset('menu_2') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('menu_2') }}/assets/js/jquery.nicescroll.js"></script>
    <script src="{{ asset('menu_2') }}/assets/js/jquery.scrollTo.min.js"></script>


    <script src="{{ asset('menu_2') }}/assets/js/jquery.core.js"></script>
    <script src="{{ asset('menu_2') }}/assets/js/jquery.app.js"></script>

</body>

</html>
