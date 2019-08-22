<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genealogy;
use App\Models\PersonalInformation;
use App\Models\User;
use App\Models\Abode;
use App\Logging;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{

    public function index(){
        $agent = $this->getAuthorizedUser();
        $status = "dashboard";
        return view('agent.dashboard', compact("agent", "status"));
    }

    public function catalogSearch(Request $request) {

        $abodes = array();
        $abodex = Abode::query();

        /*if($request->sub_location != 0){
            if($request->sub_urb != 0){
                $abodex->where("street_barangay", $request->sub_urb);
            }else{
                $abodex->where("sublocation", $request->sub_location);
            }
        }else{
            if($request->location_id != 0){
                $abodex->where("location", $request->location_id);
            }
        }*/

        if($request->sub_urb !== "0"){
            $abodex->where("street_barangay", $request->sub_urb);
        }else{
            if($request->sub_location != "0"){
                $abodex->where("sublocation", $request->sub_location);
            }else{
                if($request->location_id != "0"){
                    $abodex->where("location", $request->location_id);
                }
            }
        }

        if($request->category_id != 0){
            $abodex->where("category", $request->category_id);
        }

        if($request->dev_id != 0){
            $abodex->where("dev_id", $request->dev_id);
        }

        if($request->max_budget > 0 && ($request->min_budget < $request->max_budget)){
            $abodex->whereBetween("monthly_payment", [$request->min_budget, $request->max_budget]);
        }

        $temp_abodes = $abodex->get();
        foreach($temp_abodes as $abode){

            $canContinue = true;
            $pair;

            foreach($request->options as $option){
                $pair = explode(",", $option);
                $abodeOption = DB::table("abode_category_options")
                                    ->where("abode_id", $abode->id)
                                    ->where("feature_id", $pair[0])
                                    ->first();
                if(!empty($abodeOption)){
                    if($abodeOption->value != $pair[1]){
                        $canContinue = false;
                    }
                }else{
                    $canContinue = false;
                }
            }

            if($canContinue){
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
                                                           ->first();
                array_push($features, array(
                    "feature" => optional($temp_feature)->display_name,
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

        $showAbodes = 1;
        $agent = $this->getAuthorizedUser();
        $developers = DB::table("developers")->where("archive", 1)->get();
        $locations = DB::table("abode_location")->where("archive", 1)->get();
        $categories = DB::table("abode_categories")->where("archive", 1)->get();
        return view('agent.listings', compact('agent', 'developers', 'abodes', 'locations', 'categories', 'showAbodes'));
    }

    public function listings(Request $request){
        $agent = $this->getAuthorizedUser();
        $abodes = array();
        $showAbodes = 0;

        $temp_abodes = DB::table("abodes")->where("archive", 1)->get();
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
                                                           ->first();
                array_push($features, array(
                    "feature" => optional($temp_feature)->display_name,
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

        $developers = DB::table("developers")->where("archive", 1)->get();
        $locations = DB::table("abode_location")->where("archive", 1)->get();
        $categories = DB::table("abode_categories")->where("archive", 1)->get();

        return view('agent.listings', compact("agent", "abodes", "developers", "locations", "categories", "showAbodes"));
    }

    public function findList(){
        $agent = $this->getAuthorizedUser();
        $tags = DB::table("abode_tags")->where("agent_id", $agent["id"])->get();
        $abodes = array();

        $temp_abodes = DB::table("abodes")->where("archive", 1)->get();
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
                                                           ->first();
                array_push($features, array(
                    "feature" => optional($temp_feature)->display_name,
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

        foreach($abodes as $key => $abode){
            foreach($tags as $tag){
                if($abode["current"]->id == $tag->abode_id){
                    unset($abodes[$key]);
                }
            }
        }

        $developers = DB::table("developers")->where("archive", 1)->get();
        $locations = DB::table("abode_location")->where("archive", 1)->get();
        $categories = DB::table("abode_categories")->where("archive", 1)->get();

        return view('agent.find_listing', compact("agent", "abodes", "developers", "locations", "categories"));
    }

    public function profile(Request $request){
        $agent = $this->getAuthorizedUser();
        $status = "";
        return view('agent.profile', compact("agent", "status"));
    }

    public function learnings(Request $request){
        $agent = $this->getAuthorizedUser();
        $status = "learning";

        $trainings = DB::table("trainings")->get();
        $webinars = DB::table("webinars")->get();

        return view('agent.learnings', compact("agent", "status", "trainings", "webinars"));
    }

    public function businessCard(Request $request){
        $agent = $this->getAuthorizedUser();
        $status = "business";
        return view('agent.businessCard', compact("agent", "status"));
    }

    public function inbox(Request $request){
        $agent = $this->getAuthorizedUser();
        $status = "inbox";
        $inboxes = DB::table("inboxes")->where("agent_id", $agent["id"])->get();
        return view('agent.inbox', compact("agent", "inboxes"));
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
        $compensations = DB::select("SELECT
        compensations.id,
        developers.name as developer_name,
        projects.name as project_name,
        abodes.display_name as model_unit,
        abodes.total_contract_price,
        abodes.net_selling_price,
        CONCAT(compensations.first_name, ' ' , compensations.last_name) as buyer_name,
        CONCAT(personal_information.first_name, ' ', personal_information.last_name) as seller_name,
        compensations.date_created,
        compensation_details.com_receive,
        compensation_details.balance,
        compensations.status,
        compensations.commission_rate,
        compensation_details.percent_sharing,
        compensation_details.com_receive as total_commission,
        compensation_details.amount_release as commission_release,
        compensation_details.balance,
        IF(compensations.agent_id = '{$agent["id"]}', 'Yes', 'No') as type
        FROM developers
        INNER JOIN abodes ON developers.id = abodes.dev_id
        INNER JOIN projects ON projects.id = abodes.project
        INNER JOIN compensations ON compensations.abode_id = abodes.id
        INNER JOIN compensation_details ON compensation_details.com_id = compensations.id
        INNER JOIN personal_information ON personal_information.user_id = compensations.agent_id
        WHERE compensation_details.agent_id = '{$agent["id"]}'");

        return view('agent.progression', compact("agent", "milestone", "earnings", "incentives", "compensations"));
    }

    public function getCompensations($agent_id){

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
            "prc_license" => $info["prc_license"],
            "facebook_account" => $info["facebook_account"],
            "referral_link" => $info["referral_link"],
            "image" => $info["image"],
            "position" => DB::table("genealogies")->where("user_id", $info->user_id)->first()->position
        );
        return $agent;
    }

    public function tagAgent(Request $request){
        $agent = $this->getAuthorizedUser();
        DB::table("abode_tags")->insert(
            [
                "abode_id" => $request->abode_id,
                "agent_id" => $agent["id"]
            ]
        );
        $display_name = DB::table("abodes")->where("id", $request->abode_id)->first()->display_name;

         // Logger
         $info = PersonalInformation::where("user_id", $agent["id"])->first();
         $logMessage = $info->first_name . " " . $info->last_name .
         " tag's an abode/listing of  {$display_name} at " . Date("M-d-Y h:i:s");
         Logging::saveInquiry($logMessage);

        return redirect()->route("listings", [$agent["id"]]);
    }

    public function untagAgent(Request $request){
        $agent = $this->getAuthorizedUser();
        DB::table("abode_tags")
            ->where("agent_id", $agent["id"])
            ->where("abode_id", $request->abode_id)
            ->delete();
        return redirect()->route("listings", [$agent["id"]]);
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

                // Logger
                $info = PersonalInformation::where("user_id", $agent_id)->first();
                $logMessage = $info->first_name . " " . $info->last_name .
                " log's into the system at " . Date("M-d-Y h:i:s");
                Logging::saveLogin($logMessage);

                return redirect()->route("listings", [$agent_id]);
            }
        }

        return redirect()->back()->withInput($request->only('username'))->withErrors(["unauthorized" => "You account credentials are incorrect."]);
    }

    public function editInfo(Request $request){
        // WARNING. dont try this at work
        if(empty($request->password)){
            // Update username and password
            DB::table("users")->where("id", $request->agent_id)->update([
                "username" => $request->username
            ]);
        }else{
             // Update username and password
            DB::table("users")->where("id", $request->agent_id)->update([
                "username" => $request->username,
                "password" => Hash::make($request->password)
            ]);
        }

        // Update infos
        DB::table("personal_information")->where("user_id", $request->agent_id)->update([
            "permanent_address" => $request->address,
            "email_address" => $request->email,
            "contact_number" => $request->contact,
            "referral_link" => $request->referral_link
        ]);

        // Logger
        $info = PersonalInformation::where("user_id", $request->agent_id)->first();
        $logMessage = $info->first_name . " " . $info->last_name .
        " updates account at " . Date("M-d-Y h:i:s");
        Logging::saveLogin($logMessage);

        return redirect()->back()->with('success', 'You have updated your account');
    }

    public function updateAgentImage(Request $request){

        // If request has file update with file
        if($request->hasFile("agent_image")){
            // Get file details
            $fileExtension = $request->file('agent_image')->getClientOriginalExtension();
            $filenameWithExt = $request->file('agent_image')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileNameStore = $fileName . "_" . time() . "." . $fileExtension;

            // Upload image
            if($request->file('agent_image')->storeAs('public/agents', $fileNameStore)){

                // Add developer
                DB::table("personal_information")->where("user_id", $request->user_id)
                                       ->update(
                    [
                        "image" => $fileNameStore
                    ]
                );

                return redirect()->back()->with('success', 'Developer ' . $request->dev_name . ' was successfully updated!');
            }else{
                return redirect()->back()->withErrors(["error_upload" => "Error moving file to uploads"]);
            }
        }

    }

}
