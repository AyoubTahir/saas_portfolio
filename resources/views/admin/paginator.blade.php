@if ($paginator->hasPages())
<ul class="pagination pagination-style-2 pagination-rounded justify-content-center">
    <!-- prev -->
    @if ($paginator->onFirstPage())
    <li><a href="javascript:void(0);">&laquo;</a></li>
    @else
    <li><a href="{{$paginator->previousPageUrl()}}">&laquo;</a></li>
    @endif
    <!-- prev end -->

    <!-- numbers -->
    @foreach ($elements as $element)
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li><a href="javascript:void(0);" class="active">{{$page}}</a></li>
                @else
                    <li><a href="{{$paginator->url($page)}}">{{$page}}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
    <!-- end numbers -->

    <!-- next  -->
    @if ($paginator->hasMorePages())
    <li><a href="{{$paginator->nextPageUrl()}}">&raquo;</a></li>
    @else
    <li><a href="javascript:void(0);">&raquo;</a></li>
    @endif
    <!-- next end -->
</ul>
@endif
