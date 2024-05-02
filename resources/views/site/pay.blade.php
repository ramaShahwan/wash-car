@extends('site.layouts.master')

@section('css')


<style>
    .selected {
        background-color: blue;
        color: white;
    }
    
    .selected p {
        color: white;  /* يمكنك تغيير لون الخط هنا */
    }

    .choose_section_2 .col-md-4 {
        margin-bottom: 20px;  /* لترك مسافة بين الأسطر */
    }
</style>    

@endsection


@section('content')

<body>

    <div class="services_section layout_padding">
        <div class="container">
           <h1 class="services_taital"><span style="color: #0c426e"> طريقة الدفع </span></h1>
           {{-- <p class="services_text"> يرجى التأكد من الطلب ليتم التثبيت </p> --}}

           <form action="{{ route('ord.setPay') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('POST')
             <div class="services_section_2 layout_padding">
              <div class="row">
                <div class="choose_section_2" style="text-align: right; direction: rtl;">
                    <div class="row">
                    @foreach ($pay as $item)
                        <div class="col-md-4">
                            <div class="" style="text-align: center; border: 2px solid #0c426e; padding: 20px;">
                              @if ($item->image)
                                <img src="{{URL::asset('/site/img/pay/'.$item->image)}}" style="width: 100px;">
                              @else  
                                <img src="{{URL::asset('site/img/pay/mobile-payment.png')}}" style="width: 100px;">
                              @endif
                                <br><br>
                                <p class="dummy_text" style="font-size: 20px; font-weight: bolder"> {{ $item->way }} </p>
                                <br><br>
                                <hr>
                                <p class="dummy_text" style="font-size: 20px;"> رقم الحساب: </p> <br>
                                <p class="dummy_text" style="font-size: 20px; font-weight: bolder"> {{ $item->accountNumber }} </p>
                                <hr>

                                <button type="submit" name="pay_id" value="{{ $item->id }}" class="btn" style="background-color: goldenrod; color:black"> اختر </button>

                            </div>
                        </div>
                    @endforeach
         <br><br>
         <br><br>
                </div>
              </div>
           </div>
           <br><br>
           {{-- <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" style="background-color: #0c426e;"> &nbsp; تأكيد الدفع &nbsp; <i class="fa fa-check"></i> &nbsp; </button>
           </div> --}}
         <br><br><br>

        </form>

        </div>
    </div>


</body>

@endsection


@section('js')

<script>
$(document).ready(function() {
    $('.btn').click(function() {
        $('.btn').removeClass('selected'); // إزالة الفئة من جميع الديفات
        $(this).addClass('selected'); // إضافة الفئة إلى الديف المختار
        $(this).css('background-color', 'blue'); // تغيير لون الخلفية إلى الأزرق
    });
});
</script>



{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
         $(document).ready(function() {
         $('.btn').click(function() {
             $('.btn').removeClass('selected'); // إزالة الفئة من جميع الديفات
             $(this).addClass('selected'); // إضافة الفئة إلى الديف المختار
         });
     });
</script> --}}


{{-- <script>
    let popup = document.getElementById("popup");

    function openPopup(){
        popup.classlist.add("open-popup");  
    }

    function closePopup(){
        popup.classlist.remove("open-popup");  
    }
</script> --}}


{{-- <script>
    const section = document.querySelector("section"),
    overlay = document.querySelector(".overlay"),
    showBtn = document.querySelector(".show-modal"),
    closeBtn = document.querySelector(".close-btn"),

    showBtn.addEventListener("click", () => section.classList.add("active"));
</script> --}}


@endsection
