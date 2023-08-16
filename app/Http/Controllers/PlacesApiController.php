<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlacesApiController extends Controller
{
    public function all()
    {
        try
        {
            $rev = Place::all();
            foreach($rev as $re)
            {
                $re->image = url('images/places/'.$re->image);
                $re->coverimage = url('images/places/cover/'.$re->coverimage);
            }
            return $rev;
        }
       
        catch (\Exception  $e) 
        {

            return response()->json($e->getMessage(), 404);
        }
        
    }
    
    public function names()
    {
        try
        {
            $plcaesnames = Place::select('id','slug','name')->get();
            return $plcaesnames;
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
            //$live = Place::findOrFail($id);
            $live = Place::where('slug',$id)->orWhere('id',$id)->first();
            $live->image = url('images/places/'.$live->image);
            $live->coverimage = url('images/places/cover/'.$live->coverimage);
            //$live = Place::where('slug',$id)->first();
            return $live;
        } 
        catch (\Exception $e) {
            return response()->json("place not found", 404);
        }
    }
}
