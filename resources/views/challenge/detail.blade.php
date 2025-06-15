@extends('components.layouts.app.home-layout')
@section('content')
    <div class="flex flex-1 bg-[var(--color-cream-500)] flex-col w-full items-center gap-[50px] pt-[50px]">
    <div class="relative w-full text-center py-2">
        <!-- Previous button, diposisikan secara absolut -->
        <a href="{{ route('challenge') }}"
        class="absolute left-5 top-1/2 -translate-y-1/2 font-semibold text-[20px] text-[var(--color-green-700)]">
            &lt; Previous
        </a>

        <!-- Judul di tengah -->
        <p class="text-[30px] font-bold inline-block">{{ $challenge->name }}</p>
    </div>
        <div class="flex flex-col p-8 bg-white rounded-2xl border-2 border-[var(--color-green-700)] w-[1111px] h-[617px] box-border overflow-y-scroll gap-5">
            <p class="font-semibold text-[30px]">Challenge Description: </p>
            <p class="font-medium text-[25px] text-[var(--color-green-700)] text-justify">{!! nl2br(e($challenge->description)) !!}</p>

        </div>
        <a class="text-white w-[367px] h-[69px] bg-[var(--color-green-700)] font-semibold text-[24px] rounded-2xl text-center flex items-center justify-center mb-10" href="{{route("start-challenge", $challenge->id)}}">Start Challenge</a>

    </div>
@endsection