@extends('components.layouts.app.home-layout')

@section('content')
<div class="min-h-screen bg-[#FFF8E8]">

    <!-- Hero Section -->
    <section class="relative bg-cover bg-center bg-no-repeat py-40"
             style="background-image: url('{{ asset('hero-bg.jpg') }}');">
        <div class="relative z-10 flex items-center justify-center h-full">
            <h1  class="text-5xl lg:text-5xl font-extrabold text-white text-center drop-shadow-[2px_2px_0px_rgba(0,0,0,0.6)]">
                Search Results for "{{ $search }}"
            </h1>
        </h1>
        </div>
    </section>

    <!-- Content -->
    <div class="container mx-auto px-4 py-10 flex flex-col items-center">   
        @if($articles->isEmpty())
            <div class="bg-white p-6 text-center text-gray-500 rounded shadow max-w-2xl mx-auto">
                No articles found for "{{ $search }}".
            </div>
        @else
            <div class="grid md:grid-cols-2 gap-6">
                @foreach($articles as $article)
                <a href="{{ route('articles.detail', ['id' => $article->id]) }}">
                    <div class="flex flex-col bg-white rounded shadow min-h-[400px]">
                        <img src="{{ asset($article->photo) }}" class="w-full h-60 object-cover rounded-t" alt="{{ $article->title }}">
                        <div class="p-4 flex-1 flex flex-col">
                            <h3 class="text-green-700 font-semibold mb-1">{{ $article->title }}</h3>
                            <div class="text-xs text-gray-500 mb-2">
                                <span><i class="fas fa-user mr-1"></i>{{ $article->author }}</span> 
                                <span><i class="fas fa-calendar ml-2 mr-1"></i>{{ \Carbon\Carbon::parse($article->publish_date)->format('d F Y') }}</span>
                            </div>
                            <p class="text-sm text-gray-600 flex-1">{{ Str::limit($article->description, 100) }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        @endif

        <!-- Back to News Button -->
        <div class="mt-8">
            <a href="{{ route('articles') }}" 
               class="inline-block bg-green-600 text-white px-5 py-2 rounded-full hover:bg-green-700 transition">
                ← Back to News
            </a>
        </div>
    </div>
</div>
@endsection
