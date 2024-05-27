@extends('site.layouts.master')
@section('css')
@endsection

@section('content')

 <body>  
 <div class="contact_section layout_padding">
    <div class="container">
        <h1 class="contact_taital">الملف الشخصي</h1>

         <div class="contact_section_2 layout_padding">

{{--  <form method="POST" action="{{ route('profile.update') }}">
        @csrf

        <!-- Name -->
        <div class="mt-4">
            <input style="direction: rtl" type="text" class="mail_text_1 @error('name') is-invalid @enderror" 
             placeholder="الاسم" name="name" id="name" :value="old('name', $user->name)" required autofocus autocomplete="name" >
            
             @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

         <!-- Phone -->
        <div class="mt-4">
            <input style="direction: rtl" type="text" class="mail_text_1 @error('phone') is-invalid @enderror" 
            placeholder="رقم الموبايل" name="phone" id="phone" :value="old('phone', $user->phone)" required autocomplete="phone">
            
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


         <!-- Current Password -->
        <div class="mt-4">
            <input style="direction: rtl" id="password" type="password" class="mail_text_1 @error('password') is-invalid @enderror" 
            placeholder="كلمة المرور الحالية"
            required autocomplete="current-password" 
            name="password" required autocomplete="new-password">
            
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

         <!-- New Password -->
         <div class="mt-4">
            <input style="direction: rtl" id="password" type="password" class="mail_text_1 @error('password') is-invalid @enderror" 
            placeholder="كلمة المرور الحالية"
            required autocomplete="current-password" 
            name="password" required autocomplete="new-password">
            
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

         <!-- Confirm Password -->
            <div class="mt-4">
                <input  style="direction: rtl" id="password_confirmation" type="password" class="mail_text_1 @error('password_confirmation') is-invalid @enderror" 
                placeholder="تأكيد كلمة المرور "
                required autocomplete="current-password" 
                name="password_confirmation"  required autocomplete="new-password">
                
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

</form> --}}


<form action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('patch')
    <div class="container">
        <div class="heading_container">
            <h5>
                معلومات الملف الشخصي
            </h5>
        </div>
        <br>
            <div class="col-md-12">
                <div class="form_container contact-form" style="padding-right: 10%;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                            <x-input-label for="name" :value="__('الاسم')" /><br>
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" style="width: 90%;" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        
                            </div>
                        </div>

                    <div class="col-md-6">
                        <div class="form-group form-focus">
                        <x-input-label for="phone" :value="__('رقم الموبايل')" /><br>
                        <x-text-input id="phone" name="phone" type="phone" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autocomplete="phone" style="width: 90%;"/>
                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                    </div>
                </div>
                        <br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>
                        <br>
                    </div>
                    <hr>
                    <br>
                </div>
            </div>
    </div>
</form>

    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="heading_container">
            <h5 style="padding-right: 5%;">
                تعديل كلمة المرور
            </h5>
        </div>
        <br>
            <div class="col-md-12">
                <div class="form_container contact-form" style="padding-right: 15%;">
                    {{-- <div class="row"> --}}
                        <div class="col-md-6">
                        <div class="form-group form-focus">
                            <x-input-label for="update_password_current_password" :value="__('كلمة المرور الحالية')" /><br>
                            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" style="width: 85%;"/>
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <x-input-label for="update_password_password" :value="__('كلمة المرور الجديدة')" /><br>
                                <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" style="width: 85%; float: right;"/>
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                            </div>
                        </div><br>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <x-input-label for="update_password_password_confirmation" :value="__('تأكيد كلمة المرور')" /><br>
                                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" style="width: 85%;"/>
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>
                    
                        <br>
                        <div class="d-flex justify-content-center" style="float: right;">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>
                        <br><br>
                    {{-- </div> --}}
                    <hr>
                    <br>
                </div>
            </div>
    </form>

    </div>
    </div>
</div> 


</body> 




	<!-- row opened -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <br><br>
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="container">
                        <div class="heading_container">
                            <h5>
                                معلومات الملف الشخصي
                            </h5>
                        </div>
                        <br>
                            <div class="col-md-12">
                                <div class="form_container contact-form" style="padding-right: 10%;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                            <x-input-label for="name" :value="__('الاسم')" /><br>
                                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" style="width: 90%;" />
                                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                        
                                            </div>
                                        </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                        <x-input-label for="phone" :value="__('رقم الموبايل')" /><br>
                                        <x-text-input id="phone" name="phone" type="phone" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autocomplete="phone" style="width: 90%;"/>
                                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                    </div>
                                </div>
                                        <br>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                                        </div>
                                        <br>
                                    </div>
                                    <hr>
                                    <br>
                                </div>
                            </div>
                    </div>
                </form>

                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="heading_container">
                            <h5 style="padding-right: 5%;">
                                تعديل كلمة المرور
                            </h5>
                        </div>
                        <br>
                            <div class="col-md-12">
                                <div class="form_container contact-form" style="padding-right: 15%;">
                                    {{-- <div class="row"> --}}
                                        <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <x-input-label for="update_password_current_password" :value="__('كلمة المرور الحالية')" /><br>
                                            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" style="width: 85%;"/>
                                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                        </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <x-input-label for="update_password_password" :value="__('كلمة المرور الجديدة')" /><br>
                                                <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" style="width: 85%; float: right;"/>
                                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                            </div>
                                        </div><br>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <x-input-label for="update_password_password_confirmation" :value="__('تأكيد كلمة المرور')" /><br>
                                                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" style="width: 85%;"/>
                                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                            </div>
                                        </div>
                                    
                                        <br>
                                        <div class="d-flex justify-content-center" style="float: right;">
                                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                                        </div>
                                        <br><br>
                                    {{-- </div> --}}
                                    <hr>
                                    <br>
                                </div>
                            </div>
                    </form>


                    {{-- <x-danger-button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                    >{{ __('Delete Account') }}</x-danger-button> 
                     --}}
                     {{-- <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable> --}}

                    <form action="{{ route('profile.destroyProfile') }}" method="delete">
                        @csrf
                        <div class="heading_container">
                            <h5 style="padding-right: 5%;">
                            حذف الحساب
                            </h5>
                        </div>
                        <br>
                            <div class="col-md-12">
                                <div class="form_container contact-form">
                                        <div class="col-md-6">
                                        <div class="form-group form-focus">
                                        <x-input-label for="password" value="{{ __('كلمة المرور') }}" class="sr-only" />

                                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4" placeholder="{{ __('كلمة المرور') }}" style="width: 73%; margin-right: 30%;"/>

                                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                        </div>
                                    </div>
                                    <br>

                                    <div class="mt-6 flex justify-end">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('إلغاء') }}
                                        </x-secondary-button>
                        
                                        <x-danger-button class="ms-3 btn btn-danger" type="submit">
                                            {{ __('حذف الحساب') }}
                                        </x-danger-button>
                                    </div>													
                                        <br><br>
                                    <hr>
                                    <br>
                                </div>
                            </div>
                    </form>
                    
                    {{-- </x-modal> --}}

            </div>                            
        </div>
</div>
<!-- /row -->


@endsection
