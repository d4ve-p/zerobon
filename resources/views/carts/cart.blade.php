@extends('components.layouts.app.home-layout')

{{-- TODO: Apply logic and remove temporary hidden --}}
@section('content')
{{-- Choose Voucher --}}
{{-- Choosing voucher form should be in the same one as checkout --}}
<div id="voucher-overlay" class="fixed w-screen h-screen top-0 hidden">
    <form>
    {{-- Transparant --}}
    <div class="absolute bg-black opacity-40 w-full h-full"></div>
    <div class="absolute z-[100] w-[691px] h-[565px] bg-white flex flex-col top-[50%] left-[50%] translate-[-50%]">
        <div class="flex px-3 py-3">
            <div class="flex-1 text-[29px] font-semibold pl-[30px]">Choose Voucher</div>
            <i id="voucher-close" class="fa-solid fa-circle-xmark text-[var(--color-green-700)] text-[40px] hover:cursor-pointer" onclick="closePopup"></i>
        </div>
        <hr class="border-[2.5px]" />
        <div class="flex-1 flex flex-col overflow-y-scroll max-h-[380px] py-12 gap-4">
            {{-- TODO: Fetch coupon logic --}}
            {{-- Assign id to label, and input --}}
            <div class="flex justify-center items-center">
                <div class="bg-[var(--color-green-700)] w-[141px] h-[106px] text-white text-[29px] font-semibold flex justify-center items-center">10%</div>
                <div class="flex justify-between bg-[var(--color-cream-700)] w-[436px] h-[106px] items-center px-5">
                    <label for="1" class="text-[29px] font-semibold">Discount Voucher</label>
                    <input type="checkbox" id="1" />
                </div>
            </div>
             <div class="flex justify-center items-center">
                <div class="bg-[var(--color-green-700)] w-[141px] h-[106px] text-white text-[29px] font-semibold flex justify-center items-center">10%</div>
                <div class="flex justify-between bg-[var(--color-cream-700)] w-[436px] h-[106px] items-center px-5">
                    <label for="2" class="text-[29px] font-semibold">Discount Voucher</label>
                    <input type="checkbox" id="2" />
                </div>
            </div>
             <div class="flex justify-center items-center">
                <div class="bg-[var(--color-green-700)] w-[141px] h-[106px] text-white text-[29px] font-semibold flex justify-center items-center">10%</div>
                <div class="flex justify-between bg-[var(--color-cream-700)] w-[436px] h-[106px] items-center px-5">
                    <label for="3" class="text-[29px] font-semibold">Discount Voucher</label>
                    <input type="checkbox" id="3" />
                </div>
            </div>
        </div>
        <div class="w-full flex justify-center">
            {{-- TODO: Apply Voucher Logic --}}
            <button id="voucher-apply" class="rounded-[15px] bg-[var(--color-green-700)] text-white text-[24px] w-[259px] h-[69px] hover:cursor-pointer mt-6">Apply Now</button>
        </div>
    </div> 
    </form>
</div>

{{-- If cart empty --}}
@if ($items->count() == 0)
    <div class="w-full h-full flex flex-col justify-center items-center ">
        <p class="text-[30px] text-[var(--color-green-700)] font-bold">Oops! Looks like your bag is empty</p>
        <img src="{{asset("cart-empty.png")}}" class="w-[400px] h-[300px]"/>
        <p class="font-medium text-[25px] w-[523px] text-center">Start shopping now and discover the best products just for you! 
    Don't miss out—add your favorites to your bag today! </p>
        <button class="my-[20px] text-[20px] text-white bg-[var(--color-green-700)] rounded-[20px] w-[264px] h-[56px] font-semibold hover:cursor-pointer" onclick="window.location.href='{{route("products")}}'>Back to Shopping</button>
    </div>
@else
{{-- Else --}}
<form>
@csrf
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
        @foreach ($items as $item)
            <tr class="h-[245px] bg-[var(--color-cream-500)] font-semibold text-[24px] box-border" id={{"tr-".$item->id}}>
            <th scope="row" class="flex px-6 py-3 gap-6 h-[245px] box-border items-center">
                <input type="checkbox" id="cart-select" value="{{ $item->id }}" class="rounded-none"/>
                @if ($item->product->image_filename === null)
                    <img src="{{ asset('product-placeholder.png') }}" class="w-[125px] h-[150px]"/>
                @else
                    <img src="{{ Storage::disk('product_images')->url($item->product->image_filename) }}" class="w-[125px] h-[150px]"/>
                @endif
            </th>
            <th scope="row" class="px-6 py-4 font-medium box-border">
                {{ $item->product->name }}
            </th>
            <th scope="row" class="px-6 py-4 font-medium box-border">
                Rp.{{ $item->product->price }}
            </th>
            {{-- TODO: --}}
            {{-- Delete route: /cart/{id}/delete --}}
            {{-- Value change route: /card/{id}/set --}}
            {{-- Delete/Change value, should be done separately from form action --}}
            <th scope="row" class="px-6 py-4 font-medium flex justify-center box-border">
                <div class="flex gap-4 items-center">
                    <i class="fa-solid fa-trash" onclick="deleteCartItem('{{route('cart.delete')}}', {{ $item->id }})"></i>
                    
                    <div class="w-[165px] h-[44px] items-center flex bg-white justify-between border-2 border-[var(--color-green-700)] rounded-[15px] px-[5px] box-border">
                        <i id="popup-substract" class="fa-solid fa-minus hover:cursor-pointer"></i>
                        <input id="number-input" name="{{ "quantity-".$item->id }}" type="number" class="w-[52px] h-[26px] text-[18px] outline-none border-none text-center number-input font-semibold" value="{{ $item->quantity }}" onchange="changeCartItemValue('{{route('cart.update')}}', {{$item->id}})"/>
                        <i id="popup-add" class="fa-solid fa-plus   hover:cursor-pointer"></i>
                    </div>
                </div>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="flex justify-between px-6 py-3 box-border">
    <div class="flex gap-2">
        <i class="fa-solid fa-ticket-simple text-[45px]"></i>
        <p class="font-semibold text-[24px]">Use Your Vouchers</p>
    </div>
        <p id="voucher-open" class="text-[var(--color-green-700)] text-[22px] font-semibold hover:cursor-pointer">Apply your discount or cashback now</p>
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
@endif



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

<script defer>
let overlayPopup = null

window.onload = function() {
    const voucherOpen = document.getElementById("voucher-open")
    const voucherClose = document.getElementById("voucher-close")
    const voucherApply = document.getElementById("voucher-apply")

    overlayPopup = document.getElementById("voucher-overlay")

    console.log(overlayPopup)

    voucherOpen.addEventListener('click', () => {
        openPopup()
    })
    voucherClose.addEventListener('click', () => {
        closePopup()
    })
    voucherApply.addEventListener('click', () => {
        closePopup()
    })

}

function openPopup() {
    if(!overlayPopup) return
    overlayPopup.classList.remove("hidden")
}

function closePopup() {
    if(!overlayPopup) return
    overlayPopup.classList.add("hidden")
}

function deleteCartItem(action_url, id) {
    const csrfToken = document.getElementsByName("_token")[0].value

    fetch(action_url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify({ id: id })
    }).then(() => {
        window.location.reload()
    }).error((err) => {
        console.log(err)
    })
}

function changeCartItemValue(action_url, id) {
    const csrfToken = document.getElementsByName("_token")[0].value

    fetch(action_url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify({ id: id })
    }).then(() => {
        window.location.reload()
    }).error((err) => {
        console.log(err)
    })
}
</script>