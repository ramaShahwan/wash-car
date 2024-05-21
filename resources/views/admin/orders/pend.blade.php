@extends('admin.layouts.master')
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
							<h4 class="content-title mb-0 my-auto">الطلبات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الطلبات المعلقة</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

@if(session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<strong>{{ session()->get('delete') }}</strong>
	<button type="button" class="close" data_dismiss="alert" aria_lable="Close">
		<span aria_hidden="true">&times;</span>
	</button>
</div>
@endif

@if(session()->has('Edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>{{ session()->get('Edit') }}</strong>
	<button type="button" class="close" data_dismiss="alert" aria_lable="Close">
		<span aria_hidden="true">&times;</span>
	</button>
</div>
@endif

				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">الطلبات المعلقة</h4>
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

												<th class="wd-15p border-bottom-0">نوع السيارة</th>
												<th class="wd-15p border-bottom-0">حجم السيارة</th>
												<th class="wd-15p border-bottom-0">رقم السيارة</th>
												<th class="wd-15p border-bottom-0">السعر الإجمالي</th>
												<th class="wd-15p border-bottom-0">تاريخ الطلب</th>
												<th class="wd-15p border-bottom-0">وقت الطلب</th>

												{{-- <th class="wd-15p border-bottom-0">قبول</th> --}}

												<th class="wd-15p border-bottom-0">اختر الموظف</th>
												<th class="wd-15p border-bottom-0">رفض</th>
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

												<td>{{$order->typeOfCar}}</td>
												<td>{{$order->sizeOfCar}}</td>
												<td>{{$order->numOfCar}}</td>
												<td>{{$order->totalPrice}}</td>
												<td>{{$order->orderDate}}</td>
												<td>{{$order->orderTime}}</td>
												
												{{-- <td>
													<form action="{{ route('ord.updatePenddingToWaiting', $order->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
														@csrf
														@method('POST')
														<button class="btn btn-sm btn-success" title="قبول"><i class="fa fa-check"></i></button>
													</form>
												</td> --}}

												{{-- <td>
													<form action="{{ route('ord.chooseEmp', $order->id ) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
														@csrf
														@method('POST')
														<button class="btn btn-sm btn-success" title="اختر الموظف"><i class="fas fa-user"></i></button>
													</form>
												</td> --}}

												<td>
													<form action="{{ route('ord.chooseEmp', $order->id ) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
														@csrf
														@method('POST')
														{{-- <input type="hidden" name="employee_id" value=""> --}}
														<button class="btn btn-sm btn-success" title="اختر الموظف"><i class="fas fa-user"></i></button>
													</form>		
												</td>											
												

												<td>
													<a class="modal-effect btn btn-sm btn-danger" data-toggle="modal" title="رفض" style="cursor: pointer;"
													data-target="#delete"><i class="fas fa-times"></i></a>
													<form action="{{route('ord.updatePenddingToCanceled', $order->id)}}" method="POST" enctype="multipart/form-data">
															@csrf
															@method('POST')
														<div id="delete" class="modal fade delete-modal" role="dialog">
															<div class="modal-dialog modal-dialog-centered">
																<div class="modal-content">
			
																	<div class="modal-header">
																		<h6 class="modal-title">سبب رفض طلب : &nbsp; {{ App\Models\User::findOrFail($order->user_id)->name }} </h6><button aria-label="Close" class="close" data-dismiss="modal"
																			type="button"><span aria-hidden="true">&times;</span></button>
																	</div>
			
																	<div class="modal-body text-center">
																		<h5>سبب الرفض</h5>
																		<br>
																		<input type="text" class="form-control" id="inputName" name="note">
																		{{-- <img src="{{URL::asset('assets/img/media/sent.png')}}" alt="" width="50" height="46"> --}}
																		<br>
																		{{-- <h5>هل أنت متأكد من عملية الحذف؟</h5> --}}
																		<br>
																		<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">إلغاء</a>
																			<button type="submit" class="btn btn-success">إرسال</button>
																		</div>
																		<br>
																	</div>
																</div>
															</div>
														</div>
													</form>
												</td>
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
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->

		
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