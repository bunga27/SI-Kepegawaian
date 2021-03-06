<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <title>@yield('title')</title>



    <link rel="shortcut icon" href="{{ asset('menu_2') }}/assets/images/users/user.png">

    <!-- Plugin Css-->
    <link rel="stylesheet" href="{{ asset('menu_2') }}/assets/plugins/magnific-popup/css/magnific-popup.css" />
    <link rel="stylesheet" href="{{ asset('menu_2') }}/assets/plugins/jquery-datatables-editable/datatables.css" />

    <!--calendar css-->
    <link href="{{ asset('menu_2') }}/assets/plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet" />


    <link href="{{ asset('menu_2') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{ asset('menu_2') }}/assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet"
        type="text/css" />

    <link href="{{ asset('menu_2') }}/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css"
        rel="stylesheet" />
    <link href="{{ asset('menu_2') }}/assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" />
    <link href="{{ asset('menu_2') }}/assets/plugins/multiselect/css/multi-select.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('menu_2') }}/assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
    <link href="{{ asset('menu_2') }}/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css"
        rel="stylesheet" />

    <link href="{{ asset('menu_2') }}/assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="{{ asset('menu_2') }}/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"
        rel="stylesheet">
    <link href="{{ asset('menu_2') }}/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css"
        rel="stylesheet">
    <link href="{{ asset('menu_2') }}/assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <link href="{{ asset('menu_2') }}/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">


    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    <script src="{{ asset('menu_2') }}/assets/js/modernizr.min.js"></script>

</head>


<body>
<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container">

            <!-- Logo container-->
            <div class="logo">
                <a href="/home" class="logo"><span><i class="md md-home" ></i>Hasil Utama</span></a>
            </div>
            <!-- End Logo container-->
            <div class="menu-extras">

                <ul class="nav navbar-nav navbar-right pull-right">

                    <li class="dropdown navbar-c-items">

                        <a href="" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown"
                            aria-expanded="true"><img src="{{ asset('menu_2') }}/assets/images/users/user.png"
                                alt="user-img" class="img-circle"> <span>{{ auth()->user()->pegawai->nama }}</span> </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/profil ">
                                <span> Profil </span>
                            </li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="ti-power-off text-danger m-r-10"></i>
                                    {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="menu-item">
                    <!-- Mobile menu toggle-->

                    <!-- End mobile menu toggle-->
                </div>
            </div>

        </div>
    </div>
</header>
<!-- End Navigation Bar-->

    <div class="wrapper">
        <div class="container">



            <div class="row">
                <div class="col-sm-12">

                    <div class="card-box">

                        @yield('content')

                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer text-right">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6">
                            CV. Hasil Utama Konsultan
                        </div>
                        <div class="col-xs-6">
                            <ul class="pull-right list-inline m-b-0">
                                <li>
                                    <a>Bunga Nanda Tiani</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer -->

        </div>
    </div>


    <script src="{{ asset('menu_2') }}/assets/plugins/moment/moment.js"></script>
    <script src='{{ asset('menu_2') }}/assets/plugins/fullcalendar/js/fullcalendar.min.js'></script>
    <script src="{{ asset('menu_2') }}/assets/pages/jquery.fullcalendar.js"></script>
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

    <script src="{{ asset('menu_2') }}/assets/plugins/peity/jquery.peity.min.js"></script>

    <!-- jQuery  -->
    <script src="{{ asset('menu_2') }}/assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/counterup/jquery.counterup.min.js"></script>

    <script src="{{ asset('menu_2') }}/assets/plugins/jquery-knob/jquery.knob.js"></script>
    <script src="{{ asset('menu_2') }}/assets/js/jquery.core.js"></script>
    <script src="{{ asset('menu_2') }}/assets/js/jquery.app.js"></script>

    <script src="{{ asset('menu_2') }}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/datatables/dataTables.bootstrap.js"></script>

    <script src="{{ asset('menu_2') }}/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/datatables/buttons.bootstrap.min.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/datatables/jszip.min.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/datatables/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/datatables/responsive.bootstrap.min.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/datatables/dataTables.scroller.min.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/datatables/dataTables.colVis.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

    <script src="{{ asset('menu_2') }}/assets/pages/datatables.init.js"></script>

    <script src="{{ asset('menu_2') }}/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/switchery/js/switchery.min.js"></script>
    <script type="text/javascript" src="{{ asset('menu_2') }}/assets/plugins/multiselect/js/jquery.multi-select.js">
    </script>
    <script type="text/javascript" src="{{ asset('menu_2') }}/assets/plugins/jquery-quicksearch/jquery.quicksearch.js">
    </script>
    <script src="{{ asset('menu_2') }}/assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/bootstrap-select/js/bootstrap-select.min.js"
        type="text/javascript"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"
        type="text/javascript"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"
        type="text/javascript"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"
        type="text/javascript"></script>

    <script type="text/javascript" src="{{ asset('menu_2') }}/assets/plugins/autocomplete/jquery.mockjax.js">
    </script>
    <script type="text/javascript" src="{{ asset('menu_2') }}/assets/plugins/autocomplete/jquery.autocomplete.min.js">
    </script>
    <script type="text/javascript" src="{{ asset('menu_2') }}/assets/plugins/autocomplete/countries.js"></script>
    <script type="text/javascript" src="{{ asset('menu_2') }}/assets/pages/autocomplete.js"></script>

    <script type="text/javascript" src="{{ asset('menu_2') }}/assets/pages/jquery.form-advanced.init.js"></script>

    <script src="{{ asset('menu_2') }}/assets/plugins/moment/moment.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/timepicker/bootstrap-timepicker.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js">
    </script>
    <script src="{{ asset('menu_2') }}/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="{{ asset('menu_2') }}/assets/pages/jquery.form-pickers.init.js"></script>

    <script src="{{ asset('menu_2') }}/assets/plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/tiny-editable/mindmup-editabletable.js"></script>
    <script src="{{ asset('menu_2') }}/assets/plugins/tiny-editable/numeric-input-example.js"></script>

    <script src="assets/pages/datatables.editable.init.js"></script>
    <script>
        $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
                        $('#datatable').dataTable();
                        $('#datatable-keytable').DataTable({keys: true});
                        $('#datatable-responsive').DataTable();
                        $('#datatable-colvid').DataTable({
                            "dom": 'C<"clear">lfrtip',
                            "colVis": {
                                "buttonText": "Change columns"
                            }
                        });
                        $('#datatable-scroller').DataTable({
                            ajax: "{{ asset('menu_2') }}/assets/plugins/datatables/json/scroller-demo.json",
                            deferRender: true,
                            scrollY: 380,
                            scrollCollapse: true,
                            scroller: true
                        });
                        var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                        var table = $('#datatable-fixed-col').DataTable({
                            scrollY: "300px",
                            scrollX: true,
                            scrollCollapse: true,
                            paging: false,
                            fixedColumns: {
                                leftColumns: 1,
                                rightColumns: 1
                            }
                        });
                    });
                    TableManageButtons.init();

    </script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
    </script>

    <script src="{{ asset('menu_2') }}assets/plugins/smoothproducts/js/smoothproducts.min.js"></script>
    <script type="text/javascript">
        // wait for images to load
                $(window).load(function() {
                    $('.sp-wrap').smoothproducts();
                });
    </script>

    <script>
        var loadFile = function(event){
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>


</body>

</html>
