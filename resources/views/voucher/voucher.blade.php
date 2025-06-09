@extends('components.layouts.app.home-layout')

@section('content')
{{-- VoucherList Tab --}}
<div class="flex flex-1 h-full w-full flex-col">
    <div class="h-[260px] py-10 bg-[var(--color-cream-700)] flex justify-between items-center box-border px-20">
        <div class="flex flex-col gap-4 text-[var(--color-green-700)]">
            <p class="font-extrabold text-[50px]">Hello {{Auth::user()->username}}</p>
            <p class="font-semibold text-[35px]">Let's Reedeem Your Vouchers!</p>
        </div>
        <div class="flex flex-col">
            <div class="flex items-center gap-1">
                <img class="w-[65px] h-[65px]" src="{{asset("/carbon_footprint.png")}}"/>
                <p class="font-semibold text-[55px] text-[var(--color-green-700)]">{{ Auth::user()->points }}</p>
                <p class="font-semibold text-[35px]">points</p>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-[30px]">
    <div class="flex font-bold text-[25px] border-[var(--color-green-700)] rounded-2xl h-[77px] justify-center border-2 w-fit overflow-hidden">
        <div class="w-[273px] bg-[var(--color-green-700)] text-white flex items-center justify-center hover:cursor-pointer" id="tab-voucher-list" onclick="clickVoucherList()">Voucher List</div>
        <div class="w-[273px] text-[var(--color-green-700)] flex items-center justify-center hover:cursor-pointer" id="tab-my-voucher" onclick="clickMyVoucher()">My Vouchers</div>
    </div>
    </div>

    {{-- Voucher list --}}
    <div class="w-full flex gap-10 flex-wrap justify-center gap-y-4" id="voucher-list">
        <form>@csrf</form>
        @foreach($vouchers as $voucher)
        <div class=" py-6 px-6 flex flex-col justify-between items-center w-[396px] h-[396px] bg-white rounded-xl drop-shadow-lg">
            <div class="bg-black w-[358px] h-[220px]"></div>
            <p class="font-semibold text-[22px]">{{ $voucher->name }} Worth Rp{{ $voucher->amount }}</p>
            <div class="flex justify-between items-center w-full">
                <p class="text-[15px] text-gray-400">{{ $voucher->point_price }} Points</p>
                <div class="bg-[var(--color-green-700)] text-white text-center py-2 px-10 rounded-3xl font-semibold text-[20px]" onclick="handleRedeem({{ Auth::user()->points }}, {{ $voucher->id }}, {{ $voucher->point_price }})">Redeem</div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- my voucher list --}}
    <div class="py-10 w-full flex gap-10 flex-wrap justify-center gap-y-4 hidden" id="my-voucher-list">
        @foreach($user_vouchers as $user_voucher)
        <div class="flex gap-5 w-[612px] drop-shadow-md rounded-md">
            <img class="w-[181px]" src="{{ $user_voucher->voucher->image_path }}"/>
            <div class="flex flex-col gap-5 flex-1">
                <p class="font-semibold text-[22px]">{{ $user_voucher->voucher->name }}</p>
                <div class="flex flex-col gap-1 w-full text-[18px]">
                    <div class="flex w-full">
                        <p class="w-[50%] font-semibold">Redeem Date:</p>
                        <p>{{ $user_voucher->start_date->format('d M Y') }}</p>
                    </div>
                    <div class="flex w-full">
                        <p class="w-[50%] font-semibold">Expired Date:</p>
                        <p>{{ $user_voucher->end_date->format('d M Y') }}</p>
                    </div>
                    <div class="flex w-full">
                        <p class="w-[50%] font-semibold">Status:</p>
                        <p>Active</p>
                    </div>
                </div>
                <p class="italic text-[15px]">(Voucher code has been sent to your email)</p>
            </div>
        </div>
        @endforeach
    </div>

    <div class="fixed w-screen h-screen top-0 hidden" id="not-enough">
        <div class="w-full h-full absolute bg-[var(--color-cream-700)] opacity-[50%]"></div>
        <div class="absolute left-[50%] top-[50%] translate-[-50%] flex flex-col p-5 bg-white drop-shadow-2xl w-[723px]">
            <div class="w-full flex flex-col">
                <div class="flex justify-end">
                    <i class="fa-solid fa-circle-xmark flex text-[40px] text-[var(--color-green-700)] hover:cursor-pointer" onclick="closeNotEnoughButton()"></i>
                </div>
                <div class="flex flex-col w-full gap-5">
                    <div class="flex justify-center text-[40px] font-bold text-[var(--color-green-900)]">Oops!</div>
                    <div class="flex justify-center">
                        <i class="fa-solid fa-face-frown text-[128px] text-[var(--color-green-700)]" ></i>
                    </div>
                    <p class="font-semibold text-[22px] text-[var(--color-green-900)] text-center">You don’t have enough points to redeem this voucher yet. Keep collecting!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed w-screen h-screen top-0 hidden" id="enough">
        <div class="w-full h-full absolute bg-[var(--color-cream-700)] opacity-[50%]"></div>
        <div class="absolute left-[50%] top-[50%] translate-[-50%] flex flex-col p-5 bg-white drop-shadow-2xl w-[723px]">
            <div class="w-full flex flex-col">
                <div class="flex justify-end">
                    <i class="fa-solid fa-circle-xmark flex text-[40px] text-[var(--color-green-700)] hover:cursor-pointer" onclick="closeEnoughButton()"></i>
                </div>
                <div class="flex flex-col w-full gap-5">
                    <div class="flex justify-center text-[40px] font-bold text-[var(--color-green-900)]">Congratulations</div>
                    <div class="flex justify-center">
                        <i class="fa-solid fa-thumbs-up text-[128px] text-[var(--color-green-700)]" ></i>
                    </div>
                    <p class="font-semibold text-[22px] text-[var(--color-green-900)] text-center">The voucher has been successfully redeemed and you should receive a confirmation email within 24 hours of redeeming.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script defer>
