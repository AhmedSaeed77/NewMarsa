<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityImage;
use App\Models\ActivityPlace;
use App\Models\ActivityBoat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DataTables;

class ActivityController extends Controller
{
    public function index()
    {
        $activity = Activity::all();
        return view('admin.activity.index',['activity'=>$activity]);
    }
    public function actdetails($id)
    {
        $activity= Activity::find($id);
        return view('admin.activity.actdetails',['activity'=>$activity]);
    }

   
    public function create()
    {
        return view('admin.activity.create');
    }
    public function store(Request $request)
    {
       //dd($request->boat);
        try {
            $request->validate(
                [
                    'title' => 'required',
                    
                    'type' => 'required',
                    //'place_id' => 'required',
                    'overview' => 'required',
                   
                    'terms' => 'required',
                   
                    'highlights' => 'required',
                   
                    'faqs' => 'required',
                    
                    'includes' => 'required',
                    
                    'excludes' => 'required',
                    'plan' => 'required',
                    'price' => 'required',
                    'image' => 'required',
                    'locationimage' => 'required' ,
                    'shortoverview_en' => 'required',
                    'child_status'=> 'required',
                    //'popular'=> 'required',
                    'price_child' => 'required',
                    'child_age' => 'required',
                    //'additionalprice' => 'required',
                    //'boat_id' => 'required',
                    //'descriptiuonadditionalprice_en'=>'required',
                ]

            );
            $activity = new Activity();
            
            
            $activity->descriptiuonadditionalprice_en = $request->descriptiuonadditionalprice_en;

            if ($request->descriptiuonadditionalprice_de != null) 
            {
                $activity->descriptiuonadditionalprice_de = $request->descriptiuonadditionalprice_de;
            }
            else
            {
                $activity->descriptiuonadditionalprice_de = $request->descriptiuonadditionalprice_en;
            }
            if ($request->descriptiuonadditionalprice_cz != null) 
            {
                $activity->descriptiuonadditionalprice_ecz = $request->descriptiuonadditionalprice_cz;
            }
            else
            {
                $activity->descriptiuonadditionalprice_cz = $request->descriptiuonadditionalprice_en;
            }

            $activity->title = $request->title;
            

            if ($request->title_de != null) 
            {
                $activity->title_de = $request->title_de;
            }
            else
            {
                $activity->title_de=$request->title;
            }
            if ($request->title_cz != null) 
            {
                $activity->title_cz = $request->title_cz;
            }
            else
            {
                $activity->title_cz = $request->title;
            }
            if ($request->overview_de != null) 
            {
                $activity->overview_de = $request->overview_de;
              
            }
            else
            {
                $activity->overview_de = $request->overview;
            }
            if ($request->overview_cz != null) 
            {
                $activity->overview_cz = $request->overview_cz;
            }
            else
            {
                $activity->overview_cz = $request->overview;
            }
            if ($request->terms_de != null) 
            {
                $activity->terms_and_conditions_de = $request->terms_de;
               
            }
            else
            {
                $activity->terms_and_conditions_de = $request->terms;
            }
            if ($request->terms_cz != null) 
            {
                $activity->terms_and_conditions_cz = $request->terms_cz;
            }
            else
            {
                $activity->terms_and_conditions_cz = $request->terms;
            }

            if ($request->highlights_de != null) 
            {
                $activity->highlights_de = $request->highlights_de;
            }
            else
            {
                $activity->highlights_de = $request->highlights;
            }
            if ($request->highlights_cz != null) 
            {
                $activity->highlights_cz = $request->highlights_cz;
            }
            else
            {
                $activity->highlights_cz = $request->highlights;
            }
           
            if ($request->faqs_de != null) 
            {
                $activity->faqs_de = $request->faqs_de;
            }
            else
            {
                $activity->faqs_de = $request->faqs;
            } 
            if ($request->faqs_cz != null) 
            {
                $activity->faqs_cz = $request->faqs;
            }
            else
            {
                $activity->faqs_cz = $request->faqs;
            } 
           
            $activity->shortoverview_en = $request->shortoverview_en;
          
            $activity->includes = $request->includes;
            $activity->exclude = $request->excludes;
            if ($request->includes_cz != null) 
            {
                $activity->includes_cz = $request->includes_cz;
            }
            else
            {
                $activity->includes_cz = $request->includes;
            }
            if ($request->includes_de != null) 
            {
                $activity->includes_de = $request->includes_de;
            }
            else{
                $activity->includes_de = $request->includes;
            }
            if ($request->shortoverview_cz != null) {
                $activity->shortoverview_cz = $request->shortoverview_cz;
            }
            else{
                $activity->shortoverview_cz = $request->shortoverview_en;
            }
            if ($request->shortoverview_de != null) {
                $activity->includes_cz = $request->includes_cz;
            }
            else{
                $activity->shortoverview_de = $request->shortoverview_en;
            }
           
            if ($request->exclude_cz != null) {
                $activity->exclude_cz = $request->excludes_cz;
            }
            else{
                $activity->exclude_cz = $request->excludes;
            }
            if ($request->exclude_de != null) {
                $activity->exclude_de = $request->excludes_de;
            }
            else{
                $activity->exclude_de = $request->excludes;
            }
            
            $activity->plan = $request->plan;
            if ($request->plan_cz != null) 
            {
                $activity->plan_cz = $request->plan_cz;
            }
            else
            {
                $activity->plan_cz = $request->plan;
            }
            
            if ($request->plan_de != null) 
            {
                $activity->plan_de = $request->plan_de;
            }
            else
            {
                $activity->plan_de = $request->plan;
            }
           
            $activity->type_id = $request->type;
            //$activity->place_id = $request->place_id;
            $activity->overview = $request->overview;
           
            $activity->terms_and_conditions = $request->terms;
           
            $activity->highlights = $request->highlights;
           
            $activity->faqs = $request->faqs;
          
       
            $activity->price_child = $request->price_child;
            //$activity->child_status = $request->child_status;
            $activity->child_age = $request->child_age;
            $activity->additionalprice = $request->additionalprice;
            $activity->price = $request->price;

            // if($activity->availability)
            // {
             
            // }


            if ($request->status !== null) 
            {
                $activity->status = $request->status;
            }
            else
            {
                $activity->status = 'not active';
            }

            if ($request->popular !== null) 
            {
                $activity->popular = $request->popular;
            }
            else
            {
                $activity->popular = 'not active';
            }

            if ($request->child_status !== null) 
            {
                $activity->child_status = $request->child_status;
            }
            else
            {
                $activity->child_status = 'not active';
            }

            if ($request->has('image')) 
            {
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $filename = str_replace(" ","",$filename);
                $file->move('images/activities', $filename);
                $activity->image = $filename;
            }

            if ($request->has('locationimage')) 
            {
                $file = $request->file('locationimage');
                $filename = $file->getClientOriginalName();
                $filename = str_replace(" ","",$filename);
                $file->move('images/activities/location/', $filename);
                $activity->locationimage = $filename;
            }

            if ($request->has('sat')) 
            {
                $activity->availability = $activity->availability . $request->sat;
            }
            if ($request->has('sun')) 
            {
                $activity->availability = $activity->availability .',' . $request->sun;
            }
            if ($request->has('mon')) 
            {
                $activity->availability = $activity->availability .','. $request->mon;
            }
            if ($request->has('tue')) 
            {
                $activity->availability = $activity->availability.',' . $request->tue;
            }
            if ($request->has('wed')) 
            {
                $activity->availability = $activity->availability.',' . $request->wed;
            }
            if ($request->has('thu')) 
            {
                $activity->availability = $activity->availability.',' . $request->thu;
            }
            if ($request->has('fri')) 
            {
                $activity->availability = $activity->availability.',' . $request->fri;
            }
     
            $activity->save();

            foreach ($request->file('images') as $image) 
            {
                $activimage = new ActivityImage();

                $activimage->activity_id = $activity->id;

                $file = $image;
                $filename = $file->getClientOriginalName();
                $filename = str_replace(" ","",$filename);
                $file->move('images/activities', $filename);
                $activimage->image = $filename;
                
                $activimage->save();
            }

            if($request->boat)
            {
                foreach ($request->boat as $b)
                {
                    $activboat = new ActivityBoat();
                    $activboat->activity_id = $activity->id;
                    $activboat->boat_id = $b;
                    $activboat->save();
                }  
            }

            if($request->place)
            {
                foreach ($request->place as $place)
                {
                    $activplace = new ActivityPlace();
                    $activplace->activity_id = $activity->id;
                    $activplace->place_id = $place;
                    $activplace->save();
                }  
            }
            
            $slugactiv = Activity::where('id',$activity->id)->first();
            $slugactiv->slug = str_replace(" ","-",$slugactiv->title).'-'.$slugactiv->id;
            $slugactiv->save();

            return redirect()->route('activ.index');
        }
         catch (\Exception $e) 
         {
            return response()->json(['err' => true, 'msg' => $e->getMessage()], 404);
        }
    }
    
    

