<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\StatusCode;
use App\RespHandler;

class WebinarController extends Controller
{
    public function index(){
        return Webinar::all();
    }

    public function show($id){

        if($webinar = Webinar::find($id)){
            return $webinar;
        }

        return RespHandler::not_exist();
    }

    public function store(Request $request){
       
        try{
            $web_id = Webinar::create($request->all())->id;
        }catch(QueryException $e){
            return RespHandler::not_created();
        }
       
        return RespHandler::created($web_id);

    } 

    public function update(Request $request, $id){

        if($webinar = Webinar::find($id)){
            try{
                $webinar->update($request->all());
            }catch(QueryException $e){
                return RespHandler::not_updated();
            }

            return RespHandler::updated();
        }
       
        return RespHandler::not_exist();
    }

    public function delete($id){

        if($webinar = Webinar::find($id)){
            try{
                $webinar->delete();
            }catch(QueryException $e){
                return RespHandler::not_deleted();
            }

            return RespHandler::deleted();
        }
        
        return RespHandler::not_exist();
    }
    
}
