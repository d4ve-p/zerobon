
@if ($paginator->hasPages())
    <style>
    .pagination .page-link {
        background-color: #228B22; /* ForestGreen */
        color: white;
        border-color: #228B22;
    }

    .pagination .page-link:hover {
        background-color: #1e7a1e;
        color: white;
        border-color: #1e7a1e;
    }

    .pagination .page-item.active .page-link {
        background-color: #145214;
        color: white;
        border-color: #145214;
    }

    .pagination .page-item.disabled .page-link {
        background-color: #228B22;
        color: #ccc;
        border-color: #228B22;
    }
</style>
    <nav>
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link" style="background-color:#228B22; color:white;">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" style="background-color:#228B22; color:white;" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <span class="page-link" style="background-color:#166d16; color:white;">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" style="background-color:#228B22; color:white;" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" style="background-color:#228B22; color:white;" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link" style="background-color:#228B22; color:white;">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>


@endif
