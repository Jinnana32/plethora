<?php

namespace App\Http\Controllers;

use App\Models\Incentive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncentiveController extends Controller
{
    public function index()
    {
        return Incentive::all();
    }

    public function show(Incentive $incentive)
    {
        return $incentive;
    }

    public function store(Request $request)
    {
        $incentive = Incentive::create($request->all());

        return response()->json($incentive, 201);
    }

    public function update(Request $request, Incentive $incentive)
    {
        $incentive->update($request->all());

        return response()->json($incentive, 200);
    }

    public function delete(Incentive $incentive)
    {
        $incentive->delete();

        return response()->json(null, 204);
    }

    public function showIncentives(){
        $incentives = DB::table("incentives")->where("archive", 1)->get();
        $recent_incentives = DB::select("SELECT incentive_details.create_date, incentives.description, CONCAT(personal_information.first_name, ' ', personal_information.last_name) as agent_name FROM incentive_details INNER JOIN incentives ON incentive_details.incentive_id = incentives.id INNER JOIN personal_information ON personal_information.user_id = incentive_details.agent_id");
        return view("admin.track.incentive.incentive", compact("incentives", "recent_incentives"));
    }

    public function addIncentive(Request $request){
        // Add developer
        DB::table("incentives")->insert(
            [
                "category" => $request->category,
                "description" => $request->description,
                "milestone_income" => $request->milestone,
                "archive" => 1
            ]
        );

        return redirect()->back()->with('success', 'Incentive ' . $request->description . ' was successfully addded');
    }

    public function updateIncentive(Request $request){
        // Add developer
        DB::table("incentives")->where("id", $request->incentive_id)
                                ->update(
            [
                "category" => $request->category,
                "description" => $request->description
            ]
        );

        return redirect()->back()->with('success', 'Incentive ' . $request->description . ' was successfully updated!');
    }

    public function removeIncentive(Request $request){
        DB::table("incentives")->where("id", $request->incentive_id)
                                            ->update(["archive" => 0]);
        return redirect()->back()->with('success', 'Incentive ' . $request->description . ' was successfully removed!');
    }

}
