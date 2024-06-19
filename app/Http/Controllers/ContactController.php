<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Repositories\ContactRepository;
use App\Services\GoogleMapsService;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    public function create(ContactRequest $request)
    {
        $contactRepository = app(ContactRepository::class);

        $googleMpasService = app(GoogleMapsService::class);

        $coordenates = $googleMpasService->getCoordenates($request->input('address'));

        $data = $request->all();

        $data = array_merge($data, $coordenates);

        return response()->json($contactRepository->create($data), Response::HTTP_OK);
    }
}
