      <!-- footer section start -->
      <div class="footer_section layout_padding">
        <div class="container">
           <div class="row">
              <div class="col-lg-3 col-sm-6">
                 <h2 class="useful_text" style="text-align: right;">تواصل معنا</h2>
                 <div class="location_text" style="direction: rtl; text-align: right"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp; <span class="padding_left_15">الجميلية</span></a></div>
                 <div class="location_text" style="direction: rtl; text-align: right"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> &nbsp; <span class="padding_left_15"> 123456789 (+963) </span></a></div>
                 <div class="location_text" style="direction: rtl; text-align: right"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp; <span class="padding_left_15">demo@gmail.com</span></a></div>
              </div>
              <div class="col-lg-3 col-sm-6">
                 <h2 class="useful_text" style="text-align: right;">روابط الموقع</h2>
                 <div class="footer_menu">
                    <ul style="text-align: right;">
                       <li class="active"><a href="{{ url('/') }}">الصفحة الرئيسية</a></li>
                       <li><a href="{{ url('services') }}">خدماتنا</a></li>
                       <li><a href="{{ url('get_img') }}">أعمالنا</a></li>
                       <li><a href="{{ url('about_us') }}">من نحن؟</a></li>
                       <li><a href="{{ url('add_emp') }}">انضم لفريقنا</a></li>


                        {{-- @php
                           $all_pinned_page = $all_pinned_page ?? [];
                        @endphp --}}



                        {{-- @isset($get_content)
                           @foreach ($get_content as $get_describtion)

                                 @isset($all_pinned_page)

                                    @foreach ($all_pinned_page as $get_pinned)
                                       <li><a href="{{ route('page.generation', [$get_pinned->href]) }}">{{ $get_pinned->name }}</a></li>
                                    @endforeach

                                 @endisset

                                 <div class="custom_page_left">
                                    <h5>{{ $get_describtion->name }}</h5>
                                    <div class="description_page">
               
                                       <p>{!! $get_describtion->content !!}</p>
               
                                    </div>
                              </div>

                           @endforeach
                        @endisset --}}



                        {{-- @isset($get_content)
                           @foreach ($get_content as $get_describtion)
                     
                              <div class="custom_page_left">
                                 <h5>{{ $get_describtion->name }}</h5>
                                 <div class="description_page">
                                       <p>{!! $get_describtion->content !!}</p>
                                 </div>
                              </div>
                     
                           @endforeach
                        @endisset
                    
                        @isset($all_pinned_page)
                              @foreach ($all_pinned_page as $get_pinned)
                                 <li><a href="{{ route('page.generation', [$get_pinned->href]) }}">{{ $get_pinned->name }}</a></li>
                              @endforeach
                        @endisset --}}
                    




                        {{-- <div class="container mt-5 p-3 main-about">
                           @isset($get_content)
                              @foreach ($get_content as $get_describtion)
                                 <div class="custom_page_right">
                                       @foreach ($all_pinned_page as $get_pinned)
                                          <ul>
                     
                                             <a class="text-d" href="{{ route('about-dalil', [$get_pinned->href, $get_pinned->id]) }}">
                                                   <li>{{ $get_pinned->page_name }}</li>                                                </a>
                                             </ul>
                                       @endforeach
                                 </div>
                     
                                 <div class="custom_page_left">
                                       <h5>{{ $get_describtion->page_name }}</h5>
                                       <div class="description_page">
                     
                                          <p>{!! $get_describtion->content !!}</p>
                     
                                       </div>
                                 </div>
                              @endforeach
                           @endisset
                        </div> --}}


                        {{-- @isset($get_data) --}}
                           {{-- @foreach ($get_data as $get_pinned)
                              <li><a href="{{ route('page.generation', $get_pinned->href) }}">{{ $get_pinned->name }}</a></li>
                           @endforeach --}}
                        {{-- @endisset --}}
                     

                        {{-- <li>
                           <a href="{{ route('page.generation', $get_data->href) }}">{{ $get_data->name }}</a>
                        </li> --}}
                     

                    </ul>
                 </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                 <h2 class="useful_text" style="text-align: right;">وقت الدوام</h2>
                 <p class="footer_text" style="text-align: right;"> جميع أيام الأسبوع </p>
                 <p class="footer_text" style="text-align: right;"> 10:00 صباحاً  حتى  6:00 مساءً </p>
              </div>
              <div class="col-sm-6 col-lg-3">
                 <h1 class="useful_text" style="text-align: right;">اطلب خدمتك الآن</h1>
                 <div class="subscribe_bt" style="text-align: right; float: right;"><a href="{{ url('/index') }}" style="background-color: #252525;">غسيل سيارات</a></div>
                 <div class="subscribe_bt" style="text-align: right; float: right;"><a href="{{ url('/index_home') }}" style="background-color: #252525;">تنظيف منزلي</a></div>
              </div>
           </div>
           <div class="social_icon">
              <ul>
                 {{-- <li><a href="{{ $settings->socialMidiaFacebook }}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                 <li><a href="{{ $settings->socialMidiaTelegram }}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                 <li><a href="{{ $settings->socialMidiaYoutube }}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li> --}}
                 {{-- <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i> {{ $face }} </a></li> --}}
              </ul>
           </div>
        </div>
     </div>
     <!-- footer section end -->
     
     <!-- copyright section start -->
     <div class="copyright_section">
        <div class="container">
           <p class="copyright_text">حقوق الطبع والنشر 2024 جميع الحقوق محفوظة<a href="https://html.design"></a></p>
        </div>
     </div>
     <!-- copyright section end -->
