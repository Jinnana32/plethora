<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genealogy;
use App\Models\PersonalInformation;
use App\Models\User;
use App\Models\Abode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{

    public function index(){
        $agent = $this->getAuthorizedUser();
        $status = "dashboard";
        return view('agent.dashboard', compact("agent", "status"));
    }

    public function listings(Request $request){
        $agent = $this->getAuthorizedUser();
        $tags = DB::table("abode_tags")->where("username", $agent["username"])->get();
        $abodes = array();
        foreach($tags as $tag){
        $temp_abodes = DB::table("abodes")->where("archive", 1)->where("id", $tag->abode_id)->get();
        foreach($temp_abodes as $abode){
            $features = array();
            $has_brand = 0;
            $branding_image = "";
            $developer_image = DB::table("developers")->where("id", $abode->dev_id)
                                                      ->where("archive", 1)
                                                      ->first()->image;

            if($abode->branding != 0){
                $has_brand = 1;
                $branding_image = DB::table("developer_brandings")->where("id", $abode->branding)
                                                                  ->where("archive", 1)
                                                                  ->first()->image;
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
                "dev_image" => $developer_image,
                "has_brand" => $has_brand,
                "branding_image" => $branding_image
            ));
        }
        }

        return view('agent.listings', compact("agent", "abodes"));
    }

    public function findList(){
        $agent = $this->getAuthorizedUser();
        $abodes = Abode::all();
        $tags = DB::table("abode_tags")->where("username", $agent["username"])->get();
        $status = "";

        foreach($abodes as $key => $value){
            foreach($tags as $tag){
                if($value->abode_id == $tag->abode_id){
                    unset($abodes[$key]);
                }
            }
        }

        return view('agent.find_listing', compact("agent", "abodes",  "status"));
    }

    public function profile(Request $request){
        $agent = $this->getAuthorizedUser();
        $status = "";
        return view('agent.profile', compact("agent", "status"));
    }

    public function learnings(Request $request){
        $agent = $this->getAuthorizedUser();
        $status = "learning";

        return view('agent.learnings', compact("agent", "status"));
    }

    public function businessCard(Request $request){
        $agent = $this->getAuthorizedUser();
        $status = "business";
        return view('agent.businesscard', compact("agent", "status"));
    }

    public function inbox(Request $request){
        $agent = $this->getAuthorizedUser();
        $status = "inbox";
        return view('agent.inbox', compact("agent", "status"));
    }

    public function faqs(Request $request){
        $agent = $this->getAuthorizedUser();
        $status = "faq";
        return view('agent.faqs', compact("agent", "status"));
    }

    public function progression(Request $request){
        $agent = $this->getAuthorizedUser();

        $milestone = DB::table("milestones")->where("agent_id", $agent["id"])->first();
        $earnings = DB::select("SELECT SUM(`amount_received`) as earning FROM releasing_details WHERE agent_id = '{$agent["id"]}'");
        $incentives = DB::select("SELECT incentives.category, incentives.description, incentive_details.create_date FROM incentives INNER JOIN incentive_details ON incentives.id = incentive_details.incentive_id WHERE incentive_details.agent_id = '{$agent["id"]}'");

        return view('agent.progression', compact("agent", "milestone", "earnings", "incentives"));
    }

    // Under progression
    public function genealogy(Request $request){
        $agent = $this->getAuthorizedUser();
        $status = "progress";
        return view('agent.progress.genealogy', compact("agent", "status"));
    }

    public function getAuthorizedUser(){
        $user = Auth::user();
        $info = PersonalInformation::where("user_id", $user->id)->first();
        $agent = array(
            "id" => $info->user_id,
            "username" => $user->username,
            "name" => $info["first_name"] . " " . $info["last_name"],
            "address" => $info["permanent_address"],
            "contact" => $info["contact_number"],
            "email" => $info["email_address"],
            "referral_link" => $info["referral_link"],
            "image" => $info["image"],
        );
        return $agent;
    }

    public function tagAgent(Request $request){
        DB::table("abode_tags")->insert(
            [
                "abode_id" => $request->abode_id,
                "username" => $request->username
            ]
        );
        $user = User::where("username", $request->username)->first();
        $agent_id = $user->id;
        return redirect()->route("listings", [$agent_id]);
    }

    public function untagAgent(Request $request){
        DB::table("abode_tags")
            ->where("username", $request->username)
            ->where("abode_id", $request->abode_id)
            ->delete();
        $user = User::where("username", $request->username)->first();
        $agent_id = $user->id;
        return redirect()->route("listings", [$agent_id]);
    }

    public function login(Request $request){
        $this->middleware('agent_guest');
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials, false)){
            $user = User::where('username', $request->username)->first();

            if($user->access_level == "admin"){
                redirect()->back()->withInput($request->only('username'))->withErrors(["unauthorized" => "You account credentials are incorrect."]);
            }else{
                $agent_id = $user->id;
                return redirect()->route("progression", [$agent_id]);
            }
        }

        return redirect()->back()->withInput($request->only('username'))->withErrors(["unauthorized" => "You account credentials are incorrect."]);
    }


}
