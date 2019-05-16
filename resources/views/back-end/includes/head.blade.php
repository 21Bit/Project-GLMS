<meta charset="utf-8" />
<title>@yield('title')</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" />
{{-- <link href="/back-end/css/back-end.css" rel="stylesheet" />
<link href="/back-end/css/style.min.css" rel="stylesheet" />
<link href="/back-end/css/style-responsive.min.css" rel="stylesheet" /> --}}
<link href="/back-end/css/vendor.css" rel="stylesheet" />
{{-- <script src="/back-end/plugins/pace/pace.min.js"></script> --}}
@stack('css')
