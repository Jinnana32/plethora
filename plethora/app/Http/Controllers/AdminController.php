<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genealogy;
use App\Models\PersonalInformation;
use App\Models\Abode;
use App\Models\User;
use App\RespHandler;
use App\StatusCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        $user_info = [];
        $types = DB::table("access_types")->get();
        $users = DB::table("users")->where("id", "<>", "4")->where("access_level", "<>", "agent")->get();

        foreach($users as $key => $user){
            $info = DB::table("personal_information")->where("user_id", $user->id)->first();
            $user_info[$key] = array(
                "first_name" => $info->first_name,
                "last_name" => $info->last_name,
                "user_name" => $user->username,
                "type" => $user->type
            );
        }

        return view("admin.dashboard")->with(compact("types", "user_info"));
    }

    public function showLogs(){
        $log_types = DB::table("log_types")->get();

        $log_history = [];
        $log_dates = DB::select("SELECT DISTINCT date_created FROM admin_logs ORDER BY date_created DESC");
        foreach($log_dates as $log){
            $logs = DB::table("admin_logs")->where("date_created", $log->date_created)->orderBy("id", "DESC")->get();
            array_push($log_history, array(
                "date" => $log->date_created,
                "logs" => $logs
            ));
        }
        return view("admin.track.logging.logs")->with(compact('log_history', 'log_types'));
    }

    public function showAgents(){

        $agents = array();

        $verified_agents = User::where("access_level", "agent")
                        ->where("verified", 1)->get();

        foreach($verified_agents as $agent){
            $infos = PersonalInformation::where("user_id" , $agent->id)->first();
            $agent_pos = Genealogy::where("user_id", $agent->id)->first()->position;
            array_push($agents, array(
            "name" => $infos->first_name . " " . $infos->last_name,
            "position" => $agent_pos,
            "email" => $infos->email,
            "address" => $infos->permanent_address,
            "contact" => $infos->contact_number,
            "facebook" => $infos->facebook_account
            ));
        }

        return view("admin.agents.agents")->with(compact('agents'));
    }

    public function showPendingAgents(){
        $agents = array();

        $verified_agents = User::where("access_level", "agent")
                        ->where("verified", 0)->get();

        foreach($verified_agents as $agent){
            $referrer = "None";
            $referral_id = 0;
            $infos = PersonalInformation::where("user_id" , $agent->id)->first();

            if($infos["referred_by"] != 0){
                $referrer_info = PersonalInformation::where("user_id" , $infos->referred_by)->first();
                $referrer = $referrer_info->first_name . " " . $referrer_info->last_name;
                $referral_id = $referrer_info->user_id;
            }

            array_push($agents, array(
            "user_id" => $infos["user_id"],
            "name" => $infos["first_name"] . " " . $infos["last_name"],
            "referral" => $referrer,
            "referral_id" => $referral_id,
            "email" => $infos["email"],
            "address" => $infos["permanent_address"],
            "contact" => $infos["contact_number"],
            "facebook" => $infos["facebook_account"]
            ));
        }

        return view("admin.agents.pending_agents")->with(compact('agents'));
    }

    public function showAbode(){
        $abodes = array();
        $temp_abodes = DB::table("abodes")->where("archive", 1)->get();
        $filters = array();
        $filter_prompt = array();
        foreach($temp_abodes as $abode){
            $features = array();
            $has_brand = 0;
            $branding = null;
            $filter_prompt = array();

            $developer = DB::table("developers")->where("id", $abode->dev_id)
                                                      ->where("archive", 1)
                                                      ->first();

            if($abode->branding != 0){
                $has_brand = 1;
                $branding = DB::table("developer_brandings")->where("id", $abode->branding)
                                                                  ->where("archive", 1)
                                                                  ->first();
            }

            $category = DB::table("abode_categories")->where("id", $abode->category)
                                                     ->where("archive", 1)
                                                     ->first()->category;

            $location = DB::table("abode_location")->where("id", $abode->location)
                                                   ->where("archive", 1)
                                                   ->first()->location;

            $temp_features = DB::table("abode_category_options")->where("abode_id", $abode->id)
                                                                ->where("archive", 1)
                                                                ->get();

            foreach($temp_features as $feature){
                $temp_feature = DB::table("abode_features")->where("id", $feature->feature_id)
                                                           ->where("archive", 1)
                                                           ->first()->display_name;
                array_push($features, array(
                    "feature" => $temp_feature,
                    "value" => $feature->value
                ));
            }

            array_push($abodes, array(
                "current" => $abode,
                "category" => $category,
                "location" => $location,
                "features" => $features,
                "developer" => $developer,
                "has_brand" => $has_brand,
                "branding" => $branding
            ));
        }

        $developers = DB::table("developers")->where("archive", 1)->get();
        $locations = DB::table("abode_location")->where("archive", 1)->get();
        $categories = DB::table("abode_categories")->where("archive", 1)->get();

        return view("admin.abode.abodes")->with(compact('abodes', 'developers', 'locations', 'categories', 'filters', 'filter_prompt'));
    }

    public function filterAbodes(Request $request){
        $abodes = array();
        $abodex = Abode::query();
        $filters = array();
        $filter_prompt = array();

        if($request->category != 0){
            $abodex->where("category", $request->category);
            $category = DB::table("abode_categories")->where("id", $request->category)->first();
            array_push($filters, array(
                "filter" => "Category",
                "id" => $category->id,
                "property" => $category->category,
                "color" => "orange"
            ));
            array_push($filter_prompt, "category");
        }

        if($request->location != 0){
            $abodex->where("location", $request->location);
            $location = DB::table("abode_location")->where("id", $request->location)->first();
            array_push($filters, array(
                "filter" => "Location",
                "id" => $location->id,
                "property" => $location->location,
                "color" => "blue"
            ));
            array_push($filter_prompt, "location");
        }

        if($request->developer != 0){
            $abodex->where("dev_id", $request->developer);
            $developer = DB::table("developers")->where("id", $request->developer)->first();
            array_push($filters, array(
                "filter" => "Developer",
                "id" => $developer->id,
                "property" => $developer->name,
                "color" => "green"
            ));
            array_push($filter_prompt, "developer");
        }

        $temp_abodes = $abodex->get();
        foreach($temp_abodes as $abode){
            $features = array();
            $has_brand = 0;
            $branding = null;

            $developer = DB::table("developers")->where("id", $abode->dev_id)
                                                      ->where("archive", 1)
                                                      ->first();

            if($abode->branding != 0){
                $has_brand = 1;
                $branding = DB::table("developer_brandings")->where("id", $abode->branding)
                                                                  ->where("archive", 1)
                                                                  ->first();
            }

            $category = DB::table("abode_categories")->where("id", $abode->category)
                                                     ->where("archive", 1)
                                                     ->first()->category;

            $location = DB::table("abode_location")->where("id", $abode->location)
                                                   ->where("archive", 1)
                                                   ->first()->location;

            $temp_features = DB::table("abode_category_options")->where("abode_id", $abode->id)
                                                                ->where("archive", 1)
                                                                ->get();

            foreach($temp_features as $feature){
                $temp_feature = DB::table("abode_features")->where("id", $feature->feature_id)
                                                           ->where("archive", 1)
                                                           ->first()->display_name;
                array_push($features, array(
                    "feature" => $temp_feature,
                    "value" => $feature->value
                ));
            }

            array_push($abodes, array(
                "current" => $abode,
                "category" => $category,
                "location" => $location,
                "features" => $features,
                "developer" => $developer,
                "has_brand" => $has_brand,
                "branding" => $branding
            ));
        }

        $developers = DB::table("developers")->where("archive", 1)->get();
        $locations = DB::table("abode_location")->where("archive", 1)->get();
        $categories = DB::table("abode_categories")->where("archive", 1)->get();

        return view("admin.abode.abodes")->with(compact('abodes', 'developers', 'locations', 'categories', 'filters', 'filter_prompt'));
    }

    public function showAssignAgent($user_id){

        $user = User::find($user_id);
        $uplines = array();
        $verified_users = User::where("verified", 1)->get();

        foreach($verified_users as $ver_user) {
            $info = PersonalInformation::where("user_id" , $ver_user->id)->first();
            $pos = Genealogy::where("user_id", $ver_user->id)->first()->position;
            array_push($uplines, array(
                "name" => $info->first_name . " " . $info->last_name,
                "id" => $info->user_id,
                "position" => $pos
            ));
        }

        return view('admin.agents.agent_assign', compact("user", "uplines"));
    }

    /* Learnings */
    public function showTrainings(){
        $trainings = DB::table("trainings")->get();
        return view('admin.learnings.training', compact("trainings"));
    }

    public function showWebinars(){
        $webinars = DB::table("webinars")->get();
        return view('admin.learnings.webinars', compact("webinars"));
    }

    public function addWebinar(Request $request){



        // Add developer
        DB::table("webinars")->insert(
            [
                "title" => $request->title,
                "content_description" => $request->description,
                "youtube_link" => $this->convertToEmbed($request->yt_link)
            ]
        );

        return redirect()->back()->with('success', 'Webinar ' . $request->title . ' was successfully addded');
    }

    public function convertToEmbed($link){
        return str_replace("watch?v=", "embed/", $link);
    }

    /* Settings */
    public function showAccountSettings(){
        $user = Auth::user();
        return view('admin.settings.account', compact('user'));
    }

    public function updateUsername(Request $request){
        $user = Auth::user();
        DB::table("users")->where("id", $user->id)
        ->update([
            "username" => $request->username
          ]);
        return redirect()->back()->with('success', 'Username was successfully updated');
    }

    public function updatePassword(Request $request){
        if($request->password != $request->re_password){
            return redirect()->back()->withErrors(["wrong" => "Password didn't match"]);
        }
        $user = Auth::user();
        DB::table("users")->where("id", $user->id)
        ->update([
            'password' => Hash::make($request->password)
          ]);
        return redirect()->back()->with('success', 'Password was successfully updated');
    }

    public function showWebsiteSettings(){
        $status = DB::table("settings")->where("setting", "website_down")->first()->value;
        return view('admin.settings.website', compact('status'));
    }

    public function updateWebsite(Request $request){
        $status = "";
        if($request->web_status == "on"){
            DB::table("settings")->where("setting", "website_down")
            ->update([
            'value' => "0"
            ]);
            $status = "enabled succesfully";
        }else{
            DB::table("settings")->where("setting", "website_down")
            ->update([
            'value' => "1"
            ]);
            $status = "disabled successfully";
        }
        return redirect()->back()->with('success', 'Website ' . $status);
    }

}
