<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>login</title>
</head>

<body>

    <div class="round4x m20 cw c">

        <div class="g_nm w50 p40" style="background-color: #141C26;">

            <div class="bg-mycolor mt5" style="height:5px;width:50px;"></div>

            <div class="mt20">
                <form method="POST" action="{{ route('employee-login-post') }}">
                    @csrf
                    <div class="fs0">

                        <input type="text" hidden id="business_id" name="business_id" value="{{ $business_id }}">
                        <div class="mt20 l b">Phone<span class="c-mycolor">*</span></div>
                        <div class="mt10">
                            <input id="phone" name="phone" class="round4x brdr lh34 fs14 ph10 w100" type="text"
                                placeholder="enter phone" required>
                        </div>

                        <div class="mt20 l b">Password<span class="c-mycolor">*</span></div>
                        <div class="mt10">
                            <input id="password" name="password" class="round4x brdr lh34 fs14 ph10 w100"
                                type="text" placeholder="password" required>
                        </div>


                        <div class="mt20 ph10 r m_c">
                            <button class="g_nm btn b0 pointer bg-mycolor b send-message ph30 pv10 m_ph50"
                                type="submit" style="border-radius:25px;">
                                login
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
