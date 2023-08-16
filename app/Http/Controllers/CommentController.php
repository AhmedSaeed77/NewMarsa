<?php

namespace App\Http\Controllers;
use DataTables;
use Redirect;
use Auth;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        // foreach($comments as $comment)
        // {
        //     $blog = Blog::where('id',$comment->blog_id)->first();
        //     $comment->blog = $blog;
        // }
        // dd($comments);
        
        return view('admins.comments.comment', ['comments'=>$comments]);
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Comment::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('blog_id', function ($row) {
                    $name =  $row->blog->id ?? 'تم حذفه';
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

        // $test =    Comment::destroy($request->id);

        // dd($test);
        $comment = Comment::findOrFail($request->id);
        $comment->replies()->delete();

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
        $comment =  Comment::find($id);
        
        return view('admins.comments.edit', ['comment'=>$comment]);
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

        $comment = Comment::find($id);
        $comment->title = $request->title;
        $comment->content = $request->content;
        
        $comment->save();
        
        return FacadesRedirect::route('comment.comments');
    }
}
