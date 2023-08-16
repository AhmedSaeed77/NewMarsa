<?php

namespace App\Http\Controllers;

use App\Models\LiveBoard;
use App\Models\LiveboardImage;
use App\Models\LivaboardPlace;
use App\Models\Cover;
use App\Models\LiveboardSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CoversController extends Controller
{
    
    
    public function create()
    {
        $cover = Cover::first();
        return view('admin.cover.create',['cover' => $cover]);
    }
    public function store(Request $request)
    {
        //dd($request);
        try {
            
            $request->validate(
                [
                    'contact_image' => 'required|file|mimetypes:image/webp|max:2048',
                    'about_image' => 'required|file|mimetypes:image/webp|max:2048',
                    'event_image' => 'required|file|mimetypes:image/webp|max:2048',
                    'singleevent_image' => 'required|file|mimetypes:image/webp|max:2048',
                    'blog_image' => 'required|file|mimetypes:image/webp|max:2048',
                    'transfer_image' => 'required|file|mimetypes:image/webp|max:2048',
                    'liveaboard_image' => 'required|file|mimetypes:image/webp|max:2048',
                    'exploredestination_image' => 'required|file|mimetypes:image/webp|max:2048',
                    'package_image' => 'required|file|mimetypes:image/webp|max:2048',
                    'contact_imageph' => 'required|file|mimetypes:image/webp|max:2048',
                    'about_imageph' => 'required|file|mimetypes:image/webp|max:2048',
                    'event_imageph' => 'required|file|mimetypes:image/webp|max:2048',
                    'singleevent_imageph' => 'required|file|mimetypes:image/webp|max:2048',
                    'blog_imageph' => 'required|file|mimetypes:image/webp|max:2048',
                    'transfer_imageph' => 'required|file|mimetypes:image/webp|max:2048',
                    'liveaboard_imageph' => 'required|file|mimetypes:image/webp|max:2048',
                    'exploredestination_imageph' => 'required|file|mimetypes:image/webp|max:2048',
                    'package_imageph' => 'required|file|mimetypes:image/webp|max:2048',
                ]

            );

            $live = Cover::find(1);
            
            if ($request->has('contact_image')) 
            {
                if (File::exists('images/covers/'.$live->contact_image)) 
                {
                    File::delete('images/covers/'.$live->contact_image);
                }
                $file = $request->file('contact_image');
                $filename = $file->getClientOriginalName();
                //filename = str_replace(" ","",$filename);
                $filename = 'contactus.webp';
                $file->move('images/covers/', $filename);
                $live->contact_image = $filename;
            }

            if ($request->has('about_image')) 
            {
                $file = $request->file('about_image');
                $filename = $file->getClientOriginalName();
                //$filename = str_replace(" ","",$filename);
                $filename = 'aboutus.webp';
                $file->move('images/covers/', $filename);
                $live->about_image = $filename;
            }
            
            if ($request->has('event_image')) 
            {
                $file = $request->file('event_image');
                $filename = $file->getClientOriginalName();
                //$filename = str_replace(" ","",$filename);
                $filename = 'events.webp';
                $file->move('images/covers/', $filename);
                $live->event_image = $filename;
            }

            if ($request->has('singleevent_image')) 
            {
                $file = $request->file('singleevent_image');
                $filename = $file->getClientOriginalName();
                //$filename = str_replace(" ","",$filename);
                $filename = 'singleEvent.webp';
                $file->move('images/covers/', $filename);
                $live->singleevent_image = $filename;
            }
            
            if ($request->has('blog_image')) 
            {
                $file = $request->file('blog_image');
                $filename = $file->getClientOriginalName();
                //$filename = str_replace(" ","",$filename);
                $filename = 'blog.webp';
                $file->move('images/covers/', $filename);
                $live->blog_image = $filename;
            }

            if ($request->has('transfer_image')) 
            {
                $file = $request->file('transfer_image');
                $filename = $file->getClientOriginalName();
                //$filename = str_replace(" ","",$filename);
                $filename = 'transfer.webp';
                $file->move('images/covers/', $filename);
                $live->transfer_image = $filename;
            }
            
            if ($request->has('liveaboard_image')) 
            {
                $file = $request->file('liveaboard_image');
                $filename = $file->getClientOriginalName();
                //$filename = str_replace(" ","",$filename);
                $filename = 'liveaboard.webp';
                $file->move('images/covers/', $filename);
                $live->liveaboard_image = $filename;
            }

            if ($request->has('exploredestination_image')) 
            {
                $file = $request->file('exploredestination_image');
                $filename = $file->getClientOriginalName();
                //$filename = str_replace(" ","",$filename);
                $filename = 'explore.webp';
                $file->move('images/covers/', $filename);
                $live->exploredestination_image = $filename;
            }
            
            if ($request->has('package_image')) 
            {
                $file = $request->file('package_image');
                $filename = $file->getClientOriginalName();
                //$filename = str_replace(" ","",$filename);
                $filename = 'city-tour.webp';
                $file->move('images/covers/', $filename);
                $live->package_image = $filename;
            }
            
            if ($request->has('contact_imageph')) 
            {
                if (File::exists('images/covers/'.$live->contact_imageph)) 
                {
                    File::delete('images/covers/'.$live->contact_imageph);
                }
                $file = $request->file('contact_imageph');
                $filename = $file->getClientOriginalName();
                // $filename = str_replace(" ","",$filename);
                $filename = 'contactus-sm.webp';
                $file->move('images/covers/', $filename);
                $live->contact_imageph = $filename;
            }

            if ($request->has('about_imageph')) 
            {
                $file = $request->file('about_imageph');
                $filename = $file->getClientOriginalName();
                // $filename = str_replace(" ","",$filename);
                $filename = 'aboutus-sm.webp';
                $file->move('images/covers/', $filename);
                $live->about_imageph = $filename;
            }
            
            if ($request->has('event_imageph')) 
            {
                $file = $request->file('event_imageph');
                $filename = $file->getClientOriginalName();
                // $filename = str_replace(" ","",$filename);
                $filename = 'events.webp';
                $file->move('images/covers/', $filename);
                $live->event_imageph = $filename;
            }

            if ($request->has('singleevent_imageph')) 
            {
                $file = $request->file('singleevent_imageph');
                $filename = $file->getClientOriginalName();
                // $filename = str_replace(" ","",$filename);
                $filename = 'singleEvent-sm.webp';
                $file->move('images/covers/', $filename);
                $live->singleevent_imageph = $filename;
            }
            
            if ($request->has('blog_imageph')) 
            {
                $file = $request->file('blog_imageph');
                $filename = $file->getClientOriginalName();
                // $filename = str_replace(" ","",$filename);
                $filename = 'blog-sm.webp';
                $file->move('images/covers/', $filename);
                $live->blog_imageph = $filename;
            }

            if ($request->has('transfer_imageph')) 
            {
                $file = $request->file('transfer_imageph');
                $filename = $file->getClientOriginalName();
                // $filename = str_replace(" ","",$filename);
                $filename = 'transfer-sm.webp';
                $file->move('images/covers/', $filename);
                $live->transfer_imageph = $filename;
            }
            
            if ($request->has('liveaboard_imageph')) 
            {
                $file = $request->file('liveaboard_imageph');
                $filename = $file->getClientOriginalName();
                // $filename = str_replace(" ","",$filename);
                $filename = 'liveaboard-sm.webp';
                $file->move('images/covers/', $filename);
                $live->liveaboard_imageph = $filename;
            }

            if ($request->has('exploredestination_imageph')) 
            {
                $file = $request->file('exploredestination_imageph');
                $filename = $file->getClientOriginalName();
                // $filename = str_replace(" ","",$filename);
                $filename = 'explore-sm.webp';
                $file->move('images/covers/', $filename);
                $live->exploredestination_imageph = $filename;
            }
            
            if ($request->has('package_imageph')) 
            {
                $file = $request->file('package_imageph');
                $filename = $file->getClientOriginalName();
                //$filename = str_replace(" ","",$filename);
                $filename = 'city-tour-sm.webp';
                $file->move('images/covers/', $filename);
                $live->package_imageph = $filename;
            }

            
            $live->save();
            return redirect()->back()->with('success','the file is added');
        } 
        catch (\Exception $e) 
        {
            return redirect()->back()->with('error','the file must be webp type');
        }
    }

    public function getAllCovers()
    {
        $cover = Cover::find(1);
        $cover->contact_image = url('images/covers/desktop/'.$cover->contact_image);
        $cover->about_image = url('images/covers/desktop/'.$cover->about_image);
        $cover->event_image = url('images/covers/desktop/'.$cover->event_image);
        $cover->singleevent_image = url('images/covers/desktop/'.$cover->singleevent_image);
        $cover->blog_image = url('images/covers/desktop/'.$cover->blog_image);
        $cover->transfer_image = url('images/covers/desktop/'.$cover->transfer_image);
        $cover->liveaboard_image = url('images/covers/desktop/'.$cover->liveaboard_image);
        $cover->exploredestination_image = url('images/covers/desktop/'.$cover->exploredestination_image);
        $cover->package_image = url('images/covers/desktop/'.$cover->package_image);
        $cover->contact_imageph = url('images/covers/phone/'.$cover->contact_imageph);
        $cover->about_imageph = url('images/covers/phone/'.$cover->about_imageph);
        $cover->event_imageph = url('images/covers/phone/'.$cover->event_imageph);
        $cover->singleevent_imageph = url('images/covers/phone/'.$cover->singleevent_imageph);
        $cover->blog_imageph = url('images/covers/phone/'.$cover->blog_imageph);
        $cover->transfer_imageph = url('images/covers/phone/'.$cover->transfer_imageph);
        $cover->liveaboard_imageph = url('images/covers/phone/'.$cover->liveaboard_imageph);
        $cover->exploredestination_imageph = url('images/covers/phone/'.$cover->exploredestination_imageph);
        $cover->package_imageph = url('images/covers/phone/'.$cover->package_imageph);
        return $cover;
    }

    public function getcontactus()
    {
        $cover = Cover::select('contact_image','contact_imageph')->where('id',1)->first();
        $cover->image = url('images/covers/desktop/'.$cover->contact_image);
        $cover->image_sm = url('images/covers/phone/'.$cover->contact_imageph);
        return $cover;
    }
    public function getaboutus()
    {
        $cover = Cover::select('about_image','about_imageph')->where('id',1)->first();
        $cover->image = url('images/covers/desktop/'.$cover->about_image);
        $cover->image_sm = url('images/covers/phone/'.$cover->about_imageph);
        return $cover;
    }
    public function getevent()
    {
        $cover = Cover::select('event_image','event_imageph','singleevent_image','singleevent_imageph')->where('id',1)->first();
        $cover->image = url('images/covers/desktop/'.$cover->event_image);
        $cover->image_sm = url('images/covers/phone/'.$cover->event_imageph);
        return $cover;
    }
    
    public function getsingleevent()
    {
        $cover = Cover::select('singleevent_image','singleevent_imageph')->where('id',1)->first();
        $cover->image = url('images/covers/desktop/'.$cover->singleevent_image);
        $cover->image_sm = url('images/covers/phone/'.$cover->singleevent_imageph);
        return $cover;
    }
    
    public function getlivaboard()
    {
        $cover = Cover::select('liveaboard_image','liveaboard_imageph')->where('id',1)->first();
        $cover->image = url('images/covers/desktop/'.$cover->liveaboard_image);
        $cover->image_sm = url('images/covers/phone/'.$cover->liveaboard_imageph);
        return $cover;
    }
    
    public function gettransfer()
    {
        $cover = Cover::select('transfer_image','transfer_imageph')->where('id',1)->first();
        $cover->image = url('images/covers/desktop/'.$cover->transfer_image);
        $cover->image_sm = url('images/covers/phone/'.$cover->transfer_imageph);
        return $cover;
    }
    public function getblog()
    {
        $cover = Cover::select('blog_image','blog_imageph')->where('id',1)->first();
        $cover->image = url('images/covers/desktop/'.$cover->blog_image);
        $cover->image_sm = url('images/covers/phone/'.$cover->blog_imageph);
        return $cover;
    }

    public function getexploredestination()
    {
        $cover = Cover::select('exploredestination_image','exploredestination_imageph')->where('id',1)->first();
        $cover->image = url('images/covers/desktop/'.$cover->exploredestination_image);
        $cover->image_sm = url('images/covers/phone/'.$cover->exploredestination_imageph);
        return $cover;
    }
   
    public function gethome()
    {
        $cover = Cover::select('package_image','package_imageph')->where('id',1)->first();
        $cover->image = url('images/covers/desktop/'.$cover->package_image);
        $cover->image_sm = url('images/covers/phone/'.$cover->package_imageph);
        return $cover;
    }
    
}
