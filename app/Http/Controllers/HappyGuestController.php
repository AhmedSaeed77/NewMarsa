<?php

namespace App\Http\Controllers;
use App\Models\HappyGuest;
use Illuminate\Http\Request;

class HappyGuestController extends Controller
{
    public function editimage()
    {
        return view('admins.happyguest.editimages');
    }

    public function getimagesvue()
    {
        $happyguest = HappyGuest::all();
        foreach($happyguest as $a)
        {
            $a->image = url('images/happyguest/'.$a->image);
        }
        return response()->json(['activityimages' => $happyguest], 200);
    }

    public function deleteimage(Request $request)
    {
        $activity = HappyGuest::findorfail($request->id);
       
        $activity->delete();
         
        return response()->json(['err' => false, 'msg' => 'تم الحذف بنجاح'], 200);
    }

    public function updateimage(Request $request)
    {
        $partener = new  HappyGuest();
        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/happyguest/', $filename);
            $partener->image = $filename;
        }
        $partener->indexx = $request->indexx;
        $partener->save();
        return response()->json(['err' => false, 'msg' => 'تم الحفظ بنجاح'], 200);
    }
    
    
    public function getAll()
    {
        try
        {
            $revs = HappyGuest::all();
            foreach($revs as $rev)
            {
                $rev->image = url('images/happyguest/'.$rev->image);
            }
            return $revs;
        }
        catch(\Exception  $e)
        {
            return response()->json($e->getMessage(), 404);
        }
    }
}
