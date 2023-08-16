<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Redirect;
//use Auth;

use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class ReplyCommentController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::all();
        $comments = Comment::all();
        $replys = Reply::all();
       
        return view('admins.replies.reply',['blogs'=>$blogs,'comments'=>$comments,'replys'=>$replys]);
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Reply::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('comment_id', function ($row) {
                    $name =  $row->comment->id ?? 'تم حذفه';
                    return $name;
                })
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
        $comment = Reply::findOrFail($request->id);

        $y = $comment->delete();
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
        $reply =  Reply::find($id);
        return view('admins.replies.edit', ['reply'=>$reply]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
          ],[
             'title'=>' عنوان المقال مطلوب ',
             'content'=>'محتوى المقال مطلوب', 
          ]);

        $reply = Reply::find($id);
        $reply->title = $request->title;
        $reply->content = $request->content;
        
        $reply->save();
        return FacadesRedirect::route('reply.replies');
    }

    public function add(Request $request,$id)
    {
        $reply = new Reply();

        $reply->content = $request->reply;
        $reply->comment_id = $id;
        $reply->user_id = Auth::guard('admin')->user()->id;
        $reply->isAdmin = 'true';
        $reply->save();
        return FacadesRedirect::route('reply.replies');
    }
}
