<!DOCTYPE html>
<html lang="{{ $business->lang }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Primary Meta Tags -->
    <title>{{ $business->name }}</title>
    <meta name="title" content="{{ $business->name }}">
    @if ($business->slogan)
    <meta name="description" content="{{ $business->slogan }}">
    @endif
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.qr.algorexe.com/menu/{{ $business->slug }}">
    <meta property="og:title" content="{{ $business->name }}">
    @if ($business->slogan)
    <meta property="og:description" content="{{ $business->slogan }}">
    @endif
    <meta property="og:image" content="https://www.qr.algorexe.com/images/{{ $business->image }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.qr.algorexe.com/menu/{{ $business->slug }}">
    <meta property="twitter:title" content="{{ $business->name }}">


    @if ($business->slogan)
    <meta property="twitter:description" content="{{ $business->slogan }}">
    @endif
    <meta property="twitter:image" content="https://www.qr.algorexe.com/images/{{ $business->image }}">


    <link rel="stylesheet" href="{{ asset('css/mdi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flickity-docs.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <style>
        /* .flickity-slider {

            transform: translateX(0%) !important;
        } */

        .tablinks {
            min-width: 50px;
        }

        .tablinks.active {

            /* color: white; */
            background-color: #F7DBAF;
            /* text-shadow: 1px 0px grey; */
            color: black;
            //font-weight:bold;


        }

        .tabcontent {
            display: none;
        }

        .tabcontent.active {
            display: block;
        }

        /* .garnish {

            display: none;
        }

        .garnish.active {
            display: block;
        } */


        .garnishTab {

            display: none;
        }

        .garnishTab.active {
            display: block;
        }

        .round-bottomtop {
            border-bottom-left-radius: 1rem !important;
            border-bottom-right-radius: 1rem !important;
        }

    </style>
</head>

