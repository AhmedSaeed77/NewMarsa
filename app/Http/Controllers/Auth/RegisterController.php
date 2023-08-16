<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Notifications\SuccessfulRegistration;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'image' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     $file = $data['image'];
    //     $filename = $file->getClientOriginalName();
    //     $file->move('images/users',$filename);
    //     $user = User::create([
    //         'fname' => $data['fname'],
    //         'lname' => $data['lname'],
    //         'email' => $data['email'],
    //         'phone' => $data['phone'],
    //         'image' => $filename,
    //         'password' => Hash::make($data['password']),
    //     ]);
    //     $token = $user->createToken('myapptoken')->plainTextToken;
    //     $response = [
    //         'user' => $user ,
    //         'message' => 'success',
    //         'token' => $token
    //     ];
    //     return response($response,201);

    // }

    protected function create(Request $request)
    {
        ///fix
        try
        {
            $allusers = User::all();
            foreach($allusers as $alluser)
            {
                if($alluser->email == $request->email)
                {
                    return response()->json(['message' => 'Email already exist'],400);
                }
            }
            
            $user = User::create([
                                    'fname' => $request->fname,
                                    'lname' => $request->lname,
                                    'email' => $request->email,
                                    'phone' => $request->phone,
                                    'password' => Hash::make($request->password),
                                ]);
            $token = $user->createToken('myapptoken')->plainTextToken;
            $response = [
                            'user' => $user,
                            'message' => 'success',
                            'token' => $token
                        ];
            return response($response, 201);
        }
        catch(\Exception $e)
        {
            return response($e->getMessage(), 500);
        }
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        $user = User::where('email', $request->email)->first();

      
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password], false)) 
        {
            $token =  $user->createToken($request->email)->plainTextToken;
            //$user->notify(new SuccessfulRegistration());
            return response()->json(['Access-token' =>'bearer  '. $token,
                'firstname' => $user->fname,
                'lastname' => $user->lname,
                'email' => $user->email,
                'user_id' => $user->id,
            ]);
        }
        return response()->json(['message' => 'fail']);

        // $users = User::where('Email' , $request->email)
        //       ->where( 'Password' , $request->password)
        //       ->first();

        //     if($users) 
        //     {
        //         $success['token'] =  $users->createToken($request->email)->accessToken;
        //         return response()->json(['success' => $success], $this->successStatus);
        //     } 
        //     else 
        //     {
        //         return response()->json(['error'=>'Unauthorised'], 401);
        //     }
    }

    public function logout(Request $request)
    {
        return 'hi';
       
    }

    // public function updateprofile(Request $request)
    // {
        
    //     try
    //     {
    //         $user=$request->user();
    //         // $validator = $request->validate([
    //         //     'fname' => 'requird|min:2|max:45',
    //         //     'lname' => 'requird|min:2|max:45',
    //         //     'email' => 'requird|email|unique:users,id,'.$request->user_id,
    //         //     'image' => 'nullable|image',
    //         //     'phone' => 'nullable', 
    //         // ]);
    //         // // $validator = Validator::make($request->all(),[

    //         // //     'fname' => 'requird|min:2|max:45',
    //         // //     'lname' => 'requird|min:2|max:45',
    //         // //     'email' => 'requird|email|unique:users,id,'.$request->user_id,
    //         // //     'image' => 'nullable|image',
    //         // //     'phone' => 'nullable', 
    //         // // ]);
    //         // if($validator->fails())
    //         // {
    //         //     $error = $validator->errors()->all()[0];
    //         //     return response()->json(['status'=>'false','message'=>'error','data'=>[]],422);
    //         // }
    //         // else
    //         // {
    //             $request->validate([
                    
    //                 'fname'=>'required',
    //                 'lname'=>'required',
    //                 'phone'=>'required',
    //                 'email'=>'required',
    //                 'image'=>'required',
    //                 'password'=>'required',
    //                 'confirm'=>'required',
    //                 'user_id' => 'required',
    //               ],[
    //                  'fname'=>' الاسم الاول مطلوب',
    //                  'lname'=>' الاسم الثانى مطلوب',
    //                  'phone'=>' الهاتف مطلوب',
    //                  'email'=>'الايميل مطلوب',
    //                  'image'=>'صوره  البروفايل مطلوب  ', 
    //                  'password'=>'الباسورد مطلوب ',
    //                  'confirm'=>'الكونفيريم مطلوب ',
    //                  'user_id' => 'اليوزر مطلووب',
    //               ]);
          
    //             $user = User::find($request->user_id);
    //             $user->fname = $request->fname;
    //             $user->lname = $request->lname;
    //             $user->phone = $request->phone;
    //             $user->email = $request->email;

    //             if($request->password == $request->confirm)
    //             {
    //                 $user->password = Hash::make($request->password);
    //             }
    //             else
    //             {
    //                 return response()->json(['status'=>'false','message'=>'not confirm password','data'=>[]],500);
    //             }
                
    //             if($request->image)
    //             {
    //                 if (File::exists('images/users/' .$user->image)) 
    //                 {
    //                     File::delete('images/users/'.$user->image);
    //                 }
    //                 $file = $request->image;
    //                 $filename = $file->getClientOriginalName();
    //                 $file->move('images/users',$filename);
    //                 $user->image = $request->image;
    //             }
                
    //             $user->save();
                
    //             return response()->json(['status'=>'true','message'=>'Updated profile !!','data'=>$user]);
    //         //}
    //     }
    //     catch(\Exception $e)
    //     {
    //         return response()->json(['status'=>'false','message'=>$e->getMessage(),'data'=>[]],500);
    //     }
       
    // }
    
    public function sendmail(Request $request)
    {
       if($request->email == null)
       {
            return response()->json(['message' => 'email is required']); 
       }
                          
        $user = User::where('email', '=', $request->email)->first();
        
        //Check if the user exists
        if (!$user) 
        {
            return response()->json(['email' => 'User does not exist']);
        } 
        
        //Create Password Reset Token
        DB::table('password_resets')->insert([
                                                'email' => $request->email,
                                                'token' => Str::random(60),
                                                'created_at' => Carbon::now()
                                            ]);  
                                            
        //Get the token just created above
        $tokenData = DB::table('password_resets')->where('email', $request->email)->first();
        $link = rand(1000000, 1000000000);
        Mail::to($user->email)->send(new \App\Mail\ResetPassword($link));
        $user->password = Hash::make($link);
        $user->save();
        return response()->json(['message' => 'A reset password has been sent to your email address']);
    }
}
