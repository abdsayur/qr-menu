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
        <meta name="keywords" content="menu, coffe, food, fast food, sweet, patisray">
        <meta name="robots" content="index, follow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="English">
    <style>
        .socailcolor{color: gray;}
        .home-btn{
            color: white;
        }
        .home-btn:hover{
            color:#cdaa4a;
        }
        .yellow-line{
            height:3px;
            width:50px;
            background-color:#cdaa4a;
        }.c-mycolor{
            color:#cdaa4a;
        }
        .bg-mycolor{
            background-color:#cdaa4a !important;
        }
        .send-message{
            background-color:#cdaa4a;
        }
        .send-message:hover{
            /* background-color:#cdaa4a; */
            background-color: white;
            color: #cdaa4a;
        }
    </style>
    </head>
    <body style="background-color: #292f36; min-height: 100vh;">
        <div class="ov cov" style="background-image: url('{{ asset('images/website_images/hosting-bg.svg') }}');"></div>
        <nav class="pa t0 w100" style="z-index: 1;">
            <div class="ph50 m_m_ph10 cw mt10">
                <tbl_nm>
                    <cl class="l">
                        <a class="fs0" href="{{ route('home') }}">
                            <div class="g_nm vm p30 m_p20 cov" style="background-image: url('{{ asset('images/website_images/qr2.png') }}');"></div>
                            <div class="g_nm vm ph10 m_pr0 fs28 m_fs20 cw b">QR Algorexe</div>
                        </a>
                    </cl>
                    <cl class="r">
                        <a href="{{ route('home') }}" class="home-btn fs16"><span class="mdi mdi-home"></span> Home</a>
                    </cl>
                </tbl_nm>
            </div>
        </nav>
        <div class="flexi c mt90 md_mt70 m_m_ph5">
            <div class="round4x l w50 md_w60 m_w75 m_m_w100 g_nm p20 cw bgb40" >
                <div class="g_nm fs28 md_fs30 m_fs22 m_mfs24" >
                    Login
                </div>
                <div class="yellow-line mt5" style="height:5px;width:50px;"></div>
                <div class="mt30">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mt20 b">Email <span class="c-mycolor">*</span></div>
                        <div class="mt10">
                            <input id="email" type="email" class="form-control round2x brdr lh34 fs14 ph10 w100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="enter_email" required autocomplete="email" autofocus>
                            @error('email')
                                <span class=" fs14" style="color:red;"role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt30 b">Password <span class="c-mycolor">*</span></div>
                        <div class="mt10">
                            <input type="password" id="password" class="round2x brdr lh34 fs14 ph10 w100 @error('password') is-invalid @enderror" name="password" placeholder="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback fs14" style="color:red;" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt30">

                            <input class="vm" type="checkbox" id="remember" name="remamber" value="true " {{ old('remember') ? 'checked' : '' }}>
                            <label class="vm ml10" for="remember-password ">Eemember Me</label>
                        </div>
                        {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                        <div class="mt30 ph10 r cw m_c">
                            <button class="btn b0 pointer b send-message ph30 pv10 m_ph50 round2x " type="submit" >
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <footer class="mt20 cw">
            <div class="fs30 md_fs28 m_fs24 m_fs20">POWER BY ALGOREXE</div>
            <div class="pv5">Copyright © 2022</div>
            <div class="mt10" style="background-color: #cdaa4a; height: 1px;"></div>
            <div class="fs0 pv10" style="backgrofund-color: #292f36">
                <div class="g_nm vm fs16 ph10">
                    <span class=" mdi mdi-cellphone"></span> <span>+96170579786</span>
                </div>
                <div class="g_nm vm fs16 ph10">
                    <span class=" mdi mdi-email"></span> <span>qr@algorexe.com</span>
                </div>
            </div>
        </footer>
        <!-- CLOSE FOOTER -->
    </body>
</html>
