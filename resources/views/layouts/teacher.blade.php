<!DOCTYPE html>
<html lang="en">
@include("teacher.includes.head")

<body class="">
    @include("teacher.includes.components.side-menu")
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      
    @include("teacher.includes.components.menu")
      <!-- End Navbar -->

        @yield("header") 
   
        <div class="content">
            @yield("content")
        </div>
@include("teacher.includes.footer")
@include("teacher.includes.page-js")
</body>
</html>