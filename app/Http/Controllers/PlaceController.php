<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PlaceController extends Controller
{
    public function index()
    {
        $place = Place::all();
        return view('admin.Place.index',['place'=>$place]);
    }
    public function placedetails($id)
    {
        $place = Place::find($id);
        return view('admin.Place.placedetails',['place'=>$place]);
    }

    
    public function create()
    {
        return view('admin.Place.create');
    }
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'name' => 'required',
                    'location' => 'required',
                    'image' => 'required',
                    'overview' => 'required',
                    'coverimage' => 'required',
                    // 'overview_de' => 'required',
                    // 'overview_cz' => 'required',
                    // 'shortoverview' => 'required',
                    // 'shortoverview_de' => 'required',
                    // 'shortoverview_cz' => 'required',
                ]
            );

            $place = new Place();

            $place->name = $request->name;
            
            $place->overview = $request->overview;
            $place->shortoverview = $request->shortoverview;
            $place->location = $request->location;
            $location=explode('"',$request->location);

            $place->location = $location[0];
            if ($request->has('image')) 
            {
                $file = $request->file('image');

                $filename = $file->getClientOriginalName();
                $filename = str_replace(" ","",$filename);
                $file->move('images/places', $filename);
                $place->image = $filename;
            }
            
            if ($request->has('coverimage')) 
            {
                $file = $request->file('coverimage');

                $filename = $file->getClientOriginalName();
                $filename = str_replace(" ","",$filename);
                $file->move('images/places/cover', $filename);
                $place->coverimage = $filename;
            }
            
            if ($request->overview_de != null) 
            {
                $place->overview_de = $request->overview_de;
            }
            else
            {
                $place->overview_de=$request->overview;
            }
            if ($request->overview_cz != null) 
            {
                $place->overview_cz = $request->overview_cz;
            }
            else
            {
                $place->overview_cz=$request->overview;
            }
            if ($request->shortoverview_de != null) 
            {
                $place->shortoverview_de = $request->shortoverview_de;
            }
            else
            {
                $place->shortoverview_de=$request->shortoverview;
            }
            if ($request->shortoverview_cz != null) 
            {
                $place->shortoverview_cz = $request->shortoverview_cz;
            }
            else
            {
                $place->shortoverview_cz=$request->shortoverview;
            }
            
        
            $place->save();
            
            
            $slugplace = Place::where('id',$place->id)->first();
            $slugplace->slug = str_replace(" ","-",$slugplace->name).'-'.$slugplace->id;
            $slugplace->save();
            
            return redirect()->route('place.index');
        } 
        catch (\Exception $e)
        {
            return response()->json(['err' => true, 'msg' => $e->getMessage()], 404);
        }
    }
 
    public function edit($id)
    {
        $place = Place::find($id);
        return view('admin.Place.edit', ['place' => $place]);
    }
    public function update(Request $request)
    {
        try {
            $request->validate(
                [
                    'name' => 'required',
                    'location' => 'required',
                    //'image' => 'required',
                    'overview' => 'required',
                    'overview_de' => 'required',
                    'overview_cz' => 'required',
                    'shortoverview' => 'required',
                    'shortoverview_de' => 'required',
                    'shortoverview_cz' => 'required',
                ]

            );
            $place = Place::findOrFail($request->id);
            $place->name = $request->name;
            $place->slug = str_replace(" ","-",$place->name).'-'.$place->id;

            $place->location = $request->location;

            if ($request->has('image')) {
                $file = $request->file('image');

                $filename = $file->getClientOriginalName();
                $filename = str_replace(" ","",$filename);
                $file->move('images/places', $filename);
                $place->image = $filename;
            }
            
            if ($request->has('coverimage')) 
            {
                // if (File::exists('images/places/cover/'.$place->coverimage)) 
                // {
                //     File::delete('images/places/cover/'.$place->coverimage);
                // }
                $file = $request->file('coverimage');
                $filename = $file->getClientOriginalName();
                $filename = str_replace(" ","",$filename);
                $file->move('images/places/cover/', $filename);
                $place->coverimage = $filename;
            }

            $place->overview = $request->overview;
            $place->overview_de = $request->overview_de;
            $place->overview_cz = $request->overview_cz;
            $place->shortoverview = $request->shortoverview;
            $place->shortoverview_de = $request->shortoverview_de;
            $place->shortoverview_cz = $request->shortoverview_cz;

            $place->save();
            return redirect()->route('place.index');
        } catch (\Exception $e) {
            return response()->json(['err' => true, 'msg' => $e->getMessage()], 404);
        }
    }
    
    public function delete(Request $request)
    {
        
        $p = Place::findOrFail($request->id);
        $y = $p->delete();
        if ($y) 
        {
            return response()->json($p);
        } 
        else 
        {
            return response()->json(['err' => true, 'msg' => 'pro'], 404);
        }
    }
}
