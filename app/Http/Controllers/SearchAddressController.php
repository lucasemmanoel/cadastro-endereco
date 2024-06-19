<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchAddressRequest;
use App\Services\SearchAddressService;
use Illuminate\Http\Response;

class SearchAddressController extends Controller
{
    public function find(SearchAddressRequest $request)
    {
        $zipCode = $request->only("zipcode")["zipcode"];

        $searchAddressService = app(SearchAddressService::class);

        $address = $searchAddressService->search($zipCode);

        return response()->json($address, Response::HTTP_OK);
    }
}