<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DeveloperController extends Controller
{
     // Developers
     public function showDevelopers(){
        $devs = DB::table("developers")->where("archive", 1)->get();
        $developers = array();
        foreach($devs as $dev){
            $has_brands = false;
            $brands = DB::table("developer_brandings")->where("dev_id", $dev->id)->where("archive", 1)->get();
            if($brands->count() > 0){
                $has_brands = true;
            }
            array_push($developers, array(
                "dev" => $dev,
                "has_brands" => $has_brands,
                "brands" => $brands
            ));
        }
        return view('admin.customize.developer', compact('developers'));
    }

    public function addDeveloper(Request $request){

        // Check first if image exist
        if($request->hasFile('dev_image')){

            // Get file details
            $fileExtension = $request->file('dev_image')->getClientOriginalExtension();
            $filenameWithExt = $request->file('dev_image')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileNameStore = $fileName . "_" . time() . "." . $fileExtension;

            // Upload image
            if($request->file('dev_image')->storeAs('public/developers', $fileNameStore)){

                // Add developer
                DB::table("developers")->insert(
                    [
                        "name" => $request->dev_name,
                        "image" => $fileNameStore,
                        "archive" => 1
                    ]
                );

                return redirect()->back()->with('success', 'Developer ' . $request->dev_name . ' was successfully addded');
            }else{
                return redirect()->back()->withErrors(["error_upload" => "Error moving file to uploads"]);
            }
        }

        return redirect()->back()->withErrors(["error_upload" => "No file uploaded"]);
    }

    public function updateDeveloper(Request $request){

        // If request has file update with file
        if($request->hasFile("dev_image")){
            // Get file details
            $fileExtension = $request->file('dev_image')->getClientOriginalExtension();
            $filenameWithExt = $request->file('dev_image')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileNameStore = $fileName . "_" . time() . "." . $fileExtension;

            // Upload image
            if($request->file('dev_image')->storeAs('public/developers', $fileNameStore)){

                // Add developer
                DB::table("developers")->where("id", $request->dev_id)
                                       ->update(
                    [
                        "name" => $request->dev_name,
                        "image" => $fileNameStore
                    ]
                );

                return redirect()->back()->with('success', 'Developer ' . $request->dev_name . ' was successfully updated!');
            }else{
                return redirect()->back()->withErrors(["error_upload" => "Error moving file to uploads"]);
            }
        }

        // Update developer name only
        DB::table("developers")->where("id", $request->dev_id)->update(["name" => $request->dev_name]);
        return redirect()->back()->with('success', 'Developer ' . $request->dev_name . ' was successfully updated!');
    }

    public function removeDeveloper(Request $request){
        DB::table("developers")->where("id", $request->dev_id)->update(["archive" => 0]);
        return redirect()->back()->with('success', 'Developer ' . $request->dev_name . ' was successfully removed!');
    }

    public function addBranding(Request $request){
        // Check first if image exist
        if($request->hasFile('brand_image')){

            // Get file details
            $fileExtension = $request->file('brand_image')->getClientOriginalExtension();
            $filenameWithExt = $request->file('brand_image')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileNameStore = $fileName . "_" . time() . "." . $fileExtension;

            // Upload image
            if($request->file('brand_image')->storeAs('public/brandings', $fileNameStore)){

                // Add developer
                DB::table("developer_brandings")->insert(
                    [
                        "dev_id" => $request->dev_id,
                        "name" => $request->brand_name,
                        "image" => $fileNameStore,
                        "archive" => 1
                    ]
                );

                return redirect()->back()->with('success', 'Branding ' . $request->brand_name . ' was successfully addded');
            }else{
                return redirect()->back()->withErrors(["error_upload" => "Error moving file to uploads"]);
            }
        }

        return redirect()->back()->withErrors(["error_upload" => "No file uploaded"]);
    }

    public function updateBranding(Request $request){
            // If request has file update with file
            if($request->hasFile("brand_image")){
                // Get file details
                $fileExtension = $request->file('brand_image')->getClientOriginalExtension();
                $filenameWithExt = $request->file('brand_image')->getClientOriginalName();
                $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $fileNameStore = $fileName . "_" . time() . "." . $fileExtension;

                // Upload image
                if($request->file('brand_image')->storeAs('public/brandings', $fileNameStore)){

                    // Add developer
                    DB::table("developer_brandings")->where("id", $request->brand_id)
                                        ->update(
                        [
                            "name" => $request->brand_name,
                            "image" => $fileNameStore
                        ]
                    );

                    return redirect()->back()->with('success', 'Developer ' . $request->brand_name . ' was successfully updated!');
                }else{
                    return redirect()->back()->withErrors(["error_upload" => "Error moving file to uploads"]);
                }
            }

            // Update developer name only
            DB::table("developer_brandings")->where("id", $request->brand_id)->update(["name" => $request->brand_name]);
            return redirect()->back()->with('success', 'Developer ' . $request->brand_name . ' was successfully updated!');
    }

    public function removeBranding(Request $request){
        DB::table("developer_brandings")->where("id", $request->brand_id)->update(["archive" => 0]);
        return redirect()->back()->with('success', 'Developer Brand ' . $request->brand_name . ' was successfully removed!');
    }

    public function removeAbodeImage(Request $request){
        DB::table("abode_images")->where("id", $request->image_id)->delete();
        return redirect()->back()->with('success', 'Abode image was successfully removed!');
    }

    public function addUser(Request $request){
        $newUserId = DB::table("users")->insertGetId([
            "username" => $request->username,
            "password" => Hash::make("plethoraadmin"),
            "access_level" => "admin",
            "type" => $request->type
        ]);

        DB::table("personal_information")->insert([
            "user_id" => $newUserId,
            "first_name" => $request->first_name,
            "last_name" => $request->last_name
        ]);

        return redirect()->back()->with('success', 'User was successfully added!');
    }

}