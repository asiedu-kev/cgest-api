<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Estimate;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Estimate\EstimateUpdateRequest;
use App\Http\Requests\Estimate\EstimateStoreRequest;

use App\Http\Resources\Estimate\EstimateResource;
use App\Http\Resources\Estimate\EstimateCollection;


class EstimateController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new EstimateCollection(Estimate::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstimateStoreRequest $request, Estimate $estimate)
    {
        $estimate = Estimate::create($request->all());

        return new EstimateResource($estimate);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function show(Estimate $estimate)
    {
        return new EstimateResource($estimate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function update(EstimateUpdateRequest $request, Estimate $estimate)
    {
        $estimate->update($request->all());
        return new EstimateResource($estimate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estimate $estimate)
    {
        $estimate->delete();
        return response(null, 204);
    }
}
