<?php

namespace App\Http\Controllers;

use App\Models\LiveBoard;
use App\Models\Reviews;
use App\Models\LiveboardSchedule;
use Illuminate\Http\Request;

class LiverboardApiController extends Controller
{
    public function all()
    {
        try 
        {
            $liv = LiveBoard::where('status','active')->get();
            foreach($liv as $re)
            {
                
                $re->image = url('images/liveboard/'.$re->image); 
                $re->places;
                
                
                //$re->locationimage = url('images/liveboard/location/'.$re->locationimage);  
                //$sch = $re->schedules;
                //$re->images =$re->images()->orderBy('indexx','ASC')->get();
                // foreach($re->images as $r)
                // {
                //     $r->image = url('images/liveboard/'.$r->image); 
                // }
                //$re->boat =$re->boat()->orderBy('indexx','ASC')->get();
                
                // foreach($re->boat as $activity)
                // {
                //     $activ = $activity;
                //     $activ->boat = $activity->name_en;
                //     $activ->image = url('images/boats/'.$activity->image);
                //     $activ->images =$activ->images()->orderBy('indexx','ASC')->get();
                //     foreach($activ->images as $image)
                //     {
                //         $image->images = url('images/boats/'.$image->image);
                //     }
                // }
            }
           
            return $liv;
        } 
        catch (\Exception  $e) 
        {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function show($id)
    {
        try
        {
            //$live = LiveBoard::findOrFail($id);
            $live = LiveBoard::where('slug',$id)->orWhere('id',$id)->first();
            //$live->place_id = $live->Place->name;
            $live->image = url('images/liveboard/'.$live->image); 
            $live->locationimage = url('images/liveboard/location/'.$live->locationimage);
            $live->images =$live->images()->orderBy('indexx','ASC')->get();  
            foreach($live->images as $liv)
            {
                $liv->images = url('images/liveboard/'.$liv->image); 
            }
            $sch = $live->schedules;
            // $bot= $live->boat;
            // $bot->image = url('images/boats/'.$live->boat->image);  
            $live->places;
            foreach($live->boat as $activity)
            {
                $activ = $activity;
                $activ->boat = $activity->name_en;
                $activ->image = url('images/boats/'.$activity->image);
                $activ->images = $activ->images()->orderBy('indexx','ASC')->get();
                foreach($activ->images as $image)
                {
                    $image->images = url('images/boats/'.$image->image);
                }
            }
            
            return response()->json(["liveboard_details"=>$live], 200);
        }
        catch(\Exception $e)
        {
            return response()->json($e->getMessage(), 404);
        }
    }
}
