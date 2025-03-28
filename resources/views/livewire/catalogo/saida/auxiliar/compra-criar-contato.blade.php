<div>
  <div class="card-body">
    <div class="row">
      <div class="col-12">
        <div class="form-group">
          <label for="telefone1">Telefone 1</label>
          <input type="text" class="form-control form-control-sm @error('telefone1') is-invalid @enderror" wire:model="telefone1">
          @error('telefone1')
          <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
          @enderror
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          <label for="telefone2">Telefone 2</label>
          <input type="text" class="form-control form-control-sm @error('telefone2') is-invalid @enderror" wire:model="telefone2">
          @error('telefone2')
          <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
          @enderror
        </div>
      </div>
    </div>
  </div>
</div>

