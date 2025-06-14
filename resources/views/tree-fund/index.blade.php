@extends('components.layouts.app.home-layout')

@section('content')
<div class="flex flex-1 w-full items-center">
    <div class="flex-1/2">
        <div class="w-full h-full">
            <img src="{{ asset("tree-fund.png") }}" class="w-full h-full object-cover" />
        </div>
    </div>
    <div class="flex-1/2 flex bg-[var(--color-cream-500)] flex-col px-8 items-center py-4">
        <p class="text-[var(--color-green-700)] font-bold text-[40px]">Plant Trees</p>
        <p class="text-[var(--color-green-700)] font-bold text-[40px]">Change the World!!!</p>
        <p class="text-[var(--color-green-700)] text-[30px]">Help restore forests and revive nature</p>
        <div class="flex flex-col py-4 px-4 bg-[var(--color-cream-700)] w-full">
            <div class="flex flex-wrap w-full gap-5 justify-center">
                <div onclick="setTreeCount(1)" class="bg-[var(--color-green-700)] text-white w-[175px] py-4 font-semibold text-[20px] rounded-2xl text-center hover:cursor-pointer">1 Tree</div>
                <div onclick="setTreeCount(5)"  class="bg-[var(--color-green-700)] text-white w-[175px] py-4 font-semibold text-[20px] rounded-2xl text-center hover:cursor-pointer">5 Trees</div>
                <div onclick="setTreeCount(10)"  class="bg-[var(--color-green-700)] text-white w-[175px] py-4 font-semibold text-[20px] rounded-2xl text-center hover:cursor-pointer">10 Trees</div>
                <div onclick="setTreeCount(20)"  class="bg-[var(--color-green-700)] text-white w-[175px] py-4 font-semibold text-[20px] rounded-2xl text-center hover:cursor-pointer">20 Trees</div>
                <div onclick="setTreeCount(50)"  class="bg-[var(--color-green-700)] text-white w-[175px] py-4 font-semibold text-[20px] rounded-2xl text-center hover:cursor-pointer">50 Trees</div>
                <div onclick="setTreeCount(100)"  class="bg-[var(--color-green-700)] text-white w-[175px] py-4 font-semibold text-[20px] rounded-2xl text-center hover:cursor-pointer">100 Trees</div>
            </div>
            <div class="w-full h-[10px]"></div>
            <p class="font-bold text-[16px] text-[var(--color-green-700)]">Enter other amounts here:</p>
            <div class="flex gap-4">
                <div class="flex bg-white border-2 border-black">
                    <input id="tree-count" type="number" class="w-[311px] text-[18px] font-semibold outline-none px-2 py-1" />
                    <div class="h-full w-1 bg-black"></div>
                    <div class="h-full flex items-center justify-center px-2 py-1">Trees</div>
                </div>
                <p class="font-bold text-[24px] text-[var(--color-green-900)]">Rp10.000/Tree</p>
            </div>
            <div class="w-full h-[10px]"></div>
                <input type="submit" value="Donate" onclick="showDonateDetails()" class="w-full py-2 text-white bg-[var(--color-green-700)] rounded-sm font-semibold text-[20px]" />
        </div>
    </div>
    </div>
