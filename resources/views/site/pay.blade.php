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

/* ----------------------------------------- */

.btn{
    padding: 10px 60px;
    background: #fff;
    border: 0;
    outline: none;
    cursor: pointer;
    font-size: 22px;
    font-weight: 500;
    border-radius: 30px;
}

.popup{
    width: 400px;
    background: #fff;
    border-radius: 6px;
    position: absolute;
    top: 0;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.1);
    text-align: center;
    padding: 0 30px 30px;
    color: #333;
    visibility: hidden;
    transition: transform 0.4s, top 0.4s;
}

.open-popup{
    visibility: visible;
    top: 50%;
    transform: translate(-50%, -50%) scale(1);
}

.popup img{
    width: 100px;
    margin-top: -50px;
    border-radius: 50%;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.popup h2{
    font-size: 38px;
    font-weight: 500;
    margin: 30px 0 10px;
}

.popup button{
    width: 80%;
    margin-top: 30px;
    padding: 5px 0;
    background: #54a836;
    color: #fff;
    border: 0;
    outline: 0;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
}
</style>    

@endsection


@section('content')

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

                @foreach ($pay as $pay)
                            
                    {{-- <a href="{{ route('member.details', $member->id)}}"> --}}

                        {{-- <a class="dropdown-item" href="#" data-pay_id="{{ $pay->id }}"
                            data-toggle="modal" data-target="#account_number"> --}}



                        <div class="col-md-4">
                            <div class="choose_box" style="text-align: center; border: 2px solid #0c426e;">

                              @if ($pay->image)
                                <img src="{{URL::asset('/assets/img/pay/'.$pay->image)}}" style="width: 100px;">
                              @else  
                                <img src="{{URL::asset('assets/img/pay/mobile-payment.png')}}" style="width: 100px;">
                              @endif

                                <br><br>
                                <p class="dummy_text" style="font-size: 20px; font-weight: bolder"> {{ $pay->way }} </p>
                                <br><br>
                                <hr>
                            
                            <button type="submit" class="btn" onclick="openPopup()"
                             style="background-color: goldenrod; color:black">تفاصيل الدفع</button>

                                <div class="popup" id="popup">
                                    <img src="{{URL::asset('assets/images/correct.png')}}" alt="">
                                    <br><br>
                                    {{-- @if (is_numeric($pay->accountNumber)) --}}
                                        <h3>يرجى التحويل على رقم الحساب التالي: </h3>  <h3> {{ $pay->accountNumber }} </h3>  
                                    {{-- @else
                                        {{ $pay->accountNumber }}
                                    @endif --}}

                                    {{-- <br><br> --}}

                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn" type="button" onclick="closePopup()"> إلغاء </button>
                                        </div>
                                        <div class="col-6">
                                            <button class="btn" type="submit" onclick="closePopup()"> تأكيد </button>
                                        </div>
                                    </div>
                                
                                </div>

                            </div>
                        </div>

                    {{-- </a> --}}
                @endforeach

         <br><br>
         <br><br>
                </div>
              </div>
           </div>
           <br><br>

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


<script>
    let popup = document.getElementById("popup");

    function openPopup(){
        popup.classlist.add("open-popup");  
    }

    function closePopup(){
        popup.classlist.remove("open-popup");  
    }
</script>

@endsection
