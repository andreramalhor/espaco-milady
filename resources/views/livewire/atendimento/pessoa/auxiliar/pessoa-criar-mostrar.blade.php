<div class="row">
    <div class="row invoice-info">
        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted"># ID</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $id }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Nome</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $nome }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Apelido</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $apelido ?? '-' }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Data de Nascimento</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            @if(isset($dt_nascimento))
            {{ \Carbon\Carbon::parse($dt_nascimento)->format('d/m/Y') }} ({{ \Carbon\Carbon::parse($dt_nascimento)->age }} anos)
            @else
            -
            @endif
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Sexo</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $sexo ?? ' - '}}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">{{ $label_cpf_cnpj ?? ' - ' }}</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $cpf ?? ' - ' }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">e-Mail</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            <a href="mailto:{{ $email ?? ' - ' }}"><i class="fa-solid fa-envelope"></i> {{ $email ?? ' - ' }}</a>
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Mídias Sociais</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            <a class="" href="https://www.instagram.com/{{ $instagram ?? ' - ' }}" target="_black" data-bs-tooltip="tooltip" data-bs-title="Instagram"><i class="fa-brands fa-instagram"></i></a> {{ $instagram ?? ' - ' }}<br>
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Observação</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
            {{ $observacao ?? '-' }}
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Endereços</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
        {{--
            @if($endereco)
                <a class="" href="https://www.google.com.br/maps/search/{{ $tipo_pessoa }} {{ $logradouro }} {{ $numero }} {{ $bairro }} {{ $cidade }} {{ $uf }} {{ $cep }}" target="_black" data-bs-tooltip="tooltip" data-bs-title="Endereço"><i class="fa-solid fa-map-location"></i></a>
                <strong>{{ $tipo_pessoa }}</strong>: {{ $logradouro }}, {{ $numero }} {{ $complemento != null ? "(".$complemento.")" : "" }} - {{ $bairro }}  -  {{ $cidade }}/{{ $uf }} - {{ $cep }}
            @else
                -
            @endif
        --}}    
        </div>

        <div class="col-sm-2 invoice-col pb-3">
            <strong class="text-muted">Contatos</strong><br>
        </div>
        <div class="col-sm-10 invoice-col pb-3">
        {{--
            @if($telefone)
                <a class="" href="tel:+55{{ $ddd }}{{ $telefone }}" target="_black" data-bs-tooltip="tooltip" data-bs-title="Telefone"><i class="fa-solid fa-phone"></i>({{ $ddd }}) {{ $telefone }}</a>&nbsp;&nbsp;
                <a class="" href="https://api.whatsapp.com/send?phone=55{{ $ddd }}{{ $telefone }}" target="_black" data-bs-tooltip="tooltip" data-bs-title="WhatsaApp"><i class="fa-brands fa-whatsapp"></i></a>
            @else
                -
            @endif
        --}}    
        </div>

        <br><br>
		<div class="text-muted mt-text-right">
            Incluído no sistema por:<br>
            {{--
                {{ !isset($hgvqzcnfxwfqjue) ? 'Importado' :$hgvqzcnfxwfqjue->apelido }} em {{ \Carbon\Carbon::parse($created_at)->format('d/m/Y H:i') }}
            --}}
        </div>
    </div>
</div>
