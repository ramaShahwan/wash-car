@extends('site.layouts.master')

@section('css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
@endsection


@section('content')

<body>

    <form action="{{ route('purchases') }}" method="GET">

        <div class="choose_section layout_padding">
            <div class="container">
                <div class="row">
                <h1 class="services_taital"><span style="color: #444444">مشترياتي</span></h1>
                <br><br><br>

                <div class="col-md-9" style="float: left;text-align: right; direction: rtl; color:black;">
                    @if(isset($orders) && !$orders->isEmpty() || isset($orders_home) && !$orders_home->isEmpty()) 
                            <br><br>
                                    <div class="card">            
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table text-md-nowrap" id="example1">
                                                    <thead>
                                                        <tr>
                                                            <th class="wd-15p border-bottom-0">#</th>
                                                            <th class="wd-15p border-bottom-0">نوع الخدمة</th>
                                                            {{-- <th class="wd-15p border-bottom-0">الموقع</th> --}}
                                                            {{-- <th class="wd-15p border-bottom-0">طريقة الدفع</th> --}}
    
                                                            <th class="wd-15p border-bottom-0">السعر الإجمالي</th>
                                                            <th class="wd-15p border-bottom-0">تاريخ الطلب</th>
                                                            {{-- <th class="wd-15p border-bottom-0">وقت الطلب</th> --}}
                                                            <th class="wd-15p border-bottom-0">حالة الطلب</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1 ?>
                                                    @if(isset($orders) && !$orders->isEmpty()) 
                                                        @foreach($orders as $order)
                                                        <tr>
                                                            <td>{{$i++}}</td>
                                                            <td>غسيل سيارة</td>
                                                        
    
                                                            {{-- @if($order->location_id)
                                                            <td>{{ App\Models\Location::findOrFail($order->location_id)->area }}</td>
                                                            @else
                                                            <td> </td>
                                                            @endif --}}
                                                        
                                                            {{-- @if($order->payWay_id)
                                                            <td>{{ App\Models\PayWay::findOrFail($order->payWay_id)->way }}</td>
                                                            @else
                                                            <td> </td>
                                                            @endif --}}
    
                                                            <td>{{$order->totalPrice}}</td>
                                                            <td>{{$order->orderDate}}</td>
                                                            {{-- <td>{{$order->orderTime}}</td> --}}
                                                            <td>{{$order->status}}</td>
                                                        </tr>
                                                        @endforeach
                                                    @else 
                                                        <tr>
                                                            <td colspan="20">لم يتم العثور على نتائج</td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
    
                                            {{-- {!! $paginationLinks !!} --}}
    
                                            </div>
                                        </div>
    
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table text-md-nowrap" id="example1">
                                                    <thead>
                                                        <tr>
                                                            <th class="wd-15p border-bottom-0">#</th>
                                                            <th class="wd-15p border-bottom-0">نوع الخدمة</th>
                                                            {{-- <th class="wd-15p border-bottom-0">الموقع</th> --}}
                                                            {{-- <th class="wd-15p border-bottom-0">طريقة الدفع</th> --}}
    
                                                            <th class="wd-15p border-bottom-0">السعر الإجمالي</th>
                                                            <th class="wd-15p border-bottom-0">تاريخ الطلب</th>
                                                            {{-- <th class="wd-15p border-bottom-0">وقت الطلب</th> --}}
                                                            <th class="wd-15p border-bottom-0">حالة الطلب</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1 ?>
                                                        @if(isset($orders_home) && !$orders_home->isEmpty()) 
                                                        
                                                        @foreach($orders_home as $home)
                                                        <tr>
                                                            <td>{{$i++}}</td>
    
                                                            <td>تنظيف منازل</td>
                                                    
                                                            {{-- @if($home->location_id)
                                                                <td>{{ App\Models\Location::findOrFail($home->location_id)->area }}</td>
                                                            @else
                                                                <td> </td>
                                                            @endif --}}
                                                        
                                                            {{-- @if($home->payWay_id)
                                                            <td>{{ App\Models\PayWay::findOrFail($home->payWay_id)->way }}</td>
                                                            @else
                                                            <td> </td>
                                                            @endif --}}
    
                                                            <td>{{$home->totalPrice}}</td>
                                                            <td>{{$home->OrderDate}}</td>
                                                            {{-- <td>{{$home->OrderTime}}</td> --}}
                                                            <td>{{$home->statuss}}</td>
                                                        </tr>
                                                        @endforeach
    
                                                        @else 
                                                        <tr>
                                                            <td colspan="20">لم يتم العثور على نتائج</td>
                                                        </tr>
                                                        @endif
    
                                                    </tbody>
                                                </table>
    
                                            {{-- {!! $paginationLinks !!} --}}
    
                                            </div>
                                        </div>
                                    </div>
                        <br><br><br>
                    @endif
                    </div>



                <div class="col-md-3" style="float: right;">
                    <br><br><br>

                    <div class="form-check" style="text-align: right; direction: rtl; color:black; font-size: 16px; font-weight: bold;">
                        <input class="form-check-input" type="checkbox" value="معلق" name="status[]" id="flexCheckDefault" 
                         @if (in_array('معلق', $status)) checked  @endif> 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="form-check-label" for="flexCheckDefault">
                        المشتريات المعلقة
                        </label>
                    </div>
    
                    <div class="form-check" style="text-align: right; direction: rtl; color:black; font-size: 16px; font-weight: bold;">
                        <input class="form-check-input" type="checkbox" value="قيد الإنجاز" name="status[]" id="flexCheckChecked" 
                        @if (in_array('قيد الإنجاز', $status)) checked  @endif>    
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="form-check-label" for="flexCheckChecked">
                            المشتريات المقبولة
                            </label>
                    </div>
    
                    <div class="form-check" style="text-align: right; direction: rtl; color:black; font-size: 16px; font-weight: bold;">
                        <input class="form-check-input" type="checkbox" value="منجز" name="status[]" id="flexCheckChecked1" 
                        @if (in_array('منجز', $status)) checked  @endif>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="form-check-label" for="flexCheckChecked1">
                        المشتريات المنجزة
                        </label>
                    </div>
    
                    <div class="form-check" style="text-align: right; direction: rtl; color:black; font-size: 16px; font-weight: bold;">
                        <input class="form-check-input" type="checkbox" value="مرفوض" name="status[]" id="flexCheckChecked2" 
                        @if (in_array('مرفوض', $status)) checked  @endif>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="form-check-label" for="flexCheckChecked2">
                        المشتريات المرفوضة
                        </label>
                    </div>
    
                    <br>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" style="background-color: #444444; border: none;">تم</button>
                    </div>
                    </div>  
    
                </div>

                <br><br><br>

            </div>
        </div>

    </form>

</body>

   @endsection
   
   
   @section('js')

   @endsection