<?php

namespace App\Http\Controllers;

use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class NewsLetterController extends Controller
{
    public function index()
    {
        $activity = NewsLetter::all();
        return view('admin.newsLetter.index',['activity'=>$activity]);
    }
    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = NewsLetter::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                   
                
                    $actionBtn = '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                 
            
                    return $actionBtn;
                })
               
                ->filter(
                    function ($instance) use ($request) {
                        if (request()->has('name')) {
                            $instance->where(function ($w) use ($request) {
                                $name = $request->get('name');
                                $w->orWhere('email', 'LIKE', "%$name%");
                            });
                        }
                    },
                    true
                )
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function store(Request $request)
    {
        
        $letter = NewsLetter::where('email',$request->email)->first();
        if (!$letter) {
            $news = new NewsLetter();
            $news->email = $request->email;
            $news->save();
            return response()->json('mail added succefully',200);
        }
        else{
            return response()->json('mail Already exist',200);
        }
    }
    public function destroy(Request $request)
    {
        $p = NewsLetter::findOrFail($request->id);
        $y = $p->delete();
        if ($y) {
            return response()->json(['err' => false, 'msg' => 'deleted done'], 200);
        } else {
            return response()->json(['err' => true, 'msg' => 'pro'], 200);
        }
    }
}
