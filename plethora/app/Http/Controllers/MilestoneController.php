<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MilestoneController extends Controller
{
    public function index()
    {
        return Milestone::all();
    }

    public function show(Milestone $milestone)
    {
        return $milestone;
    }

    public function store(Request $request)
    {
        $milestone = Milestone::create($request->all());

        return response()->json($milestone, 201);
    }

    public function update(Request $request, Milestone $milestone)
    {
        $milestone->update($request->all());

        return response()->json($milestone, 200);
    }

    public function delete(Milestone $milestone)
    {
        $milestone->delete();

        return response()->json(null, 204);
    }

    public function showMilestones(){
        $milestones = DB::select("SELECT personal_information.user_id, personal_information.first_name, personal_information.last_name, genealogies.position, milestones.total_milestone FROM personal_information INNER JOIN genealogies ON personal_information.user_id = genealogies.user_id INNER JOIN milestones ON milestones.agent_id = personal_information.user_id");
        return view("admin.track.milestone.milestones", compact("milestones"));
    }
}