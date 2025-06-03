@extends('components.layouts.app.home-layout')

@section('content')

<div class="min-h-screen bg-[#FFF8E8] py-10 px-4">
    <div class="max-w-4xl mx-auto">
          <div class="mb-4">
            <a href="{{ route('articles') }}" class="inline-block text-green-600 hover:text-green-800 font-semibold">
                ← Back to news
            </a>
        </div>
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <h1 class="text-3xl font-bold text-green-700 ml-6 mr-4 mt-5 mb-4">{{ $article->title }}</h1>
            <div class="text-sm text-gray-500 mb-4">
                <span><i class="fas fa-user ml-6 mr-2 mt-2 mb-4"></i>{{ $article->author }}</span>
                <span class="ml-4"><i class="fas fa-calendar mr-2"></i>{{ \Carbon\Carbon::parse($article->publish_date)->format('d F Y') }}</span>
            </div>
              <div class="flex justify-center mb-1">
                <img src="{{ asset($article->photo) }}" class="w-[850px] h-[350px] object-cover rounded" alt="{{ $article->title }}">
            </div>
        <div class="p-6">
            <div class="text-gray-700 leading-relaxed text-justify">
                {!! nl2br(e($article->description)) !!}
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
