<!DOCTYPE html>
<html lang="en">
@include("student-end.includes.head")

<body class="">
    @include("student-end.includes.components.side-menu")
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      
    @include("student-end.includes.components.menu")
      <!-- End Navbar -->

        @yield("header") 
   
        <div class="content">
                @yield("content")
        </div>
@include("student-end.includes.footer")
@include("student-end.includes.page-js")
</body>
</html>