    public function edit($id)
    {
        $activity = Activity::find($id);
        $arr = [] ;
        foreach($activity->boats as $boat)
        {
            $arr[] = $boat->id; 
        }
        $arr1 = [] ;
        foreach($activity->places as $place)
        {
            $arr1[] = $place->id; 
        }
        return view('admin.activity.edit', ['activity' => $activity,'arr'=>$arr,'arr1'=>$arr1]);
    }
    public function update(Request $request)
    {
        
        try {
            $request->validate(
                [
                    'title' => 'required',
                    'title_de' => 'required',
                    'title_cz' => 'required',
                    'type' => 'required',
                    //'place_id' => 'required',
                    'overview' => 'required',
                    'overview_de' => 'required',
                    'overview_cz' => 'required',
                    'terms' => 'required',
                    'terms_de' => 'required',
                    'terms_cz' => 'required',
                    'highlights' => 'required',
                    'highlights_de' => 'required',
                    'highlights_cz' => 'required',
                    'faqs' => 'required',
                    'faqs_de' => 'required',
                    'faqs_cz' => 'required',
                    'includes' => 'required',
                    'includes_de' => 'required',
                    'includes_cz' => 'required',
                    'excludes' => 'required',
                    'excludes_de' => 'required',
                    'excludes_cz' => 'required',
                    //'status' => 'required',
                    'price' => 'required',
                    //'availability' => 'required',
                    'shortoverview_de' => 'required',
                    'shortoverview_cz' => 'required',
                    'shortoverview_en' => 'required',
                    //'child_status'=> 'required',
                    'price_child' => 'required',
                    'child_age' => 'required',
                    //'boat_id' => 'requird',
                    'plan' => 'required',
                    'plan_de'=>'required',
                    'plan_cz' => 'required',
                    //'additionalprice' => 'required',
                    //'descriptiuonadditionalprice_en' => 'required',
                    //'descriptiuonadditionalprice_de' => 'required',
                    //'descriptiuonadditionalprice_cz' => 'required',
                ]

            );
            $activity = Activity::findorfail($request->id);
            $activity->title = $request->title;
            $activity->title_de = $request->title_de;
            $activity->title_cz = $request->title_cz;
            
            $activity->slug = str_replace(" ","-",$activity->title).'-'.$activity->id;
            
            $activity->type_id = $request->type;
            //$activity->place_id = $request->place_id;
            $activity->overview = $request->overview;
            $activity->overview_de = $request->overview_de;
            $activity->overview_cz = $request->overview_cz;
            $activity->terms_and_conditions = $request->terms;
            $activity->terms_and_conditions_de = $request->terms_de;
            $activity->terms_and_conditions_cz = $request->terms_cz;
            $activity->highlights = $request->highlights;
            $activity->highlights_de = $request->highlights_de;
            $activity->highlights_cz = $request->highlights_cz;
            $activity->faqs = $request->faqs;
            $activity->faqs_de = $request->faqs_de;
            $activity->faqs_cz = $request->faqs_cz;
            $activity->includes    = $request->includes;
            $activity->includes_de = $request->includes_de;
            $activity->includes_cz = $request->includes_cz;
            $activity->exclude = $request->excludes;
            $activity->exclude_de = $request->excludes_de;
            $activity->exclude_cz = $request->excludes_cz;
            $activity->plan = $request->plan;
            $activity->plan_de = $request->plan_de;
            $activity->plan_cz = $request->plan_cz;
            //$activity->status = $request->status;
            $activity->price = $request->price;
            $activity->additionalprice = $request->additionalprice;
            $activity->price_child = $request->price_child;
            //$activity->child_status = $request->child_status;
            $activity->child_age = $request->child_age;
            $activity->shortoverview_en = $request->shortoverview_en;
            $activity->shortoverview_cz = $request->shortoverview_cz;
            $activity->shortoverview_de = $request->shortoverview_de;
            
            $activity->descriptiuonadditionalprice_en = $request->descriptiuonadditionalprice_en;
            $activity->descriptiuonadditionalprice_cz = $request->descriptiuonadditionalprice_cz;
            $activity->descriptiuonadditionalprice_de = $request->descriptiuonadditionalprice_de;
            
            $activity->availability = '';
            if ($request->has('sat')) 
            {
                $activity->availability = $activity->availability . $request->sat;
            }
            if ($request->has('sun')) 
            {
                $activity->availability = $activity->availability .',' . $request->sun;
            }
            if ($request->has('mon')) 
            {
                $activity->availability = $activity->availability .','. $request->mon;
            }
            if ($request->has('tue')) 
            {
                $activity->availability = $activity->availability.',' . $request->tue;
            }
            if ($request->has('wed')) 
            {
                $activity->availability = $activity->availability.',' . $request->wed;
            }
            if ($request->has('thu')) 
            {
                $activity->availability = $activity->availability.',' . $request->thu;
            }
            if ($request->has('fri')) 
            {
                $activity->availability = $activity->availability.',' . $request->fri;
            }

            if ($request->status !== null) 
            {
                $activity->status = $request->status;
            }
            else
            {
                $activity->status = 'not active';
            }

            if ($request->child_status !== null) 
            {
                $activity->child_status = $request->child_status;
            }
            else
            {
                $activity->child_status = 'not active';
            }
            
            if ($request->popular !== null) 
            {
                $activity->popular = $request->popular;
            }
            else
            {
                $activity->popular = 'not active';
            }

            
            if ($request->has('image')) 
            {
                if (File::exists('images/activities/' .$activity->image)) 
                {
                    File::delete('images/activities/'.$activity->image);
                }
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $filename = str_replace(" ","",$filename);
                $file->move('images/activities', $filename);
                $activity->image = $filename;
            }

            if ($request->has('locationimage')) 
            {
                if (File::exists('images/activities/location/' .$activity->locationimage)) 
                {
                    File::delete('images/activities/location/'.$activity->locationimage);
                }

                $file = $request->file('locationimage');
                $filename = $file->getClientOriginalName();
                $filename = str_replace(" ","",$filename);
                $file->move('images/activities/location/', $filename);
                $activity->locationimage = $filename;
            }
            
            $activity->save();

            // if($request->file('images'))
            // {
            //     $pkgimage = ActivityImage::where('activity_id', $activity->id)->get();

            //     foreach($pkgimage as $image)
            //     {
            //         $image->delete();
            //         if (File::exists('images/activities/' .$image->image)) 
            //         {
            //             File::delete('images/activities/'.$image->image);
            //         }
            //     }

            //     foreach ($request->file('images') as $image) 
            //     {
            //         $pkgimage = new ActivityImage();
            //         $pkgimage->activity_id = $activity->id;
            //         $file = $image;
            //         $filename = $file->getClientOriginalName();
            //         $file->move('images/activities', $filename);
            //         $pkgimage->image = $filename;
                    
            //         $pkgimage->save();
            //     }
            // }
            if($request->boat)
            {
                $activboat = ActivityBoat::where('activity_id', $activity->id)->get();
                foreach($activboat as $boat)
                {
                    $boat->delete();
                }
                foreach ($request->boat as $b)
                {
                    $activboat = new ActivityBoat();
                    $activboat->activity_id = $activity->id;
                    $activboat->boat_id = $b;
                    $activboat->save();
                }    
            }

            if($request->place)
            {
                $activplace = ActivityPlace::where('activity_id', $activity->id)->get();
                foreach($activplace as $place)
                {
                    $place->delete();
                }
                foreach ($request->place as $place)
                {
                    $activplace = new ActivityPlace();
                    $activplace->activity_id = $activity->id;
                    $activplace->place_id = $place;
                    $activplace->save();
                }    
            }

            return redirect()->route('activ.index');
        } 
        catch (\Exception $e) 
        {
            return response()->json(['err' => true, 'msg' => $e->getMessage()], 404);
        }
    }
    public function destroy(Request $request)
    {
        $p = Activity::findOrFail($request->id);
        $y = $p->delete();
        if ($y) {
            return response()->json(['err' => false, 'msg' => 'deleted done'], 200);
        } else {
            return response()->json(['err' => true, 'msg' => 'pro'], 200);
        }
    }

    public function editimage()
    {
        return view('admin.activity.editimages');
    }

    public function getimagesvue($id)
    {
        $activity = Activity::findorfail($id);
        $activityimages =  $activity->images()->orderBy('indexx','ASC')->get();
        foreach($activityimages as $a)
        {
            $a->image = url('images/activities/'.$a->image);
        }
        return response()->json(['activityimages' => $activityimages], 200);
    }

    public function deleteimage(Request $request)
    {
        $activity = ActivityImage::findorfail($request->id);
       
        $activity->delete();
         
        return response()->json(['err' => false, 'msg' => 'تم الحذف بنجاح'], 200);
    }

    public function updateimage(Request $request)
    {
        $image = new  ActivityImage();
        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/activities/', $filename);
            $image->image = $filename;
        }
        $image->indexx = $request->indexx;
        $image->activity_id = $request->id;
        $image->save();
        return response()->json(['err' => false, 'msg' => 'تم الحفظ بنجاح'], 200);
    }
     
}
