<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Place;
use App\Models\ActivityPlace;
use App\Models\ActivityBooking;
use App\Models\ActivityType;
use App\Models\TransportBookingsBooking;
use Illuminate\Http\Request;

class ActivityApiController extends Controller
{
    public function getTypes()
    {
        try
        {
            $rev = ActivityType::all();
            return $rev;
        }
        catch(\Exception  $e)
        {
            return response()->json($e->getMessage(), 404);
        }
    }
    
    public function activitpopular()
    {
        try
        {
            $oneactive = Activity::where('status','active')->where('popular','true')->get();
            foreach($oneactive as $activ)
            {
                $activ->places;
                $activ->type_id = $activ->activity_type->type;
                $activ->image = url('images/activities/'.$activ->image);
                $activ->locationimage = url('images/activities/location/'.$activ->locationimage);
                $activ->images =$activ->images()->orderBy('indexx','ASC')->get();
                foreach($activ->images as $activity)
                {
                    $activity->image = url('images/activities/'.$activity->image); 
                }
                foreach($activ->boats as $activity)
                {
                    $activ = $activity;
                    $activ->boat = $activity->name_en;
                    $activ->image = url('images/boats/'.$activity->image);
                    foreach($activ->images as $image)
                    {
                        $image->image = url('images/boats/'.$image->image);
                    }
                }
            }
            return $oneactive;
        }
        catch(\Exception  $e)
        {
            return response()->json($e->getMessage(), 404);
        } 
    }

    public function oneactivity($id)
    {
        try
        {
            //$oneactive = Activity::find($id);
            $oneactive = Activity::where('slug',$id)->orWhere('id',$id)->first();
            $oneactive->places;
            $oneactive->type_id = $oneactive->activity_type->type;
            $oneactive->image = url('images/activities/'.$oneactive->image);
            $oneactive->locationimage = url('images/activities/location/'.$oneactive->locationimage);
            $oneactive->images =$oneactive->images()->orderBy('indexx','ASC')->get();
            foreach($oneactive->images as $activity)
            {
                $activity->image = url('images/activities/'.$activity->image); 
            }
            // foreach($oneactive->boats as $activity)
            // {
            //     $activ = $activity;
            //     $activ->boat = $activity->name_en;
            //     $activ->image = url('images/boats/'.$activity->image);
            // }
             foreach($oneactive->boats as $activity)
                {
                    $activ = $activity;
                    $activ->boat = $activity->name_en;
                    $activ->image = url('images/boats/'.$activity->image);
                    foreach($activ->images as $image)
                    {
                        $image->image = url('images/boats/'.$image->image);
                    }
                }

            return $oneactive;
        }
        catch(\Exception  $e)
        {
            return response()->json($e->getMessage(), 404);
        }
    }

    public function all()
    {
        try
        {
            $rev = Activity::where('status','active')->get();
            foreach($rev as $re)
            {
                $re->place = $re->places;
                $re->type_id = $re->activity_type->type;
                $re->image = url('images/activities/'.$re->image);
                $re->locationimage = url('images/activities/location/'.$re->locationimage);
                // $re->images =$re->images()->orderBy('indexx','ASC')->get();
                // foreach($re->images as $r)
                // {
                //     $r->image = url('images/activities/'.$r->image); 
                // }
                foreach($re->boats as $activity)
                {
                    $activ = $activity;
                    $activ->boat = $activity->name_en;
                    $activ->image = url('images/boats/'.$activity->image);
                    foreach($activ->images as $image)
                    {
                        $image->image = url('images/boats/'.$image->image);
                    }
                }
                // foreach($re->boats as $activity)
                // {
                //     $activ = $activity;
                //     $activ->boat = $activity->name_en;
                //     $activ->images =$activ->images()->orderBy('indexx','ASC')->get();
                //     foreach($activ->images as $image)
                //     {
                //         $activ->image = url('images/boats/'.$activ->image);
                //     }
                // }
            }
            return $rev;
        }
        catch(\Exception  $e)
        {
            return response()->json($e->getMessage(), 404);
        }
    }

