<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ReplyCommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\LiveBoardController;
use App\Http\Controllers\BoatController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\TransportingsBookingsController;
use App\Http\Controllers\ActivityBookingController;
use App\Http\Controllers\UserControllerByAdmin;
use App\Models\Hotel;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MyFatoorahController;
use App\Http\Controllers\MyFatoraahController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\HappyGuestController;
use App\Http\Controllers\PaymentRenderController;
use App\Http\Controllers\CoversController;
use App\Http\Controllers\HomeCoverController;
use App\Http\Controllers\PartenerController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ReviewTransportController;
use App\Models\NewsLetter;
use Illuminate\Support\Facades\Auth;
use App\Mail\test;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/teestemail', function () {
   Mail::mailer('postmark')
        ->to('aaa15107@gmail.com')
        ->send(new test());
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/privacyPolicy', function () {
    return view('privacy');
});
Route::get('/fatoorah', function () {
    return view('Package');
});
Route::get('/tos', function () {
    return view('terms');
});
Route::get('/advisor', function () {
    return view('trip');
});
Route::get('/check/{token}', function () {
    return view('trip');
});
Route::group(['prefix' => 'myFatoorah', 'as' => 'myFatoorah.'], function () {
    Route::post('/initSession', [MyFatoraahController::class, 'init_session'])->name('startsess');
    Route::post('/payfatoorah', [MyFatoraahController::class, 'charge'])->name('charge');
    Route::post('/callback', [MyFatoraahController::class, 'callBack'])->name('charge');
    Route::post('/error', [MyFatoraahController::class, 'errorCallBack'])->name('charge');
});

Route::get('login/{provider}', [SocialController::class, 'redirect']);
Route::get('login/{provider}/callback', [SocialController::class, 'Callback']);


