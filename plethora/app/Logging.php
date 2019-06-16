<?php

namespace App;
use Illuminate\Support\Facades\DB;

class Logging {

    private static $LOGGIN_IN = 1; // Goods
    private static $TAGGING_IN_LIST = 2; //
    private static $CLIENT_INQUIRY = 3; // Goods
    private static $EDIT_ACCOUNT = 4; // Goods
    private static $GENERATE_BUSINES_CARD = 5;

    public static function saveInquiry($message){
       DB::table("admin_logs")->insert([
           "type" => self::$CLIENT_INQUIRY,
           "log_message" => $message,
           "time_created" => Date("h:i:s a"),
           "date_created" => Date("M-d-Y")
       ]);
    }

    public static function saveLogin($message){
        DB::table("admin_logs")->insert([
            "type" => self::$LOGGIN_IN,
            "log_message" => $message,
            "time_created" => Date("h:i:s a"),
           "date_created" => Date("M-d-Y")
        ]);
     }

}

?>