<?php

use App\Http\Controllers\ActivityApiController;
use App\Http\Controllers\BlogApiController;
use App\Http\Controllers\LiverboardApiController;
use App\Http\Controllers\PackageApiController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\PlacesApiController;
use App\Http\Controllers\ReviewsApiController;
use App\Http\Controllers\SettingApiController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventApiController;
use App\Http\Controllers\ActivityTypeApiController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\CarApiController;
use App\Http\Controllers\MessageApiController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\PartenerController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\HomeCoverController;
use App\Http\Controllers\CoversController;
use App\Http\Controllers\TransportingsBookingsController;
use App\Mail\BookingConfirm;
use App\Models\Activity;
use App\Models\ActivityBooking;
use App\Http\Controllers\HappyGuestController;
use Illuminate\Http\Request;
use App\Http\Controllers\PaymentRenderController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Notifications\BookingNotificaiton;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/popularquestionapitransport', [TransportingsBookingsController::class,'popularquestionapi']); 
Route::get('/bestevent', [EventApiController::class,'bestevent']);

Route::get('login/{provider}', [SocialController::class,'redirect']);
Route::get('login/{provider}/callback',[SocialController::class,'Callback']);


Route::post('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/login', [RegisterController::class, 'login'])->name('login');
Route::get('/hotel/all',  [HotelController::class, 'allapi'])->name('all');

Route::post('/password/reset', [RegisterController::class, 'sendmail'])->name('sendmail');

    Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/all',  [MessageApiController::class, 'all'])->name('all');
    
    //Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');
   // Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');
    
});

Route::group(['prefix' => 'advisor', 'as' => 'advisor.'], function () {
    Route::get('/', [AdvisorController::class, 'all'])->name('all');
 
});

Route::group(['prefix' => 'partener', 'as' => 'partener.'], function () {
    Route::get('/', [PartenerController::class, 'getAll'])->name('all');
 
});

Route::group(['prefix' => 'happyguest', 'as' => 'happyguest.'], function () {
    Route::get('/', [HappyGuestController::class, 'getAll'])->name('all');
 
});

Route::group(['prefix' => 'covers', 'as' => 'covers.'], function () {
    Route::get('/', [CoversController::class, 'getAllCovers'])->name('all');
    Route::get('/contactus', [CoversController::class, 'getcontactus'])->name('getcontactus');
    Route::get('/aboutus', [CoversController::class, 'getaboutus'])->name('getaboutus');
    Route::get('/event', [CoversController::class, 'getevent'])->name('getevent');
    Route::get('/singleevent', [CoversController::class, 'getsingleevent'])->name('getsingleevent');
    Route::get('/blog', [CoversController::class, 'getblog'])->name('getblog');
    Route::get('/transfer', [CoversController::class, 'gettransfer'])->name('gettransfer');
    Route::get('/livaboared', [CoversController::class, 'getlivaboard'])->name('getlivaboard');
    Route::get('/exploredestination', [CoversController::class, 'getexploredestination'])->name('getexploredestination');
    Route::get('/package', [CoversController::class, 'gethome'])->name('gethome');
    Route::get('/home', [HomeCoverController::class, 'getAll'])->name('getAll');
});

Route::get('/test', [PaymentRenderController::class, 'test']); 

