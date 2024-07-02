@extends('site.layouts.master')

@section('css')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">

@endsection


@section('content')

<body>
   
  <!-- services section start -->
  <div class="services_section layout_padding">
   <div class="container">
      <h1 class="services_taital"> <span style="color: #444444">خدماتنا</span></h1>
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
   <br><br>
</div>
<!-- services section end -->

</body>

@endsection


@section('js')

@endsection
