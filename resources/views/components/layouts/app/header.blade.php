<div class="w-full h-[90px] py-3 flex justify-between box-border relative px-5">
    <img src="{{ asset('logo.png') }}" />
    <div class="flex items-center font-poppins text-[var(--color-green-700)] font-extrabold justify-center gap-[50px] text-[20px] absolute left-[50%] top-[50%] translate-[-50%]">
        <a  href="{{route("home")}}" 
            class="hover:cursor-pointer {{ request()->routeIs("home") ? 'underline font-bold' : "" }} ">
            Home</a>
        <a  href="{{route("carbon-footprint")}}"
            class="hover:cursor-pointer {{ request()->routeIs("carbon-footprint") ? 'underline font-bold' : "" }} "
        >Calculator</a>
        <a  href="{{route("articles")}}" 
            class="hover:cursor-pointer {{ request()->routeIs("articles") ? 'underline font-bold' : "" }} ">News</a>
        <a  href="{{ route("tree-fund") }}"
            class="hover:cursor-pointer {{ request()->routeIs("tree-fund") ? 'underline font-bold' : "" }} ">TreeFund</a>
        @auth
            <a  href="{{route("products")}}" 
                class="hover:cursor-pointer {{ request()->routeIs("products") ? 'underline font-bold' : "" }} ">EcoMarket</a>
            <a  href="{{route("challenge")}}" 
                class="hover:cursor-pointer {{ request()->routeIs("challenge") ? 'underline font-bold' : "" }} ">Challenge</a>
            <a href="{{ route("social-activities") }}" 
            class="hover:cursor-pointer {{ request()->routeIs("social-activities") ? 'underline font-bold' : "" }} ">GreenAct</a>
        @endauth
        
    </div>
    {{-- @cannot('isLoggedIn')
    <div class="p-1 h-full ">
        <button class="py-3 px-8 border-2 rounded-4xl border-solid border-[var(--color-green-700)]">Login</button>
    </div>
    @elsecan("isLoggedIn") --}}
    <div class="flex justify-center items-center gap-[40px]">
        @auth
            <a class="hover:cursor-pointer" href="{{ route("carts") }}"><i class="fa-solid fa-cart-shopping fa-2x text-[var(--color-green-700)]"></i></a>
        @endauth
        <div class="relative">
            <i class="fa-solid fa-user fa-2x hover:cursor-pointer" id="profile" style='color: green'></i>
            <div class="absolute top-[110%] right-[0] z-[1000]">
                @auth
                    <div id="profile-overlay"
                        class="hidden bg-white drop-shadow-md border-t-2 border-[var(--color-green-700)] w-[269px] flex flex-col pt-3 items-center">
                        <div
                            class="w-[108px] h-[108px] rounded-[50%] overflow-hidden border-2 border-[var(--color-green-700)] flex items-center justify-center">
                            <i class="fa-solid fa-user text-[var(--color-green-700)] text-[50px]"></i>
                        </div>
                        <p class="font-extrabold text-[18px] text-[var(--color-green-700)]">{{ Auth::user()->username }}</p>
                        <a class="underline text-[14px] text-[var(--color-green-700)]"
                            href="{{ route("edit.profile") }}">Edit profile</a>
                        <div class="flex gap-2 items-center">
                            <img class="h-[25px] w-[25px]" src="{{ asset("carbon_footprint.png") }}" />
                            <p class="font-semibold text-[20px] text-[var(--color-green-900)]">{{ Auth::user()->points }}
                                points</p>
                        </div>
                        <a href="{{route("vouchers")}}"
                            class="w-full px-3 py-2 flex gap-5 items-center border-b-2 border-[var(--color-green-700)] hover:cursor-pointer">
                            <i class="fa-solid fa-ticket-simple text-[var(--color-green-700)] text-[20px]"></i>
                            <p class="font-extrabold text-[15px] text-[var(--color-green-700)]">Redeem Your Vouchers</p>
                        </a>
                        <a href="{{route("faq")}}"
                            class="w-full px-3 py-2 flex gap-5 items-center border-b-2 border-[var(--color-green-700)] hover:cursor-pointer">
                            <i class="fa-solid fa-circle-question text-[var(--color-green-700)] text-[20px]"></i>
                            <p class="font-extrabold text-[15px] text-[var(--color-green-700)]">FAQs</p>
                        </a>
                        <a href="{{route("logout")}}" class="w-full px-3 py-2 flex gap-5 items-center hover:cursor-pointer">
                            <i class="fa-solid fa-door-open text-[var(--color-green-700)] text-[20px]"></i>
                            <p class="font-extrabold text-[15px] text-[var(--color-green-700)]">Logout</p>
                        </a>
                    </div>
                @else
                    <div id="profile-overlay"
                        class="hidden bg-white drop-shadow-md border-t-2 border-[var(--color-green-700)] w-[269px] flex flex-col pt-3 items-center">
                        <div
                            class="w-[108px] h-[108px] rounded-[50%] overflow-hidden border-2 border-[var(--color-green-700)] flex items-center justify-center">
                            <i class="fa-solid fa-user text-[var(--color-green-700)] text-[50px]"></i>
                        </div>
                        <p class="font-extrabold text-[18px] text-[var(--color-green-700)]">Not Login</p>
                        <a href="{{route("faq")}}"
                            class="w-full px-3 py-2 flex gap-5 items-center border-b-2 border-[var(--color-green-700)] hover:cursor-pointer">
                            <i class="fa-solid fa-circle-question text-[var(--color-green-700)] text-[20px]"></i>
                            <p class="font-extrabold text-[15px] text-[var(--color-green-700)]">FAQs</p>
                        </a>
                        <a href="{{route("login")}}" class="w-full px-3 py-2 flex gap-5 items-center hover:cursor-pointer">
                            <i class="fa-solid fa-door-open text-[var(--color-green-700)] text-[20px]"></i>
                            <p class="font-extrabold text-[15px] text-[var(--color-green-700)]">Login</p>
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
    {{-- @endcan --}}
</div>

<script defer>
    window.onload = () => {

        const profile = document.getElementById("profile")
        const profileOverlay = document.getElementById("profile-overlay")

        profile.addEventListener('click', () => {
            if (profileOverlay.classList.contains("hidden")) profileOverlay.classList.remove("hidden")
            else profileOverlay.classList.add("hidden")
        })



    }
</script>