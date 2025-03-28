<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DRE Gerencial</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Categorias</th>
                            <th class="text-center">Dez/2024</th>
                            <th class="text-center">Jan/2025</th>
                            <th class="text-center">Fev/2025</th>
                            <th class="text-center">Mar/2025</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dre as $categoria)
                        <tr style="background-color: {{ $categoria->tipo == '-' ? '#f8d7da' : ( $categoria->tipo == '+' ? '#d1e7dd' : '#cff4fc' ) }}">
                            <td class="{{ $categoria->nivel == 0 ? 'text-bold' : '' }}">
                                {!! $categoria->nivel == 0 && $categoria->tipo == '-' ? '<i class="fa-solid fa-minus"></i>' : ( $categoria->nivel == 0 && $categoria->tipo == '=' ? '<i class="fa-solid fa-equals"></i>' : ( $categoria->nivel == 0 && $categoria->tipo == '+' ? '<i class="fa-solid fa-plus"></i>' : '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ) ) !!}
                                &nbsp;
                                {{ $categoria->titulo }}
                            </td>
                            <td class="text-right">
                                {{
                                    number_format(
                                        $categoria->
                                            ealkjerwqlejwej->
                                            whereBetween('created_at', 
                                            [
                                                \Carbon\Carbon::now()->subMonth(1)->startOfMonth(), 
                                                \Carbon\Carbon::now()->subMonth(1)->endOfMonth()
                                            ])->
                                            sum('vlr_final'), 2, ',', '.')
                                }}
                            </td>
                                    {{-- 
                                    // $lancamentos->
                                    // whereBetween('created_at', 
                                    // [
                                    //     \Carbon\Carbon::now()->startOfMonth(), 
                                    //     \Carbon\Carbon::now()->endOfMonth()
                                    // ])->
                                    // whereHas('qlwiqwuheqlefkd', function ($query)
                                    // {
                                    //     return $query->where('id_dre', '=', '11');
                                    // })->
                                    // sum('vlr_final')
                                    --}}
                            <td class="text-right">
                                {{
                                    number_format(
                                        $categoria->
                                            ealkjerwqlejwej->
                                            whereBetween('created_at', 
                                            [
                                                \Carbon\Carbon::now()->startOfMonth(), 
                                                \Carbon\Carbon::now()->endOfMonth()
                                            ])->
                                            sum('vlr_final'), 2, ',', '.')
                                }}
                            </td>
                            <td class="text-right">
                                {{
                                    number_format(
                                        $categoria->
                                            ealkjerwqlejwej->
                                            whereBetween('created_at', 
                                            [
                                                \Carbon\Carbon::now()->addMonth(1)->startOfMonth(), 
                                                \Carbon\Carbon::now()->addMonth(1)->endOfMonth()
                                            ])->
                                            sum('vlr_final'), 2, ',', '.')
                                }}
                            </td>
                            <td class="text-right">
                                {{
                                    number_format(
                                        $categoria->
                                            ealkjerwqlejwej->
                                            whereBetween('created_at', 
                                            [
                                                \Carbon\Carbon::now()->addMonth(2)->startOfMonth(), 
                                                \Carbon\Carbon::now()->addMonth(2)->endOfMonth()
                                            ])->
                                            sum('vlr_final'), 2, ',', '.')
                                }}
                            </td>
                            <td class="text-right"><strong>{{
                                number_format(
                                    $categoria->
                                        ealkjerwqlejwej->
                                        whereBetween('created_at', 
                                        [
                                            \Carbon\Carbon::now()->subMonth(1)->startOfMonth(), 
                                            \Carbon\Carbon::now()->addMonth(2)->endOfMonth()
                                        ])->
                                        sum('vlr_final'), 2, ',', '.')
                            }}</strong></td>
                        </tr>
                        @endforeach
                        <tr style="background-color: gray">
                            <td>NULL</td>
                            <td class="text-right">
                                {{
                                    number_format(
                                        $lancamentos->
                                            whereNull('id_dre')->
                                            whereBetween('created_at', 
                                            [
                                                \Carbon\Carbon::now()->subMonth(1)->startOfMonth(), 
                                                \Carbon\Carbon::now()->subMonth(1)->endOfMonth()
                                            ])->
                                            sum('vlr_final'), 2, ',', '.')
                                }}
                            </td>
                            <td class="text-right">
                                {{
                                    number_format(
                                        $lancamentos->
                                            whereNull('id_dre')->
                                            whereBetween('created_at', 
                                            [
                                                \Carbon\Carbon::now()->startOfMonth(), 
                                                \Carbon\Carbon::now()->endOfMonth()
                                            ])->
                                            sum('vlr_final'), 2, ',', '.')
                                }}
                            </td>
                            <td class="text-right">
                                {{
                                    number_format(
                                        $lancamentos->
                                            whereNull('id_dre')->
                                            whereBetween('created_at', 
                                            [
                                                \Carbon\Carbon::now()->addMonth(1)->startOfMonth(), 
                                                \Carbon\Carbon::now()->addMonth(1)->endOfMonth()
                                            ])->
                                            sum('vlr_final'), 2, ',', '.')
                                }}
                            </td>
                            <td class="text-right">
                                {{
                                    number_format(
                                        $lancamentos->
                                            whereNull('id_dre')->
                                            whereBetween('created_at', 
                                            [
                                                \Carbon\Carbon::now()->addMonth(2)->startOfMonth(), 
                                                \Carbon\Carbon::now()->addMonth(2)->endOfMonth()
                                            ])->
                                            sum('vlr_final'), 2, ',', '.')
                                }}
                            </td>
                            <td class="text-right">
                                <strong>
                                    {{
                                        number_format(
                                            $lancamentos->
                                                whereNull('id_dre')->
                                                whereBetween('created_at', 
                                                [
                                                    \Carbon\Carbon::now()->startOfMonth(), 
                                                    \Carbon\Carbon::now()->addMonth(2)->endOfMonth()
                                                ])->
                                                sum('vlr_final'), 2, ',', '.')
                                    }}
                                </strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>