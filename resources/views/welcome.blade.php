<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Algorexe</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/mdi.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/flickity-docs.css') }}">
    {{-- <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css"> --}}

    <meta name="title" content="Qr Algorexe">
    <meta name="description" content="QR code menu for resturant and coffe shop and sweet shop">
    <meta name="keywords"
        content="menu, coffe, food, fast food, sweet, patisray,qrcode menu,digital menu,قائمة إلكترونية,مطعم,قائمة طعام">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9KGS58N6PE"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-9KGS58N6PE');
    </script>
    <style>
        .background_color{
    	    background-color: #252234;
	}
	.grad {
	    background-image: linear-gradient(180deg, #8883D8 ,#6480C3 ,#1FACD6 );
	}
	.grads1 {
	    background-image: linear-gradient(180deg, #9689D3 ,#4B456A );
	}
	.grads2 {
	    background-image: linear-gradient(180deg, #5C7D9A ,#252234 );
	}
	.op40{
	    opacity: 0.4;
	}
	.op80{
	    opacity: 0.8;
	}
	.ptcolor{
	    
	    color:#D0C6FF;
	}
	.bgpcolor{
	    background-color: #D0C6FF;
	}
	.texts{
	    text-shadow: 2px 2px 5px #2C96C3;
	}
	.round5x {
	    border-radius: 2rem!important;
	}
	.roundcx {
	    border-radius: 0rem 2rem 2rem 2rem!important;
	}
	.roundcx1 {
	    border-radius: 0rem 2rem 100rem 2rem!important;
	}
	
	.mtpa{
	    padding-top: 150px;
	}
	
        .pulse {
            animation: pulse-animation 2s infinite;
        }
        @keyframes pulse-animation {
            0% {
                box-shadow: 0 0 0 0px #D0C6FF;
            }

            100% {
                box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
            }
        }
        
        
        
        

        .socailcolor {
            color: gray;
        }

        .login-btn {
            color: black;
        }

        .login-btn:hover {
            color: #cdaa4a;
        }

        @media all and (max-width:768px) {
            .socailcolor {
                color: #cdaa4a;
            }

            .login-btn {
                color: white;
            }

            .color-image {
                display: block !important;
            }
        }

        .c-gold {
            color: #cdaa4a;
        }

        .red-line {
            height: 1px;
            background-color: #cdaa4a;
            top: 25px;
            width: 80px;
            left: 10px;
            box-shadow: 0 0 2px 2px white;
            animation-name: example;
            animation-duration: 5s;
            animation-delay: 1s;
            animation-iteration-count: infinite;
        }

        @keyframes example {
            0% {
                top: 25px;
            }

            100% {
                top: 100px;
            }
        }

        .qr_code {
            animation-name: hide;
            animation-duration: 10s;
            animation-delay: 1s;
            animation-iteration-count: infinite;
        }

        @keyframes hide {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 1;
            }

            51% {
                opacity: 0;
            }

            100% {
                opacity: 0;
            }
        }

        .menu_list {
            opacity: 0;
            animation-name: show;
            animation-duration: 10s;
            animation-delay: 1s;
            animation-iteration-count: infinite;
        }

        @keyframes show {
            0% {
                opacity: 0;
            }

            50% {
                opacity: 0;
            }

            51% {
                opacity: 1;
            }

            100% {
                opacity: 1;
            }
        }

        .color-image {
            display: none;
        }

        .black-image:hover~.color-image {
            display: block;
        }

        .color-image:hover {
            display: block;
        }
    </style>
</head>

<body class="background_color" style="font-family: Arial Rounded MT Bold;font-weight: 100;">
<!-- Header -->
<div>
<div class="ov cov" style="transform: rotate(180deg);background-image: url('{{ asset('images/website_images/hosting-bg.svg') }}');"></div>

    <div class="flexi">
    
        <tbl_nm class="pv20">
            <cl class="l">
                <div class="g_nm vm">
                    <img  src="{{ asset('images/website_images/logo.png') }}" alt="">
                </div>
                <div class="pl10 g_nm vm">
                    <h2 class="cw fs26">QREXE</h2>
                </div>
                
            </cl>
            <cl class="r">
                <div class="g_nm ">
                	@if(!auth()->user())
                            <a href="{{ route('login') }}" class="login-btn fs16">
                            	<button class=" grad cw fs16 b ph30 pv10 round5x " style="border:0px;">Login<span class="pl10 mdi mdi-login"></span></button>
 			    </a>
                        @else
                        <a  class="login-btn fs16" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <button class=" grad cw fs16 b ph30 pv10 round5x " style="border:0px;">Logout <span class="pl10 mdi mdi-logout"></span></button>
                            
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class=" vm">
                                @csrf
                        </form>
                        @endif
                    
                </div>
            </cl>
        </tbl_nm>
        <tbl class=" pv70">
            <cl class="w50 h m_sb">
                <div class="ra w20 sq20 round100 grad ov ta op80" style="bottom: 30px;"></div> 
                <div class="ra w80 sq80 round100 grad cc op40"></div> 
                <div class="ra w30 sq30 round100 grad ov ba la op80" style="right:0;"></div> 
                <img class="w100 m_m_w80" src="{{ asset('images/website_images/image_header.png') }}" alt="">
            </cl>
            <cl class="w50 l">
                <h1 class="fs60 m_m_fs40 texts  cw" style="font-weight:bolder">
                    Digitize Your 
                    </br>
                    Restaurant With
                    </br>
                    <span class="ptcolor">QREXE Menu</span> 
                </h1>
                <p class="mt60 cw70 fs18 m_m_fs14" >
                    We offer built-in QR setup with our design tools. 
                    </br>
                    Take customers from your menus, flyers, business cards, stickers, and more straight to your website.
                </p>
                <div class="mt50">
                    <div class="g_nm m_m_w100 vt p5">
                        <button class=" grad cw fs16 b ph40 pv10 round5x " style="border:0px;">CONTACT US</button>
                    </div>
                    

                        
                        
                        
                    <div class="g_nm vt p5 pulse round100 ml20 m_m_mt20">
	                <a href="https://wa.me/+96170579786?text=Hello,%20QR%20Algorexe" target="_blank">
	                        <div class="round100 grad" style="height: 40px;width:40px;">
	                            <span class="mdi mdi-whatsapp cc cw fs26"></span>
	                        </div>
                        </a>
                    </div>
                    
                    <div class="g_nm vt p5 pulse round100 ml20 m_m_mt20">
	                    <a href="tel: +96170579786">
	                        <div class="round100 grad" style="height: 40px;width:40px;" target="_blank">
	                            <span class="mdi mdi-phone-outline cc cw fs26"></span>
	                        </div>
	                    </a>
                    </div>
                    <div class="g_nm vt p5 pulse round100 ml20 m_m_mt20">
                    	<a class="" href="mailto: qr@algorexe.com">
	                        <div class="round100 grad" style="height: 40px;width:40px;" target="_blank">
	                            <span class="mdi mdi-email-outline cc cw fs26"></span>
	                        </div>
                        </a>
                    </div>

                </div>
                
            </cl>
            <cl class="w50 m_h">
                <div class="ra w20 sq20 round100 grad ov ta op80" style="bottom: 30px;"></div> 
                <div class="ra w80 sq80 round100 grad cc op40"></div> 
                <div class="ra w30 sq30 round100 grad ov ba la op80" style="right:0;"></div> 
                <img class="w100" src="{{ asset('images/website_images/image_header.png') }}" alt="">
            </cl>
        </tbl>
    </div>
    </div>
    <!-- Close Header -->
    <!-- S1 -->
    <div class="flexi pv50">
        <tbl class="mt30">
            <cl class="w33 vt">
                <div class="w100 cw">
                    <div class="pv30 pl30">
                        <div class="ov grad round100" style="width: 90px;height:90px;"></div>
                        <div class="grads1 roundcx w75 pv10 l fs22 m_m_fs16 pl20">Custom URL</div>
                    </div>
                    <p class="ph30 l fs16 m_m_fs12">
                        Add your restaurant name onto a custom URL, like www.qr.algorexe.com/menu/YourName
                    </p>
                </div>
            </cl>
            <cl class="w33 vt m_m_mt30">
                <div class="w100 cw">
                    <div class="pv30 pl30">
                        <div class="ov grad round100" style="width: 90px;height:90px;"></div>
                        <div class="grads1 roundcx w75 pv10 l fs22 m_m_fs16 pl20">SEO Ready</div>
                    </div>
                    <p class="ph30 l fs16 m_m_fs12">
                        Get ranked in Google search with built-in best practices.
                    </p>
                </div>
            </cl>
            <cl class="w33 vt m_m_mt30">
                <div class="w100 cw">
                    <div class="pv30 pl30">
                        <div class="ov grad round100" style="width: 90px;height:90px;"></div>
                        <div class="grads1 roundcx w75 pv10 l fs22 m_m_fs16 pl20">Google My Business</div>
                    </div>
                    <p class="ph30 l fs16 m_m_fs12">
                        Add your website link to your Google My Business listing.
                    </p>
                </div>
            </cl>
        </tbl>

    </div>
    <!-- Close S1 -->
    <!-- S2 -->
    <div class="flexi pv100">
        <h2 class="fs50 m_m_fs40 texts  cw" style="font-weight:bolder">
            Why <span class="ptcolor">QREXE </span> Menu
        </h2>

        <tbl class="cw pv50 mt20">
            <cl class="w50 vt">
                <!-- p1 -->
                <tbl_nm class="l">
                    <cl class="fs70 vt ptcolor" style="width:130px;">
                        01.
                    </cl>
                    <cl class="wa pr20 vt">
                        <div class="g_nm vm">
                            <div class="round100 grad" style="width: 90px; height:90px;">
                                <span class="mdi mdi-cash-multiple fs50 cc"></span>
                            </div>
                        </div>
                        <div class="g_nm vm pl20 fs28 m_m_fs18 m_m_mt10 m_m_pl0">Save Money</div>

                        <div class="fs20 m_m_fs14 mt30">
                            <p>
                                Save effort and go smart with ALGOREXE which provides you updated prices for your services and goods that can be accessed with one touch in an Eco-friendly way.
                            </p>
                        </div>
                    </cl>
                </tbl_nm>
                <!-- end p1 -->
                <!-- p2 -->
                <tbl_nm class="l mt100">
                    <cl class="fs70 vt ptcolor" style="width:130px;">
                        02.
                    </cl>
                    <cl class="wa pr20 vt">
                        <div class="g_nm vm">
                            <div class="round100 grad" style="width: 90px; height:90px;">
                                <span class="mdi mdi-clipboard-text-multiple-outline fs50 cc"></span>
                            </div>
                        </div>
                        <div class="g_nm vm pl20 fs28 m_m_fs18 m_m_mt10 m_m_pl0">Full Informations</div>

                        <div class="fs20 mt30 m_m_fs14">
                            <p>
                                Since smartphones are part of our lives
we made sure to use it in the right way, 
by scanning the QR code on your 
device for fully detailed information.
                            </p>
                        </div>
                    </cl>
                </tbl_nm>
                <!-- end p2 -->
                <!-- p3 -->
                <tbl_nm class="l mt100">
                    <cl class="fs70 vt ptcolor" style="width:130px;">
                        03.
                    </cl>
                    <cl class="wa pr20 vt">
                        <div class="g_nm vm">
                            <div class="round100 grad" style="width: 90px; height:90px;">
                                <span class="mdi mdi-star-check fs50 cc"></span>
                            </div>
                        </div>
                        <div class="g_nm vm pl20 fs28 m_m_fs18 m_m_mt10 m_m_pl0">New Technology</div>

                        <div class="fs20 mt30 m_m_fs14">
                            <p>
                                QREXE is a new technology technique
that saves sanitizing your hands every
time you want to check an item or 
goods! unlike menus.
                            </p>
                        </div>
                    </cl>
                </tbl_nm>
                <!-- end p3 -->
            </cl>
            <cl class="w50">
                <!-- p4 -->
                <tbl_nm class="l mtpa">
                    <cl class="fs70 vt ptcolor" style="width:130px;">
                        04.
                    </cl>
                    <cl class="wa pr20 vt">
                        <div class="g_nm vm">
                            <div class="round100 grad" style="width: 90px; height:90px;">
                                <span class="mdi mdi-human-handsup fs50 cc"></span>
                            </div>
                        </div>
                        <div class="g_nm vm pl20 fs28 m_m_fs18 m_m_mt10 m_m_pl0">Easy to Use </div>

                        <div class="fs20 mt30 m_m_fs14">
                            <p>
                                To get the price details on desired items
 or goods all what you have to do is scan 
your QR code on your device which will 
give you a full scan of prices and 
items directly.
                            </p>
                        </div>
                    </cl>
                </tbl_nm>
                <!-- end p4 -->
                <!-- p5 -->
                <tbl_nm class="l mt100">
                    <cl class="fs70 vt ptcolor" style="width:130px;">
                        05.
                    </cl>
                    <cl class="wa pr20 vt">
                        <div class="g_nm vm">
                            <div class="round100 grad" style="width: 90px; height:90px;">
                                <span class="mdi mdi-page-next-outline fs50 cc"></span>
                            </div>
                        </div>
                        <div class="g_nm vm pl20 fs28 m_m_fs18 m_m_mt10 m_m_pl0">More Details</div>

                        <div class="fs20 mt30 m_m_fs14">
                            <p>
                                After scanning the QR Code you will get 
detailed information about each item 
and its ingredient without having to ask 
any further information.
                            </p>
                        </div>
                    </cl>
                </tbl_nm>
                <!-- end p5 -->
                <!-- p6 -->
                <tbl_nm class="l mt100">
                    <cl class="fs70 vt ptcolor" style="width:130px;">
                        06.
                    </cl>
                    <cl class="wa pr20 vt">
                        <div class="g_nm vm">
                            <div class="round100 grad" style="width: 90px; height:90px;">
                                <span class="mdi mdi-data-matrix-scan fs50 cc"></span>
                            </div>
                        </div>
                        <div class="g_nm vm pl20 fs28 m_m_fs18 m_m_mt10 m_m_pl0">Easy access</div>

                        <div class="fs20 mt30 m_m_fs14">
                            <p>
                                QREXE is a new technology technique
that saves sanitizing your hands every
time you want to check an item or 
goods! unlike menus.
                            </p>
                        </div>
                    </cl>
                </tbl_nm>
                <!-- end p6 -->
            </cl>
        </tbl>
    </div>
    <!--Close S2 -->
    
    
    
    <!-- S4 -->
    <div class="flexi">
        <tbl>
            <cl class="w50 l">
                <h2 class="fs50 m_m_fs40 texts  cw" style="font-weight:bolder">
                    Features
                </h2>
                <div class="pl20 mt40"> 
                    <div class="mt20">
                        <div class="g_nm grad round100 vm" style="width: 25px;height:25px;">
                            <span class="fs22 cw cc mdi mdi-check-bold"></span>
                        </div>
                        <div class="g_nm cw vm fs18 m_m_fs14 pl10">Launch in minutes.</div>
                    </div>
                    <div class="mt10">
                        <div class="g_nm grad round100 vm" style="width: 25px;height:25px;">
                            <span class="fs22 cw cc mdi mdi-check-bold"></span>
                        </div>
                        <div class="g_nm cw vm fs18 m_m_fs14 pl10">Works on all devices.</div>
                    </div>
                    <div class="mt10">
                        <div class="g_nm grad round100 vm" style="width: 25px;height:25px;">
                            <span class="fs22 cw cc mdi mdi-check-bold"></span>
                        </div>
                        <div class="g_nm cw vm fs18 m_m_fs14 pl10">SEO-enabled for Google.</div>
                    </div>
                    <div class="mt10">
                        <div class="g_nm grad round100 vm" style="width: 25px;height:25px;">
                            <span class="fs22 cw cc mdi mdi-check-bold"></span>
                        </div>
                        <div class="g_nm cw vm fs18 m_m_fs14 pl10">Share via QR.</div>
                    </div>
                    <div class="mt10">
                        <div class="g_nm grad round100 vm" style="width: 25px;height:25px;">
                            <span class="fs22 cw cc mdi mdi-check-bold"></span>
                        </div>
                        <div class="g_nm cw vm fs18 m_m_fs14 pl10">Plug-in Online Menu.</div>
                    </div>
                    <div class="mt10">
                        <div class="g_nm grad round100 vm" style="width: 25px;height:25px;">
                            <span class="fs22 cw cc mdi mdi-check-bold"></span>
                        </div>
                        <div class="g_nm cw vm fs18 m_m_fs14 pl10">Quick add-ons for hours, events, gallery & more.</div>
                    </div>
                    <div class="mt10">
                        <div class="g_nm grad round100 vm" style="width: 25px;height:25px;">
                            <span class="fs22 cw cc mdi mdi-check-bold"></span>
                        </div>
                        <div class="g_nm cw vm fs18 m_m_fs14 pl10">Easy navigation for users in a hurry.</div>
                    </div>
                    <div class="mt10">
                        <div class="g_nm grad round100 vm" style="width: 25px;height:25px;">
                            <span class="fs22 cw cc mdi mdi-check-bold"></span>
                        </div>
                        <div class="g_nm cw vm fs18 m_m_fs14 pl10">Quick link changes.</div>
                    </div>
                    <div class="mt10">
                        <div class="g_nm grad round100 vm" style="width: 25px;height:25px;">
                            <span class="fs22 cw cc mdi mdi-check-bold"></span>
                        </div>
                        <div class="g_nm cw vm fs18 m_m_fs14 pl10">Link analytics.</div>
                    </div>
                    <div class="mt10">
                        <div class="g_nm grad round100 vm" style="width: 25px;height:25px;">
                            <span class="fs22 cw cc mdi mdi-check-bold"></span>
                        </div>
                        <div class="g_nm cw vm fs18 m_m_fs14 pl10">Custom brand styling.</div>
                    </div>
                    <div class="mt10">
                        <div class="g_nm grad round100 vm" style="width: 25px;height:25px;">
                            <span class="fs22 cw cc mdi mdi-check-bold"></span>
                        </div>
                        <div class="g_nm cw vm fs18 m_m_fs14 pl10">Custom backgrounds.</div>
                    </div>
                    
                </div>
            </cl>
            <cl class="w50 m_m_mt30">
                <img class="w100" src="{{ asset('images/website_images/features.png') }}" alt="">
            </cl>
        </tbl>
    </div>
    <!-- Close S4 -->
    <!-- Our Customers -->
    <div class="flexi pv100">
        <h2 class="fs50 m_m_fs40 texts  cw" style="font-weight:bolder">
            Our Customers
        </h2>
        <div class="fs0 mt50">
            <div class="g_nm w25 m_m_w100 p10 vt l">
            <a href="{{ route('menu', ['slug' => 'Yummy-Bites']) }}" target="_blanc">
                <div class="bgw w100 sq60 round4x grads2 oh ">
                    <div class="ov ba w100 sq40 cov" style="background-image: url('http://www.qr.algorexe.com/images/Businesses//JgswODL9qbA6jZ0rWJFAkBu6TZGJSoDglBzyvfNF.jpg');"></div>
                    <div class="ov bgw grads1 op40 roundcx1"></div>
                    <div class="grad ov w33 sq33 round100 ba ra" style="top: 10%;left:5%;">
                        <div class="cc round100 w90 sq90 cov" style="background-image: url('{{ asset('images/website_images/yami.jpeg') }}');"></div>
                    </div>
                    <div class="ov ta fs22 cw" style="bottom: 10%; left:5%;">Yummy Bites</div>
                </div>
                </a>
            </div>
            <div class="g_nm w25 m_m_w100 p10 vt l">
            <a href="{{ route('menu', ['slug' => 'amro-chicken']) }}"   target="_blanc">
                <div class="bgw w100 sq60 round4x grads2 oh ">
                    <div class="ov ba w100 sq40 cov" style="background-image: url('http://www.qr.algorexe.com/images/Businesses//pHIAdwCR2acCsCdQ7owIy6su7L1z7esRmEuOyUCH.jpg');"></div>
                    <div class="ov bgw grads1 op40 roundcx1"></div>
                    <div class="grad ov w33 sq33 round100 ba ra" style="top: 10%;left:5%;">
                    
                        <div class="cc round100 w90 sq90 cov " style="background-image: url('{{ asset('images/website_images/amro-chicken.png')}}');"></div>
                    </div>
                    <div class="ov ta fs22 cw" style="bottom: 10%; left:5%;">Amro Chicken</div>
                </div>
                </a>
            </div>
            <div class="g_nm w25 m_m_w100 p10 vt l">
            	<a href="{{ route('menu', ['slug' => 'snack-amro']) }} "target="_blanc">
                <div class="bgw w100 sq60 round4x grads2 oh ">
                    <div class="ov ba w100 sq40 cov" style="background-image: url('http://www.qr.algorexe.com/images/Businesses//TA7PcVcC7nPj0v4XZuWyW1h7zkFrHB3Y8C5FopMs.jpg');"></div>
                    <div class="ov bgw grads1 op40 roundcx1"></div>
                    <div class="grad ov w33 sq33 round100 ba ra" style="top: 10%;left:5%;">
                        <div class="cc round100 w90 sq90 cov" style="background-image: url('{{ asset('images/website_images/snack-amro.png')}}');"></div>
                    </div>
                    <div class="ov ta fs22 cw" style="bottom: 10%; left:5%;">Snack Amro</div>
                </div>
                 </a>
            </div>
            <div class="g_nm w25 m_m_w100 p10 vt l">
	        <a href="{{ route('menu', ['slug' => 'pizza-for-max']) }}" target="_blanc">
	                <div class="bgw w100 sq60 round4x grads2 oh ">
	                
	                    <div class="ov ba w100 sq40 cov" style="background-image: url('http://www.qr.algorexe.com/images/Businesses//x2nXUTQa2zc3ZKAU8BqhV9IOIZFrN9HhTpdhutZR.jpg');"></div>
	                    <div class="ov bgw grads1 op40 roundcx1"></div>
	                    <div class="grad ov w33 sq33 round100 ba ra" style="top: 10%;left:5%;">
	                        <div class="cc round100 w90 sq90 cov" style="background-image: url('{{ asset('images/website_images/pizza-for-max.png') }}');"></div>
	                    </div>
	                    
	                    <div class="ov ta fs22 cw" style="bottom: 10%; left:5%;">Pizza For Max</div>
	                    
	                </div>
	              
            	</a>
            </div>

        </div>
    </div>
    <!--Close Our Customersذ -->
    
    <!-- Footer -->
    <div class="mt100">
        <div class="w100 grad" style="height: 3px;"></div>
        <div class="flexi">
            <tbl class="l pv30">
                <cl class="w33 vt ">
                    <div class="g_nm vm">
                        <img  src="{{ asset('images/website_images/logo.png') }}" alt="">
                    </div>
                    <div class="pl10 g_nm vm">
                        <h2 class="cw fs26">QREXE</h2>
                    </div>
                    <h2 class="cw fs18 mt30">
                        Social Media
                    </h2>
                    <div class="mt20">
                        <div class="g_nm vt p5 pulse round100  m_m_mt20">
	                <a href="https://wa.me/+96170579786?text=Hello,%20QR%20Algorexe" target="_blank">
	                        <div class="round100 grad" style="height: 40px;width:40px;">
	                            <span class="mdi mdi-whatsapp cc cw fs26"></span>
	                        </div>
                        </a>
                    </div>
                    
                    <div class="g_nm vt p5 pulse round100 ml20 m_m_mt20">
	                    <a href="tel: +96170579786">
	                        <div class="round100 grad" style="height: 40px;width:40px;" target="_blank">
	                            <span class="mdi mdi-phone-outline cc cw fs26"></span>
	                        </div>
	                    </a>
                    </div>
                    <div class="g_nm vt p5 pulse round100 ml20 m_m_mt20">
                    	<a class="" href="mailto: qr@algorexe.com">
	                        <div class="round100 grad" style="height: 40px;width:40px;" target="_blank">
	                            <span class="mdi mdi-email-outline cc cw fs26"></span>
	                        </div>
                        </a>
                    </div>
                    </div>
                </cl>
                <cl class="w33 vt cw m_mt50">
                    <h2 class=" fs22">
                        Custom Link
                    </h2>
                    <div class="w20 grad mt5" style="height: 3px;"></div>
                    <a  href="#">
                        <p class="mt20">Privacy Policy</p>
                    </a>
                    <a href="#">
                        <p  class="mt10">Terms and Conditions</p>
                    </a>
                </cl>
                <cl class="w33 vt cw m_mt50">
                    <h2>Subscribe to Newsletter</h2>
                    <div class="w20 grad mt5" style="height: 3px;"></div>
                    <p class="cw80 fs13 mt20">
                        Signup for our weekly newsletter to get the latest news, updates and amazing offers delivered directly in your inbox.
                    </p>
                    <div class="w80 m_w100 mt20">
                        <input class="round5x lh40 w100 m_w100 ph10" style="border:0px;" type="text" placeholder="Enter Your Email">
                        <div class="grad  ov la round5x" style="width: 36px;height: 36px;right: 2px;top: 2px;">
                            <span class="cc mdi mdi-bell fs20"></span>
                        </div>
                    </div>
                    
                </cl>
            </tbl>
        </div>
        <div class="w100 grad m_mt20" style="height: 3px;"></div>
        <div class="cw fs12 pv5 ">
            <p>
                © 2022 Copy right QREXE , By ALGOREXE
            </p>
        </div>
    </div>
    <!-- Close Footer -->
    
    
    
    
    
    
    
    
    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script>
    // var modal = document.getElementById("myModal");
    // var span = document.getElementsByClassName("close")[0];
    // function myFunction() {
    //     modal.classList.remove("h");;
    // }
    // setTimeout(myFunction, 2000);
    // span.onclick = function() {
    //     modal.style.display = "none";
    // }
    // window.onclick = function(event) {
    //     if (event.target == modal) {
    //         modal.style.display = "none";
    //     }
    // }
    $('.client-carousel').flickity({
        pageDots: false,
        prevNextButtons: false,
        autoPlay: 3000,

        wrapAround: false,
        draggable: true,
        freeScroll: 3000,
        contain: true,


    });
</script>

</html>