<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMusicRequest;
use App\Http\Requests\UpdateMusicRequest;
use App\Models\Music;
use Illuminate\Http\JsonResponse;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Music::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMusicRequest $request) : JsonResponse
    {
        $validated = $request->validate([
            'url' => 'required|url',
        ]);



        // Retornando a música criada
        return response()->json($request["url"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Music $music)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMusicRequest $request, Music $music)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Music $music)
    {
        //
    }
}
