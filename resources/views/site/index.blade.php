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
            <h1 class="services_taital">Why <span style="color: #0c426e">Choose Us?</span></h1>

            <div class="choose_box">
               <div class="number_1">
                  <h4 class="number_text">01</h4>
                  <h4 class="trusted_text">Trusted Services</h4>
               </div>
               <p class="dummy_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The  </p>
            </div>

            <div class="choose_section_2 layout_padding">
               <div class="row">
                  <div class="col-md-4">
                     <div class="choose_box">
                        <div class="number_1">
                           <h4 class="number_text">01</h4>
                           <h4 class="trusted_text">Trusted Services</h4>
                        </div>
                        <p class="dummy_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The  </p>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="choose_box">
                        <div class="number_1">
                           <h4 class="number_text">02</h4>
                           <h4 class="trusted_text">Talented Workers</h4>
                        </div>
                        <p class="dummy_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The  </p>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="choose_box">
                        <div class="number_1">
                           <h4 class="number_text">03</h4>
                           <h4 class="trusted_text">Organic Products</h4>
                        </div>
                        <p class="dummy_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The  </p>
                     </div>
                  </div>
               </div>
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
