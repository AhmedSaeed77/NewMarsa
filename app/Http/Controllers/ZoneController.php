<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ZoneController extends Controller
{
    
    public function index()
    {
        return view('admin.zone.index');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Zone::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit =  route('zone.edit', $row->id);
                    $show =  route('zone.show', $row->id);
                    $actionBtn = '<a href=" ' . $edit . '" class="edit btn btn-success btn-sm m-1">Edit</a>';
                    $actionBtn .= '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    $actionBtn .= '<a href=" ' . $show . '" class="edit btn btn-dark btn-sm m-1">Show</a>';
                    return $actionBtn;
                })
                ->filter(
                    function ($instance) use ($request) {
                        if (request()->has('name')) {
                            $instance->where(function ($w) use ($request) {
                                $name = $request->get('name');
                                $w->orWhere('title', 'LIKE', "%$name%");
                            });
                        }
                    },
                    true
                )
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function create()
    {
        return view('admin.zone.create');
    }
    public function store(Request $request)
    {
        //dd($request);
        try {
            $request->validate(
                [
                    
                    'name'=> 'required',
                    'marsa_hs'=> 'required',
                    'hurgada_hs'=> 'required',
                    'marsa_limo'=> 'required',
                    'hurgada_limo'=> 'required',
                    'added_hs_per_person'=> 'required',
                    'marsa_hs_child'=> 'required',
                    'hurgada_hs_child'=> 'required',
                    'marsa_limo_child'=> 'required',
                    'hurgada_limo_child'=> 'required',
                    'added_hs_per_child'=> 'required',
                    'longitude' =>  'required',
                    'latitude' =>  'required',
                ]

            );
            $zone = new Zone();
            $zone->name = $request->name;
            $zone->marsa_hs = $request->marsa_hs;
            $zone->hurgada_hs = $request->hurgada_hs;
            $zone->marsa_limo = $request->marsa_limo;
            $zone->hurgada_limo = $request->hurgada_limo;
            $zone->marsa_hs_child = $request->marsa_hs_child;
            $zone->hurgada_hs_child = $request->hurgada_hs_child;
            $zone->marsa_limo_child = $request->marsa_limo_child;
            $zone->hurgada_limo_child = $request->hurgada_limo_child;
            $zone->added_hs_per_child = $request->added_hs_per_child;
            $zone->added_hs_per_person = $request->added_hs_per_person;
            $zone->added_hs_per_person = $request->added_hs_per_person;
            $zone->longitude = $request->longitude;
            $zone->latitude = $request->latitude;
            $zone->save();
            return redirect()->route('zone.index');
        } catch (\Exception $e) {
            return response()->json(['err' => true, 'msg' => $e->getMessage()], 404);
        }
    }
    public function show($id)
    {
        $zone = Zone::find($id);
        return view('admin.zone.zonedetails', ['zone' => $zone]);
    }
    public function edit($id)
    {
        $zone = Zone::find($id);
        return view('admin.zone.edit', ['zone' => $zone]);
    }
    public function update(Request $request)
    {
        try {
            $request->validate(
                [
                    
                    'name'=> 'required',
                    'marsa_hs'=> 'required',
                    'hurgada_hs'=> 'required',
                    'marsa_limo'=> 'required',
                    'hurgada_limo'=> 'required',
                    'added_hs_per_person'=> 'required',
                    'marsa_hs_child'=> 'required',
                    'hurgada_hs_child'=> 'required',
                    'marsa_limo_child'=> 'required',
                    'hurgada_limo_child'=> 'required',
                    'added_hs_per_child'=> 'required',
                    'longitude' =>  'required',
                    'latitude' =>  'required',
                ]

            );
            $zone = Zone::findOrFail($request->id);
            $zone->name = $request->name;
            $zone->marsa_hs = $request->marsa_hs;
            $zone->hurgada_hs = $request->hurgada_hs;
            $zone->marsa_limo = $request->marsa_limo;
            $zone->hurgada_limo = $request->hurgada_limo;
            $zone->added_hs_per_person = $request->added_hs_per_person;
            $zone->marsa_hs_child = $request->marsa_hs_child;
            $zone->hurgada_hs_child = $request->hurgada_hs_child;
            $zone->marsa_limo_child = $request->marsa_limo_child;
            $zone->hurgada_limo_child = $request->hurgada_limo_child;
            $zone->added_hs_per_child = $request->added_hs_per_child;
            
            $zone->longitude = $request->longitude;
            $zone->latitude = $request->latitude;
   
            $zone->save();
            return redirect()->route('zone.index');
        } catch (\Exception $e) {
            return response()->json(['err' => true, 'msg' => $e->getMessage()], 404);
        }
    }
    public function destroy(Request $request)
    {
        $p = Zone::findOrFail($request->id);
        $y = $p->delete();
        if ($y) {
            return response()->json(['err' => false, 'msg' => 'deleted done'], 200);
        } else {
            return response()->json(['err' => true, 'msg' => 'pro'], 200);
        }
    }
}
