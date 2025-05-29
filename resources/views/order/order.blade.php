@extends('components.layouts.app.home-layout')

@section('content')
<div class="flex flex-1 bg-[var(--color-cream-500)] flex-col w-full px-[30px] box-border">
    <div class="flex justify-center py-[50px] relative">
        <button class="absolute left-0 text-[var(--color-green-700)] text-[20px] font-semibold">< Back to EcoMarket</button>
        <p class="font-semibold text-[30px]">Check Order Status</p>
        <div></div>
    </div>
<div class="flex w-full justify-center">
    <table class="min-w-[940px] text-sm text-center box-border bg-white drop-shadow-lg rounded-[15px] border-collapse divide-y-2 divide-gray-200">
    <thead class="text-gray-700 pt-[15px] font-semibold text-[20px]">
        <tr>
            <th scope="col" class="px-6 py-3 box-border ">
                No.
            </th>
            <th scope="col" class="px-6 py-3 box-border">
                Order Number
            </th>
            <th scope="col" class="px-6 py-3 box-border">
                Payment Status
            </th>
            <th scope="col" class="px-6 py-3 box-border">
                Delivery Status
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($purchases as $purchase )
        <tr class="py-[10px] text-[20px] box-border">
            <th scope="row" class="px-6 py-4 font-medium box-border">
                {{$loop->iteration}}. 
            </th>
            <th scope="row" class="px-6 py-4 font-medium box-border">
                {{ $purchase->id }}
            </th>
            <th scope="row" class="px-6 py-4 font-medium box-border">
                Successfully Paid
            </th>
            <th scope="row" class="px-6 py-4 font-medium box-border">
                {{ $purchase->status }}
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
@endsection