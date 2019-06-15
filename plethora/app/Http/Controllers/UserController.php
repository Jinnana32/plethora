<?php

namespace App\Http\Controllers;

use JWTAuth;
use Validator;
use App\Models\User;
use App\Models\PersonalInformation;
use App\Models\Genealogy;
use App\RespHandler;
use App\StatusCode;
use App\Logging;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    private $LOGIN_AS_ADMIN = "LOGIN_AS_ADMIN";
    private $LOGIN_AS_AGENT = "LOGIN_AS_AGENT";

    public function __construct(){
        $this->middleware('guest', ['except' => 'logouts']);
    }

    public function time(){
        $time_data = array();
        $timekeeping = DB::table("HRX_TimeKeepingData")->get();
        foreach($timekeeping as $time){
            $breaks = DB::table("HRX_BreakTimeData")->where("timeKeepingDataId", $time->id)->first(["breakStartTime","breakEndTime"]);
            array_push($time_data, array(
                "timeIn" => $time->timeIn,
                "timeOut" => $time->timeOut,
                "break" => $breaks
            ));
        }

        return response()->json($time_data, StatusCode::SUCCESS());
    }

    public function showLogin(){
        if(Auth::check()){

        }
        return view("auth.login");
    }

    public function login(Request $request){

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials, $request->remember_me)){
            $user = User::where('username', $request->username)->first();

            if($user->access_level == "admin"){
                switch($user->type){
                    case "1":
                        return redirect(route('phradmin.dashboard'));
                    break;
                    case "2":
                        return redirect(route('phradmin.compensation'));
                    break;
                    case "3":
                        return redirect(route('phradmin.abodes'));
                    break;
                    case "4":
                        return redirect(route('phradmin.agents'));
                    break;
                }
            }else{

                $info = PersonalInformation::where("user_id", $user->id)->first();

                $agent = array(
                    "info" => $info
                );

                return redirect(route('agent'))->with(compact("agent"));
            }
        }

        return redirect()->back()->withInput($request->only('username'))->withErrors(["unauthorized" => "You account credentials are incorrect."]);
    }

    public function logouts(){
        Auth::logout();
        return redirect(route('phradmin.login'));
    }

    public function register(Request $request){

        // Check if username already exisit
        if(User::where('username', '=', $request->username)->first()){
            return response()->json(['error' => 'Agent with the same username already exists '], StatusCode::BAD_REQUEST());
        }

        // Compile user values
        $UserInfo = [
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'security_id' => 2,
            'access_level' => $request->access_level,
            'verified' => $request->verified,
        ];

        // Create user
        $user = User::create($UserInfo);
        $ref_id = 0;

        if($request->company_position != ""){
            // if unit process first the unit position
            if($request->company_position == "unit"){
                $lastest_pos = Genealogy::where("upline_id", $request->upline_id)->count() + 1;
            }

            $unit_pos = ($request->company_position == "unit" ? $lastest_pos: null);

            $genealogy = [
                "user_id" => $user->id,
                "username" => $user->username,
                "upline_id" => $request->upline_id,
                "unit_pos" => $unit_pos,
                "position" => $request->company_position,
            ];

            // Compile Genealogy information
            Genealogy::create($genealogy);

        }else{
            // if there is a referral
            if($request->ref_link != ""){

            }
        }

        // Compile personal information
        $personal_info = [
            'user_id' => $user->id,
            'referred_by' => $request->referred_by,
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'middle_initial' => $request->middle_initial,
            'name_suffix' => $request->name_suffix,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'citizenship' => $request->citizenship,
            'religion' => $request->religion,
            'civil_status' => $request->civil_status,
            'permanent_address' => $request->permanent_address,
            'facebook_account' => $request->facebook_account,
            'email_address' => $request->email_address,
            'contact_number' => $request->contact_number,
            'referral_link' => $request->username,
            'image' => $request->image,
        ];

        // Create personal information
        PersonalInformation::create($personal_info);


        // Return success response
        return RespHandler::created($user->id);
    }

    public function quickRegister(Request $request){

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        // Check if username already exisit
        if(User::where('username', '=', $request->username)->first()){
            return redirect()->back()->withInput($request->input())->withErrors(["alreadyexist" => "User name already exist"]);
        }

        // Compile user values
        $UserInfo = [
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'security_id' => 2,
            'access_level' => 'agent',
            'verified' => 0,
        ];

        // Create user
        $user = User::create($UserInfo);

        // Compile personal information
        $personal_info = [
            'user_id' => $user->id,
            'last_name' => $request->lastname,
            'first_name' => $request->firstname,
        ];

        // Create personal information
        PersonalInformation::create($personal_info);

        if($request->referral_link != ""){

            if(!$upline = PersonalInformation::where("referral_link", $request->referral_link)->first()){
                return redirect()->back()->withInput()->withErrors(["referral_error" => "Referral link not valid"]);
            }

            $upline_pos = Genealogy::where("user_id", $upline->user_id)->first();

            if($upline_pos->position == "unit"){
                $user_upline = $upline_pos->upline_id;
            }else{
                $user_upline = $upline_pos->user_id;
            }

            //$unit_pos = Genealogy::where("upline_id", $user_upline)->orderBy("unit_pos", 'desc')->first()->unit_pos + 1;
        }else{
            $user_upline = 1;
        }

        $genealogy = [
            "user_id" => $user->id,
            "username" => $user->username,
            "upline_id" => $user_upline,
            "unit_pos" => null,
            "position" => 'unit',
        ];

        // Compile Genealogy information
        Genealogy::create($genealogy);

        return redirect(route('login'))->withSuccess('Account registered successfully.');
    }

    public function approveOrDecline(Request $request){
        $positions = ["company", "broker", "division", "unit"];

         // Get Upline and Agent object
        $referrer = Genealogy::where("user_id", $request->ref_id)->first();
        $user = User::find($request->user_id);

        // Check if referrer is unit then assign appropriate upline id
        $upline_id = ($referrer->position == "unit" ? $referrer->upline_id : $referrer->user_id);

        // assign position to user
        $user_pos_index = array_search($referrer->position,$positions) + 1;
        $user_pos = ($user_pos_index == 4 ? "unit" : $positions[$user_pos_index]);

        // if unit process the unit position
        if($user_pos == "unit"){
            $lastest_pos = Genealogy::where("upline_id", $upline_id)->orderBy("unit_pos", 'desc')->first()->unit_pos;
        }

        $unit_pos = ($user_pos == "unit" ? $lastest_pos + 1 : 0);

        // Update Genealogy
        $genealogy = [
            "user_id" => $user["id"],
            "username" => $user->username,
            "upline_id" => $upline_id,
            "unit_pos" => $unit_pos,
            "position" => $user_pos,
        ];

        Genealogy::create($genealogy);

        // Update verification
        $user["verified"] = $request->status;
        $user->save();

        // Send email
        if($request->status == 2){
            // send email of decline
        }else{
            // send email of verified
        }

        return RespHandler::updated();
    }

}
