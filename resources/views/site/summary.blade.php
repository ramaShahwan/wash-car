@extends('site.layouts.master')

@section('css')

@endsection


@section('content')

<body>

    <div class="services_section layout_padding">
        <div class="container">
           <h1 class="services_taital"><span style="color: #0c426e">مراجعة الطلب</span></h1>
           <p class="services_text"> يرجى التأكد من الطلب ليتم التثبيت </p>
           <div class="services_section_2 layout_padding">
              <div class="row">
                
                <div class="choose_section_2" style="text-align: right; direction: rtl;">

                    <div class="row">
                      
                       <div class="col-md-4">
                          <div class="" style="text-align: center;">
                             <img src="assets/images/check-mark.png" alt="" style="width: 50px;">
                             <br><br>
                             <p class="dummy_text" style="font-size: 20px; font-weight: bolder"> تاريخ الحجز </p>
                             <hr>
                             <p class="dummy_text" style="font-size: 20px; font-weight: bolder; "> ؟؟؟ </p>
                          </div>
                       </div>
                 
                       <div class="col-md-4">
                          <div class="" style="text-align: center;">
                             <img src="assets/images/clock1.png" alt="" style="width: 50px;"> 
                             <br><br>
                             <p class="dummy_text" style="font-size: 20px; font-weight: bolder"> وقت الحجز </p>
                             <hr>
                             <p class="dummy_text" style="font-size: 20px; font-weight: bolder; "> ؟؟؟ </p>
                          </div>
                       </div>
                 
                       <div class="col-md-4">
                          <div class="" style="text-align: center;">
                             <img src="assets/images/cart.png" alt="" style="width: 50px;">
                             <br><br>
                             <p class="dummy_text" style="font-size: 20px; font-weight: bolder;"> السعر الكلي </p>
                             <hr>
                             <p class="dummy_text" style="font-size: 20px; font-weight: bolder; "> ؟؟؟ </p>
                          </div>
                       </div>
                 
                   </div>
                 
                    <br><br>
                 </div>

              </div>
           </div>

           <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" style="background-color: #0c426e;"> &nbsp; تم  &nbsp; <i class="fa fa-check"></i> &nbsp; </button>
         </div>

        </div>
     <br><br><br><br><br>
    </div>

</body>

@endsection


@section('js')

@endsection
