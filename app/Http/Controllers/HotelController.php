<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HotelController extends Controller
{
    public function index()
    {
        $hotel=Hotel::all();
        return view('admin.hotel.index',['hotel'=>$hotel]);
    }
    public function allapi()
    {
        // $hotel=Hotel::all();
        $hotel = Hotel::select('*')->orderBy('indexx','ASC')->get();
        return $hotel;
    }
    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Hotel::select('*')->orderBy('indexx','ASC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit =  route('hotel.edit', $row->id);
                
                    $actionBtn = '<a href=" ' . $edit . '" class="edit btn btn-success btn-sm m-1">Edit</a>';
                    // $actionBtn = '<a href=" ' . $edit . '" class="edit "><i class="fa-sharp fa-solid fa-circle-check"></i></a>';
                    $actionBtn .= '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    // $actionBtn .= '<a href="javascript:void(0)" value="' . $row->id . '" "><i class="fa-sharp fa-solid fa-trash"></i></a>';
            
                    return $actionBtn;
                })
                ->addColumn('zone', function ($row) {
                    $name = $row->zone->name;
                        return $name;
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
                ->rawColumns(['action','zone'])
                ->make(true);
        }
    }
    

    public function create()
    {
        return view('admin.hotel.create');
    }
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'indexx'=> 'required',
                    'name'=> 'required',
                    'zone_id'=> 'required',
                ]
            );
            $hotel = new Hotel();
            $hotel->name = $request->name;
            $hotel->zone_id = $request->zone_id;
            $hotel->indexx = $request->indexx;
           
            $hotel->save();
            
            $slughotel = Hotel::where('id',$hotel->id)->first();
            $slughotel->slug = str_replace(" ","-",$slughotel->name).'-'.$slughotel->id;
            $slughotel->save();
        
            return redirect()->route('hotel.index');
        } catch (\Exception $e) {
            return response()->json(['err' => true, 'msg' => $e->getMessage()], 404);
        }
    }


    public function show($id)
    {
        $hotel = Hotel::find($id);
        return view('admin.hotel.show', ['hotel' => $hotel]);
    }
    public function edit($id)
    {
        $hotel = Hotel::find($id);
        return view('admin.hotel.edit', ['hotel' => $hotel]);
    }
    public function update(Request $request)
    {
        try {
            $request->validate(
                [
                    'indexx'=> 'required',
                    'name'=> 'required',
                    'zone_id'=> 'required',
                ]
            );
            $hotel = Hotel::findOrFail($request->id);
            $hotel->name = $request->name;
            $hotel->slug = str_replace(" ","-",$hotel->name).'-'.$hotel->id;
            $hotel->zone_id = $request->zone_id;
            $hotel->indexx = $request->indexx;
           
            $hotel->save();
            return redirect()->route('hotel.index');
        } catch (\Exception $e) {
            return response()->json(['err' => true, 'msg' => $e->getMessage()], 404);
        }
    }
    public function destroy(Request $request)
    {
        $p = Hotel::findOrFail($request->id);
        $y = $p->delete();
        if ($y) {
            return response()->json(['err' => false, 'msg' => 'deleted done'], 200);
        } else {
            return response()->json(['err' => true, 'msg' => 'pro'], 200);
        }
    }
}
