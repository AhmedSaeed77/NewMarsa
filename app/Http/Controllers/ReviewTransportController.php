<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Redirect;
use Auth;
use App\Models\TransportReview;
use App\Models\PackageActivity;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class ReviewTransportController extends Controller
{
    public function index(Request $request)
    {
        
        return view('admins.reviewstransport.reviews');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = TransportReview::select('*');
            return Datatables::of($data)
                ->addIndexColumn() 
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('user', function ($row) {
                    // $name = User::where('id',$row->user_id)->first()->fname . ' ' .User::where('id',$row->user_id)->first()->lname;
                    $name = User::where('id',$row->user_id)->first()->fname;
                        return $name;
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
                ->rawColumns(['action','user'])
                ->make(true);
        }
    }

    public function delete(Request $request)
    {
        $review = TransportReview::findOrFail($request->id);
        $y = $review->delete();
        if($y)
        {
            return response()->json(['err' => false , 'msg' => 'deleted done'],200);
        }
        else
        {
            return response()->json(['err' => true , 'msg' => 'pro'],200);
        }
    }
}
