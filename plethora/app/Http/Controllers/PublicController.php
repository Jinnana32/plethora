<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genealogy;
use App\Models\Abode;
use App\Models\PersonalInformation;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function showLandingPage(){

        $status = DB::table("settings")->where("setting", "website_down")->first()->value;

        if($status == '1'){
            return view('landing.maintenance');
        }else{
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

            $developers = DB::table("developers")->where("archive", 1)->get();
            $locations = DB::table("abode_location")->where("archive", 1)->get();
            $categories = DB::table("abode_categories")->where("archive", 1)->get();

            return view('landing.index', compact('developers', 'abodes', 'locations', 'categories'));
        }
    }

    public function showCatalog(){
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

        $developers = DB::table("developers")->where("archive", 1)->get();
        $locations = DB::table("abode_location")->where("archive", 1)->get();
        $categories = DB::table("abode_categories")->where("archive", 1)->get();
        return view('landing.catalog', compact('developers', 'abodes', 'locations', 'categories'));
    }

    public function showSearchCatalog(Request $request){
        $abodes = array();
        $abodex = Abode::query();

        if($request->category != 0){
            $abodex->where("category", $request->category);
        }

        if($request->location != 0){
            $abodex->where("location", $request->location);
        }

        if($request->developer != 0){
            $abodex->where("dev_id", $request->developer);
        }

        $temp_abodes = $abodex->get();
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

        $developers = DB::table("developers")->where("archive", 1)->get();
        $locations = DB::table("abode_location")->where("archive", 1)->get();
        $categories = DB::table("abode_categories")->where("archive", 1)->get();
        return view('landing.catalog', compact('developers', 'abodes', 'locations', 'categories'));
    }

    public function showDevelopers(){
        $developers = DB::table("developers")->where("archive", 1)->get();
        return view('landing.developers', compact('developers'));
    }

    public function showFindAgents(){
        return view('landing.agents');
    }

    public function showAbodeDetail($abode_id){
        $abode = Abode::find($abode_id);
        $developer = DB::table('developers')->where("id", $abode->dev_id)->first();
        $images = DB::table("abode_images")->where("abode_id", $abode->id)->get();

        return view('public.pub_abode_detail', compact('abode', 'developer', "images"));
    }

    public function showAbodes(){
        $abodes = Abode::all();
        return view('public.pub_abode', compact('abodes'));
    }

    /* Agent functions */

    public function showAgent(Request $request){

        $info = PersonalInformation::where("referral_link", $request->agent_name)->first();
        $user = User::where("id", $info["user_id"])->first();
        $tags = DB::table("abode_tags")->where("username", $user->username)->get();

        $abodes = array();
        foreach($tags as $tag){
            $abode = Abode::where("id", $tag->abode_id)->first();
            array_push($abodes, $abode);
        }

        $agent = array(
            "name" => $info["first_name"] . " " . $info["last_name"],
            "address" => $info["permanent_address"],
            "contact" => $info["contact_number"],
            "email" => $info["email_address"],
            "referral_link" => $info["referral_link"],
            "image" => $info["image"],
        );

        $abodes = (object) $abodes;
        return view('public.pub_agentlink',compact('agent', 'abodes'));
    }

    public function showAgents(){

        $users_pos = User::where("access_level", "agent")->where("verified", 1)->get();
        $agents = array();

        foreach($users_pos as $users){
            $user_info = PersonalInformation::where("user_id", $users->id)->first();
            $user_gen = Genealogy::where("user_id", $users->id)->first();
            array_push($agents, array(
                "firstname" => $user_info["first_name"],
                "lastname" => $user_info["last_name"],
                "position" => $user_gen["position"],
                "email" => $user_info["email_address"],
                "contact" => $user_info["contact_number"],
                "referral_link" => $user_info["referral_link"],
                "image" => $user_info["image"],
            ));
        }

        return view('public.pub_agents')->with(compact('agents'));
    }

    public function showAgentReferralLink(Request $request){
        $info = PersonalInformation::where("referral_link", $request->agent_name)->first();
        $agent = array(
            "referred_by" => $info["user_id"],
            "name" => $info["first_name"] . " " . $info["last_name"],
            "address" => $info["permanent_address"],
            "contact" => $info["contact_number"],
            "email" => $info["email_address"],
            "referral_link" => $info["referral_link"],
            "image" => $info["image"],
        );

        return view('public.pub_referral_register')->with(compact('agent'));
    }

}
