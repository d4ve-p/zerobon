@extends('components.layouts.app.home-layout')

@section('content')
<div class="min-h-screen bg-[#FFF8E8]">
    <div class="max-w-5xl mx-auto px-4 py-8 bg-[#fef8e9] min-h-screen">
        <a href="{{ route('social-activities') }}" class="text-green-600 flex font-semibold items-center mb-4">
            < Back to Social Activities
        </a>

        <h1 class="text-3xl md:text-3xl font-bold text-green-700 mb-5 text-center">{{ $activity->title }}</h1>

        <div class="flex items-center mb-6 font-semibold text-sm text-700">
            <i class="fas fa-user-circle text-green-700 mr-2 text-3xl"></i>
            Held by {{ $activity->organizer }}
        </div>

        <div class="rounded-xl overflow-hidden shadow-md mb-6">
            <img src="{{ asset($activity->photo) }}" alt="{{ $activity->title }}" class="w-full object-cover">
        </div>

        <div class="grid md:grid-cols-2 gap-6 bg-white p-6 rounded-xl shadow-md">
            <div>
                <h2 class="text-lg font-bold mb-4">Details</h2>
                <div class="space-y-2 text-sm text-gray-800">
                    <p><strong class="mr-11">Location</strong> : {{ $activity->location }}</p>
                    <p><strong class="mr-17">Date</strong> : {{ $activity->date }}</p>
                    <p><strong class="mr-17">Time</strong> : {{ $activity->time }}</p>
                    <p><strong class="mr-17">Slots</strong> : {{ $activity->slots }}</p>
                    <p><strong class="mr-19">Fee</strong> : {{ $activity->fee }}</p>
                    <p><strong class="mr-5">Registration</strong> : {{ $activity->registration }}</p>
                    <p><strong>Contact Person</strong> : {{ $activity->contact_person }}</p>
                </div>
            </div>

            <div class="text-center">
                <h2 class="text-lg font-bold mb-2">Scan or Click for Registration!</h2>
                <img src="{{ asset($activity->barcode_photo) }}" alt="Barcode" class="w-48 h-48 object-contain mx-auto border border-gray-300 rounded-md p-2">
            </div>
        </div>

        <div class="bg-white p-6 mt-6 rounded-xl shadow-md text-gray-800 text-sm leading-relaxed space-y-4">
             <h2 class="text-lg font-bold mb-4">Descriptions</h2>
            {!! nl2br(e($activity->description)) !!}
        </div>
    </div>
</div>
@endsection
