<div class="w-full h-[90px] py-3 flex justify-between box-border relative px-5">
    <img src="{{ asset('logo.png') }}" />
    <div class="flex items-center font-poppins text-[var(--color-green-700)] font-extrabold justify-center gap-[20px]">
        <a href="{{route("home")}}" class="hover:cursor-pointer">Home</a>
        <a>Calculator</a>
        <a href="{{route("articles")}}" class="hover:cursor-pointer">News</a>
        <a>TreeFund</a>
        <a href="{{route("products")}}" class="hover:cursor-pointer">EcoMarket</a>
        @auth
        <a href="{{route("challenge")}}" class="hover:cursor-pointer">Challenge</a>
        @endauth
        <a>GreenAct</a>
    </div>
    {{-- @cannot('isLoggedIn')
    <div class="p-1 h-full ">
        <button class="py-3 px-8 border-2 rounded-4xl border-solid border-[var(--color-green-700)]">Login</button>
    </div>
    @elsecan("isLoggedIn") --}}
    <div class="flex justify-center items-center gap-[40px]">
        @auth
        <a class="hover:cursor-pointer"><i class="fa-solid fa-cart-shopping fa-2x" style='color: brown'></i></a>
        @endauth
        <i class="fa-solid fa-bell fa-2x" style='color: green'></i>
        @auth
        @else
        <a href="{{ route('login') }}"><i class="fa-solid fa-user fa-2x" style='color: green'></i></a>
        @endauth
    </div>
    {{-- @endcan --}}
</div>