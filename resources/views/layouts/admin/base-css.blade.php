<!-- GLOBAL MAINLY STYLES-->
<link href="{{asset('')}}dash/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="{{asset('')}}dash/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<link href="{{asset('')}}dash/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
<!-- THEME STYLES-->
<link href="{{asset('')}}dash/assets/css/main.css" rel="stylesheet" />
<!-- PAGE LEVEL STYLES-->
@yield('style_page')
@guest
    <link href="{{asset('')}}dash/assets/css/pages/auth-light.css" rel="stylesheet" />
@endguest
<link href="{{asset('')}}dash/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
<!-- pnotify  -->
<link rel="stylesheet" type="text/css" href="{{asset('')}}dash/plugins/pnotify/pnotify.min.css"/>
