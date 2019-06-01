<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    // Projects
    public function showProjects(Request $request){
        $projects = array();
        $developer = DB::table("developers")->where("id", $request->dev_id)->first();
        $temp_projects = DB::table("projects")->where("developer_id", $developer->id)->where("archive", 1)->get();
        foreach($temp_projects as $project){
            $sub_brand = "none";
            if($project->sub_brand_id != ""){
                $sub_brand = DB::table("developer_brandings")->where("id", $project->sub_brand_id)->first()->name;
            }

            array_push($projects, array(
                "project" => $project,
                "sub_developer" => $sub_brand
            ));
        }
        return view('admin.customize.projects', compact('projects', 'developer'));
    }

    // Projects
    public function showProjectsWithBrands(Request $request){
        $projects = array();
        $developer = DB::table("developers")->where("id", $request->dev_id)->first();
        $brand = DB::table("developer_brandings")->where("id", $request->brand_id)->first();
        $temp_projects = DB::table("projects")->where("sub_brand_id", $brand->id)->where("archive", 1)->get();
        foreach($temp_projects as $project){
            $sub_brand = DB::table("developer_brandings")->where("id", $project->sub_brand_id)->first()->name;
            array_push($projects, array(
                "project" => $project,
                "sub_developer" => $sub_brand
            ));
        }
        return view('admin.customize.projects_brand', compact('projects', 'developer', 'brand'));
    }

    public function addProject(Request $request){

        $brand_id = null;
        if ($request->has("brand_id")){
            $brand_id = $request->brand_id;
        }

         // Add developer
         DB::table("projects")->insert(
            [
                "developer_id" => $request->dev_id,
                "sub_brand_id" => $brand_id,
                "name" => $request->proj_name,
                "archive" => 1
            ]
        );

        return redirect()->back()->with('success', 'Project ' . $request->proj_name . ' was successfully addded');
    }

    public function updateProject(Request $request){
        // Update developer name only
        DB::table("projects")->where("id", $request->proj_id)->update(["name" => $request->proj_name]);
        return redirect()->back()->with('success', 'Project ' . $request->proj_name . ' was successfully updated!');
    }

    public function removeProject(Request $request){
        DB::table("projects")->where("id", $request->proj_id)->update(["archive" => 0]);
        return redirect()->back()->with('success', 'Project ' . $request->proj_name . ' was successfully removed!');
    }

}