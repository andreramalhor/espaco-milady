@foreach($servprods->groupBy('tipo') as $tipo => $grupo)
<optgroup label="{{  $tipo ?? 'dddjd' }}">
    @foreach($grupo->sortBy('nome') as $servprod)
    <option value="{{ $servprod->id }}">{{ $servprod->nome }}</option>
    @endforeach
</optgroup>
@endforeach
