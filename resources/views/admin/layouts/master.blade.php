<!DOCTYPE html>
<html lang="en">
<!-- Required meta tags -->
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@if (isset($getShowSettings))
    <meta name="Description" content="{{ $getShowSettings->Description }}">
    <meta property="og:description" content="{{ $getShowSettings->Description }}">
    <meta property="og:url" content="{{ $getShowSettings->linkWebsite }}">
    <meta name="keywords" content="{{ $getShowSettings->Keywords }}">
    @isset($getShowSettings->socialMidiaYoutube)
        <meta property="og:url" content="{{ $getShowSettings->socialMidiaYoutube }}" />
    @endisset
    @isset($getShowSettings->socialMidiaInstagram)
        <meta property="og:url" content="{{ $getShowSettings->socialMidiaInstagram }}" />
    @endisset
    @isset($getShowSettings->socialMidiaFacebook)
        <meta property="og:url" content="{{ $getShowSettings->socialMidiaFacebook }}" />
    @endisset
    @isset($getShowSettings->socialMidiaTelegram)
        <meta property="og:url" content="{{ $getShowSettings->socialMidiaTelegram }}" />
    @endisset
    @isset($getShowSettings->icon)
        <link rel="icon" type="image/x-icon" href="{{ asset('site/img/icon/' . $getShowSettings->icon) }}">
        <meta property="og:image" content="{{ asset('site/img/icon/' . $getShowSettings->icon) }}">
    @endisset
@endif

<!-- Title -->
<title>{{ $getShowSettings->nameWebsite }}</title>

@include('admin.layouts.head')


	<body class="main-body app sidebar-mini">
		<!-- Loader -->
		<div id="global-loader">
			<img src="{{URL::asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->
		@include('admin.layouts.main-sidebar')		
		<!-- main-content -->
		<div class="main-content app-content">
			@include('admin.layouts.main-header')			
			<!-- container -->
			<div class="container-fluid">
				@yield('page-header')
				@yield('content')
				
				@include('admin.layouts.models')
            	@include('admin.layouts.footer')
				@include('admin.layouts.footer-scripts')	

	</body>
</html>