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
 <link rel="icon" href="{{ asset('site/img/icon/icon.webp') }}" type="image/gif" />
 <!-- Scrollbar Custom CSS -->
 <link rel="stylesheet" href="{{URL::asset('site/css/jquery.mCustomScrollbar.min.css')}}">
 <!-- Tweaks for older IEs-->
 <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
 <!-- owl stylesheets --> 
 <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="{{URL::asset('site/css/owl.carousel.min.css')}}">
 <link rel="stylesoeet" href="{{URL::asset('site/css/owl.theme.default.min.css')}}">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">


   <style>
      .active {
      border-radius: 5px;
      }
      .nav-item:hover{
      background-color: rgba(255, 255, 255, 0.5);
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(255, 255, 255);
      }

      .dropdown {
      position: relative;
      display: inline-block;
      }
   
      .dropdown-content {
      display: none;
      position: absolute;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
      border-radius: 5px;
      }
   
      .dropdown-content a {
      color: white;
      padding: 12px 12px;
      text-decoration: none;
      display: block;
      }
   
      .dropdown-content a:hover {background-color:gray;  border-radius: 5px;}
   
      .dropdown:hover .dropdown-content {display: block; background-color: rgba(0,0,0,0.8);}
      .dropdown:hover .nav-link {color: white;}
   
   </style>

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
         
               @if(auth()->user())
                  @if(auth()->user()->role == "admin")
                     <li class="nav-item">
                        <a style="color: white" class="nav-link" href="{{ url('/admin') }}">لوحة التحكم</a>
                     </li>
                  @endif

                  @if(auth()->user()->role == "employee")
                  <li class="nav-item">
                     <a style="color: white" class="nav-link" href="{{ url('/employee') }}">لوحة التحكم</a>
                  </li>
                  @endif
               @endif

                 <li class="nav-item">
                    <a style="color: white" class="nav-link" href="{{ url('/') }}">الصفحة الرئيسية</a>
                 </li>
                 <li class="nav-item">
                    <a style="color: white" class="nav-link" href="{{ url('services') }}">خدماتنا</a>
                 </li>
                 <li class="nav-item">
                    <a style="color: white" class="nav-link" href="{{ url('get_img') }}">أعمالنا</a>
                 </li>
                 <li class="nav-item">
                    <a style="color: white" class="nav-link" href="{{ url('about_us') }}">من نحن؟</a>
                 </li>
                 <li class="nav-item">
                    <a style="color: white" class="nav-link" href="{{ url('add_emp') }}">انضم لفريقنا</a>
                 </li>
          
                 <li class="nav-item">
                     <div class="dropdown">
                        
                        @if (auth()->user())
                           <a style="color: white" class="nav-link"> اطلب الآن </a>
                           <div class="dropdown-content">
                              <a href="{{ url('index') }}">غسيل سيارات</a>
                              <a href="{{ url('index_home') }}">تنظيف منزلي</a>
                            </div>
                        @endif
                     </div>
                  </li>

                  <li class="nav-item">
                     <div class="dropdown">
                        
                        @if (auth()->user())
                           <a style="color: white" class="nav-link" @if(Route::is('edit_profile')||Route::is('all_purchases')||Route::is('balance')) @endif>الملف الشخصي</a>
                           <div class="dropdown-content">
                              <a href="{{ url('edit_profile/{id}') }}">تعديل الملف الشخصي</a>
                              <a href="{{ route('all_purchases') }}">المشتريات</a>
                              <a href="{{ route('balance') }}">الرصيد</a>
                            </div>
                        @endif
                     </div>
                  </li>

                  @if (auth()->user())
                 <li class="nav-item">
                  <form method="POST" action="{{ route('logout') }}">
                     @csrf
                     <button class="nav-link" title="تسجيل خروج" style="background: none; color:white; font-size: 20px;" type="submit"><i class="fa fa-sign-in"></i></button>                
                  </form>
               </li>

        @else

         <li class="nav-item">
            <form action="#!" class="search order-lg-3 order-md-2 order-3 ml-auto">
               <div class="row">      
                  <a class="nav-link" title="إنشاء حساب" style="font-size: 20px; color: white;" href="{{ route('register') }}"><i class="fa fa-plus-square"></i></a>
                  {{-- <a class="nav-link" title="تسجيل دخول" style="font-size: 20px; color: white;" href="{{ route('login') }}"><i class="fa fa-user"></i></a>                  --}}
               </div>                  
            </form>
         </li> 
         &nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;

         <li class="nav-item">
            <form action="#!" class="search order-lg-3 order-md-2 order-3 ml-auto">
               <div class="row">      
                  {{-- <a class="nav-link" title="إنشاء حساب" style="font-size: 20px; color: white;" href="{{ route('register') }}"><i class="fa fa-plus-square"></i></a> --}}
                  <a class="nav-link" title="تسجيل دخول" style="font-size: 20px; color: white;" href="{{ route('login') }}"><i class="fa fa-user"></i></a>                 
               </div>                  
            </form>
         </li>

        @endif

   </ul>
             
   <a class="navbar-brand"><a href="index.html"><img src="{{URL::asset('site/images/logo.png')}}"></a>

           </div>
        </nav>
     </div>
     <!-- header section end -->

    @yield('content')

</body>
</html>
