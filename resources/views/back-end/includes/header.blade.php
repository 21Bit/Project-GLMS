@php
	$headerClass = (!empty($headerInverse)) ? 'navbar-inverse ' : 'navbar-default ';
	$headerMenu = (!empty($headerMenu)) ? $headerMenu : '';
	$hiddenSearch = (!empty($headerLanguageBar)) ? 'hidden-xs' : '';
	$headerMegaMenu = (!empty($headerMegaMenu)) ? $headerMegaMenu : ''; 
@endphp
<!-- begin #header -->
<div id="header" class="header {{ $headerClass }} navbar-inverse">
	<!-- begin navbar-header -->
	<div class="navbar-header">
		<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>Bernas</b> LMS</a>
		@if (!$sidebarHide)
		<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		@endif
		@if ($headerMegaMenu)
			<button type="button" class="navbar-toggle p-0 m-r-5" data-toggle="collapse" data-target="#top-navbar">
				<span class="fa-stack fa-lg text-inverse m-t-2">
					<i class="far fa-square fa-stack-2x"></i>
					<i class="fa fa-cog fa-stack-1x"></i>
				</span>
			</button>
		@endIf
	</div>
	<!-- end navbar-header -->
	
	
	<!-- begin header-nav -->
	<ul class="navbar-nav navbar-right">
		<li class="{{ $hiddenSearch }}">
			<form class="navbar-form">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Enter keyword" />
					<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
				</div>
			</form>
		</li>
		<li class="dropdown">
			<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
				<i class="fa fa-bell"></i>
				<span class="label">5</span>
			</a>
			<ul class="dropdown-menu media-list dropdown-menu-right">
				<li class="dropdown-header">NOTIFICATIONS (1)</li>
				<li class="media">
					<a href="javascript:;">
						<div class="media-left">
							<img src="http://127.0.0.1:8000/images/placeholders/male-sm.png" alt="">
						</div>
						<div class="media-body">
							<h6 class="media-heading">Has Send Message <i class="fa fa-circle text-success"></i></h6>
							<div class="text-muted f-s-11">3 minutes ago</div>
						</div>
					</a>
				</li>
				<li class="media">
					<a href="javascript:;">
						<div class="media-left">
							<img src="http://127.0.0.1:8000/images/placeholders/male-sm.png" alt="">
						</div>
						<div class="media-body">
							<h6 class="media-heading">Make Message for Administrator</h6>
							<div class="text-muted f-s-11">5 minutes ago</div>
						</div>
					</a>
				</li>
				<li class="media">
					<a href="javascript:;">
						<div class="media-left">
							<img src="http://127.0.0.1:8000/images/placeholders/male-sm.png" alt="">
						</div>
						<div class="media-body">
							<h6 class="media-heading">Had made Transaction</h6>
							<div class="text-muted f-s-11">9 minutes ago</div>
						</div>
					</a>
				</li>
				<li class="media">
					<a href="javascript:;">
						<div class="media-left">
							<img src="http://127.0.0.1:8000/images/placeholders/male-sm.png" alt="">
						</div>
						<div class="media-body">
							<h6 class="media-heading">Had made Transaction</h6>
							<div class="text-muted f-s-11">12 minutes ago</div>
						</div>
					</a>
				</li>
				<li class="media">
					<a href="javascript:;">
						<div class="media-left">
							<img src="http://127.0.0.1:8000/images/placeholders/male-sm.png" alt="">
						</div>
						<div class="media-body">
							<h6 class="media-heading">Had made Transaction</h6>
							<div class="text-muted f-s-11">13 minutes ago</div>
						</div>
					</a>
				</li>
				<li class="dropdown-footer text-center">
					<a href="javascript:;">View more</a>
				</li>
			</ul>
		</li>
		@isset($headerLanguageBar)
		<li class="dropdown navbar-language">
			<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
				<span class="flag-icon flag-icon-us" title="us"></span>
				<span class="name">EN</span> <b class="caret"></b>
			</a>
			<ul class="dropdown-menu p-b-0">
				<li class="arrow"></li>
				<li><a href="javascript:;"><span class="flag-icon flag-icon-us" title="us"></span> English</a></li>
				<li><a href="javascript:;"><span class="flag-icon flag-icon-cn" title="cn"></span> Chinese</a></li>
				<li><a href="javascript:;"><span class="flag-icon flag-icon-jp" title="jp"></span> Japanese</a></li>
				<li><a href="javascript:;"><span class="flag-icon flag-icon-be" title="be"></span> Belgium</a></li>
				<li class="divider m-b-0"></li>
				<li class="text-center"><a href="javascript:;">more options</a></li>
			</ul>
		</li>
		@endisset
		<li class="dropdown navbar-user">
			<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
				<img src="/back-end/img/user/user-13.jpg" alt="" /> 
				<span class="d-none d-md-inline">Jofie Bernas</span> <b class="caret"></b>
			</a>
			
			<div class="dropdown-menu dropdown-menu-right">
				<a href="javascript:;" class="dropdown-item">Edit Profile</a>
				<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
				<a href="javascript:;" class="dropdown-item">Calendar</a>
				<a href="javascript:;" class="dropdown-item">Setting</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="{{ route('logout') }}"
					onclick="event.preventDefault();
							 document.getElementById('logout-form').submit();">
					Log Out
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
			</div>
		</li>
	</ul>
	<!-- end header navigation right -->
</div>
<!-- end #header -->