<body class="bgb5">

    <div class="pb20 bgb5 w100">
        <!-- header -->
        <div class="bgw round-bottomtop sh10">
            <div class="w100 sq15 m_sq30 m_m_sq40 cov" style="background-image: url('http://www.qr.algorexe.com/images/{{ $business->cover }}');"> </div>
            <div>
                <tbl_nm class="p10 @if ($business->lang == 'ar') r rtl @else l @endif">
                    <cl class=" w10 m_w20 m_m_w33 vt">
                        <div class="ov round100 w100 sq100 bgb10 sh10 ba p5" style="top:-40px;background-color: #F7DBAF;">
                            <div class="cc cov  w90 sq90 round100" style="background-image: url('http://www.qr.algorexe.com/images/{{ $business->image }}');">
                            </div>
                        </div>
                    </cl>
                    <cl class="w66 @if ($business->lang == 'ar') r rtl @else l @endif pb50 m_pb20 m_m_pb0 ph20 vt">
                        <div style="min-height: 100px;">
                            <div class="fs32 md_fs22 m_fs18 b">{{ $business->name }}</div>
                            @if ($business->slogan)
                            <div class="mt5 m_mt0 cb60">{{ $business->slogan }}</div>
                            @endif
                            <div class="mt5 m_mt0 cb60"><span class="mdi mdi-map-marker fs18 cb"></span>
                                {{ $business->address }}
                            </div>

                        </div>

                    </cl>
                </tbl_nm>

            </div>

        </div>

        <!-- Close header -->

        <!-- Categories -->
        <div class="mt20 ph20 m_ph10">
            <div class="fs0 ph10 main-carousel ">
                @php $counter=0;@endphp
                @foreach ($categories as $category)
                @if ($loop->first)
                <div class="p5 g_nm">
                    <div class="pv10 ph15 fs14 round3x sh10  bgw  tablinks active " id="{{ $category->id }}" data-index=@php echo($counter) 				@endphp>
                        {{ $category->name }}</div>
                </div>
                @php $counter++; @endphp
                @else
				            @if(count($category->products)>0)
	                <div class="p5 g_nm">
	                    <div class="pv10 ph15 fs14  round3x sh10 cb60 tablinks bgw" id="{{ $category->id }}" data-index=@php echo($counter) @endphp>
	                        {{ $category->name }}
	                    </div>
	                </div>
	                @php $counter++; @endphp

                @endif
                @endif
                @endforeach
            </div>



            @foreach ($categories as $category)
            @if ($loop->first)
            <div class="fs0 @if ($business->lang == 'ar') r rtl @else l @endif c tabcontent mt0 active" id="category{{ $category->id }}">
                @else
                <div class="fs0 @if ($business->lang == 'ar') r rtl @else l @endif c tabcontent " id="category{{ $category->id }}">
                    @endif
                    @foreach ($category->products as $product)
                    <div class="g_nm w25 md_w33 m_w50 vt m_m_w100 p10 round4x  ">
                        <div class="bh10 bgw sh10 round4x">
                            <div class="w100 p10  fs14">
                                <tbl_nm>
                                    <cl class="w30 ">
                                        <div class="cov  w100 sq100 round2x" style="background-image: url('http://www.qr.algorexe.com/images/{{ $product->image }}');">
                                        </div>



                                    </cl>
                                    <cl class="w70 @if ($business->lang == 'ar') r pr10 @else l pl10 @endif">
                                        <div class="b ">
                                            {{ $product->name }}
                                        </div>
                                        <div class="fs9 cb70 mt10" style="min-height:40px;">
                                            {!! $product->recipe !!}
                                        </div>
                                        <div class="fs0 mt10 ">
                                            <div class="g_nm w60 b fs14 ">
                                                @if($business->rate_option)
                                                {{(int)((float)($product->price )*(float)( $business->rate)/1000)*1000}} LL
                                                @else
	                                                @if($business->currency == "LL")
		                                                @php
									$formattedNumber = number_format((float)$product->price, 0, '.', ',');
								@endphp
							@else
								@php
									$formattedNumber = number_format((float)$product->price, 2, '.', ',');
								@endphp
							@endif
							{{ $formattedNumber }} {{ $business->currency }}
                                                
                                                @endif

                                            </div>
                                            @if ($product->garnishes->isNotEmpty())
                                            <div class="ov @if ($business->lang == 'ar') ra @else la @endif">
                                                <div class=" fs12 b g_nm round4x pointer ph10 pv5 bgb10 garnish" id="{{ $product->id }}">
                                                    @if ($business->lang == 'ar')
                                                    <span class="">إضافات</span>
                                                    <span class="l mdi mdi-arrow-down"></span>
                                                    @else
                                                    <span class="">Garnish</span>
                                                    <span class="r mdi mdi-arrow-down"></span>
                                                    @endif
                                                </div>
                                            </div>
                                            @endif
                                        </div>

                                    </cl>
                                </tbl_nm>
                                <div class="brdr mt10 round2x pb5 ph20 garnishTab" id="garnish{{ $product->id }}">
                                    @if ($product->garnishes->isNotEmpty())
                                    @foreach ($product->garnishes as $garnish)
                                    <div class="l  fs0 mt5" style="border-bottom: 1px;">
                                        <div class="fs14 b g_nm w50 @if ($business->lang == 'ar') r @else l @endif">
                                            {{ $garnish->name }}</div>
                                        <div class="fs14 b g_nm w50 @if ($business->lang == 'ar') l @else r @endif">
                                            @if($business->rate_option)
                                            {{ (int)($garnish->price * $business->rate/1000)*1000}}
                                            
                                            @else
                                            {{ $garnish->price }}
                                            {{ $business->currency }}
                                            @endif
                                            </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            {{-- <div class=" w90 g_nm p10 round4x bgw sh10 fs14 l">
                                    Garnish
                                </div> --}}

                        </div>
                    </div>


                    <!--  Close product -->
                    @endforeach
                </div>
                @endforeach

                <div style="height: 50px;"></div>

            </div>

            <!-- Close Categories -->





        </div>

        <!-- Bottom Nav -->
        <div class="">
            <div class=" w100 h m_m_sb fs0 " style="position: fixed;bottom: 0px;overflow: hidden;">
                <div class="bgw sh40 fs0 pv10">
                    <div class="g_nm w25 c  fs24">
                        <a href="{{ $business->facebook }}">
                            <span class="mdi mdi-facebook"></span>
                        </a>
                    </div>
                    <div class="g_nm w25 c   fs24">
                        <a href="{{ $business->instagram }}">
                            <span class="mdi mdi-instagram"></span>
                        </a>
                    </div>

                    <div class="g_nm w25 c  fs24">
                        <a href="tel:{{ $business->phone }}">
                            <span class="mdi mdi-phone"></span>
                        </a>
                    </div>
                    <div class="g_nm w25 c  fs24">
                        <a href='https://wa.me/{{ $business->whatsapp }}' target="_blank">
                            <span class="mdi mdi-whatsapp"></span>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Close Bottom Nav -->


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

        <script>
            var lang = @json($business -> lang);
            if (lang == "ar") {
                $('.main-carousel').flickity({
                    rightToLeft: true
                    , pageDots: false
                    , prevNextButtons: false
                    , autoPlay: false
                    , wrapAround: false
                    , draggable: true
                    , freeScroll: 3000
                    , contain: true,


                });
            } else {
                $('.main-carousel').flickity({
                    pageDots: false
                    , prevNextButtons: false
                    , autoPlay: false
                    , wrapAround: false
                    , draggable: true
                    , freeScroll: 3000
                    , contain: true,


                });
            }

        </script>
        <script>
            // tabs

            var tabLinks = document.querySelectorAll(".tablinks");
            var tabContent = document.querySelectorAll(".tabcontent");
            var garnish = document.querySelectorAll(".garnish");
            var garnishtab = document.querySelectorAll(".garnishTab");



            // document.body.addEventListener('click', function() {

            //     garnishtab.forEach(function(el) {
            //         el.classList.remove("active");
            //     });
            // });


            tabLinks.forEach(function(el) {


                el.addEventListener("click", openTabs);
            });


            // garnish.forEach(function(el) {
            //   el.addEventListener("click", openGarnish);
            //        });



            function openTabs(el) {
                var btnTarget = el.currentTarget;


                // var country = btnTarget.dataset.country;

                tabContent.forEach(function(el) {
                    el.classList.remove("active");
                });

                tabLinks.forEach(function(el) {
                    el.classList.remove("active");
                });
                // console.log();
                id = btnTarget.id

                var newid = "#" + id;

                document.getElementById("category" + id).classList.add('active');
                var dataIndex = $(newid).attr('data-index');

                var maincarousel = ".main-carousel";

                $(maincarousel).flickity('selectCell', parseInt(dataIndex));

                btnTarget.classList.add("active");
            }


            $('.garnish').click(function() {
                var id = "#garnish" + $(this).attr("id");

                if ($(id).hasClass('active')) {


                    $('.garnishTab').removeClass('active');
                } else {

                    $('.garnishTab').removeClass('active');
                    $(id).addClass('active');
                }
            });

            function openGarnish(el) {

                var btnTarget = el.currentTarget;
                // console.log(btnTarget);


                garnish.forEach(function(el) {
                    el.classList.remove("active");
                });

                garnishtab.forEach(function(el) {
                    el.classList.remove("active");
                });


                id = btnTarget.id

                dd = document.getElementById("garnish" + id).classList.add('active');
                // console.log(dd);

                btnTarget.classList.add("active");

                // var country = btnTarget.dataset.country

            }

        </script>
</body>

</html>