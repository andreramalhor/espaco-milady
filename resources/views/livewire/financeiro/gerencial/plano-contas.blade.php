<div class="row">
    @php
    function gerar_demonstrativo_plano_contas($contas_contabeis, $lancamentos, $ano)
    {
        $html = "";

        foreach ($contas_contabeis as $item)
        {
            $html .= "<tr ";
            
            switch($item['nivel'])
            {
                case 0:
                    $html .= "style='background-color:lightgray; opacity:40%; color:black;'";
                    break;
                case 1:
                    $html .= "style='background-color:lightgray; opacity:60%; color:black;'";
                    break;
                case 2:
                    $html .= "style='background-color:lightgray; opacity:80%; color:black;'";
                    break;
                case 3:
                    $html .= "style='background-color:lightgray; opacity:100%; color:black;'";
                    break;
            }

            $html .= ">";
            $html .= "  <td>";
            $html .=        $item["id"];
            $html .= "  </td>";
            $html .= "  <td>";
            
            switch($item['nivel'])
            {
                case 0:
                    $html .= "";
                    break;
                case 1:
                    $html .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    break;
                case 2:
                    $html .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    break;
                case 3:
                    $html .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    break;
            }

            $html .=        $item['nivel'] . " - " . $item["titulo"];
            $html .= "  </td>";
            $html .= "  <td class='text-right'>";

                $saldoConta = new \App\View\Components\Contabilidade\Dre\SaldoConta();
                $saldoConta->idconta = $item["id"];
                $saldoConta->inicio  = \Carbon\Carbon::create($ano, 2)->startOfMonth();
                $saldoConta->final   = \Carbon\Carbon::create($ano, 2)->endOfMonth();
                
                $html .= $saldoConta->render();
            
            $html .= "  </td>";
            $html .= "  <td class='text-right'>";
            $html .=        number_format($lancamentos->where("id_conta", "=", $item->id)->whereBetween("created_at", [ \Carbon\Carbon::create($ano, 2)->startOfMonth(), \Carbon\Carbon::create($ano, 2)->endOfMonth() ])->sum("vlr_final"), 2, ",", ".");
            $html .= "  </td>";
            $html .= "  <td class='text-right'>";
            $html .=        number_format($lancamentos->where("id_conta", "=", $item->id)->whereBetween("created_at", [ \Carbon\Carbon::create($ano, 3)->startOfMonth(), \Carbon\Carbon::create($ano, 3)->endOfMonth() ])->sum("vlr_final"), 2, ",", ".");
            $html .= "  </td>";
            $html .= "  <td class='text-right'>";
            $html .=        number_format($lancamentos->where("id_conta", "=", $item->id)->whereBetween("created_at", [ \Carbon\Carbon::create($ano, 4)->startOfMonth(), \Carbon\Carbon::create($ano, 4)->endOfMonth() ])->sum("vlr_final"), 2, ",", ".");
            $html .= "  </td>";
            $html .= "  <td class='text-right'>";
            $html .=        number_format($lancamentos->where("id_conta", "=", $item->id)->whereBetween("created_at", [ \Carbon\Carbon::create($ano, 5)->startOfMonth(), \Carbon\Carbon::create($ano, 5)->endOfMonth() ])->sum("vlr_final"), 2, ",", ".");
            $html .= "  </td>";
            $html .= "  <td class='text-right'>";
            $html .=        number_format($lancamentos->where("id_conta", "=", $item->id)->whereBetween("created_at", [ \Carbon\Carbon::create($ano, 6)->startOfMonth(), \Carbon\Carbon::create($ano, 6)->endOfMonth() ])->sum("vlr_final"), 2, ",", ".");
            $html .= "  </td>";
            $html .= "  <td class='text-right'>";
            $html .=        number_format($lancamentos->where("id_conta", "=", $item->id)->whereBetween("created_at", [ \Carbon\Carbon::create($ano, 7)->startOfMonth(), \Carbon\Carbon::create($ano, 7)->endOfMonth() ])->sum("vlr_final"), 2, ",", ".");
            $html .= "  </td>";
            $html .= "  <td class='text-right'>";
            $html .=        number_format($lancamentos->where("id_conta", "=", $item->id)->whereBetween("created_at", [ \Carbon\Carbon::create($ano, 8)->startOfMonth(), \Carbon\Carbon::create($ano, 8)->endOfMonth() ])->sum("vlr_final"), 2, ",", ".");
            $html .= "  </td>";
            $html .= "  <td class='text-right'>";
            $html .=        number_format($lancamentos->where("id_conta", "=", $item->id)->whereBetween("created_at", [ \Carbon\Carbon::create($ano, 9)->startOfMonth(), \Carbon\Carbon::create($ano, 9)->endOfMonth() ])->sum("vlr_final"), 2, ",", ".");
            $html .= "  </td>";
            $html .= "  <td class='text-right'>";
            $html .=        number_format($lancamentos->where("id_conta", "=", $item->id)->whereBetween("created_at", [ \Carbon\Carbon::create($ano, 10)->startOfMonth(), \Carbon\Carbon::create($ano, 10)->endOfMonth() ])->sum("vlr_final"), 2, ",", ".");
            $html .= "  </td>";
            $html .= "  <td class='text-right'>";
            $html .=        number_format($lancamentos->where("id_conta", "=", $item->id)->whereBetween("created_at", [ \Carbon\Carbon::create($ano, 11)->startOfMonth(), \Carbon\Carbon::create($ano, 11)->endOfMonth() ])->sum("vlr_final"), 2, ",", ".");
            $html .= "  </td>";
            $html .= "  <td class='text-right'>";
            $html .=        number_format($lancamentos->where("id_conta", "=", $item->id)->whereBetween("created_at", [ \Carbon\Carbon::create($ano, 12)->startOfMonth(), \Carbon\Carbon::create($ano, 12)->endOfMonth() ])->sum("vlr_final"), 2, ",", ".");
            $html .= "  </td>";
            $html .= "  <td class='text-right'>";
            $html .= "      <stron>";
            $html .=            number_format($lancamentos->where("id_conta", "=", $item->id)->sum("vlr_final"), 2, ",", ".");
            $html .= "      </stron>";
            $html .= "  </td>";
            $html .= "</tr>";


            $item["conta_pai"] = $item["conta_pai"] + 1;
            if (!empty($item["sasjiqelrhwkejs"]))
            {
                $html .= gerar_demonstrativo_plano_contas($item->sasjiqelrhwkejs, $lancamentos, $ano);
            }
        }

        return $html;
    }

    function gerar_demonstrativo_null_plano_contas($lancamentos, $ano)
    {
        $html = '';
        
        $html .= '<tr>';
        $html .= '  <td>';
        $html .= '-';
        $html .= '  </td>';
        $html .= '  <td>';
        $html .= 'NULL';
        $html .= '  </td>';

        $html .= '  <td class="text-right">';
        $html .=        number_format($lancamentos->whereNull('id_conta')->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 1)->startOfMonth(), \Carbon\Carbon::create($ano, 1)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </td>';
        $html .= '  <td class="text-right">';
        $html .=        number_format($lancamentos->whereNull('id_conta')->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 2)->startOfMonth(), \Carbon\Carbon::create($ano, 2)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </td>';
        $html .= '  <td class="text-right">';
        $html .=        number_format($lancamentos->whereNull('id_conta')->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 3)->startOfMonth(), \Carbon\Carbon::create($ano, 3)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </td>';
        $html .= '  <td class="text-right">';
        $html .=        number_format($lancamentos->whereNull('id_conta')->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 4)->startOfMonth(), \Carbon\Carbon::create($ano, 4)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </td>';
        $html .= '  <td class="text-right">';
        $html .=        number_format($lancamentos->whereNull('id_conta')->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 5)->startOfMonth(), \Carbon\Carbon::create($ano, 5)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </td>';
        $html .= '  <td class="text-right">';
        $html .=        number_format($lancamentos->whereNull('id_conta')->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 6)->startOfMonth(), \Carbon\Carbon::create($ano, 6)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </td>';
        $html .= '  <td class="text-right">';
        $html .=        number_format($lancamentos->whereNull('id_conta')->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 7)->startOfMonth(), \Carbon\Carbon::create($ano, 7)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </td>';
        $html .= '  <td class="text-right">';
        $html .=        number_format($lancamentos->whereNull('id_conta')->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 8)->startOfMonth(), \Carbon\Carbon::create($ano, 8)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </td>';
        $html .= '  <td class="text-right">';
        $html .=        number_format($lancamentos->whereNull('id_conta')->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 9)->startOfMonth(), \Carbon\Carbon::create($ano, 9)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </td>';
        $html .= '  <td class="text-right">';
        $html .=        number_format($lancamentos->whereNull('id_conta')->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 10)->startOfMonth(), \Carbon\Carbon::create($ano, 10)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </td>';
        $html .= '  <td class="text-right">';
        $html .=        number_format($lancamentos->whereNull('id_conta')->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 11)->startOfMonth(), \Carbon\Carbon::create($ano, 11)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </td>';
        $html .= '  <td class="text-right">';
        $html .=        number_format($lancamentos->whereNull('id_conta')->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 12)->startOfMonth(), \Carbon\Carbon::create($ano, 12)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </td>';
        $html .= '  <td class="text-right">';
        $html .= '      <stron>';
        $html .=            number_format($lancamentos->whereNull('id_conta')->sum('vlr_final'), 2, ',', '.');
        $html .= '      </stron>';
        $html .= '  </td>';
        $html .= '</tr>';

        return $html;
    }

    function gerar_demonstrativo_rodape_plano_contas($lancamentos, $ano)
    {
        $html = '';

        $html .= '<tr>';
        $html .= '  <th></th>';
        $html .= '  <th></th>';
        $html .= '  <th class="text-right">';
        $html .=        number_format($lancamentos->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 1)->startOfMonth(), \Carbon\Carbon::create($ano, 1)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </th>';
        $html .= '  <th class="text-right">';
        $html .=        number_format($lancamentos->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 2)->startOfMonth(), \Carbon\Carbon::create($ano, 2)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </th>';
        $html .= '  <th class="text-right">';
        $html .=        number_format($lancamentos->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 3)->startOfMonth(), \Carbon\Carbon::create($ano, 3)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </th>';
        $html .= '  <th class="text-right">';
        $html .=        number_format($lancamentos->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 4)->startOfMonth(), \Carbon\Carbon::create($ano, 4)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </th>';
        $html .= '  <th class="text-right">';
        $html .=        number_format($lancamentos->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 5)->startOfMonth(), \Carbon\Carbon::create($ano, 5)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </th>';
        $html .= '  <th class="text-right">';
        $html .=        number_format($lancamentos->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 6)->startOfMonth(), \Carbon\Carbon::create($ano, 6)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </th>';
        $html .= '  <th class="text-right">';
        $html .=        number_format($lancamentos->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 7)->startOfMonth(), \Carbon\Carbon::create($ano, 7)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </th>';
        $html .= '  <th class="text-right">';
        $html .=        number_format($lancamentos->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 8)->startOfMonth(), \Carbon\Carbon::create($ano, 8)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </th>';
        $html .= '  <th class="text-right">';
        $html .=        number_format($lancamentos->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 9)->startOfMonth(), \Carbon\Carbon::create($ano, 9)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </th>';
        $html .= '  <th class="text-right">';
        $html .=        number_format($lancamentos->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 10)->startOfMonth(), \Carbon\Carbon::create($ano, 10)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </th>';
        $html .= '  <th class="text-right">';
        $html .=        number_format($lancamentos->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 11)->startOfMonth(), \Carbon\Carbon::create($ano, 11)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </th>';
        $html .= '  <th class="text-right">';
        $html .=        number_format($lancamentos->whereBetween('created_at', [ \Carbon\Carbon::create($ano, 12)->startOfMonth(), \Carbon\Carbon::create($ano, 12)->endOfMonth() ])->sum('vlr_final'), 2, ',', '.');
        $html .= '  </th>';
        $html .= '  <th class="text-right">';
        $html .=        number_format($lancamentos->sum('vlr_final'), 2, ',', '.');
        $html .= '  </th>';
        $html .= '</tr>';

        return $html;
    }
    @endphp
        
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DRE</h3>
                <div class="card-tools">
                    <div class="form-group" style="margin-bottom: 0px">
                        <div class="input-group">
                            <select class="form-control form-control-sm" wire:model.live="ano">
                                <option value=2015> 2015</option>
                                <option value=2016> 2016</option>
                                <option value=2017> 2017</option>
                                <option value=2018> 2018</option>
                                <option value=2019> 2019</option>
                                <option value=2020> 2020</option>
                                <option value=2021> 2021</option>
                                <option value=2022> 2022</option>
                                <option value=2023> 2023</option>
                                <option value=2024> 2024</option>
                                <option value=2025> 2025</option>
                                <option value=2026> 2026</option>
                                <option value=2027> 2027</option>
                            </select>
                            <div class="input-group-append"><a class="btn btn-sm btn-warning" wire:click="listar"><i class="far fa-calendar-alt"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Contal</th>
                            <th>Conta Contabil</th>
                            <th class="text-center">Jan</th>
                            <th class="text-center">Fev</th>
                            <th class="text-center">Mar</th>
                            <th class="text-center">Abr</th>
                            <th class="text-center">Mai</th>
                            <th class="text-center">Jun</th>
                            <th class="text-center">Jul</th>
                            <th class="text-center">Ago</th>
                            <th class="text-center">Set</th>
                            <th class="text-center">Out</th>
                            <th class="text-center">Nov</th>
                            <th class="text-center">Dez</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            echo gerar_demonstrativo_plano_contas($contas_contabeis, $lancamentos, $ano);
                            echo gerar_demonstrativo_null_plano_contas($lancamentos, $ano);
                            echo gerar_demonstrativo_rodape_plano_contas($lancamentos, $ano);
                        @endphp
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
