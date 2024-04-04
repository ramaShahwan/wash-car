@extends('site.layouts.master')
@section('css')
@endsection


@section('content')

<body>  
<div class="contact_section layout_padding">
    <div class="container">
        <h1 class="contact_taital">إنشاء حساب</h1>

         <div class="contact_section_2 layout_padding">

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mt-4">
            <input style="direction: rtl" type="text" class="mail_text_1 @error('password') is-invalid @enderror" 
            placeholder="الإسم" name="name" id="name" :value="old('name')" required autofocus autocomplete="name" >
            @error('name')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

        {{-- <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div> --}}

        <!-- Email Address -->
        {{-- <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div> --}}

         <!-- phone -->
        <div class="mt-4">
            <input style="direction: rtl" type="text" class="mail_text_1 @error('password') is-invalid @enderror" 
            placeholder="رقم الموبايل" name="phone" id="phone" :value="old('phone')" required autocomplete="phone">
            @error('phone')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

        <!-- Password -->
        {{-- <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> --}}

        <!-- Confirm Password -->
        {{-- <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div> --}}

        <div class="mt-4">
            <input style="direction: rtl" id="password" type="password" class="mail_text_1 @error('password') is-invalid @enderror" 
            placeholder="كلمة السر"
            required autocomplete="current-password" 
            name="password"   required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>


            <div class="mt-4">
                <input  style="direction: rtl" id="password_confirmation" type="password" class="mail_text_1 @error('password_confirmation') is-invalid @enderror" 
                placeholder="تأكيد كلمة السر "
                required autocomplete="current-password" 
                name="password_confirmation"   required autocomplete="new-password">
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


             &nbsp;  
            <div class="flex items-center justify-end mt-4">
            <a style="float: right; font-size: 16px;" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('هل قمت بالتسجيل مسبقاً؟') }}
            </a>
            </div>
                <br><br><br>
            <div class="d-flex justify-content-center">
            <button class="btn btn-primary" type="submit" style="color: white; background-color: #0c426e;">
                {{ __(' إنشاء حساب') }}
            <button>
            </div>
        </form>
        </div>
    </div>
</div>


</body>

@endsection





{{-- <x-guest-layout> --}}
    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

  
   