Route::group(['prefix' => 'myFatoorah', 'as' => 'myFatoorah.'], function () {
    Route::post('/initSession', [MyFatoraahController::class, 'init_session'])->name('startsess');
    Route::post('/payfatoorah', [MyFatoraahController::class, 'charge'])->name('charge');
    Route::post('/callback', [MyFatoraahController::class, 'callBack'])->name('charge');
    Route::post('/error', [MyFatoraahController::class, 'errorCallBack'])->name('charge');
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
// });

Route::get('/test', function (Request $request) {
    $month = ActivityBooking::whereMonth('created_at','12')->get();
    return $month;
});
// Route::group(['prefix' => 'review', 'as' => 'rev.'], function () {
//     Route::get('/all',  [ReviewsApiController::class, 'all'])->name('all');
//     Route::get('/show/{id}', [ReviewsApiController::class, 'show'])->name('show');  
//     Route::post('/add', [ReviewsApiController::class, 'store'])->name('add');
// });

Route::group(['prefix' => 'message', 'as' => 'message.'], function () {  
    //Route::get('/all',  [MessageApiController::class, 'all'])->name('all');
     
});

Route::middleware('auth:sanctum')->get('/userChecker', [SocialController::class, 'checkSocial'])->name('checkSocial');

Route::post('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/login', [RegisterController::class, 'login'])->name('login');



Route::group(['prefix' => 'setting', 'as' => 'set.'], function () {
    Route::get('/',  [SettingApiController::class, 'all'])->name('all');
});

Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
    Route::get('/',  [BlogApiController::class, 'all'])->name('all');
    Route::get('/show/{id}',  [BlogApiController::class, 'show'])->name('show');
    Route::get('/comment/{blog_id}',  [BlogApiController::class, 'comments'])->name('comment');
    Route::get('/comment/reply/{comment_id}',  [BlogApiController::class, 'replies'])->name('replies');
    
    Route::get('/archive',  [BlogApiController::class, 'archive'])->name('archive');
    Route::get('/filterblog/{year}/{month}',  [BlogApiController::class, 'filterblog'])->name('filterblog');
    
});
Route::group(['prefix' => 'liverboard', 'as' => 'liv.'], function () {
    Route::get('/',  [LiverboardApiController::class, 'all'])->name('all');
    Route::get('/show/{id}',  [LiverboardApiController::class, 'show'])->name('show');
});

Route::group(['prefix' => 'activitytype', 'as' => 'activitytype.'], function () {
    Route::get('/',  [ActivityTypeApiController::class, 'all'])->name('all');
});

Route::group(['prefix' => 'package', 'as' => 'pack.'], function () {
    Route::get('/',  [PackageApiController::class, 'all'])->name('all');
    Route::get('/show/{id}',  [PackageApiController::class, 'show'])->name('show');
});
Route::group(['prefix' => 'event', 'as' => 'event.'], function () {
    Route::get('/',  [EventApiController::class, 'all'])->name('all');
    Route::get('/show/{id}',  [EventApiController::class, 'show'])->name('show');
});
Route::group(['prefix' => 'activity', 'as' => 'activ.'], function () {
    Route::get('/', [ActivityApiController::class, 'all'])->name('all');
    Route::get('/oneactivit/{id}',  [ActivityApiController::class, 'oneactivity'])->name('oneactivity');
    Route::get('/activitpopular',  [ActivityApiController::class, 'activitpopular'])->name('activitpopular');
    Route::get('/type/{type_id}',  [ActivityApiController::class, 'filterType'])->name('typeFilter');
    Route::get('/types',  [ActivityApiController::class, 'getTypes'])->name('getTypes');
    Route::get('/place/{place_id}',  [ActivityApiController::class, 'filterPlace'])->name('placeFilter');
    Route::get('/placeType/{place_id}/{type_id}', [ActivityApiController::class, 'filterPlaceType'])->name('placeTypeFilter');
    Route::get('/placePopular/{place_id}', [ActivityApiController::class, 'filterPlacePopular'])->name('filterPlacePopular');
});
Route::group(['prefix' => 'place', 'as' => 'place.'], function () {

    Route::get('/',  [PlacesApiController::class, 'all'])->name('all');
    Route::get('/names',  [PlacesApiController::class, 'names'])->name('names');
    Route::get('/show/{id}',  [PlacesApiController::class, 'show'])->name('show');
});

Route::group(['prefix' => 'car', 'as' => 'car.'], function () {
    Route::get('/',  [CarApiController::class, 'all'])->name('all');
    Route::get('/show/{id}',  [CarApiController::class, 'show'])->name('show');
});

