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
							<h4 class="content-title mb-0 my-auto">المستخدمون</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ جميع المستخدمون</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<a href="{{ url('/user/add') }}" type="button" class="btn btn-primary" style="color: white">إضافة مستخدم</a>
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
									<h4 class="card-title mg-b-0">جميع المستخدمون</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">اسم المستخدم</th>
												{{-- <th class="wd-15p border-bottom-0">البريد الإلكتروني</th> --}}
												<th class="wd-15p border-bottom-0">رقم الموبايل</th>
												<th class="wd-15p border-bottom-0">الرصيد</th>
												<th class="wd-15p border-bottom-0">نوع المستخدم</th>

												<th class="wd-15p border-bottom-0">إضافة رصيد</th>
												<th class="wd-15p border-bottom-0">تفاصيل الرصيد</th>

												<th class="wd-15p border-bottom-0">تعديل</th>
												<th class="wd-15p border-bottom-0">حذف</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1 ?>
											@foreach($users as $user)
											<tr>
												<td>{{$i++}}</td>
												<td>{{$user->name}}</td>
												<td>{{$user->phone}}</td>
												<td>{{$user->balance}}</td>
												<td>{{$user->role}}</td>
                                                
												<td> 
													<a class="modal-effect btn btn-sm btn-success" data-toggle="modal" style="cursor: pointer;"
													data-target="#add{{$user->id}}"><i class="fa fa-plus" style="color: white"></i></a>
													<form action="{{route('balance.save', $user->id)}}" method="POST" enctype="multipart/form-data">
															@csrf
															@method('POST')
														<div id="add{{$user->id}}" class="modal fade add-modal" role="dialog">
															<div class="modal-dialog modal-dialog-centered">
																<div class="modal-content">
			
																	<div class="modal-header">
																		<h6 class="modal-title">إضافة رصيد للمستخدم: &nbsp; {{$user->name}}</h6><button aria-label="Close" class="close" data-dismiss="modal"
																			type="button"><span aria-hidden="true">&times;</span></button>
																	</div>
			
																	<div class="modal-body text-center">
																		{{-- <img src="{{URL::asset('site/images/total.png')}}" alt="" width="50" height="50">																		 --}}
																		{{-- <br><br> --}}
																		<h5 style="text-align: right;">المبلغ المراد إضافته</h5> <br>
																		<input type="hidden" name="user_id" value="{{$user->id}}">
																		<input class="form-control" type="text" name="amount" placeholder="أدخل المبلغ">
																		<br><br>
																		<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">إلغاء</a>
																			<button type="submit" class="btn btn-success">إضافة</button>
																		</div>
																		<br>
																	</div>
																</div>
															</div>
														</div>
													</form>
												</td>

												<td>
													<a class="btn btn-sm btn-primary" href="{{ route('user.details', $user->id)}}" title="تفاصيل"><i class="las la-archive"></i></a>
												</td>

												<td>
													<a class="btn btn-sm btn-info" href="{{ route('user.edit', $user->id) }}" title="تعديل"><i class="las la-pen"></i></a>
												</td>
												<td> 
													<a class="modal-effect btn btn-sm btn-danger" data-toggle="modal" style="cursor: pointer;"
													data-target="#delete{{$user->id}}"><i class="las la-trash"></i></a>
													<form action="{{route('user.delete', $user->id)}}" method="POST" enctype="multipart/form-data">
															@csrf
															@method('DELETE')
														<div id="delete{{$user->id}}" class="modal fade delete-modal" role="dialog">
															<div class="modal-dialog modal-dialog-centered">
																<div class="modal-content">
			
																	<div class="modal-header">
																		<h6 class="modal-title">حذف المستخدم: &nbsp; {{$user->name}}</h6><button aria-label="Close" class="close" data-dismiss="modal"
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