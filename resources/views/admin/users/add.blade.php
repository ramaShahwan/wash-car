@extends('admin.layouts.master')
@section('css')

<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<!---Internal Fancy uploader css-->
<link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
<!--Internal Sumoselect css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
<!--Internal  TelephoneInput css-->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المستخدمون</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة مستخدم</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
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

				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								{{-- <form action="{{ route('user.save') }}" method="post" enctype="multipart/form-data" autocomplete="off">
									{{ csrf_field() }}
			
                                    <div class="row">
										<div class="col">
											<label for="inputName" class="control-label">الاسم</label>
											<input type="text" class="form-control @error('email') is-invalid @enderror" 
											id="inputName" name="email" required>

											@error('email')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">البريد الإلكتروني</label>
											<input type="email" class="form-control @error('email') is-invalid @enderror" 
											id="inputName" name="email" required>

											@error('email')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
										</div>
									</div><br>
		
                                    <div class="row">
										<div class="col">
											<label for="inputName" class="control-label">رقم الموبايل</label>
											<input type="text" class="form-control @error('email') is-invalid @enderror" 
											id="inputName" name="email" required>

											@error('email')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">كلمة المرور</label>
											<input type="password" class="form-control @error('password') is-invalid @enderror" 
											id="inputName" name="password" required>

											@error('password')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
										</div>
									</div><br>

									<div class="form-group">
										<label>الدور</label>
											<select name="Role" class="form-control select @error('Role') is-invalid @enderror">
												<option value="admin">مدير</option>
												<option value="user">مستخدم</option>
											</select>

											@error('Role')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
									</div><br>

									<div class="d-flex justify-content-center">
										<button type="submit" class="btn btn-primary">حفظ البيانات</button>
									</div>
								</form> --}}
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->

@endsection
@section('js')

<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--Internal Fancy uploader js-->
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
<!--Internal  Form-elements js-->
<script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!--Internal Sumoselect js-->
<script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
<!-- Internal TelephoneInput js-->
<script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
<script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>

@endsection