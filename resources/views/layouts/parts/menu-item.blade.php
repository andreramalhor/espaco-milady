<a href="
@if(isset($rota))
{{ route($rota) }}
@else
#
@endif
" class="nav-link">
    <i class="nav-icon {{ $icone }}"></i>
    <p>{{ $menu }}<i class="
    @if($tem_submenu)
    fas fa-angle-left right
    @endif
    "></i></p>
</a>
