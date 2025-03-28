@extends('adminlte::page')

@section('content')
<div class="book">
  <div class="page">
    <div class="subpage">
      <div class="invoice p-3 mb-3">
        </br>
        <div class="row">
          <table width="100%">
            <tr>
              <td rowspan="4" class="text-center" width="75"><img src="{{ asset('img/atendimentos/pessoas/0.png') }}" alt="{{ $empresa->nome ?? 'Nome da Empresa' }}" width="75" style="margin-right: 50px;"></td>
              <td><strong>{{ $empresa->nome ?? 'Nome da Empresa' }}</strong></td>
              <td width="26%" rowspan="4" class="text-center" style="vertical-align: top;"><h4 class="text-left"><strong><font>Recibo de Comanda</font></strong></h4>&emsp;</td>
              <td><strong>ID Comanda: &nbsp;</strong><span>{{ $venda->id }}</span></td>
            </tr>
            <tr>
              <td><strong>CNPJ: &nbsp;</strong>{{ $empresa->cnpj ?? 'CNPJ' }}</td>
              <td><strong>ID Caixa: &nbsp;</strong><a target="_blank" class="badge bg-pink"><span>{{ $venda->id_caixa }}</span></a></td>
            </tr>
            <tr>
              <td><strong>Telefone: &nbsp;</strong>{{ $empresa->telefone_fixo ?? 'Telefone' }}</td>
              <td><strong>Data Compra: &nbsp;</strong><span>{{ \Carbon\Carbon::parse($venda->created_at)->format('d/m/Y H:i:s') }}</span></td>
            </tr>
            <tr>
              <td><strong>e-Mail: &nbsp;</strong>{{ $empresa->email ?? 'email@email.com' }}</td>
              <td><strong class="d-none">Vendedor: &nbsp;</strong><span></span></td>
            </tr>
          </table>
        </div>
        
        <div class="modal-body">
          <div class="row">
            <div class="col-12 form-group">
              <h5 style="border-bottom: 1px solid lightgray; margin: 0px;">Dados do Cliente</h5>
              <table width="100%">
                <tr>
                  <td style="width:1%; white-space:nowrap;"><strong>ID Cliente: </strong><a target="_blank" class="badge bg-pink"><span>{{ $venda->id_cliente }}</span></a>&emsp;&nbsp;&emsp;</td>
                  <td><strong>Nome: </strong><span>{{ $venda->lufqzahwwexkxli->apelido ?? '(Cliente sem cadastro)' }}</span></td>
                  <td class="text-right"><strong>CPF: &nbsp;</strong><span>{{ $venda->lufqzahwwexkxli->cpf ?? ' - ' }}</span></td>
                </tr>
              </table>
              @if ( isset($venda->lufqzahwwexkxli->uqbchiwyagnnkip) && count($venda->lufqzahwwexkxli->uqbchiwyagnnkip) >= 1 )
              <table width="100%">
                <tr>
                  <td><strong>Endereço: </strong>{{ $venda->lufqzahwwexkxli->uqbchiwyagnnkip->first()->logradouro ?? '' }}</td>
                  <td><strong>Nº: </strong>{{ $venda->lufqzahwwexkxli->uqbchiwyagnnkip->first()->numero ?? '' }}</td>
                  @if( $venda->lufqzahwwexkxli->uqbchiwyagnnkip->first()->complemento != '' )
                  <td><strong>Comp.: </strong>{{ $venda->lufqzahwwexkxli->uqbchiwyagnnkip->first()->complemento ?? '' }}</td>
                  @endif
                  <td><strong>Bairro: </strong>{{ $venda->lufqzahwwexkxli->uqbchiwyagnnkip->first()->bairro ?? '' }}</td>
                  <td><strong>Cidade: </strong>{{ $venda->lufqzahwwexkxli->uqbchiwyagnnkip->first()->cidade ?? '' }}</td>
                  <td><strong>UF: </strong>{{ $venda->lufqzahwwexkxli->uqbchiwyagnnkip->first()->uf ?? '' }}</td>
                  <td class="text-right"><strong>CEP: </strong>{{ $venda->lufqzahwwexkxli->uqbchiwyagnnkip->first()->cep ?? '' }}</td>
                </tr>
              </table>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-12 form-group">
              <h5 style="border-bottom: 1px solid lightgray; margin: 0px;">Itens Vendidos</h5>
              <table class="table-striped" width="100%">
                <thead>
                  <tr>
                    <th class="text-left">Cód.</th>
                    <th class="text-left">Descrição</th>
                    <th class="text-left">Profissional/Vendedor</th>
                    <th class="text-right">Total</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($venda->dfyejmfcrkolqjh as $detalhe )
                  <tr>
                    <td class="text-left">{{ $detalhe->id_servprod }}</td>
                    <td class="text-left">{{ $detalhe->kcvkongmlqeklsl->nome }}</td>
                    <td class="text-left">{{ $detalhe->hgihnjekboyabez->xeypqgkmimzvknq->apelido ?? ' - ' }}</td>
                    <td class="text-right">{{ number_format($detalhe->vlr_final, 2, ',', '.') }}</td>
                  </tr>
                  @empty
                  <tr>
                    <td class="text-center" colspan="4"></td>
                  </tr>
                  @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th class="text-right" colspan="4">{{ number_format($venda->dfyejmfcrkolqjh->sum('vlr_final'), 2, ',', '.') }}</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="row">
            <div class="col-12 form-group">
              <h5 style="border-bottom: 1px solid lightgray; margin: 0px;">Dados do Pagamento</h5>
              <table class="table-striped" width="100%">
                <thead>
                  <tr>
                    <th class="text-left">Forma</th>
                    <th class="text-left">Parcela</th>
                    <th class="text-left">Dt prevista</th>
                    <th class="text-right">Valor</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($venda->xzxfrjmgwpgsnta as $pagamento )
                  <tr>
                    <td class="text-left">{{ $pagamento->qmbnkthuczqdsdn->forma == $pagamento->qmbnkthuczqdsdn->bandeira ? $pagamento->qmbnkthuczqdsdn->forma : $pagamento->qmbnkthuczqdsdn->forma.' - '.$pagamento->qmbnkthuczqdsdn->bandeira }}</td>
                    <td class="text-left">{{ $pagamento->parcela }}</td>
                    <td class="text-left">{{ \Carbon\Carbon::parse($pagamento->dt_prevista)->format('d/m/Y') }}</td>
                    <td class="text-right">{{ number_format($pagamento->valor, 2, ',', '.') }}</td>
                  </tr>
                  @empty
                  <tr>
                    <td class="text-center" colspan="4"></td>
                  </tr>
                  @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th class="text-right" colspan="4">{{ number_format($venda->xzxfrjmgwpgsnta->sum('valor'), 2, ',', '.') }}</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>    
  </div>
</div>

@endsection
        


@section('js')
<script>
  window.print();
</script>
@endsection

@section('style')
<style>
body {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  background-color: #FAFAFA;
  font: 12pt "Tahoma";
}
* {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}
.page {
  width: 210mm;
  min-height: 297mm;
  padding: 20mm;
  margin: 10mm auto;
  border: 1px #D3D3D3 solid;
  border-radius: 5px;
  background: white;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
  padding: 0.5cm;
  border: 3px black solid;
  height: 280mm;
  outline: 1cm white solid;
}

@page {
  size: A4;
  margin: 0;
}
@media print {
  html, body {
    width: 210mm;
    height: 297mm;        
  }
  .page {
    margin: 0;
    border: initial;
    border-radius: initial;
    width: initial;
    min-height: initial;
    box-shadow: initial;
    background: initial;
    page-break-after: always;
  }
}
</style>
@endsection

