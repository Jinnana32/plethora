<?php

namespace App\Http\Controllers;

use App\Models\Abode;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\StatusCode;
use App\RespHandler;
use Illuminate\Support\Facades\DB;

class AbodeController extends Controller
{
    public function index(){
        return Abode::all();
    }

    public function show($id){

        if($abode = Abode::find($id)){
            return $abode;
        }

        return RespHandler::not_exist();
    }

    public function store(Request $request){

        DB::table("abodes")->insert([
            "dev_id" => $request->dev_id,
            "branding" => $request->brand_id,
            "project" => $request->project_id,
            "display_name" => $request->display_name,
            "category" => $request->category_id,
            "location" => $request->location_id,
            "address" => $request->address,
            "monthly_payment" => $request->monthly_payment,
            "monthly_equity" => $request->monthly_equity,
            "total_contract_price" => $request->total_contract_price,
            "net_selling_price" => $request->net_selling_price,
            "date" => date("Y-m-d h:i:s a", time()),
            "archive" => 1
            ]);

        $id = DB::getPdo()->lastInsertId();

        foreach($request->options as $option){
            $pair = explode(",", $option);

            if($pair[2] == "false"){
                $archive = 0;
            }else{
                $archive = 1;
            }

            DB::table("abode_category_options")->insert([
                "abode_id" => $id,
                "feature_id" => $pair[0],
                "value" => $pair[1],
                "archive" => $archive
            ]);
        }

        return RespHandler::created($id);

    }

    public function update(Request $request, $id){

        if($abode = Abode::find($id)){
            try{
                $abode->update($request->all());
            }catch(QueryException $e){
                return RespHandler::not_updated();
            }

            return RespHandler::updated();
        }

        return RespHandler::not_exist();
    }

    public function delete($id){

        if($abode = Abode::find($id)){
            try{
                $abode->delete();
            }catch(QueryException $e){
                return RespHandler::not_deleted();
            }

            return RespHandler::deleted();
        }

        return RespHandler::not_exist();
    }

    public function addAbodeImage(Request $request){
        // If request has file update with file
        if($request->hasFile("abode_image")){
            // Get file details
            $fileExtension = $request->file('abode_image')->getClientOriginalExtension();
            $filenameWithExt = $request->file('abode_image')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileNameStore = $fileName . "_" . time() . "." . $fileExtension;

            // Upload image
            if($request->file('abode_image')->storeAs('public/abode', $fileNameStore)){

                // Add developer
                DB::table("abodes")->where("id", $request->abode_id)
                                    ->update(
                    [
                        "image" => $fileNameStore
                    ]
                );

                return redirect()->back()->with('success', 'Abode was successfully added!');
            }else{
                return redirect()->back()->withErrors(["error_upload" => "Error adding abode"]);
            }
        }
    }

    public function updatePricing(Request $request){
        // Add developer
        DB::table("abodes")->where("id", $request->abode_id)
        ->update(
                [
                    "total_contract_price" => $request->contract_price,
                    "net_selling_price" => $request->selling_price,
                    "monthly_payment" => $request->monthly_price,
                    "monthly_equity" => $request->monthly_equity
                ]
            );
        return redirect()->back()->with('success', 'Abode was successfully updated!');
    }

    public function showAbodeDetails(Request $request){

        $abode = DB::table("abodes")->where("id", $request->abode_id)->first();

            $features = array();
            $has_brand = 0;
            $branding = null;
            $filter_prompt = array();

            $developer = DB::table("developers")->where("id", $abode->dev_id)
                                                      ->where("archive", 1)
                                                      ->first();

            if($abode->branding != 0){
                $has_brand = 1;
                $branding = DB::table("developer_brandings")->where("id", $abode->branding)
                                                                  ->where("archive", 1)
                                                                  ->first();
            }

            $category = DB::table("abode_categories")->where("id", $abode->category)
                                                     ->where("archive", 1)
                                                     ->first()->category;

            $location = DB::table("abode_location")->where("id", $abode->location)
                                                   ->where("archive", 1)
                                                   ->first()->location;

            $temp_features = DB::table("abode_category_options")->where("abode_id", $abode->id)
                                                                ->where("archive", 1)
                                                                ->get();

            foreach($temp_features as $feature){
                $temp_feature = DB::table("abode_features")->where("id", $feature->feature_id)
                                                           ->where("archive", 1)
                                                           ->first()->display_name;
                array_push($features, array(
                    "feature" => $temp_feature,
                    "value" => $feature->value
                ));
            }

            $abode_images = DB::table("abode_images")->where("abode_id", $request->abode_id)->get();

            $abodes = array(
                "current" => $abode,
                "category" => $category,
                "location" => $location,
                "features" => $features,
                "developer" => $developer,
                "has_brand" => $has_brand,
                "branding" => $branding,
                "images" => $abode_images
            );

        return view("admin.abode.abode_details")->with(compact('abodes'));
    }

    public function updateAbodeDetails(Request $request){
        DB::table("abodes")->where("id", $request->abode_id)
        ->update(
                [
                    "display_name" => $request->display_name,
                    "category" => $request->category,
                    "location" => $request->location,
                    "address" => $request->address
                ]
            );
        return redirect()->back()->with('success', 'Abode was successfully updated!');
    }

    public function addAbode(Request $request){
        // If request has file update with file
        if($request->hasFile("abode_image")){
            // Get file details
            $fileExtension = $request->file('abode_image')->getClientOriginalExtension();
            $filenameWithExt = $request->file('abode_image')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileNameStore = $fileName . "_" . time() . "." . $fileExtension;

            // Upload image
            if($request->file('abode_image')->storeAs('public/abode', $fileNameStore)){

                // Add developer
                DB::table("abode_images")->where("id", $request->abode_id)
                                    ->insert(
                    [
                        "abode_id" => $request->abode_id,
                        "image" => $fileNameStore
                    ]
                );

                return redirect()->back()->with('success', 'Abode image was successfully added!');
            }else{
                return redirect()->back()->withErrors(["error_upload" => "Error adding abode"]);
            }
        }
    }


}
