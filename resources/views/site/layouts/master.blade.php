<!DOCTYPE html>
<html lang="en">

<head>

 <!-- basic -->
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- mobile metas -->
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="viewport" content="initial-scale=1, maximum-scale=1">
 <!-- site metas -->
 <title>Clean Car</title>
 <meta name="keywords" content="">
 <meta name="description" content="">
 <meta name="author" content="">

 @yield('css')

 <!-- bootstrap css -->
 <link rel="stylesheet" type="text/css" href="{{URL::asset('site/css/bootstrap.min.css')}}">
 <!-- style css -->
 <link rel="stylesheet" type="text/css" href="{{URL::asset('site/css/style.css')}}">
 <!-- Responsive-->
 <link rel="stylesheet" href="{{URL::asset('site/css/responsive.css')}}">
 <!-- fevicon -->
 <link rel="icon" href="{{URL::asset('site/images/fevicon.png')}}" type="image/gif" />
 <!-- Scrollbar Custom CSS -->
 <link rel="stylesheet" href="{{URL::asset('site/css/jquery.mCustomScrollbar.min.css')}}">
 <!-- Tweaks for older IEs-->
 <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
 <!-- owl stylesheets --> 
 <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="{{URL::asset('site/css/owl.carousel.min.css')}}">
 <link rel="stylesoeet" href="{{URL::asset('site/css/owl.theme.default.min.css')}}">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

 @include('site.layouts.header')

</head>

<body>

    @yield('header')
    {{-- @yield('content') --}}
    
    @include('site.layouts.footer')

</body>

</html>
