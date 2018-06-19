@php
if ($paginator->lastPage() > 13) {
    if ($paginator->currentPage() <= 7) {
        $first = 1;
        $last = 13;
    } elseif ($paginator->currentPage() >= $paginator->lastPage() - 6) {
        $first = $paginator->lastPage() - 12;
        $last = $paginator->lastPage();
    } else {
        $first = $paginator->currentPage() - 6;
        $last = $paginator->currentPage() + 6;
    }
} else {
    $first = 1;
    $last = $paginator->lastPage();
}
@endphp

@if ($paginator->lastPage() > 1)
    <ul class="pagination justify-content-center">
        <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url(1) }}" onclick="changePage(this, event)">Inicio</a>
        </li>
        <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url($paginator->currentPage()-1) }}" onclick="changePage(this, event)">Anterior</a>
        </li>
        @for ($i = $first; $i <= $last; $i++)
            <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                <a class="page-link" href="{{ $paginator->url($i) }}" onclick="changePage(this, event)">{{ $i }} @if($paginator->currentPage() == $i) <span class="sr-only">(current)</span> @endif</a>
            </li>
        @endfor

        <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url($paginator->currentPage()+1) }}" onclick="changePage(this, event)">Siguiente</a>
        </li>
        <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" onclick="changePage(this, event)">Final</a>
        </li>
    </ul>
@endif