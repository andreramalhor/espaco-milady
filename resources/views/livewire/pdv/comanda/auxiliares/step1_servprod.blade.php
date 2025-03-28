<div class="row">
  <div class="pb-5">
    <button class="btn btn-sm btn-primary" onclick="stepper1.previous()">Anterior</button>
    <button class="btn btn-sm btn-primary float-end disabled" id="stp_next" onclick="stepper1.next()">Próximo</button>
  </div>
</div>
<div class="row">
  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
        <div class="form-group">
          <label for="col-form-label pt-0">Serviço ou Produto</label>
          <select class="form-control form-control-sm select2" id="id_servprod_selecionar" onchange="servprod_executor_selecionado( this.value )">
            <option value="NULL">Selecione . . .</option>
            @foreach($servicos->groupBy('id_categoria') as $categoria => $servicos)
            <optgroup label="{{ $servicos->first()->ecgklyqfdcoguyj->nome ?? $servicos->first()->id_categoria }}">
              @foreach($servicos as $servico)
              <option value="{{ $servico->id }}">{{ $servico->nome }}</option>
              @endforeach
            </optgroup>
            @endforeach
          </select>
          <span id="servprod_feedback" class="pl-1 d-none"></span>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
        <div class="form-group">
          <label for="col-form-label pt-0">Profissional Parceiro</label>
          <div class="input-group">
            <select class="form-control form-control-sm select2" id="id_profexec" onchange="profissional_selecionado( this.value )">
              <option value="NULL">Carregando . . .</option>
            </select>
          </div>
          <span id="profexec_feedback" class="pl-1 valid-feedback d-none"></span>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
        <div class="form-group row mb-1">
          <label class="col-form-label pt-0">Comissão</label>
        </div>
        <div class="form-group row mb-1">
          <div class="custom-control custom-radio">
            <div class="col-12">
              <input type="radio" class="custom-control-input" name="cmp_tipo_comissao" id="rdo_vlr_pgo" value="Comissão Sob Valor Final" onchange="atualizar_comissao()" checked=""/>
              <label for="rdo_vlr_pgo" class="custom-control-label">Sob Valor Final</label>
            </div>
          </div>
        </div>
        <div class="form-group row mb-1">
          <div class="col-12">
            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" name="cmp_tipo_comissao" id="rdo_vlr_tbl" value="Comissão Sob Valor Tabelado" onchange="atualizar_comissao()"/>
              <label for="rdo_vlr_tbl" class="custom-control-label">Sob Valor Tabelado</label>
            </div>
          </div>
        </div>
        <div class="form-group row mb-1">
          <div class="col-12">
            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" name="cmp_tipo_comissao" id="rdo_vlr_zro" value="Comissão Zerada" onchange="atualizar_comissao()"/>
              <label for="rdo_vlr_zro" class="custom-control-label">Zerada</label>
            </div>
          </div>
        </div>
        @can('###############')
        <div class="form-group row mb-1">
          <div class="col-6">
            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" name="cmp_tipo_comissao" id="rdo_vlr_custom" value="Comissão Manual" onchange="atualizar_comissao()"/>
              <label for="rdo_vlr_custom" class="custom-control-label">Manual</label>
            </div>
          </div>
          <div class="col-6">
            <div class="input-group input-group-sm d-none mb-3" id="cmp_m_comissao">
              <span class="input-group-text" id="tp_m_comissao" onclick="tp_m_comissao( 'trocar' )" data-tp_m_comissao="R$" style="cursor: pointer">R$</span>
              <input type="text" class="form-control dinheiro text-center" id="vlr_m_comissao" value=0 aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" onchange="tp_m_comissao()">
            </div>
          </div>
        </div>
        @endcan
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
        <div class="form-group text-center">
          <label class="col-form-label pt-0">Valor Tabelado</label>
          <input type="text" class="form-control form-control-sm dinheiro text-right" id="cmp_vlr_negociado" disabled="true" onchange="atualizar_valor_final( 0 )">
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
        <div class="form-group text-center">
          <label class="col-form-label pt-0">Qtd</label>
          <input type="number" class="form-control form-control-sm text-center" id="cmp_quantidade" value="1" min="1" onchange="atualizar_valor_final( 0 )">
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
        <div class="form-group text-center">
          <label class="col-form-label pt-0">Desc/Acrs</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <button type="button" onclick="atualizar_valor_final( -1 )" class="btn btn-outline-danger btn-xs" style="min-width: 35px;"><small>-1,00</small></button>
              <button type="button" onclick="atualizar_valor_final( -0.1 )" class="btn btn-outline-danger btn-xs" style="min-width: 35px;"><small>-0,10</small></button>
            </div>
            <input type="text" class="form-control form-control-sm dinheiro text-center" id="cmp_vlr_dsc_acr" onchange="atualizar_valor_final( 0 )" value=0>
            <div class="input-group-append">
              <button type="button" onclick="atualizar_valor_final( +0.1 )" class="btn btn-outline-success btn-xs" style="min-width: 35px;"><small>+0,10</small></button>
              <button type="button" onclick="atualizar_valor_final( +1 )" class="btn btn-outline-success btn-xs" style="min-width: 35px;"><small>+1,00</small></button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
        <div class="form-group text-center">
          <label class="col-form-label pt-0">Valor Final</label>
          <input type="text" class="form-control form-control-sm dinheiro text-right" id="cmp_vlr_final" disabled="true">
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
    <div class="form-group">      
      <label class="col-form-label pt-0">&nbsp;</label>
      <div class="btn-group btn-block text-center">
        <button type="button" class="btn btn-info disabled" id="venda_detalhes_adicionar" onclick="venda_detalhes_adicionar()"><i class="fas fa-arrow-alt-circle-down"></i></button>
        <button type="button" class="btn btn-danger" onclick="servprod_resetar()"><i class="fas fa-minus-square"></i></button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function()
  {
    inputMasksActivate()
    atualizar_valor_final()
  })

  function servprod_adicionar()
  {
    alert('abrir modal servprod_adicionar')
  }

  function servprod_executor_selecionado( id )
  {
    $('#vendas-overlay').show()
  
    var url = "{{ route('cat.servprod.executor', ':id') }}"
    var url = url.replace(':id', id)
    
    axios.get(url)
    .then(function(response)
    {
      // console.log(response.data)
      temp.pdv_vendas_detalhes.tipo          = response.data.tipo
      temp.pdv_vendas_detalhes.id_servprod   = response.data.id
      temp.pdv_vendas_detalhes.quantidade    = 1
      temp.pdv_vendas_detalhes.vlr_venda     = response.data.vlr_venda
      temp.pdv_vendas_detalhes.vlr_negociado = response.data.vlr_venda
      temp.pdv_vendas_detalhes.vlr_dsc_acr   = 0
      temp.pdv_vendas_detalhes.unitario      = ( response.data.vlr_venda + 0 )
      temp.pdv_vendas_detalhes.vlr_final     = response.data.vlr_venda
      temp.pdv_vendas_detalhes.obs           = null
      temp.pdv_vendas_detalhes.status        = null
      temp.pdv_vendas_detalhes.nome          = response.data.nome
      temp.pdv_vendas_detalhes.tipo_preco    = response.data.tipo_preco
      temp.pdv_vendas_detalhes.estoque_atual = response.data.estoque_atual
      
      $('#id_profexec').empty().append('<option value="NULL">Selecione . . .</option>')
      collect(response.data.smenhgskqwmdjwe).each((value) =>
      {
        $('#id_profexec').append('<option value="'+value.id_profexec+'" data-prc_comissao="'+value.prc_comissao+'">'+value.dwsdjqwqwekowqe.apelido+'</option>')
      })
    })
    .then(function()
    {
      atualizar_cmp_vendas()
      
      if($("#id_servprod_selecionar").val() == "NULL")
      {
        $('#venda_detalhes_adicionar').addClass('disabled')
        $('#servprod_feedback').removeClass('d-block').addClass('d-none')
      }
      else
      {
        $('#venda_detalhes_adicionar').removeClass('disabled')
        $('#servprod_feedback').removeClass('d-none').addClass('d-block')
      }
      
      atualizar_valor_final()

      setTimeout(function() {
        $('#vendas-overlay').hide()
      }, 500)
    })
  }

  function profissional_selecionado( id_profexec )
  {
    temp.pdv_vendas_detalhes.fin_contas_internas.id_origem     = null
    temp.pdv_vendas_detalhes.fin_contas_internas.fonte_origem  = 'pdv_vendas_detalhes'
    temp.pdv_vendas_detalhes.fin_contas_internas.id_pessoa     = id_profexec
    temp.pdv_vendas_detalhes.fin_contas_internas.tipo          = null
    temp.pdv_vendas_detalhes.fin_contas_internas.percentual    = $('#id_profexec').find(':selected').attr('data-prc_comissao')
    temp.pdv_vendas_detalhes.fin_contas_internas.valor         = temp.pdv_vendas_detalhes.fin_contas_internas.percentual * temp.pdv_vendas_detalhes.vlr_final
    temp.pdv_vendas_detalhes.fin_contas_internas.dt_prevista   = moment().format('YYYY-MM-DD')
    temp.pdv_vendas_detalhes.fin_contas_internas.dt_quitacao   = null
    temp.pdv_vendas_detalhes.fin_contas_internas.id_destino    = null
    temp.pdv_vendas_detalhes.fin_contas_internas.fonte_destino = null
    temp.pdv_vendas_detalhes.fin_contas_internas.status        = 'Em Aberto'
    temp.pdv_vendas_detalhes.fin_contas_internas.apelido       = $('#id_profexec').find(':selected').text()
    $('#vlr_m_comissao').val(accounting.formatMoney(temp.pdv_vendas_detalhes.fin_contas_internas.valor))

    atualizar_comissao( id_profexec )
  }
  
  function atualizar_comissao( id_profexec = 0 )
  {
    if($("#id_profexec").val() != 'NULL')
    {
      temp.pdv_vendas_detalhes.fin_contas_internas.tipo = $('input[name="cmp_tipo_comissao"]:checked').val()
    
      switch (temp.pdv_vendas_detalhes.fin_contas_internas.tipo)
      {          
        case 'Comissão Sob Valor Final':
          $('#cmp_m_comissao').addClass('d-none')
          temp.pdv_vendas_detalhes.fin_contas_internas.percentual = $('#id_profexec').find(':selected').attr('data-prc_comissao')
          temp.pdv_vendas_detalhes.fin_contas_internas.valor = temp.pdv_vendas_detalhes.fin_contas_internas.percentual * temp.pdv_vendas_detalhes.vlr_final
        break

        case 'Comissão Sob Valor Tabelado':
          $('#cmp_m_comissao').addClass('d-none')
          temp.pdv_vendas_detalhes.fin_contas_internas.percentual = $('#id_profexec').find(':selected').attr('data-prc_comissao')
          temp.pdv_vendas_detalhes.fin_contas_internas.valor = temp.pdv_vendas_detalhes.fin_contas_internas.percentual * temp.pdv_vendas_detalhes.vlr_negociado
        break
          
        case 'Comissão Zerada':
          $('#cmp_m_comissao').addClass('d-none')
          temp.pdv_vendas_detalhes.fin_contas_internas.percentual = 0
          temp.pdv_vendas_detalhes.fin_contas_internas.valor = 0
        break
          
        case 'Comissão Manual':
          $('#cmp_m_comissao').removeClass('d-none')
          $('#vlr_m_comissao').focus()
          tp_m_comissao()
        break

        default:
          temp.pdv_vendas_detalhes.fin_contas_internas.percentual = $('#id_profexec').find(':selected').attr('data-prc_comissao')
          temp.pdv_vendas_detalhes.fin_contas_internas.valor = temp.pdv_vendas_detalhes.fin_contas_internas.percentual * temp.pdv_vendas_detalhes.vlr_final
      }
          
      $('#profexec_feedback').text(temp.pdv_vendas_detalhes.fin_contas_internas.tipo+' | Percentual: '+accounting.formatMoney(temp.pdv_vendas_detalhes.fin_contas_internas.percentual * 100, '', 1)+'% | Valor: '+accounting.formatMoney(temp.pdv_vendas_detalhes.fin_contas_internas.valor))
      $('#profexec_feedback').removeClass('d-none').addClass('d-block')
      temp.pdv_vendas_detalhes.fin_contas_internas.id_pessoa = $("#id_profexec").val()
      temp.pdv_vendas_detalhes.fin_contas_internas.apelido = $("#id_profexec").find(':selected').text()
    }
    else
    {
      $('#profexec_feedback').removeClass('d-block').addClass('d-none')
      temp.pdv_vendas_detalhes.fin_contas_internas.id_pessoa = null
      temp.pdv_vendas_detalhes.fin_contas_internas.apelido  = null
    }
  }

  function tp_m_comissao( chave = null )
  {
    tp = $('#tp_m_comissao').attr('data-tp_m_comissao')

    if(chave == null)
    {
      if(tp == '%')
      {
        $('#tp_m_comissao').attr('data-tp_m_comissao', '%')
        $('#tp_m_comissao').text('%')
        temp.pdv_vendas_detalhes.fin_contas_internas.percentual = accounting.unformat($('#vlr_m_comissao').val()) / 100
        temp.pdv_vendas_detalhes.fin_contas_internas.valor = temp.pdv_vendas_detalhes.fin_contas_internas.percentual * temp.pdv_vendas_detalhes.vlr_final

        $('#vlr_m_comissao').val(accounting.formatMoney(temp.pdv_vendas_detalhes.fin_contas_internas.percentual * 100) )
        
        $('#profexec_feedback').text(temp.pdv_vendas_detalhes.fin_contas_internas.tipo+' | Percentual: '+accounting.formatMoney(temp.pdv_vendas_detalhes.fin_contas_internas.percentual * 100, '', 1)+'% | Valor: '+accounting.formatMoney(temp.pdv_vendas_detalhes.fin_contas_internas.valor))
      }
      else if(tp == 'R$')
      {
        $('#tp_m_comissao').attr('data-tp_m_comissao', 'R$')
        $('#tp_m_comissao').text('R$')
        temp.pdv_vendas_detalhes.fin_contas_internas.valor = accounting.unformat($('#vlr_m_comissao').val())
        temp.pdv_vendas_detalhes.fin_contas_internas.percentual = temp.pdv_vendas_detalhes.fin_contas_internas.valor / temp.pdv_vendas_detalhes.vlr_final 
        
        $('#vlr_m_comissao').val(accounting.formatMoney(temp.pdv_vendas_detalhes.fin_contas_internas.valor))

        $('#profexec_feedback').text(temp.pdv_vendas_detalhes.fin_contas_internas.tipo+' | Percentual: '+accounting.formatMoney(temp.pdv_vendas_detalhes.fin_contas_internas.percentual * 100, '', 1)+'% | Valor: '+accounting.formatMoney(temp.pdv_vendas_detalhes.fin_contas_internas.valor))
      }
    }
    else
    {
      if( $('#tp_m_comissao').attr('data-tp_m_comissao') == 'R$' )
      {
        $('#tp_m_comissao').attr('data-tp_m_comissao', '%')
        $('#vlr_m_comissao').val(accounting.formatMoney(temp.pdv_vendas_detalhes.fin_contas_internas.percentual * 100))
      }
      else
      {
        $('#tp_m_comissao').attr('data-tp_m_comissao', 'R$')
        $('#vlr_m_comissao').val(accounting.formatMoney(temp.pdv_vendas_detalhes.fin_contas_internas.valor))
      }
      tp_m_comissao()
    }
  }

  function atualizar_cmp_vendas()
  {
    $('#cmp_vlr_negociado').val(accounting.formatMoney(temp.pdv_vendas_detalhes.vlr_negociado * 1, ''))
    $('#cmp_quantidade').val(temp.pdv_vendas_detalhes.quantidade * 1)
    $('#cmp_vlr_dsc_acr').val(accounting.formatMoney(temp.pdv_vendas_detalhes.vlr_dsc_acr * 1, ''))
    $('#cmp_vlr_final').val(accounting.formatMoney(temp.pdv_vendas_detalhes.vlr_final * 1, ''))
    
    switch (temp.pdv_vendas_detalhes.tipo)
    {
      case 'Produto':
        $('#servprod_feedback').text('Produto | Estoque Atual: '+temp.pdv_vendas_detalhes.estoque_atual)
        if(temp.pdv_vendas_detalhes.estoque_atual < 1)   // Verifica Estoque e segue ou não dependendo da linha comentada abaixo
        {
          $('#servprod_feedback').removeClass('valid-feedback').addClass('invalid-feedback')
          // alert('Estamos sem esse produto no estoque.')
          // servprod_resetar()  // desativei linha q reseta caso estoque seja 0
        }
        else
        {
          $('#servprod_feedback').removeClass('invalid-feedback').addClass('valid-feedback')
        }
        break
        
      case 'Serviço':
        $('#servprod_feedback').text('Serviço | Tipo do preço: '+temp.pdv_vendas_detalhes.tipo_preco)
        $('#servprod_feedback').removeClass('invalid-feedback').addClass('valid-feedback')

        if(temp.pdv_vendas_detalhes.tipo_preco == "Preço fixo")
        {
          $('#cmp_vlr_negociado').prop('disabled', true)
        }
        else if(temp.pdv_vendas_detalhes.tipo_preco == "Preço variável")
        {
          $('#cmp_vlr_negociado').prop('disabled', false)
        }
        else
        {
          $('#cmp_vlr_negociado').prop('disabled', true)
          $('#servprod_feedback').text('Serviço')
        }
        break
          
      default:
        $('#servprod_feedback').text(temp.pdv_vendas_detalhes.tipo+' | Tipo do preço: '+temp.pdv_vendas_detalhes.tipo_preco)
        break
    }
  }
  
  function venda_detalhes_adicionar()
  {
    $('#vendas-overlay').show()

    temp_detalhes = {
      "identificador" : index_d,
      "id_servprod"   : temp.pdv_vendas_detalhes.id_servprod,
      "quantidade"    : temp.pdv_vendas_detalhes.quantidade,
      "vlr_venda"     : temp.pdv_vendas_detalhes.vlr_venda,
      "vlr_negociado" : temp.pdv_vendas_detalhes.vlr_negociado,
      "vlr_dsc_acr"   : temp.pdv_vendas_detalhes.vlr_dsc_acr,
      "vlr_final"     : temp.pdv_vendas_detalhes.vlr_final,
      "obs"           : temp.pdv_vendas_detalhes.obs,
      "status"        : temp.pdv_vendas_detalhes.status,
      "nome"          : temp.pdv_vendas_detalhes.nome
    }

    if(temp.pdv_vendas_detalhes.fin_contas_internas.id_pessoa != null)
    {
      temp_detalhes.fin_contas_internas = {
        "id_origem"     : temp.pdv_vendas_detalhes.fin_contas_internas.id_origem,
        "fonte_origem"  : temp.pdv_vendas_detalhes.fin_contas_internas.fonte_origem,
        "id_pessoa"     : temp.pdv_vendas_detalhes.fin_contas_internas.id_pessoa,
        "tipo"          : temp.pdv_vendas_detalhes.fin_contas_internas.tipo,
        "percentual"    : temp.pdv_vendas_detalhes.fin_contas_internas.percentual,
        "valor"         : temp.pdv_vendas_detalhes.fin_contas_internas.valor,
        "dt_prevista"   : temp.pdv_vendas_detalhes.fin_contas_internas.dt_prevista,
        "dt_quitacao"   : temp.pdv_vendas_detalhes.fin_contas_internas.dt_quitacao,
        "id_destino"    : temp.pdv_vendas_detalhes.fin_contas_internas.id_destino,
        "fonte_destino" : temp.pdv_vendas_detalhes.fin_contas_internas.fonte_destino,
        "status"        : temp.pdv_vendas_detalhes.fin_contas_internas.status,
        "apelido"       : temp.pdv_vendas_detalhes.fin_contas_internas.apelido,
      }
    }

    pdv_vendas_detalhes.push(temp_detalhes)
    index_d = index_d + 1
    
    pdv_vendas.qtd_produtos  = collect(pdv_vendas_detalhes).count()
    pdv_vendas.vlr_final     = collect(pdv_vendas_detalhes).sum('vlr_final')

    $('#vendas-overlay').hide()

    vendas_form_preencher()
    servprod_resetar()
  }

  function servprod_resetar()
  {
    $("#id_servprod_selecionar").val($("#id_servprod_selecionar option:first").val()).trigger('change');
    
    $('#servprod_feedback').removeClass('d-block').addClass('d-none')
    $('#profexec_feedback').removeClass('d-block').addClass('d-none')
  
    $('#vlr_m_comissao').val(0)
    temp.pdv_vendas_detalhes   = {}
    temp.pdv_vendas_detalhes.fin_contas_internas = {}
  }

  function atualizar_valor_final( valor )
  {
    if(collect(pdv_vendas_detalhes).count() > 0)
    {
      $('#stp_next').removeClass('disabled')
    }
    else
    {
      $('#stp_next').addClass('disabled')
    }

    vlr_anterior = accounting.unformat($('#cmp_vlr_dsc_acr').val())
    
    temp.pdv_vendas_detalhes.vlr_dsc_acr   = accounting.unformat(vlr_anterior + valor)
    temp.pdv_vendas_detalhes.quantidade    = accounting.unformat($('#cmp_quantidade').val())
    temp.pdv_vendas_detalhes.vlr_negociado = accounting.unformat($('#cmp_vlr_negociado').val())
    temp.pdv_vendas_detalhes.unitario      = ( temp.pdv_vendas_detalhes.vlr_negociado + temp.pdv_vendas_detalhes.vlr_dsc_acr )

    temp.pdv_vendas_detalhes.vlr_final     = ( temp.pdv_vendas_detalhes.vlr_negociado + temp.pdv_vendas_detalhes.vlr_dsc_acr ) * temp.pdv_vendas_detalhes.quantidade
    
    atualizar_cmp_vendas()
    atualizar_comissao()
  }
  
  function servprod_info()
  {
    alert('abrir modal servprod_info')
  }
</script>