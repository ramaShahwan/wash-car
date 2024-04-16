@extends('site.layouts.master')

@section('css')


<style>
    .selected {
        background-color: blue;
        color: white;
    }
    
    .selected p {
        color: white; /* يمكنك تغيير لون الخط هنا */
    }
</style>    

@endsection


@section('content')

{{-- @if(session()->has('Add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>{{ session()->get('Add') }}</strong>
	<button type="button" class="close" data_dismiss="alert" aria_lable="Close">
		<span aria_hidden="true">&times;</span>
	</button>
</div>
@endif --}}

<body>

    <div class="services_section layout_padding">
        <div class="container">
           <h1 class="services_taital"><span style="color: #0c426e"> طريقة الدفع </span></h1>
           {{-- <p class="services_text"> يرجى التأكد من الطلب ليتم التثبيت </p> --}}

           {{-- <form action="{{ route('ord.pay') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('POST') --}}

           <div class="services_section_2 layout_padding">
              <div class="row">
                <div class="choose_section_2" style="text-align: right; direction: rtl;">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="choose_box" style="text-align: center;">
                                {{-- <input type="hidden" value="{{  }}"> --}}
                                <img src="assets/images/syriatel.jpg" alt="" style="width: 100px;">
                                <br><br>
                                <p class="dummy_text" style="font-size: 20px; font-weight: bolder"> سيرياتيل كاش  </p>
                            </div>
                        </div>

                       {{-- <div class="col-md-4">
                          <div class="choose_box" style="text-align: center;">
                                <img src="assets/images/mtn.jpg" alt="" style="width: 100px;">
                                <br><br>
                                <p class="dummy_text" style="font-size: 20px; font-weight: bolder"> كاش موبايل </p>
                          </div>
                       </div>
                 
                       <div class="col-md-4">
                            <div class="choose_box" style="text-align: center;">
                                <img src="assets/images/paying.png" alt="" style="width: 100px;">
                                <br><br>
                                <p class="dummy_text" style="font-size: 20px; font-weight: bolder"> كاش عند الخدمة </p>
                            </div>
                        </div>
                    </div> --}}
         <br><br>
         <br><br>
                </div>
              </div>
           </div>

           <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" style="background-color: #0c426e;"> &nbsp; تأكيد الدفع &nbsp; <i class="fa fa-check"></i> &nbsp; </button>
           </div>

         <br><br><br>

        {{-- </form> --}}

        </div>
    </div>

</body>

@endsection


@section('js')


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
         $(document).ready(function() {
         $('.choose_box').click(function() {
             $('.choose_box').removeClass('selected'); // إزالة الفئة من جميع الديفات
             $(this).addClass('selected'); // إضافة الفئة إلى الديف المختار
     
             var selectedValue = $(this).find('p').text(); // الحصول على القيمة من الديف المختار
     
             // يمكنك الآن استخدام selectedValue لتخزينها في قاعدة البيانات
             // على سبيل المثال، يمكنك إضافة هذه القيمة إلى نموذجك كقيمة مخفية
             $('form').append('<input type="hidden" name="id" value="' + selectedValue + '">');
         });
     });
</script>

@endsection
