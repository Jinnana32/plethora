<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    /* Category */
    public function showCategory(){
        $categories = array();
        $cats = DB::table("abode_categories")->where("archive", 1)->get();
        $sFeatures = DB::table("abode_features")->get();
        foreach($cats as $cat){
            $feature_options = array();
            $feats = DB::table("abode_category_features")->where("category_id", $cat->id)
                                                         ->where("archive", 1)
                                                         ->get();
            foreach($feats as $feat){
                $feature = DB::table("abode_features")->where("id", $feat->feature_id)->get();
                $option = DB::table("abode_options")->where("feat_id", $feat->feature_id)
                                                    ->where("category_id", $cat->id)
                                                    ->where("archive", 1)
                                                    ->get();
                array_push($feature_options, array(
                    "feats" => $feature,
                    "options" => $option
                ));
            }

            array_push($categories, array(
                "category" => $cat,
                "features" => $feature_options
            ));
        }
        return view('admin.customize.category', compact('categories', 'sFeatures'));
    }

    public function addCategory(Request $request){
        // Add category
        DB::table("abode_categories")->insert(
            [
                "category" => $request->category,
                "archive" => 1
            ]
        );
        return redirect()->back()->with('success', 'Category ' . $request->category . ' was successfully addded');
    }

    public function updateCategory(Request $request){
        DB::table("abode_categories")->where("id", $request->cat_id)
                                     ->update([
                                         "category" => $request->cat_name
                                       ]);
        return redirect()->back()->with('success', 'Category ' . $request->cat_name . ' was successfully updated');
    }

    public function removeCategory(Request $request){
        DB::table("abode_categories")->where("id", $request->cat_id)->update(["archive" => 0]);
        return redirect()->back()->with('success', 'Category ' . $request->cat_name . ' was successfully removed!');
    }

    public function addCategoryFeature(Request $request){
        foreach($request->input("phr_features") as $feature){
            DB::table("abode_category_features")->insert(
                [
                    "category_id" => $request->category_id,
                    "feature_id" => $feature,
                    "archive" => 1
                ]
            );
        }
        return redirect()->back()->with('success', 'Feature was successfully addded');
    }

    public function removeCategoryFeature(Request $request){
        DB::table("abode_category_features")->where("category_id", $request->cat_id)
                                            ->where("feature_id", $request->feat_id)
                                            ->update(["archive" => 0]);
        return redirect()->back()->with('success', 'Category ' . $request->cat_name . ' was successfully removed!');
    }

    public function addOption(Request $request){
        // Add category
        DB::table("abode_options")->insert(
            [
                "feat_id" => $request->feat_id,
                "category_id" => $request->cat_id,
                "options" => $request->option_name,
                "archive" => 1
            ]
        );
        return redirect()->back()->with('success', 'Option ' . $request->option_name . ' was successfully addded');
    }

    public function removeOption(Request $request){
        DB::table("abode_options")->where("id", $request->opt_id)->update(["archive" => 0]);
        return redirect()->back()->with('success', 'Category ' . $request->cat_name . ' was successfully removed!');
    }

    public function showFeatures(){
        $features = DB::table("abode_features")->where("archive", 1)->get();
        return view('admin.customize.features', compact("features"));
    }

    public function addFeature(Request $request){
        // Add category
        DB::table("abode_features")->insert(
            [
                "feature" => $request->feature_name,
                "display_name" => $request->display_name,
                "has_options" => $request->has_options,
                "archive" => 1
            ]
        );
        return redirect()->back()->with('success', 'Feature ' . $request->feature_name . ' was successfully addded');
    }

    public function removeFeature(Request $request){
        DB::table("abode_features")->where("id", $request->feat_id)->update(["archive" => 0]);
        return redirect()->back()->with('success', 'Category ' . $request->feat_name . ' was successfully removed!');
    }

}