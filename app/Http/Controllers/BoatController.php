<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Redirect;
use Auth;
use App\Models\Boat;
use App\Models\BoatImage;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class BoatController extends Controller
{
    public function show($id)
    {
        $boat = Boat::find($id);
        return view('admins.boats.show', ['boat'=>$boat]);
    }

    public function index(Request $request)
    {
        $boats = Boat::all();
        return view('admins.boats.boat',['boats'=>$boats]);
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Boat::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit =  route('boat.editboat',$row->id) ;
                    $show =  route('boat.showboat', $row->id);
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
        return view('admins.boats.create');
    }

    public function store(Request $request)
    {
        
        // $request->validate([
        //     'name_en'=>'required',
        //     'name_de'=>'required',
        //     'name_cz'=>'required',
        //     'overview_en'=>'required',
        //     'overview_de'=>'required',
        //     'overview_cz'=>'required',
        //     'image'=>'required',
        //     'images'=>'required',

        // ]);
       
        $boat= new Boat();
        $boat->name_en = $request->name_en;
        
        $boat->overview_en = $request->overview_en;

        if($request->name_de != null)
        {
            $boat->name_de = $request->name_de;
        }
        else
        {
            $boat->name_de = $request->name_en;
        }
        if($request->name_cz != null)
        {
            $boat->name_cz = $request->name_cz;
        }
        else
        {
            $boat->name_cz = $request->name_en;
        }

        if($request->overview_de != null)
        {
            $boat->overview_de = $request->overview_de;
        }
        else
        {
            $boat->overview_de = $request->overview_en;
        }
        if($request->overview_cz != null)
        {
            $boat->overview_cz = $request->overview_cz;
        }
        else
        {
            $boat->overview_cz = $request->overview_en;
        }
        
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $filename = str_replace(" ","",$filename);
        $file->move('images/boats',$filename);
        $boat->image = $filename;
 
        $boat->save();

        
        foreach ($request->file('images') as $image) 
        {
            $boatimage = new BoatImage();
            $boatimage->boat_id = $boat->id;
            $file = $image;
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/boats', $filename);
            $boatimage->image = $filename;
            $boatimage->save();

        }
        
        $slugboat = Boat::where('id',$boat->id)->first();
        $slugboat->slug = str_replace(" ","-",$slugboat->name_en).'-'.$slugboat->id;
        $slugboat->save();
 
        return FacadesRedirect::route('boat.boats');
    }

    public function delete(Request $request)
    {
        $boat = Boat::findOrFail($request->id);
        
        if (File::exists('images/boats/' .$boat->image)) 
        {
            File::delete('images/boats/'.$boat->image);
        }
        $y = $boat->delete();

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
        $boat = Boat::find($id);
        return view('admins.boats.edit', ['boat'=>$boat]);
    }

    public function update(Request $request,$id)
    {
        // $request->validate([
        //     'name_en'=>'required',
        //     'name_de'=>'required',
        //     'name_cz'=>'required',
        //     'overview_en'=>'required',
        //     'overview_de'=>'required',
        //     'overview_cz'=>'required',
        //     //'image'=>'required',
        // ]);

        $boat = Boat::find($id);

        $boat->name_en = $request->name_en;
        $boat->slug = str_replace(" ","-",$boat->name_en).'-'.$boat->id;;
        $boat->overview_en = $request->overview_en;

        if($request->name_de != null)
        {
            $boat->name_de = $request->name_de;
        }
        else
        {
            $boat->name_de = $request->name_en;
        }
        if($request->name_cz != null)
        {
            $boat->name_cz = $request->name_cz;
        }
        else
        {
            $boat->name_cz = $request->name_en;
        }

        if($request->overview_de != null)
        {
            $boat->overview_de = $request->overview_de;
        }
        else
        {
            $boat->overview_de = $request->overview_en;
        }
        if($request->overview_cz != null)
        {
            $boat->overview_cz = $request->overview_cz;
        }
        else
        {
            $boat->overview_cz = $request->overview_en;
        }
        
        if($request->file('image'))
        {
            if (File::exists('images/boats/' .$boat->image)) 
            {
                File::delete('images/boats/'.$boat->image);
            }
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/boats', $filename);
            $boat->image = $filename; 
        }

        
        $boat->save();

        if($request->file('images'))
            {
                $boatimage = BoatImage::where('boat_id', $boat->id)->get();

                foreach($boatimage as $image)
                {
                    $image->delete();
                    if (File::exists('images/boats/' .$image->image)) 
                    {
                        File::delete('images/boats/'.$image->image);
                    }
                    //$image->delete();
                }

                foreach ($request->file('images') as $image) 
                {

                    $boatimage = new BoatImage();

                    $boatimage->boat_id = $boat->id;

                    $file = $image;
                    $filename = $file->getClientOriginalName();
                    $filename = str_replace(" ","",$filename);
                    $file->move('images/boats', $filename);
                    $boatimage->image = $filename;
                    
                    $boatimage->save();
                }
            }
        return FacadesRedirect::route('boat.boats');
    }

    public function editimage()
    {
        return view('admins.boats.editimages');
    }

    public function getimagesvue($id)
    {
        $boat = Boat::findorfail($id);
        $boatimages =  $boat->images()->orderBy('indexx','ASC')->get();
        foreach($boatimages as $a)
        {
            $a->image = url('images/boats/'.$a->image);
        }
        return response()->json(['boatimages' => $boatimages], 200);
    }

    public function deleteimage(Request $request)
    {
        $liveboard = BoatImage::findorfail($request->id);
       
        $liveboard->delete();
         
        return response()->json(['err' => false, 'msg' => 'تم الحذف بنجاح'], 200);
    }

    public function updateimage(Request $request)
    {
        $image = new  BoatImage();
        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/boats/', $filename);
            $image->image = $filename;
        }
        $image->indexx = $request->indexx;
        $image->boat_id = $request->id;
        $image->save();
        return response()->json(['err' => false, 'msg' => 'تم الحفظ بنجاح'], 200);
    }
}
