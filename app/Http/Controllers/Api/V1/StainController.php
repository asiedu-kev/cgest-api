<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;

use App\Http\Requests\Stain\StainStoreRequest;
use App\Http\Requests\Stain\StainUpdateRequest;

use App\Http\Resources\Stain\StainResource;
use App\Http\Resources\Stain\StainCollection;
use App\Models\Stain;

class StainController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new StainCollection(Stain::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StainStoreRequest $request)
    {
        $stain = Stain::create($request->all());
        return new StainResource($stain);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stain  $stain
     * @return \Illuminate\Http\Response
     */
    public function show(Stain $stain)
    {
        return new StainResource($stain);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stain  $stain
     * @return \Illuminate\Http\Response
     */
    public function update(StainUpdateRequest $request, Stain $stain)
    {
        $stain->update($request->all());
        return new StainResource($stain);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stain  $stain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stain $stain)
    {
        $stain->delete();
        return response(null, 204);
    }
}
