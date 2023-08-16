<?php

namespace App\Http\Controllers;
use App\Models\ActivityType;
use Illuminate\Http\Request;

class ActivityTypeApiController extends Controller
{
    public function all()
    {
        try 
        {
            $activtype = ActivityType::all();
            
            return $activtype;
        } 
        catch (\Exception  $e) 
        {
            return response()->json("Type Activity not found", 404);
        }
    }
}
