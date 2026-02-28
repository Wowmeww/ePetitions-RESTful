<?php

namespace App\Http\Controllers;

use App\Http\Resources\PetitionCollection;
use App\Http\Resources\PetitionResource;
use App\Models\Petition;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petitions = Petition::all();

        return response()->json(
            new PetitionCollection($petitions),
            Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['string'],
            'category' => ['string'],
            'description' => ['string'],
            'author' => ['string'],
            'signees' => ['string'],
        ]);
        $petition = Petition::create($request->only([
            'title',
            'category',
            'description',
            'author',
            'signees',
        ]));

        return new PetitionResource($petition);
    }

    /**
     * Display the specified resource.
     */
    public function show(Petition $petition)
    {
        return new PetitionResource($petition);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Petition $petition)
    {
        $request->validate([
            'title' => ['string'],
            'category' => ['string'],
            'description' => ['string'],
            'author' => ['string'],
            'signees' => ['string'],
        ]);
        $petition->update($request->only([
            'title',
            'category',
            'description',
            'author',
            'signees',
        ]));

        return new PetitionResource($petition);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Petition $petition)
    {
        $petition->delete();

        return response()->json(null, 204);
    }
}
