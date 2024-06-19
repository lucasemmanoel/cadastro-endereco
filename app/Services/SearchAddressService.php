<?php

namespace App\Services;

use Gabrielmoura\LaravelCep\CepService;

class SearchAddressService
{
    public function search(string $zipCode): array
    {
        $cepData = app(CepService::class)->find($zipCode, false);
        return [
            "zipcode"=> $cepData->cep,
            "address"=> $cepData->logradouro,
            "complement"=> $cepData->complemento,
            "district"=> $cepData->bairro,
            "city"=> $cepData->localidade,
            "state"=> $cepData->uf,
        ];
    }
}