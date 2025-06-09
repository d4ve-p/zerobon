@if ($paginator->hasPages())
    <nav class="flex justify-center mt-4">
        <ul class="inline-flex space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="bg-green-600 text-white rounded-md px-3 py-2 cursor-not-allowed">
                        &lt;
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="bg-green-600 text-white rounded-md px-3 py-2 hover:bg-green-700">
                        &lt;
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li><span class="bg-green-600 text-white rounded-md px-3 py-2">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="bg-white text-green-600 font-bold rounded-md px-3 py-2 border border-green-600">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="bg-green-600 text-white rounded-md px-3 py-2 hover:bg-green-700">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="bg-green-600 text-white rounded-md px-3 py-2 hover:bg-green-700">
                        &gt;
                    </a>
                </li>
            @else
                <li>
                    <span class="bg-green-600 text-white rounded-md px-3 py-2 cursor-not-allowed">
                        &gt;
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
