<?php

namespace App\Http\Controllers;

use App\Models\ActivityBooking;
use App\Models\BookingActivity;
use App\Models\BookingTransport;
use App\Models\Favourite;
use App\Models\User;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $activ = BookingActivity::where('user_id',$user->id)->get();
        $activcancel = BookingActivity::where('user_id',$user->id)->where('refund','done')->where('type','activity')->get();
        $eventcancel = BookingActivity::where('user_id',$user->id)->where('refund','done')->where('type','event')->get();
        $packagecancel = BookingActivity::where('user_id',$user->id)->where('refund','done')->where('type','package')->get();
        $liveboardcancel = BookingActivity::where('user_id',$user->id)->where('refund','done')->where('type','liveboard')->get();
        $fav=Favourite::where('user_id',$user->id)->get();
        $transportCancel = BookingTransport::where('user_id',$user->id)->where('refund','done')->get();
        $transport = BookingTransport::where('user_id',$user->id)->get();
        return response()->json(['bookingTransport' => count($transport),'activities' => count($activ),'canceled_activities' => count($activcancel),'transport_canceled' => count($transportCancel),'favourites' => count($fav),'event_cancel' => count($eventcancel),'package_cancel' => count($packagecancel),'liveboard_cancel' => count($liveboardcancel)], 200);
    }
}
