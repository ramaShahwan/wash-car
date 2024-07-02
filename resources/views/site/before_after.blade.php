@extends('site.layouts.master')

@section('css')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">

@endsection


@section('content')

<body>

    <div class="services_section layout_padding">
        <div class="container">
           <h1 class="services_taital"><span style="color: #444444">قبل و بعد</span></h1>
           {{-- <p class="services_text">t is a long established fact that a reader will be distracted by the readable content of a page when looking </p> --}}
           <div class="services_section_2 layout_padding">
              <div class="row">

               @foreach ($data as $item)
               <div class="col-md-6">
                   <div class="services_box">
                       <h4 class="express_text">بعد</h4>
                       <div><img src="{{ URL::asset('site/img/gallery/'.$item->afterImage) }}" class="image_1"></div>
                   </div>
               </div>
               
               <div class="col-md-6">
                   <div class="services_box">
                       <h4 class="express_text">قبل</h4>
                       <div><img src="{{ URL::asset('site/img/gallery/'.$item->beforeImage) }}" class="image_1"></div>
                   </div>
               </div>
               <br><br><br>
           @endforeach
           
					{!! $paginationLinks !!}
               

                 {{-- <div class="col-md-3">
                    <div class="services_box">
                     <h4 class="express_text">بعد</h4>
                       <div><img src="{{URL::asset('assets/images/img-3.png')}}" class="image_1"></div>
                    </div>
                 </div>
                 <div class="col-md-3">
                  <div class="services_box">
                     <h4 class="express_text">قبل</h4>
                     <div><img src="{{URL::asset('assets/images/img-3.png')}}" class="image_1"></div>
                  </div> --}}
               </div>
              </div>
              <br><br><br>
           </div>
        </div>
     <br><br><br><br><br>
    </div>

</body>

@endsection


@section('js')

@endsection
