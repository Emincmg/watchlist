<div class="pagination_section justify-content-center ">
    @if ($paginator->hasPages())

{{--Previous--}}
        @if($paginator->onFirstPage())
            <a wire:click="previousPage" style="display: none;"><</a>
        @else
            <a wire:click="previousPage" href=javascript:void(0);><</a>
        @endif
{{--end Previous--}}


{{--Numbers--}}
        @foreach ($elements as $element)
        @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <a class="active" href="javascript:void(0);"  wire:click="gotoPage({{ $page }})">{{ $page }}</a>
                @else
                    <a href="javascript:void(0);" wire:click="gotoPage({{ $page }})">{{ $page }}</a>
                    @endif
            @endforeach
        @endif
        @endforeach
{{--end Numbers--}}


{{--Next--}}
        @if($paginator->hasMorePages())
                <a wire:click="nextPage" href=javascript:void(0);>></a>
            @else
                <a wire:click="nextPage" style="display: none">></a>
        @endif
    @endif
{{--end Next--}}
</div>
