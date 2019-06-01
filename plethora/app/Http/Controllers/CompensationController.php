<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\StatusCode;
use App\RespHandler;
use Illuminate\Support\Facades\DB;
use App\Models\Compensation;
use App\Models\Genealogy;

class CompensationController extends Controller
{

    public function store(Request $request) {

        $com_rate = $request->commission_rate;
        $abode_id = $request->abode_id;
        $amount_release = $request->amount_release;
        $tax = $request->with_holding_tax;
        $nsp = $request->current_net_selling;

        // Store request
        $com_id = DB::table("compensations")->insertGetId([
            "abode_id" => $abode_id,
            "agent_id" => $request->agent_id,
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "commission_rate" => $com_rate,
            "tax" => $tax,
            "amount_release" => $amount_release,
            "status" => $request->status,
            "date_created" => Date("M-d-Y h:i:s")
        ]);

        // Sharing
        $ps_holder = Genealogy::where("user_id", "=", $request->agent_id)->first()->username;;
        $ps_position = Genealogy::where("username", "=", $ps_holder)->first()->position;

        // Perform Profit Sharing
        $sharing = $this->profit_share($ps_holder, $ps_position);

        foreach($sharing as $share){
            $ps = $share["share"];
            $com_receive = $this->computeComReceivable($com_rate, $ps, $nsp, $tax);

            // Distribute sharing
            $shared_amount = $this->distributeSharing($ps, $amount_release);
            $balance = $com_receive - $shared_amount;

            // Intercept and update user current milestone
            if($share["user_id"] == $request->agent_id){
                $check = DB::table("milestones")->where("agent_id", $request->agent_id)->first();
                if($check === null){
                    DB::table("milestones")->insert([
                        "agent_id" => $request->agent_id,
                        "total_milestone" => $nsp
                    ]);
                }else{
                    DB::select("UPDATE milestones SET total_milestone = total_milestone + {$com_receive} WHERE agent_id = '{$request->agent_id}'");

                    // Check if available for incentives
                    $currentMilestone = DB::table("milestones")->where("agent_id", $request->agent_id)->first()->total_milestone;
                    $incentives = DB::table("incentives")->where("archive", 1)->get();

                    foreach($incentives as $incentive){
                        $milestoneThreshold = $incentive->milestone_income;
                        if($currentMilestone > $milestoneThreshold){
                            DB::table("incentive_details")->insert([
                                "incentive_id" => $incentive->id,
                                "agent_id" => $request->agent_id,
                                "create_date" => Date("M/d/Y")
                            ]);
                        }
                    }

                }

            }

            DB::table("compensation_details")->insert([
                "com_id" => $com_id,
                "agent_id" => $share["user_id"],
                "percent_sharing" => $ps,
                "com_receive" => $com_receive,
                "amount_release" => $shared_amount,
                "balance" => $balance
            ]);
        }

        return RespHandler::created($com_id);
    }

    public function distributeSharing($ps, $amount){
        return $amount * $this->toPercentage($ps);
    }

    public function computeComReceivable($rate, $ps, $nsp, $tax){
        // Get the commission
        $commission = $this->toPercentage($rate) * $nsp;

        // Get the tax to reduce
        $taxDeduction = $commission * $this->toPercentage($tax);

        // Reduce the tax to commission
        $finalCommission = $commission - $taxDeduction;

        // Compute the share of user
        $cr = $finalCommission * $this->toPercentage($ps);
        return round($cr, 2);
    }

    public function toPercentage($num){
        return $num/100;
    }

    public function save_compensation($record){
        Compensation::create($record);
    }

    public function getUpline($username){
      $upline_id = Genealogy::where("username", "=", $username)->first()->upline_id;
      return Genealogy::where("user_id", "=", $upline_id)->first();
    }

    public function getUplineID($username){
        return Genealogy::where("username", "=", $username)->first()->upline_id;
    }

    public function getUplineById($upline_id){
        return Genealogy::where("user_id", "=", $upline_id)->first();
    }

    public function getId($username){
        return Genealogy::where("username", "=", $username)->first()->user_id;
    }

    public function getUnitsUnderUpline($username){
        $upline_id = Genealogy::where("username", "=", $username)->first()->upline_id;
        return DB::select("SELECT COUNT(id) as units FROM genealogies WHERE upline_id = '{$upline_id}'")[0]->units;
    }

    public function getNextUnit($username){
       $next_units = [];
       $counter = 0;
       $unit_pos = Genealogy::where("username", "=", $username)->first()->unit_pos;
       $upline = Genealogy::where("username", "=", $username)->first()->upline_id;

        if($unit_pos == 2){
            $counter = 1;
        }else if($unit_pos >= 3){
            $counter = 2;
        }

       for($x = 1; $x <= $counter; $x++){
            $next = $unit_pos - $x;
            $unit = Genealogy::where("upline_id", $upline)
                             ->where("unit_pos", $next)
                             ->first();

            array_push($next_units, $unit);
       }

       return $next_units;
    }

    public function getPos($username){
        return Genealogy::where("username", "=", $username)->first()->unit_pos;
    }

    public function profit_share($ps_holder, $position){
        $NORMAL = "NORMAL";
        $DC = "DC";
        $BC = "BC";
        $share = array();
        switch($position){
            case "company":
            $share = array(
                array(
                    "user_id" => $this->getId($ps_holder),
                    "share" => 100
                )
            );
            break;
            case "broker":
                $share = array(
                    array(
                        "user_id" => $this->getId($ps_holder),
                        "share" => 90
                    ),
                    array(
                        "user_id" => $this->getId($this->getUpline($ps_holder)->username),
                        "share" => 10
                    )
                );
            break;
            case "division":

                $upline = $this->getUpline($ps_holder);

                if($upline->position == "company"){
                    // It means division is under the company
                    $share = array(
                        array(
                            "user_id" => $this->getId($ps_holder),
                            "share" => 80
                        ),
                        array(
                            "user_id" => $this->getId($upline->username) ,
                            "share" => 20
                        )
                    );
                }else{
                    $broker = $upline->username;
                    $company = $this->getUpline($broker)->username;
                    $share = array(
                        array(
                            "user_id" => $this->getId($ps_holder),
                            "share" => 80
                        ),
                        array(
                            "user_id" => $this->getId($broker),
                            "share" => 10
                        ),
                        array(
                            "user_id" => $this->getId($company),
                            "share" => 10
                        )
                    );
                }


            break;
            case "unit":


                // Determine the sharing of units
                // Get Position of Unit Manager
                $currentID = $this->getId($ps_holder);
                $currentShare = $this->unitShare($ps_holder);

                // Push the Main Unit
                array_push($share, array(
                    "user_id" => $currentID,
                    "share" => $currentShare
                ));

                $unit_pos = $this->getPos($ps_holder);
                $nextUnits = $this->getUnitsUnderUpline($ps_holder);
                // Add Next Units if current pos is more than 2 and upline has many units under it
                if($unit_pos >= 2 && $nextUnits >= 2){
                    $units = $this->getNextUnit($ps_holder);
                    foreach($units as $unit){

                        $unit_share = array(
                            "user_id" => $unit["user_id"],
                            "share" => 12.5
                        );

                        array_push($share, $unit_share);
                    }
                }

                // Push the shares of the uplines
                $sharingPattern = $this->determinePatternSharing($ps_holder);
                foreach($sharingPattern as $uplineShare){
                    array_push($share, $uplineShare);
                }

            break;
        };

        return $share;
    }

    public function determinePatternSharing($username){
        $pattern = "";
        $uplines = array();
        $sharing = array();

        // Get first initial upline
        $upline_id = $this->getUplineID($username);
        $upline = $this->getUplineById($upline_id);

        // Run until position is null
        while(true){
            array_push($uplines, $upline);
            $position = $upline->position;

            if($position == "division"){
                $pattern .= "d";

            }

            if($position == "broker"){
                $pattern .= "b";
            }

            if($position == "company"){
                $pattern .= "c";
            }

            if($upline->upline_id == null){
                break;
            }

            $upline = $this->getUplineById($upline->upline_id);
        }

        if($pattern == "bc" || $pattern == "dc"){
            array_push($sharing, array(
                "user_id" => $uplines[0]->user_id,
                "share" => 20
            ));
            array_push($sharing, array(
                "user_id" => $uplines[1]->user_id,
                "share" => 10
            ));
        }else{
            array_push($sharing, array(
                "user_id" => $uplines[0]->user_id,
                "share" => 10
            ));
            array_push($sharing, array(
                "user_id" => $uplines[1]->user_id,
                "share" => 10
            ));
            array_push($sharing, array(
                "user_id" => $uplines[2]->user_id,
                "share" => 10
            ));
        }

        return $sharing;
    }

    public function unitShare($username){
        $unit_pos = $this->getPos($username);

        // Get Holder Share
        if($unit_pos == 1){
            $holder_share = 70;
        }else if($unit_pos == 2){
            $holder_share = 57.5;
        }else if($unit_pos > 2){
            $holder_share = 45;
        }

        return $holder_share;
    }

    public function showCompensation(){
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
                                            INNER JOIN personal_information ON compensations.agent_id = personal_information.user_id");

        return view("admin.track.compensation.compensation", compact("compensations"));
    }

    public function showCreateCompensation(){
        return view("admin.track.compensation.compensation_create");
    }

    public function addRelease(Request $request){
        $compensation = DB::table("compensations")->where("id", $request->com_id)->first();
        $comp_details = DB::table("compensation_details")->where("com_id", $request->com_id)->get();

        // Save release details
        $releasing_id = DB::table("releasing")->insertGetId([
            "com_id" => $request->com_id,
            "amount_released" => $request->amount_release,
            "date_create" => Date("M d, Y h:i:s")
        ]);

        foreach($comp_details as $details){
            $user = DB::table("personal_information")->where("user_id", $details->agent_id)->first();
            // Distribute sharing
            $shared_amount = $this->distributeSharing($details->percent_sharing, $request->amount_release);
            $balance = $details->balance - $shared_amount;

            // Update the current balance
            DB::table("compensation_details")->where("id", $details->id)->update([
                "balance" => $balance
            ]);

            DB::table("releasing_details")->insert([
                "releasing_id" => $releasing_id,
                "agent_id" => $compensation->agent_id,
                "agent_name" => $user->first_name . ' ' . $user->last_name,
                "amount_received" => $shared_amount
            ]);
        }

        return redirect()->back()->with('success', 'Releasing amount was added!');
    }

    public function showReleasing(Request $request){
        $releases = [];
        $com_id = $request->com_id;
        $temp_releases = DB::table("releasing")->where("com_id", $request->com_id)->get();
        $counter = 0;
        foreach($temp_releases as $release){
            $details = DB::table("releasing_details")->where("releasing_id", $release->id)->get();
            $releases[$counter] = array(
                "release" => $release,
                "details" => $details
            );
            $counter++;
        }

        return view("admin.track.compensation.releasing")->with(compact("releases", "com_id"));
    }

}
