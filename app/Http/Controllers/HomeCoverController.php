<?php

namespace App\Http\Controllers;
use App\Models\HomeCover;
use Illuminate\Http\Request;

class HomeCoverController extends Controller
{
    public function editimage()
    {
        return view('admins.homecover.editimages');
    }

    public function getimagesvue()
    {
        $homecovers = HomeCover::all();
        foreach($homecovers as $a)
        {
            $a->image = url('images/covers/'.$a->image);
        }
        return response()->json(['activityimages' => $homecovers], 200);
    }

    public function deleteimage(Request $request)
    {
        $homecover = HomeCover::findorfail($request->id);
       
        $homecover->delete();
         
        return response()->json(['err' => false, 'msg' => 'تم الحذف بنجاح'], 200);
    }

    public function updateimage(Request $request)
    {
        if(HomeCover::get()->count() < 5 )
        {
            $indexcover = HomeCover::where('indexx',$request->indexx)->first();
            if($indexcover)
            {
                 return response()->json(['err' => false, 'msg' =>  'الترتيب متكرر'],200);
            }
            $homecover = new  HomeCover();
        
            if ($request->hasFile('image')) 
            {
            
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                // $filename = str_replace(" ","",$filename);
                $filename = 'slid-'.$request->indexx.'.webp';
                $file->move('images/covers/', $filename);
                $homecover->image = $filename;
            }
            $homecover->indexx = $request->indexx;
            $homecover->save();
            return response()->json(['err' => false, 'msg' => 'تم الحفظ بنجاح'], 200);
        }
        else 
        {
            return response()->json(['err' => false, 'msg' =>  'عدد الصور اكثر من 5'],200);
        }
        
    }
    
    
    public function getAll()
    {
        try
        {
            $revs = HomeCover::all();
            foreach($revs as $rev)
            {
                $rev->image = url('images/covers/home/'.$rev->image);
            }
            return $revs;
        }
        catch(\Exception  $e)
        {
            return response()->json($e->getMessage(), 404);
        }
    }
    
    
}
