@extends('components.layouts.app.home-layout')
@section('content')
    <div class="flex flex-1 bg-[var(--color-cream-500)] flex-col w-full items-center gap-[50px] pt-[50px]">
        <div class="flex w-full justify-between items-center">
            <a href="{{route("challenge")}}" class="font-semibold text-[20px] text-[var(--color-green-700)]">< Previous</a>
            <p class="text-[30px] font-bold">Join the #ReduceCarbonChallenge on IG Story</p>
            <div></div>
        </div>
        <div class="flex flex-col p-8 bg-white rounded-2xl border-2 border-[var(--color-green-700)] w-[1111px] h-[617px] box-border overflow-y-scroll gap-5">
            <p class="font-semibold text-[30px]">Challenge Description: </p>
            <p class="font-medium text-[25px] text-[var(--color-green-700)]">{!! nl2br(e($challenge->description)) !!}</p>

        </div>
        <a class="text-white w-[367px] h-[69px] bg-[var(--color-green-700)] font-semibold text-[24px] rounded-2xl text-center flex items-center justify-center" href="{{route("start-challenge", $challenge->id)}}">Start Challenge</a>

    </div>
@endsection