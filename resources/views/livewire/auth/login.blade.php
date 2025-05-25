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
        <form wire:submit.prevent="register" class="flex flex-col gap-6 px-[40px] py-[20px] justify-center">
        <p class="text-[48px] font-bold">Sign In</p>

        <!-- Full Name -->
        <div class="flex border-2 border-black rounded-[50px] h-[50px] w-[508px] items-center px-6 py-4 gap-6">
            <i class="fa-solid fa-user text-[20px]"></i>
            <input
                wire:model="account"
                type="text"
                required
                autofocus
                autocomplete="account"
                placeholder="Username or Email"
                id="account"
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

        <div class="flex gap-4">
            <input type="checkbox" name="remember-me" id="remember-me" class="w-[25px] h-[25px] outline-none border-none"/>
            <label for="remember-me" class="text-[16px] font-medium">Remember Me</label>
        </div>

        <div class="w-full flex items-center justify-center rounded-[15px]">
            <input type="submit" value="Login" class="bg-[var(--color-green-700)] text-white w-[365px] h-[55px] text-[20px] font-bold rounded-[30px]"/>
        </div>

        <div class="flex gap-2 w-full justify-center text-[16px]">
            <p class="font-medium">New Here?</p>
            <a class="font-semibold hover:cursor-pointer text-[var(--color-blue-500)]" href="{{route('register')}}">Create an Account</a>
        </div>
    </form>
    </div> 
</div>