Route::group(['prefix' => 'message', 'as' => 'message.'], function () {

    Route::post('/add',  [MessageApiController::class, 'store'])->name('add');
});
Route::group(['prefix' => 'review', 'as' => 'rev.'], function () {
    
    Route::get('/activity/{id}',  [ReviewsApiController::class, 'allActivityReview'])->name('allActivityReview');
    Route::get('/event/{id}',  [ReviewsApiController::class, 'allEventReview'])->name('allEventReview');
    Route::get('/package/{id}',  [ReviewsApiController::class, 'allPackageReview'])->name('allPackageReview');
    Route::get('/liveboard/{id}',  [ReviewsApiController::class, 'allLiveboardReview'])->name('allLiveboardReview');
    Route::get('/transport',  [ReviewsApiController::class, 'allTransportReview'])->name('allTransportReview');
    Route::get('/',  [ReviewsApiController::class, 'all'])->name('all');
    Route::get('/show/{id}', [ReviewsApiController::class, 'show'])->name('show');
});
Route::group(['prefix' => 'news', 'as' => 'new.'], function () {
    Route::post('/add',  [NewsLetterController::class, 'store'])->name('add');
});

/// requires authuntication

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    $user= $request->user();
    if ($user->provider == null && $user->image == null ) 
    {
        $user->image = url('images/users/user.png');
    }
    else if($user->provider == null && $user->image)
    {
        $user->image = url('images/users/'.$user->image);
    }
    else
    {
        $user->image = url('images/users/'.$user->image);
    }
    // if ($user->image == null) 
    // {
    //     $user->image = url('images/users/userimage.png');
    // }
   
    return $user;
});
Route::post('/tappayment',  [PaypalController::class, 'payment'])->name('payment');
Route::get('/tapCallback',  [PaypalController::class, 'callback'])->name('tap.callback');
Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    $request->user()->currentAccessToken()->delete();
    return response()->json(['message' => 'logged out succefully']);
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     $user= $request->user();
//     $user->image = url('images/users/' . $user->image);
//     return $user;
// });
// Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
//     $request->user()->currentAccessToken()->delete();
//     return response()->json(['message' => 'logged out succefully']);
// });

