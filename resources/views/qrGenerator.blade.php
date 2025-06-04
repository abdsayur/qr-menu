<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qr</title>
    <link rel="stylesheet" href="{{ asset('css/mdi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="">

    <div class="p100 c">
        <div class="g_nm">

            {!! QrCode::size(300)->generate('https://www.qr.algorexe.com/menu/' . $slug) !!}
        </div>
    </div>
</body>

</html>
