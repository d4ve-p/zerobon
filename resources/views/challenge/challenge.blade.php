@extends('components.layouts.app.home-layout')

@section('content')
<div class="flex flex-1 bg-[var(--color-cream-500)] justify-center w-full">
    <div class="w-[1111px] flex-col items-center box-border">
        <p class="py-[50px] text-[50px] font-semibold text-[var(--color-green-900)] text-center">To-Do-Challenge</p>
        <div class="flex w-full justify-end mb-[50px]">
            <button class="text-[24px] font-semibold bg-[var(--color-green-700)] text-white px-6 py-4 rounded-[15px]">Check Challenge Approval</button>
        </div>
        {{-- TODO: Get all unattempted challenges --}}
        <div class="flex flex-col gap-7">
            @foreach ($challenges as $challenge)
            <div class="flex flex-col">
                <div class="bg-white border-[var(--color-green-500)] rounded-[15px] drop-shadow-lg border-2 flex w-full justify-between min-h-[96px] items-center text-[var(--color-green-700)] px-8 box-border">
                    <p class="text-[25px] font-semibold ">
                        {{ $challenge->description}}
                    </p>
                    <div class="flex items-center gap-2">
                        <p class="font-bold text-[20px] text-nowrap">[+15 points ]</p>
                        <a href="{{ route("challenge-detail", $challenge->id) }}" class="font-semibold text-[25px] underline">Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection