<div class="col-sm-{{ $attributes['col'] ?? 12 }}" {{ $attributes }}>
    <div class="form-group">
        @if(isset($label))
        <label for="{{ $attributes['name'] }}">{{ $label ?? '' }}</label>
        @endif
        <select class="form-control form-control-sm {{ $select2 ?? '' }}" wire:model="{{ $attributes['name'] }}" {{ $attributes }} id="{{ $attributes['name'] }}">
            <option value="">{{ $placeholder ?? 'Selecione. . .'}}</option>
            @foreach($bancos as $banco)
                <option value="{{ $banco->id }}">{{ $banco->nome }}</option>
            @endforeach
        </select>
    </div>
</div>
