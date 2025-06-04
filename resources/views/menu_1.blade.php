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
      .contrastDIv{
        color: #000
      }
    
      @keyframes pulse {
        0% {
          transform: scale(1);
        }
        50% {
          transform: scale(1.4);
        }
        100% {
          transform: scale(1);
        }
      }
      .pulse {
        animation: pulse 0.5s 2; /* Adjust the duration as needed */
      }
      @if($business->color1)
        .sh10Color{
          -webkit-box-shadow: 0px 2px 5px {{$business->color1}};
          box-shadow: 0px 2px 5px {{$business->color1}};
        }
        .catTabs.active {
          /* background-color: {{$business->color1}}; */
          border:2px solid  {{$business->color1}};
          color: black;
        }
        .bgColor{
          background-color:{{$business->color1}};
        }
        .brdrColor{
          border:1px solid {{$business->color1}};
        }
        .menu .toggle {
          position: absolute;
          width: 65px;
          height: 65px;
          background: #f3f3f3;
          color: #262433;
          border-radius: 50%;
          display: flex;
          justify-content: center;
          align-items: center;
          font-size: 3em;
          cursor: pointer;
          transition: 0.5s;
        }
        .menu .toggle.active {
          transform: rotate(360deg);
          outline: 60px solid {{$business->color1}};;
          background: #fff;
          /* color: #000; */
        }
        .cColor{
          color: {{$business->color1}};
        }
      @else
        .cColor{
          color: #000;
        }
        .sh10Color{
          -webkit-box-shadow: 0px 5px 10px rgba(0,0,0,0.1);
          box-shadow: 0px 5px 10px rgba(0,0,0,0.1);
        }
        .catTabs.active {
          /* background-color: #f3f3f3; */
          border:2px solid  rgba(0,0,0,0.5);

          color: black;
        }
        .bgColor{
          background-color: #f3f3f3;
        }
        .brdrColor{
          border:1px solid #f3f3f3;
        }
        .menu .toggle {
          position: absolute;
          width: 65px;
          height: 65px;
          background: #f3f3f3;
          color: #262433;
          border-radius: 50%;
          display: flex;
          justify-content: center;
          align-items: center;
          font-size: 3em;
          cursor: pointer;
          transition: 0.5s;
        }
        .menu .toggle.active {
          transform: rotate(360deg);
          outline: 60px solid #f3f3f3;
          background: #fff;
          color: #000;
        }
      @endif
			.catDiv{
        scrollbar-width: none; 
				-ms-overflow-style: none; 
			}
			.catDiv::-webkit-scrollbar {
				display: none;
			}
			.catTabs {
        border:1px solid  transparent;

				min-width: 50px;
			}
			

			.catProductsBox {
				display: none;
			}
			.garnishTab {
				display: none;
			}
			/* .garnishTab.active {
				display: block;
			} */
			.round-bottomtop {
				border-bottom-left-radius: 1rem !important;
				border-bottom-right-radius: 1rem !important;
      }
      .game {
        bottom: -80px;
      }
      .main_btn_cl>.game_btn.active~div {
        /* bottom: calc(var(--i)* 77px); */
        transition: all calc(var(--i)* 0.5s);
      }
      .main_btn_cl>.game_btn.active~.div_1 {
        bottom: 80px;
      }
      .main_btn_cl>.game_btn.active~.div_2 {
        bottom: 160px;
      }
      .main_btn_cl>.game_btn.active~.div_3 {
        bottom: 240px;
      }
        
		  .game_img {
        box-shadow: 0px 0px 15px rgb(12, 168, 12);
      }
      .game_name {
        color: rgb(12, 168, 12);
      }
      .menu_btn {
        bottom: -15px;
        transition: all 0.5s;
      }
      .menu.active {
        bottom: 40px;
      }
      .menu {
        bottom: -8px;
        position: relative;
        width: 75px;
        height: 75px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: all 0.75s;
      }
     
      .menu li {
        position: absolute;
        left: -80px;
        /* top:20px; */
        list-style: none;
        transform: rotate(calc(360deg / 6 * var(--i))) translateX(40px);
        transform-origin: 115px 35px;
        visibility: hidden;
        opacity: 0;
        transition: calc(var(--i)* 0.2s);
        z-index: 10;
      }
      .menu.active li {
        visibility: visible;
        opacity: 1;
      }
      .menu li a {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 25px;
        height: 25px;
        font-size: 36px;
        color: #262433;
        transform: rotate(calc(360deg / -6 * var(--i)));
        border-radius: 50%;
      }
      .toast{
        position: fixed;
        top: 25px;
        right: 30px;
        min-width: 320px;
        border-radius: 12px;
        background: #fff;
        padding: 20px 35px 20px 25px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        border-left: 6px solid #e67c13;
        overflow: hidden;
        transform: translateX(calc(100% + 30px));
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.35);
      }

      .toast.active{
        transform: translateX(0%);
      }

      .toast .toast-content{
        display: flex;
          align-items: center;
      }

      .toast-content .check{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 35px;
        width: 35px;
        background-color: #e67c13;
        color: #fff;
        font-size: 20px;
        border-radius: 50%;
      }

      .toast-content .message{
        display: flex;
        flex-direction: column;
        margin: 0 20px;
      }

      .message .text{
        font-size: 20px;
        font-weight: 400;;
        color: #666666;
      }

      .message .text.text-1{
        font-weight: 600;
        color: #333;
      }

      .toast .close{
        position: fixed;
        top: 10px;
        right: 15px;
        padding: 5px;
        cursor: pointer;
        opacity: 0.7;
      }

      .toast .close:hover{
        opacity: 1;
      }

      .toast .progress{
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        width: 100%;
        background: #ddd;
      }

      .toast .progress:before{
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        height: 100%;
        width: 100%;
        background-color: #e67c13;
      }

      .progress.active:before{
        animation: progress 5s linear forwards;
      }

      @keyframes progress {
        100%{ right: 100%;}
      }
      
	  </style>
