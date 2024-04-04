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
 <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/bootstrap.min.css')}}">
 <!-- style css -->
 <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/style.css')}}">
 <!-- Responsive-->
 <link rel="stylesheet" href="{{URL::asset('assets/css/responsive.css')}}">
 <!-- fevicon -->
 <link rel="icon" href="{{URL::asset('assets/images/fevicon.png')}}" type="image/gif" />
 <!-- Scrollbar Custom CSS -->
 <link rel="stylesheet" href="{{URL::asset('assets/css/jquery.mCustomScrollbar.min.css')}}">
 <!-- Tweaks for older IEs-->
 <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
 <!-- owl stylesheets --> 
 <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="{{URL::asset('assets/css/owl.carousel.min.css')}}">
 <link rel="stylesoeet" href="{{URL::asset('assets/css/owl.theme.default.min.css')}}">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

</head>

<body>
    
       <!--header section start -->
       <div class="header_section">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
           <a class="navbar-brand"><a href="index.html"><img src="{{URL::asset('assets/images/logo.png')}}"></a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto" style="direction: rtl; right: 0;">


                 <li class="nav-item">

                  @if (auth()->user())
                  
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button class="nav-link" title="تسجيل خروج" style="background: none; color:white; font-size: 20px;" type="submit"><i class="fa fa-sign-in"></i></button>
                  {{-- <button class="nav-link" style="background: none; border: none; color:white;" type="submit">تسجيل خروج</button> --}}
                
               </form>

            {{-- <div class="row search order-lg-3 order-md-2 order-3 ml-auto">      

              @if(auth()->user()->role == "admin")
                <div class="content"> <a class="read-more-btn" style="font-size: 20px;" href="{{ url('cpanel') }}">Dashboard</a></div>                  
                @endif
              
            </div> --}}

        @else

        <form action="#!" class="search order-lg-3 order-md-2 order-3 ml-auto">
          <div class="row">      
            {{-- <div class="content">  --}}
            <a class="nav-link" title="إنشاء حساب" style="font-size: 20px; color: white;" href="{{ route('register') }}"><i class="fa fa-user"></i></a>
            <a class="nav-link" title="تسجيل دخول" style="font-size: 20px; color: white;" href="{{ route('login') }}"><i class="fa fa-sign-in"></i></a>                 
         </div>                  
          {{-- </div> --}}
      </form>

      

        @endif
                 </li>


                 <li class="nav-item">
                    <a class="nav-link" href="index.html">الصفحة الرئيسية</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" href="services.html">خدماتنا</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" href="quality.html">أعمالنا</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" href="choose.html">من نحن</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" href="join.html">انضم لفريقنا</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" href="contact.html"> تواصل معنا </a>
                 </li>



              </ul>
             
           </div>
        </nav>
     </div>
     <!-- header section end -->

    @yield('content')

</body>
</html>
