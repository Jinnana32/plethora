<?php

namespace App\Http\Controllers;

use App\Models\Genealogy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenealogyController extends Controller
{
    public function index()
    {
        return Genealogy::all();
    }

    public function show(Genealogy $genealogy)
    {
        return $genealogy;
    }

    public function store(Request $request)
    {
        $genealogy = Genealogy::create($request->all());

        return response()->json($genealogy, 201);
    }

    public function update(Request $request, Genealogy $genealogy)
    {
        $genealogy->update($request->all());

        return response()->json($genealogy, 200);
    }

    public function delete(Genealogy $genealogy)
    {
        $genealogy->delete();

        return response()->json(null, 204);
    }

    public function getAgentPosition($pos){

        $genealogy = array();


        switch($pos){
            case "broker":
                $positions = DB::table("genealogies")->where("position", "company")->get();
            break;
            case "division":
                $positions = DB::table("genealogies")->where("position", "broker")->get();
            break;
            case "unit":
                $positions = DB::table("genealogies")->where("position", "broker")
                                                     ->orWhere("position", "division")->get();
            break;
        }

        foreach($positions as $position){
            $user = DB::table("personal_information")->where("user_id", $position->user_id)->first();
            array_push($genealogy, array(
                "position" => $position,
                "user_info" => $user
            ));
        }

        return response()->json(compact('genealogy'), 200);
    }
}