</head>
<body class="bgb5 c">
	<div class="pb20 bgb5 sh20 brdr g_nm w100" style="max-width: 450px; min-height:100vh">
		<header class="bgColor2 bgw brdrColor round-bottomtop sh10">
			<div class="w100 sq15 m_sq30 m_m_sq40 cov"
				style="background-image: url('http://www.qr.algorexe.com/images/{{ $business->cover }}');"> </div>
			<div>
				<tbl_nm class="p10 @if ($business->lang == 'ar') r rtl @else l @endif">
					<cl class=" w30 m_w40 m_m_w33 vt">
						<div class="ov round100 w100 sq100 bgb10 sh10 ba p5" style="top:-40px;background-color: {{$business->color1}}; ">
							<div class="cc cov  w90 sq90 round100" style="background-image: url('http://www.qr.algorexe.com/images/{{ $business->image }}');"></div>
						</div>
					</cl>
						<cl class="w66 @if ($business->lang == 'ar') r rtl @else l @endif pb50 m_pb20 m_m_pb0 ph20 vt">
							<div style="min-height: 100px; ">
								<div class="fs32 md_fs22 m_fs18 b">{{ $business->name }}</div>
									@if ($business->slogan)
										<div class="mt5 m_mt0 cb60">{{ $business->slogan }} </div>
									@endif
									<div class="mt5 m_mt0 cb60"><span class="mdi mdi-map-marker fs18 cb"></span>{{ $business->address }}</div>
								</div>
							</cl>
					</tbl_nm>
			</div>
		</header>
		<!-- Close header -->
		<!-- Categories -->
		<div class="mt20 ph20 m_ph10">
			<div class="fs0 ph10 oxa fs0 oh nw catDiv" style="max-width: 100%; ">
				@foreach ($categories as $category)
					@if (count($category->products) > 0)
						<div class="p5 g_nm">
							<div class="pv5 ph25 fs14 pointer round3x sh5 cb60 catTabs bgw @if ($loop->first) cat1Tab @endif" id="{{ $category->id }}"   @endphp>{{ $category->name }}</div>
						</div>
					@endif
				@endforeach
			</div>
			@foreach ($categories as $category)
				<div class="fs0 @if ($business->lang == 'ar') r rtl @else l @endif c catProductsBox" id="category-{{ $category->id }}">
					@foreach ($category->products as $product)
						<div class="g_nm  w100 p10 round4x ">
							<div class="bh10 bgw sh10Color round4x ">
								<div class="w100 p10  fs14">
									<tbl_nm>
										<cl class="w30 ">
											{{-- <div class="cov pointer w100 sq100 round2x pro_image" data-src="{{ $product->image }}" style="background-image: url('http://www.qr.algorexe.com/images/{{ $product->image }}');"></div> --}}
										</cl>
										<cl class="w70 @if ($business->lang == 'ar') r pr10 @else l pl10 @endif">
											<div class="pointer ov ba round100 p15 @if ($business->lang == 'ar') ra @else l la @endif" id="addToCart-{{$product->id}}" style="z-index: 100" onclick="add_product_to_cart('{{ $product->id }}' , '{{addslashes( $product->name) }}' )">
												<span class="mdi mdi-cart-variant fs20 cc"></span>
											</div>
											<div class="b ">{{ $product->name }}</div>
											<div class="fs9 cb70 mt10" style="min-height:40px;">{!! $product->recipe !!}</div>
											<div class="fs0 mt10 ">
												<div class="g_nm w60 b fs14 ">
													{{-- @if ($business->rate_option)
														{{ (int) (((float) $product->price * (float) $business->rate) / 1000) * 1000 }}
													@else
														{{ $product->price }} {{ $business->currency }}
													@endif --}}
                          @if($business->rate_option)
                            {{(int)((float)($product->price )*(float)( $business->rate)/1000)*1000}} LL
                          @else
	                          @if($business->currency == "LL")
		                          @php $formattedNumber = number_format((float)$product->price, 0, '.', ','); @endphp
                            @else
                              @php $formattedNumber = number_format((float)$product->price, 2, '.', ',');@endphp
                            @endif
                            {{ $formattedNumber }} {{ $business->currency }}
                          @endif
												</div>
												@if ($product->garnishes->isNotEmpty())
													<div class="ov @if ($business->lang == 'ar') ra @else la @endif">
														<div class=" fs12 b g_nm round4x pointer ph10 pv5 bgb10 garnishBtn" id="{{ $product->id }}">
															@if ($business->lang == 'ar')
																<span class="">إضافات</span><span class="l mdi mdi-arrow-down"></span>
															@else
																<span class="">Garnish</span><span class="r mdi mdi-arrow-down"></span>
															@endif
														</div>
													</div>
												@endif
											</div>
										</cl>
									</tbl_nm>
									<div class="brdr mt10 round2x pb5 ph20 garnishTab" id="garnish-{{ $product->id }}">
										@if ($product->garnishes->isNotEmpty())
											@foreach ($product->garnishes as $garnish)
												<div class="l fs0 mt5" style="border-bottom: 1px;">
													<div class="fs14 b g_nm w50 @if ($business->lang == 'ar') r @else l @endif">{{ $garnish->name }}</div>
													<div class="fs14 b g_nm w50 @if ($business->lang == 'ar') l @else r @endif">
														@if ($business->rate_option)
															{{ (int) (($garnish->price * $business->rate) / 1000) * 1000 }}
														@else
															{{ $garnish->price }} {{ $business->currency }}
														@endif
													</div>
												</div>
											@endforeach
										@endif
									</div>
								</div>
							</div>
						</div>
						<!--  Close product -->
					@endforeach
          <div class="pb40 mt15 fs13">
            <span>Powered by<a href="https://qr.algorexe.com/" class="b u cColor"> Algorexe</a></span>
          </div>
				</div>
			@endforeach
			<div style="height: 50px;"></div>
		</div>

		<!-- Close Categories -->
    </div>
    <!-- Bottom Nav -->
    <div class="pf ov ta c menu_btn " style="z-index: 100000; ">
        <div class="g_nm w100" style="max-width: 450px">
            <tbl_nm>
                <cl class="l pl10 w20 main_btn_cl vd pb5">
                    <div class="round100 game_btn g_nm p30 contrastDIv bgColor" style="">
                        <span class="mdi mdi-gamepad-variant cc pointer fs40"></span>
                    </div>
                    <div class="ov ta game div_1" style="--i:1;">
                        <form action="{{ route('qrexe_game') }}" method="post">
                            @csrf
                            <input type="hidden" name="game_id" value="1">
                            <button type="submit" class="fs0 l bgw brdrColor round2x ml5 sh10 pv4 pl4" style="min-width: 300px; bsackground:transparent;">
                                <div class="round100 game_imgx cov g_nm vm p30" style="background-image: url('http://www.qr.algorexe.com/images/website_images/cube_ninja.png');"></div>
                                <div class="g_nm game_name vm fs14 b ph4">QREXE CUBE NINJA</div>
                            </button>
                        </form>
                    </div>
                    <div class="ov ta game div_2" style="--i:2;">
                        <form action="{{ route('qrexe_game') }}" method="post">
                            @csrf
                            <input type="hidden" name="game_id" value="2">
                            <button type="submit" class="fs0 l bgw brdrColor round2x ml5 sh10 pv4 pl4" style="min-width: 300px; bsackground:transparent;">
                                <div class="round100 game_imgx cov g_nm vm p30" style="background-image: url('http://www.qr.algorexe.com/images/website_images/memory.png');"></div>
                                <div class="g_nm game_name vm fs14 b ph4">QREXE MEMORY</div>
                            </button>
                        </form>
                    </div>
                    <div class="ov ta game div_3" style="--i:3;">
                        <form action="{{ route('qrexe_game') }}" method="post">
                            @csrf
                            <input type="hidden" name="game_id" value="3">
                            <button type="submit" class="fs0 l bgw brdrColor round2x ml5 sh10 pv4 pl4" style="min-width: 300px; bsackground:transparent;">
                                <div class="round100 game_imgx cov g_nm vm p30" style="background-image: url('http://www.qr.algorexe.com/images/website_images/floopy.png');"></div>
                                <div class="g_nm game_name vm fs14 b ph4">QREXE Floopy Bird</div>
                            </button>
                        </form>
                    </div>
                </cl>
                <cl class="w60  vd pb5 " style="display: inline-block;">
                    <ul class="menu" style="display: inline-block; padding:0px ;">
                        <div class="toggle brdrColor sh30" style="border-width:2px">
                          
                           <img src="http://www.qr.algorexe.com/images/website_images/menu_btn.png" width="65" />  
                        </div>
                        @php $counter =0 @endphp
                        @if (isset($business->whatsapp))
                            <li style="--i:@php echo($counter); $counter++; @endphp">
                                <a href="https://wa.me/{{ $business->whatsapp }}"><span class="mdi mdi-whatsapp" style="color: green"></span></a>
                                </li>
                        @endif
                        @if (isset($business->phone))
                            <li style="--i:@php echo($counter); $counter++; @endphp">
                                <a href="tel:{{ $business->phone }}"><span class="mdi mdi-phone" style="color:rgb(63, 141, 0) "></span></a>
                            </li>
                        @endif
                        @if (isset($business->instagram))
                            <li style="--i:@php echo($counter); $counter++; @endphp">
                                <a href="{{ $business->instagram }}"><span class="mdi mdi-instagram" style="color: #FA4031"></span></a>
                            </li>
                        @endif
                        @if (isset($business->facebook))
                            <li style="--i:@php echo($counter); $counter++; @endphp">
                                <a href="{{ $business->facebook }}"><span class="mdi mdi-facebook" style="color: #1A86EE "></span></a>
                            </li>
                        @endif
                        @if (isset($business->twitter))
                            <li style="--i:@php echo($counter); $counter++; @endphp">
                                <a href="{{ $business->twitter }}"><span class="mdi mdi-twitter" style="color: #209BF0 "></span></a>
                            </li>
                        @endif
                        @if (isset($business->tiktok))
                            <li style="--i:@php echo($counter); $counter++; @endphp">
                                <a href="{{ $business->tiktok }}"><img src="http://www.qr.algorexe.com/images/website_images/tiktok.png" width="33" /></a>
                            </li>
                        @endif
                    </ul>
                </cl>
                <cl class="c w20 vd pb5">
                    <div class="round100 pointer g_nm p30 sh20 mb2 contrastDIv  bgColor" onclick="show_cart()">
                        <span class="mdi mdi-cart-variant cc mt4 pointer fs30" ></span>
                        <div class="ov ba cart_counter c fs18 b">0</div>
                    </div>
                </cl>
            </tbl_nm>
        </div>
    </div>
	<div class="pf ov c cart_div h" style="z-index:10000000">
		<div class="g_nm w100 hv100" style="max-width: 450px;  backdrop-filter: blur(1px);">
			<div class="ov15 hv100 bgw80 sh20 oya round3x p10">
				<div class="bgb80 round100 cw pointer ov5 p15 ba la" onclick="close_cart()">
					<span class="cc mdi mdi-close fs20"></span>
				</div>
				<div class="cart_content mt40 mb40 "></div>
				<div class="c mt25 ">
					<button class="sbtn success" onclick="send_order()">إرسال الطلب</button>
				</div>
			</div>
		</div>
		{{-- <div class="ov20 bgw70 brdr"></div> --}}
	</div>
  <div class="pf ov w100 c prv_image_div h" style="z-index:10000000; ">
    <div class="mt20 cc  bgb30 c w100 ph10 round2x pv40" style="max-width:440px;">
      <div class="bgb80 round100 cw pointer ov5 p15 ba la" onclick="close_prv_image_div()">
        <span class="cc mdi mdi-close fs20"></span>
      </div>
      <img src="" id="prv_image" class="w100" alt="">
    </div>
  </div>
	<div class="toast" style="z-index: 999999999">
    <div class="toast-content">
			<i class="mdi mdi-information-variant check"></i>
        <div class="message">
          <span class="text text-1">تنبيه</span>
          <span class="text text-2">الرجاء أختيار الطلبات</span>
        </div>
      </div>
      <i class="mdi mdi-close close">X</i>
      <div class="progress"></div>
    </div>
    <!-- Close Bottom Nav -->


    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
		var lang = @json($business->lang);
		var business = @json($business);
		var local_cart=[];
		var cart_count=0;
   
    function getBrightness(rgbColor) {
      var rgbValues = rgbColor.substring(4, rgbColor.length - 1).replace(/ /g, '').split(',');
      var R = parseInt(rgbValues[0]);
      var G = parseInt(rgbValues[1]);
      var B = parseInt(rgbValues[2]);

      // Calculating luminance
      var luminance = (0.299 * R + 0.587 * G + 0.114 * B) / 255;

      // Set threshold value
      var threshold = 0.5; // You can adjust this value as needed

      // Check if color is light or dark based on threshold
      return luminance > threshold;
    }
    function setTextContrast() {
      const divs = document.querySelectorAll('.contrastDIv');
      divs.forEach(div => {
        const bgColor = window.getComputedStyle(div).backgroundColor;
        const brightness = getBrightness(bgColor);
        console.log(brightness)
        if (brightness) {
            div.style.color = '#000'; // black text for light backgrounds
        } else {
            div.style.color = '#fff'; // white text for dark backgrounds
        }
      });
    }





    $('.catTabs').click(function() {
      if(!$(this).hasClass('active')){
        $('.catTabs').removeClass('active')
        $('.catProductsBox').slideUp();
        var id = $(this).attr('id');
        var selectedCatId='#category-'+id;
        setTimeout(function(){
          $(selectedCatId).slideDown();
        },500)
        $(this).addClass('active')
      }
    })
    $('.garnishBtn').click(function() {
      if($(this).hasClass('active')){
        $(this).removeClass('active');
        $('.garnishTab').slideUp();
      }
      else{
        $('.garnishBtn').removeClass('active');
        $(this).addClass('active');
        var id = $(this).attr('id');
        var selectedGarnishId='#garnish-'+id;
        $('.garnishTab').slideUp();
        setTimeout(function(){
          $(selectedGarnishId).slideDown();
        },250)
      }
    })
    // $('.garnish').click(function() {
		// 		var id = "#garnish" + $(this).attr("id");
		// 		if ($(id).hasClass('active')) {
		// 				$('.garnishTab').removeClass('active');
		// 		} else {
		// 				$('.garnishTab').removeClass('active');
		// 				$(id).addClass('active');
		// 		}
		// });

    $('.pro_image').click(function() {
      $('.prv_image_div').removeClass('h');
      var src=$(this).attr('data-src');
      src="http://www.qr.algorexe.com/images/"+src;
      $("#prv_image").attr('src', src);
      $('body').addClass('oh');
		})	

		$('.game_btn').click(function() {
			$('.game_btn').toggleClass('active')
		})
		// var garnish = document.querySelectorAll(".garnish");
		// var garnishtab = document.querySelectorAll(".garnishTab");
		$( document ).ready(function() {
      setTextContrast();
      $(".cat1Tab").click(); 
			var cookieString = document.cookie;
			var is_c_cart =cookieString.includes("c_cart=")
			if (is_c_cart) {
				var cookieValue = document.cookie
			.split('; ')
			.find(row => row.startsWith("c_cart" + '='))
			.split('=')[1];
				var decodedValue = decodeURIComponent(cookieValue);
				if(decodedValue.length>0){
					local_cart = JSON.parse(decodedValue);
					cart_count=0;
					local_cart.map((item) => {
						cart_count+=item.count
					});
				}
				$('.cart_counter').html(cart_count)
			}
			else{
				$('.cart_counter').html(0)
			}
		});
		



		

    function close_prv_image_div(){
      $('.prv_image_div').addClass('h');
      $('body').removeClass('oh');
    }

		function add_product_to_cart(item_id, item_name){
      var cartBtn= "#addToCart-"+item_id;
      $(cartBtn).addClass('pulse');
      setTimeout(function(){
        $(cartBtn).removeClass('pulse');
      },2000)
			var x= local_cart.findIndex((element) => element.id == item_id);
			if(x != -1){
				local_cart[x].count++;
			}
			else{
				var item={
					id:item_id,
					name:item_name,
					count:1
				}
				local_cart.push(item);
			}
			var expiryDate = new Date(Date.now() + 25 * 60 * 60 ); // 2 hours from now
			document.cookie = 'c_cart=' + encodeURIComponent(JSON.stringify(local_cart)) + '; expires=' + expiryDate.toUTCString() + '; path=/';
			cart_count =0;
			local_cart.map((item) => {
				cart_count+=item.count
			});
			$('.cart_counter').html(cart_count)
		}
		function show_cart(){
			var html="";
			if(local_cart.length!=0){
				local_cart.map((item) => {
					html+=`
						<div class="bgw brdr round2x mt10 p5">
							<div class="">`+item.name+`</div>
							<div class="mt5">
								<tbl_nm class="fs24">
									<cl class="vm"></cl>
									<cl class="vm colSep"><span class="mdi mdi-plus" onclick="add_item(`+item.id+`)"></span></cl>
									<cl class="vm"><div id="item_cart_`+item.id+`">`+item.count+`</div></cl>
									<cl class="vm colSep"></cl>
									<cl class="vm colSep"><span class="mdi mdi-minus" onclick="sub_item(`+item.id+`)"></span></cl>
								</tbl_nm>
                <div class="mt10">
                  <p class="r rtl fs18 b">ملاحظات:</p>  
                  <input style="border:1px solid black; border-raduis:0.5rem; width:100%; padding:5px 10px;" id="note_`+item.id+`"/>
                </div>
							</div>
						</div>
					`
				});
				$('.cart_div').removeClass('h')
				$('.cart_content').html(html)
			}
			else{
				toast = document.querySelector(".toast")
				console.log(toast)
				closeIcon = document.querySelector(".close"),
				progress = document.querySelector(".progress");
				let timer1, timer2;
				toast.classList.add("active");
				progress.classList.add("active");
				timer1 = setTimeout(() => {
					toast.classList.remove("active");
				}, 5000); //1s = 1000 milliseconds
				timer2 = setTimeout(() => {
					progress.classList.remove("active");
				}, 5300);
				closeIcon.addEventListener("click", () => {
					toast.classList.remove("active");
					setTimeout(() => {
						progress.classList.remove("active");
					}, 300);
					clearTimeout(timer1);
					clearTimeout(timer2);
				});
			}
		}
		function sub_item(item_id){
			var x= local_cart.findIndex((element) => element.id == item_id);
			if(x != -1){
				if(local_cart[x].count <=1){
					local_cart.splice(x, 1)
					show_cart();
				}
				else{
					var item_count_id="#item_cart_"+item_id
					local_cart[x].count--;
					$(item_count_id).html(local_cart[x].count);
					cart_count =0;
					local_cart.map((item) => {
						cart_count+=item.count
					});
					$('.cart_counter').html(cart_count)
				}
				var expiryDate = new Date(Date.now() + 25 * 60 * 60 ); // 2 hours from now
				document.cookie = 'c_cart=' + encodeURIComponent(JSON.stringify(local_cart)) + '; expires=' + expiryDate.toUTCString() + '; path=/';
			}
		}
		function add_item(item_id){
			var x= local_cart.findIndex((element) => element.id == item_id);
			if(x != -1){
				local_cart[x].count++;
				cart_count =0;
				local_cart.map((item) => {
					cart_count+=item.count
				});
				var expiryDate = new Date(Date.now() + 25 * 60 * 60 ); // 2 hours from now
				document.cookie = 'c_cart=' + encodeURIComponent(JSON.stringify(local_cart)) + '; expires=' + expiryDate.toUTCString() + '; path=/';
				var item_count_id="#item_cart_"+item_id
				$(item_count_id).html(local_cart[x].count);
				$('.cart_counter').html(cart_count)
			}
		}
		function close_cart(){
			$('.cart_div').addClass('h')
		}
		function send_order(){
			if(local_cart.length!=0){
				var order_text=""
				order_text+="*مرحباً "+business['name']+"* 😎";
				order_text+="\n \n";
				order_text+=":لو سمحت أريد الطلب التالي"
				order_text+="😋";
				order_text+="\n \n";
        
				local_cart.map((item) => {
          order_text+=item.count + "  "+ item.name 
  				order_text+="\n";
          var x= "#note_"+item.id
          var inputValue = $(x).val();
          if (inputValue !== null && inputValue !== undefined && inputValue.trim() !== "") {
 				    order_text+="*"+$(x).val()+"*";
  				  order_text+="\n";
          }
  				order_text+="\n";
				});
				
        order_text+="📍 *المنطقة:*";
				order_text+="\n";
				order_text+="\n";
				order_text+="🛣️ *الشارع:*";
				order_text+="\n";
				order_text+="\n";
				order_text+="🏠 *بناية:*";
				order_text+="\n";
				order_text+="\n";
				order_text+="🏠 *الطابق:*";
				order_text+="\n";
				order_text+="\n";
				order_text+="*الاسم:*";
				order_text+="\n";
				order_text+="\n";
				order_text+="🔴*ملاحظات:*";
				order_text+="\n";
			}
			var phoneNumber = "96170579786"
			var whatsappLink = 'https://api.whatsapp.com/send?phone=' + encodeURIComponent(phoneNumber) + '&text=' + encodeURIComponent(order_text);
			// Open WhatsApp in a new tab with the pre-filled message
			window.open(whatsappLink, '_blank');
			// local_cart=[];
			// document.cookie = 'c_cart=' + encodeURIComponent(JSON.stringify(local_cart)) + '; expires=' + expiryDate.toUTCString() + '; path=/';
		}
    </script>
    <script>
        let menuToggle = document.querySelector('.toggle');
        let menu = document.querySelector('.menu');
        menuToggle.onclick = function() {
            menu.classList.toggle('active')
            menuToggle.classList.toggle('active')

        }

        const list = document.querySelectorAll('li');

        function activeLink() {
            list.forEach((item) =>
                item.classList.remove('active'));
            this.classList.add('active');

        }
        list.forEach((item) =>
            item.addEventListener('click', activeLink))
    </script>
</body>

</html>
