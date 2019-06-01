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
        $status = "listing";
        $tags = DB::table("abode_tags")->where("username", $agent["username"])->get();
        $abodes = array();
        foreach($tags as $tag){
            $abode = Abode::where("id", $tag->abode_id)->first();
            array_push($abodes, $abode);
        }

        return view('agent.listings', compact("agent", "status", "abodes"));
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
        $status = "progress";
        return view('agent.progression', compact("agent", "status"));
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
                return redirect()->route("listings", [$agent_id]);
            }
        }

        return redirect()->back()->withInput($request->only('username'))->withErrors(["unauthorized" => "You account credentials are incorrect."]);
    }


}
