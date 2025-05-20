@extends('components.layouts.app.home-layout')
@section('content')
{{-- If checkout --}}
<div class="w-full py-[50px] px-[30px] flex flex-col bg-[var(--color-cream-500)] hidden">
    <div class="w-full flex justify-between items-center mb-[50px]">
        <button class="text-[20px] text-[var(--color-green-700)] font-semibold">< Previous</button>
        <p class="font-semibold text-[30px]">Checkout Time</p>
        <span></span>
    </div>
    <div class="flex w-full gap-6 justify-center">
        <div class="flex flex-col w-[839px] box-border gap-[40px]">
            <div class="bg-white rounded-[15px] flex flex-col shadow-2xl drop-shadow-2xl px-6 py-6 box-border gap-4">
                <p class="font-medium text-[20px] mb-0.5">Delivery Address</p>
                <div class="flex flex-col border-[var(--color-green-700)] border-2 w-full rounded-[15px] px-2 py-4">
                    {{-- TODO: Fill in with appropriate use detail --}}
                    <p class="font-medium text-[20px]">Katherine - 08124567890</p>
                    <p class="text-[15px]">Jl. Merdeka No. 35, RT.4/RW.5, Kelurahan Merdeka, Kecamatan Tanah Abang, Jakarta Pusat, DKI Jakarta 10110</p>
                </div>
                <button class="bg-[var(--color-green-700)] text-white font-semibold text-[18px] w-[172px] h-[38px] rounded-[15px] hover:cursor-pointer">Edit Address</button>
            </div>
                <div class="bg-white rounded-[15px] flex flex-col shadow-2xl drop-shadow-2xl px-6 py-6 box-border gap-4">
                <p class="font-medium text-[20px] mb-0.5">Delivery Details</p>
                <div class="flex flex-col border-[var(--color-green-700)] border-2 w-full rounded-[15px] px-2 py-4">
                    <p class="font-medium text-[20px]">Regular Shipping                  Rp. 9000</p>
                    <p class="text-[15px]">Estimated arrival: 2-3 days</p>
                </div>
            </div>
                <div class="bg-white rounded-[15px] flex flex-col shadow-2xl drop-shadow-2xl px-6 py-6 box-border gap-4">
                <p class="font-medium text-[20px] mb-0.5">Payment Details</p>
                <div class="flex border-[var(--color-green-700)] border-2 w-full rounded-[15px] px-2 py-4 gap-2">
                    <img class="w-[60px] h-[33px]" src="{{ asset("logo_bca.png") }}"/>
                    <p class="font-medium text-[20px]">BCA Virtual Account</p>
                </div>
            </div>
                <div class="bg-white rounded-[15px] flex flex-col shadow-2xl drop-shadow-2xl px-6 py-6 box-border gap-4">
                    {{-- TODO: Count number of items --}}
                <p class="font-medium text-[20px] mb-0.5">Summary order (3 items)</p>
                <div class="flex flex-col w-full px-2 py-4 gap-6">
                    <div class="flex w-full justify-between gap-10 items-center">
                        <img class="w-[82px] h-[101px]" src="{{ asset("product-placeholder.png") }}"/>
                        <div class="flex-1 flex flex-col">
                            <p class="font-semibold text-[20px]">Zerobon Totebag</p>
                            {{-- TODO: Count number of each item --}}
                            <p class="font-light text-[15px]">2 pcs</p>
                        </div>
                        {{-- TODO: Fill with appropriate price --}}
                        <p class="font-semibold text-[20px]">Rp50.000</p>
                    </div>
                                        <div class="flex w-full justify-between gap-10 items-center">
                        <img class="w-[82px] h-[101px]" src="{{ asset("product-placeholder.png") }}"/>
                        <div class="flex-1 flex flex-col">
                            <p class="font-semibold text-[20px]">Zerobon Totebag</p>
                            {{-- TODO: Count number of each item --}}
                            <p class="font-light text-[15px]">2 pcs</p>
                        </div>
                        {{-- TODO: Fill with appropriate price --}}
                        <p class="font-semibold text-[20px]">Rp50.000</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- TODO: Fill in appropriate detail --}}
        <div class="flex flex-col w-[449px] h-fit bg-white px-[41px] py-10 gap-8 rounded-[15px] drop-shadow-lg">
            <div class="flex w-full text-[18px]">
                <p class="w-[251px]">Subtotal</p>
                <p class="text-left">Rp140.000</p>
            </div>
            <div class="flex w-full text-[18px]">
                <p class="w-[251px]">Shipping Cost</p>
                <p>Rp9.000</p>
            </div>
            <div class="flex w-full text-[18px]">
                <p class="w-[251px]">Admin Fee</p>
                <p>Rp1.000</p>
            </div>
            <div class="flex w-full text-[18px]">
                <p class="w-[244px]">Voucher Applied</p>
                <p>-</p>
                <p>Rp0</p>
            </div>
            <hr class="border-[2px] rounded-[5px] border-black"/>
            <div class="flex w-full font-semibold text-[22px]">
                <p class="w-[244px]">Total</p>
                <p>Rp150.000</p>
            </div>
            <div class="flex w- items-center justify-center hover:cursor-pointer">
                <button class="bg-[var(--color-green-700)] w-[400px] h-[69px] rounded-[15px] text-white font-semibold text-[24px]">Place Order</button>
            </div>
        </div>
    </div>
</div>
{{-- If pending payment status --}}
{{-- TODO: Fillout appropriate details --}}
<div class="flex flex-1 flex-col w-full h-full items-center bg-[var(--color-cream-500)]">
    <p class="py-[50px] text-[30px] font-semibold">Waiting Payment</p>
    <div class="w-[772px] px-8 py-4 box-border bg-white flex flex-col gap-[20px] h-[403px] rounded-[15px]">
        <div class="p-4 flex justify-between w-full border-[var(--color-green-700)] border-2 rounded-[15px]">
            <p class="text-[20px]">Complete Your Payment Before</p>
            <p class="text-[20px] text-[var(--color-green-700)]">14 May 2025, 15.24 WIB</p>
        </div>
        <div class="flex text-[20px] px-8">
            <p class="font-semibold w-[480px] ">Order Number</p>
            <p class="font-medium">CHDUXWTYRU</p>
        </div>
        <div class="flex text-[20px] px-8">
            <p class="font-semibold w-[480px] ">BCA Virtual Account</p>
            <p class="font-medium">37848124567890</p>
        </div>
        <div class="flex text-[20px] px-8">
            <p class="font-semibold w-[480px] ">Total</p>
            <p class="font-medium">Rp150.000</p>
        </div>
        <button class="text-white bg-[var(--color-green-700)] text-[22px] font-semibold w-[716px] h-[47px] rounded-[15px]">View Order Status</button>
    </div>
</div>
@endsection