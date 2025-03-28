<?php

namespace App\Livewire\Atendimento\Pessoa\Auxiliar;

class BuscaCEP
{
  public static function get_endereco($cep)
  {
    //formatar o cep removendo caracteres nao numericos
    $cep = preg_replace("/[^0-9]/", "", $cep);
    
    if($cep != null)
    {
      $url = "http://viacep.com.br/ws/$cep/xml/";
      
      $xml = simplexml_load_file($url);
      
      return $xml;
    }
  }
}
