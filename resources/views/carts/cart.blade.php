@extends('components.layouts.app.home-layout')

{{-- TODO: Apply logic and remove temporary hidden --}}
@section('content')
{{-- If cart empty --}}
<div class="w-full h-full flex-col justify-center items-center hidden">
    <p class="text-[30px] text-[var(--color-green-700)] font-bold">Oops! Looks like your bag is empty</p>
    <img src="{{asset("cart-empty.png")}}" class="w-[400px] h-[300px]"/>
    <p class="font-medium text-[25px] w-[523px] text-center">Start shopping now and discover the best products just for you! 
Don't miss out—add your favorites to your bag today! </p>
    <button class="my-[20px] text-[20px] text-white bg-[var(--color-green-700)] rounded-[20px] w-[264px] h-[56px] font-semibold hover:cursor-pointer" onclick="window.location.href='{{route("products")}}'">Back to Shopping</button>
</div>
{{-- Else --}}
<form>
<div class="w-full h-full px-[80px]">
<div class="w-full flex flex-col gap-[10px] box-border bg-[var(--color-cream-500)] ">
<table class="w-full text-sm text-center box-border">
    <thead class="text-[20px] font-semibold text-gray-700 ">
        <tr>
            {{-- TODO: Select all logic --}}
            <th scope="col" class="px-6 py-3 box-border">
                <div class="w-full flex gap-6 items-center">
                    <input type="checkbox" id="cart-select-all" class="rounded-none"/>
                    <p>Select All</p>
                </div>
            </th>
            <th scope="col" class="px-6 py-3 box-border">
                Product
            </th>
            <th scope="col" class="px-6 py-3 box-border">
                Price
            </th>
            <th scope="col" class="px-6 py-3 box-border">
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="h-[245px] bg-[var(--color-cream-500)] font-semibold text-[24px] box-border">
            <th scope="row" class="flex px-6 py-3 gap-6 h-[245px] box-border items-center">
                <input type="checkbox" id="cart-select-all" class="rounded-none"/>
                <img src="{{ asset('product-placeholder.png') }}" class="w-[125px] h-[150px]"/>
            </th>
            <th scope="row" class="px-6 py-4 font-medium box-border">
                Zerobon Totebag
            </th>
            <th scope="row" class="px-6 py-4 font-medium box-border">
                Rp.25000
            </th>
            {{-- TODO: --}}
            {{-- Delete route: /cart/{id}/delete --}}
            {{-- Value change route: /card/{id}/set --}}
            <th scope="row" class="px-6 py-4 font-medium flex justify-center box-border">
                <div class="flex gap-4 items-center">
                    <i class="fa-solid fa-trash"></i>
                    <div class="w-[165px] h-[44px] items-center flex bg-white justify-between border-2 border-[var(--color-green-700)] rounded-[15px] px-[5px] box-border">
                        <i id="popup-substract" class="fa-solid fa-minus hover:cursor-pointer"></i>
                        <input id="number-input" type="number" class="w-[52px] h-[26px] text-[18px] outline-none border-none text-center number-input font-semibold" value="1"/>
                        <i id="popup-add" class="fa-solid fa-plus   hover:cursor-pointer"></i>
                    </div>
                </div>
            </th>
        </tr>
        <tr class="h-[245px] bg-[var(--color-cream-500)] font-semibold text-[24px] box-border">
            <th scope="row" class="flex px-6 py-3 gap-6 h-[245px] box-border items-center">
                <input type="checkbox" id="cart-select-all" class="rounded-none"/>
                <img src="{{ asset('product-placeholder.png') }}" class="w-[125px] h-[150px]"/>
            </th>
            <th scope="row" class="px-6 py-4 font-medium box-border">
                Zerobon Totebag
            </th>
            <th scope="row" class="px-6 py-4 font-medium box-border">
                Rp.25000
            </th>
            <th scope="row" class="px-6 py-4 font-medium flex justify-center box-border">
                <div class="flex gap-4 items-center">
                    <i class="fa-solid fa-trash"></i>
                    <div class="w-[165px] h-[44px] items-center flex bg-white justify-between border-2 border-[var(--color-green-700)] rounded-[15px] px-[5px] box-border">
                        <i id="popup-substract" class="fa-solid fa-minus hover:cursor-pointer"></i>
                        <input id="number-input" type="number" class="w-[52px] h-[26px] text-[18px] outline-none border-none text-center number-input font-semibold" value="1"/>
                        <i id="popup-add" class="fa-solid fa-plus   hover:cursor-pointer"></i>
                    </div>
                </div>
            </th>
        </tr>
    </tbody>
</table>
<div class="flex justify-between px-6 py-3 box-border">
    <div class="flex gap-2">
        <i class="fa-solid fa-ticket-simple text-[45px]"></i>
        <p class="font-semibold text-[24px]">Use Your Vouchers</p>
    </div>
    <p class="text-[var(--color-green-700)] text-[22px] font-semibold">Apply your discount or cashback now</p>
</div>
<hr />

{{-- TODO: Checkout logic, calculate price logic --}}
<div class="flex justify-between px-6 py-3 items-center">
    <div class="flex gap-2 items-center">
        <p class="text-[30px] font-bold">Total Price: </p>
        <p class="text-[30px] font-semibold text-[var(--color-green-700)]">Rp140.000</p>
    </div>
    <input type="submit" value="Checkout" class="w-[259px] h-[69px] text-[24px] text-white font-semibold bg-[var(--color-green-700)] rounded-[15px] "/>
</div>
</div>
</div>
</form>

@endsection 

<style>
#number-input::-webkit-inner-spin-button {    
    -webkit-appearance: none;
    -moz-appearance: textfield;
}
#number-input {
    outline: none;
    border: none;
}
input[type="checkbox"] {
    width: 20px;
    height: 20px;
}
</style>