</div>
<div class="fixed w-screen h-screen hidden" id="overlay">
    <div class="w-full h-full bg-black opacity-50"></div>

    {{-- Donate Details --}}
    <div class="flex w-[800px] items-center flex-col absolute left-[50%] top-[50%] translate-[-50%] bg-[var(--color-cream-500)] px-8 py-5 rounded-2xl hidden" id="donate-details">
        <div class="w-full flex justify-end" onclick="closeDonateDetails()"><i class="fa-solid fa-circle-xmark text-[30px] text-[var(--color-green-700)] hover:cursor-pointer"></i></div>
        <p class="font-bold text-[30px]">Donate Details</p>
        <div class="flex w-full justify-between mb-2">
            <p class="font-bold text-[24px] text-[var(--color-green-700)]">Donate to TreeFund</p>
            <p class="font-bold text-[24px] text-[var(--color-green-700)]">Rp10.000/Tree</p>
        </div>
        <form class="flex w-full flex-col gap-3">
            @csrf
            <input type="text" class="px-3 py-1 font-semibold text-[20px] outline-none border-2 border-[var(--color-green-700)]" placeholder="Full Name / Company Name"/>
            <input type="email" class="px-3 py-1 font-semibold text-[20px] outline-none border-2 border-[var(--color-green-700)]" placeholder="Email"/>
            <input type="text" class="px-3 py-1 font-semibold text-[20px] outline-none border-2 border-[var(--color-green-700)]" placeholder="Phone Number"/>
            <div class="gap-2 flex w-full items-center">
                <div class="flex px-3 py-1 font-semibold text-[20px] border-[var(--color-green-700)] border-2 bg-white w-fit">
                    <input type="text" class="w-[254px] outline-none" value="" id="confirmation-tree-count" disabled />
                    <div class="w-0.5px] h-full bg-black"></div>
                    <div class="px-2 py-1">Tree(s)</div>
                </div>

                <p class="text-[20px] font-semibold">Rp.<span id="donation-price"></span> + 1.000 admin</p>
            </div>
        </form>
        <p class="font-bold text-[20px]">Payment Details</p>

        <div class="w-[full] h-[15px]"></div>
        <div class="text-center w-[478px] py-2 bg-[var(--color-green-700)] rounded-md text-white font-semibold text-[22px]" onclick="showDonateConfirm()">Pay Now</div>
    </div>

    {{-- Donation Confirmation --}}
    <div class="w-[800px] items-center flex flex-col absolute left-[50%] top-[50%] translate-[-50%] bg-[var(--color-cream-500)] px-8 py-5 rounded-2xl hidden" id="donate-confirm">
        <div class="w-full flex justify-end" onclick="closeDonateConfirm()"><i class="fa-solid fa-circle-xmark text-[30px] text-[var(--color-green-700)] hover:cursor-pointer"></i></div>
        <p class="font-extrabold text-[40px] text-[var(--color-green-700)]">Congratulations!</p>
        <img class="w-[317px] h-auto" src="{{ asset("donate-congrats.png") }}"/>
        <p class="text-wrap text-[25px] font-medium text-center">Thank you for your generous tree donation! Your contribution helps create a greener, healthier planet for future generations. As a token of appreciation, you will receive an e-certificate via email.</p>
    </div>
    
</div>
@endsection

<script>
    function setTreeCount(value) {
        const inputContainer = document.getElementById("tree-count")
        const confirmationContainer = document.getElementById("confirmation-tree-count")
        const priceContainer = document.getElementById("donation-price")

        inputContainer.value = value
        confirmationContainer.value = value
        priceContainer.innerHTML = value * 10000
    }

    function showDonateDetails() {
        closeDonateConfirm()

        const overlay = document.getElementById("overlay")
        const donateDetails = document.getElementById("donate-details")

        overlay.classList.remove("hidden")
        donateDetails.classList.remove("hidden")
    }

    function closeDonateDetails() {
        const overlay = document.getElementById("overlay")
        const donateDetails = document.getElementById("donate-details")

        if(!overlay.classList.contains("hidden")) overlay.classList.add("hidden")
        if(!donateDetails.classList.contains("hidden")) donateDetails.classList.add("hidden")
    }

    function showDonateConfirm() {
        closeDonateDetails()

        const overlay = document.getElementById("overlay")
        const donateConfirm = document.getElementById("donate-confirm")

        overlay.classList.remove("hidden")
        donateConfirm.classList.remove("hidden")
    }

    function closeDonateConfirm() {
        const overlay = document.getElementById("overlay")
        const donateConfirm = document.getElementById("donate-confirm")

        if(!overlay.classList.contains("hidden")) overlay.classList.add("hidden")
        if(!donateConfirm.classList.contains("hidden")) donateConfirm.classList.add("hidden")
    }
</script>