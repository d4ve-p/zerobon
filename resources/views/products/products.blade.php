@extends('components.layouts.app.home-layout')

@section('content')
    {{-- Popup Overlay --}}
    {{-- Popup overlay has the following properties --}}
    {{-- Image, Name, Description, Rating --}}
    <div id="popup-overlay" class="w-screen h-screen fixed z-[100] top-0 hidden">
        {{-- Overlay Background --}}
        <div class="absolute w-full h-full bg-black opacity-25"></div>
        {{-- Content Placeholder --}}
        <div class="absolute w-[862px] h-[560px] bg-white drop-shadow-lg left-[50%] top-[50%] translate-[-50%] flex flex-col">
            {{-- X Button --}}
            <div class="w-full flex justify-end">

            </div>
        </div>
    </div>

    @can('update', App\Models\Product::class)
    <div class="w-full h-full px-5 py-3 box-border">
        <a href="{{ url("/products/create") }}"><button>Create Product</button></a>
        <livewire:show-products />
    </div>
    @endcan

        {{-- Banner --}}
    <div class="w-full flex box-border p-10 pl-[100px] h-[592px]">
        <img src="{{ asset('eco-market.png') }}" width="1000px"/>
        <div class="flex h-full flex-1 w-full relative">
            <div class="flex items-center justify-center flex-col h-full absolute left-[-50%] top-[50%] translate-y-[-50%]">
                <p class="text-[60px] text-[var(--color-green-700)]">Let's Shop At EcoMarket!</p>
                <button class="w-[539px] h-[47px] text-white bg-[var(--color-green-700)] rounded-[30px] font-bold">Check Order Status</button>
            </div>
        </div>
    </div>

    {{-- Shop Content --}}
    <div class="flex w-full flex-1 bg-[#FFF8E8] py-[30px]">
        {{-- Search Bar --}}
        <div class="h-full w-full flex flex-col items-center justify-center box-border py-[35px]">
            @csrf
            <form method="GET">
                <div class="flex gap-[15px] w-[822px] h-[60px] items-center justify-center box-border border-solid border-2 rounded-[65px] bg-white px-5">
                    <input type="text" class="flex-1 text-[18px] p-3 outline-none" placeholder="Search our ecoproducts"/>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </form>
            
            <div class="h-[65px] w-full"></div>

            {{-- Product Showcase --}}
            <div class="flex-1 w-full flex gap-2 justify-evenly">
                {{--3 items per row--}}
                {{-- Item Box --}}
                <div class="py-[30px] basis-[30%] flex justify-center">
                <div class="w-[376px] h-[543px] bg-white flex flex-col justify-between items-center py-[30px]">
                    <div class="flex flex-col items-center">
                        <img class="w-[232px] h-[277px]" src="{{asset("product-placeholder.png")}}" />
                        <p class="font-semibold text-[29px]">Product 1</p>
                        <p class="font-extralight text-[20px]">Rp25.000</p>
                    </div>
                    <button class="bg-[var(--color-green-700)] text-white w-[264px] h-[56px] text-[20px] font-semibold rounded-[20px]">Add to bag</button>
                </div>
                </div>
                
            </div>
        </div>
    </div>

@endsection