<div class="w-full h-[90px] py-3 flex justify-between box-border relative px-5">
    <img src="{{ asset('logo.png') }}" />
    <div class="flex items-center font-poppins text-[var(--color-green-700)] font-extrabold justify-center gap-[20px]">
        <p>Home</p>
        <p>Calculator</p>
        <p>News</p>
        <p>TreeFund</p>
        <p>EcoMarket</p>
        <p>Challenge</p>
        <p>GreenAct</p>
    </div>
    {{-- @cannot('isLoggedIn')
    <div class="p-1 h-full ">
        <button class="py-3 px-8 border-2 rounded-4xl border-solid border-[var(--color-green-700)]">Login</button>
    </div>
    @elsecan("isLoggedIn") --}}
    <div class="flex justify-center items-center gap-[40px]">
        <i class="fa-solid fa-cart-shopping fa-2x" style='color: brown'></i>
        <i class="fa-solid fa-bell fa-2x" style='color: green'></i>
        <i class="fa-solid fa-user fa-2x" style='color: green'></i>
    </div>
    {{-- @endcan --}}
</div>