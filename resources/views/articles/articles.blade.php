@extends('components.layouts.app.home-layout')
@section('content')

<div class="bg-[url('/images/hero-banner.jpg')] bg-cover bg-center h-[620px] relative">
    <div class="absolute inset-0 flex items-center justify-center">
        <h1 class="text-white text-5xl font-bold drop-shadow-lg">Today’s Headline!!!</h1>
    </div>
</div>

<div class="container mx-auto px-4 mt-10 grid grid-cols-12 gap-6">
    <!-- Left Column (Main Article + others) -->
    @php $main = $articles->first(); @endphp
    @if ($main)
    <div class="mb-10">
        <img src="{{ asset($main->photo) }}" alt="{{ $main->title }}" class="rounded-md mb-4 w-full h-64 object-cover">
        <h2 class="text-2xl font-bold mb-2">{{ $main->title }}</h2>
        <p class="text-sm text-gray-500 mb-2">🖊️ {{ $main->author }} | 📅 {{ \Carbon\Carbon::parse($main->publish_date)->format('d M Y') }}</p>
        <p class="text-gray-700">
            {{ \Illuminate\Support\Str::limit($main->description, 200) }}
        </p>
    </div>
    @endif

    <!-- Other Articles (selain artikel pertama) -->
    <div class="space-y-6">
        @foreach ($articles->skip(1) as $article)
        <div class="flex gap-4">
            <img src="{{ asset($article->photo) }}" alt="{{ $article->title }}" class="w-32 h-20 object-cover rounded-md">
            <div>
                <h3 class="font-semibold text-lg">{{ $article->title }}</h3>
                <p class="text-sm text-gray-500">{{ $article->author }} | {{ \Carbon\Carbon::parse($article->publish_date)->format('d M Y') }}</p>
            </div>
        </div>
        @endforeach
    </div>

        <!-- Pagination -->
        <div class="mt-8 flex space-x-2">
            <button class="w-8 h-8 bg-green-600 text-white rounded-full">1</button>
            <button class="w-8 h-8 bg-green-100 text-green-600 rounded-full">2</button>
            <button class="w-8 h-8 bg-green-100 text-green-600 rounded-full">3</button>
        </div>
    </div>

    <!-- Right Column (Sidebar) -->
    <div class="col-span-4">
        <!-- Search Box -->
        <div class="mb-6">
            <input type="text" placeholder="Search Articles" class="w-full p-2 border rounded-md">
        </div>

        <!-- Sidebar Articles -->
        <div class="space-y-4">
            <div class="flex gap-2">
                <img src="/images/thumb1.jpg" class="w-16 h-16 rounded-md object-cover">
                <div>
                    <p class="text-sm font-semibold">Bali Bans Production of Single-Use Plastic Bottled Water</p>
                    <p class="text-xs text-gray-500">Author 2 | 1 March 2025</p>
                </div>
            </div>

            <div class="flex gap-2">
                <img src="/images/thumb2.jpg" class="w-16 h-16 rounded-md object-cover">
                <div>
                    <p class="text-sm font-semibold">Indonesia to Launch Forest-Based Carbon Offset Trading</p>
                    <p class="text-xs text-gray-500">Author 2 | 2 March 2025</p>
                </div>
            </div>

            <div class="flex gap-2">
                <img src="/images/thumb3.jpg" class="w-16 h-16 rounded-md object-cover">
                <div>
                    <p class="text-sm font-semibold">MEGABUILD Indonesia 2025 Promotes Innovation</p>
                    <p class="text-xs text-gray-500">Author 1 | 4 May 2025</p>
                </div>
            </div>
        </div>

        <!-- Sidebar Illustration -->
        <div class="mt-8">
            <img src="/images/sidebar-illustration.png" class="rounded-md">
        </div>
    </div>
</div>

@endsection