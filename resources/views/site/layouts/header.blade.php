<html>
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

</head>

<body>
    
       <!--header section start -->
       <div class="header_section">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
           {{-- <a class="navbar-brand"><a href="index.html"><img src="{{URL::asset('assets/images/logo.png')}}"></a> --}}
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto" style="direction: rtl; right: 0;">
         
               @if (auth()->user())
               @if(auth()->user()->role == "admin")
                  <li class="nav-item">
                     <a class="nav-link" href="{{ url('/admin') }}">لوحة التحكم</a>
                  </li>
               @endif
               @endif

                 <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">الصفحة الرئيسية</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" href="{{ url('services') }}">خدماتنا</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" href="{{ url('get_img') }}">أعمالنا</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" href="{{ url('about_us') }}">من نحن؟</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" href="{{ url('add_emp') }}">انضم لفريقنا</a>
                 </li>
                 {{-- <li class="nav-item">
                    <a class="nav-link" href="contact.html"> تواصل معنا </a>
                 </li> --}}
                 
                 
                 <li class="nav-item">

                  @if (auth()->user())
                  
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button class="nav-link" title="تسجيل خروج" style="background: none; color:white; font-size: 20px;" type="submit"><i class="fa fa-sign-in"></i></button>                
               </form>

        @else

        <form action="#!" class="search order-lg-3 order-md-2 order-3 ml-auto">
          <div class="row">      
            <a class="nav-link" title="إنشاء حساب" style="font-size: 20px; color: white;" href="{{ route('register') }}"><i class="fa fa-plus-square"></i></a>
            <a class="nav-link" title="تسجيل دخول" style="font-size: 20px; color: white;" href="{{ route('login') }}"><i class="fa fa-user"></i></a>                 
         </div>                  
      </form>
      
        @endif
      </li>

   </ul>
             
   <a class="navbar-brand"><a href="index.html"><img src="{{URL::asset('site/images/logo.png')}}"></a>

           </div>
        </nav>
     </div>
     <!-- header section end -->

    @yield('content')

</body>
</html>
