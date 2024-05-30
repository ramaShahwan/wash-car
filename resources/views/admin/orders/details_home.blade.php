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
							<h4 class="content-title mb-0 my-auto"> الطلبات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تفاصيل الطلب</span>
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
								<form action="{{ route('ord.details',$home->id) }}" method="post"  enctype="multipart/form-data" autocomplete="off">
									{{ csrf_field() }}

                                {{-- @foreach ($order as $ord) --}}

								<div class="row">
									<div class="col">
										<label for="inputName" class="control-label"> اسم صاحب الطلب</label>
										<input type="hidden" name="name" value="{{ App\Models\User::findOrFail($home->user_id)->name }}">
										<input type="text" class="form-control "
										id="inputName" name="name" value="{{ App\Models\User::findOrFail($home->user_id)->name }}" readonly>
									</div>
								</div><br>

								<div class="row">
									<div class="col">
										<label for="inputName" class="control-label"> اسم الموظف</label>
										<input type="hidden" name="name" value="{{ App\Models\Employee::findOrFail($home->employee_id)->firstName }} {{ App\Models\Employee::findOrFail($home->employee_id)->lastName }}">
										<input type="text" class="form-control"
										id="inputName" name="name" value="{{ App\Models\Employee::findOrFail($home->employee_id)->firstName }} {{ App\Models\Employee::findOrFail($home->employee_id)->lastName }}" readonly>
									</div>
								</div><br>

								<div class="row">
									<div class="col">
										<label for="inputName" class="control-label">نوع العقار</label>
										<input type="hidden" name="typeOfHome" value="{{ $home->typeOfHome }}">
										<input type="text" class="form-control "
										id="inputName" name="typeOfHome" value="{{ $home->typeOfHome }}" readonly>
									</div>
								</div><br>
									
									{{-- <div class="row">
										<div class="col">
											<label for="inputName" class="control-label">حجم السيارة</label>
											<input type="hidden" name="sizeOfCar" value="{{ $home->sizeOfCar }}">
											<input type="text" class="form-control "
											id="inputName" name="sizeOfCar" value="{{ $home->sizeOfCar }}" readonly>
										</div>
									</div><br> --}}

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">نوع التنظيف</label>
											<input type="hidden" name="name" value="{{ implode($primary) }}">
											<input type="text" class="form-control" id="inputName" name="name" value="{{ implode($primary) }}" readonly>
										</div>
									</div><br>
									
									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label"> الخدمات الإضافية</label>
											@if(isset($sec) && is_array($sec) && !empty($sec))
												@foreach($sec as $ser)
													@if($ser)
														<input type="hidden" name="name" value="{{ $ser }}">
														<input type="text" class="form-control " id="inputName" name="name" value="{{ $ser }}" readonly>
														<br>
													@endif
												@endforeach
											@endif
										</div>
									</div>
									<br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">تاريخ الطلب</label>
											<input type="hidden" name="OrderDate" value="{{ $home->OrderDate }}">
											<input type="text" class="form-control "
											id="inputName" name="OrderDate" value="{{ $home->OrderDate }}" readonly>
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">وقت الطلب</label>
											<input type="hidden" name="OrderTime" value="{{ $home->OrderTime }}">
											<input type="text" class="form-control "
											id="inputName" name="OrderTime" value="{{ $home->OrderTime }}" readonly>
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">موقع العقار</label>
											<input type="hidden" name="location_id" value="{{ App\Models\Location::findOrFail($home->location_id)->area }}">
											<input type="text" class="form-control "
											id="inputName" name="location_id" value="{{ App\Models\Location::findOrFail($home->location_id)->area }}" readonly>
										</div>
									</div><br>


									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">رقم البناء</label>
											<input type="hidden" name="NumOfbulding" value="{{ $home->NumOfbulding }}">
											<input type="text" class="form-control "
											id="inputName" name="NumOfbulding" value="{{ $home->NumOfbulding }}" readonly>
										</div>
									</div><br>


									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">رقم الطابق</label>
											<input type="hidden" name="NumOfFloor" value="{{ $home->NumOfFloor }}">
											<input type="text" class="form-control "
											id="inputName" name="NumOfFloor" value="{{ $home->NumOfFloor }}" readonly>
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">عدد الساعات</label>
											<input type="hidden" name="NumOfHour" value="{{ $home->NumOfHour }}">
											<input type="text" class="form-control "
											id="inputName" name="NumOfHour" value="{{ $home->NumOfHour }}" readonly>
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">مواد التنظيف</label>
											<input type="hidden" name="cleanMaterial" value="{{ $home->cleanMaterial }}">
											<input type="text" class="form-control "
											id="inputName" name="cleanMaterial" value="{{ $home->cleanMaterial }}" readonly>
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label"> طريقة الدفع</label>
											<input type="hidden" name="name" value="{{ App\Models\PayWay::findOrFail($home->payWay_id)->way }}">
											<input type="text" class="form-control"
											id="inputName" name="name" value="{{ App\Models\PayWay::findOrFail($home->payWay_id)->way }}" readonly>
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">الكلفة الإجمالية </label>
											<input type="hidden" name="totalPrice" value="{{ $home->totalPrice }}">
											<input type="text" class="form-control "
											id="inputName" name="totalPrice" value="{{ $home->totalPrice }}" readonly>
										</div>
									</div><br>

									<div class="row">
										<div class="col-6 text-center">
											<label for="inputName" class="control-label">صورة العقار قبل التنظيف</label>
											<br>
											<img src="{{ URL::asset('/site/img/gallery/'.$beforeImage) }}" style="height: 300px; width: 300px;">
										</div>
										<div class="col-6 text-center">
											<label for="inputName" class="control-label">صورة العقار بعد التنظيف</label>
											<br>
											<img src="{{ URL::asset('/site/img/gallery/'.$afterImage) }}" style="height: 300px; width: 300px;">
										</div>
									</div><br>
									
									<br>

									<div class="d-flex justify-content-center">
                                        <a href="{{ url('/order/show_done') }}" class="btn btn-primary" style="align-items: center;">رجوع &nbsp; <i class="fa fa-arrow-left"></i></a>
                                    </div>
									{{-- @endforeach --}}
			
								</form>
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
