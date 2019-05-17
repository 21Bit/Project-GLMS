<!-- ================== BEGIN BASE JS ================== -->
	<script src="/plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="/plugins/bootstrap3/js/bootstrap.min.js"></script>
    @stack("scripts")
	<script src="/front-end/js/front-end.js"></script>
	<!--[if lt IE 9]>
		<script sr"crossbrowserjs/html5shiv.js"></script>
		<script sr"crossbrowserjs/respond.min.js"></script>
		<script sr"crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="/plugins/js-cookie/js.cookie.js"></script>
	<script src="/js/apps.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	<script>
	    $(document).ready(function() {
	        App.init();
	    });
	</script>