@extends('admin.layouts.master')

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('css')

{{-- flatpicker --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

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
							<h4 class="content-title mb-0 my-auto">الموظفون</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة موظف</span>
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


{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<form action="{{ route('employee.save') }}" method="post" enctype="multipart/form-data" autocomplete="off">
									{{ csrf_field() }}
		
									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">الاسم</label>
											<input type="text" class="form-control @error('firstName') is-invalid @enderror" 
											id="inputName" name="firstName">
										
											@error('firstName')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
										</div>
									</div><br>
									
									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">النسبة</label>
											<input type="text" class="form-control @error('lastName') is-invalid @enderror" 
											id="inputName" name="lastName">
										
											@error('lastName')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<div class="form-group">
												<label>تاريخ الولادة</label>
													<input type="datetime" class="form-control @error('birthDate') is-invalid @enderror" 
													name="birthDate">

													@error('birthDate')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror
											</div>
										</div>
									</div><br>

									<div class="form-group">
										<label class="display-block">الجنس</label> <br>
										<div class="form-check form-check-inline">
											<input class="form-check-input" 
											type="radio" name="Gender" id="status_active" value="ذكر" checked>

											<label class="form-check-label" for="status_active">
												&nbsp; ذكر 
											</label>
										</div> 
										<div class="form-check form-check-inline">
											<input class="form-check-input" 
											type="radio" name="Gender" id="status_inactive" value="أنثى">

											<label class="form-check-label" for="status_inactive">
												&nbsp; أنثى
											</label>
										</div>
									</div><br>
									
									 <div class="row">
										<div class="col">
										  <label for="inputName" class="control-label">رقم الموبايل</label>
										  <input type="text" class="form-control @error('phone') is-invalid @enderror" 
										  id="inputName" name="phone">

										@error('phone')
											<div class="alert alert-danger">{{ $message }}</div>
										@enderror
										</div>
									  </div><br>

									  <div class="form-group">
										<label>نوع العمل</label>
										<select name="typeOfWork" class="form-control select @error('typeOfWork') is-invalid @enderror"> 
											<option value="لايوجد">اختر نوع العمل</option>
											<option value="سيارة">غسيل سيارات</option>
											<option value="عقار">تنظيف منازل</option>
										</select>

										@error('typeOfWork')
											<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div><br>

									  <div class="form-group">
										<label>المنطقة</label>
										<select name="area" class="form-control select @error('area') is-invalid @enderror"> 
											<option value="لايوجد">اختر المنطقة</option>
											
											@foreach($areas as $area)
											<option value="{{$area->area}}">{{$area->area}}</option>
											@endforeach 

										</select>

										@error('area')
											<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div><br>

									  <div class="row">
										<div class="col">
											<label for="inputName" class="control-label">نبذة حول الموظف</label>
											<input type="text" class="form-control @error('aboutYou') is-invalid @enderror" 
										  	id="inputName" name="aboutYou">

											@error('aboutYou')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
										</div>
									</div><br>

									  <div class="row">
										<div class="col">
										  <label for="exampleTextarea">صورة الموظف</label>
										  <input type="file" name="image" class="dropify" accept=".jpg, .png, image/jpeg, image/png"
										  data-height="70" />
										</div>
									  </div><br> 
					
									  <div class="d-flex justify-content-center">
										<button type="submit" class="btn btn-primary">حفظ البيانات</button>
									  </div>
			
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
@endsection
@section('js')

{{-- flatpicker --}}
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    config = {
        dateFormat: "Y-m-d",
        altInput: true,
        altFormat: "F j, Y",
        maxDate: new Date().getFullYear() - 10 + "-01-01" // تحديد الحد الأعلى للتاريخ كتاريخ قبل 10 سنوات
    }
    flatpickr("input[type=datetime]", config);
</script>



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