@extends('site.layouts.master')

@section('css')

@endsection


@section('content')

<body>

    <div class="services_section layout_padding">
        <div class="container">
           <h1 class="services_taital"><span style="color: #0c426e">قبل و بعد</span></h1>
           {{-- <p class="services_text">t is a long established fact that a reader will be distracted by the readable content of a page when looking </p> --}}
           <div class="services_section_2 layout_padding">
              <div class="row">
                 <div class="col-md-3">
                    <div class="services_box">
                     <h4 class="express_text">بعد</h4>
                       <div><img src="{{URL::asset('assets/images/img-2.png')}}" class="image_1"></div>
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="services_box">
                     <h4 class="express_text">قبل</h4>
                       <div><img src="{{URL::asset('assets/images/img-1.png')}}" class="image_1"></div>
                    </div>
                 </div>

                 <div class="col-md-3">
                    <div class="services_box">
                     <h4 class="express_text">بعد</h4>
                       <div><img src="{{URL::asset('assets/images/img-3.png')}}" class="image_1"></div>
                    </div>
                 </div>
                 <div class="col-md-3">
                  <div class="services_box">
                     <h4 class="express_text">قبل</h4>
                     <div><img src="{{URL::asset('assets/images/img-3.png')}}" class="image_1"></div>
                  </div>
               </div>
              </div>
           </div>
        </div>
     <br><br><br><br><br>
    </div>

</body>

@endsection


@section('js')

@endsection