    public function filterType($type_id)
    {
        try{
            
            $rev = Activity::where('status','active')->where('type_id',$type_id)->get();
            if (count($rev)>0) 
            {
                foreach($rev as $re)
                {
                    //$re->place_id = $re->place->name;
                    $re->places;
                    $re->type_id = $re->activity_type->type;
                    $re->image = url('images/activities/'.$re->image);
                }
                return $rev;
            }
            else{
                if ($type_id==4) {
                    return 'no tours added yet';
                }
                else if ($type_id==2) {
                    return 'no diving trips added yet';
                }
                else if ($type_id==1) {
                    return 'no snorkeling trips added yet';
                }
                else{
                    return 'no safari trips added yet';
                }
            }
        }
        catch(\Exception  $e){
            return response()->json($e->getMessage(), 404);
        }
    }
    public function filterPlace($place_id)
    {
        try
        {
            $places = ActivityPlace::where('place_id',$place_id)->get();
            $arr= [];
            foreach($places as $place)
            { 
                $activity = Activity::where('status','active')->where('id',$place->activity_id)->get();
                if (count($activity)>0) 
                {
                    foreach($activity as $re)
                    {
                        $re->type_id = $re->activity_type->type;
                        $re->image = url('images/activities/'.$re->image);
                        $re->locationimage = url('images/activities/location/'.$re->locationimage);
                        $re->images =$re->images()->orderBy('indexx','ASC')->get();
                        foreach($re->images as $image)
                        {
                            $image->image = url('images/activities/'.$image->image);
                        }
                        $arr[] = $re;
                    }  
                }
                else
                {
                    return 'this place has no activities yet';
                }
            }
            return $arr;
               
        }
        catch(\Exception  $e)
        {
            return response()->json($e->getMessage(), 404);
        }
    }

    public function filterPlaceType($place_id,$type_id)
    {
        try
        {
            $slugplace = Place::where('slug',$place_id)->orWhere('id',$place_id)->first();
            $slugtype = ActivityType::where('slug',$type_id)->orWhere('id',$type_id)->first();
            // return $slugtype;
            $places = ActivityPlace::where('place_id',$slugplace->id)->get();
            //return $places;
            $rev = [];
            foreach($places as $place)
            {
                if(Activity::where('status','active')->where('type_id',$slugtype->id)->where('id',$place->activity_id)->get()->count() != 0)
                {
                    $rev[] = Activity::where('status','active')->where('type_id',$slugtype->id)->where('id',$place->activity_id)->get();  
                }
            }
            
            // $places = ActivityPlace::where('place_id',$place_id)->get();
            // $rev = [];
            // foreach($places as $place)
            // {
            //     if(Activity::where('status','active')->where('type_id',$type_id)->where('id',$place->activity_id)->get()->count() != 0)
            //     {
            //         $rev[] = Activity::where('status','active')->where('type_id',$type_id)->where('id',$place->activity_id)->get();  
            //     }
            // }
            
            if (count($rev)>0) 
            {
                foreach($rev as $re)
                {
                    foreach($re as $r)
                    {
                        $r->type_id = $r->activity_type->type;
                        $r->places;
                        $r->image = url('images/activities/'.$r->image);
                        // $r->images =$r->images()->orderBy('indexx','ASC')->get();
                        // foreach($r->images as $image)
                        // {
                        //     $image->image = url('images/activities/'.$image->image);
                        // }
                    }
                }
                return $rev;
            }
            else
            {
                if ($type_id==4) 
                {
                    return 'no tours added yet';
                }
                else if ($type_id==2) 
                {
                    return 'no diving trips added yet';
                }
                else if ($type_id==1) 
                {
                    return 'no snorkeling trips added yet';
                }
                else
                {
                    return 'no safari trips added yet';
                }
            }
            
            
            
        }
        catch(\Exception  $e){
            return response()->json($e->getMessage(), 404);
        }
    }
    
    public function filterPlacePopular($place_id)
    {
        try
        {
            $places = ActivityPlace::where('place_id',$place_id)->get();
            $rev = [];
            foreach($places as $place)
            {
                if(Activity::where('status','active')->where('id',$place->activity_id)->where('popular','true')->get()->count() != 0)
                {
                    $rev[] = Activity::where('status','active')->where('id',$place->activity_id)->where('popular','true')->get();  
                }
            }
            
            if (count($rev)>0) 
            {
                foreach($rev as $re)
                {
                    foreach($re as $r)
                    {
                        //$r->type_id = $r->activity_type->type;
                        $r->places;
                        $r->locationimage = url('images/activities/location/'.$r->locationimage);
                        $r->image = url('images/activities/'.$r->image);
                    }
                }
                return $rev;
            }
            else
            {
                if ($type_id==4) 
                {
                    return 'no tours added yet';
                }
                else if ($type_id==2) 
                {
                    return 'no diving trips added yet';
                }
                else if ($type_id==1) 
                {
                    return 'no snorkeling trips added yet';
                }
                else
                {
                    return 'no safari trips added yet';
                }
            }
        }
        catch(\Exception  $e){
            return response()->json($e->getMessage(), 404);
        }
    }
    
    
}
