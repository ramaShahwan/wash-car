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
							<h4 class="content-title mb-0 my-auto">الرصيد</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تفاصيل الرصيد</span>
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

	@if(session()->has('Add'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>{{ session()->get('Add') }}</strong>
		<button type="button" class="close" data_dismiss="alert" aria_lable="Close">
			<span aria_hidden="true">&times;</span>
		</button>
	</div>
	@endif

		<!-- row -->
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="{{ route('user.details', $user->id) }}" method="get" autocomplete="off">
							{{ csrf_field() }}
							@method('get')
							
							@foreach($details as $ord)

								@if($ord->type == 'شحن')
									<div class="row">
										<div class="col-4">
											<label for="inputName" class="control-label"> قام المدير </label>
											<input type="text" class="form-control" id="inputName" name="admin_who_added"
											value="{{ $ord->admin_who_added }}" readonly>
										</div>

										<div class="col-4">
											<label for="inputName" class="control-label"> بشحن مبلغ </label>
											<input type="hidden" name="amount" value="{{ $ord->amount }}">
											<input type="text" class="form-control" id="inputName" name="amount"
											value="{{ $ord->amount }}" readonly>
										</div>

										<div class="col-4">
											<label for="inputName" class="control-label"> بتاريخ </label>
											<input type="hidden" name="created_at" value="{{ $ord->created_at }}">
											<input type="text" class="form-control" id="inputName" name="created_at"
											value="{{ $ord->created_at->format('Y-m-d') }}" readonly>
										</div>

									</div><br><br>
								@endif

								@if($ord->type == 'سحب')
									<div class="row">
										<div class="col-4">
											<label for="inputName" class="control-label"> قام المستخدم </label>
											<input type="text" class="form-control" id="inputName" name="user_id"
											value="{{ App\Models\User::findOrFail($ord->user_id)->name }}" readonly>
										</div>

										<div class="col-4">
											<label for="inputName" class="control-label"> بسحب مبلغ </label>
											<input type="hidden" name="amount" value="{{ $ord->amount }}">
											<input type="text" class="form-control" id="inputName" name="amount"
											value="{{ $ord->amount }}" readonly>
										</div>

										<div class="col-4">
											<label for="inputName" class="control-label"> بتاريخ </label>
											<input type="hidden" name="created_at" value="{{ $ord->created_at }}">
											<input type="text" class="form-control" id="inputName" name="created_at"
											value="{{ $ord->created_at->format('Y-m-d') }}" readonly>
										</div>

									</div><br><br>
								@endif

								@if($ord->type == 'سيارة')
									<div class="row">
										<div class="col-4">
											<label for="inputName" class="control-label"> نوع الخدمة </label>
											<input type="text" class="form-control" id="inputName" name=""
											value="غسيل سيارة" readonly>
										</div>

										<div class="col-4">
											<label for="inputName" class="control-label"> السعر </label>
											<input type="hidden" name="amount" value="{{ $ord->amount }}">
											<input type="text" class="form-control" id="inputName" name="amount"
											value="{{ $ord->amount }}" readonly>
										</div>

										<div class="col-4">
											<label for="inputName" class="control-label"> التاريخ </label>
											<input type="hidden" name="created_at" value="{{ $ord->created_at }}">
											<input type="text" class="form-control" id="inputName" name="created_at"
											value="{{ $ord->created_at->format('Y-m-d') }}" readonly>
										</div>

									</div><br><br>
								@endif

								@if($ord->type == 'عقار')
									<div class="row">
										<div class="col-4">
											<label for="inputName" class="control-label"> نوع الخدمة </label>
											<input type="text" class="form-control" id="inputName" name=""
											value="تنظيف منزلي" readonly>
										</div>

										<div class="col-4">
											<label for="inputName" class="control-label"> السعر </label>
											<input type="hidden" name="amount" value="{{ $ord->amount }}">
											<input type="text" class="form-control" id="inputName" name="amount"
											value="{{ $ord->amount }}" readonly>
										</div>

										<div class="col-4">
											<label for="inputName" class="control-label"> التاريخ </label>
											<input type="hidden" name="created_at" value="{{ $ord->created_at }}">
											<input type="text" class="form-control" id="inputName" name="created_at"
											value="{{ $ord->created_at->format('Y-m-d') }}" readonly>
										</div>

									</div><br><br>
								@endif

							@endforeach
							
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- row closed -->

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