<?php

namespace App\Http\Controllers;

use App\StatusCode;
use App\Logging;
use Illuminate\Support\Facades\DB;
use App\Models\Inbox;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function index()
    {
        return Inbox::all();
    }

    public function show(Inbox $inbox)
    {
        return $inbox;
    }

    public function store(Request $request)
    {
        $inbox = Inbox::create($request->all());

        return response()->json($inbox, 201);
    }

    public function update(Request $request, Inbox $inbox)
    {
        $inbox->update($request->all());

        return response()->json($inbox, 200);
    }

    public function delete(Inbox $inbox)
    {
        $inbox->delete();

        return response()->json(null, 204);
    }

    public function addInboxMessage(Request $request){
        $agent_names = DB::table("abode_tags", $request->abode_id)->get();

        foreach($agent_names as $agent_name){
            $agents = DB::table("users")->where("username", $agent_name->username)->get();
            foreach($agents as $agent){
                $agent_info = DB::table("personal_information")->where("user_id", $agent->id)->first();
                DB::table("inboxes")->insert([
                    "agent_id" => $agent->id,
                    "client_name" => $request->name,
                    "mobile_number" => $request->mobile_number,
                    "email_address" => $request->email_address,
                    "message" => $request->message,
                    "date_created" => Date("M-d-Y h:i:s")
                ]);
                $logMessage = $agent_info->first_name . " " . $agent_info->last_name .
                " received an inquiry from " . $request->name .
                " with mobile number of " . $request->mobile_number .
                " and email of " . $request->email_address .
                " at " . Date("M-d-Y h:i:s");
                Logging::saveInquiry($logMessage);
            }
        }

        return redirect()->back()->withSuccess('Your inquiry was sent.');
    }

    public function addInquireMessage(Request $request){
        $users = DB::table("users")->where("access_level", "admin")->where("type", 1)->get();
        foreach($users as $user){
            DB::table("inboxes")->insert([
                "agent_id" => $user->id,
                "client_name" => $request->name,
                "mobile_number" => $request->contact,
                "email_address" => $request->email,
                "address" => $request->address,
                "message" => $request->message,
                "date_created" => Date("M-d-Y h:i:s")
            ]);
        }

        return redirect()->back()->with('inquire', 'Your inquiry was sent.');
    }

    public function timeIn(Request $request){

        $collect = DB::table("ubp_time")->where("status", 1)
        ->where("user_id", $request->user_id)
        ->first();

        if($collect !== null){
            return response()->json(array("message" => "You're already timed in"), 400);
        }

        // Insert current time
        DB::table("ubp_time")->insert([
            "user_id" => $request->user_id,
            "time_in" => Date("M-d-Y h:i:s a"),
            "status" => "1"
        ]);

        // Get current ID
        $id = DB::getPdo()->lastInsertId();

        // Return success
        return RespHandler::created($id);

    }

    public function timeOut(Request $request){

        $collect = DB::table("ubp_time")->where("status", 1)
                                        ->where("user_id", $request->user_id)
                                        ->first();

        if($collect !== null){
            DB::table("ubp_time")
                            ->where("id", $collect->id)
                            ->update([
                                "time_out" => Date("M-d-Y h:i:s a"),
                                "status" => 0
                            ]);
        }else{
            return response()->json(array("message" => "Please time in first"), 400);
        }

         return RespHandler::updated();
    }

    public function hasTimeIn(Request $request){

        $has_in = array(
            "has_in" => false
        );

        $collect = DB::table("ubp_time")->where("time_in", "Like" , "%". Date("M-d-Y") ."%")
                                        ->where("user_id", $request->user_id)
                                        ->get();

        if(sizeof($collect) > 0){
            $has_in = array(
                "has_in" => true
            );
        }

        return response()->json($has_in, 200);
    }

    public function login(){
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
            return response()->json($user->id, 200);
        }

        return response()->json(["message" => "You account credentials are incorrect."], 400);
    }

}