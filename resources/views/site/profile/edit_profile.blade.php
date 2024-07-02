@extends('site.layouts.master')
@section('css')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">

@endsection

@section('content')

<body>  
<div class="contact_section layout_padding">

    @if (session('message'))
        <div class="alert alert-success" style="text-align: right; direction: rtl;">
            {{ session('message') }}
        </div>
    @endif

    <div class="container">
        <h1 class="services_taital"><span style="color: #444444">تعديل الملف الشخصي</span></h1> 
        <div class="contact_section_2 layout_padding">

        <form method="POST" action="{{ route('update_profile', auth()->user()->id) }}">
            @csrf

            <div class="row" style="text-align: right;">
                <div class="col-6">
                    <label for="inputName" class="control-label" style="font-weight: bold; color: black;">رقم الموبايل</label>
                    <input style="direction: rtl;" type="text" class="form-control @error('phone') is-invalid @enderror" 
                    id="inputName" name="phone" value="{{ $user->phone }}">

                    @error('phone')
                        <div class="alert alert-danger">يجب إدخال رقم الموبايل</div>
                    @enderror
                </div>

                <div class="col-6">
                    <label for="inputName" class="control-label" style="font-weight: bold; color: black;">الاسم</label>
                    <input style="direction: rtl;" type="text" class="form-control @error('name') is-invalid @enderror" 
                    id="inputName" name="name" value="{{ $user->name }}">
                    @error('name')
                        <div class="alert alert-danger">يجب إدخال الاسم</div>
                    @enderror
                </div>
            </div><br>

            <div class="row" style="text-align: right;">
                <div class="col-12">
                    <label for="inputName" class="control-label" style="font-weight: bold; color: black;">الرصيد</label>
                    <input style="direction: rtl;" type="text" class="form-control @error('balance') is-invalid @enderror" 
                    id="inputName" name="balance" value="{{ $user->balance }}">
                    @error('balance')
                        <div class="alert alert-danger">يجب إدخال الرصيد</div>
                    @enderror
                </div>

                {{-- <div class="col-6">
                    <label for="inputName" class="control-label" style="font-weight: bold; color: black;">كلمة المرور</label>
                    <input style="direction: rtl;" type="text" class="form-control @error('password') is-invalid @enderror" 
                    id="inputName" name="password" value="{{ $user->password }}">

                    @error('password')
                        <div class="alert alert-danger">يجب إدخال كلمة المرور</div>
                    @enderror
                </div> --}}
            </div><br>

                <br><br>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary" type="submit" style="color: white; background-color: #444444; border: none;"> حفظ البيانات <button>
            </div>
        </form>
        </div>
    </div>
</div>


</body>

@endsection
