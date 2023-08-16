<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function show()
    {
        return view ('admins.settings.create2');
    }
    public function edit(Request $request)
    {
        try{
            $request->validate([

                'name_en'=>'required',
                'name_de'=>'required',
                'name_cz'=>'required',
                'goals_en'=>'required',
                'goals_de'=>'required',
                'goals_cz'=>'required',
                'Brief_en'=>'required',
                'Brief_de'=>'required',
                'Brief_cz'=>'required',
                'message_en'=>'required',
                'message_de'=>'required',
                'message_cz'=>'required',
                'vision_en'=>'required',
                'vision_de'=>'required',
                'vision_cz'=>'required',
                'address_en'=>'required', 
                'address_de'=>'required',
                'address_cz'=>'required',
                'site'=>'required',
                'email'=>'required',
                'insta'=>'required',
                'facebook'=>'required',
                'linkedin'=>'required',
                'whatsapp'=>'required',
                //'image'=>'required',
                'terms_en' => 'required',
                'refund_en' => 'required',
                'policy_en' => 'required',
                'fun_de' => 'required',
                
            ],[
                'name_en'=>'اسم الموقع مطلوب',
                'name_de'=>'اسم الموقع مطلوب',
                'name_cz'=>'اسم الموقع مطلوب',
                'goals_en'=>'اهداف الموقع مطلوب',
                'goals_de'=>'اهداف الموقع مطلوب',
                'goals_cz'=>'اهداف الموقع مطلوب',
                'brief_en'=>'نبذه الموقع مطلوب',
                'brief_de'=>'نبذه الموقع مطلوب',
                'brief_cz'=>'نبذه الموقع مطلوب',
                'message_en'=>'رساله الموقع مطلوب',
                'message_de'=>'رساله الموقع مطلوب',
                'message_cz'=>'رساله الموقع مطلوب',
                'vision_en'=>'رؤيه الموقع مطلوب',
                'vision_de'=>'رؤيه الموقع مطلوب',
                'vision_cz'=>'رؤيه الموقع مطلوب',
                'address_en'=>'عنوان الموقع مطلوب',
                'address_de'=>'عنوان الموقع مطلوب', 
                'address_cz'=>'عنوان الموقع مطلوب',
    
                'site'=>' الموقع مطلوب',
                'email'=>'ايميل الموقع مطلوب',
                'insta'=>'استجرام الموقع مطلوب',
                'facebook'=>'فيسبوك الموقع مطلوب',
                'linkedin'=>'لينكد ان الموقع مطلوب',
                'whatsapp'=>'واتس الموقع مطلوب',
                //'image'=>'صوره الموقع مطلوب',
                'terms_en' => 'قوانين الموقع مطلوب',
                'refund_en' => 'قوانين الموقع مطلوب',
                'policy_en' => 'قوانين الموقع مطلوب',
            ]);
    
            $set = Setting::find(1);
            
            $set->name_en = $request->name_en;
            $set->goals_en = $request->goals_en;
            $set->address_en = $request->address_en;
            $set->Brief_en = $request->Brief_en;
            $set->vision_en = $request->vision_en;
            $set->message_en = $request->message_en;
            $set->terms_en = $request->terms_en;
            $set->refund_en = $request->refund_en;
            $set->policy_en = $request->policy_en;
            $set->fun_en = $request->fun_en;
            
            $set->name_de = $request->name_de;
            $set->name_cz = $request->name_cz;
            
            $set->fun_de = $request->fun_de;
            $set->fun_cz = $request->fun_cz;
            
            $set->goals_de = $request->goals_de;
            $set->goals_cz = $request->goals_cz;
            
            $set->address_de = $request->address_de;
            $set->address_cz = $request->address_cz;
            
            $set->Brief_de = $request->Brief_de;
            $set->Brief_cz = $request->Brief_cz;
           
            $set->vision_de = $request->vision_de;
            $set->vision_cz = $request->vision_cz;
           
            $set->message_de = $request->message_de;
            $set->message_cz = $request->message_cz;

    
            $set->email = $request->email;
            $set->facebook = $request->facebook;
            $set->insta = $request->insta;
            $set->linkedin = $request->linkedin;
            $set->site = $request->site;
            $set->whatsapp = $request->whatsapp;

            if($request->file('image'))
            {
                if (File::exists('images/settings/' .$set->image)) 
                {
                    File::delete('images/settings/'.$set->image);
                }
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $filename = str_replace(" ","",$filename);
                $file->move('images/settings',$filename);
                $set->image = $filename;
            }
            if($request->file('funimage'))
            {
                if (File::exists('images/settings/' .$set->funimage)) 
                {
                    File::delete('images/settings/'.$set->funimage);
                }
                $file = $request->file('funimage');
                $filename = $file->getClientOriginalName();
                $filename = str_replace(" ","",$filename);
                $file->move('images/settings',$filename);
                $set->funimage = $filename;
            }
    
            $set->save();
            return redirect()->route('setting.setting');
        
        }
        catch(\Exception $e){
            return response()->json($e->getMessage());
        }
}
}
