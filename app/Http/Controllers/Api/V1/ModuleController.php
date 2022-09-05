<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;

use App\Models\Module;
use App\Http\Requests\Module\ModuleStoreRequest;
use App\Http\Requests\Module\ModuleUpdateRequest;

use App\Http\Resources\Module\ModuleResource;
use App\Http\Resources\Module\ModuleCollection;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\QueryBuilder;

class ModuleController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ModuleCollection(Module::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ModuleStoreRequest  $ModuleStoreRequest
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleStoreRequest $request)
    {
        $request->merge(["percentage" => "0"]);
        $module = Module::create($request->all());
        return new ModuleResource($module);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        return new ModuleResource($module);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ModuleStoreRequest  $ModuleStoreRequest
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleStoreRequest $request, Module $module)
    {
        $module->update($request->all());
        return new ModuleResource($module);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module->delete();
        return response(null, 204);
    }

    public function getModuleByProject($id)
    {
        $query = Module::where(['project_id' => $id]);
        $modules = QueryBuilder::for($query)->allowedIncludes(['stains'])->paginate();

        return new ModuleCollection($modules);
    }
}
