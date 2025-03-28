<div>
    <livewire:Atendimento.Agendamento.AgendamentoCriar />
    <livewire:Atendimento.Agendamento.AgendamentoMostrar />
    <livewire:Atendimento.Agendamento.AgendamentoEditar />
    <div class="card">
        <div class="overlay d-none" wire:loading.class.remove="d-none">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
        </div>
        <div class="card-header">
            <h3 class="card-title">Agenda</h3>
            <div class="card-tools">
                @can('Ver todas agendas')
                <button class="btn btn-sm btn-primary" wire:click="$dispatch('modal-agendamento-criar', {start: objCalendar.getDate()} )"><i class="fas fa-plus"></i> Novo agendamento</button>
                @endcan
                <div class="btn-group">
                    {{-- 
                    @can('Ver todas agendas')
                    <a class="btn btn-sm btn-default" wire:click="$dispatch('modal-agendamento-criar')"><i class="fas fa-plus"></i></a>
                    @endcan
                    --}}
                    @can('Ver todas agendas')
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-list-ol"></i></button>
                    <div class="dropdown-menu" role="menu">
                        @foreach(auth()->user()->aslfenvkvuelkds()->whereNotNull('id_pessoa')->pluck('nome_ordem')->unique()->values() as $perfil)
                            <button class="dropdown-item {{ auth()->user()->ordem == $perfil ? 'bg-primary' : '' }}" wire:click="mostrar_perfil_ordem('{{ $perfil }}')">
                                {{ $perfil }}
                            </button>
                        @endforeach
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('atd.agendamentos.ordem') }}">Configurar perfis</a>
                        {{-- <button class="dropdown-item" wire:click="$dispatch('modal-agendamento-ordem')">Configurar</button> --}}
                    </div>
                    @endcan
                    <a class="btn btn-sm btn-default dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fas fa-calendar"></i>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <div wire:ignore id="mini_calendario"></div>
                    </div>
                    <!-- <a class="btn btn-sm btn-default" wire:click="$dispatch('fullcalendar-refresh')"><i class="fas fa-refresh"></i></a> -->
                </div>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <div wire:ignore id='div_calendar'></div>
        </div>
    </div>
    
    @push('js')
    <script src="{{ asset('dist/index.global.js') }}"></script>
    
    <script type="text/javascript"> let objCalendar; </script>

    <script>
        $('#mini_calendario').datepicker({
            language: 'pt-BR', // define o idioma do datapicker
            format: 'dd/mm/yyyy', // define o formato da data
            autoclose: true // fecha automaticamente o datapicker ao selecionar uma data
        }).on('changeDate', function (ev)
        {
            objCalendar.gotoDate(new Date(ev.date))
        });
        
        // document.addEventListener('livewire:init', function() {
            // let component = @this;

            // component.testeAgend().then( function(res) {
            //     
        // })

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('div_calendar');
            
            var calendar = new FullCalendar.Calendar(calendarEl, {
                // refetchResourcesOnNavigate: true,

                //   aspectRatio: 1.8,
                schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
                locale: 'pt-br',
                nowIndicator: true,
                height: 'auto', 
                
                dayMaxEventRows: true,    
                eventMaxStack: 4,
                dayHeaders:true,
                
                editable: true,
                @can('Criar novo agendamento')
                selectable: true,
                @endcan
                // dayMaxEvents: true, // allow "more" link when too many events


                initialView: 'resourceTimeGridDay',
                // slotDuration: '01:00:00',
                slotMinTime: '07:00:00',
                slotMaxTime: '21:00:00',
                selectConstraint: 
                {
                    start: '08:00:00',
                    end: '18:00:00'
                },
                businessHours: [ // specify an array instead
                {
                    daysOfWeek: [ 2, 3, 4, 5, 6 ], // Monday, Tuesday, Wednesday
                    startTime: '08:00', // 8am
                    endTime: '12:00' // 6pm
                },
                {
                    daysOfWeek: [ 2, 3, 4, 5, 6 ], // Monday, Tuesday, Wednesday
                    startTime: '13:00', // 10am
                    endTime: '19:00' // 4pm
                }],
                selectMirror: true,
                dayMaxEvents: false, // allow "more" link when too many events
                headerToolbar: {
                    left: 'today prev,next',
                    center: 'title',
                    right: 'resourceTimeGridDay,resourceTimelineDay'
                    // right: 'resourceTimelineDay,resourceTimelineThreeDays,timeGridWeek,dayGridMonth'
                },
                buttonText: {
                    resourceTimeGridDay: 'Verical',
                    resourceTimelineDay: 'Horizontal',
                },

                views:
                {
                    resourceTimeGridDay:
                    {
                        titleFormat:
                        {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: '2-digit'
                        },
                    },
                },
                droppable: true, // this allows things to be dropped onto the calendar
                allDaySlot: false,
                
                resourceOrder: 'area,ordem',
                
                datesAboveResources: true,
                dayMinWidth: 70,
                
                resourceLabelContent: (info) =>
                {
                    var html = '<img src="'+info.resource._resource.extendedProps.src_foto+'" class="user-image img-circle" width="35px" alt="'+info.resource.title+'" data-bs-tooltip="tooltip" data-bs-title="'+info.resource.title+'"/><br>'+info.resource._resource.extendedProps.primeiro_nome;

                    // agendamentos_tooltips()

                    return { html: html }
                },
                
                resources: function(fetchInfo, successCallback, failureCallback)
                {
                    retornar_resources(fetchInfo)
                    .then((returnEvents) => {
                        successCallback(returnEvents);
                    })
                },

                events: function(fetchInfo, successCallback, failureCallback)
                {
                    retornar_events(fetchInfo)
                    .then((returnEvents) => {
                        successCallback(returnEvents);
                    })
                },
        
                select: function(info)
                {
                    agendamentos_criar(info) 
                },
                
                eventClick: function(info)
                {
                    agendamentos_mostrar(info)
                },
                
                eventReceive: info => @this.eventReceive(info.event),
                
                eventDrop: info => @this.eventDrop(info),
                
                eventResize: info => @this.eventResize(info),
            });

        // Reinderizar
        objCalendar = calendar;
        calendar.render();
    })

    async function retornar_resources(fetchInfo)
    {
        return <x-Atendimento.Agendamento.Resources/>;
    }

    async function retornar_events(fetchInfo)
    {
        var informacao = {
            start   : fetchInfo.start,
            end     : fetchInfo.end,
        };
        
        Livewire.dispatch('fullcalendar-refresh', informacao);
        console.log(@json($eventos));

        return @json($eventos);
    }

    function agendamentos_criar(info)
    {
        const informacao = {
            info:      info,
        };

        Livewire.dispatch('modal-agendamento-criar', informacao);
    }
    
    function agendamentos_mostrar(info)
    {
        const informacao = {
            id:       info.event.id ,
        };

        Livewire.dispatch('modal-agendamento-mostrar', informacao);
    }
    
    window.addEventListener('FullCalendar:refresh', event => {
        objCalendar.refetchResources()
        objCalendar.removeAllEvents();
        objCalendar.addEventSource(event.detail[0]);
        $('#mini_calendario').datepicker()
    });
</script>

@endpush
</div>
