<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Http\Requests\PlaceRequest;
use App\Http\Resources\PlaceResource;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Place::query();
        if ($request->filled('name')) {
            $driver = $query->getConnection()->getDriverName();
            $operator = $driver === 'pgsql' ? 'ilike' : 'like';
            $query->where('name', $operator, '%'.$request->name.'%');
        }
        return PlaceResource::collection($query->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlaceRequest $request)
    {
        $place = Place::create($request->validated());
        return (new PlaceResource($place))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        return new PlaceResource($place);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlaceRequest $request, Place $place)
    {
        $place->update($request->validated());
        return new PlaceResource($place);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
