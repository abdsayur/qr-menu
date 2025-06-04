<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qr</title>
    <link rel="stylesheet" href="{{ asset('css/mdi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="c mt100">
        <div class="fs0 w50 g_nm m_m_w100">
            <a href="{{ route('employee-login', ['business_id' => $business->id, 'work_type' => 'Waiter']) }}">
                <div class="w50 g_nm p20 m_m_p5">
                    <div class="cov bgb sq75"></div>
                    <div class="mt20 fs20">Waiter</div>
                </div>
            </a>
            <a href="{{ route('employee-login', ['business_id' => $business->id, 'work_type' => 'Cashier']) }}">

                <div class="w50 g_nm p20 m_m_p5">
                    <div class="cov bgb sq75"></div>
                    <div class="mt20 fs20">Cashier</div>
                </div>
            </a>
            <a href="/">
                <div class="w50 g_nm p20 m_m_p5">
                    <div class="cov bgb sq75"></div>
                    <div class="mt20 fs20">Admin</div>
                </div>
            </a>

            <div class="w50 g_nm p20 m_m_p5">
                <div class="cov bgb sq75"></div>
                <div class="mt20 fs20">Delivery</div>
            </div>
        </div>
    </div>
</body>

</html>
