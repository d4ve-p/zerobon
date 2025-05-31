@extends('components.layouts.app.home-layout')

@section('content')
<div class="flex-col pt-[50px] gap-[50px] flex flex-1 h-full w-full bg-[var(--color-cream-500)]">
    <div class="flex justify-between w-full items-center px-[30px] box-border">
        <a href="{{route("challenge")}}" class="test-[var(--color-green-700)] text-[20px] font-semibold ">< Back to Challenge</a>
        <p class="font-semibold text-[30px]">Check Challenge Approval</p>
        <div></div>
    </div>
    <div class="flex w-full px-[100px] flex-col gap-4">
        <div class="flex w-full justify-end">
            <div class="border-2 border-[var(--color-green-700)] py-1 px-2 text-[var(--color-green-700)] text-[25px] rounded-[10px]">
                1,500 points
            </div>
        </div>
        <table class="w-full text-sm text-center box-border bg-white px-2 py-4">
            <thead class="text-[20px] font-semibold text-gray-700 ">
                <tr>
                    {{-- TODO: Select all logic --}}
                    <th scope="col" class="px-6 py-3 box-border">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3 box-border">
                        Challenge
                    </th>
                    <th scope="col" class="px-6 py-3 box-border">
                        Approval Status
                    </th>
                    <th scope="col" class="px-6 py-3 box-border">
                        Notes
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="py-2 font-semibold text-[24px] box-border">
                    <th scope="row" class="px-6 py-4 font-medium box-border">
                        1.
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium box-border">
                        Go to TreeFund and Donate Tree
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium box-border">
                        Approved
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium box-border">
                        -
                    </th>
                </tr>
                <tr class="py-2 font-semibold text-[24px] box-border">
                    <th scope="row" class="px-6 py-4 font-medium box-border">
                        1.
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium box-border">
                        Go to TreeFund and Donate Tree
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium box-border">
                        Approved
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium box-border">
                        -
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection