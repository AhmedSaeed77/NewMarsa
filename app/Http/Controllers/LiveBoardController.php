<?php

namespace App\Http\Controllers;

use App\Models\LiveBoard;
use App\Models\LiveboardImage;
use App\Models\LivaboardPlace;
use App\Models\LiveboardBoat;
use App\Models\LiveboardSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DataTables;
class LiveBoardController extends Controller
{
    public function index()
    {
        $live=LiveBoard::all();
        return view('admin.liveboard.index',['live'=>$live]);
    }
    public function livedetails($id)
    {
        $live=LiveBoard::find($id);
        return view('admin.liveboard.livedetails',['live'=>$live]);
    }
    
    public function create()
    {
        return view('admin.liveboard.create');
    }
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'title' => 'required',
                    // 'title_de' => 'required',
                    // 'title_cz' => 'required',
                    'overview' => 'required',
                    // 'overview_de' => 'required',
                    // 'overview_cz' => 'required',
                    'terms' => 'required',
                    // 'terms_de' => 'required',
                    // 'terms_cz' => 'required',
                    'highlights' => 'required',
                    // 'highlights_de' => 'required',
                    // 'highlights_cz' => 'required',
                    'faqs' => 'required',
                    // 'faqs_de' => 'required',
                    // 'faqs_cz' => 'required',
                    'includes' => 'required',
                    // 'includes_de' => 'required',
                    // 'includes_cz' => 'required',
                    'excludes' => 'required',
                    // 'excludes_de' => 'required',
                    // 'excludes_cz' => 'required',
         
