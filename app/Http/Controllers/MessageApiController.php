<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageApiController extends Controller
{
    public function store(Request $request)
    {
        try
        {
            $request->validate([
                'name'=>'required',
                'email'=>'required',
                'subject'=>'required',
                'message'=>'required',
            ],[
                'name'=>'name is required',
                'email'=>'email is required',
                'subject'=>'subject is required',
                'message'=>'message is required',
            ]);

            $msg=new Message();

            $msg->name=$request->name;
            $msg->email=$request->email;
            $msg->subject=$request->subject;
            $msg->message=$request->message;
            
            $msg->save();
            return response()->json('added successfully',200);
        }
        catch(\Exception $e)
        {
            return response()->json($e->getMessage(),404);
        }
    }

    public function all()
    {
        try
        {
            $msg = Message::all();
            return $msg;
        }
        catch(\Exception  $e)
        {
            return response()->json("Review not found", 404);
        }
    }
    
}
