<?php

namespace App\Http\Controllers;

use App\Models\LiveBoard;
use App\Models\Activity;
use App\Models\Reviews;
use App\Models\TransportReview;
use Illuminate\Http\Request;

class ReviewsApiController extends Controller
{
    public function addActivity(Request $request,$id)
    {
        $user = $request->user();
        try{
            $request->validate([
                'review'=>'required',
                'rating'=>'required',
                
            ],[
                'review'=>'review is required',
                'rating'=>'rating is required',
              
            ]);

            $rev=new Reviews();
            $rev->review=$request->review;
            $rev->type='activity';
            $rev->activity_id=$id;
            if ($request->rating>=5) 
            {
                $rev->rating=5;
            }
            else if($request->rating>=1 and $request->rating<=5 )
            {
                $rev->rating=$request->rating;
            }
            else
            {
                $rev->rating=1;
            }
            $rev->user_id=$user->id;
            $rev->save();
            return response()->json('added successfully',200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(),404);
        }
       
    }
    public function addEvent(Request $request,$id)
    {
        $user = $request->user();
        try{
            $request->validate([
                'review'=>'required',
                'rating'=>'required',
                
            ],[
                'review'=>'review is required',
                'rating'=>'rating is required',
              
            ]);

            $rev=new Reviews();
            $rev->type='event';
            $rev->activity_id=$id;
            $rev->review=$request->review;

            if ($request->rating>=5) 
            {
                $rev->rating=5;
            }
            else if($request->rating>=1 and $request->rating<=5 )
            {
                $rev->rating=$request->rating;
            }
            else
            {
                $rev->rating=1;
            }
            $rev->user_id=$user->id;
            $rev->save();
            return response()->json('added successfully',200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(),404);
        }
       
    }
    public function addTransport(Request $request)
    {
        $user = $request->user();
        try{
            $request->validate([
                'review'=>'required',
                'rating'=>'required',
                
            ],[
                'review'=>'review is required',
                'rating'=>'rating is required',
              
            ]);

            $rev=new TransportReview();
            
         
            $rev->review=$request->review;

            if ($request->rating>=5) 
            {
                $rev->rating=5;
            }
            else if($request->rating>=1 and $request->rating<=5 )
            {
                $rev->rating=$request->rating;
            }
            else
            {
                $rev->rating=1;
            }
            $rev->user_id=$user->id;
            $rev->save();
            return response()->json('added successfully',200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(),404);
        }
       
    }
    public function addPackage(Request $request,$id)
    {
        $user = $request->user();
        try{
            $request->validate([
                'review'=>'required',
                'rating'=>'required',
                
            ],[
                'review'=>'review is required',
                'rating'=>'rating is required',
              
            ]);

            $rev=new Reviews();
            $rev->review=$request->review;
            $rev->type='package';
            $rev->activity_id=$id;
            if ($request->rating>=5) 
            {
                $rev->rating=5;
            }
            else if($request->rating>=1 and $request->rating<=5 )
            {
                $rev->rating=$request->rating;
            }
            else
            {
                $rev->rating=1;
            }
            $rev->user_id=$user->id;
            $rev->save();
            return response()->json('added successfully',200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(),404);
        }
       
    }
    public function addLiveboard(Request $request,$id)
    {
        $user = $request->user();
        try{
            $request->validate([
                'review'=>'required',
                'rating'=>'required',
                
            ],[
                'review'=>'review is required',
                'rating'=>'rating is required',
            ]);

            $rev=new Reviews();
            $rev->review=$request->review;
            $rev->type='liveboard';
            $rev->activity_id=$id;
            if ($request->rating>=5) 
            {
                $rev->rating=5;
            }
            else if($request->rating>=1 and $request->rating<=5 )
            {
                $rev->rating=$request->rating;
            }
            else
            {
                $rev->rating=1;
            }
            $rev->user_id=$user->id;
            $rev->save();
            return response()->json('added successfully',200);
        }
        catch(\Exception $e){
            return response()->json($e->getMessage(),404);
        }
       
    }
    public function show($id)
    {
        try
        {
            $rev = Reviews::findOrFail($id);
            //dd($rev);
            $rev->user_id = $rev->user->fname.' '.$rev->user->lname;
            $rev->image = url('images/users/'.$rev->user->image);
            return $rev;
        }
        catch(\Exception  $e)
        {
            return response()->json("Review not found", 404);
        }
    }
    
    public function all()
    {
        try
        {
            $rev = Reviews::all();
            foreach($rev as $re)
            {
                $re->user_id = $re->user->fname;
                $re->image = url('images/users/'.$re->user->image);
                //$re->image = $re->user->image;
            }
            return $rev;
        }
        catch(\Exception  $e){
            return response()->json("Review not found", 404);
        }
    }
    public function allActivityReview($id)
    {
        try
        {
            $activity = Activity::where('slug',$id)->orWhere('id',$id)->first();
            $rev = Reviews::where('type','activity')->where('activity_id',$activity->id)->get();
            foreach($rev as $re)
            {
                $re->user_id = $re->user->fname.' '.$re->user->lname;
                if($re->user->image )
                {
                    $re->image = url('images/users/'.$re->user->image);
                }
                else
                {
                    $re->image = url('images/logo.png');
                }
                //$re->image = url('images/users/'.$re->user->image);
                //$re->image = $re->user->image;
            }
            return $rev;
        }
        catch(\Exception  $e)
        {
            return response()->json("Review not found", 404);
        }
    }
    public function allTransportReview()
    {
        try
        {
            $rev = TransportReview::all();
            foreach($rev as $re)
            {
                $re->user_id = $re->user->fname.$re->user->lname;
                $re->image = url('images/users/'.$re->user->image);
                //$re->image = $re->user->image;
            }
            return $rev;
        }
        catch(\Exception  $e){
            return response()->json($e->getMessage(), 404);
        }
    }
    public function allEventReview($id)
    {
        try
        {
            $rev = Reviews::where('type','event')->where('activity_id',$id)->get();
            foreach($rev as $re)
            {
                $re->user_id = $re->user->fname.$re->user->lname;
                $re->image = url('images/users/'.$re->user->image);
                //$re->image = $re->user->image;
            }
            return $rev;
        }
        catch(\Exception  $e){
            return response()->json("Review not found", 404);
        }
    }
    public function allPackageReview($id)
    {
        try
        {
            $rev = Reviews::where('type','package')->where('activity_id',$id)->get();
            foreach($rev as $re)
            {
                $re->user_id = $re->user->fname.$re->user->lname;
                $re->image = url('images/users/'.$re->user->image);
                //$re->image = $re->user->image;
            }
            return $rev;
        }
        catch(\Exception  $e){
            return response()->json("Review not found", 404);
        }
    }
    public function allLiveboardReview($id)
    {
        try
        {
            $liv = LiveBoard::where('slug',$id)->orWhere('id',$id)->first();
            //return $liv; 
            $rev = Reviews::where('type','liveboard')->where('activity_id',$liv->id)->get();
            foreach($rev as $re)
            {
                $re->user_id = $re->user->fname.' '.$re->user->lname;
                if($re->user->image)
                {
                    $re->image = url('images/users/'.$re->user->image);
                }
                else
                {
                    $re->image = url('images/logo.png');
                }
                
                //$re->image = $re->user->image;
            }
            return $rev;
        }
        catch(\Exception  $e){
            return response()->json("Review not found", 404);
        }
    }
}
