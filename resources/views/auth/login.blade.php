{{-- <x-guest-layout> --}}
    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
@extends('site.layouts.master')
@section('css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">

@endsection


@section('content')

   <body>  
    <div class="contact_section layout_padding">
        <div class="container">
            <h1 class="contact_taital"> تسجيل الدخول</h1>

    <div class="contact_section_2 layout_padding">


    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="row">

            <div class="col-md-6">
                <div class="map_main">
                   <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Al,Jumailya Institute+Aljamiliah+Aleppo+Syria" width="600" height="360" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                   </div>
                </div>
             </div>

            <div class="col-md-6">
               <div class="mail_section_1">
                <div class="mt-4">
                  <input style="direction: rtl" type="text" class="mail_text_1 @error('password') is-invalid @enderror" 
                  placeholder="رقم الموبايل" name="phone">
                  @error('phone')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                

                  <div class="mt-4">
                  <input style="direction: rtl" id="password" type="password" class="mail_text_1 @error('password') is-invalid @enderror" 
                  placeholder="كلمة السر"
                  required autocomplete="current-password" 
                  name="password"  :value="__('Password')" >
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  </div>

             &nbsp;  

                   <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center" style="direction: rtl; float: right; font-size: 16px;">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __(' تذكرني') }}</span>
            </label>
        </div>
        <br><br>

                  <div class="d-flex justify-content-center">
                    <button class="btn btn-primary" type="submit" style="color: white; background-color: #444444; border: none;">تسجيل الدخول</button>
                </div>

               </div>
            </div>
        


         </div>

        </form>
    </div>
</div>
</div>


    </body>

    @endsection
    {{-- </x-guest-layout> --}}

        <!-- Email Address -->
        {{-- <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div> --}}




        <!-- Password -->
        {{-- <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>







 --}}