Route::middleware('auth:sanctum')->post('/updateprofile', function (Request $request) {
    try
    {
            $user=$request->user();
       
            $user = User::find($user->id);
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->phone = $request->phone;
            $user->email = $request->email;
            if($request->image)
            {
                $file = $request->image;
                $filename = $file->getClientOriginalName();
                $file->move('images/users',$filename);
                $user->image = $filename;   
            }
    
            if($user->provider == null)
            {
                if (Hash::check($request->old_password,$user->password)) 
                {
                    $user->password = Hash::make($request->new_password);
                }
                else
                {
                    return response()->json(['message'=>'wrong password']);
                }
            }
            // else
            // {
            //     return response()->json(['message'=>'Enter password']);
            // }
            
          
            $user->save();
            
            return response()->json(['status'=>'true','message'=>'Updated profile !!','data'=>$user]);
        //}
    }
    catch(\Exception $e)
    {
        return response()->json(['status'=>'false','message'=>$e->getMessage(),'data'=>[]],500);
    }
});
Route::post('/locationDistance',  [PaypalController::class, 'getDistance'])->name('getDistance');
Route::get('/user/{id}', function ($id) {
    try
    {
       
        $user=User::findOrFail($id);
        
        // if($user->image)
        // {
            $user->image = url('images/users/'.$user->image);
        // }
        // else 
        // {
        //     $user->image = url('images/users/user.png');
        // }
        return $user;
    }
    catch(\Exception $e)
    {
        return response()->json(['status'=>'false','message'=>$e->getMessage(),'data'=>[]],500);
    }
});
Route::middleware('auth:sanctum')->post('/profilePic', function (Request $request) {
    try
    {
        $user=$request->user();
       
        if($request->image)
        {
            if (File::exists('images/users/' .$user->image)) 
            {
                File::delete('images/users/'.$user->image);
            }
            $file = $request->image;
            $filename = $file->getClientOriginalName();
            $file->move('images/users',$filename);
            $user->image = $filename;
            $user->save();
        }
        return  response()->json('updated succefully' ,200);
        //}
    }
    catch(\Exception $e)
    {
        return response()->json(['status'=>'false','message'=>$e->getMessage(),'data'=>[]],500);
    }
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'favourites', 'as' => 'fav.'], function () {

        Route::get('/cancelActivity/{id}', [FavouriteController::class, 'cancelActivity'])->name('cancelActivity');
        Route::get('/cancelEvent/{id}', [FavouriteController::class, 'cancelEvent'])->name('cancelEvent');
        Route::get('/cancelPackage/{id}', [FavouriteController::class, 'cancelPackage'])->name('cancelPackage');
        Route::get('/cancelLiveboard/{id}', [FavouriteController::class, 'cancelLiveboard'])->name('cancelLiveboard');
        Route::get('/activities', [FavouriteController::class, 'getAllActivities'])->name('allActivities');
        Route::get('/events', [FavouriteController::class, 'getAllEvents'])->name('allEvents');
        Route::get('/packages', [FavouriteController::class, 'getAllPackages'])->name('allPackages');
        Route::get('/liveboard', [FavouriteController::class, 'getAllLiveboard'])->name('allLiveboard');
        Route::get('/tours', [FavouriteController::class, 'getAllTours'])->name('allTours');
        Route::get('/snorkeling', [FavouriteController::class, 'getAllSnorkeling'])->name('allSnorkeling');
        Route::get('/diving', [FavouriteController::class, 'getAllDiving'])->name('allDiving');
        Route::get('/safari', [FavouriteController::class, 'getAllSafari'])->name('allSafari');
        Route::get('/addActivity/{activity_id}', [FavouriteController::class, 'addActivity'])->name('addActivity');
        Route::get('/addEvent/{event_id}', [FavouriteController::class, 'addEvent'])->name('addEvent');
        Route::get('/addPackage/{event_id}', [FavouriteController::class, 'addPackage'])->name('addPackage');
        Route::get('/addLiveboard/{Liveboard_id}', [FavouriteController::class, 'addLiveboard'])->name('addLiveboard');
        Route::get('/activityFavouriteStatus/{activity_id}', [FavouriteController::class, 'getActivityFavouriteStatus'])->name('getActivityFavouriteStatus');
        Route::get('/eventFavouriteStatus/{activity_id}', [FavouriteController::class, 'getEventFavouriteStatus'])->name('getEventFavouriteStatus');
        Route::get('/packageFavouriteStatus/{activity_id}', [FavouriteController::class, 'getPackageFavouriteStatus'])->name('getPackageFavouriteStatus');
        Route::get('/liveboardFavouriteStatus/{activity_id}', [FavouriteController::class, 'getLiveboardFavouriteStatus'])->name('getLiveboardFavouriteStatus');
    });
//




// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
// });


