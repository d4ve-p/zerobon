@extends('components.layouts.app.home-layout')

@section('content')
<div class="flex flex-1 h-full w-full flex-col">
    <div class="h-[260px] py-10 bg-[var(--color-cream-700)] flex justify-between items-center box-border px-20">
        <div class="flex flex-col gap-4 text-[var(--color-green-700)]">
            <p class="font-extrabold text-[50px]">Hello {{Auth::user()->username}}</p>
            <p class="font-semibold text-[35px]">Let's Reedeem Your Vouchers!</p>
        </div>
        <div class="flex flex-col">
            <div class="flex items-center gap-1">
                <img class="w-[65px] h-[65px]" src="{{asset("/carbon_footprint.png")}}"/>
                <p class="font-semibold text-[55px] text-[var(--color-green-700)]">1,500</p>
                <p class="font-semibold text-[35px]">points</p>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-[30px]">
    <div class="flex font-bold text-[25px] border-[var(--color-green-700)] rounded-2xl h-[77px] justify-center border-2 w-fit overflow-hidden">
        <div class="w-[273px] bg-[var(--color-green-700)] text-white flex items-center justify-center ">Voucher List</div>
        <div class="w-[273px] text-[var(--color-green-700)] flex items-center justify-center">My Vouchers</div>
    </div>
    </div>

    <div class="w-full flex gap-2 flex-wrap justify-center gap-y-4">
        <div class=" py-6 px-6 flex flex-col justify-between items-center w-[396px] h-[396px] bg-white rounded-xl drop-shadow-lg">
            <div class="bg-black w-[358px] h-[220px]"></div>
            <p class="font-semibold text-[22px]">I-Voucher Indomaret Worth Rp100.000</p>
            <div class="flex justify-between items-center w-full">
                <p class="text-[15px] text-gray-400">8,600 Points</p>
                <div class="bg-[var(--color-green-700)] text-white text-center py-2 px-10 rounded-3xl font-semibold text-[20px]">Redeem</div>
            </div>
        </div>
        <div class=" py-6 px-6 flex flex-col justify-between items-center w-[396px] h-[396px] bg-white rounded-xl drop-shadow-lg">
            <div class="bg-black w-[358px] h-[220px]"></div>
            <p class="font-semibold text-[22px]">I-Voucher Indomaret Worth Rp100.000</p>
            <div class="flex justify-between items-center w-full">
                <p class="text-[15px] text-gray-400">8,600 Points</p>
                <div class="bg-[var(--color-green-700)] text-white text-center py-2 px-10 rounded-3xl font-semibold text-[20px]">Redeem</div>
            </div>
        </div>
        <div class=" py-6 px-6 flex flex-col justify-between items-center w-[396px] h-[396px] bg-white rounded-xl drop-shadow-lg">
            <div class="bg-black w-[358px] h-[220px]"></div>
            <p class="font-semibold text-[22px]">I-Voucher Indomaret Worth Rp100.000</p>
            <div class="flex justify-between items-center w-full">
                <p class="text-[15px] text-gray-400">8,600 Points</p>
                <div class="bg-[var(--color-green-700)] text-white text-center py-2 px-10 rounded-3xl font-semibold text-[20px]">Redeem</div>
            </div>
        </div>
    </div>
</div>
@endsection