<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Activity;
use Illuminate\Http\Request;

class PackageApiController extends Controller
{
    public function all()
    {
        try
        {
            $package = Package::all();
            foreach($package as $pkg)
            {
                $pkg->image = url('images/package/'.$pkg->image); 
                $pkg->images =$pkg->images()->orderBy('indexx','ASC')->get();
                foreach($pkg->images as $re)
                {
                    $re->image = url('images/package/'.$re->image);
                }
            }
            return $package;
        }
        catch(\Exception  $e){
            return response()->json($e->getMessage(), 404);
        }
    }
    public function show($id)
    {
        try
        {
            //$live = Package::findOrFail($id);
            $live = Package::where('slug',$id)->orWhere('id',$id)->first();
            foreach($live->activities as $activity)
            {
                $live_activity = $activity;
                $live_activity->image = url('images/activities/'.$live_activity->image);
                $live_activity->places;
                $live_activity->type_id = $activity->activity_type->type;
                $live_activity->imges =$live_activity->images()->orderBy('indexx','ASC')->get();
                foreach($live_activity->images as $activ)
                {
                    $activ->image = url('images/activities/'.$activ->image);
                }
            }
            $live->image = url('images/package/'.$live->image);  
            $live->images =$live->images()->orderBy('indexx','ASC')->get();
            foreach($live->images as $activity)
            {
                $activity->images = url('images/package/'.$activity->image); 
            }
            return $live;
        }
        catch(\Exception $e)
        {
            return response()->json($e->getMessage());
        }
    }
}
