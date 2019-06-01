<?php

namespace App;
use App\StatusCode;

class RespHandler {

    public static function not_exist(){
        return response()->json(["message" => "Record not found"], StatusCode::BAD_REQUEST());
    }

    public static function created($id){
        return response()->json(["id" => $id, "message" => "Record added successfully"], StatusCode::CREATED());
    }

    public static function not_created(){
        return response()->json(["message" => "Error adding record"], StatusCode::BAD_REQUEST());
    }

    public static function updated(){
        return response()->json(["message" => "Record updated successfully"], StatusCode::SUCCESS());
    }

    public static function not_updated(){
        return response()->json(["message" => "Error updating record"], StatusCode::BAD_REQUEST());
    }

    public static function deleted(){
        return response()->json(["message" => "Record deleted successfully "], StatusCode::ACCEPTED());
    }

    public static function not_deleted(){
        return response()->json(["message" => "Error removing record"], StatusCode::BAD_REQUEST());
    }

}