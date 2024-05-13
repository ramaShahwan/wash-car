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
                                <input type="hidden" name="nameWebsite" value="{{ $getShowSettings->nameWebsite }}">

                                <input type="text" class="form-control @error('nameWebsite') is-invalid @enderror" 
                                id="inputName" name="nameWebsite" value="{{ $getShowSettings->nameWebsite }}" required>
                                
                                @error('nameWebsite')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><br>

                        <div class="row">
                          <div class="col">
                            <label for="inputName" class="control-label">رابط الموقع</label>
                            <input type="hidden" name="linkWebsite" value="{{ $getShowSettings->linkWebsite }}">

                            <input type="text" class="form-control @error('linkWebsite') is-invalid @enderror" 
                            id="inputName" name="linkWebsite" value="{{ $getShowSettings->linkWebsite }}" required>
                           
                            @error('linkWebsite')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                           </div>
                        </div><br>
                    
                    <div class="row">
                        <div class="col">
                          <label for="inputName" class="control-label">رابط فيسبوك</label>
                          <input type="hidden" name="socialMidiaFacebook" value="{{ $getShowSettings->socialMidiaFacebook }}">

                          <input type="text" class="form-control @error('socialMidiaFacebook') is-invalid @enderror" 
                          id="inputName" name="socialMidiaFacebook" value="{{ $getShowSettings->socialMidiaFacebook }}" required>
                          
                          @error('socialMidiaFacebook')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div><br>

                    <div class="row">
                        <div class="col">
                          <label for="inputName" class="control-label">رابط تلغرام</label>
                          <input type="hidden" name="socialMidiaTelegram" value="{{ $getShowSettings->socialMidiaTelegram }}">

                          <input type="text" class="form-control @error('socialMidiaTelegram') is-invalid @enderror" 
                          id="inputName" name="socialMidiaTelegram" value="{{ $getShowSettings->socialMidiaTelegram }}" required>
                         
                          @error('socialMidiaTelegram')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div><br>

                    <div class="row">
                        <div class="col">
                          <label for="inputName" class="control-label">رابط انستغرام</label>
                          <input type="hidden" name="socialMidiaInstagram" value="{{ $getShowSettings->socialMidiaInstagram }}">

                          <input type="text" class="form-control @error('socialMidiaInstagram') is-invalid @enderror" 
                          id="inputName" name="socialMidiaInstagram" value="{{ $getShowSettings->socialMidiaInstagram }}" required>
                          
                          @error('socialMidiaInstagram')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div><br>

                    <div class="row">
                        <div class="col">
                          <label for="inputName" class="control-label">رابط يوتيوب</label>
                          <input type="hidden" name="socialMidiaYoutube" value="{{ $getShowSettings->socialMidiaYoutube }}">

                          <input type="text" class="form-control @error('socialMidiaYoutube') is-invalid @enderror" 
                          id="inputName" name="socialMidiaYoutube" value="{{ $getShowSettings->socialMidiaYoutube }}" required>
                          
                          @error('socialMidiaYoutube')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div><br>

                    <div class="row">
                        <div class="col">
                            <label for="inputName" class="control-label">نبذة عن الموقع</label>
                            <input type="hidden" name="Description" value="{{ $getShowSettings->Description }}">

                            <input type="text" class="form-control @error('Description') is-invalid @enderror" 
                              id="inputName" name="Description" value="{{ $getShowSettings->Description }}">

                            @error('Description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col">
                            <label for="inputName" class="control-label">الكلمات المفتاحية (يجب الفصل بينها بفاصلة)</label>
                            <input type="hidden" name="Keywords" value="{{ $getShowSettings->Keywords }}">
                            
                            <input type="text" class="form-control @error('Keywords') is-invalid @enderror" 
                              id="inputName" name="Keywords" value="{{ $getShowSettings->Keywords }}">

                            @error('Keywords')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col">
                          <label for="exampleTextarea">صورة الأيقونة</label>
                          <br>

                          @if ($getShowSettings->icon)
                            <img src="{{ URL::asset('site/img/icon/' . $getShowSettings->icon) }}" style="width: 100px;">
                          @else
                          @endif

                          <br><br>   

                          <input type="File" name="icon" class="dropify" accept=".jpg, .png, image/jpeg, image/png" data-height="70" />
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
