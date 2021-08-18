@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- First Page Link --}}
        <li class="page-item {{ $paginator->onFirstPage() ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url(1) }}">&laquo;</a>
        </li>

        {{-- Previous Page Link --}}
        <li class="page-item {{ $paginator->onFirstPage() ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}">&lsaquo;</a>
        </li>

        {{-- Pagination Elemnts --}}
            {{-- Array Of Links --}}
            @if ($paginator->lastPage() > config('const.PAGINATE.LINK_NUM'))


            @if ($paginator->currentPage() <= floor(config('const.PAGINATE.LINK_NUM') / 2))
                <?php $start_page = 1; //最初のページ ?> 
                <?php $end_page = config('const.PAGINATE.LINK_NUM'); ?>

            @elseif ($paginator->currentPage() > $paginator->lastPage() - floor(config('const.PAGINATE.LINK_NUM') / 2))
                <?php $start_page = $paginator->lastPage() - (config('const.PAGINATE.LINK_NUM') - 1); ?>
                <?php $end_page = $paginator->lastPage(); ?>

            @else
                <?php $start_page = $paginator->currentPage() - (floor((config('const.PAGINATE.LINK_NUM') % 2 == 0 ? config('const.PAGINATE.LINK_NUM') - 1 : config('const.PAGINATE.LINK_NUM'))  / 2)); ?>
                <?php $end_page = $paginator->currentPage() + floor(config('const.PAGINATE.LINK_NUM') / 2); ?>
            @endif

        @else
            <?php $start_page = 1; ?>
            <?php $end_page = $paginator->lastPage(); ?>
        @endif

        @for ($i = $start_page; $i <= $end_page; $i++)
            @if ($i == $paginator->currentPage())
                <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
            @endif
        @endfor

        {{-- Next Page Link --}}
        <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}">&rsaquo;</a>
        </li>

        {{-- Last Page Link --}}
        <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">&raquo;</a>
        </li>

    </ul>
@endif