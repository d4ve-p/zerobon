@extends('components.layouts.app.empty-layout')

@section('content')
<div class="relative flex flex-col gap-6 w-screen h-screen flex-1 items-center justify-center">
    <img class="w-full h-full object-cover absolute z-[-1]" src="{{ asset('auth-bg.png') }}"/>
    <div class="w-[1163px] flex bg-white drop-shadow-lg">
        <div class="relative w-[543px] h-[786px]">
            <img class="w-[543px] h-[786px] absolute" src="{{ asset('auth-design.png') }}"/>
            <div class="flex absolute top-[40%] left-[50%] translate-[-50%] flex-col w-full px-[50px] gap-8">
                <p class="text-[40px] font-bold drop-shadow-lg text-white">Welcome to Zerobon</p>
                <p class="text-[26px] font-semibold drop-shadow-lg text-white">Join Zerobon Membership & Support a Greener Future! Your account will only be active if you join Zerobon as a member.</p>
            </div>
        </div>
         <!-- Right Panel -->
        <div class="flex-1 bg-white flex flex-col items-center py-10 px-8 justify-between">
            
            <!-- Header -->
            <div class=" text-green-700  w-full text-center mt- 5 py-15 font-bold text-4xl rounded-lg">
                Monthly Membership Fee
            </div>

            <!-- Features -->
            <div class="w-full px-6 py-6 space-y-5 text-gray-800 text-[16px] font-medium">
                <div class="flex gap-3 items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-green-600 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    <p class="text-2xl">Access Eco-friendly challenges and Earn Rewards</p>
                </div>
                <div class="flex gap-3 items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-green-600 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    <p class="text-2xl">Exclusive discounts on Our EcoMarket</p>
                </div>
                <div class="flex gap-3 items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-green-600 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    <p class="text-2xl">Easy Information Access to Green Activities</p>
                </div>
                <div class="flex gap-3 items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-green-600 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    <p class="text-2xl mt-1">Easy activation via email</p>
                </div>
            </div>

            <!-- Price & Button -->
            <div class="w-full flex flex-col items-center gap-10 px-6 mb-10">
                <p class="text-[30px] font-bold text-gray-900">Rp10.000/month</p>
                <a href="#"
                    class="bg-green-600 hover:bg-green-700 text-white w-[450px] h-[55px] text-[18px] font-bold rounded-full cursor-pointer flex items-center justify-center">
                    Join
                </a>
            </div>

        </div>
    </div> 
</div>
@endsection