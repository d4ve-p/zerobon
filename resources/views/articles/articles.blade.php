@extends('components.layouts.app.home-layout')

@section('content')

<div class="min-h-screen bg-[#FFF8E8]">

<!-- Hero Section -->
<section class="relative bg-cover bg-center bg-no-repeat py-40"
         style="background-image: url('{{ asset('hero-bg.jpg') }}');">
    <div class="relative z-10 flex items-center justify-center h-full">
        <h1 class="text-5xl lg:text-5xl font-extrabold text-white text-center drop-shadow-[2px_2px_0px_rgba(0,0,0,0.6)]">
            Today’s Headline!!!
        </h1>
    </div>
</section>

<!-- Main Content -->
<div class="container mx-auto px-4 py-10 grid grid-cols-1 lg:grid-cols-3 gap-8">

    <!-- Headline + Paginated Articles -->
    <div class="lg:col-span-2 space-y-10">

        <!-- Headline Article -->
        @if($headline)
        <a href="{{ route('articles.detail', ['id' => $headline->id]) }}">
            <div class="bg-white shadow-md rounded-lg overflow-hidden mb-10">
                <img src="{{ asset($headline->photo) }}" class="w-full h-64 object-cover" alt="{{ $headline->title }}">
                <div class="p-6">
                    <h2 class="text-green-700 font-bold text-xl mb-2">{{ $headline->title }}</h2>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <span class="mr-4"><i class="fas fa-user mr-2"></i>{{ $headline->author }}</span>
                        <span><i class="fas fa-calendar mr-1"></i>{{ \Carbon\Carbon::parse($headline->publish_date)->format('d F Y') }}</span>
                    </div>
                    <p class="text-gray-700">
                        {{ Str::limit($headline->description, 200) }}
                    </p>
                </div>
            </div>
        </a>
        @endif

        <!-- Other Paginated Articles -->
        <div class="grid md:grid-cols-2 gap-6">
            @foreach($articles as $article)
            <a href="{{ route('articles.detail', ['id' => $article->id]) }}">
                <div class="flex flex-col bg-white rounded shadow min-h-[400px]">
                    <img src="{{ asset($article->photo) }}" class="w-full h-60 object-cover rounded-t" alt="{{ $article->title }}">
                    <div class="p-4 flex-1 flex flex-col">
                        <h3 class="text-green-700 font-semibold mb-1">{{ $article->title }}</h3>
                        <div class="text-xs text-gray-500 mb-2">
                            <span><i class="fas fa-user mr-1"></i>{{ $article->author }}</span> 
                            
                            <span><i class="fas fa-calendar ml-2 mr-1"></i>
                            <span>{{ \Carbon\Carbon::parse($article->publish_date)->format('d F Y') }}</span>
                        </div>
                        <p class="text-sm text-gray-600 flex-1">{{ Str::limit($article->description, 100) }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <!-- Pagination -->
       <div class="hidden sm:flex sm:items-center sm:justify-center">
            {{ $articles->links('vendor.pagination.tailwind') }}
        </div>
    </div>

    <!-- Sidebar -->
    <aside class="space-y-6">
        <!-- Search Box -->
        <form action="{{ route('articles.search') }}" method="GET" class="relative bg-white rounded-full shadow border border-gray-300">
            <input type="text" name="search" placeholder="Search articles..." value="{{ request('search') }}" class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500">
            <button class="absolute right-4 top-2 text-green-700"><i class="fas fa-search" type="submit"></i></button>
        </form>

        <!-- Suggested Articles -->
        <div class="space-y-4">
            @foreach($sidebarArticles as $suggested)
            <a href="{{ route('articles.detail', ['id' => $suggested->id]) }}">
                <div class="flex gap-3 mb-3">
                    <img src="{{ asset($suggested->photo) }}" class="w-16 h-16 object-cover rounded" alt="{{ $suggested->title }}">
                    <div>
                        <h4 class="text-sm font-semibold text-green-700 leading-tight">{{ $suggested->title }}</h4>
                        <div class="text-xs text-gray-500">
                            <span><i class="fas fa-user mr-1"></i>{{ $suggested->author }}</span>
                            <span class="ml-2"><i class="fas fa-calendar mr-1"></i>{{ \Carbon\Carbon::parse($suggested->publish_date)->format('d F Y') }}</span>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </aside>

</div>
</div>
@endsection
