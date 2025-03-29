<div class="w-full">
    {{-- Show Products --}}
    @foreach ($products as $product)
    <div class="border p-4 mb-2">
        <h2 class="text-lg font-bold">{{ $product->name }}</h2>
        <p>Price: ${{ $product->price }}</p>
        <p>Description: {{ $product->description }}</p>
    </div>
    @endforeach
</div>
