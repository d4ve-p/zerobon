@extends('components.layouts.app.home-layout')
@section('content')
<!-- Hero Section -->
<section class="bg-green-200 py-12 text-center">
  <h1 class="text-3xl font-bold">Today's Headline!!!</h1>
</section>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-3 gap-8">
  <!-- Featured Article -->
  <section class="md:col-span-2">
    @if($articles[0])
      <img src="{{ $articles[0]->photo }}" alt="Featured News" class="w-full rounded mb-4">
      <h2 class="text-xl font-bold mb-2">{{ $articles[0]->title }}</h2>
      <p class="text-sm text-gray-500 mb-1">By {{ $articles[0]->author }} | {{ $articles[0]->publish_date}}</p>
      <p class="text-justify">{{ Str::limit($articles[0]->description, 300) }}</p>
    @endif
  </section>

  

@endsection