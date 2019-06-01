<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\User;
use App\Models\PersonalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenericController extends Controller
{
    public function index()
    {
        $temp_devs = Developer::all();
        $developers = array();
        foreach($temp_devs as $dev){
            $branding = DB::table("developer_brandings")->where("dev_id", $dev->id)
                                                        ->where("archive", 1)
                                                        ->get();

            $projects = DB::table("projects")->where("developer_id", $dev->id)
                                             ->where("archive", 1)
                                             ->get();

            array_push($developers, array(
                "developer" => $dev,
                "branding" => $branding,
                "projects" => $projects
            ));
        }

        return response()->json(compact("developers"), 200);
    }

    public function category(){
        $categories = DB::table('abode_categories')->where("archive", 1)->get();

        return response()->json(compact("categories"), 200);
    }

    public function categoryOptions(Request $request){

        $features = array();
        $options = array();
        $cat_features = DB::table("abode_category_features")->where("category_id", $request->category_id)
                                                            ->where("archive", 1)
                                                            ->get();

        foreach($cat_features as $cat_feature){
            $feature = DB::table("abode_features")->where("id", $cat_feature->feature_id)->get();
            $option = DB::table("abode_options")->where("feat_id", $cat_feature->feature_id)
                                                ->where("category_id", $cat_feature->category_id)->get();
            array_push($options, $option);
            array_push($features, $feature);
        }

        $units = array(
            "feats" => $features,
            "opts" => $options
        );

        return response()->json(compact("units"), 200);
    }

    public function locations(){
        $locations = DB::table("abode_location")->where("archive", 1)->get();
        return response()->json(compact("locations"), 200);
    }

    public function agents(){
        $agents = array();

        $verified_agents = User::where("access_level", "agent")
                        ->where("verified", 1)->get();

        foreach($verified_agents as $agent){
            $infos = PersonalInformation::where("user_id" , $agent->id)->first();
            array_push($agents, array(
            "user_id" => $infos["user_id"],
            "name" => $infos->first_name . " " . $infos->last_name,
            ));
        }

        return response()->json(compact("agents"), 200);
    }

    /* Creating commisions API */

    public function searchAgent(Request $request){
        $agent = DB::table("personal_information")->where("last_name", "LIKE", "%{$request->search_query}%")
                                                  ->orWhere("first_name", "LIKE", "%{$request->search_query}%")
                                                  ->get();

        $agent = DB::select("SELECT personal_information.user_id as id,
                                    personal_information.first_name,
                                    personal_information.last_name,
                                    genealogies.position
                                    FROM personal_information
                                    INNER JOIN genealogies
                                    ON personal_information.user_id = genealogies.user_id
                                    WHERE personal_information.first_name LIKE '%{$request->search_query}%'
                                    OR personal_information.last_name LIKE '%{$request->search_query}%'");

        return response()->json($agent, 200);
    }

    public function searchAbodeModel(Request $request){
        $abodes = DB::select("SELECT abodes.id,
                                     abodes.display_name,
                                     abodes.address,
                                     abodes.total_contract_price,
                                     abodes.net_selling_price,
                                     category.category
                                     FROM abodes
                                     INNER JOIN category
                                     ON abodes.category = category.id
                                     WHERE abodes.dev_id = '{$request->dev_id}'
                                     OR abodes.branding = '{$request->brand_id}'
                                     AND abodes.project = '{$request->proj_id}'");

        return response()->json($abodes, 200);
    }

    public function getCompensationBreakdown(Request $request){
        $compensations = DB::select("SELECT compensations.id,
                                            compensations.agent_id,
                                            CONCAT(compensations.first_name,' ', compensations.last_name) as client_name,
                                            projects.name as project_name,
                                            abodes.display_name as model_name,
                                            CONCAT(personal_information.first_name,' ', personal_information.last_name) as agent_name,
                                            abodes.total_contract_price as contract_price,
                                            abodes.net_selling_price as selling_price,
                                            compensations.commission_rate,
                                            compensations.status
                                            FROM compensations
                                            INNER JOIN abodes ON compensations.abode_id = abodes.id
                                            INNER JOIN projects ON abodes.project = projects.id
                                            INNER JOIN personal_information ON compensations.agent_id = personal_information.user_id
                                            WHERE compensations.id = '{$request->com_id}'");

        $breakdown = DB::select("SELECT CONCAT(personal_information.first_name, ' ', personal_information.last_name) as agent_name,
                                        compensation_details.agent_id,
                                        compensation_details.percent_sharing,
                                        compensation_details.com_receive,
                                        compensation_details.amount_release,
                                        compensation_details.balance
                                        FROM compensation_details
                                        INNER JOIN personal_information
                                        ON compensation_details.agent_id = personal_information.user_id
                                        WHERE compensation_details.com_id = '{$request->com_id}' ORDER BY compensation_details.percent_sharing ASC
        ");

        return response()->json(compact("compensations", "breakdown"), 200);
    }

    public function getCompesationMilestoneBreakdown(Request $request){
        $milestone = DB::select("SELECT CONCAT(compensations.first_name, ' ' , compensations.last_name) as client_name,
                                 projects.name,
                                 abodes.display_name,
                                 abodes.net_selling_price,
                                 CONCAT(personal_information.first_name, ' ', personal_information.last_name) as agent_name,
                                 compensation_details.percent_sharing,
                                 compensation_details.com_receive
                                 FROM compensations
                                 INNER JOIN abodes ON compensations.abode_id = abodes.id
                                 INNER JOIN projects ON abodes.project = projects.id
                                 INNER JOIN personal_information ON compensations.agent_id = personal_information.user_id
                                 INNER JOIN compensation_details ON compensation_details.com_id = compensations.id
                                 WHERE compensation_details.agent_id = '{$request->agent_id}'");

        return response()->json(compact("milestone"), 200);
    }

    public function getReleasing(Request $request){
        $full_release = [];
        $releases = DB::table("releasing")->where("com_id", $request->com_id)->get();

        foreach($releases as $release){
            $details = DB::table("releasing_details")->where("releasing_id", $release->id)->get();
            array_push($full_release, array(
                "release" => $release,
                "details" => $details
            ));
        }

        return response()->json($full_release, 200);
    }

    public function getAbodeDetails(Request $request){
        $abode = DB::table("abodes")->where("id", $request->abode_id)->first();
        return response()->json($abode, 200);
    }

}