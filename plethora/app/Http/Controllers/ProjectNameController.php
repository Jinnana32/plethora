<?php

namespace App\Http\Controllers;

use App\Models\ProjectName;
use Illuminate\Http\Request;

class ProjectNameController extends Controller
{
    public function index()
    {
        return ProjectName::all();
    }

    public function show(ProjectName $projectName)
    {
        return $projectName;
    }

    public function store(Request $request)
    {
        $projectName = ProjectName::create($request->all());

        return response()->json($projectName, 201);
    }

    public function update(Request $request, ProjectName $projectName)
    {
        $projectName->update($request->all());
        
        return response()->json($projectName, 200);
    }

    public function delete(ProjectName $projectName)
    {
        $projectName->delete();

        return response()->json(null, 204);
    }
}