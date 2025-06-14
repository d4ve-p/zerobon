@extends('components.layouts.app.empty-layout')

@section('content')
<div class="min-h-screen bg-[#fef7ea] flex flex-col items-center justify-center px-4">
    <!-- Back Button -->
    <div class="w-full max-w-md mb-4">
        <a href="#" class="text-green-700 text-sm font-semibold flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Register
        </a>
    </div>

    <!-- Payment Card -->
    <div class="w-full max-w-md bg-white rounded-xl shadow p-6 space-y-4">
        <h2 class="text-center text-lg font-bold text-gray-800">Waiting Payment</h2>

        <!-- Payment Countdown -->
        <div class="border border-green-500 bg-green-50 rounded-lg px-4 py-2 flex justify-between text-sm font-medium text-green-700">
            <span>Complete Your Payment In</span>
            <span>14 May 2025, 15.24 WIB</span>
        </div>

        <!-- Payment Details -->
        <div class="space-y-2 text-sm text-gray-800">
            <div class="flex justify-between">
                <span class="font-semibold">Donation Number</span>
                <span class="font-semibold">CHDUXWTYRU</span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold">BCA Virtual Account</span>
                <span class="font-semibold">37848124567890</span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold">Subtotal</span>
                <span class="font-semibold">Rp10.000</span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold">Admin Fee</span>
                <span class="font-semibold">Rp1.000</span>
            </div>
            <div class="flex justify-between font-bold">
                <span>Total</span>
                <span>Rp10.500</span>
            </div>
        </div>

        <!-- Button -->
        <div>
        <a href="{{ route('email') }}" class="w-full block text-center bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-semibold">
            Verify Payment
        </a>

        </div>
    </div>
</div>
@endsection
