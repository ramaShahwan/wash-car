@extends('site.layouts.master')

@section('css')

@endsection


@section('content')

<body>
   
      <!-- services section start -->
      <div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital"><span style="color: #0c426e">خدماتنا</span></h1>
            {{-- <p class="services_text">t is a long established fact that a reader will be distracted by the readable content of a page when looking </p> --}}
            <div class="services_section_2 layout_padding">
               <div class="row">
                  <div class="col-md-4">
                     <div class="services_box">
                        <div><img src="{{URL::asset('assets/images/img-2.png')}}" class="image_1"></div>
                        <h4 class="express_text">Express Exterior</h4>
                        <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed</p>
                        <div class="seemore_bt"><a href="#">See More</a></div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="services_box">
                        <div><img src="{{URL::asset('assets/images/img-1.png')}}" class="image_1"></div>
                        <h4 class="express_text">Auto Detailing</h4>
                        <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed</p>
                        <div class="seemore_bt"><a href="#">See More</a></div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="services_box">
                        <div><img src="{{URL::asset('assets/images/img-3.png')}}" class="image_1"></div>
                        <h4 class="express_text">Full Service Car Wash</h4>
                        <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed</p>
                        <div class="seemore_bt"><a href="#">See More</a></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <br><br><br><br><br>
     </div>
      <!-- services section end -->

</body>

@endsection


@section('js')

@endsection
