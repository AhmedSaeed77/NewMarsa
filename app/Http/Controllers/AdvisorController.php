<?php

namespace App\Http\Controllers;
use App\Models\Advisor;
use App\Models\AdvisorImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdvisorController extends Controller
{
    public function create()
    {
        return view('admins.advisor.editimages');
    }

    public function deleteimage(Request $request)
    {
        $activity = AdvisorImage::findorfail($request->id);
       
        $activity->delete();
         
        return response()->json(['err' => false, 'msg' => 'تم الحذف بنجاح'], 200);
    }

    public function all()
    {
        try
        {
            $rev = AdvisorImage::all();
            foreach($rev as $re)
            {
                $re->image = url('images/advisor/'.$re->image);
            }
            return response()->json( $rev);;
        }
        catch(\Exception  $e)
        {
            return response()->json($e->getMessage(), 404);
        }
    }

    public function store(Request $request)
    {
        if ($request->file('images')) 
        { 
            $pkgimage = AdvisorImage::where('advisor_id', 1)->get();

                foreach($pkgimage as $image)
                {
                    $image->delete();
                    if (File::exists('images/advisor/' .$image->image)) 
                    {
                        File::delete('images/advisor/'.$image->image);
                    }
                }
            foreach ($request->file('images') as $image) 
            {
                $activimage = new AdvisorImage();
                $activimage->advisor_id = 1;
                $file = $image;
                $filename = $file->getClientOriginalName();
                $filename = str_replace(" ","",$filename);
                $file->move('images/advisor', $filename);
                $activimage->image = $filename;
                $activimage->save();
            }
        }
        return redirect()->back();
    }
}
