<div class="row">
    <div class="row invoice-info">
        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted"># ID</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $produto->id }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Nome</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $produto->nome }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Apelido</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $produto->apelido ?? '-' }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Data de Nascimento</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            @if(isset($produto->dt_nascimento))
            {{ \Carbon\Carbon::parse($produto->dt_nascimento)->format('d/m/Y') }} ({{ \Carbon\Carbon::parse($produto->dt_nascimento)->age }} anos)
            @else
            -
            @endif
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Sexo</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $produto->sexo ?? ' - '}}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">{{ $produto->label_cpf_cnpj }}</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $produto->cpf ?? ' - ' }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">e-Mail</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            <a href="mailto:{{ $produto->email ?? ' - ' }}"><i class="fa-solid fa-envelope"></i> {{ $produto->email ?? ' - ' }}</a>
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Mídias Sociais</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            <a class="" href="https://www.instagram.com/{{ $produto->instagram }}" target="_black" data-bs-tooltip="tooltip" data-bs-title="Instagram"><i class="fa-brands fa-instagram"></i></a> {{ $produto->instagram ?? ' - ' }}<br>
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Observação</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $produto->observacao ?? '-' }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Endereços</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            @if($produto->endereco)
                <a class="" href="https://www.google.com.br/maps/search/{{ $produto->tipo_produto }} {{ $produto->logradouro }} {{ $produto->numero }} {{ $produto->bairro }} {{ $produto->cidade }} {{ $produto->uf }} {{ $produto->cep }}" target="_black" data-bs-tooltip="tooltip" data-bs-title="Endereço"><i class="fa-solid fa-map-location"></i></a>
                <strong>{{ $produto->tipo_produto }}</strong>: {{ $produto->logradouro }}, {{ $produto->numero }} {{ $produto->complemento != null ? "(".$produto->complemento.")" : "" }} - {{ $produto->bairro }}  -  {{ $produto->cidade }}/{{ $produto->uf }} - {{ $produto->cep }}
            @else
                -
            @endif
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Contatos</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            @if($produto->telefone)
                <a class="" href="tel:+55{{ $produto->ddd }}{{ $produto->telefone }}" target="_black" data-bs-tooltip="tooltip" data-bs-title="Telefone"><i class="fa-solid fa-phone"></i>({{ $produto->ddd }}) {{ $produto->telefone }}</a>&nbsp;&nbsp;
                <a class="" href="https://api.whatsapp.com/send?phone=55{{ $produto->ddd }}{{ $produto->telefone }}" target="_black" data-bs-tooltip="tooltip" data-bs-title="WhatsaApp"><i class="fa-brands fa-whatsapp"></i></a>
            @else
                -
            @endif
        </div>

        <br><br>
		<div class="text-muted mt-text-right">
            Incluído no sistema por:<br>
			{{ !isset($produto->hgvqzcnfxwfqjue) ? 'Importado' :$produto->hgvqzcnfxwfqjue->apelido }} em {{ \Carbon\Carbon::parse($produto->created_at)->format('d/m/Y H:i') }}
        </div>
    </div>
</div>
