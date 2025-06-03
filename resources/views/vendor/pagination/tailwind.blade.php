@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        {{-- Mobile View --}}
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-700 border border-green-700 rounded-md cursor-default">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-300">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-white bg-green-600 border border-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-300">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-300 bg-green-700 border border-green-700 rounded-md cursor-default">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        {{-- Desktop View --}}
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
 
            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    {{-- Previous --}}
                    @if ($paginator->onFirstPage())
                        <span class="inline-flex items-center px-2 py-2 text-sm text-gray-300 bg-green-600 border border-green-600 rounded-l-md cursor-default">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" class="inline-flex items-center px-2 py-2 text-sm text-white bg-green-600 border border-green-600 rounded-l-md hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-300" aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span class="inline-flex items-center px-4 py-2 -ml-px text-sm text-white bg-green-600 border border-green-600 cursor-default">{{ $element }}</span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-green-800 border border-green-800 cursor-default">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-green-600 border border-green-600 hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-300" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" class="inline-flex items-center px-2 py-2 -ml-px text-sm text-white bg-green-600 border border-green-600 rounded-r-md hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-300" aria-label="{{ __('pagination.next') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span class="inline-flex items-center px-2 py-2 -ml-px text-sm text-gray-300 bg-green-600 border border-green-600 rounded-r-md cursor-default" aria-hidden="true">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
