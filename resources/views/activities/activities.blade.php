@extends('components.layouts.app.home-layout')

@section('content')

<div class="min-h-screen bg-[#FFF8E8]">
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center bg-no-repeat py-60"
            style="background-image: url('{{ asset('activities-hero-bg.jpeg') }}');">
        <div class="relative z-10 flex items-center justify-center h-full">
            <h1 class="text-5xl lg:text-5xl font-extrabold text-white text-center drop-shadow-[2px_2px_0px_rgba(0,0,0,0.6)]">
                Green Today, Better Tomorrow - Join Us!
            </h1>
        </div>
    </section>

    {{-- Search Bar --}}
    <div class="max-w-4xl mx-auto mt-10 mb-8 px-4">
        <form action="{{ route('social-activities.search') }}" method="GET" class="relative bg-white rounded-full shadow border border-gray-300">
            <input type="text" name="search" placeholder="Search social activities..." value="{{ request('search') }}" class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500">
            <button class="absolute right-4 top-2 text-green-700"><i class="fas fa-search" type="submit"></i></button>
        </form>
    </div>

    {{-- Activities Grid --}}
    <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($activities as $activity)
            <a href="{{ route('social-activities.detail', ['id' => $activity->id]) }}">
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <img src="{{ asset($activity->photo) }}" alt="{{ $activity->title }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-1">{{ $activity->title }}</h2>
                        <p class="text-600 text-sm mb-1">{{ $activity->location }}</p>
                        <p class="text-500 text-sm">{{ $activity->date }}</p>
                        <div class="mt-5 flex justify-between items-center text-sm text-gray-600">
                                <p class="text-600 text-sm">by {{ $activity->organizer }}</p>
                                <p class="text-gray-500 text-sm">{{ $activity->slots }} Slots</p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="hidden sm:flex sm:items-center sm:justify-center mt-10 mb-10">
        {{ $activities->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection
