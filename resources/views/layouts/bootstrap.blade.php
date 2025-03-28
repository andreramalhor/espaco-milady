<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">

        <!-- AdminLTE Template -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jqvmap.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css"/>
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/2.3.0/styles/overlayscrollbars.min.css"/> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"/>
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css" rel="stylesheet" />
        <!-- <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"  rel="stylesheet" /> -->
        <!-- <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,300,0,-25"  rel="stylesheet" /> -->
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,700,0,200" rel="stylesheet" />
        <link href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css" rel="stylesheet">
        
        <!-- <link rel="stylesheet" href="{{ asset('assets/fullcalendar/lib/main.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/fullcalendar-scheduler/lib/main.min.css') }}"> -->
        
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
        <!-- Styles -->
        @stack('css')
        @livewireStyles
    </head>

    <!-- <body class="pace-done sidebar-collapse text-sm accent-dark vsc-initialized control-sidebar-slide-open sidebar-mini-xs sidebar-mini layout-navbar-fixed layout-fixed"> sidebar-mini adicionar essa classe para aparecer -->
    <body class=" sidebar-mini-xs text-xs sidebar-closed sidebar-collapse">
        {{--
            <x-banner />
        --}}

        <div class="wrapper">
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{ url('storage/app/logo.png') }}" alt="AdminLTELogo" height="60" width="60">
            </div>
            @include('layouts.parts.navbar')
            @include('layouts.parts.side-menu')

            <div class="content-wrapper p-2">
                {{--
                CASO QUEIRA COLOCAR CABEÇALHO COM TÍTULO DE PÁGINA
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Fixed Layout</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Layout</a></li>
                                    <li class="breadcrumb-item active">Fixed Layout</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                --}}
                <section class="content p-0">                
                    <div class="container-fluid">
                    
                    
                        {{ $slot ?? '' }}

                        <livewire:PDV.Comanda.ComandaMostrar />


                    </div>
                </section>
              
            </div>

            {{--
            <footer class="main-footer">
                <strong>Copyright &copy; 2023 <a href="https://instagram.com/andreramalhor">André Ramalho</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Versão </b>5.1.0
                </div>
            </footer>
            --}}
            
            @include('layouts.parts.side-auxiliar')
            <!-- <div id="sidebar-overlay"></div> -->
        </div>

        <!-- AdminLTE Template-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js"></script> -->
        <!-- <script src="https://adminlte.io/themes/v3/plugins/chart.js/Chart.min.js"></script> -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jquery.vmap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/locales/bootstrap-datepicker.pt-BR.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/2.3.0/overlayscrollbars.cjs.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
        <!-- <script src="https://adminlte.io/themes/v3/dist/js/demo.js"></script> -->
        <!-- <script src="https://adminlte.io/themes/v3/dist/js/pages/dashboard.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.1/accounting.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/collect.js/4.34.3/collect.min.js"></script>

        
        <!-- <script src="{{ asset('assets/fullcalendar/lib/main.min.js') }}"></script> -->
        <!-- <script src="{{ asset('assets/fullcalendar/lib/locales/pt-br.js') }}"></script> -->
        <!-- <script src="{{ asset('assets/fullcalendar-scheduler/lib/main.min.js') }}"></script> -->
        <!-- <script src="{{ asset('assets/fullcalendar-scheduler/lib/locales/pt-br.js') }}"></script> -->
 
        <script>
            document.onkeydown = function(e)
            {
                if (e.keyCode == 27)
                {
                    Livewire.dispatch('fechar_modal', { status: false });
                }
            };
            

            $(document).ready(function()
            {
                $('.select2').select2();
            });
            
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $(document).on('select2:open', () => {
                document.querySelector('.select2-search__field').focus();
            });

            window.addEventListener('swal:alert', event => {
                Swal.fire({
                    title              : event.detail[0].title,
                    text               : event.detail[0].text,
                    icon               : event.detail[0].icon,
                    iconColor          : event.detail[0].iconColor,
                    showConfirmButton  : false,
                    timer              : 1500,
                })
            });
            
            window.addEventListener("swal:confirm", event => {
                Swal.fire({
                    title              : event.detail[0].title,
                    text               : event.detail[0].text,
                    icon               : event.detail[0].icon,
                    iconColor          : event.detail[0].iconColor,
                    confirmButtonText  : 'Sim, remover!',
                    confirmButtonColor : '#3085d6',
                    cancelButtonText   : 'Cancelar',
                    cancelButtonColor  : '#d33',
                    showCancelButton   : true,
                }).then((result) => {
                    if (result.isConfirmed)
                    {
                        console.log(238273892372)
                        console.log(result)
                        console.log(event)
                        Livewire.dispatch(event.detail[0].function || 'chamarMetodo', { id: event.detail[0].idEvent });
                    }
                })
            });
            
            window.addEventListener("swal:edit", event => {
                Swal.fire({
                    title              : event.detail[0].title,
                    text               : event.detail[0].text,
                    icon               : event.detail[0].icon,
                    iconColor          : event.detail[0].iconColor,
                    confirmButtonText  : 'Sim, editar!',
                    confirmButtonColor : '#3085d6',
                    cancelButtonText   : 'Cancelar',
                    cancelButtonColor  : '#d33',
                    showCancelButton   : true,
                }).then((result) => {
                    if (result.isConfirmed)
                    {
                        Livewire.dispatch(event.detail[0].function || 'metodoEditar', { id: event.detail[0].idEvent });
                    }
                    else
                    {
                        Livewire.dispatch('fullcalendar-refresh');
                    }
                })
            });
        </script>

        @stack('modals')
        @stack('js')
        @yield('js') {{-- // feito por andre para adaptacao do sistema antigo tobey --}}

        @livewireScripts
    </body>
</html>
