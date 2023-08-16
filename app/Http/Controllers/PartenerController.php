<?php

namespace App\Http\Controllers;
use App\Models\Partener;
use Illuminate\Http\Request;

class PartenerController extends Controller
{
    public function editimage()
    {
        return view('admins.partener.editimages');
    }

    public function getimagesvue()
    {
        $parteners = Partener::all();
        foreach($parteners as $a)
        {
            $a->image = url('images/partener/'.$a->image);
        }
        return response()->json(['activityimages' => $parteners], 200);
    }

    public function deleteimage(Request $request)
    {
        $activity = Partener::findorfail($request->id);
       
        $activity->delete();
         
        return response()->json(['err' => false, 'msg' => 'تم الحذف بنجاح'], 200);
    }

    public function updateimage(Request $request)
    {
        $partener = new  Partener();
        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/partener/', $filename);
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
            $revs = Partener::all();
            foreach($revs as $rev)
            {
                $rev->image = url('images/partener/'.$rev->image);
            }
            return $revs;
        }
        catch(\Exception  $e)
        {
            return response()->json($e->getMessage(), 404);
        }
    }
}
