<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>id</th>
            <th>id_empresa</th>
            <th>tipo</th>
            <th>id_banco</th>
            <th>id_conta</th>
            <th>num_documento</th>
            <th>id_cliente</th>
            <th>informacao</th>
            <th>vlr_bruto</th>
            <th>vlr_dsc_acr</th>
            <th>vlr_final</th>
            <th>parcela</th>
            <th>id_forma_pagamento</th>
            <th>descricao</th>
            <th>dt_vencimento</th>
            <th>dt_recebimento</th>
            <th>dt_confirmacao</th>
            <th>dt_pagamento</th>
            <th>dt_competencia</th>
            <th>id_usuario_lancamento</th>
            <th>id_usuario_confirmacao</th>
            <th>id_caixa</th>
            <th>id_lancamento_origem</th>
            <th>origem</th>
            <th>status</th>
            <th>centro_custo</th>
            
            <th>yaapdycfbplzkeg (Banco)</th>
            <th>qexgzmnndqxmyks (Pessoa)</th>
            <th>qlwiqwuheqlefkd (DBContaContabil)</th>
            <th>PDVCaixas (Caixa)</th>
            <th>AtdUsuariosLancador (Pessoa)</th>
            <th>AtdUsuariosConfirmador (Pessoa)</th>
            <th>ueifnsjfwefnskd (FormaPagamento)</th>
            <th>svlkjakslfksljd (ContaInterna)</th>
            <th>ewifjiosdnoidwm (ContaInterna)</th>
            <th>oerifjijdsaisau (Lancamento)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        <tr>
            <td>{{ $cada->id }}</td>
            <td>{{ $cada->id_empresa }}</td>
            <td>{{ $cada->tipo }}</td>
            <td>{{ $cada->id_banco }}</td>
            <td>{{ $cada->id_conta }}</td>
            <td>{{ $cada->num_documento }}</td>
            <td>{{ $cada->id_cliente }}</td>
            <td>{{ $cada->informacao }}</td>
            <td>{{ $cada->vlr_bruto }}</td>
            <td>{{ $cada->vlr_dsc_acr }}</td>
            <td>{{ $cada->vlr_final }}</td>
            <td>{{ $cada->parcela }}</td>
            <td>{{ $cada->id_forma_pagamento }}</td>
            <td>{{ $cada->descricao }}</td>
            <td>{{ $cada->dt_vencimento }}</td>
            <td>{{ $cada->dt_recebimento }}</td>
            <td>{{ $cada->dt_confirmacao }}</td>
            <td>{{ $cada->dt_pagamento }}</td>
            <td>{{ $cada->dt_competencia }}</td>
            <td>{{ $cada->id_usuario_lancamento }}</td>
            <td>{{ $cada->id_usuario_confirmacao }}</td>
            <td>{{ $cada->id_caixa }}</td>
            <td>{{ $cada->id_lancamento_origem }}</td>
            <td>{{ $cada->origem }}</td>
            <td>{{ $cada->status }}</td>
            <td>{{ $cada->centro_custo }}</td>

            <td>{{ optional($cada->yaapdycfbplzkeg)->nome }}</td>
            <td>{{ optional($cada->qexgzmnndqxmyks)->apelido }}</td>
            <td>{{ optional($cada->qlwiqwuheqlefkd)->titulo }}</td>
            <td>{{ optional($cada->PDVCaixas)->id }}</td>
            <td>{{ optional($cada->AtdUsuariosLancador)->apelido }}</td>
            <td>{{ optional($cada->AtdUsuariosConfirmador)->apelido }}</td>
            <td>{{ optional($cada->ueifnsjfwefnskd)->bandeira }}</td>

            <td>{{ optional($cada->svlkjakslfksljd)->count() }}</td>
            <td>{{ optional($cada->ewifjiosdnoidwm)->count() }}</td>
            <td>{{ optional($cada->oerifjijdsaisau)->count() }}</td>
        @endforeach
    </tbody>
</table>
