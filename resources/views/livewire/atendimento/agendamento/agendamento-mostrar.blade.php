<div>
    @if($modal)
    <div class="modal fade show" style="display: block !important;" aria-modal="true" role="dialog">
        <!-- <div class="modal-dialog mw-100 mh-100" style="width: 95%; height: 95%;"> -->
        <!-- <div class="modal-dialog"> -->
        <!-- <div class="modal-dialog" style="overflow-y: initial !important;"></div> -->
        <div class="modal-dialog modal-xl">

            <div class="modal-content" style="height: 95%;">
            <!-- <div class="modal-content"> -->

                <div class="overlay d-none" wire:loading.class.remove="d-none">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
                
                <div class="modal-header" style="padding: 8px 16px; background-color: {{ $agendamento->color }}">
                    <h4 class="modal-title">{{ $agendamento->xhooqvzhbgojbtg->apelido ?? 'Cliente'}}</h4>
                    <div class="card-tools">
                        <span class="badge badge-primary">({{ $agendamento->id }})</span>
                        <button type="button" class="close" wire:click="toggle_modal(false)">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>

                <div class="modal-body" style="height: 70vh; overflow-y: auto;">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12 order-1">
                            {{-- <div class="col-12 col-md-12 col-lg-4 order-1"> --}}
                            <div class="post">
                                <div class="user-block pb-2">
                                    <img class="img-circle img-bordered-sm" src="{{ $agendamento->xhooqvzhbgojbtg->src_foto ?? asset('storage/profile-photos/0.png') }}" alt="user image">
                                    <span class="username">
                                        <a>{{ $agendamento->xhooqvzhbgojbtg->apelido ?? 'Cliente'}} ({!! $agendamento->xhooqvzhbgojbtg->link_id ?? '#id' !!})</a>
                                    </span>
                                    <span class="description">{{ $agendamento->xhooqvzhbgojbtg->nome ?? 'Cliente'}} - {{ $agendamento->xhooqvzhbgojbtg->nascimento ?? 'Data de Nascimento'}}</span>
                                </div>
                                
                                </br>
                                
                                <div class="clearfix p-1">
                                    <h7 class="d-block">Serviço</br>
                                        <b>{{ $agendamento->zlpekczgsltqgwg->nome ?? 'Serviço'}}</b> 
                                        (<span class="text-sm description">Duração: {{ \Carbon\Carbon::parse($agendamento->start)->diff($agendamento->end)->format('%H:%I') }}</span>)
                                    </h7>
                                </div>
                            
                                <div class="clearfix p-1">
                                    <h7 class="d-block">Horário</br>
                                    <b>{{ \Carbon\Carbon::parse($agendamento->start)->format("d/M") }} - {{ \Carbon\Carbon::parse($agendamento->start)->format("H:i") }} às {{ \Carbon\Carbon::parse($agendamento->end)->format("H:i") }}</b>
                                    </h7>
                                </div>
                        
                                <div class="clearfix p-1">
                                    <h7 class="d-block">Profissional<br>
                                        <img class="img-circle img-bordered-sm" src="{{ $agendamento->hhmaqpijffgfhmj->src_foto ?? asset('storage/profile-photos/0.png') }}" alt="user image" style="width: 40px;">
                                        <span class="description">
                                            <b>{{ $agendamento->hhmaqpijffgfhmj->apelido ?? 'Profissional' }}</b>
                                        </span>
                                    </h7>
                                </div>

                                <div class="clearfix p-1">
                                    <h7 class="d-block">Observação</br>
                                        <b>{{ $agendamento->obs ?? '-' }}</b>
                                    </h7>
                                </div>
                    
                                <div class="clearfix p-1">
                                    <h7 class="d-block">Status</br>
                                        <span class="badge badge-primary" style="background-color: {{ $agendamento->color }}; color: black;"><b>{{ $agendamento->status }}</b></span></b>
                                    </h7>
                                </div>
                                
                                <div class="text-center pt-4">
                                    <!-- 
                                        <a href="#" class="btn btn-sm" style="background-color: #FFFF66; width: 35px;" title="Agendado" >
                                            <i class="fa-solid fa-calendar"></i>
                                        </a>
                                    -->
                                    <a href="#" class="btn btn-sm" style="background-color: lightsalmon; width: 35px;" title="Atrasado" wire:click="agendamento_editar_status('Atrasado')">
                                        <i class="fa-solid fa-plane-circle-xmark"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm" style="background-color: lightgreen; width: 35px;" title="Chegou" wire:click="agendamento_editar_status('Confirmado')">
                                        <i class="fa-regular fa-calendar-check"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm" style="background-color: lightblue; width: 35px;" title="Lançado" wire:click="agendamento_editar_status('Finalizado')">
                                        <i class="fa-solid fa-square-check"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm" style="background-color: lightcoral; width: 35px;" title="Faltou" wire:click="agendamento_editar_status('Faltou')">
                                        <i class="fa-solid fa-person-circle-xmark"></i>
                                    </a>
                                    <!--
                                        <a href="#" class="btn btn-sm" style="background-color: goldenrod; width: 35px;" title="Fixa" >
                                            <i class="fa-regular fa-calendar-days"></i>
                                        </a>
                                    -->
                                    
                                    @can('Excluir agendamentos')
                                    <a href="#" class="btn btn-sm" style="background-color: black; color: white; width: 35px;" title="Excluir" wire:click="delete({{ $agendamento->id }})">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    
                        <!-- 
                        <div class="col-12">
                            <div class="form-group">
                                <label for="col-form-label">Nome do Cliente</label>
                                <select class="form-control form-control-sm" wire:model.live="id_cliente">
                                    <option>Selecione um cliente . . .</option>
                                    <option value="0">( Cliente sem cadastro )</option>
                                </select>
                                <input type="datetime-local" class="form-control form-control-sm" wire:model.live="start">
                            </div>
                        </div> 
                        -->
                        
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-4 text-left text-sm-left text-md-left text-lg-left">
                            <small>
                                <strong>Cadastrado: </strong>{{ \Carbon\Carbon::parse($agendamento->created_at)->format("d/n/Y") }} às {{ \Carbon\Carbon::parse($agendamento->created_at)->format("H:i:s") }}
                            </small>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4 text-left text-sm-left text-md-center text-lg-center">
                            <small>
                                <strong>Por: </strong>{{ $agendamento->eiuroereuwnofiw->apelido }} - Grupo {{ $agendamento->grupo }} 
                            </small>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4 text-left text-sm-left text-md-right text-lg-right">
                            <small>
                                <strong>Última edição: </strong>{{ \Carbon\Carbon::parse($agendamento->updated_at)->format("d/n/Y") }} às {{ \Carbon\Carbon::parse($agendamento->updated_at)->format("H:i:s") }}
                            </small>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                <!-- <div class="modal-footer p-2"> -->
                    @can('Editar agendamentos')
                    <button type="button" class="btn btn-primary" wire:click="$dispatch('modal-agendamento-editar', { id: {{ $agendamento->id }} })">Editar</button>
                    @endcan
                    <button type="button" class="btn btn-default" wire:click="toggle_modal(false)">Fechar</button>
                    <!-- <button type="button" class="btn btn-success" wire:click="store">Salvar</button> -->
                </div>
                
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    @endif
</div>


{{--
================================================================================================================================================================================================================
================================================================================================================================================================================================================
================================================================================================================================================================================================================



<script type="text/javascript">
  function agendamento_editar_status( status )
  {
    if(status != 'EXCLUIR')
    {
      url = "route('atd.agendamentos.atualizar', ':id')";
      url = url.replace(':id', $('#id').val() );
      
      var dados = {
        status  : status,
      }

      axios.put( url, dados)
      .then(function(response)
      {
        // console.log(response)
        toastrjs(response.data.type, response.data.message);
      })
      .then(function ()
      {
        $('#modal-geral-1').modal('hide')

        setTimeout(function() {
          agendamentos_recarregar()
        }, 1000);
      })  
    }
  }

--}}