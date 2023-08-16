<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DataTables;
use Redirect;
use Auth;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class UserControllerByAdmin extends Controller
{
    public function index(Request $request)
    {
        //$comments = Comment::all();
        return view('admins.users.user');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit =  route('user.edituser',$row->id) ;
                    $actionBtn = '<a href=" ' . $edit . '" class="edit btn btn-success btn-sm m-1">Edit</a>';
                    $actionBtn .= '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
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

        // $test =    Comment::destroy($request->id);

        // dd($test);
        $user = User::findOrFail($request->id);
        $y = $user->delete();
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
        $user = User::find($id);
        return view('admins.users.editprofile', ['user'=>$user]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'phone'=>'required',
            'email'=>'required',
          ],[
             'fname'=>' الاسم الاول مطلوب ',
             'lname'=>'الاسم الثانى مطلوب',
             'phone'=>' هاتف المستخدم مطلوب ',
             'email'=>'أيميل المستخدم مطلوب',  
          ]);

        $user = User::find($id);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        $user->email = $request->email;

        if ($request->has('image')) 
        {
            $file = $request->file('image');

            $filename = $file->getClientOriginalName();
            $file->move('images/users', $filename);
            $user->image = $filename;
        }

        $user->save();
        
        return FacadesRedirect::route('user.users');
    }
}
