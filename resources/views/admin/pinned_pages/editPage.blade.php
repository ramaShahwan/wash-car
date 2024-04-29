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
							<h4 class="content-title mb-0 my-auto">الصفحات الثابتة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل الصفحة الثابتة</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection

@section('content')

@if(session()->has('Edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>{{ session()->get('Edit') }}</strong>
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
								<form action="{{ route('page.update', $page->id) }}" method="post"  enctype="multipart/form-data" autocomplete="off">
									{{ csrf_field() }}

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">اسم الصفحة</label>
											<input type="hidden" name="name" value="{{ $page->name }}">
											<input type="text" class="form-control @error('name') is-invalid @enderror" 
											id="inputName" name="name" value="{{ $page->name }}" required>

											@error('name')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
										</div>
									</div><br>

									<div class="row">
										<div class="col">
											<label for="inputName" class="control-label">رابط الصفحة</label>
											<input type="hidden" name="href" value="{{ $page->href }}">
											<input type="text" class="form-control @error('href') is-invalid @enderror" 
											id="inputName" name="href" value="{{ $page->href }}" required>

											@error('href')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
										</div>
									</div><br>
                                    
                                    <div class="row">
										<div class="col">
											<label for="inputName" class="control-label">عنوان الصفحة</label>
											<input type="hidden" name="title" value="{{ $page->title }}">
											<input type="text" class="form-control @error('title') is-invalid @enderror" 
											id="inputName" name="title" value="{{ $page->title }}" required>

											@error('title')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
										</div>
									</div><br>
                                    
                                    <div class="row">
										<div class="col">
											<label for="inputName" class="control-label">كلمات مفتاحية</label>
											<input type="hidden" name="keyword" value="{{ $page->keyword }}">
											<input type="text" class="form-control @error('keyword') is-invalid @enderror" 
											id="inputName" name="keyword" value="{{ $page->keyword }}" required>

											@error('keyword')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
										</div>
									</div><br>

                                    <div class="row">
										<div class="col">
											<label for="inputName" class="control-label">محتوى الصفحة</label>
											<input type="hidden" name="content" value="{{ $page->content }}">
											{{-- <input type="text" class="form-control @error('content') is-invalid @enderror" 
											id="inputName" name="content" value="{{ $page->content }}" required> --}}

                                            <textarea class="ckeditor form-control @error('content') is-invalid @enderror" 
                                             name="content">{{$page->content}}</textarea>

											@error('content')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
										</div>
									</div><br>








									<div class="row">
										<div class="col">
											<label for="exampleTextarea">صورة (اختياري) </label> <br>
											<br>
											
											@if ($pay->photo)
												<img src="{{ URL::asset('/site/img/pages/' . $page->photo) }}" style="width: 100px;">
											@else
												{{-- <img src="{{ URL::asset('/site/img/pay/mobile-payment.png') }}" style="width: 100px;"> --}}
											@endif
											
											<br>    
											<input type="File"  id="Img" name="photo" class="dropify" accept=".jpg, .png, image/jpeg, image/png" data-height="70" />
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
