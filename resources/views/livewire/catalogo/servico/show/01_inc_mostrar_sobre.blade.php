<div class="row">
    <div class="row invoice-info">
        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted"># ID</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $servico->id }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Nome</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $servico->nome }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Apelido</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $servico->apelido ?? '-' }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Data de Nascimento</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            @if(isset($servico->dt_nascimento))
            {{ \Carbon\Carbon::parse($servico->dt_nascimento)->format('d/m/Y') }} ({{ \Carbon\Carbon::parse($servico->dt_nascimento)->age }} anos)
            @else
            -
            @endif
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Sexo</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $servico->sexo ?? ' - '}}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">{{ $servico->label_cpf_cnpj }}</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $servico->cpf ?? ' - ' }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">e-Mail</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            <a href="mailto:{{ $servico->email ?? ' - ' }}"><i class="fa-solid fa-envelope"></i> {{ $servico->email ?? ' - ' }}</a>
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Mídias Sociais</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            <a class="" href="https://www.instagram.com/{{ $servico->instagram }}" target="_black" data-bs-tooltip="tooltip" data-bs-title="Instagram"><i class="fa-brands fa-instagram"></i></a> {{ $servico->instagram ?? ' - ' }}<br>
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Observação</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $servico->observacao ?? '-' }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Endereços</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            @if($servico->endereco)
                <a class="" href="https://www.google.com.br/maps/search/{{ $servico->tipo_produto }} {{ $servico->logradouro }} {{ $servico->numero }} {{ $servico->bairro }} {{ $servico->cidade }} {{ $servico->uf }} {{ $servico->cep }}" target="_black" data-bs-tooltip="tooltip" data-bs-title="Endereço"><i class="fa-solid fa-map-location"></i></a>
                <strong>{{ $servico->tipo_produto }}</strong>: {{ $servico->logradouro }}, {{ $servico->numero }} {{ $servico->complemento != null ? "(".$servico->complemento.")" : "" }} - {{ $servico->bairro }}  -  {{ $servico->cidade }}/{{ $servico->uf }} - {{ $servico->cep }}
            @else
                -
            @endif
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Contatos</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            @if($servico->telefone)
                <a class="" href="tel:+55{{ $servico->ddd }}{{ $servico->telefone }}" target="_black" data-bs-tooltip="tooltip" data-bs-title="Telefone"><i class="fa-solid fa-phone"></i>({{ $servico->ddd }}) {{ $servico->telefone }}</a>&nbsp;&nbsp;
                <a class="" href="https://api.whatsapp.com/send?phone=55{{ $servico->ddd }}{{ $servico->telefone }}" target="_black" data-bs-tooltip="tooltip" data-bs-title="WhatsaApp"><i class="fa-brands fa-whatsapp"></i></a>
            @else
                -
            @endif
        </div>

        <br><br>
		<div class="text-muted mt-text-right">
            Incluído no sistema por:<br>
			{{ !isset($servico->hgvqzcnfxwfqjue) ? 'Importado' :$servico->hgvqzcnfxwfqjue->apelido }} em {{ \Carbon\Carbon::parse($servico->created_at)->format('d/m/Y H:i') }}
        </div>
    </div>
</div>
