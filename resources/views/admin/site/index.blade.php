@extends('site.layouts.master')

@section('css')

{{-- flatpicker --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<style>
.selected {
    background-color: blue;
    color: white;
}

.selected p {
    color: white; /* يمكنك تغيير لون الخط هنا */
}

.selected h2 {
    color: white; /* يمكنك تغيير لون الخط هنا */
}

.choose_box1:hover h2 {
    color: white;
}

</style>

@endsection


@section('content')

@if(session()->has('Add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>{{ session()->get('Add') }}</strong>
	<button type="button" class="close" data_dismiss="alert" aria_lable="Close">
		<span aria_hidden="true">&times;</span>
	</button>
</div>
@endif


   <body>

      
      <!-- choose section start -->

      <div class="choose_section layout_padding">
         <div class="container">
            <h1 class="services_taital"><span style="color: #0c426e">اطلب الآن</span></h1>

            <form action="{{ route('admin_ord.save') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
               @csrf
               @method('POST')

            {{-- -------------1------------- --}}
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
                           <img src="site/images/van.png" alt="" style="width: 100px;">
                           <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> سيارة كبيرة الحجم </p>
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="choose_box" style="text-align: center;">
                           <img src="site/images/car1.png" alt="" style="width: 100px;">
                           <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> سيارة متوسطة الحجم </p>
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="choose_box" style="text-align: center;">
                           <img src="site/images/car.png" alt="" style="width: 100px;">
                           <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> سيارة صغيرة الحجم </p>
                       </div>
                   </div>
               </div>
   <br><br>

   @error('sizeOfCar')
   <div class="alert alert-danger"> يجب تحديد حجم السيارة</div>
   @enderror
           </div>

{{-- -------------2------------- --}}

<div class="layout_padding" style="text-align: right; direction: rtl;">
   <div class="number_1">
      <h4 class="number_text" style="font-size: 18px; font-weight: bolder">02</h4> &nbsp;&nbsp;
      <h4 class="trusted_text" style="font-size: 18px; font-weight: bolder">نوع الغسيل</h4>
   </div>
   <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> ما هو الغسيل الأفضل لسيارتك؟ </p>
</div>
<br><br>

<div class="choose_section_2">
   <div class="row">

      @if(isset($services) && !$services->isEmpty()) 

      @foreach($services as $ser)
      @if($ser->type == 'أساسية')
   
      <div class="col-md-4">
         <div class="choose_box1" style="text-align: center;">
            <input type="hidden" name="service" value="{{ $ser->id }}">
            <h2 style="font-weight: bolder"> {{ $ser->name }} </h2>
            <hr>
            <p class="dummy_text" style="font-size: 20px; font-weight: bolder"> {{ $ser->price }} </p>
            <hr>
            <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> {{ $ser->period }} min </p>
            <hr>
            <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> {{ $ser->description }} </p>
         </div>
      </div>

      @endif
      @endforeach
   
      @endif

   </div>
   <br><br>



</div>


{{-- -------------3------------- --}}

<div class="layout_padding" style="text-align: right; direction: rtl;">
   <div class="number_1">
      <h4 class="number_text" style="font-size: 18px; font-weight: bolder">03</h4> &nbsp;&nbsp;
      <h4 class="trusted_text" style="font-size: 18px; font-weight: bolder">خدمات إضافية</h4>
   </div>
   <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> أضف الخدمات إلى الطلب الخاص بك </p>
</div>
<br><br>

<div class="choose_section_2" style="text-align: right; direction: rtl;">
   <div class="row">

   @if(isset($services) && !$services->isEmpty()) 

   @foreach($services as $ser)
   @if($ser->type == 'إضافية')

   <div class="col-md-12">
      <input type="checkbox" name="service_ids[]" value="{{ $ser->id }}" > &nbsp;
      <p class="testimonial_text" style="display: inline;"> {{ $ser->name }} : {{ $ser->description }} </p>
      <hr>
   </div>

   @endif
   @endforeach

   @endif

   </div>
<br><br>
</div>


{{-- -------------4------------- --}}

<div class="layout_padding" style="text-align: right; direction: rtl;">
   <div class="number_1">
      <h4 class="number_text" style="font-size: 18px; font-weight: bolder">04</h4> &nbsp;&nbsp;
      <h4 class="trusted_text" style="font-size: 18px; font-weight: bolder">اختر التاريخ والوقت</h4>
   </div>
   <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> اختر لإجراء الحجز </p>
</div>
<br><br>

<div class="choose_section_2" style="text-align: right; direction: rtl;">

   <div class="row">
      <div class="col-md-6">
          <div class="form-group">
              <label style="font-size: 16px; font-weight: bolder; color: black;">التاريخ</label>
              <div class="cal-icon" style="display: flex; align-items: center;">
                  <img src="site/images/calander.png" alt="" style="width:20px; height: 20px;"> &nbsp;
                  <input name="orderDate" type="datetime-local" class="form-control" @error('orderDate') is-invalid @enderror>
              </div>
          </div>
          @error('orderDate')
          <div class="alert alert-danger">يجب تحديد تاريخ تقديم الخدمة</div>
       @enderror
      </div>

        <div class="col-md-6">
          <div class="form-group">
              <label style="font-size: 16px; font-weight: bolder; color: black;">الوقت</label>
              <div class="time-icon" style="display: flex; align-items: center;">
                  <img src="site/images/clock.png" alt="" style="width:20px; height: 20px;"> &nbsp;
                  <input name="orderTime" type="datetime" class="form-control"  @error('orderTime') is-invalid @enderror>
              </div>
          </div>
          @error('orderTime')
          <div class="alert alert-danger">يجب تحديد وقت تقديم الخدمة</div>
       @enderror
      </div>

  </div>

   <br><br>
</div>



{{-- -------------5------------- --}}

<div class="layout_padding" style="text-align: right; direction: rtl;">
   <div class="number_1">
      <h4 class="number_text" style="font-size: 18px; font-weight: bolder">05</h4> &nbsp;&nbsp;
      <h4 class="trusted_text" style="font-size: 18px; font-weight: bolder"> تفاصيل السيارة </h4>
   </div>
   <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> أضف معلومات السيارة </p>
</div>
<br><br>


<div class="choose_section_2" style="text-align: right; direction: rtl;">

   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
             <label style="font-size: 16px; font-weight: bolder; color: black;">رقم السيارة</label>
             <div class="cal-icon" style="display: flex; align-items: center;">
                 <input name="numOfCar" type="text" class="form-control" @error('numOfCar') is-invalid @enderror>
             </div>
             @error('numOfCar')
                 <div class="alert alert-danger" style="font-size: 14px;">  يجب إدخال رقم السيارة ويجب أن يكون 6 أرقام </div>
             @enderror
         </div>
     </div>
     

        <div class="col-md-6">
          <div class="form-group">
              <label style="font-size: 16px; font-weight: bolder; color: black;">نوع السيارة</label>
              <div class="time-icon" style="display: flex; align-items: center;">
                  <input name="typeOfCar" type="text" class="form-control"  @error('typeOfCar') is-invalid @enderror>
              </div>
          </div>
          @error('typeOfCar')
          <div class="alert alert-danger">يجب إدخال نوع السيارة</div>
       @enderror
      </div>

  </div>

   <br><br>
</div>


<br><br><br>
<br><br><br>
<br><br><br>

   <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary" style="background-color: #0c426e;">تثبيت الطلب</button>
   </div>

   <br><br><br>

   </form>

      </div>
   </div>
      <!-- choose section end -->
 


      <!-- Javascript files-->
      <script src="{{URL::asset('site/js/jquery.min.js')}}"></script>
      <script src="{{URL::asset('site/js/popper.min.js')}}"></script>
      <script src="{{URL::asset('site/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{URL::asset('site/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{URL::asset('site/js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{URL::asset('site/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{URL::asset('site/js/custom.js')}}"></script>
      <!-- javascript --> 
      <script src="{{URL::asset('site/js/owl.carousel.js')}}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
         $(document).ready(function() {
         $('.choose_box').click(function() {
             $('.choose_box').removeClass('selected'); // إزالة الفئة من جميع الديفات
             $(this).addClass('selected'); // إضافة الفئة إلى الديف المختار
     
             var selectedValue = $(this).find('p').text(); // الحصول على القيمة من الديف المختار
     
             // يمكنك الآن استخدام selectedValue لتخزينها في قاعدة البيانات
             // على سبيل المثال، يمكنك إضافة هذه القيمة إلى نموذجك كقيمة مخفية
             $('form').append('<input type="hidden" name="sizeOfCar" value="' + selectedValue + '">');
         });
     });
</script>
     
<script>
 $(document).ready(function() {
   $('.choose_box1').click(function() {
       $('.choose_box1').removeClass('selected'); // إزالة الفئة من جميع الديفات
       $(this).addClass('selected'); // إضافة الفئة إلى الديف المختار

       var selectedValue = $(this).find('input').val(); // الحصول على القيمة من الديف المختار

       // يمكنك الآن استخدام selectedValue لتخزينها في قاعدة البيانات
       // على سبيل المثال، يمكنك إضافة هذه القيمة إلى نموذجك كقيمة مخفية
       $('form').append('<input type="hidden" name="service_id" value="' + selectedValue + '">');
   });
});
</script>


      
{{-- flatpicker --}}
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

{{-- Time --}}
<script>
	config = {
    noCalendar: true,
    enableTime: true,
    dateFormat: 'h:i K'
	}
	flatpickr("input[type=datetime]", config);
</script>

<script>
   config = {
       dateFormat: "Y-m-d",
       altInput: true,
       altFormat: "F j, Y",
       minDate: "today" // تحديد الحد الأدنى للتاريخ كتاريخ اليوم
   }
   flatpickr("input[type=datetime-local]", config);
 </script>
 


   </body>

@endsection


@section('js')

@endsection
