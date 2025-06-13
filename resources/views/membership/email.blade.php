@extends('components.layouts.app.empty-layout')

@section('content')
<div class="flex flex-col items-center justify-center w-screen h-screen bg-gradient-to-br from-green-100 via-green-200 to-green-300">
    <div class="bg-white rounded-xl px-10 py-10 shadow-md w-[600px] flex flex-col items-center gap-6 relative">

        <!-- Icon (Avatar style) -->
        <div class="absolute -top-10">
            <img src="{{ asset('check-email.jpeg') }}" alt="Email Icon" class="w-30 h-30 rounded-full border-4 border-white shadow-lg" />
        </div>

        <div class="pt-10"></div>

        <!-- Title -->
        <p class="text-lg font-bold text-center text-gray-800">
            Check Your Email for Account Activation!
        </p>

        <!-- Description -->
        <p class="text-center text-gray-700 font-semibold leading-relaxed text-justify">
            To activate your account and access all exclusive features, please check your email for the activation link we have sent.
            Follow the instructions in the email to complete the setup.
        </p>

        <!-- Next Button -->
        <a href="{{ route('membership.success') }}"
           class="bg-green-600 hover:bg-green-700 text-white text-sm font-semibold text-center py-3 px-8 w-50 rounded-full transition duration-200">
            Next
        </a>

        <!-- Contact Help -->
        <p class="text-sm text-gray-600">
            Need help?
            <a href="" class="text-green-600 hover:underline font-medium">Contact Us</a>
        </p>
    </div>
</div>
@endsection
