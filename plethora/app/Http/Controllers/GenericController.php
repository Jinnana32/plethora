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

    public function categoryOptionsFiltered(Request $request){
        $features = array();
        $options = array();

        switch($request->category_id){
            // House and lot
            case 1:
                $cat_features = DB::select(
                    "SELECT * FROM abode_category_features
                    WHERE category_id = '1'
                    AND archive = '1'
                    AND (feature_id = '13'
                    OR feature_id = '4'
                    OR feature_id = '5'
                    OR feature_id = '6')");
            break;

            // Condo
            case 2:
                $cat_features = DB::select(
                    "SELECT * FROM abode_category_features
                    WHERE category_id = '2'
                    AND archive = '1'
                    AND feature_id = '4'");
            break;

            // Lot only
            case 3:
                $cat_features = DB::select(
                    "SELECT * FROM abode_category_features
                    WHERE category_id = '3'
                    AND archive = '1'
                    AND feature_id = '4'");
            break;
        }

        foreach($cat_features as $cat_feature){
            $feature = DB::table("abode_features")->where("id", $cat_feature->feature_id)->get();

            if($request->category_id == "1" && $cat_feature->feature_id == "4"){
                $option = DB::select(
                    "SELECT * FROM abode_options
                    WHERE feat_id = '4'
                    AND category_id = '1'
                    AND
                    (id = '1' OR id = '2' OR id = '27' or id = '28')");
            }else if($request->category_id == "2" && $cat_feature->feature_id == "4"){
                $option = DB::select(
                    "SELECT * FROM abode_options
                    WHERE feat_id = '4'
                    AND category_id = '2'
                    AND
                    (id = '30'
                    OR id = '31'
                    OR id = '32'
                    OR id = '33'
                    OR id = '35'
                    OR id = '36'
                    OR id = '85'
                    OR id = '87'
                    OR id = '88'
                    OR id = '89')");
            }else{
                $option = DB::table("abode_options")->where("feat_id", $cat_feature->feature_id)
                ->where("category_id", $cat_feature->category_id)->get();
            }

            array_push($options, $option);
            array_push($features, $feature);
        }

        $units = array(
            "feats" => $features,
            "opts" => $options
        );

        return response()->json(compact("units"), 200);
    }

    public function categoryOptionsDetails(Request $request){
        $features = array();
        $options = array();
        $cat_features = DB::table("abode_category_features")->where("category_id", $request->category_id)
                                                            ->where("archive", 1)
                                                            ->get();

        foreach($cat_features as $cat_feature){
            $feature = DB::table("abode_features")->where("id", $cat_feature->feature_id)->first();
            $option = DB::table("abode_options")->where("feat_id", $cat_feature->feature_id)
                ->where("category_id", $cat_feature->category_id)->first();

            // If feature does not have a option
            if($feature->has_options == "0"){
                $option = DB::select("SELECT DISTINCT value FROM `abode_category_options` WHERE feature_id = '{$feature->id}'");
            }

            array_push($features, $feature);
            array_push($options, $option);

        }

        $units = array(
            "feats" => $features,
            "opts" => $options
        );

        return response()->json(compact("units"), 200);
    }

    public function abodeOptions(Request $request) {
        $result = array();
        $abode_options = DB::table("abode_category_options")->where("abode_id", $request->abode_id)->get();
        $category_id = DB::table("abodes")->where("id", $request->abode_id)->first()->category;

        foreach($abode_options as $option){
            $feature_options = DB::table("abode_options")->where("feat_id", $option->feature_id)
                                                         ->where("category_id", $category_id)
                                                         ->get();

            $initial_feature = DB::table("abode_features")->where("id", $option->feature_id)->first();
            array_push($result, array(
                "id" => $option->id,
                "feature" => $initial_feature->display_name,
                "initial_value" => $option->value,
                "enabled" => $option->archive,
                "has_options" => $initial_feature->has_options,
                "options" => $feature_options
            ));
        }

        return response()->json($result, 200);
    }

    public function locations(){
        $locations = DB::table("abode_location")->where("archive", 1)->get();
        return response()->json(compact("locations"), 200);
    }

    public function getSubLocation(Request $request){
        $sub_location = DB::select("SELECT DISTINCT `address` FROM abodes WHERE location = '{$request->loc_id}'");
        return response()->json($sub_location, 200);
    }

    public function getSubLocations(Request $request){
        $location_id = $request->loc_id;
        $sublocations = DB::table("abode_sublocations")->where("location_id", $location_id)->get();

        return response()->json($sublocations, 200);
    }

    public function getSubUrb(Request $request){
        $sublocation = $request->sublocation;
        $sub_urb = DB::select("SELECT DISTINCT `street_barangay` FROM abodes WHERE sublocation = '{$sublocation}'");

        return response()->json($sub_urb, 200);
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

    public function getGeneology(Request $request){

        $master_tree = [];

        $initial_gen = DB::table("genealogies")->where("user_id", $request->agent_id)->first();

        // Getting Uplines
        $uplines = $this->getUpperAgents($initial_gen->upline_id);

        // Getting downlines
        $downlines = $this->getLowerAgents($initial_gen->user_id);

        // Merging the 2
        $treeView = array_merge($uplines, $downlines);

        // Add the agent to the tree
        array_push($treeView, $initial_gen);

        for($x = 0; $x < sizeof($treeView); $x++){
            $temp_obj = (object) [
                "id" => $treeView[$x]->id,
                "user_id" => $treeView[$x]->user_id,
                "username" =>  $this->getFullname($treeView[$x]->user_id),
                "upline_id" => $treeView[$x]->upline_id,
                "unit_pos" =>  $treeView[$x]->unit_pos,
                "position" =>  $treeView[$x]->position,
                "upline_name" => $this->getFullname($treeView[$x]->upline_id)
            ];
            array_push($master_tree, $temp_obj);
        }

        return response()->json($master_tree, 200);
    }

    public function getUplineName($upline_id){
       $upline = DB::table("genealogies")->where("user_id", $upline_id)->first();
       if($upline != null){
            return $upline->username;
       }
       return null;
    }

    public function getFullname($user_id){
        if($user_id != null){
            $infos = PersonalInformation::where("user_id" , $user_id)->first();
            return $infos->first_name . " " . $infos->last_name;
        }

        return "";
    }

    public function getUpperAgents($upline_id){

        $hasUpline = true;
        $uplines = [];
        $up_id = $upline_id;

        while($hasUpline){

            $upline = DB::table("genealogies")->where("user_id", $up_id)->first();

            if($upline->upline_id == null){
                $hasUpline = false;
            }

            array_push($uplines, $upline);
            $up_id = $upline->upline_id;

        }

        return $uplines;
    }

    public function getLowerAgents($agent_id){

        $downlines = [];
        $temp_downlines = DB::table("genealogies")->where("upline_id", $agent_id)->get();

        if(sizeof($temp_downlines) > 0){
            foreach($temp_downlines as $downline){
                array_push($downlines, $downline);
            }
        }

        /*while(true){

            if(sizeof($temp_downlines) > 1){

            }else{
               break;
            }
            break;
        }*/

        return $downlines;
    }

}