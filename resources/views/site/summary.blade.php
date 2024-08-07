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
           <h1 class="services_taital"><span style="color: #444444">ملخص الطلب</span></h1>
           {{-- <p class="services_text"> يرجى التأكد من الطلب ليتم التثبيت </p> --}}

         <form action="{{ route('ord.pay') }}" method="GET" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('GET')

           <div class="services_section_2 layout_padding">
              <div class="row">
                
                <div class="choose_section_2" style="text-align: right; direction: rtl;">

                    {{-- @foreach ($order as $ord) --}}
                        

                    <div class="row">
                      
                       <div class="col-md-4">
                          <div class="" style="text-align: center;">
                             <img src="site/images/check-mark.png" alt="" style="width: 50px;">
                             <br><br>
                             <p class="dummy_text" style="font-size: 20px; font-weight: bolder"> تاريخ الحجز </p>
                             <hr>
                             <p class="dummy_text" style="font-size: 20px; font-weight: bolder; "> {{ $orderDate }} </p>
                          </div>
                       </div>
                 
                       <div class="col-md-4">
                          <div class="" style="text-align: center;">
                             <img src="site/images/clock1.png" alt="" style="width: 50px;"> 
                             <br><br>
                             <p class="dummy_text" style="font-size: 20px; font-weight: bolder"> وقت الحجز </p>
                             <hr>
                             <p class="dummy_text" style="font-size: 20px; font-weight: bolder; "> {{ $orderTime }} </p>
                          </div>
                       </div>
                 
                       <div class="col-md-4">
                          <div class="" style="text-align: center;">
                             <img src="site/images/cart.png" alt="" style="width: 50px;">
                             <br><br>
                             <p class="dummy_text" style="font-size: 20px; font-weight: bolder;"> السعر الكلي </p>
                             <hr>
                             <p class="dummy_text" style="font-size: 20px; font-weight: bolder; "> {{ $totalPrice }} </p>
                          </div>
                       </div>
                 
                   </div>
                 
                   {{-- @endforeach --}}

         <br><br>
         <br><br>
                 </div>

              </div>
           </div>

           <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" style="background-color: #444444;"> &nbsp; <i class="fa fa-arrow-left"></i> &nbsp; انتقل للدفع &nbsp; </button>
         </div>

         <br><br><br>

        </form>

        </div>
    </div>

</body>

@endsection


@section('js')

@endsection
