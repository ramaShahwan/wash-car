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
							<h4 class="content-title mb-0 my-auto">الموظفون</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تفاصيل الموظف</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection

@section('content')

				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								
                                @foreach ($employees as $emp)
                                    
								<div class="row">
									<div class="col">
										<label for="inputName" class="control-label">الاسم</label>
										<input type="hidden" name="firstName" value="{{ $emp->firstName }}">
										<input type="text" class="form-control "
										id="inputName" name="firstName" value="{{ $emp->firstName }}" readonly>
									</div>
								</div><br>

								<div class="row">
									<div class="col">
										<label for="inputName" class="control-label">الكنية</label>
										<input type="hidden" name="lastName" value="{{ $emp->lastName }}">
										<input type="text" class="form-control"
										id="inputName" name="lastName" value="{{ $emp->lastName }}" readonly>
									</div>
								</div><br>

								<div class="row">
									<div class="col">
										<label for="inputName" class="control-label">تاريخ الولادة</label>
										<input type="hidden" name="birthDate" value="{{ $emp->birthDate }}">
										<input type="text" class="form-control "
										id="inputName" name="birthDate" value="{{ $emp->birthDate }}" readonly>
									</div>
								</div><br>
									
									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">الجنس</label>
											<input type="hidden" name="Gender" value="{{ $emp->Gender }}">
											<input type="text" class="form-control "
											id="inputName" name="Gender" value="{{ $emp->Gender }}" readonly>
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">رقم الموبايل</label>
											<input type="hidden" name="phone" value="{{ $emp->phone }}">
											<input type="text" class="form-control" id="inputName" name="phone" value="{{ $emp->phone }}" readonly>
										</div>
									</div><br>
									
                                    <div class="row">
										<div class="col">
											<label for="inputName" class="control-label">نبذة حول الموظف</label>
											<input type="hidden" name="aboutYou" value="{{ $emp->aboutYou }}">
											<input type="text" class="form-control" id="inputName" name="aboutYou" value="{{ $emp->aboutYou }}" readonly>
                                        </div>
									</div><br>
                                    
                                    <div class="row">
										<div class="col">
											<label for="inputName" class="control-label">المنطقة</label>
											<input type="hidden" name="area" value="{{ $emp->area }}">
											<input type="text" class="form-control" id="inputName" name="area" value="{{ $emp->area }}" readonly>
                                        </div>
									</div><br>
								
									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">صورة الموظف</label>
											<br>

                                            @if ($emp->Image)
                                                <img src="{{URL::asset('/site/img/emp/'.$emp->image)}}" style="width: 200px; height: 200px;">
                                            @else	
                                                <img src="{{URL::asset('/site/img/emp/user.jpg')}}"  style="width: 200px; height: 200px;">
                                            @endif

										</div>
									</div><br>
									
									<br>

									<div class="d-flex justify-content-center">
                                        <a href="{{ url('/employee/showPending') }}" class="btn btn-primary" style="align-items: center;">رجوع &nbsp; <i class="fa fa-arrow-left"></i></a>
                                    </div>
			
                                    @endforeach
							
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
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
