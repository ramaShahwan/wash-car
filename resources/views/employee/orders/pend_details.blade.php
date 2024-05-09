@extends('employee.layouts.master')

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
								<form action="{{ route('emp_ord.pend_details',$order->id) }}" method="post"  enctype="multipart/form-data" autocomplete="off">
									{{ csrf_field() }}

								<div class="row">
									<div class="col">
										<label for="inputName" class="control-label"> اسم صاحب الطلب</label>
										<input type="hidden" name="name" value="{{ App\Models\User::findOrFail($order->user_id)->name }}">
										<input type="text" class="form-control "
										id="inputName" name="name" value="{{ App\Models\User::findOrFail($order->user_id)->name }}" readonly>
									</div>
								</div><br>

								<div class="row">
									<div class="col">
										<label for="inputName" class="control-label"> اسم الموظف</label>
										<input type="hidden" name="name" value="{{ App\Models\Employee::findOrFail($order->employee_id)->firstName }} {{ App\Models\Employee::findOrFail($order->employee_id)->lastName }}">
										<input type="text" class="form-control"
										id="inputName" name="name" value="{{ App\Models\Employee::findOrFail($order->employee_id)->firstName }} {{ App\Models\Employee::findOrFail($order->employee_id)->lastName }}" readonly>
									</div>
								</div><br>

								<div class="row">
									<div class="col">
										<label for="inputName" class="control-label">رقم السيارة</label>
										<input type="hidden" name="numOfCar" value="{{ $order->numOfCar }}">
										<input type="text" class="form-control "
										id="inputName" name="numOfCar" value="{{ $order->numOfCar }}" readonly>
									</div>
								</div><br>
									
									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">حجم السيارة</label>
											<input type="hidden" name="sizeOfCar" value="{{ $order->sizeOfCar }}">
											<input type="text" class="form-control "
											id="inputName" name="sizeOfCar" value="{{ $order->sizeOfCar }}" readonly>
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">نوع الغسيل</label>
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
											<input type="hidden" name="orderDate" value="{{ $order->orderDate }}">
											<input type="text" class="form-control "
											id="inputName" name="orderDate" value="{{ $order->orderDate }}" readonly>
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">وقت الطلب</label>
											<input type="hidden" name="orderTime" value="{{ $order->orderTime }}">
											<input type="text" class="form-control "
											id="inputName" name="orderTime" value="{{ $order->orderTime }}" readonly>
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">موقع السيارة</label>
											<input type="hidden" name="location_id" value="{{ App\Models\Location::findOrFail($order->location_id)->area }}">
											<input type="text" class="form-control "
											id="inputName" name="location_id" value="{{ App\Models\Location::findOrFail($order->location_id)->area }}" readonly>
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">رقم السيارة</label>
											<input type="hidden" name="numOfCar" value="{{ $order->numOfCar }}">
											<input type="text" class="form-control "
											id="inputName" name="numOfCar" value="{{ $order->numOfCar }}" readonly>
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">نوع السيارة</label>
											<input type="hidden" name="typeOfCar" value="{{ $order->typeOfCar }}">
											<input type="text" class="form-control "
											id="inputName" name="typeOfCar" value="{{ $order->typeOfCar }}" readonly>
										</div>
									</div><br>
								
									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label"> طريقة الدفع</label>
											<input type="hidden" name="name" value="{{ App\Models\PayWay::findOrFail($order->payWay_id)->way }}">
											<input type="text" class="form-control"
											id="inputName" name="name" value="{{ App\Models\PayWay::findOrFail($order->payWay_id)->way }}" readonly>
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">الكلفة الإجمالية </label>
											<input type="hidden" name="totalPrice" value="{{ $order->totalPrice }}">
											<input type="text" class="form-control "
											id="inputName" name="totalPrice" value="{{ $order->totalPrice }}" readonly>
										</div>
									</div><br>

									<br>
								</form>


								<div class="center" style="text-align: center;">

									<a class="btn btn-success" href="{{ route('ord.updatePenddingToWaiting', $order->id) }}" style="cursor: pointer; align-items: center; font-size: 14px;">قبول &nbsp; <i class="fas fa-check"></i></a> &nbsp;

									<a class="modal-effect btn btn-danger" data-toggle="modal" title="رفض" style="cursor: pointer; align-items: center; font-size: 14px;"
									data-target="#delete"> رفض &nbsp; <i class="fas fa-times"></i></a>
									<form action="{{route('emp_ord.cancel', $order->id)}}" method="POST" enctype="multipart/form-data">
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
								</div>


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
