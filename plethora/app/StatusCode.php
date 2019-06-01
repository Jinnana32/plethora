<?php

namespace App;

class StatusCode {

    public static function SUCCESS() {
        return 200;
    }

    public static function UNAUTHORIZED(){
        return 401;
    }

    public static function NOTFOUND(){
        return 404;
    }

    public static function CREATED(){
        return 201;
    }

    public static function ACCEPTED(){
        return 202;
    }

    public static function SERVER_ERROR(){
        return 500;
    }

    public static function BAD_REQUEST(){
        return 400;
    }

}