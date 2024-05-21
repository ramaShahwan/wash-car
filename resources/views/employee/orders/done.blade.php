@extends('employee.layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الطلبات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الطلبات المنجزة</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection

@section('content')

				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">الطلبات المنجزة</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#</th>
											    <th class="wd-15p border-bottom-0">اسم صاحب الطلب</th>
												<th class="wd-15p border-bottom-0">الموقع</th>
												<th class="wd-15p border-bottom-0">طريقة الدفع</th>

												{{-- <th class="wd-15p border-bottom-0">الخدمة الأساسية</th>
												<th class="wd-15p border-bottom-0">الخدمات الإضافية</th> --}}

												<th class="wd-15p border-bottom-0">نوع السيارة</th>
												<th class="wd-15p border-bottom-0">حجم السيارة</th>
												<th class="wd-15p border-bottom-0">رقم السيارة</th>
												<th class="wd-15p border-bottom-0">السعر الإجمالي</th>
												<th class="wd-15p border-bottom-0">تاريخ الطلب</th>
												<th class="wd-15p border-bottom-0">وقت الطلب</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1 ?>
											@foreach($orders as $order)
											<tr>
												<td>{{$i++}}</td>

												@if($order->user_id)
												<td>{{ App\Models\User::findOrFail($order->user_id)->name }}</td>
												@else
												<td> </td>
												@endif

												@if($order->location_id)
												<td>{{ App\Models\Location::findOrFail($order->location_id)->area }}</td>
												@else
												<td> </td>
												@endif
											
												@if($order->payWay_id)
												<td>{{ App\Models\PayWay::findOrFail($order->payWay_id)->way }}</td>
												@else
												<td> </td>
												@endif
{{-- 
											@if(isset($results) && !empty($results))
											@foreach($results as $result)
												@foreach($result as $service)
													@if(isset($service->type) && $service->type == 'أساسية')
														<td>{{ $service->name }}</td>
													@endif
												@endforeach
											@endforeach
											@else
											<td> </td>
											@endif
								
											@if(isset($results) && !empty($results))
											@foreach($results as $result)
												@foreach($result as $service)
													@if(isset($service->type) && $service->type == 'إضافية')
														<td>{{ $service->name }}</td>
													@endif
												@endforeach
											@endforeach
											@else
												<td> </td>
											@endif
 --}}
												<td>{{$order->typeOfCar}}</td>
												<td>{{$order->sizeOfCar}}</td>
												<td>{{$order->numOfCar}}</td>
												<td>{{$order->totalPrice}}</td>
												<td>{{$order->orderDate}}</td>
												<td>{{$order->orderTime}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>

								{!! $paginationLinks !!}

								</div>
							</div>
						</div>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->

@endsection

@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection
