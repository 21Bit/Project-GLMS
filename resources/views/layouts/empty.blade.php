<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	@include('back-end.includes.head')
</head>
	<body class="pace-top bg-white">
		<div id="app">
		<!-- begin #page-loader -->
		<div id="page-loader" class="fade show"><span class="spinner"></span></div>
		<!-- end #page-loader -->
		
		<!-- begin #page-container -->
				@yield("content")
		</div>
		{{-- <script src="/back-end/js/bundle.js"></script>
		<script src="/back-end/js/theme/default.js"></script> --}}
		<script src="/back-end/js/vendor.js"></script>
		<script>
			$(document).ready(function() {
				App.init();
			});
		</script>
	</body>
</html>
