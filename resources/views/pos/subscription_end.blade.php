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
    <meta name="language" content="English">

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
                	
                    
                </div>
            </cl>
        </tbl_nm>
        <tbl class="">
            <cl class="w50 h m_sb">
                <div class="ra w20 sq20 round100 grad ov ta op80" style="bottom: 30px;"></div> 
                <div class="ra w80 sq80 round100 grad cc op40"></div> 
                <div class="ra w30 sq30 round100 grad ov ba la op80" style="right:0;"></div> 
                <img class="w100 m_m_w80" src="{{ asset('images/website_images/image_header.png') }}" alt="">
            </cl>
            <cl class="w50 l vt">
                <h1 class="fs60 m_m_fs40 texts pt30  cw" style="font-weight:bolder; margin:0px !important;">
                   
                    <span class="ptcolor">QREXE Menu</span> 
                </h1>
                <p class="mt60 cw70 fs30 u m_m_fs24 b" >
                   Sorry your POS subscription is expired to renew it please contact with our customer support via methods below
                </p>
                <div class="mt50">
                    <div class="g_nm m_m_w100 vt p5">
                        <button class=" grad cw fs16 b ph40 pv10 round5x " style="border:0px;">CONTACT US</button>
                    </div>
                    

                        
                        
                        
                    <div class="g_nm vt p5 pulse round100 ml20 m_m_mt20">
	                <a href="https://wa.me/+96170579786?text=Hello,%20QR%20Algorexe">
	                        <div class="round100 grad" style="height: 40px;width:40px;">
	                            <span class="mdi mdi-whatsapp cc cw fs26"></span>
	                        </div>
                        </a>
                    </div>
                    
                    <div class="g_nm vt p5 pulse round100 ml20 m_m_mt20">
	                    <a href="tel: +96170579786">
	                        <div class="round100 grad" style="height: 40px;width:40px;">
	                            <span class="mdi mdi-phone-outline cc cw fs26"></span>
	                        </div>
	                    </a>
                    </div>
                    <div class="g_nm vt p5 pulse round100 ml20 m_m_mt20">
                    	<a class="" href="mailto: qr@algorexe.com">
	                        <div class="round100 grad" style="height: 40px;width:40px;">
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
	                <a href="https://wa.me/+96170579786?text=Hello,%20QR%20Algorexe">
	                        <div class="round100 grad" style="height: 40px;width:40px;">
	                            <span class="mdi mdi-whatsapp cc cw fs26"></span>
	                        </div>
                        </a>
                    </div>
                    
                    <div class="g_nm vt p5 pulse round100 ml20 m_m_mt20">
	                    <a href="tel: +96170579786">
	                        <div class="round100 grad" style="height: 40px;width:40px;">
	                            <span class="mdi mdi-phone-outline cc cw fs26"></span>
	                        </div>
	                    </a>
                    </div>
                    <div class="g_nm vt p5 pulse round100 ml20 m_m_mt20">
                    	<a class="" href="mailto: qr@algorexe.com">
	                        <div class="round100 grad" style="height: 40px;width:40px;">
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


</html>