                    'price' => 'required',
                    'image' => 'required',
                    'kt_docs_repeater_basic' => 'required',
                    'price_child' => 'required',
                    'images' => 'required',
                    //'descriptiuonadditionalprice_en'=>'required',
                    //'additionalprice' => 'required',

                ]

            );

            $live = new LiveBoard();
            $live->title = $request->title;
            
            //$live->place_id = $request->place_id;
           
            $live->overview = $request->overview;
            $live->terms_and_conditions = $request->terms;
            $live->highlights = $request->highlights;
            $live->faqs = $request->faqs;
            $live->includes = $request->includes;
            $live->exclude = $request->excludes;
            $live->price = $request->price;
            $live->price_child = $request->price_child;
            $live->duration = $request->duration;
            $live->rating = $request->rating;
            $live->plan = $request->plan;
            
            $live->additionalprice = $request->additionalprice;
            $live->descriptiuonadditionalprice_en = $request->descriptiuonadditionalprice_en;

            if ($request->descriptiuonadditionalprice_de != null) 
            {
                $live->descriptiuonadditionalprice_de = $request->descriptiuonadditionalprice_de;
            }
            else
            {
                $live->descriptiuonadditionalprice_de = $request->descriptiuonadditionalprice_en;
            }
            if ($request->descriptiuonadditionalprice_cz != null) 
            {
                $live->descriptiuonadditionalprice_ecz = $request->descriptiuonadditionalprice_cz;
            }
            else
            {
                $live->descriptiuonadditionalprice_cz = $request->descriptiuonadditionalprice_en;
            }

            if($request->title_de != null)
            {
                $live->title_de = $request->title_de;
            }
            else
            {
                $live->title_de = $request->title;
            }

            if($request->title_cz != null)
            {
                $live->title_cz = $request->title_cz;
            }
            else
            {
                $live->title_cz = $request->title;
            }

            if($request->plan_de != null)
            {
                $live->plan_de = $request->plan_de;
            }
            else
            {
                $live->plan_de = $request->plan;
            }

            if($request->plan_cz != null)
            {
                $live->plan_cz = $request->plan_cz;
            }
            else
            {
                $live->plan_cz = $request->plan;
            }

            if($request->overview_de != null)
            {
                $live->overview_de = $request->overview_de;
            }
            else
            {
                $live->overview_de = $request->overview;
            }

            if($request->overview_cz != null)
            {
                $live->overview_cz = $request->overview_cz;
            }
            else
            {
                $live->overview_cz = $request->overview;
            }
            
            if($request->terms_de != null)
            {
                $live->terms_and_conditions_de = $request->terms_de;
            }
            else
            {
                $live->terms_and_conditions_de = $request->terms;
            }

            if($request->terms_cz != null)
            {
                $live->terms_and_conditions_cz = $request->terms_cz;
            }
            else
            {
                $live->terms_and_conditions_cz = $request->terms;
            }
            
            if($request->highlights_de != null)
            {
                $live->highlights_de = $request->highlights_de;
            }
            else
            {
                $live->highlights_de = $request->highlights;
            }

            if($request->highlights_cz != null)
            {
                $live->highlights_cz = $request->highlights_cz;
            }
            else
            {
                $live->highlights_cz = $request->highlights;
            }

            if($request->faqs_de != null)
            {
                $live->faqs_de = $request->faqs_de;
            }
            else
            {
                $live->faqs_de = $request->faqs;
            }

            if($request->faqs_cz != null)
            {
                $live->faqs_cz = $request->faqs_cz;
            }
            else
            {
                $live->faqs_cz = $request->faqs;
            }

            if($request->includes_de != null)
            {
                $live->includes_de = $request->includes_de;
            }
            else
            {
                $live->includes_de = $request->includes;
            }

            if($request->includes_cz != null)
            {
                $live->includes_cz = $request->includes_cz;
            }
            else
            {
                $live->includes_cz = $request->includes;
            }

            if($request->excludes_de != null)
            {
                $live->exclude_de = $request->excludes_de;
            }
            else
            {
                $live->exclude_de = $request->excludes;
            }

            if($request->excludes_cz != null)
            {
                $live->exclude_cz = $request->excludes_cz;
            }
            else
            {
                $live->exclude_cz = $request->excludes;
            }

            if ($request->status != null) 
            {
                $live->status = $request->status;
            }
            else
            {
                $live->status = 'not active';
            }
            
            if ($request->has('image')) 
            {
                $file = $request->file('image');

                $filename = $file->getClientOriginalName();
                $filename = str_replace(" ","",$filename);
                $file->move('images/liveboard', $filename);
                $live->image = $filename;
            }

            if ($request->has('locationimage')) 
            {
                $file = $request->file('locationimage');

                $filename = $file->getClientOriginalName();
                $filename = str_replace(" ","",$filename);
                $file->move('images/liveboard/location/', $filename);
                $live->locationimage = $filename;
            }
            
            
            $live->save();
            
            $sluglive = LiveBoard::where('id',$live->id)->first();
            $sluglive->slug = str_replace(" ","-",$sluglive->title).'-'.$sluglive->id;
            $sluglive->save();

            foreach($request->kt_docs_repeater_basic as $schedule)
            {
                $sch = new LiveboardSchedule();
                $sch->live_id = $live->id;
                $sch->from = $schedule['from'];
                $sch->to = $schedule['to'];
                $sch->save();
            }

            foreach ($request->file('images') as $image) 
            {
                $liveimage = new LiveboardImage();

                $liveimage->liveboard_id = $live->id;

                $file = $image;
                $filename = $file->getClientOriginalName();
                $file->move('images/liveboard', $filename);
                $liveimage->image = $filename;
                
                $liveimage->save();
            }

            if($request->boat)
            {
                foreach ($request->boat as $b)
                {
                    $livboat = new LiveboardBoat();

                    $livboat->liveboard_id = $live->id;
                    $livboat->boat_id = $b;
                    $livboat->save();
                } 
            }
            
            if($request->place)
            {
                foreach ($request->place as $place)
                {
                    $livplace = new LivaboardPlace();
                    $livplace->liveboard_id = $live->id;
                    $livplace->place_id = $place;
                    $livplace->save();
                } 
            }

            return redirect()->route('live.index');
        } 
        catch (\Exception $e) 
        {
            return response()->json(['err' => true, 'msg' => $e->getMessage()], 404);
        }
    }

    public function show($id)
    {
        $live = LiveBoard::find($id);
        //dd($live);
        return view('admin.liveboard.show', ['live' => $live]);
    }

    public function edit($id)
    {
        $live = LiveBoard::find($id);
        $arr = [] ;
        $arr1 = [] ;
        foreach($live->boat as $boat)
        {
            $arr[] = $boat->id; 
        }
        foreach($live->places as $place)
        {
            $arr1[] = $place->id; 
        }
        return view('admin.liveboard.edit', ['live' => $live,'arr'=>$arr,'arr1'=>$arr1]);
    }

    public function update(Request $request)
    {


        try {
            $request->validate(
                [
                    'title' => 'required',
                    //'title_de' => 'required',
                    //'title_cz' => 'required',
                    'overview' => 'required',
                    //'overview_de' => 'required',
                    //'overview_cz' => 'required',
                    'terms' => 'required',
                    //'terms_de' => 'required',
                    ///'terms_cz' => 'required',
                    'highlights' => 'required',
                    //'highlights_de' => 'required',
                    //'highlights_cz' => 'required',
                    'faqs' => 'required',
                    //'faqs_de' => 'required',
                    //'faqs_cz' => 'required',
                    'includes' => 'required',
                    //'includes_de' => 'required',
                    //'includes_cz' => 'required',
                    'excludes' => 'required',
                    //'excludes_de' => 'required',
                    //'excludes_cz' => 'required',
                    //'kt_docs_repeater_basic' => 'required',
                    'price' => 'required',
                    'plan' => 'required',
                    //'additionalprice' => 'required',
                    //'descriptiuonadditionalprice_en' => 'required',
                    //'descriptiuonadditionalprice_de' => 'required',
                    //'descriptiuonadditionalprice_cz' => 'required',
                    
                ]

            );
            $live = LiveBoard::findOrFail($request->id);
            $live->title = $request->title;
            
            $live->slug = str_replace(" ","-",$live->title).'-'.$live->id;
            
           // $live->place_id = $request->place_id;
           
            $live->overview = $request->overview;
            $live->terms_and_conditions = $request->terms;
            $live->highlights = $request->highlights;
            $live->faqs = $request->faqs;
            $live->includes = $request->includes;
            $live->exclude = $request->excludes;
            $live->price = $request->price;
            $live->price_child = $request->price_child;
            $live->duration = $request->duration;
            $live->rating = $request->rating;
            $live->plan = $request->plan;
            
            $live->additionalprice = $request->additionalprice;
            $live->descriptiuonadditionalprice_en = $request->descriptiuonadditionalprice_en;
            $live->descriptiuonadditionalprice_cz = $request->descriptiuonadditionalprice_cz;
            $live->descriptiuonadditionalprice_de = $request->descriptiuonadditionalprice_de;

            if($request->title_de != null)
            {
                $live->title_de = $request->title_de;
            }
            else
            {
                $live->title_de = $request->title;
            }

            if($request->plan_de != null)
            {
                $live->plan_de = $request->plan_de;
            }
            else
            {
                $live->plan_de = $request->plan;
            }

            if($request->plan_cz != null)
            {
                $live->plan_cz = $request->plan_cz;
            }
            else
            {
                $live->plan_cz = $request->plan;
            }

            if($request->title_cz != null)
            {
                $live->title_cz = $request->title_cz;
            }
            else
            {
                $live->title_cz = $request->title;
            }

            if($request->overview_de != null)
            {
                $live->overview_de = $request->overview_de;
            }
            else
            {
                $live->overview_de = $request->overview;
            }

            if($request->overview_cz != null)
            {
                $live->overview_cz = $request->overview_cz;
            }
            else
            {
                $live->overview_cz = $request->overview;
            }
            
            if($request->terms_de != null)
            {
                $live->terms_and_conditions_de = $request->terms_de;
            }
            else
            {
                $live->terms_and_conditions_de = $request->terms;
            }

            if($request->terms_cz != null)
            {
                $live->terms_and_conditions_cz = $request->terms_cz;
            }
            else
            {
                $live->terms_and_conditions_cz = $request->terms;
            }
            
            if($request->highlights_de != null)
            {
                $live->highlights_de = $request->highlights_de;
            }
            else
            {
                $live->highlights_de = $request->highlights;
            }

            if($request->highlights_cz != null)
            {
                $live->highlights_cz = $request->highlights_cz;
            }
            else
            {
                $live->highlights_cz = $request->highlights;
            }

            if($request->faqs_de != null)
            {
                $live->faqs_de = $request->faqs_de;
            }
            else
            {
                $live->faqs_de = $request->faqs;
            }

            if($request->faqs_cz != null)
            {
                $live->faqs_cz = $request->faqs_cz;
            }
            else
            {
                $live->faqs_cz = $request->faqs;
            }

            if($request->includes_de != null)
            {
                $live->includes_de = $request->includes_de;
            }
            else
            {
                $live->includes_de = $request->includes;
            }

            if($request->includes_cz != null)
            {
                $live->includes_cz = $request->includes_cz;
            }
            else
            {
                $live->includes_cz = $request->includes;
            }

            if($request->excludes_de != null)
            {
                $live->exclude_de = $request->excludes_de;
            }
            else
            {
                $live->exclude_de = $request->excludes;
            }

            if($request->excludes_cz != null)
            {
                $live->exclude_cz = $request->excludes_cz;
            }
            else
            {
                $live->exclude_cz = $request->excludes;
            }

            if ($request->status != null) 
            {
                $live->status = $request->status;
            }
            else
            {
                $live->status = 'not active';
            }
            $live->price = $request->price;

            if ($request->has('image')) 
            {
                if (File::exists('images/liveboard/' .$live->image)) 
                {
                    File::delete('images/liveboard/'.$live->image);
                }
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $filename = str_replace(" ","",$filename);
                $file->move('images/liveboard', $filename);
                $live->image = $filename;
            }

            if ($request->has('locationimage')) 
            {
                if (File::exists('images/liveboard/location/' .$live->locationimage)) 
                {
                    File::delete('images/liveboard/location/'.$live->locationimage);
                }
                $file = $request->file('locationimage');
                $filename = $file->getClientOriginalName();
                $filename = str_replace(" ","",$filename);
                $file->move('images/liveboard/location/', $filename);
                $live->locationimage = $filename;
            }

            $live->save();

            // if($request->kt_docs_repeater_basic)
            // {
            //     $livesechedule = LiveboardSchedule::where('live_id',$live->id)->get();
            //     foreach($livesechedule as $livesec)
            //     {
            //         $livesec->forceDelete();
            //     }

            //     foreach($request->kt_docs_repeater_basic as $schedule)
            //     {
            //         $sch = new LiveboardSchedule();
            //         $sch->live_id = $live->id;
            //         $sch->from = $schedule['from'];
            //         $sch->to = $schedule['to'];
            //         $sch->save();
            //     }
            // }

            if($request->file('images'))
            {
                $pkgimage = LiveboardImage::where('liveboard_id', $live->id)->get();

                foreach($pkgimage as $image)
                {
                    $image->delete();

                    if (File::exists('images/liveboard/' .$image->image)) 
                    {
                        File::delete('images/liveboard/'.$image->image);
                    }
                }

                foreach ($request->file('images') as $image) 
                {

                    $liveimage = new LiveboardImage();

                    $liveimage->liveboard_id = $live->id;

                    $file = $image;
                    $filename = $file->getClientOriginalName();
                    $filename = str_replace(" ","",$filename);
                    $file->move('images/liveboard', $filename);
                    $liveimage->image = $filename;
                    
                    $liveimage->save();
                }
            }

            if($request->boat)
            {
                $livboat = LiveboardBoat::where('liveboard_id', $live->id)->get();

                foreach($livboat as $boat)
                {
                    $boat->delete();
                }

                foreach ($request->boat as $b)
                {
                    $livboat = new LiveboardBoat();
                    $livboat->liveboard_id = $live->id;
                    $livboat->boat_id = $b;
                    $livboat->save();
                } 
                
            }

            if($request->place)
            {
                $activplace = LivaboardPlace::where('liveboard_id', $live->id)->get();
                foreach($activplace as $place)
                {
                    $place->delete();
                }
                foreach ($request->place as $place)
                {
                    $activplace = new LivaboardPlace();
                    $activplace->liveboard_id =  $live->id;
                    $activplace->place_id = $place;
                    $activplace->save();
                }    
            }

            return redirect()->route('live.index');
        } 
        catch (\Exception $e) 
        {
            return response()->json(['err' => true, 'msg' => $e->getMessage()], 404);
        }
    }

    public function destroy(Request $request)
    {
        $p = LiveBoard::findOrFail($request->id);
        //$p->places->delete();
        $y = $p->delete();
        if ($y) 
        {
            return response()->json(['err' => false, 'msg' => 'deleted done'], 200);
        } 
        else 
        {
            return response()->json(['err' => true, 'msg' => 'pro'], 200);
        }
    }

    public function editimage()
    {
        return view('admin.liveboard.editimages');
    }

    public function getimagesvue($id)
    {
        $liveboard = LiveBoard::findorfail($id);
        $liveboardimages =  $liveboard->images()->orderBy('indexx','ASC')->get();
        foreach($liveboardimages as $a)
        {
            $a->image = url('images/liveboard/'.$a->image);
        }
        return response()->json(['liveboardimages' => $liveboardimages], 200);
    }

    public function deleteimage(Request $request)
    {
        $liveboard = LiveboardImage::findorfail($request->id);
       
        $liveboard->delete();
         
        return response()->json(['err' => false, 'msg' => 'تم الحذف بنجاح'], 200);
    }

    public function updateimage(Request $request)
    {
        $image = new  LiveboardImage();
        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/liveboard/', $filename);
            $image->image = $filename;
        }
        $image->indexx = $request->indexx;
        $image->liveboard_id = $request->id;
        $image->save();
        return response()->json(['err' => false, 'msg' => 'تم الحفظ بنجاح'], 200);
    }
    
     public function editschedule()
    {
        return view('admin.liveboard.editschedule');
    }

    public function getschedulevue($id)
    {
        $liveboardschedule = LiveboardSchedule::where('live_id',$id)->get();
        return response()->json(['liveboardschedule' => $liveboardschedule], 200);
    }

    public function deleteschedule(Request $request)
    {  
        $liveboards = LiveboardSchedule::where('id',$request->id)->get();

        foreach($liveboards as $liveboard)
        {
            $liveboard->delete();
        }
        return response()->json(['err' => false, 'msg' => 'تم الحذف بنجاح'], 200);
    }

    public function updateschedule(Request $request)
    {
        $schedule = new  LiveboardSchedule();
        
        $schedule->live_id = $request->id;
        $schedule->from = $request->from;
        $schedule->to = $request->to;
        $schedule->save();
        return response()->json(['err' => false, 'msg' => 'تم الحفظ بنجاح'], 200);
    }
}
