@extends('site.layouts.master')

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

@if(session()->has('Add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>{{ session()->get('Add') }}</strong>
	<button type="button" class="close" data_dismiss="alert" aria_lable="Close">
		<span aria_hidden="true">&times;</span>
	</button>
</div>
@endif

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
                            <div class="col">
                                <label for="inputName" class="control-label" style="font-weight: bold; color: black;">الاسم</label>
                                <input type="text" class="form-control @error('firstName') is-invalid @enderror" 
                                id="inputName" name="firstName" required>

                                @error('firstName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><br>

                        <div class="row" style="text-align: right;">
                            <div class="col">
                                <label for="inputName" class="control-label" style="font-weight: bold; color: black;">النسبة</label>
                                <input type="text" class="form-control @error('lastName') is-invalid @enderror" 
                                id="inputName" name="lastName" required>

                                @error('lastName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><br>

                        <div class="row" style="text-align: right;">
                            <div class="col">
                              <label style="font-weight: bold; color: black;" for="inputName" class="control-label">رقم الموبايل</label>
                              <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                              id="inputName" name="phone">

                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div><br>

                        <div class="row" style="text-align: right;">
                            <div class="col">
                                <div class="form-group">
                                    <label style="font-weight: bold; color: black;">تاريخ الولادة</label>
                                        <input style="direction: rtl;" type="datetime" class="form-control @error('birthDate') is-invalid @enderror" 
                                        name="birthDate">

                                        @error('birthDate')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                        </div><br>

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
                        </div><br>
                        
						<div class="row" style="text-align: right;">
							<div class="col">
								<label for="inputName" class="control-label" style="font-weight: bold; color: black;">نبذة حولك</label>
								<textarea type="text" class="form-control @error('aboutYou') is-invalid @enderror" 
								id="inputName" name="aboutYou" rows="3" cols="30"></textarea>

								@error('aboutYou')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div><br>
                    
                        <div class="input-container">
                            <label for="image" style="font-weight: bold; color: black;">صورة شخصية</label>
                            <input type="file" class="form-control" id="image" name="image">
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
     <br><br><br><br><br>
    </div>


    {{-- flatpicker --}}
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
	config = {
    	dateFormat: "Y-m-d",
		altInput: true,
		altFormat: "F j, Y",

        locale: "ar",
        position: "right",
	}
	flatpickr("input[type=datetime]", config);
</script>


</body>

@endsection


@section('js')

@endsection
