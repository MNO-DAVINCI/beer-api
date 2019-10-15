<?php

namespace App\Http\Controllers;

use App\Beer;
use App\Http\Resources\Beer as BeerResource;
use App\Http\Resources\BeerCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new BeerCollection(Beer::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required'],
            'description' => ['required'],
            'style' => ['required'],
            'volume' => ['required'],
            'abv' => ['required'],
        ]);

        return new BeerResource(
            Beer::create([
                'name' => $request->name,
                'description' => $request->description,
                'style' => $request->style,
                'volume' => $request->volume,
                'abv' => $request->abv,
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beer = Beer::findOrFail($id);

        return new BeerResource($beer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $beer = Beer::findOrFail($id);

        Validator::make($request->all(), [
            'name' => ['required'],
            'description' => ['required'],
            'style' => ['required'],
            'volume' => ['required'],
            'abv' => ['required'],
        ]);

        $beer->name = $request->name;
        $beer->description = $request->description;
        $beer->style = $request->style;
        $beer->volume = $request->volume;
        $beer->abv = $request->abv;

        $beer->save();

        return new BeerResource($beer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $beer = Beer::findOrFail($id);
        $beer->delete();

        return response()->json(['message' => 'Successfully deleted the beer.'], 204);
    }
}
