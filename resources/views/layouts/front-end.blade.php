<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include("front-end.includes.head")
</head>
<body>
    <!-- BEGIN #page-container -->
    {{-- <div id="page-container" class="fade"> --}}
    <div id="page-container">
        <!-- BEGIN #top-nav -->
        @include('front-end.includes.components.top-menu')
        <!-- END #top-nav -->
    
        <!-- BEGIN #header -->
        @include("front-end.includes.components.menu")
        <!-- END #header -->
    
        <!-- BEGIN #slider -->
        @yield("slider")
        
        <!-- END #slider -->

        @yield("content")
      
        <!-- END #subscribe -->
    
        <!-- BEGIN #footer -->
        @include("front-end.includes.footer")
        <!-- END #footer -->

        @include('front-end.includes.components.login-modal')
    
        <!-- BEGIN #footer-copyright -->
        @include("front-end.includes.copyright")
        <!-- END #footer-copyright -->
    </div>
    <!-- END #page-container -->
    
 	@include("front-end.includes.page-js")
</body>
</html>
