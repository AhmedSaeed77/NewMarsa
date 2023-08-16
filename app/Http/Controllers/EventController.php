<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Redirect;
use App\Models\BestEvent;
use Auth;
use App\Models\Event;
use App\Models\EventImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class EventController extends Controller
{
    public function show($id)
    {
        $event = Event::find($id);
        return view('admins.events.eventdetails', ['event'=>$event]);
    }

    public function index(Request $request)
    {
        $events = Event::all();
        return view('admins.events.event',['events'=>$events]);
    }
    
    public function bestevent()
    {
        $best = BestEvent::find(1);
        return view('admins.events.bestevent',['best'=>$best]);
    }

    public function bestupdate(Request $request)
    {
        try{
            
            $request->validate([
                'best_en'=>'required',
                'best_de'=>'required',
                'best_cz'=>'required',
            ],[
                'best_en'=>'الاسئله مطلوبه',
                'best_de'=>'الاسئله مطلوبه',
                'best_cz'=>'الاسئله مطلوبه',
            ]);
    
            $popular = BestEvent::find(1);
            $popular->best_en = $request->best_en;
            $popular->best_de = $request->best_de;
            $popular->best_cz = $request->best_cz;
            $popular->save();
            return redirect()->route('index');
        
        }
        catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Event::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('place', function ($row) {
                    $name =  $row->place->name ?? 'تم حذفه';
                    return $name;
                })
                ->addColumn('action', function ($row) {
                    $edit =  route('event.editevent',$row->id) ;
                    $show =  route('event.showevent', $row->id);
                    $actionBtn = '<a href=" ' . $edit . '" class="edit btn btn-success btn-sm m-1">Edit</a>';
                    $actionBtn .= '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    $actionBtn .= '<a href=" ' . $show . '" class="edit btn btn-dark btn-sm m-1">Show</a>';
                    return $actionBtn;
                })
                ->filter(
                    function ($instance) use ($request) {
                        if (request()->has('name')) {
                            $instance->where(function ($w) use ($request) {
                                $title = $request->get('title');
                                $w->orWhere('title', 'LIKE', "%$title%");
                            });
                        }
                        
                    }
                ,true)
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('admins.events.create2');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'place_id'=>'required',
            'overview'=>'required',
            'includes'=>'required',
            'excludes'=>'required',
            'price' => 'required',
            'pricechild' => 'required',
            //'availabilty' => 'required',
            'time'=>'required',
            'image'=>'required',
            'how' => 'required',
            //'descriptiuonadditionalprice_en'=>'required',
            //'additionalprice' => 'required',

            // 'title_de'=>'required',
            // 'overview_de'=>'required',
            // 'includes_de'=>'required',
            // 'excludes_de'=>'required',

            // 'title_cz'=>'required',
            // 'overview_cz'=>'required',
            // 'includes_cz'=>'required',
            // 'excludes_cz'=>'required',
        ],[
            'title'=>' عنوان الحدث مطلوب ',
            'place_id'=>' مكان الحدث مطلوب ',
            //'title_de'=>' عنوان الحدث مطلوب ',
            //'title_cz'=>' عنوان الحدث مطلوب ',
            'overview'=>' وصف الحدث مطلوب ',
            //'overview_de'=>' وصف الحدث مطلوب ',
            //'overview_cz'=>' وصف الحدث مطلوب ',
            'includes'=>' شرح الحدث مطلوب ',
            //'includes_de'=>' شرح الحدث مطلوب ',
            //'includes_cz'=>' شرح الحدث مطلوب ',
            'excludes'=>' شرح الحدث مطلوب ',
            //'excludes_de'=>' شرح الحدث مطلوب ',
            //'excludes_cz'=>' شرح الحدث مطلوب ',
            'image'=>' صوره الحدث مطلوب ',
            'time'=>' وقت الحدث مطلوب ',
            'availabilty'=>' تاريخ الحدث مطلوب ',
             
            'price' => 'سعر البالغين مطلوب',
            'pricechild' => 'سعر الاطفال مطلوب',
            'images' => 'required' ,
            'latitude' => 'required|numeric' ,
            'longitude' => 'required|numeric' ,
            
        ]);
       
        $event= new Event();
        $event->title = $request->title;
        
        $event->how = $request->how;
        $event->place_id = $request->place_id;
        $event->overview = $request->overview;
        $event->includes = $request->includes;
        $event->latitude = $request->latitude;
        $event->longitude = $request->longitude;
        
        $event->excludes = $request->excludes;
        
        
        $event->additionalprice = $request->additionalprice;
        $event->descriptiuonadditionalprice_en = $request->descriptiuonadditionalprice_en;

            if ($request->descriptiuonadditionalprice_de != null) 
            {
                $event->descriptiuonadditionalprice_de = $request->descriptiuonadditionalprice_de;
            }
            else
            {
                $event->descriptiuonadditionalprice_de = $request->descriptiuonadditionalprice_en;
            }
            if ($request->descriptiuonadditionalprice_cz != null) 
            {
                $event->descriptiuonadditionalprice_ecz = $request->descriptiuonadditionalprice_cz;
            }
            else
            {
                $event->descriptiuonadditionalprice_cz = $request->descriptiuonadditionalprice_en;
            }

        
        //$event->availability = $request->availabilty;
        $event->time = $request->time;
        $event->price = $request->price;
        $event->price_child = $request->pricechild;

        if ($request->has('sat')) 
            {
                $event->availability = $event->availability . $request->sat;
            }
            if ($request->has('sun')) 
            {
                $event->availability = $event->availability .',' . $request->sun;
            }
            if ($request->has('mon')) 
            {
                $event->availability = $event->availability .','. $request->mon;
            }
            if ($request->has('tue')) 
            {
                $event->availability = $event->availability.',' . $request->tue;
            }
            if ($request->has('wed')) 
            {
                $event->availability = $event->availability.',' . $request->wed;
            }
            if ($request->has('thu')) 
            {
                $event->availability = $event->availability.',' . $request->thu;
            }
            if ($request->has('fri')) 
            {
                $event->availability = $event->availability.',' . $request->fri;
            }
            
             if($request->how_de != null)
        {
            $event->how_de = $request->how_de;
        }
        else
        {
            $event->how_de = $request->how;
        }

        if($request->how_cz != null)
        {
            $event->how_cz = $request->how_cz;
        }
        else
        {
            $event->how_cz = $request->how;
        }

        if($request->title_de != null)
        {
            $event->title_de = $request->title_de;
        }
        else
        {
            $event->title_de = $request->title;
        }

        if($request->title_cz != null)
        {
            $event->title_cz = $request->title_cz;
        }
        else
        {
            $event->title_cz = $request->title;
        }

        if($request->overview_de != null)
        {
            $event->overview_de = $request->overview_de;
        }
        else
        {
            $event->overview_de = $request->overview;
        }

        if($request->overview_cz != null)
        {
            $event->overview_cz = $request->overview_cz;
        }
        else
        {
            $event->overview_cz = $request->overview;
        }

        if($request->includes_de != null)
        {
            $event->includes_de = $request->includes_de;
        }
        else
        {
            $event->includes_de = $request->includes;
        }

        if($request->includes_cz != null)
        {
            $event->includes_cz = $request->includes_cz;
        }
        else
        {
            $event->includes_cz = $request->includes;
        }

        if($request->excludes_de != null)
        {
            $event->excludes_de = $request->excludes_de;
        }
        else
        {
            $event->excludes_de = $request->excludes;
        }

        if($request->excludes_cz != null)
        {
            $event->excludes_cz = $request->excludes_cz;
        }
        else
        {
            $event->excludes_cz = $request->excludes;
        }
        
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $filename = str_replace(" ","",$filename);
        $file->move('images/events',$filename);
        $event->image = $filename;
 
        $event->save();
        
       

        foreach ($request->file('images') as $image) 
        {
            $eventimage = new EventImage();

            $eventimage->event_id = $event->id;

            $file = $image;
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/events', $filename);
            $eventimage->image = $filename;
                
            $eventimage->save();

        }
            
        $slugevent = Event::where('id',$event->id)->first();
        // $slugevent->slug = $event->title.'-'.$event->id;
        $slugevent->slug = str_replace(" ","-",$event->title).'-'.$event->id;
        $slugevent->save();

        return FacadesRedirect::route('event.events');
    }

    public function delete(Request $request)
    {
        $event = Event::findOrFail($request->id);
         foreach( $event->images as $event)
        {
            if (File::exists('images/events/'.$event->image)) 
            {
                File::delete('images/events/'.$event->image);
            }
        }
        //$event->place->delete();
        $y = $event->delete();
        if($y)
        {
            return response()->json(['err' => false , 'msg' => 'deleted done'],200);
        }
        else
        {
            return response()->json(['err' => true , 'msg' => 'pro'],200);
        }
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('admins.events.edit2', ['event'=>$event]);
    }

    public function update(Request $request,$id)
    {
        // $request->validate([
        //     'title'=>'required',
        //     'place_id'=>'required',
        //     'overview'=>'required',
        //     'includes'=>'required',
        //     'excludes'=>'required',
        //     'price' => 'required',
        //     'pricechild' => 'required',
        //     'availabilty' => 'required',
        //     'time'=>'required',
            

        //     'title_de'=>'required',
        //     'overview_de'=>'required',
        //     'includes_de'=>'required',
        //     'excludes_de'=>'required',

        //     'title_cz'=>'required',
        //     'overview_cz'=>'required',
        //     'includes_cz'=>'required',
        //     'excludes_cz'=>'required',
        // ],[
        //     'title'=>' عنوان الحدث مطلوب ',
        //     'place_id'=>' مكان الحدث مطلوب ',
        //     'title_de'=>' عنوان الحدث مطلوب ',
        //     'title_cz'=>' عنوان الحدث مطلوب ',
        //     'overview'=>' وصف الحدث مطلوب ',
        //     'overview_de'=>' وصف الحدث مطلوب ',
        //     'overview_cz'=>' وصف الحدث مطلوب ',
        //     'includes'=>' شرح الحدث مطلوب ',
        //     'includes_de'=>' شرح الحدث مطلوب ',
        //     'includes_cz'=>' شرح الحدث مطلوب ',
        //     'excludes'=>' شرح الحدث مطلوب ',
        //     'excludes_de'=>' شرح الحدث مطلوب ',
        //     'excludes_cz'=>' شرح الحدث مطلوب ',
            
        //     'time'=>' وقت الحدث مطلوب ',
        //     'availabilty'=>' تاريخ الحدث مطلوب ',
             
        //     'price' => 'سعر البالغين مطلوب',
        //     'pricechild' => 'سعر الاطفال مطلوب',
        // ]);

        $event = Event::find($id);

        $event->title = $request->title;
        $event->latitude = $request->latitude;
        $event->longitude = $request->longitude;
        
        $event->slug = str_replace(" ","-",$event->title).'-'.$event->id;
        
         $event->how = $request->how;
        $event->place_id = $request->place_id;
        $event->overview = $request->overview;
        $event->includes = $request->includes;
        $event->excludes = $request->excludes;
        //$event->availability = $request->availabilty;
        $event->time = $request->time;
        $event->price = $request->price;
        $event->price_child = $request->pricechild;
        $event->additionalprice = $request->additionalprice;
        $event->descriptiuonadditionalprice_en = $request->descriptiuonadditionalprice_en;
        $event->descriptiuonadditionalprice_cz = $request->descriptiuonadditionalprice_cz;
        $event->descriptiuonadditionalprice_de = $request->descriptiuonadditionalprice_de;
        
        if($request->how_de != null)
        {
            $event->how_de = $request->how_de;
        }
        else
        {
            $event->how_de = $request->how;
        }

        if($request->how_cz != null)
        {
            $event->how_cz = $request->how_cz;
        }
        else
        {
            $event->how_cz = $request->how;
        }

        $event->availability = '';
            if ($request->has('sat')) 
            {
                $event->availability = $event->availability . $request->sat;
            }
            if ($request->has('sun')) 
            {
                $event->availability = $event->availability .',' . $request->sun;
            }
            if ($request->has('mon')) 
            {
                $event->availability = $event->availability .','. $request->mon;
            }
            if ($request->has('tue')) 
            {
                $event->availability = $event->availability.',' . $request->tue;
            }
            if ($request->has('wed')) 
            {
                $event->availability = $event->availability.',' . $request->wed;
            }
            if ($request->has('thu')) 
            {
                $event->availability = $event->availability.',' . $request->thu;
            }
            if ($request->has('fri')) 
            {
                $event->availability = $event->availability.',' . $request->fri;
            }

        if($request->title_de != null)
        {
            $event->title_de = $request->title_de;
        }
        else
        {
            $event->title_de = $request->title;
        }

        if($request->title_cz != null)
        {
            $event->title_cz = $request->title_cz;
        }
        else
        {
            $event->title_cz = $request->title;
        }

        if($request->overview_de != null)
        {
            $event->overview_de = $request->overview_de;
        }
        else
        {
            $event->overview_de = $request->overview;
        }

        if($request->overview_cz != null)
        {
            $event->overview_cz = $request->overview_cz;
        }
        else
        {
            $event->overview_cz = $request->overview;
        }

        if($request->includes_de != null)
        {
            $event->includes_de = $request->includes_de;
        }
        else
        {
            $event->includes_de = $request->includes;
        }

        if($request->includes_cz != null)
        {
            $event->includes_cz = $request->includes_cz;
        }
        else
        {
            $event->includes_cz = $request->includes;
        }

        if($request->excludes_de != null)
        {
            $event->excludes_de = $request->excludes_de;
        }
        else
        {
            $event->excludes_de = $request->excludes;
        }

        if($request->excludes_cz != null)
        {
            $event->excludes_cz = $request->excludes_cz;
        }
        else
        {
            $event->excludes_cz = $request->excludes;
        }

        if($request->hasfile('image'))
        {
            if (File::exists('images/events/' .$event->image)) 
            {
                File::delete('images/events/'.$event->image);
            }
            $file=$request->file('image');
            $filename=$file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/blogs',$filename);
            $event->image=$filename ;
        }
        $event->save();

        if($request->file('images'))
            {
                $eventimage = EventImage::where('event_id', $event->id)->get();

                foreach($eventimage as $image)
                {
                    $image->delete();
                    if (File::exists('images/events/' .$image->image)) 
                    {
                        File::delete('images/events/'.$image->image);
                    }
                }

                foreach ($request->file('images') as $image) 
                {

                    $eventimage = new EventImage();

                    $eventimage->event_id = $event->id;

                    $file = $image;
                    $filename = $file->getClientOriginalName();
                    $filename = str_replace(" ","",$filename);
                    $file->move('images/events', $filename);
                    $eventimage->image = $filename;
                    
                    $eventimage->save();
                }
            }

        return FacadesRedirect::route('event.events');
    }

    public function editimage()
    {
        return view('admins.events.editimages');
    }

    public function getimagesvue($id)
    {
        $event = Event::findorfail($id);
        $eventimages =  $event->images()->orderBy('indexx','ASC')->get();
        foreach($eventimages as $a)
        {
            $a->image = url('images/events/'.$a->image);
        }
        return response()->json(['eventimages' => $eventimages], 200);
    }

    public function deleteimage(Request $request)
    {
        $eventimages = EventImage::findorfail($request->id);
       
        $eventimages->delete();
         
        return response()->json(['err' => false, 'msg' => 'تم الحذف بنجاح'], 200);
    }

    public function updateimage(Request $request)
    {
        $image = new  EventImage();
        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/events/', $filename);
            $image->image = $filename;
        }
        $image->indexx = $request->indexx;
        $image->event_id = $request->id;
        $image->save();
        return response()->json(['err' => false, 'msg' => 'تم الحفظ بنجاح'], 200);
    }
}
