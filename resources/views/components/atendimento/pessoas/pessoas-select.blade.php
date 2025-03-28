@foreach($pessoas as $pessoa)
    <option value="{{ $pessoa->id }}">{{ $pessoa->apelido }}</option>
@endforeach
