<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	@include('back-end.includes.head')
</head>
@php
	$bodyClass = (!empty($boxedLayout)) ? 'boxed-layout' : '';
	$bodyClass .= (!empty($paceTop)) ? 'pace-top ' : '';
	$bodyClass .= (!empty($bodyExtraClass)) ? $bodyExtraClass . ' ' : '';
	$sidebarHide = (!empty($sidebarHide)) ? $sidebarHide : '';
	$sidebarTwo = (!empty($sidebarTwo)) ? $sidebarTwo : '';
	$topMenu = (!empty($topMenu)) ? $topMenu : '';
	$footer = (!empty($footer)) ? $footer : '';
	
	$pageContainerClass = (!empty($topMenu)) ? 'page-with-top-menu ' : '';
	$pageContainerClass .= (!empty($sidebarRight)) ? 'page-with-right-sidebar ' : '';
	$pageContainerClass .= (!empty($sidebarLight)) ? 'page-with-light-sidebar ' : '';
	$pageContainerClass .= (!empty($sidebarWide)) ? 'page-with-wide-sidebar ' : '';
	$pageContainerClass .= (!empty($sidebarHide)) ? 'page-without-sidebar ' : '';
	$pageContainerClass .= (!empty($sidebarMinified)) ? 'page-sidebar-minified ' : '';
	$pageContainerClass .= (!empty($sidebarTwo)) ? 'page-with-two-sidebar ' : '';
	$pageContainerClass .= (!empty($contentFullHeight)) ? 'page-content-full-height ' : '';
	
	$contentClass = (!empty($contentFullWidth) || !empty($contentFullHeight)) ? 'content-full-width ' : '';
	$contentClass .= (!empty($contentInverseMode)) ? 'content-inverse-mode ' : '';
@endphp
<body class="{{ $bodyClass }}">
	@include('back-end.includes.component.page-loader')
	
	<div id="page-container" class="page-container page-sidebar-fixed page-header-fixed {{ $pageContainerClass }}">
		
		@include('back-end.includes.header')
		
		@includeWhen($topMenu, 'back-end.includes.top-menu')
		
		@includeWhen(!$sidebarHide, 'back-end.includes.sidebar')
		
		@includeWhen($sidebarTwo, 'back-end.includes.sidebar-right')
		
		<div id="content" class="content {{ $contentClass }}">
			@yield('content')
		</div>
		
		@includeWhen($footer, 'back-end.includes.footer')
		
		{{-- @include('back-end.includes.component.theme-panel') --}}
		
		@include('back-end.includes.component.scroll-top-btn')
		
	</div>
	@include('back-end.includes.page-js')
</body>
</html>
