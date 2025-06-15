@extends('components.layouts.app.home-layout')

@section('content')
    {{-- Popup Overlay --}}
    {{-- Popup overlay has the following properties --}}
    {{-- Image, Name, Description, Rating --}}
    <form id="popup-form" method="POST" action="{{route('cart.add')}}">
    @csrf
    <input id="popup-item-id" name="item_id" type="text" class="hidden"/>
    <div id="popup-overlay" class="w-screen h-screen fixed z-[100] top-0 hidden">
        {{-- Overlay Background --}}
        <div class="absolute w-full h-full bg-black opacity-25"></div>
        {{-- Content Placeholder --}}
        <div class="absolute w-[862px] h-[560px] bg-white drop-shadow-lg left-[50%] top-[50%] translate-[-50%] flex flex-col">
            {{-- X Button --}}
            <div class="w-full flex justify-end p-[10px] box-border">  
                <i id="popup-close" class="fa-solid fa-circle-xmark text-[var(--color-green-700)] text-[40px] hover:cursor-pointer"></i>
            </div>
            {{-- Content --}}
            <div class="w-full flex flex-1 py-[40px] box-border">
                
                <div class="flex justify-center px-[30px]">
                    <img class="w-[232px] h-[277px]" src="{{asset("product-placeholder.png")}}"/>
                </div>
                <div class="flex flex-col gap-[20px] flex-1">
                    <h1 id="popup-title" class="text-[29px] font-semibold">Zerobon Totebag</h1>
                    <p id="popup-description" class="text-[15px]">Crafted from 100% organic cotton canvas, this eco-friendly tote is durable, reusable, and free from harmful chemicals—perfect for everyday use and reducing plastic waste.</p>
                    {{-- Quantity Selector --}}
                    <div class="flex gap-[20px] items-center">
                        <p class="text-[18px] font-medium">Quantity</p>
                        {{-- Number Selector --}}
                        <div class="w-[165px] h-[44px] border-[var(--color-green-700)] border-2 rounded-[40px] flex justify-between items-center box-border p-[10px]">
                            <i id="popup-substract" class="fa-solid fa-minus w-[17px] h-[17px] text-center hover:cursor-pointer"></i>
                            <input id="popup-number-input" type="number" class="w-[55px] h-[21px] text-[18px] outline-none border-none text-center" name="item_number" value="1"/>
                            <i id="popup-add" class="fa-solid fa-plus w-[17px] h-[17px] text-center hover:cursor-pointer"></i>
                        </div>
                    </div>
                    <input type="submit" value="Add to bag" class="hover:cursor-pointer ml-[10px] rounded-[15px] w-[254px] h-[56px] text-center text-[20px] font-semibold bg-[var(--color-green-700)] text-white"/>
                </div>
            </div>
        </div>
    </div>
    </form>

    @can('update', App\Models\Product::class)
    <div class="w-full h-full px-5 py-3 box-border">
        <a href="{{ url("/products/create") }}"><button>Create Product</button></a>
        <livewire:show-products />
    </div>
    @endcan

        {{-- Banner --}}
    <div class="w-full flex box-border p-10 pl-[100px] h-[592px]">
        <img src="{{ asset('eco-market.png') }}" width="900px"/>
        <div class="flex h-full flex-1 w-full relative">
            <div class="flex items-center justify-center flex-col h-full absolute left-[-50%] top-[50%] translate-y-[-50%]">
                <p class="text-[60px] text-[var(--color-green-700)] font-bold mb-10">Let's Shop At EcoMarket!</p>
                <a href="{{route("purchases")}}"><button class="w-[539px] h-[47px] text-white bg-[var(--color-green-700)] rounded-[30px] font-bold hover:cursor-pointer">Check Order Status</button></a>
            </div>
        </div>
    </div>

    {{-- Shop Content --}}
    <div class="flex w-full flex-1 bg-[#FFF8E8] py-[30px]">
        {{-- Search Bar --}}
        <div class="h-full w-full flex flex-col items-center justify-center box-border py-[35px]">
            @csrf
            <form method="GET">
                <div class="flex gap-[15px] w-[822px] h-[60px] items-center justify-center box-border shadow border-solid border-2 rounded-[65px] bg-white px-5">
                    <input type="text" class="flex-1 text-[18px] p-3 outline-none" placeholder="Search our ecoproducts..."/>
                    <i class="fa-solid fa-magnifying-glass text-green-700"></i>
                </div>
            </form>
            
            <div class="h-[65px] w-full"></div>

            {{-- Product Showcase --}}
            <div class="flex-1 w-full flex gap-2 justify-evenly flex-wrap">
                {{--3 items per row--}}
                {{-- Item Box --}}

                @foreach ($products as $product)
                <div class="py-[30px] basis-[30%] flex justify-center">
                    <div class="w-[376px] h-[543px] bg-white flex flex-col justify-between items-center py-[30px]">
                        <div class="flex flex-col items-center">
                            @if ($product->image_filename === null)
                                <img class="w-[232px] h-[277px]" src="{{ asset('product-placeholder.png') }}" />
                            @else
                                <img class="w-[232px] h-[277px]" src="{{ Storage::disk('product_images')->url($product->image_filename) }}" />
                            @endif
                            
                            <p class="font-semibold text-[29px]">{{ $product->name }}</p>
                            <p class="font-extralight text-[20px]">Rp{{ $product->price }}</p>
                        </div>
                        <button class="bg-[var(--color-green-700)] text-white w-[264px] h-[56px] text-[20px] font-semibold rounded-[20px]" onclick="openPopup({{ $product }})">Add to bag</button>
                    </div>
                    </div>
                @endforeach
            </div>
            <div class="w-full flex justify-center">
                <div class="flex flex-col">
                    {{ $products->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
#popup-number-input::-webkit-inner-spin-button {    
    -webkit-appearance: none;
    -moz-appearance: textfield;
}
#popup-number-input {
    outline: none;
    border: none;
}
</style>

<script defer>
document.addEventListener("DOMContentLoaded", function() {
    // Form elements
    const popupOverlay = document.getElementById("popup-overlay")
    const popupFormNumberInput = document.getElementById("popup-number-input")
    const closeButton = document.getElementById("popup-close")

    // Universal Logic
    // Add / Substract function
    document.getElementById("popup-add").addEventListener('click', () => {
        const value = parseInt(popupFormNumberInput.value)
        popupFormNumberInput.value = value + 1
    })
    document.getElementById("popup-substract").addEventListener('click', () => {
        const value = parseInt(popupFormNumberInput.value)
        popupFormNumberInput.value = Math.max(0, value - 1)
    })
    // Close function
    closeButton.addEventListener('click',() => {
        popupOverlay.classList.add('hidden')
    } )

}) 

function openPopup(item) {
    // Elements
    const popupOverlay = document.getElementById("popup-overlay")
    const popupId = document.getElementById("popup-item-id")
    const popupTitle = document.getElementById("popup-title")
    const popupDescription = document.getElementById("popup-description")

    popupId.value = item.id
    popupTitle.innerHTML = item.name
    popupDescription.innerHTML = item.description

    popupOverlay.classList.remove("hidden")
}
</script>