<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mdi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/MyStyle.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src={{ asset('js/jQuery.print.js') }}></script>
    <title>QR code</title>


    <style>
        /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
            input[type=number] {
            -moz-appearance: textfield;
        }
        @media print
        {
            #printdiv { display: block; }
        }

        @media screen
        {
            #printdiv { display: none; }
        }
        .success-alert-div{
            background-color: #28A744;
            color: #FFFFFF;
        }
        .warning-alert-div{
            background-color: #e4861e;
            color: #FFFFFF;
        }
        .faild-alert-div{
            background-color: #c23737;
            color: #FFFFFF;
        }
        .alert-msg{
            opacity: 0;
            transition: opacity .5s ease-in-out;
            -moz-transition: opacity .5s ease-in-out;
            -webkit-transition: opacity .5s ease-in-out;
        }
        .alert-msg.active{
            opacity: 1;
        }
        .none-selectable-text{
            user-select: none;
        }
        .nav-item.active {
            background-color: #F7DBAF;
        }
        .modal-garnish-item:hover,.modal-garnish-item.active{
            background-color: #F7DBAF;
        }
        .tablinks.active {
            background-color: #F7DBAF;
            font-weight: bold;
        }

        .tabcontent {
            display: none !important;
        }

        .tabcontent.active {
            display: grid !important;
        }

        /* .garnish {

            display: none;
        }

        .garnish.active {
            display: block;
        } */


        .garnishTab {

            display: none !important;
        }

        .garnishTab.active {
            display: block !important;
        }

        .round-bottomtop {
            border-bottom-left-radius: 4rem !important;
            border-bottom-right-radius: 4rem !important;
        }
    </style>
</head>

<body>
    <nav class="w-full bg-slate-100 p-2">
        <div class="w-full grid grid-cols-2 md:grid-cols-5 gap-3 text-center text-2xl">
            @if(auth()->user()->role =="Waiter")
                <form action="{{ route('pos/waiter') }}" method="post">
                    @csrf
                    <input type="hidden" name="business_id" value="{{ $business->id }}">
                    <button type="submit" class="w-full {{ Request::is('pos/tables*')? 'active': '' }} nav-item px-1 py-[2%] text-slate-800 bg-slate-300 rounded-lg hover:bg-slate-400 hover:text-white">
                        Table
                    </button>
                </form>
                <div></div>
                <div></div>
            @else
                <form action="{{ route('pos/table') }}" method="post">
                    @csrf
                    <input type="hidden" name="business_id" value="{{ $business->id }}">
                    <button type="submit" class="w-full {{ Request::is('pos/table*')? 'active': '' }} {{ Request::is('pos/cashier_table*')? 'active': '' }} nav-item px-1 py-[2%] text-slate-800 bg-slate-300 rounded-lg hover:bg-slate-400 hover:text-white">
                        Table
                    </button>
                </form>
                <form action="{{ route('pos/take-away') }}" method="post">
                    @csrf
                    <input type="hidden" name="business_id" value="{{ $business->id }}">
                    <button type="submit" class="w-full {{ Request::is('pos/take-away*')? 'active': '' }} nav-item px-1 py-[2%] text-slate-800 bg-slate-300 rounded-lg hover:bg-slate-400 hover:text-white">
                        Take away
                    </button>
                </form>
                <form action="{{ route('pos/delivery') }}" method="post">
                    @csrf
                    <input type="hidden" name="business_id" value="{{ $business->id }}">
                    <button type="submit" class="w-full {{ Request::is('pos/delivery*')? 'active': '' }} nav-item px-1 py-[2%] text-slate-800 bg-slate-300 rounded-lg hover:bg-slate-400 hover:text-white">
                        Delivery
                    </button>
                </form>
            @endif
            <div class="md:hidden"></div>
            <div></div>
            <div class="text-right w-full setting-btn justify-self-end  text-black nav-item px-1 py-[2%]  rounded-lg">
                {{-- End Of Day --}}
                {{-- <div class="line-block w-fit"> --}}
                    <span class="mdi mdi-cog cursor-pointer"></span>
                {{-- </div> --}}
                <div class="absolute none-selectable-text right-[3px] setting-div hidden text-start text-black drop-shadow-md text-lg bg-slate-300 w-fit z-50 rounded-lg mt-2">
                    <div class="bg- hover:bg-slate-700 hover:text-white rounded-t-lg cursor-pointer border-solid border-slate-400 @if((auth()->user()->role)=="Admin") border-b @endif p-2">
                        <a  class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout <span class="mdi mdi-logout"></span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class=" vm">
                                @csrf
                        </form>
                    </div>

                    @if((auth()->user()->role)=="Admin")
                        <a href="{{ route('pos/end-of-day') }}" onclick="event.preventDefault(); document.getElementById('end-of-day-form').submit();"><div class="bg- hover:bg-slate-700 hover:text-white rounded-b-lg cursor-pointer p-2">End Of The Day</div></a>
                        {{-- <a href="{{ route('/nova') }}" onclick="event.preventDefault(); document.getElementById('nova').submit();"><div class="bg- hover:bg-slate-700 hover:text-white rounded-b-lg cursor-pointer p-2">Admin Dashboard</div></a> --}}

                        <form id="end-of-day-form" action="{{ route('pos/end-of-day') }}" method="POST">
                                @csrf
                            <input type="hidden" name="business_id" value="{{ $business->id }}">
                            <input type="hidden" name="business_currency" value="{{ $business->currency }}">
                        </form>
                        {{-- <form id="nova" action="{{ route('/nova') }}" method="GET">
                            @csrf
                        </form> --}}
                    @endif
                </div>
            </div>
        </div>
    </nav>
    @yield('main')
    <script>
        $('.setting-btn').click(function(){
            $('.setting-div').toggleClass('hidden');
        });
    </script>
</body>

</html>
