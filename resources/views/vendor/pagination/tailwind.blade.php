@if ($paginator->hasPages())
    <div class="flex items-center gap-2 text-md">

        {{-- Números --}}
        @foreach ($elements as $element)

            {{-- "..." --}}
            @if (is_string($element))
                <span class="px-2 text-gray-400">{{ $element }}</span>
            @endif

            {{-- Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-3 py-1 rounded-sm bg-blue-600 text-white font-medium">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}"
                           class="px-3 py-1 rounded-sm text-gray-600 hover:bg-gray-200">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif

        @endforeach

    </div>
@endif