Route::get('/check', [AdminController::class, 'check'])->name('loginAdmin');
Route::post('/admin/login', [AdminController::class, 'loginadmin'])->name('admin.login');
Route::any('logout', [AdminController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'prevent-back-history'], function () {


    Route::group(['middleware' => ['auth:admin']], function () {

        Route::group(['prefix' => 'admin'], function () {

            Route::get('/', [AdminController::class, 'index'])->name('index');
            Route::get('/editprofile', [AdminController::class, 'editprofile'])->name('editprofile');
            Route::post('/updateprofile/{id}', [AdminController::class, 'updateprofile'])->name('updateprofile');

            Route::group(['prefix' => 'activity', 'as' => 'activ.'], function () {
                Route::get('/', [ActivityController::class, 'index'])->name('index');
                Route::get('/actdetails/{id}', [ActivityController::class, 'actdetails'])->name('actdetails');
                Route::get('/blogDatatable', [ActivityController::class, 'datatable'])->name('datatable');
                Route::get('/create', [ActivityController::class, 'create'])->name('create');
                Route::post('/add', [ActivityController::class, 'store'])->name('add');
                Route::post('/delete', [ActivityController::class, 'destroy'])->name('delete');
                Route::get('/edit/{id}', [ActivityController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [ActivityController::class, 'update'])->name('update');
                Route::get('/editimage', [ActivityController::class, 'editimage'])->name('editimage');
                Route::get('/getimagesvue/{id}', [ActivityController::class, 'getimagesvue'])->name('getimagesvue');
                Route::post('/deleteimage', [ActivityController::class, 'deleteimage'])->name('deleteimage');
                Route::post('/updateimage', [ActivityController::class, 'updateimage'])->name('updateimage');
            });
            
            
            Route::group(['prefix' => 'advisor', 'as' => 'advisor.'], function () {
                Route::get('/', [AdvisorController::class, 'all'])->name('all');
                Route::get('/create', [AdvisorController::class, 'create'])->name('createadvisor');
                Route::post('/add', [AdvisorController::class, 'store'])->name('addadvisort');
                //Route::post('/add', [AdvisorController::class, 'store'])->name('addadvisort');
            });
            
            Route::group(['prefix' => 'covers', 'as' => 'covers.'], function () {
                Route::get('/create', [CoversController::class, 'create'])->name('createcover');
                Route::post('/add', [CoversController::class, 'store'])->name('add');
            });

            Route::group(['prefix' => 'place', 'as' => 'place.'], function () {
                Route::get('/', [PlaceController::class, 'index'])->name('index');
                Route::get('/placedetails/{id}', [PlaceController::class, 'placedetails'])->name('placedetails');
                Route::get('/create', [PlaceController::class, 'create'])->name('create');
                Route::get('/details/{id}', [PlaceController::class, 'show'])->name('show');
                Route::post('/add', [PlaceController::class, 'store'])->name('add');
                Route::post('/deleteplace', [PlaceController::class, 'delete'])->name('delete');
                Route::get('/edit/{id}', [PlaceController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [PlaceController::class, 'update'])->name('update');
            });

            Route::group(['prefix' => 'LiveBoard', 'as' => 'live.'], function () {
                Route::get('/', [LiveBoardController::class, 'index'])->name('index');
                Route::get('/create', [LiveBoardController::class, 'create'])->name('create');
                Route::get('/details/{id}', [LiveBoardController::class, 'livedetails'])->name('details');
                Route::post('/add', [LiveBoardController::class, 'store'])->name('add');
                Route::post('/delete', [LiveBoardController::class, 'destroy'])->name('delete');
                Route::get('/edit/{id}', [LiveBoardController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [LiveBoardController::class, 'update'])->name('update');

                Route::get('/editimage', [LiveBoardController::class, 'editimage'])->name('editimage');
                Route::get('/getimagesvue/{id}', [LiveBoardController::class, 'getimagesvue'])->name('getimagesvue');
                Route::post('/deleteimage', [LiveBoardController::class, 'deleteimage'])->name('deleteimage');
                Route::post('/updateimage', [LiveBoardController::class, 'updateimage'])->name('updateimage');
                
                Route::get('/editschedule', [LiveBoardController::class, 'editschedule'])->name('editschedule');
                Route::get('/getschedulevue/{id}', [LiveBoardController::class, 'getschedulevue'])->name('getschedulevue');
                Route::post('/deleteschedule', [LiveBoardController::class, 'deleteschedule'])->name('deleteschedule');
                Route::post('/updateschedule', [LiveBoardController::class, 'updateschedule'])->name('updateschedule');
            });

            Route::group(['prefix' => 'zone', 'as' => 'zone.'], function () {
                Route::get('/', [ZoneController::class, 'index'])->name('index');
                Route::get('/blogDatatable', [ZoneController::class, 'datatable'])->name('datatable');
                Route::get('/create', [ZoneController::class, 'create'])->name('create');
                Route::get('/details/{id}', [ZoneController::class, 'show'])->name('show');
                Route::post('/add', [ZoneController::class, 'store'])->name('add');
                Route::post('/delete', [ZoneController::class, 'destroy'])->name('delete');
                Route::get('/edit/{id}', [ZoneController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [ZoneController::class, 'update'])->name('update');
            });

            Route::group(['prefix' => 'hotel', 'as' => 'hotel.'], function () {
                Route::get('/', [HotelController::class, 'index'])->name('index');
                Route::get('/blogDatatable', [HotelController::class, 'datatable'])->name('datatable');
                Route::get('/create', [HotelController::class, 'create'])->name('create');
                Route::get('/details/{id}', [HotelController::class, 'show'])->name('show');
                Route::post('/add', [HotelController::class, 'store'])->name('add');
                Route::post('/delete', [HotelController::class, 'destroy'])->name('delete');
                Route::get('/edit/{id}', [HotelController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [HotelController::class, 'update'])->name('update');
            });

            Route::group(['prefix' => 'news', 'as' => 'news.'], function () {
                Route::get('/', [NewsLetterController::class, 'index'])->name('index');
                Route::get('/datatable', [NewsLetterController::class, 'datatable'])->name('datatable');
                Route::post('/delete', [NewsLetterController::class, 'destroy'])->name('delete');
            });

            Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
                Route::get('/blog', [BlogController::class, 'index'])->name('blogs');
                Route::get('/Datatable', [BlogController::class, 'datatable'])->name('blogDatatable');
                Route::get('/create', [BlogController::class, 'create'])->name('createblog');
                Route::post('/add', [BlogController::class, 'store'])->name('addblog');
                Route::post('/delete', [BlogController::class, 'delete'])->name('deleteblog');
                Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('editblog');
                Route::post('/update/{id}', [BlogController::class, 'update'])->name('updateblog');

                Route::get('/editimage', [BlogController::class, 'editimage'])->name('editimage');
                Route::get('/getimagesvue/{id}', [BlogController::class, 'getimagesvue'])->name('getimagesvue');
                Route::post('/deleteimage', [BlogController::class, 'deleteimage'])->name('deleteimage');
                Route::post('/updateimage', [BlogController::class, 'updateimage'])->name('updateimage');
            });

            Route::group(['prefix' => 'event', 'as' => 'event.'], function () {
                Route::get('/event', [EventController::class, 'index'])->name('events');
                Route::get('/Datatable', [EventController::class, 'datatable'])->name('eventDatatable');
                Route::get('/create', [EventController::class, 'create'])->name('createevent');
                Route::post('/add', [EventController::class, 'store'])->name('addevent');
                Route::post('/delete', [EventController::class, 'delete'])->name('deleteevent');
                Route::get('/edit/{id}', [EventController::class, 'edit'])->name('editevent');
                Route::get('/show/{id}', [EventController::class, 'show'])->name('showevent');
                Route::post('/update/{id}', [EventController::class, 'update'])->name('updateevent');
                
                Route::get('/bestevent', [EventController::class, 'bestevent'])->name('bestevent');
                Route::post('/bestupdate', [EventController::class, 'bestupdate'])->name('bestupdate');

                Route::get('/editimage', [EventController::class, 'editimage'])->name('editimage');
                Route::get('/getimagesvue/{id}', [EventController::class, 'getimagesvue'])->name('getimagesvue');
                Route::post('/deleteimage', [EventController::class, 'deleteimage'])->name('deleteimage');
                Route::post('/updateimage', [EventController::class, 'updateimage'])->name('updateimage');
            });

            Route::group(['prefix' => 'package', 'as' => 'package.'], function () {
                Route::get('/package', [PackageController::class, 'index'])->name('packages');
                Route::get('/Datatable', [PackageController::class, 'datatable'])->name('packageDatatable');
                Route::get('/create', [PackageController::class, 'create'])->name('createpackage');
                Route::post('/add', [PackageController::class, 'store'])->name('addpackage');
                Route::post('/delete', [PackageController::class, 'delete'])->name('deletepackage');
                Route::get('/edit/{id}', [PackageController::class, 'edit'])->name('editpackage');
                Route::get('/show/{id}', [PackageController::class, 'show'])->name('showpackage');
                Route::post('/update/{id}', [PackageController::class, 'update'])->name('updatepackage');

                Route::get('/editimage', [PackageController::class, 'editimage'])->name('editimage');
                Route::get('/getimagesvue/{id}', [PackageController::class, 'getimagesvue'])->name('getimagesvue');
                Route::post('/deleteimage', [PackageController::class, 'deleteimage'])->name('deleteimage');
                Route::post('/updateimage', [PackageController::class, 'updateimage'])->name('updateimage');
            });

            Route::group(['prefix' => 'review', 'as' => 'review.'], function () {
                Route::get('/review', [ReviewController::class, 'index'])->name('reviews');
                Route::get('/Datatable', [ReviewController::class, 'datatable'])->name('reviewDatatable');
                Route::post('/delete', [ReviewController::class, 'delete'])->name('deletereview');
            });

            Route::group(['prefix' => 'reviewtransport', 'as' => 'reviewtransport.'], function () {
                Route::get('/review', [ReviewTransportController::class, 'index'])->name('reviews');
                Route::get('/Datatable', [ReviewTransportController::class, 'datatable'])->name('reviewDatatable');
                Route::post('/delete', [ReviewTransportController::class, 'delete'])->name('deletereview');
            });
            
            
            Route::group(['prefix' => 'partener', 'as' => 'partener.'], function () {
                Route::get('/editimage', [PartenerController::class, 'editimage'])->name('editimage');
                Route::get('/getimagesvue', [PartenerController::class, 'getimagesvue'])->name('getimagesvue');
                Route::post('/deleteimage', [PartenerController::class, 'deleteimage'])->name('deleteimage');
                Route::post('/updateimage', [PartenerController::class, 'updateimage'])->name('updateimage');
            });
            
            Route::group(['prefix' => 'homecover', 'as' => 'homecover.'], function () {
                Route::get('/editimage', [HomeCoverController::class, 'editimage'])->name('editimage');
                Route::get('/getimagesvue', [HomeCoverController::class, 'getimagesvue'])->name('getimagesvue');
                Route::post('/deleteimage', [HomeCoverController::class, 'deleteimage'])->name('deleteimage');
                Route::post('/updateimage', [HomeCoverController::class, 'updateimage'])->name('updateimage');
            });
            
            Route::group(['prefix' => 'happyguest', 'as' => 'happyguest.'], function () {
                Route::get('/editimage', [HappyGuestController::class, 'editimage'])->name('editimage');
                Route::get('/getimagesvue', [HappyGuestController::class, 'getimagesvue'])->name('getimagesvue');
                Route::post('/deleteimage', [HappyGuestController::class, 'deleteimage'])->name('deleteimage');
                Route::post('/updateimage', [HappyGuestController::class, 'updateimage'])->name('updateimage');
            });

            Route::group(['prefix' => 'comment', 'as' => 'comment.'], function () {
                Route::get('/comment', [CommentController::class, 'index'])->name('comments');
                Route::get('/Datatable', [CommentController::class, 'datatable'])->name('commentDatatable');
                Route::post('/delete', [CommentController::class, 'delete'])->name('deletecomment');
                Route::get('/edit/{id}', [CommentController::class, 'edit'])->name('editcomment');
                Route::post('/update/{id}', [CommentController::class, 'update'])->name('updatecomment');
            });

            Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
                Route::get('/user', [UserControllerByAdmin::class, 'index'])->name('users');
                Route::get('/Datatable', [UserControllerByAdmin::class, 'datatable'])->name('usersDatatable');
                Route::post('/delete', [UserControllerByAdmin::class, 'delete'])->name('deleteuser');
                Route::get('/edit/{id}', [UserControllerByAdmin::class, 'edit'])->name('edituser');
                Route::post('/update/{id}', [UserControllerByAdmin::class, 'update'])->name('updateuser');
            });

            Route::group(['prefix' => 'activitybookings', 'as' => 'activitybookings.'], function () {
                Route::get('/test', [ActivityBookingController::class, 'test'])->name('test');
                Route::get('/activitybookings', [ActivityBookingController::class, 'index'])->name('activitybookings');
                Route::get('/cashIndex', [ActivityBookingController::class, 'indexCash'])->name('indexCash');
                Route::get('/Datatable', [ActivityBookingController::class, 'datatable'])->name('activitybookingsDatatable');
                
                Route::get('/datatablepayment', [ActivityBookingController::class, 'datatablepayment'])->name('activitybookingsdatatablepayment');
                
                Route::get('/cashDatatable', [ActivityBookingController::class, 'cashDatatable'])->name('cashDatatable');
                Route::post('/delete', [ActivityBookingController::class, 'delete'])->name('deleteactivitybookings');
                Route::get('/edit/{id}', [ActivityBookingController::class, 'undoCollect'])->name('undo');
                Route::post('/cashCollect', [ActivityBookingController::class, 'cashCollect'])->name('cashCollect');
                Route::get('/cashCollect1/{id}', [ActivityBookingController::class, 'cashCollect1'])->name('cashCollect1');
                Route::get('/activitybookingsrefund', [ActivityBookingController::class, 'indexrefund'])->name('activitybookingsrefund');
                Route::get('/Datatablerefund', [ActivityBookingController::class, 'datatablerefund'])->name('activitybookingsDatatablerefund');
                Route::post('/refund', [ActivityBookingController::class, 'refund'])->name('refundactivitybookings');
                
                Route::get('/cashIndexdeleted', [ActivityBookingController::class, 'indexCashDeleted'])->name('indexCashDeleted');
                Route::get('/cashDeleteDatatable', [ActivityBookingController::class, 'cashDeleteDatatable'])->name('cashDeleteDatatable');
                Route::post('/cashdelete', [ActivityBookingController::class, 'deletecash'])->name('cashdelete');
                
            });

            Route::group(['prefix' => 'payment', 'as' => 'payment.'], function () {
                Route::get('/activity', [PaymentRenderController::class, 'activityIndex'])->name('activity');
                Route::get('/transport', [PaymentRenderController::class, 'transportIndex'])->name('transportIndex');
                Route::get('/activityDatatable', [ActivityBookingController::class, 'datatable'])->name('activityDatatable');
                Route::get('/transportDatatable', [TransportingsBookingsController::class, 'datatable'])->name('transportDatatable');
              
            });

            Route::group(['prefix' => 'transportingbookings', 'as' => 'transportingbookings.'], function () {
                Route::get('/transportingbookings', [TransportingsBookingsController::class, 'index'])->name('transportingbookings');
                Route::get('/Datatable', [TransportingsBookingsController::class, 'datatable'])->name('transportingbookingsDatatable');
                Route::post('/delete', [TransportingsBookingsController::class, 'delete'])->name('deleteactivitytransportingbookings');
                Route::get('/show/{id}', [TransportingsBookingsController::class, 'show'])->name('showtransportingbookings');
                Route::get('/transportingbookingsrefund', [TransportingsBookingsController::class, 'indexrefund'])->name('transportingbookingsrefund');
                Route::get('/Datatablerefund', [TransportingsBookingsController::class, 'datatablerefund'])->name('transportingbookingsDatatablerefund');
                Route::post('/refund', [TransportingsBookingsController::class, 'refund'])->name('refundtransportingbookings');
                Route::get('/cashDatatable', [TransportingsBookingsController::class, 'cashDatatable'])->name('cashDatatable');
                Route::get('/cashCollect/{id}', [TransportingsBookingsController::class, 'cashCollect'])->name('cashCollect');
                Route::get('/cashIndex', [TransportingsBookingsController::class, 'indexCash'])->name('indexCash');
                Route::post('/cashdelete', [TransportingsBookingsController::class, 'deletecash'])->name('cashdelete');
                
                //Route::get('/whatsapp/{whatsapp}', [TransportingsBookingsController::class, 'whatsapp'])->name('whatsapp');
                
                Route::get('/cashIndexdeleted', [TransportingsBookingsController::class, 'indexCashDeleted'])->name('indexCashDeleted');
                Route::get('/cashDeleteDatatable', [TransportingsBookingsController::class, 'cashDeleteDatatable'])->name('cashDeleteDatatable');
                Route::post('/deletecash', [TransportingsBookingsController::class, 'deletecash'])->name('deletecash');
            });

            Route::group(['prefix' => 'reply', 'as' => 'reply.'], function () {
                Route::get('/reply', [ReplyCommentController::class, 'index'])->name('replies');
                Route::get('/Datatable', [ReplyCommentController::class, 'datatable'])->name('replyDatatable');
                Route::post('/delete', [ReplyCommentController::class, 'delete'])->name('deletereply');
                Route::post('/add/{id}', [ReplyCommentController::class, 'add'])->name('addreply');
                Route::get('/edit/{id}', [ReplyCommentController::class, 'edit'])->name('editreply');
                Route::post('/update/{id}', [ReplyCommentController::class, 'update'])->name('updatereply');
            });

            Route::group(['prefix' => 'transportingbookings', 'as' => 'transportingbookings.'], function () {
                Route::get('/transportingbookings', [TransportingsBookingsController::class, 'index'])->name('transportingbookings');
                Route::get('/Datatable', [TransportingsBookingsController::class, 'datatable'])->name('transportingbookingsDatatable');
                Route::post('/delete', [TransportingsBookingsController::class, 'delete'])->name('deleteactivitytransportingbookings');
                Route::get('/show/{id}', [TransportingsBookingsController::class, 'show'])->name('showtransportingbookings');
                Route::get('/transportingbookingsrefund', [TransportingsBookingsController::class, 'indexrefund'])->name('transportingbookingsrefund');
                Route::get('/Datatablerefund', [TransportingsBookingsController::class, 'datatablerefund'])->name('transportingbookingsDatatablerefund');
                Route::post('/refund', [TransportingsBookingsController::class, 'refund'])->name('refundtransportingbookings');
                Route::get('/popularquestion', [TransportingsBookingsController::class, 'popularquestion'])->name('popularquestion');
                Route::post('/popularquestion', [TransportingsBookingsController::class, 'updatepopularquestion'])->name('updatepopularquestion');
            });

            Route::group(['prefix' => 'reply', 'as' => 'reply.'], function () {
                Route::get('/reply', [ReplyCommentController::class, 'index'])->name('replies');
                Route::get('/Datatable', [ReplyCommentController::class, 'datatable'])->name('replyDatatable');
                Route::post('/delete', [ReplyCommentController::class, 'delete'])->name('deletereply');
                Route::post('/add/{id}', [ReplyCommentController::class, 'add'])->name('addreply');
                Route::get('/edit/{id}', [ReplyCommentController::class, 'edit'])->name('editreply');
                Route::post('/update/{id}', [ReplyCommentController::class, 'update'])->name('updatereply');
            });

            Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
                Route::get('/setting', [SettingController::class, 'show'])->name('setting');
                Route::post('/setting', [SettingController::class, 'edit'])->name('editsetting');
            });

            Route::group(['prefix' => 'message', 'as' => 'message.'], function () {
                Route::get('/message', [MessageController::class, 'show'])->name('messages');
                Route::get('/Datatable', [MessageController::class, 'datatable'])->name('messageDatatable');
                Route::post('/delete', [MessageController::class, 'delete'])->name('deletemessage');
            });
            Route::group(['prefix' => 'car', 'as' => 'car.'], function () {
                Route::get('/car', [CarController::class, 'index'])->name('cars');
                Route::get('/Datatable', [CarController::class, 'datatable'])->name('carDatatable');
                Route::get('/create', [CarController::class, 'create'])->name('createcar');
                Route::post('/add', [CarController::class, 'store'])->name('addbcar');
                Route::post('/delete', [CarController::class, 'destroy'])->name('deletecar');
                Route::get('/edit/{id}', [CarController::class, 'edit'])->name('editcar');
                Route::post('/update/{id}', [CarController::class, 'update'])->name('updatecar');

                Route::get('/editimage', [CarController::class, 'editimage'])->name('editimage');
                Route::get('/getimagesvue/{id}', [CarController::class, 'getimagesvue'])->name('getimagesvue');
                Route::post('/deleteimage', [CarController::class, 'deleteimage'])->name('deleteimage');
                Route::post('/updateimage', [CarController::class, 'updateimage'])->name('updateimage');
            });

            Route::group(['prefix' => 'boat', 'as' => 'boat.'], function () {
                Route::get('/boat', [BoatController::class, 'index'])->name('boats');
                //Route::get('/Datatable', [BoatController::class, 'datatable'])->name('boatDatatable');
                Route::get('/create', [BoatController::class, 'create'])->name('createboat');
                Route::post('/add', [BoatController::class, 'store'])->name('addbboat');
                Route::post('/delete', [BoatController::class, 'delete'])->name('deleteboat');
                Route::get('/show/{id}', [BoatController::class, 'show'])->name('showboat');
                Route::get('/edit/{id}', [BoatController::class, 'edit'])->name('editboat');
                Route::post('/update/{id}', [BoatController::class, 'update'])->name('updateboat');

                Route::get('/editimage', [BoatController::class, 'editimage'])->name('editimage');
                Route::get('/getimagesvue/{id}', [BoatController::class, 'getimagesvue'])->name('getimagesvue');
                Route::post('/deleteimage', [BoatController::class, 'deleteimage'])->name('deleteimage');
                Route::post('/updateimage', [BoatController::class, 'updateimage'])->name('updateimage');
            });

            Route::group(['prefix' => 'message', 'as' => 'message.'], function () {
                Route::get('/message', [MessageController::class, 'show'])->name('messages');
                Route::get('/Datatable', [MessageController::class, 'datatable'])->name('messageDatatable');
                Route::post('/delete', [MessageController::class, 'delete'])->name('deletemessage');
            });

        });
    });
}); //prevent back


Route::get('/', function () {
    return view('welcome');
});
Route::get('/trt', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('layout.metronic');
});

Route::get('/testt', function () {
    return view('admins.auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pay', function () {
    return view('paypal');
});
Route::get('/payments/verify/{payment?}', [PaypalController::class, 'payment_verify'])->name('verify-payment');
Route::get('/payments/pay', [PaypalController::class, 'pay'])->name('payment-pay');
