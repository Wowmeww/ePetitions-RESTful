<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();

        // return response()->json(new AuthorResource($authors));
        return response()->json(AuthorResource::collection($authors));
    }


    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {


        return response()->json(new AuthorResource($author));
    }
}
