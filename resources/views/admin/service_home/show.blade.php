@extends('admin.layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/	lugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
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
							<h4 class="content-title mb-0 my-auto">الخدمات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ جميع الخدمات</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<a href="{{ url('/service/add_home') }}" type="button" class="btn btn-primary" style="color: white">إضافة خدمة</a>
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

@if(session()->has('Add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>{{ session()->get('Add') }}</strong>
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
									<h4 class="card-title mg-b-0">جميع الخدمات</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">نوع الخدمة  </th>
												<th class="wd-15p border-bottom-0"> اسم الخدمة  </th>
												<th class="wd-15p border-bottom-0"> سعر الخدمة  </th>
												<th class="wd-15p border-bottom-0"> مدة الخدمة </th>
												<th class="wd-15p border-bottom-0"> وصف عن الخدمة  </th>

												<th class="wd-15p border-bottom-0">تعديل</th>
												<th class="wd-15p border-bottom-0">حذف</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1 ?>
											@foreach($service as $ser)
											<tr>
												<td>{{$i++}}</td>
												<td>{{$ser->type}}</td>
												<td>{{$ser->name}}</td>
												<td>{{$ser->price}}</td>
												<td>{{$ser->period}}</td>
												<td>{{$ser->description}}</td>

	                                            
												<td>
													<a class="btn btn-sm btn-info" href="{{ route('service.edit_home', $ser->id) }}" title="تعديل"><i class="las la-pen"></i></a>
												</td>
												<td>
													<a class="modal-effect btn btn-sm btn-danger" data-toggle="modal" style="cursor: pointer;"
													data-target="#delete{{$ser->id}}"><i class="las la-trash"></i></a>
													<form action="{{route('service.delete_home', $ser->id)}}" method="POST" enctype="multipart/form-data">
															@csrf
															@method('DELETE')
														<div id="delete{{$ser->id}}" class="modal fade delete-modal" role="dialog">
															<div class="modal-dialog modal-dialog-centered">
																<div class="modal-content">
			
																	<div class="modal-header">
																		<h6 class="modal-title">حذف الخدمة: &nbsp; {{$ser->name}}</h6><button aria-label="Close" class="close" data-dismiss="modal"
																			type="button"><span aria-hidden="true">&times;</span></button>
																	</div>
			
																	<div class="modal-body text-center">
																		<img src="{{URL::asset('assets/img/media/sent.png')}}" alt="" width="50" height="46">
																		<br><br>
																		<h5>هل أنت متأكد من عملية الحذف؟</h5>
																		<br>
																		<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">إلغاء</a>
																			<button type="submit" class="btn btn-danger">حذف</button>
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