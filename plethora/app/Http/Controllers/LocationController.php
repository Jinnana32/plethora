<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{

    public function showLocation(){
        $locations = DB::table("abode_location")->where("archive", 1)->get();
        return view('admin.customize.location', compact('locations'));
    }

    public function addLocation(Request $request){
        // Check first if image exist
        if($request->hasFile('location_image')){

            // Get file details
            $fileExtension = $request->file('location_image')->getClientOriginalExtension();
            $filenameWithExt = $request->file('location_image')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileNameStore = $fileName . "_" . time() . "." . $fileExtension;

            // Upload image
            if($request->file('location_image')->storeAs('public/developers', $fileNameStore)){

                // Add developer
                DB::table("abode_location")->insert(
                    [
                        "location" => $request->location_name,
                        "image" => $fileNameStore,
                        "archive" => 1
                    ]
                );

                return redirect()->back()->with('success', 'Location ' . $request->location_name . ' was successfully addded');
            }else{
                return redirect()->back()->withErrors(["error_upload" => "Error moving file to uploads"]);
            }
        }

        return redirect()->back()->withErrors(["error_upload" => "No file uploaded"]);
    }

    public function updateLocation(Request $request){

        // If request has file update with file
        if($request->hasFile("location_image")){
            // Get file details
            $fileExtension = $request->file('location_image')->getClientOriginalExtension();
            $filenameWithExt = $request->file('location_image')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileNameStore = $fileName . "_" . time() . "." . $fileExtension;

            // Upload image
            if($request->file('location_image')->storeAs('public/developers', $fileNameStore)){

                // Add developer
                DB::table("abode_location")->where("id", $request->location_id)
                                       ->update(
                    [
                        "location" => $request->location_name,
                        "image" => $fileNameStore
                    ]
                );

                return redirect()->back()->with('success', 'Location ' . $request->location_name . ' was successfully updated!');
            }else{
                return redirect()->back()->withErrors(["error_upload" => "Error moving file to uploads"]);
            }
        }

        // Update developer name only
        DB::table("abode_location")->where("id", $request->location_id)->update(["location" => $request->location_name]);
        return redirect()->back()->with('success', 'Location ' . $request->location_name . ' was successfully updated!');
    }

    public function removeLocation(Request $request){
        DB::table("abode_location")->where("id", $request->loc_id)
                                            ->update(["archive" => 0]);
        return redirect()->back()->with('success', 'Location ' . $request->loc_name . ' was successfully removed!');
    }

}