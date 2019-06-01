<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\StatusCode;
use App\RespHandler;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    public function index(){
        return Training::all();
    }

    public function show($id){

        if($training = Training::find($id)){
            return $training;
        }

        return RespHandler::not_exist();
    }

    public function store(Request $request){

        try{
            $training_id = Training::create($request->all())->id;
        }catch(QueryException $e){
            return RespHandler::not_created();
        }

        return RespHandler::created($training_id);

    }

    public function update(Request $request, Training $training){


        if($training = Training::find($id)){
            try{
                $training->update($request->all());
            }catch(QueryException $e){
                return RespHandler::not_updated();
            }

            return RespHandler::updated();
        }

        return RespHandler::not_exist();
    }

    public function delete($id){

        if($training = Training::find($id)){
            try{
                $training->delete();
            }catch(QueryException $e){
                return RespHandler::not_deleted();
            }

            return RespHandler::deleted();
        }

        return RespHandler::not_exist();
    }

    public function addTraining(Request $request){
        // Add developer
        DB::table("trainings")->insert(
            [
                "header" => $request->header,
                "content" => $request->content,
                "venue" => $request->venue,
                "date" => $request->date,
                "time" => $request->time,
                "place" => $request->place
            ]
        );

        return redirect()->back()->with('success', 'Training ' . $request->header . ' was successfully addded');
    }

}
