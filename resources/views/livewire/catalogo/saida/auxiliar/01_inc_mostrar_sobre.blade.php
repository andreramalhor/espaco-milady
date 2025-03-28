<div class="row">
    <div class="row invoice-info">
        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted"># ID</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $compra->id }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Nome</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $compra->nome }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Apelido</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $compra->apelido ?? '-' }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Data de Nascimento</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            @if(isset($compra->dt_nascimento))
            {{ \Carbon\Carbon::parse($compra->dt_nascimento)->format('d/m/Y') }} ({{ \Carbon\Carbon::parse($compra->dt_nascimento)->age }} anos)
            @else
            -
            @endif
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Sexo</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $compra->sexo ?? ' - '}}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">{{ $compra->label_cpf_cnpj }}</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $compra->cpf ?? ' - ' }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">e-Mail</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            <a href="mailto:{{ $compra->email ?? ' - ' }}"><i class="fa-solid fa-envelope"></i> {{ $compra->email ?? ' - ' }}</a>
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Mídias Sociais</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            <a class="" href="https://www.instagram.com/{{ $compra->instagram }}" target="_black" data-bs-tooltip="tooltip" data-bs-title="Instagram"><i class="fa-brands fa-instagram"></i></a> {{ $compra->instagram ?? ' - ' }}<br>
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Observação</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $compra->observacao ?? '-' }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Endereços</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            @if($compra->endereco)
                <a class="" href="https://www.google.com.br/maps/search/{{ $compra->tipo_Compra }} {{ $compra->logradouro }} {{ $compra->numero }} {{ $compra->bairro }} {{ $compra->cidade }} {{ $compra->uf }} {{ $compra->cep }}" target="_black" data-bs-tooltip="tooltip" data-bs-title="Endereço"><i class="fa-solid fa-map-location"></i></a>
                <strong>{{ $compra->tipo_Compra }}</strong>: {{ $compra->logradouro }}, {{ $compra->numero }} {{ $compra->complemento != null ? "(".$compra->complemento.")" : "" }} - {{ $compra->bairro }}  -  {{ $compra->cidade }}/{{ $compra->uf }} - {{ $compra->cep }}
            @else
                -
            @endif
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Contatos</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            @if($compra->telefone)
                <a class="" href="tel:+55{{ $compra->ddd }}{{ $compra->telefone }}" target="_black" data-bs-tooltip="tooltip" data-bs-title="Telefone"><i class="fa-solid fa-phone"></i>({{ $compra->ddd }}) {{ $compra->telefone }}</a>&nbsp;&nbsp;
                <a class="" href="https://api.whatsapp.com/send?phone=55{{ $compra->ddd }}{{ $compra->telefone }}" target="_black" data-bs-tooltip="tooltip" data-bs-title="WhatsaApp"><i class="fa-brands fa-whatsapp"></i></a>
            @else
                -
            @endif
        </div>

        <br><br>
		<div class="text-muted mt-text-right">
            Incluído no sistema por:<br>
			{{ !isset($compra->hgvqzcnfxwfqjue) ? 'Importado' :$compra->hgvqzcnfxwfqjue->apelido }} em {{ \Carbon\Carbon::parse($compra->created_at)->format('d/m/Y H:i') }}
        </div>
    </div>
</div>
