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
            <p class="font-medium text-[25px]">Show your commitment to reducing carbon emissions by joining the #ReduceCarbonChallenge #ZerobonCampaign on your Instagram Story!
To complete this challenge, you must:
Post an Instagram Story showing what you’re doing to reduce carbon emissions (e.g., biking, reusing items, saving electricity, etc.)
Include the hashtag #ReduceCarbonChallenge in your story
Tag our official Instagram account: @zerobon
Make sure your Instagram account is public (not private) so we can verify your story
Take a screenshot of your story after posting
Upload the screenshot as proof when submitting this challenge
Only valid stories with the correct hashtag and tag will be approved</p>

        </div>
        <button class="text-white w-[367px] h-[69px] bg-[var(--color-green-700)] font-semibold text-[24px] rounded-2xl">Start Challenge</button>

    </div>
@endsection