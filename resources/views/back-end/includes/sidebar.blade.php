@php
	$sidebarClass = (!empty($sidebarTransparent)) ? 'sidebar-transparent' : '';
@endphp
<!-- begin #sidebar -->
<div id="sidebar" class="sidebar {{ $sidebarClass }}">
	<!-- begin sidebar scrollbar -->
	<div data-scrollbar="true" data-height="100%">
		<!-- begin sidebar user -->
		<ul class="nav">
			<li class="nav-profile">
				<a href="javascript:;" data-toggle="nav-profile">
					<div class="cover with-shadow" style="background-image:url('/back-end/img/cover-sidebar-user.jpg')"></div>
					<div class="image">
						<img src="/back-end/img/user/user-13.jpg" alt="" />
					</div>
					<div class="info">
						<b class="caret pull-right"></b>
						Jofie Bernas
						<small>Web Developer</small>
					</div>
				</a>
			</li>
			<li>
				<ul class="nav nav-profile">
					<li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
					<li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
					<li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
				</ul>
			</li>
		</ul>
		<!-- end sidebar user -->
		<!-- begin sidebar nav -->
		<ul class="nav">
			<li class="nav-header">Navigation</li>
			<li class="has-sub ">
				<a href="{{ route("back-end.dashboard.index") }}">
					<i class="fa fa-th-large"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li class="has-sub ">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-list"></i>
					<span>Transaction</span>
				</a>
				<ul class="sub-menu">
					<li class="">
						<a href="/dashboard/v2">Today</a>
					</li>
					<li class="">
						<a href="/dashboard/v2">Pending</a>
					</li>
					<li class="">
						<a href="/dashboard/v2">All Transaction</a>
					</li>
				</ul>
			</li>
			<li class="has-sub ">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-table"></i>
					<span>Class Manager</span>
				</a>
				<ul class="sub-menu">
					<li class="">
						<a href="/dashboard/v1">Today</a>
					</li>
					<li class="">
						<a href="/dashboard/v2">New</a>
					</li>
					<li class="">
						<a href="/dashboard/v2">Create</a>
					</li>
					<li class="">
						<a href="/dashboard/v2">All Class</a>
					</li>
					<li class="">
						<a href="/dashboard/v2">Postponed</a>
					</li>
				</ul>
			</li>
			<li class="has-sub ">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-tag"></i>
					<span>Level Test</span>
				</a>
				<ul class="sub-menu">
					<li class="">
						<a href="/dashboard/v1">Today</a>
					</li>
					<li class="">
						<a href="/dashboard/v2">New</a>
					</li>
					<li class="">
						<a href="/dashboard/v2">Create</a>
					</li>
					<li class="">
						<a href="/dashboard/v2">All Level Test</a>
					</li>
				</ul>
			</li>
			<li class="has-sub {{ back_end_active_menu('student', 2) }}">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-user"></i>
					<span>Student</span>
				</a>
				<ul class="sub-menu">
					<li class="">
						<a href="{{ route("back-end.student.create") }}">Create New</a>
					</li>
					<li class="active">
						<a href="{{ route("back-end.student.index") }}">All Students</a>
					</li>
				</ul>
			</li>
			<li class="has-sub {{ back_end_active_menu('teacher', 2) }}">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-users"></i>
					<span>Teacher</span>
				</a>
				<ul class="sub-menu">
					<li class="">
						<a href="{{ route("back-end.teacher.create") }}">Create New</a>
					</li>
					<li class="">
						<a href="{{ route("back-end.teacher.index") }}">All Teachers</a>
					</li>
				</ul>
			</li>
			<li class="has-sub {{ back_end_active_menu('book', 2) }}">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-book"></i>
					<span>Books</span>
				</a>
				<ul class="sub-menu">
					<li class="">
						<a href="{{ route("back-end.book.create") }}">Create New</a>
					</li>
					<li class="">
						<a href="{{ route("back-end.book.index") }}">All Books</a>
					</li>
				</ul>
			</li>
			<li class="has-sub {{ back_end_active_menu(['blog', 'testimonials', 'pop-up', 'holiday', 'notice'], 2) }}">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-list"></i>
					<span>Contents</span>
				</a>
				<ul class="sub-menu ">
					<li class="{{ back_end_active_menu('holiday', 2) }}">
						<a href="{{ route("back-end.holiday.index") }}">Holiday</a>
					</li>
					<li class="{{ back_end_active_menu('notice', 2) }}">
						<a href="{{ route("back-end.notice.index") }}">Notice</a>
					</li>
					<li class="">
						<a href="/dashboard/v2">FAQ</a>
					</li>
					<li class="{{ back_end_active_menu('blog', 2) }}">
						<a href="{{ route("back-end.blog.index") }}">Blog</a>
					</li>
					<li class="">
						<a href="/dashboard/v2">Testimonial</a>
					</li>
					<li class="">
						<a href="/dashboard/v2">Pop-up</a>
					</li>
					<li class="">
						<a href="/dashboard/v2">Banner</a>
					</li>
				</ul>
			</li>
			<li class="has-sub {{ back_end_active_menu(['setting', 'credit-package'], 2) }}">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-cog"></i>
					<span>Settings</span>
				</a>
				<ul class="sub-menu">
					<li class="{{ back_end_active_menu(['credit-package'], 2) }}">
						<a href="{{ route("back-end.credit-package.index") }}">Credit Packages</a>
					</li>
					<li class="{{ back_end_active_menu_query("setting", 2, ['type', 'general']) }}">
						<a href="{{ route('back-end.setting.index', ['type' => 'general']) }}">General</a>
					</li>
					<li class="{{ back_end_active_menu_query("setting", 2, ['type', 'pricing']) }}">
						<a href="{{ route('back-end.setting.index', ['type' => 'pricing']) }}">Pricing</a>
					</li>
					<li class="">
						<a href="{{ route('back-end.setting.index', ['type' => 'payment']) }}">Payment</a>
					</li>
					<li class="">
						<a href="{{ route('back-end.setting.index', ['type' => 'system']) }}">System</a>
					</li>
				</ul>
			</li>
			{{-- @php
				$currentUrl = '/'. Request::path();
				
				function renderSubMenu($value, $currentUrl) {
					$subMenu = '';
					$GLOBALS['sub_level'] += 1 ;
					$GLOBALS['active'][$GLOBALS['sub_level']] = '';
					$currentLevel = $GLOBALS['sub_level'];
					foreach ($value as $key => $menu) {
						$GLOBALS['subparent_level'] = '';
						
						$subSubMenu = '';
						$hasSub = (!empty($menu['sub_menu'])) ? 'has-sub' : '';
						$hasCaret = (!empty($menu['sub_menu'])) ? '<b class="caret pull-right"></b>' : '';
						$hasTitle = (!empty($menu['title'])) ? $menu['title'] : '';
						$hasHighlight = (!empty($menu['highlight'])) ? '<i class="fa fa-paper-plane text-theme m-l-5"></i>' : '';
						
						if (!empty($menu['sub_menu'])) {
							$subSubMenu .= '<ul class="sub-menu">';
							$subSubMenu .= renderSubMenu($menu['sub_menu'], $currentUrl);
							$subSubMenu .= '</ul>';
						}
						
						$active = ($currentUrl == $menu['url']) ? 'active' : '';
						
						if ($active) {
							$GLOBALS['parent_active'] = true;
							$GLOBALS['active'][$GLOBALS['sub_level'] - 1] = true;
						}
						if (!empty($GLOBALS['active'][$currentLevel])) {
							$active = 'active';
						}
						$subMenu .= '
							<li class="'. $hasSub .' '. $active .'">
								<a href="'. $menu['url'] .'">'. $hasCaret . $hasTitle . $hasHighlight .'</a>
								'. $subSubMenu .'
							</li>
						';
					}
					return $subMenu;
				}
				
				foreach (config('sidebar.menu') as $key => $menu) {
					$GLOBALS['parent_active'] = '';
					
					$hasSub = (!empty($menu['sub_menu'])) ? 'has-sub' : '';
					$hasCaret = (!empty($menu['caret'])) ? '<b class="caret"></b>' : '';
					$hasIcon = (!empty($menu['icon'])) ? '<i class="'. $menu['icon'] .'"></i>' : '';
					$hasImg = (!empty($menu['img'])) ? '<div class="icon-img"><img src="'. $menu['img'] .'" /></div>' : '';
					$hasLabel = (!empty($menu['label'])) ? '<span class="label label-theme m-l-5">'. $menu['label'] .'</span>' : '';
					$hasTitle = (!empty($menu['title'])) ? '<span>'. $menu['title'] . $hasLabel .'</span>' : '';
					$hasBadge = (!empty($menu['badge'])) ? '<span class="badge pull-right">'. $menu['badge'] .'</span>' : '';
					
					$subMenu = '';
					
					if (!empty($menu['sub_menu'])) {
						$GLOBALS['sub_level'] = 0;
						$subMenu .= '<ul class="sub-menu">';
						$subMenu .= renderSubMenu($menu['sub_menu'], $currentUrl);
						$subMenu .= '</ul>';
					}
					$active = ($currentUrl == $menu['url']) ? 'active' : '';
					$active = (empty($active) && !empty($GLOBALS['parent_active'])) ? 'active' : $active;
					echo '
						<li class="'. $hasSub .' '. $active .'">
							<a href="'. $menu['url'] .'">
								'. $hasImg .'
								'. $hasBadge .'
								'. $hasCaret .'
								'. $hasIcon .'
								'. $hasTitle .'
							</a>
							'. $subMenu .'
						</li>
					';
				}
			@endphp --}}
			<!-- begin sidebar minify button -->
			<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			<!-- end sidebar minify button -->
		</ul>
		<!-- end sidebar nav -->
	</div>
	<!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->

