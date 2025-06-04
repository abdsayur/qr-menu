<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="./././css/style.css"> --}}
    {{-- <link rel="stylesheet" href="./mdi.css"> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Document Cards</title>
</head>
<body class="ltr:text-left rtl:text-right"> 
    <div class=" sm:mx-[5%] sm:mt-5 md:mx-[5%] md:mt-10 lg:mx-[8%] lg:mt-10 xl:mx-[10%] xl:mt-15">
            <div class=" p-2 bg-slate-100 rounded-lg ">
                <div class=" grid grid-cols-4 gap-2 text-lg my-2 font-semibold text-slate-900 rounded-lg md:text-base lg:text-lg xl:text-lg">
                    @foreach ($products as $key=>$product)
                    <div class="py-1 md:p-2 flex bg-slate-300 rounded-lg">
                        <div class="w-1/2 text-left">{{ $key }}</div>
                        <div class="w-1/2 text-center">{{ $product}}</div>
                    </div>
                    @endforeach
                    {{-- <div class="py-1 md:p-2 flex bg-slate-300 rounded-lg">
                        <div class="w-1/2 text-left">jak wrest</div>
                        <div class="w-1/2 text-center">100000</div>
                    </div>
                    <div class="py-1 md:p-2 flex bg-slate-300 rounded-lg">
                        <div class="w-1/2 text-left">xxl</div>
                        <div class="w-1/2 text-center">1000000000</div>
                    </div>
                    <div class="py-1 md:p-2 flex bg-slate-300 rounded-lg">
                        <div class="w-1/2 text-left">dark blue</div>
                        <div class="w-1/2 text-center">1000</div>
                    </div>
                    <div class="py-1 md:p-2 flex bg-slate-300 rounded-lg">
                        <div class="w-1/2 text-left">jak wrest</div>
                        <div class="w-1/2 text-center">100000</div>
                    </div>
                    <div class="py-1 md:p-2 flex bg-slate-300 rounded-lg">
                        <div class="w-1/2 text-left">xxl</div>
                        <div class="w-1/2 text-center">1000000000</div>
                    </div>
                    <div class="py-1 md:p-2 flex bg-slate-300 rounded-lg">
                        <div class="w-1/2 text-left">dark blue</div>
                        <div class="w-1/2 text-center">1000</div>
                    </div>
                    <div class="py-1 md:p-2 flex bg-slate-300 rounded-lg">
                        <div class="w-1/2 text-left">jak wrest</div>
                        <div class="w-1/2 text-center">100000</div>
                    </div>
                    <div class="py-1 md:p-2 flex bg-slate-300 rounded-lg">
                        <div class="w-1/2 text-left">xxl</div>
                        <div class="w-1/2 text-center">1000000000</div>
                    </div> --}}
                </div>
                    
                <div class="end-of-day w-1/6 px-2 py-2 rounded-lg font-semibold  bg-sky-500 text-slate-300 cursor-pointer my-4  md:text-lg lg:text-xl xl:text-xl text-center lg:px-3 xl:px-4  hover:bg-green-700 hover:text-white">
                    Print
                </div>
                </div>
                
            </div>
    </div>
    <div class=" sm:mx-[5%] sm:mt-5 md:mx-[10%] md:mt-10 lg:mx-[16%] lg:mt-10 xl:mx-[20%] xl:mt-15">
        <div class=" p-2 bg-slate-50 rounded-lg ">
                <div class=" grid grid-cols-2 text-lg my-2  bg-slate-300 font-semibold text-slate-900 rounded-lg md:text-lg lg:textxl xl:text-xl">
                <div class=" ltr:text-left rtl:text-right p-2 ltr:pl-6 rtl:pr-6 md:p-3">Total Orders :</div>
                <div class=" text-center py-2 md:p-3">{{ $total_orders }}</div>
            </div>
            <div class=" grid grid-cols-2 text-lg my-2 bg-slate-300 font-semibold text-slate-900 rounded-lg md:text-lg lg:textxl xl:text-xl">
                <div class=" ltr:text-left rtl:text-right p-2 ltr:pl-6 rtl:pr-6 md:p-3">Total Price :</div>
                <div class="text-center py-2 md:p-3">{{ $total_price }} {{ $currency }}</div>
            </div>
            <div class=" grid grid-cols-2 text-lg my-2 bg-slate-300 font-semibold text-slate-900 rounded-lg md:text-lg lg:textxl xl:text-xl">
                <div class=" ltr:text-left rtl:text-right p-2 ltr:pl-6 rtl:pr-6 md:p-3">Profit :</div>
                <div class="text-center py-2 md:p-3">{{ $profit }} {{ $currency }}</div>
            </div>
            <div class=" grid grid-cols-2 text-lg my-2 bg-slate-300 font-semibold text-slate-900 rounded-lg md:text-lg lg:textxl xl:text-xl">
                <div class=" ltr:text-left rtl:text-right p-2 ltr:pl-6 rtl:pr-6 p-2  md:p-3">Date :</div>
                <div class=" text-center py-2 md:p-3">{{ $day }}</td>
            </div>
            </div>
            <div class="end-of-day end-of-day-btn w-1/3 px-2 py-2 rounded-lg font-semibold  bg-red-500 text-slate-300 cursor-pointer my-4  md:text-lg lg:text-xl xl:text-xl text-center lg:px-3 xl:px-4  hover:bg-green-700 hover:text-white">
                End Of The Day
            </div>
            <div class="log-out-div hidden">
                <a  class=" fs16 w-1/3 px-2 py-2 rounded-lg font-semibold  bg-red-500 text-slate-300 cursor-pointer  md:text-lg lg:text-xl xl:text-xl text-center lg:px-3 xl:px-4  hover:bg-green-700 hover:text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout <span class="mdi mdi-logout"></span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class=" vm">
                        @csrf
                </form>
            </div>
        </div>
</div>
</body>
<script>
    $('.end-of-day').click(function() {
        var route = '{{ route("end-of-day") }}';
            $.ajax({
                type: "POST",
                headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
                enctype: 'multipart/form-data',
                url:route,
                contentType: false,
                processData: false,
                success:function(i){
                    // console.log(i);
                    alert('success');
                    $('.end-of-day-btn').addClass('hidden');
                    $('.log-out-div').removeClass('hidden');
                    
                    
                },
                error:function(i){
                    alert('failed');
                    // console.log(i);
                }
            });
    });
</script>
</html>