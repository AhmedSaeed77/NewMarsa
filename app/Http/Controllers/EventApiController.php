<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\BestEvent;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventApiController extends Controller
{
    public function all()
    {
        try 
        {
            $liv = Event::all();
            $result = [];
            foreach($liv as $re)
            {
                // if((time()-(60*60*24)) < strtotime($re->availability))
                // {
                    $re->image = url('images/events/'.$re->image);
                    $re->place_id = $re->place->name;

                    // $re->images =$re->images()->orderBy('indexx','ASC')->get();
                    // foreach($re->images as $li)
                    // {
                    //     $li->image = url('images/events/'.$li->image);
                    // }
                    
                    array_push($result,$re);
                //}
                
            }
            return $result;
        } 
        catch (\Exception  $e) 
        {
            return response()->json("Events not found", 404);
        }
    }
    public function bestevent()
    {
        $populars = BestEvent::where('id',1)->get();
        return $populars;
    }
    public function show($id)
    {
        try
        {
            // $live = Event::findOrFail($id);
            $live = Event::where('slug',$id)->orWhere('id',$id)->first();
            // if((time()-(60*60*24)) < strtotime($live->availability))
            // {
                $live->image = url('images/events/'.$live->image);
                $live->place_id = $live->place->name;
                $live->images =$live->images()->orderBy('indexx','ASC')->get();
                foreach($live->images as $li)
                {
                    $li->image = url('images/events/'.$li->image);
                }
                return $live;
            // }
            // else
            // {
            //      return response()->json("event already out of date", 200);
            // }
            
        }
        catch(\Exception $e)
        {
            return response()->json("event not found", 404);
        }
    }
    
    
}
