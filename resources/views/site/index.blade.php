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

            <form action="{{ route('ord.save') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
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
      <h4 class="trusted_text" style="font-size: 18px; font-weight: bolder"> تفاصيل السيارة </h4>
   </div>
   <p class="dummy_text" style="font-size: 16px; font-weight: bolder"> أضف معلومات السيارة </p>
</div>
<br><br>


<div class="choose_section_2" style="text-align: right; direction: rtl;">
   
   <div class="row">

<div class="col-md-4">
   <div class="form-group">
      <label style="font-size: 16px; font-weight: bolder; color: black;">موقع السيارة</label>
         <div class="wrapper">
            <div class="select-btn">
               <span>اختر المنطقة</span>
               <i class="uil uil-angle-down"></i>
            </div>
            <div class="content">
               <div class="search">
                  <i class="uil uil-search"></i>
                  <input spellcheck="false" type="text" placeholder="search">
               </div>
               <ul class="options">
               </ul>
            </div>
         </div>
   </div>
</div>

      <div class="col-md-4">
          <div class="form-group">
              <label style="font-size: 16px; font-weight: bolder; color: black;">رقم السيارة</label>
              <div class="cal-icon" style="display: flex; align-items: center;">
                  <input name="numOfCar" type="text" class="form-control" @error('numOfCar') is-invalid @enderror>
              </div>
          </div>
          @error('numOfCar')
          <div class="alert alert-danger" style="font-size: 14px;">  يجب إدخال رقم السيارة ويجب أن يكون 6 أرقام </div>
      @enderror
      </div>

        <div class="col-md-4">
          <div class="form-group">
              <label style="font-size: 16px; font-weight: bolder; color: black;">نوع السيارة</label>
              <div class="time-icon" style="display: flex; align-items: center;">
                  <input name="typeOfCar" type="text" class="form-control" @error('typeOfCar') is-invalid @enderror>
              </div>
          </div>
          @error('typeOfCar')
          <div class="alert alert-danger">يجب إدخال نوع السيارة</div>
       @enderror
      </div>


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


   {{-- search and select from dropdown --}}  
   {{-- <script>
      const wrapper = document.querySelector(".wrapper"),
      searchInp = wrapper.querySelector("input"),
      selectBtn = wrapper.querySelector(".select-btn"),
      options = wrapper.querySelector(".options");

     //  let areas = ['الجميلية', 'سيف الدولة'];

      let areas = {!! json_encode($areas->pluck('area')->toArray()) !!};
      // var areas = @json($areas);
      
      function addAreas(selectedArea){
         options.innerHTML = "";
         areas.forEach(area => {
            let isSelected = area == selectedArea ? "selected" : "";
            let li = `<li value="${area}" name="location_id" onclick="updateName(this)" class="${isSelected}">${area}</li>`;

            // let li = `<li value="${area.id}" name="location_id" onclick="updateName(this)" class="${isSelected}">${area.area}</li>`;

          options.insertAdjacentHTML("beforeend", li);
         });
      }
      addAreas();



      function updateName(selectedLi){
         searchInp.value = "";
         addAreas(selectedLi.innerText);
         wrapper.classList.remove("active");
         selectBtn.firstElementChild.innerText = selectedLi.innerText;
      }

      // function updateName(selectedLi){
      //    searchInp.value = selectedLi.value;
      //    addAreas(selectedLi.innerText);
      //    wrapper.classList.remove("active");
      //    selectBtn.firstElementChild.innerText = selectedLi.innerText;
      // }


      searchInp.addEventListener("keyup", () => {

         let arr = [];
         let searchedVal = searchInp.value.toLowerCase();
         
         arr = areas.filter(data => {
            return data.toLowerCase().startsWith(searchedVal);
         }).map(data => {
            let isSelected = data == selectBtn.firstElementChild.innerText ? "selected" : "";
            return `<li value="${area}" name="location_id" onclick="updateName(this)" class="${isSelected}">${data}</li>`;

         }).join("");

         options.innerHTML = arr ? arr : `<p>لايوجد نتيجة مطابقة</p>`;
         
      });

      selectBtn.addEventListener("click", () =>
         wrapper.classList.toggle("active"));
   </script> --}}


   
{{-- search and select from dropdown --}}
<script>
  // document.addEventListener("DOMContentLoaded", function() {
      const wrapper = document.querySelector(".wrapper");
      const searchInp = wrapper.querySelector("input");
      const selectBtn = wrapper.querySelector(".select-btn");
      const options = wrapper.querySelector(".options");

      let areas = {!! json_encode($areas->pluck('area')->toArray()) !!};

      function addAreas(selectedArea = null) {
         options.innerHTML = "";
         areas.forEach(area => {
            let isSelected = area === selectedArea ? "selected" : "";
            let li =` <li value="${area}" onclick="updateName('${area}')" class="${isSelected}">
              <input type="hidden" name="location_id" value="${area}">
              ${area}
          </li>`;

            // let li = `<li value="${area}"  onclick="updateName('${area}')" class="${isSelected}"><input type="hidden" name="location_id"></input>${area}</li>`;
            options.insertAdjacentHTML("beforeend", li);
         });
      }
      addAreas();

      function updateName(selectedArea) {
         searchInp.value = "";
         selectBtn.firstElementChild.innerText = selectedArea;
         // إضافة التأشير على العنصر المحدد
         options.querySelectorAll('li').forEach(li => {
            li.classList.remove('selected');
         });
         event.target.classList.add('selected');
         wrapper.classList.remove("active");
      }

      searchInp.addEventListener("keyup", () => {
         let arr = [];
         let searchedVal = searchInp.value.trim().toLowerCase();

         arr = areas.filter(data => {
            return data.toLowerCase().startsWith(searchedVal);
         }).map(data => {
            let isSelected = data === selectBtn.firstElementChild.innerText ? "selected" : "";
            return `<li value="${data}"  onclick="updateName('${data}')" class="${isSelected}"><input type="hidden" name="location_id">${data}</li>`;
         }).join("");

         options.innerHTML = arr ? arr : `<p>لايوجد نتيجة مطابقة</p>`;
      });

      selectBtn.addEventListener("click", () => wrapper.classList.toggle("active"));
  // });
</script>

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
