<!doctype html>
<html lang="en">

<!-- Mirrored from demo.dashboardpack.com/adminty-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Mar 2022 17:40:23 GMT -->
<!-- Added by HTTrack -->
<head>
    <title> Admin: Ahmed Salha &copy; </title>




    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">

    <link rel="icon" href="{{asset('files/assets/images/favicon.ico')}}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('files/assets/icon/feather/css/feather.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/files/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/jquery.mCustomScrollbar.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">



    <link rel="stylesheet" type="text/css" href="{{asset('/files/bower_components/font-awesome/css/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/files/assets/pages/advance-elements/css/bootstrap-datetimepicker.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/files/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('/files/bower_components/datedropper/datedropper.min.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/files/assets/icon/themify-icons/themify-icons.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/files/assets/icon/icofont/css/icofont.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/files/assets/css/component.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/files/assets/css/sweetalert.css')}}">


    <link href="{{ asset('files/assets/bootstrap-fileinput/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    @yield('style')
    @livewireStyles

</head>


<body>

<div class="theme-loader">
<div class="ball-scale">
    <div class='contain'>
        <div class="ring">
            <div class="frame"></div>
        </div>
        <div class="ring">
            <div class="frame"></div>
        </div>
        <div class="ring">
            <div class="frame"></div>
        </div>
        <div class="ring">
            <div class="frame"></div>
        </div>
        <div class="ring">
            <div class="frame"></div>
        </div>
        <div class="ring">
            <div class="frame"></div>
        </div>
        <div class="ring">
            <div class="frame"></div>
        </div>
        <div class="ring">
            <div class="frame"></div>
        </div>
        <div class="ring">
            <div class="frame"></div>
        </div>
        <div class="ring">
            <div class="frame"></div>
        </div>
    </div>
</div>
</div>

<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
@include('partial.header')
        @include('partial.sidebar')

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
@include('partial.navbar')
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                @yield('content')



                            </div>
                            <div id="styleSelector">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript" src="{{asset('/files/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/bower_components/popper.js/dist/umd/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<script type="text/javascript"
        src="{{asset('/files/bower_components/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<script type="text/javascript" src="{{asset('/files/bower_components/modernizr/modernizr.js')}}"></script>
<script type="text/javascript"
        src="{{asset('/files/bower_components/modernizr/feature-detects/css-scrollbars.js')}}"></script>

<script type="text/javascript" src="{{asset('/files/assets/js/sweetalert.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/assets/js/modal.js')}}"></script>


<script type="text/javascript" src="{{asset('/files/assets/js/modalEffects.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/assets/js/classie.js')}}"></script>


<script type="text/javascript" src="{{asset('/files/bower_components/i18next/i18next.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('/files/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('/files/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js')}}">
    <script type="text/javascript" src="{{asset('/files/bower_components/jquery-i18next/jquery-i18next.min.js')}}"></script>


<script type="text/javascript" src="{{asset('/files/assets/js/common-pages.js')}}"></script>

<script src="{{ asset('files/assets/js/custom.js') }}"></script>
<script src="{{URL::asset('files/assets/pages/notification/notification.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/assets/js/bootstrap-growl.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/bower_components/pnotify/dist/pnotify.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/bower_components/pnotify/dist/pnotify.desktop.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/bower_components/pnotify/dist/pnotify.buttons.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/bower_components/pnotify/dist/pnotify.confirm.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/bower_components/pnotify/dist/pnotify.callbacks.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/bower_components/pnotify/dist/pnotify.animate.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/bower_components/pnotify/dist/pnotify.history.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/bower_components/pnotify/dist/pnotify.mobile.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/bower_components/pnotify/dist/pnotify.nonblock.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/assets/pages/pnotify/notify.js')}}"></script>


<script type="text/javascript" src="{{asset('/files/assets/pages/advance-elements/moment-with-locales.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/assets/pages/advance-elements/bootstrap-datetimepicker.min.js')}}"></script>

<script type="text/javascript" src="{{asset('/files/bower_components/modernizr/feature-detects/css-scrollbars.js')}}"></script>


<script src="{{asset('/files/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/files/assets/pages/data-table/js/jszip.min.js')}}"></script>
<script src="{{asset('/files/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
<script src="{{asset('/files/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
<script src="{{asset('/files/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/files/assets/pages/data-table/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>




<script type="text/javascript" src="{{asset('/files/bower_components/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/files/assets/pages/rating/rating.js')}}"></script>

<script type="text/javascript" src="{{asset('/files/bower_components/slick-carousel/slick/slick.min.js')}}"></script>

<script type="text/javascript" src="{{asset('/files/assets/pages/product-detail/product-detail.js')}}"></script>
<script src="{{asset('../files/assets/pages/data-table/js/data-table-custom.js')}}"></script>

<script src="{{asset('/files/assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('/files/assets/js/vartical-layout.min.js')}}"></script>
<script src="{{asset('/files/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<script type="text/javascript" src="{{asset('/files/assets/js/script.js')}}"></script>

//file input
<script src="{{ asset('files/assets/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
<script src="{{ asset('files/assets/bootstrap-fileinput/themes/fa/theme.js') }}"></script>

@yield('script')

@livewireScripts

</body>
</html>
