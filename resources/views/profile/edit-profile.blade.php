@extends('components.layouts.app.empty-layout')

@section('content')
<div class="relative flex flex-col gap-6 w-screen h-screen flex-1 items-center justify-center">
    <img class="w-full h-full object-cover absolute z-[-1]" src="{{ asset('auth-bg.png') }}"/>
    <div class="w-[1163px] flex bg-white drop-shadow-lg">
        <div class="relative w-[543px] h-[786px]">
            <img class="w-[543px] h-[786px] absolute" src="{{ asset('auth-design.png') }}"/>
            <div class="flex absolute top-[40%] left-[50%] translate-[-50%] flex-col w-full px-[50px] gap-8">
                <p class="text-[40px] font-bold drop-shadow-lg text-white">Welcome to Zerobon</p>
                <p class="text-[26px] font-semibold drop-shadow-lg text-white">Thank you for joining us. A new world full of opportunities awaits!</p>
            </div>
        </div>
        <form class="flex flex-col mt-6 gap-2 px-[40px] py-[20px]">
        <p class="text-[36px] font-bold">Edit Profile</p>

        <div class="flex flex-col">
            <!-- Label dan Icon -->
            <label for="fullname" class="flex items-center gap-2 text-black font-semibold text-[16px]">
                <i class="fa-solid fa-user text-[20px]"></i>
                Full Name
            </label>

            <!-- Input dengan border rounded -->
            <div class="flex border-2 border-black rounded-[50px] h-[50px] w-[508px] items-center px-6 py-4 gap-6">
                <input
                type="text"
                id="fullname"
                required
                autofocus
                autocomplete="name"
                class="flex-1 outline-none text-[18px] font-medium text-gray-600 bg-transparent"
                value="{{Auth::user()->fullname}}"
                />
            </div>
        </div>
        
         <div class="flex flex-col">
            <!-- Label dan Icon -->
            <label for="username" class="flex items-center gap-2 text-black font-semibold text-[16px]">
                <i class="fa-solid fa-user text-[20px]"></i>
                Username
            </label>
            <div class="flex border-2 border-black rounded-[50px] h-[50px] w-[508px] items-center px-6 py-4 gap-6">
                <i class="fa-solid fa-user text-[20px]"></i>
                <input
                    type="text"
                    required
                    autofocus
                    autocomplete="username"
                    id="username"
                    class="outline-none text-[18px] font-medium"
                    value="{{Auth::user()->username}}"
                />
            </div>
            <p class="text-[12px] px-6 w-[508px]">*3–20 characters, letters, numbers, dots, or underscores. Must start with a letter, no spaces or special characters</p>
         </div>
       
        {{-- Address --}}
         <div class="flex flex-col">
            <label for="address" class="flex items-center gap-2 text-black font-semibold text-[16px] mb-3">
                <i class="fa-solid fa-location-dot text-[20px]"></i>
                Address
            </label>
            <div class="flex border-2 border-black rounded-[50px] h-[50px] w-[508px] items-center px-6 py-4 gap-6 mt-[-14px]">
                <input
                    type="text"
                    required
                    autofocus
                    autocomplete="address"
                    id="address"
                    class="outline-none text-[18px] font-medium flex-1"
                    value="{{Auth::user()->address}}"
                />
             </div>

         </div>
                 
        {{-- Phone Number --}}
         <div class="flex flex-col">
            <!-- Label dan Icon -->
            <label for="phoneNumber" class="flex items-center gap-2 text-black font-semibold text-[16px]">
                <i class="fa-solid fa-phone text-[20px]"></i>
                Phone Number
            </label>
             <div class="flex border-2 border-black rounded-[50px] h-[50px] w-[508px] items-center px-6 py-4 gap-6">
                <input
                    type="text"
                    required
                    autofocus
                    autocomplete="phone"
                    id="phone"
                    class="outline-none text-[18px] font-medium flex-1"
                    value="{{Auth::user()->phone}}"
                />
         </div>
         </div>

        {{-- Email Address --}}
         <div class="flex flex-col">
            <!-- Label dan Icon -->
            <label for="email" class="flex items-center gap-2 text-black font-semibold text-[16px]">
                <i class="fa-solid fa-envelope text-[20px]"></i>
                Email Address
            </label>
            <div class="flex border-2 border-black rounded-[50px] h-[50px] w-[508px] items-center px-6 py-4 gap-6">
                <input
                    type="email"
                    required
                    autofocus
                    autocomplete="email"
                    id="email"
                    class="outline-none text-[18px] font-medium flex-1"
                    value="{{Auth::user()->email}}"
                />
            </div>
         </div>

        {{-- Password --}}
        <div class="flex flex-col">
            <!-- Label dan Icon -->
            <label for="email" class="flex items-center gap-2 text-black font-semibold text-[16px]">
                 <i class="fa-solid fa-lock text-[20px]"></i>
                Password
            </label>
            <div class="flex border-2 border-black rounded-[50px] h-[50px] w-[508px] items-center px-6 py-4 gap-6">
            <input
                type="password"
                required
                autofocus
                autocomplete="password"
                id="password"
                class="outline-none text-[18px] font-medium flex-1"
            />
        </div>
        </div>

        <div>
            <h3 class="ml-95 text-gray-500 mb-1">Forgot Password?</h3>
        </div>
     
        <div class="w-full flex items-center justify-center rounded-[15px]">
            <input type="submit" value="Cancel" class="border-[2px] border-green-700 bg-white text-green-700 w-[225px] h-[50px] text-[20px] font-bold rounded-[30px] mr-13"/>
            <input type="submit" value="Save" class="bg-[var(--color-green-700)] text-white w-[225px] h-[50px] text-[20px] font-bold rounded-[30px]"/>
        </div>

    </form>
    </div> 
</div>
@endsection