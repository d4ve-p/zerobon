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
        <form wire:submit.prevent="register" class="flex flex-col gap-6 px-[40px] py-[20px]">
        <p class="text-[36px] font-bold">Register</p>

        <!-- Full Name -->
        <div class="flex border-2 border-black rounded-[50px] h-[50px] w-[508px] items-center px-6 py-4 gap-6">
            <i class="fa-solid fa-user text-[20px]"></i>
            <input
                wire:model="fullname"
                type="text"
                required
                autofocus
                autocomplete="full-name"
                placeholder="Full Name"
                id="fullname"
                class="outline-none text-[18px] font-medium flex-1"
            />
        </div>
        
        <div class="flex flex-col">
            {{-- Username --}}
            <div class="flex border-2 border-black rounded-[50px] h-[50px] w-[508px] items-center px-6 py-4 gap-6">
                <i class="fa-solid fa-user text-[20px]"></i>
                <input
                    wire:model="username"
                    type="text"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Username"
                    id="username"
                    class="outline-none text-[18px] font-medium"
                />
            </div>
            <p class="text-[12px] px-6 w-[508px]">*3–20 characters, letters, numbers, dots, or underscores. Must start with a letter, no spaces or special characters</p>
        </div>

        {{-- Address --}}
        <div class="flex border-2 border-black rounded-[50px] h-[50px] w-[508px] items-center px-6 py-4 gap-6 mt-[-14px]">
            <i class="fa-solid fa-location-dot text-[20px]"></i>
            <input
                wire:model="address"
                type="text"
                required
                autofocus
                autocomplete="address"
                placeholder="Address"
                id="address"
                class="outline-none text-[18px] font-medium flex-1"
            />
        </div>
        
        {{-- Phone Number --}}
        <div class="flex border-2 border-black rounded-[50px] h-[50px] w-[508px] items-center px-6 py-4 gap-6">
            <i class="fa-solid fa-phone text-[20px]"></i>
            <input
                wire:model="phone"
                type="text"
                required
                autofocus
                autocomplete="phone"
                placeholder="Phone Number"
                id="phone"
                class="outline-none text-[18px] font-medium flex-1"
            />
        </div>

        {{-- Email Address --}}
        <div class="flex border-2 border-black rounded-[50px] h-[50px] w-[508px] items-center px-6 py-4 gap-6">
            <i class="fa-solid fa-envelope text-[20px]"></i>
            <input
                wire:model="email"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="Email Address"
                id="email"
                class="outline-none text-[18px] font-medium flex-1"
            />
        </div>


        {{-- Password --}}
        <div class="flex border-2 border-black rounded-[50px] h-[50px] w-[508px] items-center px-6 py-4 gap-6">
            <i class="fa-solid fa-lock text-[20px]"></i>
            <input
                wire:model="password"
                type="password"
                required
                autofocus
                autocomplete="password"
                placeholder="Password"
                id="password"
                class="outline-none text-[18px] font-medium flex-1"
            />
        </div>

        {{-- Password --}}
        <div class="flex border-2 border-black rounded-[50px] h-[50px] w-[508px] items-center px-6 py-4 gap-6">
            <i class="fa-solid fa-lock text-[20px]"></i>
            <input
                wire:model="confirm"
                type="password"
                required
                autofocus
                autocomplete="confirm-password"
                placeholder="Confirm Password"
                id="confirm-password"
                class="outline-none text-[18px] font-medium flex-1"
            />
        </div>

        <div class="w-full flex items-center justify-center rounded-[15px]">
            <input type="submit" value="Register" class="bg-[var(--color-green-700)] text-white w-[365px] h-[55px] text-[20px] font-bold rounded-[30px]"/>
        </div>

        <div class="flex gap-2 w-full justify-center text-[16px]">
            <p class="font-medium">Already have an account?</p>
            <a class="font-semibold hover:cursor-pointer text-[var(--color-blue-500)]" href="{{route('login')}}">Login</a>
        </div>
    </form>
    </div> 
</div>
