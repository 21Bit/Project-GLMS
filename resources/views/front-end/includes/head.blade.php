<meta charset="utf-8" />
<title>@yield('title')</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- ================== BEGIN BASE CSS STYLE ================== -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<link href="/plugins/bootstrap3/css/bootstrap.min.css" rel="stylesheet" />
<link href="/css/bootstrap-4-utilities.min.css" rel="stylesheet" />
<link href="/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<link href="/plugins/animate/animate.min.css" rel="stylesheet" />
<link href="/css/style.css" rel="stylesheet" />
<link href="/css/style-responsive.min.css" rel="stylesheet" />
<link href="/css/theme/default.css" id="theme" rel="stylesheet" />


@stack("styles")
<!-- ================== END BASE CSS STYLE ================== -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="/plugins/pace/pace.min.js"></script>
<!-- ================== END BASE JS ================== -->