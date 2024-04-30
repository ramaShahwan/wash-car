@extends('site.layouts.master')

@section('css')

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

      <!-- banner section start -->
      <div class="banner_section layout_padding">
        <div class="container">
           <div id="main_slider" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                 <div class="carousel-item active">
                    <div class="row">
                       <div class="col-md-6">
                          <div class="banner_taital">
                             <h1 class="banner_taital"> حافظ على نظافة سيارتك دائماً </h1>
                             {{-- <p class="banner_text">There are many variations of passages of Lorem Ipsum available</p> --}}
                          </div>
                          <div class="btn_main">
                             <div class="quote_bt active"><a href="{{ url('/index') }}">اطلب الآن</a></div>
                             <div class="contact_bt"><a href="#"> من نحن؟ </a></div>
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div><img src="{{URL::asset('site/images/banner-img-1.png')}}" class="banner_img"></div>
                       </div>
                    </div>
                 </div>
                 <div class="carousel-item">
                    <div class="row">
                       <div class="col-md-6">
                          <div class="banner_taital">
                             <h1 class="banner_taital"> حافظ على نظافة سيارتك دائماً </h1>
                             {{-- <p class="banner_text">There are many variations of passages of Lorem Ipsum available</p> --}}
                          </div>
                          <div class="btn_main">
                             <div class="quote_bt active"><a href="{{ url('/index') }}">اطلب الآن</a></div>
                             <div class="contact_bt"><a href="#"> من نحن؟ </a></div>
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div><img src="{{URL::asset('site/images/banner-img.png')}}" class="banner_img"></div>
                       </div>
                    </div>
                 </div>
                 <div class="carousel-item">
                    <div class="row">
                       <div class="col-md-6">
                          <div class="banner_taital">
                             <h1 class="banner_taital"> حافظ على نظافة سيارتك دائماً </h1>
                             {{-- <p class="banner_text">There are many variations of passages of Lorem Ipsum available</p> --}}
                          </div>
                          <div class="btn_main">
                             <div class="quote_bt active"><a href="{{ url('/index') }}">اطلب الآن</a></div>
                             <div class="contact_bt"><a href="#"> من نحن؟ </a></div>
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div><img src="{{URL::asset('site/images/banner-img-2.png')}}" class="banner_img"></div>
                       </div>
                    </div>
                 </div>
              </div>
              <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
              <i class="fa fa-arrow-left" aria-hidden="true"></i>
              </a>
              <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
              </a>
           </div>
        </div>
     </div>
     <!-- banner section end -->

           <!-- services section start -->
           <div class="services_section layout_padding">
            <div class="container">
               <h1 class="services_taital"> <span style="color: #0c426e">خدماتنا</span></h1>
               {{-- <p class="services_text">t is a long established fact that a reader will be distracted by the readable content of a page when looking </p> --}}
               <div class="services_section_2 layout_padding">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="services_box">
                           <div><img src="{{URL::asset('site/images/inner.jpg')}}" class="image_1"></div>
                           <h4 class="express_text">غسيل داخلي للسيارة</h4>
                           <p class="lorem_text" style="font-size: 16px"> تستخدم شركتنا منظفات مخصصة لتنظيف وتلميع السيارة كما يتم استخدام مناشف مخصصة لكل عميل،
                             بالإضافة إلى توفير كيس نفايات داخل السيارة مع تعطيرها في آخر مرحلة لتعود نظيفة وجذابة </p>
                           {{-- <div class="seemore_bt"><a href="#">See More</a></div> --}}
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="services_box">
                           <div><img src="{{URL::asset('site/images/outer.jpg')}}" class="image_1"></div>
                           <h4 class="express_text">غسيل خارجي للسيارة</h4>
                           <p class="lorem_text" style="font-size: 16px"> تعد شركتنا أول مغسلة سيارات متنقلة تم إنشاؤها وأفضل شركة غسيل سيارات متنقلة في سوريا لتقديم خدمة تنظيف وتلميع السيارات لكافة العملاء في مكان تواجدهم سواء كان بالمنزل أو العمل أو أي مكان يرغب به العميل.
                        خدمات شركتنا الخارجية تتضمن غسل السيارات من الخارج وتلميع الإطارات إضافة إلى تلميع الأبواب </p>
                           {{-- <div class="seemore_bt"><a href="#">See More</a></div> --}}
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="services_box">
                           <div><img src="{{URL::asset('site/images/full.jpg')}}" class="image_1"></div>
                           <h4 class="express_text">غسيل كامل للسيارة</h4>
                           <p class="lorem_text" style="font-size: 16px"> من أهم خدماتنا هي خدمة تنظيف وتلميع السيارات كوننا شركة غسيل سيارات متنقلة تعتمد شركتنا على استخدام أحدث التقنيات والمعدات والمواد في عملية تنظيف وتلميع السيارات لضمان الحصول على أفضل النتائج التي ترضي العميل، 
                            بالإضافة إلى استخدام البخار الجاف في عملية التنظيف الداخلي والمعطرات المناسبة فتتم عملية التنظيف بأقل وقت ممكن مع جودة وحرفية عالية وبسعر مناسب للجميع </p>
                           {{-- <div class="seemore_bt"><a href="#">See More</a></div> --}}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- services section end -->

      <!-- quality section start -->
      <div class="providing_section layout_padding">
        <div class="container">
           <h1 class="services_taital">نحن نقدم أفضل <span style="color: #0c426e">الخدمات ذات الجودة</span></h1>
        </div>
     </div>
     <div class="providing_section_2 layout_padding">
        <div class="container">
           <h2 class="clean_text">النظافة والجودة</h2>
           <p class="ipsum_text" style="font-size: 18px; font-weight: bold;">
            في النهاية، لم يعد لديك عائق لأن تكون سيارتك غير نظيفة مع توفير خدمة مغسلة سيارات متنقلة 
            <br><br>
            وبهذا نكون قد قدمنا لكم أفضل مغسلة سيارات متنقلة وعدد من التطبيقات التي تقدم خدمة غسيل السيارات المتنقل في سوريا
           </p>
           <div class="quote_bt_1"><a href="{{ url('/index') }}">اطلب الآن</a></div>
        </div>
     </div>
     <!-- quality section end -->


</body>

@endsection


@section('js')

@endsection
