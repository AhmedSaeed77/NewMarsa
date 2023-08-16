<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\ActivityBooking;
use App\Models\TransportBookingsBooking;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class AdminController extends Controller
{
    public function index()
    {
        return view ('admins.index');
    }

    public function check()
    {  
        return view('admins.auth.login');
    }
 
    public function loginadmin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], false)) 
        {
            $data1 = ActivityBooking::where('refund', null )->where( 'cancel','requested')->get();
            $data2 = TransportBookingsBooking::where('refund', null )->where( 'cancel','requested')->get();
           
            $book1 = ActivityBooking::first();
            $book2 = TransportBookingsBooking::latest()->limit(1)->get();

        //     foreach($book2 as $b)
        //     {
        //         dd($b->);
        //    }
            

            // $x1 =  \Carbon\Carbon::parse($book1->created_at)->format('d/m/Y');
            // $x2 =  \Carbon\Carbon::parse($book2->created_at)->format('d/m/Y');
            $date = now()->format('Y-m-d') ;
            $time = now()->format('H:i:s'); 

            $count1 = count($data1);
            $count2 = count($data2);
            $count = $count1+$count2;

            if( $count > 0 )
            {
                toastr()->success('cancel Activity && Transport',$count1+$count2 );
            }
            else
            {
                toastr()->success('cancel Activity && Transport','No Refund' );
            }
           $c1 = ActivityBooking::all()->count();
           $c2 = TransportBookingsBooking::all()->count();
           $c = $c1 + $c2;

            if( $c1 >  0 && $c2 >  0)
            {
                toastr()->success('Booking Activity && Transport',$c  );
            }
            else
            {
                toastr()->success('Booking Activity && Transport','No Refund' );
            }

            return redirect()->route('index');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('/check');
    }

    public function editprofile()
    {
        $admin = Admin::find(auth()->guard('admin')->user()->id);
        return view ('admins.editprofile', ['admin'=>$admin]);
    }

    public function updateprofile(Request $request,$id)
    {
        $admin = Admin::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        if($request->file('image'))
        {
            if (File::exists('images/admin/' .$admin->image)) 
            {
                File::delete('images/admin/'.$admin->image);
            }
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('images/admin',$filename);
            $admin->image = $filename;
        }
        if($request->password1 == $request->password2)
        {
            $admin->password = Hash::make($request->password1);
        }
        else 
        {
            return FacadesRedirect::route('editprofile');
        }
        $admin->save();

        return FacadesRedirect::route('index');
    }
}