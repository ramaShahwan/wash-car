@extends('site.layouts.master')

@section('css')

@endsection


@section('content')

   <body>

      <!-- banner section start -->
      <div class="banner_section layout_padding">
         <div class="container">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="banner_taital">
                              <h1 class="banner_taital">Keep your Clean Cars Always</h1>
                              <p class="banner_text">There are many variations of passages of Lorem Ipsum available</p>
                           </div>
                           <div class="btn_main">
                              <div class="quote_bt active"><a href="#">Get A Quote</a></div>
                              <div class="contact_bt"><a href="#">Contact Us</a></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div><img src="{{URL::asset('assets/images/banner-img-1.png')}}" class="banner_img"></div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="banner_taital">
                              <h1 class="banner_taital">Keep your Clean Cars Always</h1>
                              <p class="banner_text">There are many variations of passages of Lorem Ipsum available</p>
                           </div>
                           <div class="btn_main">
                              <div class="quote_bt active"><a href="#">Get A Quote</a></div>
                              <div class="contact_bt"><a href="#">Contact Us</a></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div><img src="{{URL::asset('assets/images/banner-img.png')}}" class="banner_img"></div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="banner_taital">
                              <h1 class="banner_taital">Keep your Clean Cars Always</h1>
                              <p class="banner_text">There are many variations of passages of Lorem Ipsum available</p>
                           </div>
                           <div class="btn_main">
                              <div class="quote_bt active"><a href="#">Get A Quote</a></div>
                              <div class="contact_bt"><a href="#">Contact Us</a></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div><img src="{{URL::asset('assets/images/banner-img-2.png')}}" class="banner_img"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
               <i class="fa fa-arrow-left" aria-hidden="true"></i>
               </a>
               <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
               <i class="fa fa-arrow-right" aria-hidden="true"></i>
               </a>
            </div>
         </div>
      </div>
      <!-- banner section end -->
      
      <!-- choose section start -->
      <div class="choose_section layout_padding">
         <div class="container">
            <h1 class="services_taital"><span style="color: #0c426e">اطلب الآن</span></h1>

            <div class="layout_padding" style="text-align: right; direction: rtl;">
               <div class="number_1">
                  <h4 class="number_text" style="font-size: 18px; font-weight: bolder">01</h4> &nbsp;&nbsp;
                  <h4 class="trusted_text" style="font-size: 18px; font-weight: bolder">حجم السيارة</h4>
               </div>
               <p class="dummy_text" style="font-size: 16px; font-weight: bolder">اختر حجم السيارة</p>
            </div>
            <br><br>

            <div class="choose_section_2">
               <div class="row">

                  <div class="col-md-4">
                     <div class="choose_box" style="text-align: center;">
                        <img src="assets/images/van.png" alt="" style="width: 100px;">
                        <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> سيارة كبيرة الحجم </p>
                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="choose_box" style="text-align: center;">
                        <img src="assets/images/car1.png" alt="" style="width: 100px;">
                        <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> سيارة متوسطة الحجم </p>
                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="choose_box" style="text-align: center;">
                        <img src="assets/images/car.png" alt="" style="width: 100px;">
                        <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> سيارة صغيرة الحجم </p>
                     </div>
                  </div>
               </div>
               <br><br>

               <div class="layout_padding" style="text-align: right; direction: rtl;">
                  <div class="number_1">
                     <h4 class="number_text" style="font-size: 18px; font-weight: bolder">02</h4> &nbsp;&nbsp;
                     <h4 class="trusted_text" style="font-size: 18px; font-weight: bolder">نوع الغسيل</h4>
                  </div>
                  <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> ما هو الغسيل الأفضل لسيارتك </p>
               </div>
               <br><br>

            </div>
         </div>
      </div>
      <!-- choose section end -->
 

      
      <!-- Javascript files-->
      <script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
      <script src="{{URL::asset('assets/js/popper.min.js')}}"></script>
      <script src="{{URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{URL::asset('assets/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{URL::asset('assets/js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{URL::asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{URL::asset('assets/js/custom.js')}}"></script>
      <!-- javascript --> 
      <script src="{{URL::asset('assets/js/owl.carousel.js')}}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>


   </body>

@endsection


@section('js')

@endsection
