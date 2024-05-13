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
							<h4 class="content-title mb-0 my-auto">الإعدادات العامة</h4>
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

                    <form action="{{ route('settings.set') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label">اسم الموقع</label>
                                <input type="text" class="form-control @error('nameWebsite') is-invalid @enderror" 
                                id="inputName" name="nameWebsite" required>
                                @error('nameWebsite')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><br>

                        <div class="row">
                          <div class="col">
                            <label for="inputName" class="control-label">رابط الموقع</label>
                            <input type="text" class="form-control @error('linkWebsite') is-invalid @enderror" 
                            id="inputName" name="linkWebsite" required>
                            @error('linkWebsite')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                           </div>
                        </div><br>
                    
                    <div class="row">
                        <div class="col">
                          <label for="inputName" class="control-label">رابط فيسبوك</label>
                          <input type="text" class="form-control @error('socialMidiaFacebook') is-invalid @enderror" 
                          id="inputName" name="socialMidiaFacebook" required>
                          @error('socialMidiaFacebook')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div><br>

                    <div class="row">
                        <div class="col">
                          <label for="inputName" class="control-label">رابط تلغرام</label>
                          <input type="text" class="form-control @error('socialMidiaTelegram') is-invalid @enderror" 
                          id="inputName" name="socialMidiaTelegram" required>
                          @error('socialMidiaTelegram')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div><br>

                    <div class="row">
                        <div class="col">
                          <label for="inputName" class="control-label">رابط انستغرام</label>
                          <input type="text" class="form-control @error('socialMidiaInstagram') is-invalid @enderror" 
                          id="inputName" name="socialMidiaInstagram" required>
                          @error('socialMidiaInstagram')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div><br>

                    <div class="row">
                        <div class="col">
                          <label for="inputName" class="control-label">رابط يوتيوب</label>
                          <input type="text" class="form-control @error('socialMidiaYoutube') is-invalid @enderror" 
                          id="inputName" name="socialMidiaYoutube" required>
                          @error('socialMidiaYoutube')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div><br>

                    <div class="row">
                        <div class="col">
                            <label for="inputName" class="control-label">نبذة عن الموقع</label>
                            <input type="text" class="form-control @error('Description') is-invalid @enderror" 
                              id="inputName" name="Description">

                            @error('Description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col">
                            <label for="inputName" class="control-label">الكلمات المفتاحية (يجب الفصل بينها بفاصلة)</label>
                            <input type="text" class="form-control @error('Keywords') is-invalid @enderror" 
                              id="inputName" name="Keywords">

                            @error('Keywords')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col">
                          <label for="exampleTextarea">صورة الموقع</label>
                          <input type="file" name="icon" class="dropify" accept=".jpg, .png, image/jpeg, image/png"
                          data-height="70" />
                        </div>
                    </div><br> 

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                    </div>
                    <br><br>

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
