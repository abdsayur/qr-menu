@extends('pos.pos')

@section('main')

<div class=" w-full mt-16 px-2 sm:px-4 md:px-10 lg:px12 xl:px-24">
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2 rounded-xl  p-2 text-white  text-2xl bg-slate-200" id="Types">
        
        @foreach ($tables as $table)
            <a href="{{ route('pos_table',['id'=>$table]) }}"><div class="rounded-lg py-[65px] md:py-[60px] lg:py-[65px] xl:py-[75px] px-2 text-center justify-items-center cursor-pointer bg-green-500 shadow-2xl" id="{{ $table->id }}">Table : {{ $table->number }}</div></a>
        @endforeach
        
    </div>
</div>

@endsection
