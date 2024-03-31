@extends('site.layouts.master')

@section('css')
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

                    <form action="">

                        {{-- <div class="form-group">
                            <label>الاسم الكامل</label>
                            <input name="name" class="form-control  @error('name') is-invalid @enderror" type="text" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <div class="alert alert-danger form-control">  <strong>{{ $message }}</strong> </div>
                                    </span>
                                @enderror
                        </div> --}}

                        <div class="row" style="text-align: right;">
                            <div class="col">
                                <label for="inputName" class="control-label" style="font-weight: bold; color: black;">المنطقة</label>
                                <input type="text" class="form-control @error('area') is-invalid @enderror" 
                                id="inputName" name="area" required>

                                @error('area')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><br>

                    </form>


                </div>
            </div>
            


              </div>
           </div>
        </div>
     <br><br><br><br><br>
    </div>

</body>

@endsection


@section('js')

@endsection
