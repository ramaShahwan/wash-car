@extends('site.layouts.master')

@section('css')

@endsection


@section('content')

<body>

      <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container">
            <h1 class="contact_taital"><span style="color: #0c426e"> من نحن؟ </span></h1>
            <div class="contact_section_2 layout_padding">

               <div class="row">

                  <div class="col-md-6">
                     <div class="map_main">
                        <div class="map-responsive">
                           <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Al,Jumailya Institute+Aljamiliah+Aleppo+Syria" width="600" height="360" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-6" style="text-align: right">
                     <div class="mail_section_1">
                        <br>
                        <p class="dummy_text" style="font-size: 18px;"> 
                        {{-- <i class="fa fa-circle" style="direction: rtl;"> &nbsp; --}}
                           تعد شركة المغسلة المتنقلة أول مغسلة سيارات متنقلة تم إنشاؤها وافضل شركة غسيل سيارات متنقلة في سوريا لتقديم خدمة تنظيف وتلميع السيارات لكافة العملاء في مكان تواجدهم سواء كان بالمنزل أو العمل أو أي مكان يرغب به العميل
                        {{-- </i> --}}

                        </p>
                        <br>
                        <p class="dummy_text" style="font-size: 18px;"> 
                        {{-- <i class="fa fa-circle" style="direction: rtl;"> &nbsp; --}}
                           خدمات شركة المغسلة المتنقلة  تتضمن غسل السيارات من الخارج والداخل بالمكنسة والبخار إضافة إلى تلميع الديكورات والأبواب وتنظيف فتحات المكيف بالبخار والتعطير الداخلي للسيارات والعديد من الخدمات التي تساعد العملاء في الحفاظ على نظافة سياراتهم في كل مكان وفي أي وقت
                        {{-- </i> --}}
                        
                        </p>
                        <br>
                        <p class="dummy_text" style="font-size: 18px;"> 
                        {{-- <i class="fa fa-circle" style="direction: rtl;"> &nbsp; --}}

                           تعتمد شركتنا على استخدام أحدث التقنيات والمعدات والمواد في عملية تنظيف وتلميع السيارات لضمان الحصول على أفضل النتائج التي ترضي العميل، بالإضافة إلى استخدام البخار الجاف في عملية التنظيف الداخلي وما يتم استخدام مناشف مخصصة لكل عميل مصنوعة من الميكروفايبر، بالإضافة إلى غسيل وتلميع الاطارات وتوفير كيس نفايات داخل السيارة مع تعطيرها في آخر مرحلة لتعود نظيفة وجذابة.  فتتم عملية التنظيف بأقل وقت ممكن مع جودة وحرفية عالية وبسعر مناسب للجميع
                        {{-- </i> --}}
                       
                        </p>
                     </div>
                  </div>

               </div>

            </div>
         </div>
      </div>
      <!-- contact section end -->

      <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container">
            <div class="contact_section_2 layout_padding">
               <div class="row">
                  
                  <div class="col-md-4">
                     <div class="" style="text-align: center;">
                        <img src="site/images/back-in-time.png" alt="" style="width: 50px;">
                        <br><br>
                        <p class="dummy_text" style="font-size: 20px; font-weight: bolder"> الوقت </p>
                        <hr>
                        <p class="dummy_text" style="font-size: 20px;"> أقصى درجات الدقة والإلتزام بأوقات التنفيذ والتواجد وأداء الخدمة </p>
                     </div>
                  </div>
            
                  <div class="col-md-4">
                     <div class="" style="text-align: center; background-color: rgb(255, 255, 45);">
                        <img src="site/images/award.png" alt="" style="width: 100px; margin: 30px"> 
                        <br><br>
                        <p class="dummy_text" style="font-size: 30px; font-weight: bolder;"> الجودة </p>
                        <hr>
                        <p class="dummy_text" style="font-size: 20px;"> نحافظ على مستوى عالٍ من الخدمة والجودة لعملائنا الكرام </p>
                     <br><br>
                     </div>
                  </div>
            
                  <div class="col-md-4">
                     <div class="" style="text-align: center;">
                        <img src="site/images/customer.png" alt="" style="width: 50px;">
                        <br><br>
                        <p class="dummy_text" style="font-size: 20px; font-weight: bolder;"> العملاء </p>
                        <hr>
                        <p class="dummy_text" style="font-size: 20px;"> هم القياس والصدى الذي يجعلنا دائماً نتطلع لمزيد من التطوير والإهتمام بخدماتنا التي نقدمها لارضاء كافة عملائنا </p>
                     </div>
                  </div>
                
               </div>
            <br><br>
            <br><br>
            </div>

            <div class="seemore_bt"><a href="{{ url('/index') }}">اطلب الآن</a></div>
            <br><br>

         </div>
      </div>
      <!-- contact section end -->


  
      

   </body>

   @endsection
   
   
   @section('js')
   
   @endsection