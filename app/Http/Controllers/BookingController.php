<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\BookingActivity;
use App\Models\BookingTransport;
use App\Models\Event;
use App\Models\Hotel;
use App\Models\LiveBoard;
use App\Models\Package;
use App\Models\Zone;
use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function activityBooking(Request $request)
    {

        try {
            $user = $request->user();

            $request->validate([
                'activity_id' => 'required',
                'whats' => 'required',
                'location' => 'required',
                'adult_num' => 'required',
                'child_num' => 'required',
                'activity_date' => 'required',
            ]);
            
            $uselessBookings = BookingActivity::where('payment_status','not payed')->get();
            $now = Carbon::now();
            foreach ($uselessBookings as $less) {
                $time = date('Y-m-d H:i:s', strtotime($less->created_at));
                $duration = $now->diffInHours($time);
                if ($duration>24) {
                    $less->forceDelete();
                }
            }
                
                
            $activity = Activity::find($request->activity_id);
            $count = $request->adult_num + $request->child_num;
            $totalCost =  $activity->price * $request->adult_num + $activity->price/2 * $request->child_num  + $count * $activity->additionalprice;
            // $totalCost = $totalCost1 + $count * $activity->additionalprice ;
            $booking = new BookingActivity();
            $booking->activity_id = $request->activity_id;
            $booking->type = 'activity';
            $booking->user_id = $user->id;
            $booking->adult_num = $request->adult_num;
            $booking->child_num = $request->child_num;
            $booking->infant_num = $request->infant_num;
            $booking->total_price = $totalCost;
            $booking->additionalprice = $activity->additionalprice;
            $booking->descriptiuonadditionalprice_en = $activity->descriptiuonadditionalprice_en;
            $booking->descriptiuonadditionalprice_de = $activity->descriptiuonadditionalprice_de;
            $booking->descriptiuonadditionalprice_cz = $activity->descriptiuonadditionalprice_cz;
            $booking->price = $activity->price;
            $code = BookingActivity::select('code')->latest()->limit(1)->get()->toArray();
            //return response()->json($code[0]['code'], 404);
            $booking->code  = $code[0]['code']+1;
            
            $date = strtotime("+1 day", strtotime($request->activity_date));
            $booking->activity_date =date("Y-m-d", $date);
            $booking->whats = $request->whats;
            $booking->location = $request->location;
            $booking->save();
            return response()->json(['booking' => $booking], 200);
        } catch (\Exception $e) {
            return response()->json(['err' => true, 'msg' => $e->getMessage()], 404);
        }
    }
    public function packageBooking(Request $request)
    {

        try {
            $user = $request->user();

            $request->validate([
                'package_id' => 'required',

                'adult_num' => 'required',
                'child_num' => 'required',
                'activity_date' => 'required',
                'whats' => 'required',
                'location' => 'required',
            ]);
            $activity = Package::find($request->package_id);
            $count = $request->adult_num + $request->child_num;
            $totalCost = $activity->price * $request->adult_num + $activity->price/2 * $request->child_num + $count * $activity->additionalprice;
            $booking = new BookingActivity();
            $booking->activity_id = $request->package_id;
            $booking->type = 'package';
            $booking->user_id = $user->id;
            $booking->adult_num = $request->adult_num;
            $booking->child_num = $request->child_num;
            $booking->infant_num = $request->infant_num;
            $booking->additionalprice = $activity->additionalprice;
            $booking->descriptiuonadditionalprice_en = $activity->descriptiuonadditionalprice_en;
            $booking->descriptiuonadditionalprice_de = $activity->descriptiuonadditionalprice_de;
            $booking->descriptiuonadditionalprice_cz = $activity->descriptiuonadditionalprice_cz;
            $booking->price = $activity->price;
            $booking->total_price = $totalCost;
            $date = strtotime("+1 day", strtotime($request->activity_date));
            $booking->activity_date =date("Y-m-d", $date);

            $booking->whats = $request->whats;
            $booking->location = $request->location;
        
            $booking->save();
            return response()->json(['booking' => $booking], 200);
        } catch (\Exception $e) {
            return response()->json(['err' => true, 'msg' => $e->getMessage()], 404);
        }
    }
    public function liveboardBooking(Request $request)
    {

        try {
            $user = $request->user();

            $request->validate([
                'liveboard_id' => 'required',

                'adult_num' => 'required',
                'child_num' => 'required',
                'activity_date' => 'required',
                'whats' => 'required',
                'location' => 'required',
            ]);
            $activity = LiveBoard::find($request->liveboard_id);
            $count = $request->adult_num + $request->child_num;
            // $totalCost = $activity->price * $request->adult_num + $activity->price_child * $request->child_num + $count * $activity->additionalprice;
            $totalCost = $activity->price * $request->adult_num +  $activity->price/2 * $request->child_num + $count * $activity->additionalprice;
            $booking = new BookingActivity();
            $booking->activity_id = $request->liveboard_id;
            $booking->type = 'liveboard';
            $booking->user_id = $user->id;
            $booking->adult_num = $request->adult_num;
            $booking->child_num = $request->child_num;
            $booking->additionalprice = $activity->additionalprice;
            $booking->descriptiuonadditionalprice_en = $activity->descriptiuonadditionalprice_en;
            $booking->descriptiuonadditionalprice_de = $activity->descriptiuonadditionalprice_de;
            $booking->descriptiuonadditionalprice_cz = $activity->descriptiuonadditionalprice_cz;
            $booking->price = $activity->price;
            $booking->total_price = $totalCost;
            $date = strtotime("+1 day", strtotime($request->activity_date));
            $booking->activity_date =date("Y-m-d", $date);

            $booking->whats = $request->whats;
            $booking->location = $request->location;

            $booking->save();
            return response()->json(['booking' => $booking], 200);
        } catch (\Exception $e) {
            return response()->json(['err' => true, 'msg' => $e->getMessage()], 404);
        }
    }
    public function eventBooking(Request $request)
    {

        try {
            $user = $request->user();

            $request->validate([
                'event_id' => 'required',

                'adult_num' => 'required',
                'child_num' => 'required',
                'activity_date' => 'required',
                'whats' => 'required',
                'location' => 'required',
            ]);
            $activity = Event::find($request->event_id);
            $count = $request->adult_num + $request->child_num;
            // $totalCost = $activity->price * $request->adult_num + $activity->price_child * $request->child_num + $count * $activity->additionalprice;
            $totalCost = $activity->price * $request->adult_num +  $activity->price/2 * $request->child_num + $count * $activity->additionalprice;
            $booking = new BookingActivity();
            $booking->activity_id = $request->event_id;
            $booking->type = 'event';
            $booking->user_id = $user->id;
            $booking->adult_num = $request->adult_num;
            $booking->child_num = $request->child_num;
            $booking->additionalprice = $activity->additionalprice;
            $booking->descriptiuonadditionalprice_en = $activity->descriptiuonadditionalprice_en;
            $booking->descriptiuonadditionalprice_de = $activity->descriptiuonadditionalprice_de;
            $booking->descriptiuonadditionalprice_cz = $activity->descriptiuonadditionalprice_cz;
            $booking->price = $activity->price;
            $booking->total_price = $totalCost;
            $date = strtotime("+1 day", strtotime($request->activity_date));
            $booking->activity_date =date("Y-m-d", $date);

            $booking->whats = $request->whats;
            $booking->location = $request->location;

            $booking->save();
            return response()->json(['booking' => $booking], 200);
        } catch (\Exception $e) {
            return response()->json(['err' => true, 'msg' => $e->getMessage()], 404);
        }
    }
    public function userActivityBookings(Request $request)
    {

        $book = BookingActivity::where('user_id', $request->user()->id)->where('type', 'activity')->where('payment_status','!=','not payed')->get();
        foreach($book as $slug)
        {
            $bookingslug = Activity::where('id',$slug->activity_id)->first();
            $slug->slug = $bookingslug->slug;
        }
        
        return $book;
    }
    public function userTourBookings(Request $request)
    {
        try {

            $book = BookingActivity::where('user_id', $request->user()->id)->where('type', 'activity')->where('payment_status','!=','not payed')->get();
            //// return $book;
            $result = [];
            $activ = [];
            foreach ($book as $book) {
                $activity = Activity::where('id', $book->activity_id)->where('type_id', 4)->get();
                //return $activity;
                array_push($activ, $activity);
                foreach ($activity as $act) 
                {
                    if ($book->activity_id == $act->id) 
                    {
                        array_push($result, $book);
                    }
                }
            }

            return response()->json(['booking details' => $result, 'Activity details' => array_unique($activ)]);
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function userDiveBookings(Request $request)
    {
        try {

            $book = BookingActivity::where('user_id', $request->user()->id)->where('type', 'activity')->where('payment_status','!=','not payed')->get();
            //// return $book;
            $result = [];
            $activ = [];
            foreach ($book as $book) {
                $activity = Activity::where('id', $book->activity_id)->where('type_id', 2)->get();
                //return $activity;
                array_push($activ, $activity);
                foreach ($activity as $act) {
                    if ($book->activity_id == $act->id) {
                        array_push($result, $book);
                    }
                }
            }

            return response()->json(['booking details' => $result, 'Activity details' => array_unique($activ)]);
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function userSnorBookings(Request $request)
    {
        try {

            $book = BookingActivity::where('user_id', $request->user()->id)->where('type', 'activity')->where('payment_status','!=','not payed')->get();
            //// return $book;
            $result = [];
            $activ = [];
            foreach ($book as $book) {
                $activity = Activity::where('id', $book->activity_id)->where('type_id', 1)->get();
                //return $activity;
                array_push($activ, $activity);
                foreach ($activity as $act) {
                    if ($book->activity_id == $act->id) {
                        array_push($result, $book);
                    }
                }
            }

            return response()->json(['booking details' => $result, 'Activity details' => array_unique($activ)]);
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function userSafariBookings(Request $request)
    {
        try {

            $book = BookingActivity::where('user_id', $request->user()->id)->where('type', 'activity')->where('payment_status','!=','not payed')->get();
            //// return $book;
            $result = [];
            $activ = [];
            foreach ($book as $book) 
            {
                $activity = Activity::where('id', $book->activity_id)->where('type_id', 3)->get();
                //return $activity;
                array_push($activ, $activity);
                foreach ($activity as $act) {
                    if ($book->activity_id == $act->id) {
                        array_push($result, $book);
                    }
                }
            }

            return response()->json(['booking details' => $result, 'Activity details' => array_unique($activ)]);
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function userPackageBookings(Request $request)
    {

        $book = BookingActivity::where('user_id', $request->user()->id)->where('type', 'package')->where('payment_status','!=','not payed')->get();
        foreach($book as $slug)
        {
            $bookingslug = Package::where('id',$slug->activity_id)->first();
            $slug->slug = $bookingslug->slug;
        }
        return $book;
    }
    public function userLiverboardBookings(Request $request)
    {

        $book = BookingActivity::where('user_id', $request->user()->id)->where('type', 'liveboard')->where('payment_status','!=','not payed')->get();
        foreach($book as $slug)
        {
            $bookingslug = LiveBoard::where('id',$slug->activity_id)->first();
            $slug->slug = $bookingslug->slug;
        }
        return $book;
    }
    public function userTransportBookings(Request $request)
    {

        $book = BookingTransport::where('user_id', $request->user()->id)->where('payment_status','<>','not payed')->get();
        // foreach($book as $slug)
        // {
        //     $bookingslug = LiveBoard::where('id',$slug->activity_id)->first();
        //     $slug->slug = $bookingslug->slug;
        // }
        return $book;
    }
    public function userEventBookings(Request $request)
    {

        $book = BookingActivity::where('user_id', $request->user()->id)->where('type', 'event')->get();
        foreach($book as $slug)
        {
            $bookingslug = Event::where('id',$slug->activity_id)->first();
            $slug->slug = $bookingslug->slug;
        }
        return $book;
    }
    public function transportBooking(Request $request)
    {
        //dd($request->all());
        try 
        {
            $user = $request->user();
            $request->validate([
                'from' => 'required',
                'adult_num' => 'required',
                'child_num' => 'required',
                'infant_num' => 'required',
                'to' => 'required',
                'car_type' => 'required',
                'email' => 'required',
                'whatsapp' => 'required',
                //'longitude' => 'required',
                //'latitude' => 'required',
                ]);
            $flag = $request->currentLocation;
            $uselessBookings = BookingTransport::where('payment_status','not payed')->get();
            // dd($uselessBookings);
            $now = Carbon::now();
            foreach ($uselessBookings as $less) {
                $time = date('Y-m-d H:i:s', strtotime($less->created_at));
                $duration = $now->diffInHours($time);
                if ($duration>24) {
                    $less->forceDelete();
                }
            }
            if ($flag == 1) 
            {
                //return 'hi';
                $zones = Zone::all();
                //return $zones;
                $distances = [];
                foreach ($zones as $zone) {
                    $fromLong = $request->longitude;
                    $fromLat = $request->latitude;
                    $toLong = $zone->longitude;
                    $toLat = $zone->latitude;
                    $theta    = $fromLong - $toLong;
                    $dist    = sin(deg2rad($fromLat)) * sin(deg2rad($toLat)) +  cos(deg2rad($fromLat)) * cos(deg2rad($toLat)) * cos(deg2rad($theta));
                    $dist    = acos($dist);
                    $dist    = rad2deg($dist);
                    array_push($distances, $dist);
                }
                
                
                $zone = Zone::find(array_search(min($distances), $distances) + 1);
                //return $zone;
                $hotel1=Hotel::where('name',$request->from)->first();
               
                if($hotel1==null)
                {
                    // return 'hi';
                    $hotel = new Hotel();
                    $hotel->name = $request->from;
                    $hotel->zone_id=$zone->id;
                    $hotel->save();
                }
                
                $booking = new BookingTransport();
                $booking->zone_id = $zone->id;
                $booking->user_id = $user->id;
                $booking->from = $request->from;
                $booking->to = $request->to;
                $date = strtotime("+1 day", strtotime($request->pickup_date));
                $booking->pickup_date =date("Y-m-d", $date);
                $booking->pickup_time = $request->pickup_time;
                
                $booking->email = $request->email;
                $booking->whatsapp = $request->whatsapp;
                $booking->notes = $request->notes;
                $code = BookingTransport::select('code')->latest()->limit(1)->get()->toArray();
                
                $booking->code = $code[0]['code']+1;
                $booking->adult_num = $request->adult_num;
                $booking->child_num = $request->child_num;
                $booking->infant_num = $request->infant_num;
                $booking->car_type = $request->car_type;
                $people =  $booking->adult_num + $booking->child_num;
                $car_count = 1;
                
                $booking->airport = $request->to;
                if ($request->to == 'hurghada') {
                    if ($request->car_type == 'limousine') {
                        if ($people > 3) {
                            $car_count = ceil($people / 3);
                            $totalCost = $car_count * $zone->hurgada_limo;
                        } else {
                            $totalCost = $zone->hurgada_limo;
                        }
                    } else {

                        if ($request->adult_num + $request->child_num > 4) {
                            if ($people > 12) {
                                $car_count = ceil($people / 12);
                                $totalCost = ($car_count * $zone->hurgada_hs) + ($request->adult_num - (4 * $car_count)) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;
                            } else {
                                $totalCost = $zone->hurgada_hs + ($request->adult_num - 4) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;;
                            }
                        } else {
                            $totalCost = $zone->hurgada_hs;
                        }
                    }
                } else {
                    if ($request->car_type == 'limousine') {
                        if ($people > 3) {
                            $car_count = ceil($people / 3);
                            $totalCost = $car_count * $zone->marsa_limo;
                        } else {
                            $totalCost = $zone->marsa_limo;
                        }
                    } else {
                        if ($request->adult_num + $request->child_num > 4) {
                            if ($people > 12) {
                                $car_count = ceil($people / 12);
                                $totalCost = ($car_count * $zone->marsa_hs) + ($request->adult_num - (4 * $car_count)) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;
                            } else {
                                $totalCost = $zone->marsa_hs + ($request->adult_num - 4) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;;
                            }
                        } else {
                            $totalCost = $zone->marsa_hs;
                        }
                    }
                }
                $booking->car_count = $car_count;
                $booking->total_price = $totalCost;

                $booking->save();
                return response()->json(['bookingTransport' => $booking], 200);
            } 
            else 
            {
                //$hotel = Hotel::where('name', 'like', "%{$request->from}%")->orWhere('name', 'like', "%{$request->to}%")->first();
                $hotel = Hotel::where('name', $request->from)->orWhere('name', $request->to)->first();
                //dd($hotel);
                $zone = Zone::find($hotel->zone_id);
                $booking = new BookingTransport();
                $booking->zone_id = $zone->id;
                $booking->user_id = $user->id;
                $booking->from = $request->from;
                $booking->to = $request->to;
                $date = strtotime("+1 day", strtotime($request->pickup_date));
                $booking->pickup_date =date("Y-m-d", $date);
                $booking->pickup_time = $request->pickup_time;
                
                $booking->adult_num = $request->adult_num;
                $booking->child_num = $request->child_num;
                $booking->infant_num = $request->infant_num;
                $booking->email = $request->email;
                $booking->whatsapp = $request->whatsapp;
                $booking->notes = $request->notes;
                $code = BookingTransport::select('code')->latest()->limit(1)->get()->toArray();
                $booking->code  = $code[0]['code']+1;
                $booking->car_type = $request->car_type;
                $people =  $booking->adult_num + $booking->child_num;
                $car_count = 1;
                if ($hotel->name != $request->from) 
                {
                    $booking->airport = $request->from;
                    if ($request->from == 'hurghada') 
                    {
                        if ($request->car_type == 'limousine') 
                        {
                            if ($people > 3) 
                            {
                                $car_count = ceil($people / 3);
                                $totalCost = $car_count * $zone->hurgada_limo;
                            } 
                            else 
                            {
                                $totalCost = $zone->hurgada_limo;
                            }
                        } 
                        else 
                        {

                            if ($request->adult_num + $request->child_num > 4) 
                            {
                                if ($people > 12) 
                                {
                                    $car_count = ceil($people / 12);
                                    $totalCost = ($car_count * $zone->hurgada_hs) + ($request->adult_num - (4 * $car_count)) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;
                                } 
                                else 
                                {
                                    $totalCost = $zone->hurgada_hs + ($request->adult_num - 4) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;;
                                }
                            } 
                            else 
                            {
                                $totalCost = $zone->hurgada_hs;
                            }
                        }
                        //dd($hotel);
                    } 
                    else 
                    {
                        if ($request->car_type == 'limousine') 
                        {
                            if ($people > 3) 
                            {
                                $car_count = ceil($people / 3);
                                $totalCost = $car_count * $zone->marsa_limo;
                            } 
                            else 
                            {
                                $totalCost = $zone->marsa_limo;
                            }
                        } 
                        else 
                        {
                            if ($request->adult_num + $request->child_num > 4) 
                            {
                                if ($people > 12) 
                                {
                                    $car_count = ceil($people / 12);
                                    $totalCost = ($car_count * $zone->marsa_hs) + ($request->adult_num - (4 * $car_count)) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;
                                } 
                                else 
                                {
                                    $totalCost = $zone->marsa_hs + ($request->adult_num - 4) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;;
                                }
                            } 
                            else 
                            {
                                $totalCost = $zone->marsa_hs;
                            }
                        }
                        //dd($hotel);
                    }
                    
                } 
                else 
                {
                    $booking->airport = $request->to;
                    if ($request->to == 'hurghada') {
                        if ($request->car_type == 'limousine') {
                            if ($people > 3) {
                                $car_count = ceil($people / 3);
                                $totalCost = $car_count * $zone->hurgada_limo;
                            } else {
                                $totalCost = $zone->hurgada_limo;
                            }
                        } else {

                            if ($request->adult_num + $request->child_num > 4) {
                                if ($people > 12) {
                                    $car_count = ceil($people / 12);
                                    $totalCost = ($car_count * $zone->hurgada_hs) + ($request->adult_num - (4 * $car_count)) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;
                                } else {
                                    $totalCost = $zone->hurgada_hs + ($request->adult_num - 4) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;;
                                }
                            } else {
                                $totalCost = $zone->hurgada_hs;
                            }
                        }
                    } else {
                        if ($request->car_type == 'limousine') {
                            if ($people > 3) {
                                $car_count = ceil($people / 3);
                                $totalCost = $car_count * $zone->marsa_limo;
                            } else {
                                $totalCost = $zone->marsa_limo;
                            }
                        } else {
                            if ($request->adult_num + $request->child_num > 3) {
                                if ($people > 12) {
                                    $car_count = ceil($people / 12);
                                    $totalCost = ($car_count * $zone->marsa_hs) + ($request->adult_num - (4 * $car_count)) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;
                                } else {
                                    $totalCost = $zone->marsa_hs + ($request->adult_num - 4) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;;
                                }
                            } else {
                                $totalCost = $zone->marsa_hs;
                            }
                        }
                    }
                    //dd($hotel);
                }
                $booking->car_count = $car_count;
                $booking->total_price = $totalCost;

                $booking->save();
                return response()->json(['bookingTransport' => $booking], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['err' => true, 'msg' => $e->getMessage()], 404);
        }
    }
    public function transportTwoWayBooking(Request $request)
    {
        try {
            $user = $request->user();
            $request->validate([
                'from' => 'required',

                'adult_num' => 'required',
                'child_num' => 'required',
                'to' => 'required',
                'car_type' => 'required',
                'return_pickup_date' => 'required',
                'return_pickup_time' => 'required',
                'email' => 'required',
                'whatsapp' => 'required',
                //'longitude' => 'required',
                //'latitude' => 'required',

            ]);
            $uselessBookings = BookingTransport::where('payment_status','not payed')->get();
            $now = Carbon::now();
            foreach ($uselessBookings as $less) {
                $time = date('Y-m-d H:i:s', strtotime($less->created_at));
                $duration = $now->diffInHours($time);
                if ($duration>24) {
                    $less->forceDelete();
                }
            }
            if ($request->currentLocation == 1) {
                
                //return $request->longitude;
                $zones = Zone::all();
                //return $zones;
                $distances = [];
                foreach ($zones as $zone) {
                    $fromLong = $request->longitude;
                    $fromLat = $request->latitude;
                    $toLong = $zone->longitude;
                    $toLat = $zone->latitude;
                    $theta    = $fromLong - $toLong;
                    $dist    = sin(deg2rad($fromLat)) * sin(deg2rad($toLat)) +  cos(deg2rad($fromLat)) * cos(deg2rad($toLat)) * cos(deg2rad($theta));
                    $dist    = acos($dist);
                    $dist    = rad2deg($dist);
                    array_push($distances, $dist);
                }
                
                $zone = Zone::find(array_search(min($distances), $distances) + 1);
                $hotel1=Hotel::where('name',$request->from)->first();
               
                if($hotel1==null){
                    // return 'hi';
                    $hotel = new Hotel();
                    $hotel->name = $request->from;
                    $hotel->zone_id=$zone->id;
                    $hotel->save();
                }
                $booking = new BookingTransport();
                $booking1 = new BookingTransport();
                $booking->zone_id = $zone->id;
                $booking->user_id = $user->id;
                $booking->from = $request->from;
                $booking->to = $request->to;
                $date = strtotime("+1 day", strtotime($request->pickup_date));
                $booking->pickup_date =date("Y-m-d", $date);
                $booking->pickup_time = $request->pickup_time;
                $booking->adult_num = $request->adult_num;
                $booking->child_num = $request->child_num;
                $booking->infant_num = $request->infant_num;
                $booking->car_type = $request->car_type;
                $booking1->zone_id = $zone->id;
                $booking1->user_id = $user->id;
                $booking1->from = $request->to;
                $booking1->to = $request->from;
                $date = strtotime("+1 day", strtotime($request->return_pickup_date));
                $booking1->pickup_date =date("Y-m-d", $date);
                $booking1->pickup_time = $request->return_pickup_time;
                
                $booking->email = $request->email;
                $booking->whatsapp = $request->whatsapp;
                $booking1->email = $request->email;
                $booking1->whatsapp = $request->whatsapp;
                $booking->notes = $request->notes;
                $booking1->notes = $request->notes;
                $code = BookingTransport::select('code')->latest()->limit(1)->get()->toArray();
                $booking->code  = $code[0]['code']+1;
                $code = BookingTransport::select('code')->latest()->limit(1)->get()->toArray();
                $booking1->code  = $code[0]['code']+1;
             
                $booking1->adult_num = $request->adult_num;
                $booking1->child_num = $request->child_num;
                $booking1->infant_num = $request->infant_num;
                $booking1->car_type = $request->car_type;
                $people =  $booking->adult_num + $booking->child_num;
                $car_count = 1;

                $booking1->airport = $request->to;
                $booking->airport = $request->to;
                if ($request->to == 'hurghada') {
                    if ($request->car_type == 'limousine') {
                        if ($people > 3) {
                            $car_count = ceil($people / 3);

                            $totalCost1 = $car_count * $zone->hurgada_limo;
                        } else {
                            $totalCost1 = $zone->hurgada_limo;
                        }
                    } else {

                        if ($request->adult_num + $request->child_num > 4) {
                            if ($people > 12) {

                                $car_count = ceil($people / 12);


                                $totalCost1 = ($car_count * $zone->hurgada_hs) + ($request->adult_num - (4 * $car_count)) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;
                            } else {
                                $totalCost1 = $zone->hurgada_hs + ($request->adult_num - 4) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;;
                            }
                        } else {
                            $totalCost1 = $zone->hurgada_hs;
                        }
                    }
                } else {
                    if ($request->car_type == 'limousine') {
                        if ($people > 3) {
                            $car_count = ceil($people / 3);
                            $totalCost1 = $car_count * $zone->marsa_limo;
                        } else {
                            $totalCost1 = $zone->marsa_limo;
                        }
                    } else {
                        if ($request->adult_num + $request->child_num > 4) {
                            if ($people > 12) {
                                $car_count = ceil($people / 12);
                                $totalCost1 = ($car_count * $zone->marsa_hs) + ($request->adult_num - (4 * $car_count)) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;
                            } else {
                                $totalCost1 = $zone->marsa_hs + ($request->adult_num - 4) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;;
                            }
                        } else {
                            $totalCost1 = $zone->marsa_hs;
                        }
                    }
                }



                $booking->total_price = $totalCost1;
                $booking->car_count = $car_count;
                $booking->save();
                $booking1->total_price = $totalCost1;
                $booking1->car_count = $car_count;
                $booking1->save();
                return response()->json(['firstTrip' => $booking, 'secondTrip' => $booking1], 200);
            } else {
                
                $hotel = Hotel::where('name', $request->from)->orWhere('name', $request->to)->first();
                $hotel1 = Hotel::where('name', $request->to)->orWhere('name', $request->from)->first();
                $zone = Zone::find($hotel->zone_id);
                $zone1 = Zone::find($hotel1->zone_id);
                $booking = new BookingTransport();
                $booking1 = new BookingTransport();
                $booking->zone_id = $zone->id;
                $booking->user_id = $user->id;
                $booking->from = $request->from;
                $booking->to = $request->to;
                $booking->pickup_date = $request->pickup_date;
                $booking->pickup_time = $request->pickup_time;
               
                $booking->adult_num = $request->adult_num;
                $booking->child_num = $request->child_num;
                $booking->infant_num = $request->infant_num;
                $booking->car_type = $request->car_type;
                $booking->email = $request->email;
                $booking->whatsapp = $request->whatsapp;
                $booking1->email = $request->email;
                $booking1->whatsapp = $request->whatsapp;
                $booking->notes = $request->notes;
                $booking1->notes = $request->notes;
                $code = BookingTransport::select('code')->latest()->limit(1)->get()->toArray();
                $booking->code  = $code[0]['code']+1;
                $code = BookingTransport::select('code')->latest()->limit(1)->get()->toArray();
                $booking1->code  = $code[0]['code']+1;
                ///
                $booking1->zone_id = $zone->id;
                $booking1->user_id = $user->id;
                $booking1->from = $request->to;
                $booking1->to = $request->from;
                $date = strtotime("+1 day", strtotime($request->return_pickup_date));
                $booking1->pickup_date =date("Y-m-d", $date);
            
                $booking1->pickup_time = $request->return_pickup_time;
            
                $booking1->adult_num = $request->adult_num;
                $booking1->child_num = $request->child_num;
                $booking1->infant_num = $request->infant_num;
                $booking1->car_type = $request->car_type;
                $people =  $booking->adult_num + $booking->child_num;
                $car_count = 1;
                if ($hotel1->name != $request->to) {
                    $booking1->airport = $request->to;
                    $booking->airport = $request->to;
                    if ($request->to == 'hurghada') {
                        if ($request->car_type == 'limousine') {
                            if ($people > 3) {
                                $car_count = ceil($people / 3);

                                $totalCost1 = $car_count * $zone->hurgada_limo;
                            } else {
                                $totalCost1 = $zone->hurgada_limo;
                            }
                        } else {

                            if ($request->adult_num + $request->child_num > 4) {
                                if ($people > 12) {

                                    $car_count = ceil($people / 12);
                                    $totalCost1 = ($car_count * $zone->hurgada_hs) + ($request->adult_num - (4 * $car_count)) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;
                                } else {
                                    $totalCost1 = $zone->hurgada_hs + ($request->adult_num - 4) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;;
                                }
                            } else {
                                $totalCost1 = $zone->hurgada_hs;
                            }
                        }
                    } else {
                        if ($request->car_type == 'limousine') {
                            if ($people > 3) {
                                $car_count = ceil($people / 3);
                                $totalCost1 = $car_count * $zone->marsa_limo;
                            } else {
                                $totalCost1 = $zone->marsa_limo;
                            }
                        } else {
                            if ($request->adult_num + $request->child_num > 4) {
                                if ($people > 12) {
                                    $car_count = ceil($people / 12);
                                    $totalCost1 = ($car_count * $zone->marsa_hs) + ($request->adult_num - (4 * $car_count)) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;
                                } else {
                                    $totalCost1 = $zone->marsa_hs + ($request->adult_num - 4) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;;
                                }
                            } else {
                                $totalCost1 = $zone->marsa_hs;
                            }
                        }
                    }
                } else {
                    $booking->airport = $request->from;
                    $booking1->airport = $request->from;
                    if ($request->from == 'hurghada') {
                        if ($request->car_type == 'limousine') {
                            if ($people > 3) {
                                $car_count = ceil($people / 3);
                                $totalCost1 = $car_count * $zone->hurgada_limo;
                            } else {
                                $totalCost1 = $zone->hurgada_limo;
                            }
                        } else {

                            if ($request->adult_num + $request->child_num > 4) {
                                if ($people > 12) {
                                    $car_count = ceil($people / 12);
                                    $totalCost1 = ($car_count * $zone->hurgada_hs) + ($request->adult_num - (4 * $car_count)) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;
                                } else {
                                    $totalCost1 = $zone->hurgada_hs + ($request->adult_num - 4) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;;
                                }
                            } else {
                                $totalCost1 = $zone->hurgada_hs;
                            }
                        }
                    } else {
                        if ($request->car_type == 'limousine') {
                            if ($people > 3) {
                                $car_count = ceil($people / 3);
                                $totalCost1 = $car_count * $zone->marsa_limo;
                            } else {
                                $totalCost1 = $zone->marsa_limo;
                            }
                        } else {
                            if ($request->adult_num + $request->child_num > 4) {
                                if ($people > 12) {
                                    $car_count = ceil($people / 12);
                                    $totalCost1 = ($car_count * $zone->marsa_hs) + ($request->adult_num - (4 * $car_count)) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;
                                } else {
                                    $totalCost1 = $zone->marsa_hs + ($request->adult_num - 4) * $zone->added_hs_per_person + $request->child_num * $zone->added_hs_per_child;;
                                }
                            } else {
                                $totalCost1 = $zone->marsa_hs;
                            }
                        }
                    }
                }



                $booking->total_price = $totalCost1;
                $booking->car_count = $car_count;
                $booking->save();
                $booking1->total_price = $totalCost1;
                $booking1->car_count = $car_count;
                $booking1->save();
                return response()->json(['firstTrip' => $booking, 'secondTrip' => $booking1], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['err' => true, 'msg' => $e->getMessage()], 404);
        }
    }
    public function activityBookingCancel(Request $request)
    {
        try {
            $book = BookingActivity::findOrFail($request->booking_id);
            if ($book->payment_method == 'cash') {
                $book->cancel = 'requested';
                $book->refund = 'done';
                $book->save();
                return response()->json(['err' => false, 'msg' => 'cancelation completed succefully'], 200);
            } else {
                $now = Carbon::now();
                $time = date('Y-m-d H:i:s', strtotime($book->activity_date));
                $duration = $now->diffInHours($time);

                if ($duration > 24) {
                    $book->cancel = 'requested';
                    $book->save();
                    return response()->json(['err' => false, 'msg' => 'cancel request sent succefully'], 200);
                } else {
                    $book->cancel = 'time not enough';
                    $book->save();
                    return response()->json(['err' => false, 'msg' => 'cancel request denied less than 24 hours'], 200);
                }
            }
        } catch (\Exception $e) {
            return response()->json(['err' => true, 'msg' => $e->getMessage()], 404);
        }
    }

    public function transportBookingCancel(Request $request)
    {
        try 
        {
            $book = BookingTransport::findOrFail($request->booking_id);
            if ($book->payment_method == 'cash') 
            {
                $book->cancel = 'requested';
                $book->refund = 'done';
                $book->save();
                return response()->json(['err' => false, 'msg' => 'cancelation completed succefully'], 200);
            } 
            else 
            {
                $now = Carbon::now();
                $time = date('Y-m-d H:i:s', strtotime($book->pickup_date));
                $duration = $now->diffInHours($time);

                if ($duration > 24) 
                {
                    $book->cancel = 'requested';
                    $book->save();
                    return response()->json(['err' => false, 'msg' => 'cancel request sent succefully'], 200);
                } 
                else 
                {
                    $book->cancel = 'time not enough';
                    $book->save();
                    return response()->json(['err' => false, 'msg' => 'cancel request denied less than 24 hours'], 200);
                }
            }
        } 
        catch (\Exception $e) 
        {
            return response()->json(['err' => true, 'msg' => $e->getMessage()], 404);
        }
    }

    public function userActivityPayments(Request $request)
    {

        $book = BookingActivity::where('user_id', $request->user()->id)->where('type', 'activity')->where('payment_status', '<>','not payed')->get();
        return $book;
    }
    public function userTourPayments(Request $request)
    {
        try {

            $book = BookingActivity::where('user_id', $request->user()->id)->where('type', 'activity')->where('payment_status','<>','not payed')->get();
            //// return $book;
            $result = [];
            $activ = [];
            foreach ($book as $book) {
                $activity = Activity::where('id', $book->activity_id)->where('type_id', 4)->get();
                //return $activity;
                array_push($activ, $activity);
                foreach ($activity as $act) {
                    if ($book->activity_id == $act->id) {
                        array_push($result, $book);
                    }
                }
            }

            return response()->json(['booking_details' => $result, 'Activity_details' => array_unique($activ)]);
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function userDivePayments(Request $request)
    {
        try {

            $book = BookingActivity::where('user_id', $request->user()->id)->where('type', 'activity')->where('payment_status', '<>','not payed')->get();
            //// return $book;
            $result = [];
            $activ = [];
            foreach ($book as $book) {
                $activity = Activity::where('id', $book->activity_id)->where('type_id', 2)->get();
                //return $activity;
                array_push($activ, $activity);
                foreach ($activity as $act) {
                    if ($book->activity_id == $act->id) {
                        array_push($result, $book);
                    }
                }
            }

            return response()->json(['booking_details' => $result, 'Activity_details' => array_unique($activ)]);
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function userSnorPayments(Request $request)
    {
        try {

            $book = BookingActivity::where('user_id', $request->user()->id)->where('type', 'activity')->where('payment_status','<>','not payed')->get();
            //// return $book;
            $result = [];
            $activ = [];
            foreach ($book as $book) {
                $activity = Activity::where('id', $book->activity_id)->where('type_id', 1)->get();
                //return $activity;
                array_push($activ, $activity);
                foreach ($activity as $act) {
                    if ($book->activity_id == $act->id) {
                        array_push($result, $book);
                    }
                }
            }

            return response()->json(['booking_details' => $result, 'Activity_details' => array_unique($activ)]);
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function userSafariPayments(Request $request)
    {
        try {

            $book = BookingActivity::where('user_id', $request->user()->id)->where('type', 'activity')->where('payment_status', '<>','not payed')->get();
            //// return $book;
            $result = [];
            $activ = [];
            foreach ($book as $book) {
                $activity = Activity::where('id', $book->activity_id)->where('type_id', 3)->get();
                //return $activity;
                array_push($activ, $activity);
                foreach ($activity as $act) {
                    if ($book->activity_id == $act->id) {
                        array_push($result, $book);
                    }
                }
            }

            return response()->json(['booking_details' => $result, 'Activity_details' => array_unique($activ)]);
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function userPackagePayments(Request $request)
    {

        $book = BookingActivity::where('user_id', $request->user()->id)->where('type', 'package')->where('payment_status', '<>','not payed')->get();
        return $book;
    }
    public function userLiverboardPayments(Request $request)
    {

        $book = BookingActivity::where('user_id', $request->user()->id)->where('type', 'liveboard')->where('payment_status', '<>','not payed')->get();
        return $book;
    }
    public function userTransportPayments(Request $request)
    {

        $book = BookingTransport::where('user_id', $request->user()->id)->where('payment_status', '<>','not payed')->get();
        return $book;
    }
    public function userEventPayments(Request $request)
    {

        $book = BookingActivity::where('user_id', $request->user()->id)->where('type', 'event')->where('payment_status', '<>','not payed')->get();
        return $book;
    }
}
