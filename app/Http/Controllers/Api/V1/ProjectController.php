<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;

use App\Http\Requests\Project\ProjectStoreRequest;
use App\Http\Requests\Project\ProjectUpdateRequest;

use App\Http\Resources\Project\ProjectResource;
use App\Http\Resources\Project\ProjectCollection;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use App\Models\MemberProjectRole;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;

class ProjectController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = [];
        // $main_query = Project::where(['owner_id' => auth()->user()->id]);
        $query = MemberProjectRole::where(["user_id" => auth()->user()->id])->get();
        foreach ($query as $response) {
            $projects[] = new ProjectResource($response->project);
        }
        //         $resp =  QueryBuilder::for($main_query)->allowedIncludes(["user"])->paginate();
        //        dd($resp);

        return new ProjectCollection($projects);
        //        $projects = QueryBuilder::for($query)->allowedIncludes(['user', "project"])->paginate();
        //        return new ProjectCollection($projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectStoreRequest $request)
    {
        $request->merge(['owner_id' => auth()->user()->id]);
        $project = Project::create($request->all());
        MemberProjectRole::create([
            "user_id" => auth()->user()->id,
            "project_id" => $project->id,
            "role" => "Client"
        ]);
        return new ProjectResource($project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $project->update($request->all());
        return new ProjectResource($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return response(null, 204);
    }

    public function add_member_to_project(int $id, Request $request)
    {
        $member_project_role = MemberProjectRole::where(["user_id" => $request->user_id, "project_id" => $id])->first();

        if ($member_project_role == null) {
            MemberProjectRole::create([
                "user_id" => $request->user_id,
                "project_id" => $id,
                "role" => "Collaborateur"
            ]);
        }
        $project = Project::find($id);
        return new ProjectResource($project);
    }

    public function get_project_members(int $project_id)
    {
        $members = [];
        $query = MemberProjectRole::where(["project_id" => $project_id])->get();
        foreach ($query as $response) {
            if ($response->user->id != auth()->user()->id) {
                $members[] = new UserResource($response->user);
            }
        }
        return new UserCollection($members);
    }
}
