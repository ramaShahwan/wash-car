@extends('site.layouts.master')

@section('css')

{{-- flatpicker --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<link rel="stylesheet" href="http://unicons.iconscout.com/release/v4.0.0/css/line.css">


<style>
.selected1 {
    background-color: blue;
    color: white;
}

.selected1 p {
    color: white; /*يمكنك تغيير لون الخط هنا*/
}

.selected1 h2 {
    color: white; /* يمكنك تغيير لون الخط هنا */
}

.choose_box1:hover h2 {
    color: white;
}

/* ---------------------------------------------------------------- */

.wrapper{
   padding-top: 0;
   margin-top: 0;
   border: none;
   box-shadow: none;
}

.select-btn{
   height: 38px;
   font-size: 16px;
   justify-content: space-between;
   padding: 6px 12px;
   border-radius: 4px;
   background-color: #fff;
   border: 1px solid #ccc;
   box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
   transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}

.select-btn i{
   font-size: 31px;
   transition: transform 0.3s linear;
}
.content{
   background: #fff;
   margin-top: 15px;
   padding: 20px;
   border-radius: 7px;
   display: none;
}
.wrapper.active .content{
   display: block;
}
.wrapper.active .select-btn i{
   transform: rotate(-180deg);
}
.content .search{
   position: relative;
}
.search input{
   height: 30px;
   width: 100%;
   font-size: 16px;
   padding: 0 15px 0 43px;
   outline: none;
   border: 1px solid black;
   border-radius: 5px;
}
.search i{
   position: absolute;
   left: 15px;
   line-height: 30px;
   color: black;
   font-size: 16px;
}
.content .options{
   margin-top: 10px;
   max-height: 200px;
   overflow-y: auto;
   padding-right: 7px;
}
.options li{
   height: 50px;
   background: #f2f2f2;
   border-radius: 5px;
   padding: 0 13px;
   font-size: 16px;
   color: black;
}
.options li:hover, li.selected{
   background: #f2f2f2;
}

.select-btn, .options li{
   display: flex;
   cursor: pointer;
   align-items: center;
}
.options::-webkit-scrollbar{
   width: 7px;
}
.options::-webkit-scrollbar-track{
   background: #f1f1f1;
   border-radius: 25px;
}
.options::-webkit-scrollbar-thumb{
   background: #ccc;
   border-radius: 25px;
}

</style>

@endsection


@section('content')

   <body>
      
      <!-- choose section start -->

      <div class="choose_section layout_padding">
         <div class="container">
            <h1 class="services_taital"><span style="color: #0c426e">اطلب الآن</span></h1>

            <form action="{{ route('ord.home.save') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
               @csrf
               @method('POST')

            {{-- -------------1------------- --}}
            <div class="layout_padding" style="text-align: right; direction: rtl;">
               <div class="number_1">
                  <h4 class="number_text" style="font-size: 18px; font-weight: bolder">01</h4> &nbsp;&nbsp;
                  <h4 class="trusted_text" style="font-size: 18px; font-weight: bolder">نوع العقار</h4>
               </div>
               <p class="dummy_text" style="font-size: 16px; font-weight: bolder">اختر نوع العقار</p>
            </div>
            <br><br>

            <div class="choose_section_2">
               <div class="row">
                   <div class="col-md-4">
                       <div class="choose_box" style="text-align: center;">
                           <img src="site/images/barn.png" alt="" style="width: 100px;"><br><br>
                           <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> مزرعة </p>
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="choose_box" style="text-align: center;">
                           <img src="site/images/workplace.png" alt="" style="width: 100px;"><br><br>
                           <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> مكتب </p>
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="choose_box" style="text-align: center;">
                           <img src="site/images/home.png" alt="" style="width: 100px;"><br><br>
                           <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> منزل </p>
                       </div>
                   </div>
               </div>
   <br><br>
           </div>

{{-- -------------2------------- --}}

<div class="layout_padding" style="text-align: right; direction: rtl;">
   <div class="number_1">
      <h4 class="number_text" style="font-size: 18px; font-weight: bolder">02</h4> &nbsp;&nbsp;
      <h4 class="trusted_text" style="font-size: 18px; font-weight: bolder">نوع التنظيف</h4>
   </div>
   <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> ما هو التنظيف الأفضل لعقارك؟ </p>
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
            <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> {{ $ser->period }} </p>
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
      <input type="checkbox" name="service_ids[]" value="{{ $ser->id }}"> &nbsp;
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
                  <input name="orderTime" type="datetime" class="form-control" @error('orderTime') is-invalid @enderror>
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
      <h4 class="trusted_text" style="font-size: 18px; font-weight: bolder"> تفاصيل العقار </h4>
   </div>
   <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> أضف معلومات العقار </p>
</div>
<br><br>


<div class="choose_section_2" style="text-align: right; direction: rtl;">
   
   <div class="row">

<div class="col-md-4">
   <div class="form-group">
      <label style="font-size: 16px; font-weight: bolder; color: black;">موقع العقار</label>
      <select name="location_id" class="form-control select @error('location_id') is-invalid @enderror"> 
         <option value="لايوجد">اختر المنطقة</option>

         @foreach($areas as $area)
            <option value="{{$area->area}}">{{$area->area}}</option>
         @endforeach  
      </select>

      @error('location_id')
         <div class="alert alert-danger">يجب إدخال موقع العقار</div>
      @enderror
   </div>
</div><br>

      <div class="col-md-4">
          <div class="form-group">
              <label style="font-size: 16px; font-weight: bolder; color: black;">رقم البناء</label>
              <div class="cal-icon" style="display: flex; align-items: center;">
                  <input name="NumOfbulding" type="text" class="form-control" @error('NumOfbulding') is-invalid @enderror>
              </div>
          </div>
          @error('NumOfbulding')
          <div class="alert alert-danger" style="font-size: 14px;"> يجب إدخال رقم البناء </div>
      @enderror
      </div>

      <div class="col-md-4">
         <div class="form-group">
             <label style="font-size: 16px; font-weight: bolder; color: black;">رقم الطابق</label>
             <div class="cal-icon" style="display: flex; align-items: center;">
                 <input name="NumOfFloor" type="text" class="form-control" @error('NumOfFloor') is-invalid @enderror>
             </div>
         </div>
         @error('NumOfFloor')
         <div class="alert alert-danger" style="font-size: 14px;"> يجب إدخال رقم الطابق </div>
     @enderror
     </div>

  </div>

  <br>

  <div class="row">

   <div class="col-md-4">
      <div class="form-group">
         <label style="font-size: 16px; font-weight: bolder; color: black;">عدد العاملات</label>
         <select name="NumOfEmp" class="form-control select @error('NumOfEmp') is-invalid @enderror"> 
            <option value="لايوجد">اختر عدد العاملات</option>
            <option value="1">عاملة واحدة</option>
            <option value="2">عاملتان</option>
            <option value="3">ثلاث عاملات</option>
            <option value="4">أربع عاملات</option>
         </select>
   
         @error('NumOfEmp')
            <div class="alert alert-danger">يجب إدخال عدد العاملات</div>
         @enderror
      </div>
   </div><br>
   
   <div class="col-md-4">
      <div class="form-group">
         <label style="font-size: 16px; font-weight: bolder; color: black;">عدد الساعات</label>
         <select name="NumOfHour" class="form-control select @error('NumOfHour') is-invalid @enderror"> 
            <option value="لايوجد">اختر عدد الساعات</option>
            <option value="1">ساعة واحدة</option>
            <option value="2">ساعتان</option>
            <option value="3">ثلاث ساعات</option>
            <option value="4">أربع ساعات</option>
            <option value="5">خمس ساعات</option>
            <option value="6">ست ساعات</option>
            <option value="7">سبع ساعات</option>
            <option value="8">ثماني ساعات</option>
         </select>
   
         @error('NumOfHour')
            <div class="alert alert-danger">يجب إدخال عدد الساعات</div>
         @enderror
      </div>
   </div><br>

   
   <div class="col-md-4">

   <div class="form-group" style="text-align: right;">
      <label class="display-block" style="font-weight: bold; color: black;">هل تحتاج مواد تنظيف؟</label> <br>
     
      <div class="form-check form-check-inline">
          <label class="form-check-label" style="color: black;" for="status_inactive"> نعم </label>
          &nbsp;
          <input class="form-check-input" type="radio" name="cleanMaterial" id="status_inactive" value="1">
      </div>

      <div class="form-check form-check-inline">
          <label class="form-check-label" style="color: black;" for="status_active"> لا </label>
          &nbsp;
          <input class="form-check-input" type="radio" name="cleanMaterial" id="status_active" value="0" checked>
      </div> 
   </div> 
  </div><br>


  <button type="submit" class="btn btn-primary" style="background-color: #0c426e; margin-left: auto; margin-right: auto; margin-top: 50px; display: block;">تثبيت الطلب</button>

     </div>

   <br><br>
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


{{-- -------------------------------------------------------------------------------- --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
         $(document).ready(function() {
         $('.choose_box').click(function() {
             $('.choose_box').removeClass('selected1'); // إزالة الفئة من جميع الديفات
             $(this).addClass('selected1'); // إضافة الفئة إلى الديف المختار
     
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
       $('.choose_box1').removeClass('selected1'); // إزالة الفئة من جميع الديفات
       $(this).addClass('selected1'); // إضافة الفئة إلى الديف المختار

       var selectedValue = $(this).find('input').val(); // الحصول على القيمة من الديف المختار

       // يمكنك الآن استخدام selectedValue لتخزينها في قاعدة البيانات
       // على سبيل المثال، يمكنك إضافة هذه القيمة إلى نموذجك كقيمة مخفية
       $('form').append('<input type="hidden" name="service_id" value="' + selectedValue + '">');
   });
});
</script>


{{-- -------------------------------------------------------------------------------- --}}

      
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
