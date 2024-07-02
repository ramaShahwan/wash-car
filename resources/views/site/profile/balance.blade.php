@extends('site.layouts.master')

@section('css')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">


   <style>
      .dash-widget {
         background-color: #fff;
         border-radius: 4px;
         margin-bottom: 30px;
         padding: 20px;
         position: relative;
         box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
      }
      .dash-widget-info > span.widget-title1 {
         background: #0162e8;
         color: #fff;
         padding: 5px 10px;
         border-radius: 4px;
         font-size: 13px;
      }
   </style>
@endsection


@section('content')

<body>
    <div class="services_section layout_padding">

      @if (session('message'))
         <div class="alert alert-success" style="text-align: right; direction: rtl;">
            {{ session('message') }}
         </div>
      @endif

      @if (session('error'))
         <div class="alert alert-danger" style="text-align: right; direction: rtl;">
            {{ session('error') }}
         </div>
      @endif

        <div class="container">
           <h1 class="services_taital"><span style="color: #444444">رصيد الحساب</span></h1>
           <div class="services_section_2 layout_padding">
              <div class="row">
                <div class="choose_section_2" style="text-align: right; direction: rtl;">

                  @if( auth()->user()->role == 'employee' )
                    <div class="row">
                       <div class="col-md-4">
                          <div class="" style="text-align: center;">
                             <img src="site/images/total.png" alt="" style="width: 70px;">
                             <br><br>
                             <p class="dummy_text" style="font-size: 20px; font-weight: bolder"> الرصيد الكلي </p>
                             <hr>
                             <p class="dummy_text" style="font-size: 20px; font-weight: bolder; "> {{ $balance }} </p>
                             <br><br>

                             <form action="{{ route('balance.pull') }}" method="POST">
                                @csrf
                                @method('POST')
                                
                                <input class="form-control" type="text" name="balance" placeholder="أدخل المبلغ المراد سحبه">
                                <button type="submit" class="btn btn-primary" style="background-color: #444444; border: none; margin-left: auto; margin-right: auto; margin-top: 50px; display: block;">سحب الرصيد</button>
                             </form>

                           </div>
                       </div>
                 
                       <div class="col-md-4">
                          <div class="" style="text-align: center;">
                             <img src="site/images/money.png" alt="" style="width: 70px;"> 
                             <br><br>
                             <p class="dummy_text" style="font-size: 20px; font-weight: bolder"> رصيد المشتريات </p>
                             <hr>
                             <p class="dummy_text" style="font-size: 20px; font-weight: bolder; "> {{ $total }} </p>
                          </div>
                       </div>
                 
                       <div class="col-md-4">
                          <div class="" style="text-align: center;">
                             <img src="site/images/paying.png" alt="" style="width: 70px;">
                             <br><br>
                             <p class="dummy_text" style="font-size: 20px; font-weight: bolder;"> رصيد الطلبات </p>
                             <hr>
                             <p class="dummy_text" style="font-size: 20px; font-weight: bolder; "> {{ $emp_total }} </p>
                          </div>
                       </div>
                    </div>

                  @elseif(auth()->user()->role == 'user' || 'admin')
                     <div class="row">
                        <div class="col-md-6">
                           <div class="" style="text-align: center;">
                              <img src="site/images/total.png" alt="" style="width: 70px;">
                              <br><br>
                              <p class="dummy_text" style="font-size: 20px; font-weight: bolder"> الرصيد الكلي </p>
                              <hr>
                              <p class="dummy_text" style="font-size: 20px; font-weight: bolder; "> {{ $balance }} </p>
                              <br><br>

                              <form action="{{ route('balance.pull') }}" method="POST">
                                 @csrf
                                 @method('POST')

                                 <input class="form-control" type="text" name="balance" placeholder="أدخل المبلغ المراد سحبه">
                                 <button type="submit" class="btn btn-primary" style="background-color: #444444; border: none; margin-left: auto; margin-right: auto; margin-top: 50px; display: block;">سحب الرصيد</button>
                              </form>

                           </div>
                        </div>
                  
                        <div class="col-md-6">
                           <div class="" style="text-align: center;">
                              <img src="site/images/money.png" alt="" style="width: 70px;"> 
                              <br><br>
                              <p class="dummy_text" style="font-size: 20px; font-weight: bolder"> رصيد المشتريات </p>
                              <hr>
                              <p class="dummy_text" style="font-size: 20px; font-weight: bolder; "> {{ $total }} </p>
                           </div>
                        </div>
                     </div>
                  @endif

                  <br><br><br><br>
                 </div>
              </div>

              <div class="row">

                  <div class="col-12" style="text-align: right; direction: rtl;">
                     {{-- <h3 style="color: #0c426e; font-weight: bold; font-size: 20px;"> <i class="fa fa-plus"></i> &nbsp; تفاصيل الإيداع في الرصيد </h3> --}}
                     <br>
                     
                     {{-- <div class="col-12">
                        @foreach ($recharge as $r)

                        <div class="dash-widget">
                           <div class="dash-widget-info text-right">
                              <h5 style="color: black; font-size: 18px;">  <i class="fa fa-plus"></i> &nbsp; قام المدير: &nbsp; <span style="color: #0c426e"> 

                                 {{ $r->admin_who_added }}
                              </span> &nbsp; بشحن رصيدك بقيمة: &nbsp; <span style="color: #0c426e"> 
                              
                                 {{ $r->amount }}
                              </span> &nbsp;
                                 بتاريخ: &nbsp; <span style="color: #0c426e"> 
                                 
                                    {{ $r->created_at->format('Y-m-d') }}
                                 </span> &nbsp; </h5>
                           </div>
                        </div>
                        
                        @endforeach
                     </div> --}}

                     {{-- <div class="col-12">
                        @foreach($orders_details as $ord)
                        <div class="dash-widget">
                           <div class="dash-widget-info text-right">
                              
                              <h5 style="color: black; font-size: 18px;"> <i class="fa fa-minus"></i> &nbsp; نوع الخدمة: &nbsp; <span style="color: #0c426e"> غسيل سيارة </span> &nbsp; نوع السيارة: &nbsp; <span style="color: #0c426e"> {{ $ord->typeOfCar }} </span> &nbsp;
                                 بتاريخ: &nbsp; <span style="color: #0c426e"> {{ $ord->orderDate }} </span> &nbsp;  السعر: &nbsp; <span style="color: #0c426e"> {{ $ord->totalPrice }} </span> &nbsp; </h5> 
                           </div>
                        </div>
                        @endforeach
                     </div> --}}

                     {{-- <div class="col-12">
                        @foreach($orders_home_details as $home)
                        <div class="dash-widget">
                           <div class="dash-widget-info text-right">
                              <h5 style="color: black; font-size: 18px;"> <i class="fa fa-minus"></i> &nbsp; نوع الخدمة: &nbsp; <span style="color: #0c426e"> تنظيف منزلي </span> &nbsp; نوع العقار: &nbsp; <span style="color: #0c426e"> {{ $home->typeOfHome }} </span> &nbsp;
                                 بتاريخ: &nbsp; <span style="color: #0c426e"> {{ $home->OrderDate }} </span> &nbsp;  السعر: &nbsp; <span style="color: #0c426e"> {{ $home->totalPrice }} </span> &nbsp; </h5>
                           </div>
                        </div>
                        @endforeach
                     </div> --}}

                     {{-- <div class="col-12">
                        @foreach($orders_home_details as $home)
                        <div class="dash-widget">
                           <div class="dash-widget-info text-right">
                              <h5 style="color: black; font-size: 18px;">
                                  <i class="fa fa-minus"></i> &nbsp; لقد قمت بسحب رصيد بمبلغ: &nbsp; <span style="color: #0c426e"> 0000 </span> &nbsp;
                                    بتاريخ: &nbsp; <span style="color: #0c426e"> {{ auth()->user()->updated_at->format('Y-m-d') }} </span> &nbsp;
                              </h5>
                           </div>
                        </div>
                        @endforeach
                     </div> --}}


                     @foreach ($balance_details as $details)

                        <div class="col-12">
                              @if($details->type == 'شحن')
                                 <div class="dash-widget">
                                    <div class="dash-widget-info text-right">
                                       <h5 style="color: black; font-size: 18px;">  <i class="fa fa-plus"></i> 
                                          &nbsp; قام المدير: &nbsp; <span style="color: #0c426e"> {{ $details->admin_who_added }} </span> 
                                          &nbsp; بشحن رصيدك بقيمة: &nbsp; <span style="color: #0c426e"> {{ $details->amount }} </span> 
                                          &nbsp; بتاريخ: &nbsp; <span style="color: #0c426e"> {{ $details->created_at->format('Y-m-d') }} </span> 
                                          &nbsp; </h5>
                                    </div>
                                 </div>
                              @endif
                           </div>

                           <div class="col-12">
                              @if($details->type == 'سحب')
                              <div class="dash-widget">
                                 <div class="dash-widget-info text-right">
                                    <h5 style="color: black; font-size: 18px;"><i class="fa fa-minus"></i> 
                                       &nbsp; لقد قمت بسحب رصيد بمبلغ: &nbsp; <span style="color: #0c426e"> {{ $details->amount }} </span> 
                                       &nbsp; بتاريخ: &nbsp; <span style="color: #0c426e"> {{ $details->created_at->format('Y-m-d') }} </span> &nbsp;
                                    </h5>
                                 </div>
                              </div>
                              @endif
                           </div>

                           <div class="col-12">
                              @if($details->type == 'سيارة')
                                 <div class="dash-widget">
                                    <div class="dash-widget-info text-right">
                                       <h5 style="color: black; font-size: 18px;"> <i class="fa fa-minus"></i>
                                          &nbsp; نوع الخدمة: &nbsp; <span style="color: #0c426e"> غسيل سيارة </span>
                                          &nbsp;  السعر: &nbsp; <span style="color: #0c426e"> {{ $details->amount }} </span> 
                                          &nbsp; بتاريخ: &nbsp; <span style="color: #0c426e"> {{ $details->created_at->format('Y-m-d') }} </span>
                                          &nbsp; </h5> 
                                    </div>
                                 </div>
                              @endif
                           </div>

                           <div class="col-12">
                              @if($details->type == 'عقار')
                                 <div class="dash-widget">
                                    <div class="dash-widget-info text-right">
                                       <h5 style="color: black; font-size: 18px;"> <i class="fa fa-minus"></i>
                                          &nbsp; نوع الخدمة: &nbsp; <span style="color: #0c426e"> تنظيف منزلي </span>
                                          &nbsp;  السعر: &nbsp; <span style="color: #0c426e"> {{ $details->amount }} </span> 
                                          &nbsp; بتاريخ: &nbsp; <span style="color: #0c426e"> {{ $details->created_at->format('Y-m-d') }} </span>
                                          &nbsp; </h5> 
                                    </div>
                                 </div>
                              @endif
                           </div>

                        @endforeach

                  </div>
              </div>
           </div>
         <br><br><br>
        </div>
    </div>
</body>

@endsection


@section('js')

@endsection
