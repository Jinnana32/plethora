<?php

namespace App;
use Illuminate\Support\Facades\DB;

class Logging {

    private static $LOGGIN_IN = 1; // Goods
    private static $TAGGING_IN_LIST = 2;
    private static $CLIENT_INQUIRY = 3; // Goods
    private static $EDIT_ACCOUNT = 4;
    private static $GENERATE_BUSINES_CARD = 5;
    private static $WATCH_WEBINAR = 6;

    public static function saveInquiry($message){
       DB::table("admin_logs")->insert([
           "type" => self::$CLIENT_INQUIRY,
           "log_message" => $message,
           "date_created" => Date("M-d-Y h:i:s")
       ]);
    }

    public static function saveLogin($message){
        DB::table("admin_logs")->insert([
            "type" => self::$LOGGIN_IN,
            "log_message" => $message,
            "date_created" => Date("M-d-Y h:i:s")
        ]);
     }

}

?>