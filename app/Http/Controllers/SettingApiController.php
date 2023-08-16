<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingApiController extends Controller
{
    public function all()
    {
        try{
            $set = Setting::all();
            foreach($set as $re)
            {
                $re->image = url('images/settings/'.$re->image);
                $re->funimage = url('images/settings/'.$re->funimage);
            }
            return $set;
        }
        catch(\Exception  $e){
            return response()->json("Settings not found", 404);
        }
    }
}