// Route::group(['prefix' => 'review', 'as' => 'rev.'], function () {
//     Route::get('/all',  [ReviewsApiController::class, 'all'])->name('all');
//     Route::get('/show/{id}', [ReviewsApiController::class, 'show'])->name('show');  
//     Route::post('/add', [ReviewsApiController::class, 'store'])->name('add');
// });
    Route::group(['prefix' => 'review', 'as' => 'rev.'], function () {

        Route::post('/addActivity/{id}', [ReviewsApiController::class, 'addActivity'])->name('addActivity');
        Route::post('/addEvent/{id}', [ReviewsApiController::class, 'addEvent'])->name('addEvent');
        Route::post('/addPackage/{id}', [ReviewsApiController::class, 'addPackage'])->name('addPackage');
        Route::post('/addLiveboard/{id}', [ReviewsApiController::class, 'addLiveboard'])->name('addLiveboard');
        Route::post('/addTransport', [ReviewsApiController::class, 'addTransport'])->name('addTransport');
    });

    Route::group(['prefix' => 'activity', 'as' => 'activ.'], function () {
        Route::get('/userbooks',  [BookingController::class, 'userActivityBookings'])->name('userbooks');
        Route::post('/book',  [BookingController::class, 'activityBooking'])->name('book');
        Route::post('/cancel',  [BookingController::class, 'activityBookingCancel'])->name('cancel');
        Route::get('/userbookstour',  [BookingController::class, 'userTourBookings'])->name('userbookstour');
        Route::get('/userbooksdive',  [BookingController::class, 'userDiveBookings'])->name('userbooksdive');
        Route::get('/userbookssnor',  [BookingController::class, 'userSnorBookings'])->name('userbookssnor');
        Route::get('/userbooksafari',  [BookingController::class, 'userSafariBookings'])->name('userbooksafari');
        

    });
    Route::group(['prefix' => 'payments', 'as' => 'pays.'], function () {
        Route::get('/userActivityPayments',  [BookingController::class, 'userActivityPayments'])->name('userActivityPayments');
        Route::get('/userTourPayments',  [BookingController::class, 'userTourPayments'])->name('userTourPayments');
        Route::get('/userDivePayments',  [BookingController::class, 'userDivePayments'])->name('userDivePayments');
        Route::get('/userSnorPayments',  [BookingController::class, 'userSnorPayments'])->name('userSnorPayments');
        Route::get('/userSafariPayments',  [BookingController::class, 'userSafariPayments'])->name('userSafariPayments');
        Route::get('/userPackagePayments',  [BookingController::class, 'userPackagePayments'])->name('userPackagePayments');
        Route::get('/userLiverboardPayments',  [BookingController::class, 'userLiverboardPayments'])->name('userLiverboardPayments');
        Route::get('/userTransportPayments',  [BookingController::class, 'userTransportPayments'])->name('userTransportPayments');
        Route::get('/userEventPayments',  [BookingController::class, 'userEventPayments'])->name('userEventPayments');
    });
   
    Route::group(['prefix' => 'dashboard', 'as' => 'dash.'], function () {
        Route::get('/',  [UserDashboardController::class, 'index'])->name('index');
        
    });

    ////////
    Route::group(['prefix' => 'package', 'as' => 'pack.'], function () {
        Route::post('/book',  [BookingController::class, 'packageBooking'])->name('book');
        Route::get('/userbooks',  [BookingController::class, 'userPackageBookings'])->name('userbooks');
    });
    Route::group(['prefix' => 'event', 'as' => 'event.'], function () {
        Route::post('/book',  [BookingController::class, 'eventBooking'])->name('book');
        Route::get('/userbooks',  [BookingController::class, 'userEventBookings'])->name('userbooks');
    });
    Route::group(['prefix' => 'liveboard', 'as' => 'event.'], function () {
        Route::post('/book',  [BookingController::class, 'liveboardBooking'])->name('book');
        Route::get('/userbooks',  [BookingController::class, 'userLiverboardBookings'])->name('userbooks');
    });
    
    Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
        Route::post('comment/add', [BlogApiController::class, 'storeComment'])->name('addComment');
        Route::post('comment/reply/add', [BlogApiController::class, 'storeReply'])->name('reply');
    });
    Route::group(['prefix' => 'paypal', 'as' => 'paypal.'], function () {
        Route::get('/verify/{payment?}', [PaypalController::class, 'payment_verify'])->name('payment-verify');
        Route::post('/pay', [PaypalController::class, 'pay'])->name('pay');
        Route::post('/cash', [PaypalController::class, 'payCash'])->name('payCash');
    });
    Route::group(['prefix' => 'transport', 'as' => 'transport.'], function () {
        Route::post('/book',  [BookingController::class, 'transportBooking'])->name('book');
        Route::post('/bookTwoWay',  [BookingController::class, 'transportTwoWayBooking'])->name('bookTwoWay');
        Route::get('/userbooks',  [BookingController::class, 'userTransportBookings'])->name('userbooks');
        Route::post('/cancel',  [BookingController::class, 'transportBookingCancel'])->name('cancel');
    });
});
