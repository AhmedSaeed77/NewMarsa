<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;
use DataTables;
class MessageController extends Controller
{
    public function show()
    {
        $messages = Message::latest()->get();
        return view ('admins.messages.message',['messages'=>$messages]);
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Message::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
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

    public function delete(Request $request)
    {
        $message = Message::findOrFail($request->id);

        $y = $message->delete();
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
