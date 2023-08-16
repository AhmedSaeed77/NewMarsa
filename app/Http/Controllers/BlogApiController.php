<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;

class BlogApiController extends Controller
{
    public function all()
    {
        try
        {
            $rev = Blog::all();
            foreach($rev as $re)
            {
                $re->image = url('images/blogs/'.$re->image);
                $re->images =$re->images()->orderBy('indexx','ASC')->get();
                foreach($re->images as $r)
                {
                    $r->images = url('images/blogs/'.$r->image); 
                }
            }  
            return $rev;
        }
        catch(\Exception  $e)
        {
            return response()->json($e->getMessage(), 404);
        }
    }

    public function show($id)
    {
        try
        {
            //$rev = Blog::findOrFail($id);
            $rev = Blog::where('slug',$id)->orWhere('id',$id)->first();
            $rev->image = url('images/blogs/'.$rev->image);
            $rev->images =$rev->images()->orderBy('indexx','ASC')->get();
            foreach($rev->images as $r)
            {
                $r->images = url('images/blogs/'.$r->image); 
            }
            $rev->comment = count($rev->comments);
            return $rev;
        }
        catch(\Exception  $e)
        {
            return response()->json($e->getMessage(), 404);
        }
    }
    
    public function comments($blog_id)
    {
        try
        {
            $blog = Blog::where('slug',$blog_id)->orWhere('id',$blog_id)->first();
            $rev = Comment::where('blog_id',$blog->id)->get();
            foreach($rev as $r)
            {
                $user = User::where('id',$r->user_id)->first();
                if($user->image == null)
                {
                    $user->image=url('images/users/comment.jpeg');
                }
                else
                {
                    $user->image=url('images/users/'.$user->image);
                }
                $r->user = $user; 
            }
            
            
            if (count($rev)>0) 
            {
                return $rev;
            }
            else
            {
                return 'no comments yet';
            }
        }
        catch(\Exception  $e)
        {
            return response()->json($e->getMessage(), 404);
        }
    }
    
    public function replies($comment_id)
    {
        try{
            $rev = Reply::where('comment_id',$comment_id)->get();
            if (count($rev)>0) {
                return $rev;
            }
            else{
                return 'no replies yet';
            }
        }
        catch(\Exception  $e){
            return response()->json($e->getMessage(), 404);
        }
    }
    public function storeComment(Request $request)
    {

        try{
            $user = $request->user();
            $request->validate([
                'title'=>'required',
                'content'=>'required',
                'blog_id'=>'required',
                
            ],[
                'title'=>'title is required',
                'content'=>'content is required',
                'blog_id'=>'blog_id is required',
                
            ]);
            $rev=new Comment();
            $rev->title=$request->title;
            $rev->content=$request->content;
            $rev->blog_id=$request->blog_id;
            $rev->user_id=$user->id;
            $rev->save();
            return response()->json('added successfully',200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(),404);
        }
    }
    public function storeReply(Request $request)
    {
        $user = $request->user();
        try{
            $request->validate([
                'title'=>'required',
                'content'=>'required',
                'comment_id'=>'required',
                
            ],[
                'title'=>'title is required',
                'content'=>'content is required',
                'comment_id'=>'comment_id is required',
                
            ]);
            $rev=new Reply();
            $rev->title=$request->title;
            $rev->content=$request->content;
            $rev->comment_id=$request->comment_id;
            $rev->user_id=$user->id;
            $rev->save();
            return response()->json('added successfully',200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(),404);
        }
    }
    
    
    public function archive()
    {
        try
        {
            $result = [];
            $currentYear = (int) \Carbon\Carbon::now()->year;
            $currentMonth = (int) \Carbon\Carbon::now()->month;
            $months = [
                        'year' => 0,
                        'January' => 0,
                        'February' => 0,
                        'March' => 0,
                        'April' => 0,
                        'May' => 0,
                        'June' => 0,
                        'July' => 0,
                        'August' => 0,
                        'September' => 0,
                        'October' => 0,
                        'November' => 0,
                        'December' => 0,
                    ];
            for($i=2022;$i<=$currentYear;$i++)
            {
                $blog1 = Blog::whereYear('created_at', $i)->whereMonth('created_at', 1)->count();
                $blog2 = Blog::whereYear('created_at', $i)->whereMonth('created_at', 2)->count();
                $blog3 = Blog::whereYear('created_at', $i)->whereMonth('created_at', 3)->count();
                $blog4 = Blog::whereYear('created_at', $i)->whereMonth('created_at', 4)->count();
                $blog5 = Blog::whereYear('created_at', $i)->whereMonth('created_at', 5)->count();
                $blog6 = Blog::whereYear('created_at', $i)->whereMonth('created_at', 6)->count();
                $blog7 = Blog::whereYear('created_at', $i)->whereMonth('created_at', 7)->count();
                $blog8 = Blog::whereYear('created_at', $i)->whereMonth('created_at', 8)->count();
                $blog9 = Blog::whereYear('created_at', $i)->whereMonth('created_at', 9)->count();
                $blog10 = Blog::whereYear('created_at', $i)->whereMonth('created_at', 10)->count();
                $blog11 = Blog::whereYear('created_at', $i)->whereMonth('created_at', 11)->count();
                $blog12 = Blog::whereYear('created_at', $i)->whereMonth('created_at', 12)->count();
                
                $months['year'] = $i;
                $months['January'] = $blog1;
                $months['February'] = $blog2;
                $months['March'] = $blog3;
                $months['April'] = $blog4;
                $months['May'] = $blog5;
                $months['June'] = $blog6;
                $months['July'] = $blog7;
                $months['August'] = $blog8;
                $months['September'] = $blog9;
                $months['October'] = $blog10;
                $months['November'] = $blog11;
                $months['December'] = $blog12;
                
                array_push($result,$months);
            }
            return $result;
        }
        catch(\Exception $e)
        {
            return response()->json("blog not found", 404);
        }
    }
    
    public function filterblog($year,$month)
    {
        try
        {
            $blogs = Blog::whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
            foreach($blogs as $blog)
            {
                $blog->image = url('images/blogs/'.$blog->image); 
            }
            return $blogs;
        }
        catch(\Exception $e)
        {
            return response()->json("blog not found", 404);
        }
        
    }
    
}
