<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="{{ asset('menu_2') }}/assets/images/users/user.png">

    <title>Masuk Kepegawaian CV Hasil Utama</title>

    <link href="{{ asset('menu_2') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <script src="{{ asset('menu_2') }}/assets/js/modernizr.min.js"></script>

</head>

<body>

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class="card-box">
            <div class="panel-heading">
                <h3 class="text-center"> {{ __('CV HASIL UTAMA KONSULTAN') }} <strong class="text-custom"></strong>
                </h3>

            </div>
        </div>
        <div class="card-box">
        <h5>Masukan email dan password anda</h5>

                <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <label for="email" class="col-form-label text-md-right"></label>
                            <input class="form-control" required="" placeholder="Username" id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" required="" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-inverse btn-block btn-custom waves-effect waves-light" type="submit">{{ __('Login') }}</button>
                            {{-- <button class="btn btn-blue btn-block text-uppercase waves-effect waves-light"
                                type="submit">{{ __('Login') }}</button> --}}
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">

                            </a>
                            @endif
                        </div>
                    </div>


                </form>


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
