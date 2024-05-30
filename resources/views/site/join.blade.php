@extends('site.layouts.master')

<meta name="csrf-token" content="{{ csrf_token() }}">


@section('css')

{{-- flatpicker --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    <style>
        .form-group {
	        margin-bottom: 20px;
        }
        .form-control {
	        border-radius: 0;
	        box-shadow: none;
	        padding: 0.469rem 0.75rem;
	        border-color: #eaeaea;
	        font-size: 14px;
	        min-height: 40px;
        }
        .form-control:focus {
	        border-color: #1fab89;
	        box-shadow: none;
	        outline: 0 none;
        }


        .profile-upload {
	        display: flex;
        }
        .upload-img {
	        margin-right: 10px;
        }
        .upload-img img {
	        border-radius: 4px;
	        height: 40px;
	        width: 40px;
        }
        .upload-input {
	        width: 100%;
        }

        .input-container {
            text-align: right;
        }

    </style>

@endsection


@section('content')

<body>

    <div class="services_section layout_padding">
        <div class="container">
           <h1 class="services_taital"><span style="color: #0c426e">انضم لفريقنا</span></h1>
           {{-- <p class="services_text">t is a long established fact that a reader will be distracted by the readable content of a page when looking </p> --}}
           <div class="services_section_2 layout_padding">
              <div class="row">

			    <div class="col-lg-12 col-md-12">

				<div class="card-body">

					<form action="{{ route('emp.save') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf

                        <div class="row" style="text-align: right;">
                            <div class="col-6">
                                <label for="inputName" class="control-label" style="font-weight: bold; color: black;">النسبة</label>
                                <input style="direction: rtl;" type="text" class="form-control @error('lastName') is-invalid @enderror" 
                                id="inputName" name="lastName">

                                @error('lastName')
                                    <div class="alert alert-danger">يجب إدخال النسبة</div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="inputName" class="control-label" style="font-weight: bold; color: black;">الاسم</label>
                                <input style="direction: rtl;" type="text" class="form-control @error('firstName') is-invalid @enderror" 
                                id="inputName" name="firstName">
                                @error('firstName')
                                    <div class="alert alert-danger">يجب إدخال الإسم</div>
                                @enderror
                            </div>
                        </div><br>

                        <div class="row" style="text-align: right;">
                            <div class="col-6">
                                <div class="form-group">
                                    <label style="font-weight: bold; color: black;">تاريخ الولادة</label>
                                        <input style="direction: rtl;" type="datetime" class="form-control @error('birthDate') is-invalid @enderror" 
                                        name="birthDate">

                                        @error('birthDate')
                                            <div class="alert alert-danger">يجب إدخال تاريخ الولادة</div>
                                        @enderror
                                </div>
                            </div>

                            <div class="col-6">
                              <label style="font-weight: bold; color: black;" for="inputName" class="control-label">رقم الموبايل</label>
                              <input style="direction: rtl;" type="text" class="form-control @error('phone') is-invalid @enderror" 
                              id="inputName" name="phone">

                            @error('phone')
                                <div class="alert alert-danger">يجب إدخال رقم الموبايل ويجب أن يكون 10 أرقام</div>
                            @enderror
                            </div>
                        </div><br>
                        
                        <div class="row" style="text-align: right;">

                            <div class="col-6">
                                <div class="input-container">
                                    <label for="image" style="font-weight: bold; color: black;">صورة شخصية</label>
                                    <input type="file" style="direction: rtl;" class="form-control" id="image" name="image">
                                </div>
                                </div>

                        <div class="col-6">
                        <div class="form-group" style="text-align: right;">
                            <label class="display-block" style="font-weight: bold; color: black;">الجنس</label> <br>
                           
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" style="color: black;" for="status_inactive"> أنثى </label>
                                &nbsp;
                                <input class="form-check-input" type="radio" name="Gender" id="status_inactive" value="أنثى">
                            </div>

                            <div class="form-check form-check-inline">
                                <label class="form-check-label" style="color: black;" for="status_active"> ذكر </label>
                                &nbsp;
                                <input class="form-check-input" type="radio" name="Gender" id="status_active" value="ذكر" checked>
                            </div> 
                        </div> 

                        </div>

                        </div><br><br>


                        <div class="row" style="text-align: right;">
                            <div class="col-6">
                            <div class="form-group" style="text-align: right;">
                                <label style="font-weight: bold; color: black;">المنطقة التي ترغب في العمل ضمنها</label>
                                <select style="direction: rtl;" name="area" class="form-control select @error('area') is-invalid @enderror"> 
                                    <option value="لايوجد">اختر المنطقة</option>
                                    
                                    @foreach($areas as $area)
                                    <option value="{{$area->area}}">{{$area->area}}</option>
                                    @endforeach 
    
                                </select>
    
                                @error('area')
                                    <div class="alert alert-danger">يجب اختيار المنطقة</div>
                                @enderror
                            </div>
                            </div><br>
    
                            <div class="col-6">
    
                            <div class="form-group" style="text-align: right;">
                                <label style="font-weight: bold; color: black;">نوع العمل الذي ترغب به</label>
                                <select style="direction: rtl;" name="typeOfWork" class="form-control select @error('typeOfWork') is-invalid @enderror"> 
                                    <option value="لايوجد">اختر نوع العمل</option>
                                    <option value="سيارة">غسيل سيارات</option>
                                    <option value="عقار">تنظيف منازل</option>
                                </select>
    
                                @error('typeOfWork')
                                    <div class="alert alert-danger">يجب اختيار نوع العمل</div>
                                @enderror
                            </div>
                            </div>
                            </div><br>
    

						<div class="row" style="text-align: right;">
							<div class="col">
								<label for="inputName" class="control-label" style="font-weight: bold; color: black;">نبذة حولك</label>
								<textarea style="direction: rtl;" type="text" class="form-control @error('aboutYou') is-invalid @enderror" 
								id="inputName" name="aboutYou" rows="3" cols="30"></textarea>

								@error('aboutYou')
									<div class="alert alert-danger">يجب إدخال نبذة عنك</div>
								@enderror
							</div>
						</div><br><br>
                    
                    

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary" style="background-color: #0c426e;">إرسال البيانات</button>
                        </div>
            </form>

                </div>
            </div>

              </div>
           </div>
        </div>
     <br><br>
    </div>


    
    {{-- flatpicker --}}
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

{{-- <script>
	config = {
    	dateFormat: "Y-m-d",
		altInput: true,
		altFormat: "F j, Y",

        // locale: "ar",
        // position: "right",
        // static: true,
        // rtl: true
	}
	flatpickr("input[type=datetime]", config);
</script> --}}
<script>
    config = {
        dateFormat: "Y-m-d",
        altInput: true,
        altFormat: "F j, Y",
        maxDate: new Date().getFullYear() - 10 + "-01-01" // تحديد الحد الأعلى للتاريخ كتاريخ قبل 10 سنوات
    }
    flatpickr("input[type=datetime]", config);
</script>




    
<script>
    document.querySelector('.close').addEventListener('click', function() {
      fetch('/clear-session', {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
      }).then(function(response) {
        if (response.ok) {
          console.log('Session Cleared Successfully');
        } else {
          console.log('Failed to Clear Session');
        }
      });
    });
    </script>
    



</body>

@endsection


@section('js')

@endsection