function handleRedeem(user_point, id, point_price) {
    if(point_price > user_point) {
        openNotEnoughButton()
        return
    }

    openEnoughButton(id)
}

function closeNotEnoughButton() {
    const notEnough = document.getElementById("not-enough")

    notEnough.classList.add("hidden")
}

function openNotEnoughButton() {
    const notEnough = document.getElementById("not-enough")

    notEnough.classList.remove("hidden")
}

function closeEnoughButton() {
    const enough = document.getElementById("enough")

    enough.classList.add("hidden")

    window.location.reload()
}

function openEnoughButton(id) {
    const csrfToken = document.getElementsByName("_token")[0].value
    const enough = document.getElementById("enough")

    fetch("{{ route('voucher-redeem-post') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify({ id: id })
    })

    enough.classList.remove("hidden")
}

function enableVoucherList() {
    const voucherList = document.getElementById("voucher-list")
    voucherList.classList.remove("hidden")

    disableMyVoucher()
}

function disableVoucherList() {
    const voucherList = document.getElementById("voucher-list")
    voucherList.classList.add("hidden")
}

function enableMyVoucher() {
    const myVoucher = document.getElementById("my-voucher")
    myVoucher.classList.remove("hidden")

    disableVoucherList()
}

function disableMyVoucher() {
    const myVoucher = document.getElementById("my-voucher")
    myVoucher.classList.add("hidden")
}

function clickMyVoucher() {
    const myVoucherTab = document.getElementById("my-voucher-list")
    const voucherListTab = document.getElementById("voucher-list")

    const voucherList = document.getElementById("tab-voucher-list")
    const myVoucher = document.getElementById("tab-my-voucher")

    // Make voucher list to white
    voucherList.classList.remove("text-white")    
    voucherList.classList.remove("bg-[var(--color-green-700)]")
    voucherList.classList.add("text-[var(--color-green-700)]")
    voucherList.classList.add("bg-white")

    myVoucher.classList.remove("bg-white")
    myVoucher.classList.remove("text-[var(--color-green-700)]")
    myVoucher.classList.add("bg-[var(--color-green-700)]")
    myVoucher.classList.add("text-white")

    myVoucherTab.classList.remove("hidden")
    voucherListTab.classList.add("hidden")
}

function clickVoucherList() {
    const voucherListTab = document.getElementById("voucher-list")
    const myVoucherTab = document.getElementById("my-voucher-list")

    const voucherList = document.getElementById("tab-voucher-list")
    const myVoucher = document.getElementById("tab-my-voucher")

    // Make voucher list to white
    voucherList.classList.add("text-white")    
    voucherList.classList.add("bg-[var(--color-green-700)]")
    voucherList.classList.remove("text-[var(--color-green-700)]")
    voucherList.classList.remove("bg-white")

    myVoucher.classList.add("bg-white")
    myVoucher.classList.add("text-[var(--color-green-700)]")
    myVoucher.classList.remove("bg-[var(--color-green-700)]")
    myVoucher.classList.remove("text-white")

    myVoucherTab.classList.add("hidden")
    voucherListTab.classList.remove("hidden")
}
</script>