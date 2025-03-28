<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>id</th>
            <th>id_empresa</th>
            <th>apelido</th>
            <th>nome</th>
            <th>dt_nascimento</th>
            <th>email</th>
            <th>sexo</th>
            <th>cpf</th>
            <th>instagram</th>
            <th>observacao</th>
            <th>id_criador</th>
            <th>ddd</th>
            <th>telefone1</th>
            <th>telefone2</th>
            <th>cep</th>
            <th>logradouro</th>
            <th>complemento</th>
            <th>numero</th>
            <th>bairro</th>
            <th>cidade</th>
            <th>uf</th>
            <th>username</th>
            <th>password</th>
            
            <th>facebook</th>
            <th>remember_token</th>
            <th>email_verified_at</th>
            <th>id_rsschool</th>
            <th>tipo_pessoa</th>
            <th>estado_civil</th>
            <th>profissao</th>
            <th>escolaridade</th>
            <th>rg_insc</th>
            <th>nome_mae</th>
            <th>funcao</th>
            <th>origem</th>
            <th>ordem</th>

            <th>hgvqzcnfxwfqjue (Pessoa-criador->apelido)</th>
            <th>klwqejqlkwndwiqo (Empresa->nome)</th>
            <th>kjahdkwkbewtoip (Funcao->nome)</th>
            <th>qekwjlfiewhoasd (Permissao->nome)</th>
            <th>gxtisamceedomas (Venda)</th>
            <th>aeahvtsijjoprlc (ColaboradorServico)</th>
            <th>kehfywbcsqalfpw (ServicoProduto::class,ColaboradorServico)</th>
            <th>abcdefghijklmno (Caixa Aberto)</th>
            <th>iemzmwadhadlask (Agendamento Cliente)</th>
            <th>qoiwqjdasojasjs (Agendamento Profissionais)</th>
            <th>eidwuedoeduzdsd (VendaDetalhe::class,Venda)</th>
            <th>aslkdjaslkdjals (Caixa)</th>
            <th>opmnhtrvansmesd (ContaInterna)</th>
            <th>fjowenfsiasdwqe (Tarefa)</th>
            <th>aslfenvkvuelkds (AgendaOrdem)</th>
            <th>idfwhdisjsdahds (AgendaOrdem)</th>

        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        <tr>
            <td>{{ $cada->id }}</td>
            <td>{{ $cada->id_empresa }}</td>
            <td>{{ $cada->apelido }}</td>
            <td>{{ $cada->nome }}</td>
            <td>{{ $cada->dt_nascimento }}</td>
            <td>{{ $cada->email }}</td>
            <td>{{ $cada->sexo }}</td>
            <td>{{ $cada->cpf }}</td>
            <td>{{ $cada->instagram }}</td>
            <td>{{ $cada->observacao }}</td>
            <td>{{ $cada->id_criador }}</td>
            <td>{{ $cada->ddd }}</td>
            <td>{{ $cada->telefone1 }}</td>
            <td>{{ $cada->telefone2 }}</td>
            <td>{{ $cada->cep }}</td>
            <td>{{ $cada->logradouro }}</td>
            <td>{{ $cada->complemento }}</td>
            <td>{{ $cada->numero }}</td>
            <td>{{ $cada->bairro }}</td>
            <td>{{ $cada->cidade }}</td>
            <td>{{ $cada->uf }}</td>
            <td>{{ $cada->username }}</td>
            <td>{{ $cada->password }}</td>
            
            <td>{{ $cada->facebook }}</td>
            <td>{{ $cada->remember_token }}</td>
            <td>{{ $cada->email_verified_at }}</td>
            <td>{{ $cada->id_rsschool }}</td>
            <td>{{ $cada->tipo_pessoa }}</td>
            <td>{{ $cada->estado_civil }}</td>
            <td>{{ $cada->profissao }}</td>
            <td>{{ $cada->escolaridade }}</td>
            <td>{{ $cada->rg_insc }}</td>
            <td>{{ $cada->nome_mae }}</td>
            <td>{{ $cada->funcao }}</td>
            <td>{{ $cada->origem }}</td>
            <td>{{ $cada->ordem }}</td>

            <td>{{ optional($cada->hgvqzcnfxwfqjue)->apelido }}</td>
            <td>{{ optional($cada->klwqejqlkwndwiqo)->nome }}</td>
            <td>
                @if( isset($cada->kjahdkwkbewtoip) && $cada->kjahdkwkbewtoip->count() != 0)
                    {!! implode('<br>', array_column($cada->kjahdkwkbewtoip->toArray(), 'nome')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->qekwjlfiewhoasd) && $cada->qekwjlfiewhoasd->count() != 0)
                    {!! implode('<br>', array_column($cada->qekwjlfiewhoasd->toArray(), 'nome')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->gxtisamceedomas) && $cada->gxtisamceedomas->count() != 0)
                    {!! implode('<br>', array_column($cada->gxtisamceedomas->toArray(), 'id')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->aeahvtsijjoprlc) && $cada->aeahvtsijjoprlc->count() != 0)
                    {!! implode('<br>', array_column($cada->aeahvtsijjoprlc->toArray(), 'nome')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->kehfywbcsqalfpw) && $cada->kehfywbcsqalfpw->count() != 0)
                    {!! implode('<br>', array_column($cada->kehfywbcsqalfpw->toArray(), 'nome')) !!}
                @endif
            </td>
            <td>{{ optional($cada->abcdefghijklmno)->id }}</td>
            <td>
                @if( isset($cada->iemzmwadhadlask) && $cada->iemzmwadhadlask->count() != 0)
                    {!! implode('<br>', array_column($cada->iemzmwadhadlask->toArray(), 'id')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->qoiwqjdasojasjs) && $cada->qoiwqjdasojasjs->count() != 0)
                    {!! implode('<br>', array_column($cada->qoiwqjdasojasjs->toArray(), 'id')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->eidwuedoeduzdsd) && $cada->eidwuedoeduzdsd->count() != 0)
                    {!! implode('<br>', array_column($cada->eidwuedoeduzdsd->toArray(), 'id')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->aslkdjaslkdjals) && $cada->aslkdjaslkdjals->count() != 0)
                    {!! implode('<br>', array_column($cada->aslkdjaslkdjals->toArray(), 'id')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->opmnhtrvansmesd) && $cada->opmnhtrvansmesd->count() != 0)
                    {!! implode('<br>', array_column($cada->opmnhtrvansmesd->toArray(), 'id')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->fjowenfsiasdwqe) && $cada->fjowenfsiasdwqe->count() != 0)
                    {!! implode('<br>', array_column($cada->fjowenfsiasdwqe->toArray(), 'id')) !!}
                @endif
            </td>
            <td>{{ optional($cada->aslfenvkvuelkds)->id }}</td>
            <td>{{ optional($cada->idfwhdisjsdahds)->id }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
