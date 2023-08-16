<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Event;
use App\Models\Favourite;
use App\Models\FavouriteEvent;
use App\Models\FavouriteLiveboard;
use App\Models\FavouritePackage;
use App\Models\LiveBoard;
use App\Models\Package;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{

    public function getAllActivities(Request $request)
    {

        try {

            $book = Favourite::where('user_id', $request->user()->id)->get();
            //return $book;
            $result = [];
            $activ = [];
            foreach ($book as $book) {
                $activity = Activity::where('id', $book->activity_id)->first();
                if ($activity != null) {
                    if (!in_array($activity, $activ)) {
                        $activity->image = url('images/activities/' . $activity->image);
                        array_push($activ, $activity);
                    }
    
    
                    if ($book->activity_id == $activity->id) {
                        if (!in_array($book, $result, true)) {
                            array_push($result, $book);
                        }
                    }
                }
              
            }

            return response()->json(['favourite_details' => $result, 'Activity_details' => $activ]);
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function getAllTours(Request $request)
    {

        try {

            $book = Favourite::where('user_id', $request->user()->id)->get();
            //return $book;
            $result = [];
            $activ = [];
            foreach ($book as $boo) {
                $activity = Activity::where('id', $boo->activity_id)->where('type_id', 4)->first();
                if ($activity != null) {
                    if (!in_array($activity, $activ)) {
                        $activity->image = url('images/activities/' . $activity->image);
                        array_push($activ, $activity);
                    }
                    if ($boo->activity_id == $activity->id) {
                        if (!in_array($boo, $result, true)) {
                            array_push($result, $boo);
                        }
                    }
                }
            }

            return response()->json(['favourite_details' => $result, 'Activity_details' => $activ]);
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function getAllDiving(Request $request)
    {

        try {

            $book = Favourite::where('user_id', $request->user()->id)->get();
            //return $book;
            $result = [];
            $activ = [];
            foreach ($book as $book) {

                $activity = Activity::where('id', $book->activity_id)->where('type_id', 2)->first();
                if ($activity != null) {
                    if (!in_array($activity, $activ)) {
                        $activity->image = url('images/activities/' . $activity->image);
                        array_push($activ, $activity);
                    }


                    if ($book->activity_id == $activity->id) {
                        if (!in_array($book, $result, true)) {
                            array_push($result, $book);
                        }
                    }
                }
            }

            return response()->json(['favourite_details' => $result, 'Activity_details' => $activ]);
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function getAllSnorkeling(Request $request)
    {

        try {

            $book = Favourite::where('user_id', $request->user()->id)->get();
            //return $book;
            $result = [];
            $activ = [];
            foreach ($book as $book) {
                $activity = Activity::where('id', $book->activity_id)->where('type_id', 1)->first();
                if ($activity != null) {
                    if (!in_array($activity, $activ)) {
                        $activity->image = url('images/activities/' . $activity->image);
                        array_push($activ, $activity);
                    }


                    if ($book->activity_id == $activity->id) {
                        if (!in_array($book, $result, true)) {
                            array_push($result, $book);
                        }
                    }
                }
            }

            return response()->json(['favourite_details' => $result, 'Activity_details' => $activ]);
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function getAllSafari(Request $request)
    {

        try {

            $book = Favourite::where('user_id', $request->user()->id)->get();
            //return $book;
            $result = [];
            $activ = [];
            foreach ($book as $book) {
                $activity = Activity::where('id', $book->activity_id)->where('type_id', 3)->first();
                if ($activity != null) {
                    if (!in_array($activity, $activ)) {
                        $activity->image = url('images/activities/' . $activity->image);

                        array_push($activ, $activity);
                    }


                    if ($book->activity_id == $activity->id) {
                        if (!in_array($book, $result, true)) {
                            array_push($result, $book);
                        }
                    }
                }
            }

            return response()->json(['favourite_details' => $result, 'Activity_details' => $activ]);
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function getAllEvents(Request $request)
    {

        try {

            $book = FavouriteEvent::where('user_id', $request->user()->id)->get();
            //return $book;
            $result = [];
            $activ = [];
            foreach ($book as $book) {
                $activity = Event::where('id', $book->event_id)->first();
                if (!in_array($activity, $activ, true)) {
                    $activity->image = url('images/events/' . $activity->image);
                    array_push($activ, $activity);
                }


                if ($book->event_id == $activity->id) {
                    if (!in_array($book, $result, true)) {
                        array_push($result, $book);
                    }
                }
            }

            return response()->json(['favourite_details' => $result, 'Activity_details' => $activ]);
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function getAllPackages(Request $request)
    {

        try {

            $book = FavouritePackage::where('user_id', $request->user()->id)->get();
            //return $book;
            $result = [];
            $activ = [];
            foreach ($book as $book) {
                $activity = Package::where('id', $book->package_id)->first();
                if (!in_array($activity, $activ, true)) {
                    $activity->image = url('images/package/' . $activity->image);
                    array_push($activ, $activity);
                }


                if ($book->package_id == $activity->id) {
                    if (!in_array($book, $result, true)) {
                        array_push($result, $book);
                    }
                }
            }

            return response()->json(['favourite_details' => $result, 'Activity_details' => $activ]);
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function getAllLiveboard(Request $request)
    {
        try {

            $book = FavouriteLiveboard::where('user_id', $request->user()->id)->get();
            //return $book;
            $result = [];
            $activ = [];
            foreach ($book as $book) {
                $activity = LiveBoard::where('id', $book->live_id)->first();
                if (!in_array($activity, $activ, true)) {
                    $activity->image = url('images/liveboard/' . $activity->image);
                    array_push($activ, $activity);
                }


                if ($book->live_id == $activity->id) {
                    if (!in_array($book, $result, true)) {
                        array_push($result, $book);
                    }
                }
            }

            return response()->json(['favourite_details' => $result, 'Activity_details' => $activ]);
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function addActivity(Request $request, $activity_id)
    {
        try {
            $favs = Favourite::all();
            $flag = true;
            foreach ($favs as $fa) {
                if ($fa->user_id == $request->user()->id and $fa->activity_id == $activity_id) {
                    $flag = false;
                }
            }
            if ($flag) {
                $fav = new Favourite();
                $activity = Activity::findOrFail($activity_id);
                $fav->user_id = $request->user()->id;
                $fav->activity_id = $activity->id;

                $fav->save();
                return response()->json('added succefully', 200);
            } else {
                return response()->json('Activity already liked', 200);
            }
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function addEvent(Request $request, $event_id)
    {
        try {
            $favs = FavouriteEvent::all();
            $flag = true;
            foreach ($favs as $fa) {
                if ($fa->user_id == $request->user()->id and $fa->event_id == $event_id) {
                    $flag = false;
                }
            }
            if ($flag) {
                $fav = new FavouriteEvent();
                $event = Event::findOrFail($event_id);
                $fav->user_id = $request->user()->id;
                $fav->event_id = $event->id;

                $fav->save();
                return response()->json('added succefully', 200);
            } else {
                return response()->json('Event already liked', 200);
            }
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function addPackage(Request $request, $package_id)
    {
        try {
            $favs = FavouritePackage::all();
            $flag = true;
            foreach ($favs as $fa) {
                if ($fa->user_id == $request->user()->id and $fa->package_id == $package_id) {
                    $flag = false;
                }
            }
            if ($flag) {
                $fav = new FavouritePackage();
                $event = Package::findOrFail($package_id);
                $fav->user_id = $request->user()->id;
                $fav->package_id = $event->id;

                $fav->save();
                return response()->json('added succefully', 200);
            } else {
                return response()->json('Package already liked', 200);
            }
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function addLiveboard(Request $request, $liveboard_id)
    {
        try {
            $favs = FavouriteLiveboard::all();
            $flag = true;
            foreach ($favs as $fa) {
                if ($fa->user_id == $request->user()->id and $fa->live_id == $liveboard_id) {
                    $flag = false;
                }
            }
            if ($flag) {
                $fav = new FavouriteLiveboard();
                $event = LiveBoard::findOrFail($liveboard_id);
                $fav->user_id = $request->user()->id;
                $fav->live_id = $event->id;

                $fav->save();
                return response()->json('added succefully', 200);
            } else {
                return response()->json('Liveboard already liked', 200);
            }
        } catch (\Exception  $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
    public function cancelActivity($id)
    {
        $p = Favourite::findOrFail($id);
        $y = $p->delete();
        if ($y) {
            return response()->json(['err' => false, 'msg' => 'cancelation done'], 200);
        } else {
            return response()->json(['err' => true, 'msg' => 'pro'], 404);
        }
    }
    public function cancelEvent($id)
    {
        $p = FavouriteEvent::where('event_id',$id)->first();
        $y = $p->delete();
        if ($y) 
        {
            return response()->json(['err' => false, 'msg' => 'cancelation done'], 200);
        } 
        else 
        {
            return response()->json(['err' => true, 'msg' => 'pro'], 404);
        }
    }
    public function cancelPackage($id)
    {
        $p = FavouritePackage::findOrFail($id);
        $y = $p->delete();
        if ($y) {
            return response()->json(['err' => false, 'msg' => 'cancelation done'], 200);
        } else {
            return response()->json(['err' => true, 'msg' => 'pro'], 404);
        }
    }
    public function cancelLiveboard($id)
    {
        $p = FavouriteLiveboard::findOrFail($id);
        $y = $p->delete();
        if ($y) {
            return response()->json(['err' => false, 'msg' => 'cancelation done'], 200);
        } else {
            return response()->json(['err' => true, 'msg' => 'pro'], 404);
        }
    }
    public function getActivityFavouriteStatus(Request $request,$id)
    {
        $user=$request->user();
        $fav = Favourite::where('activity_id',$id)->where('user_id',$user->id)->first();
        if ($fav) {
            return response()->json(['status' => 'true','favourite_id'=>$fav->id], 200);
        }
        else{
            return response()->json(['status' => 'false'], 200);
        }
    }
    public function getEventFavouriteStatus(Request $request,$id)
    {
        $user=$request->user();
        $fav = FavouriteEvent::where('event_id',$id)->where('user_id',$user->id)->first();
        if ($fav) {
            return response()->json(['status' => 'true','favourite_id'=>$fav->id], 200);
        }
        else{
            return response()->json(['status' => 'false'], 200);
        }
    }
    public function getPackageFavouriteStatus(Request $request,$id)
    {
        $user=$request->user();
        $fav = FavouritePackage::where('package_id',$id)->where('user_id',$user->id)->first();
        if ($fav) {
            return response()->json(['status' => 'true','favourite_id'=>$fav->id], 200);
        }
        else{
            return response()->json(['status' => 'false'], 200);
        }
    }
    public function getLiveboardFavouriteStatus(Request $request,$id)
    {
        $user=$request->user();
        $fav = FavouriteLiveboard::where('live_id',$id)->where('user_id',$user->id)->first();
        if ($fav) {
            return response()->json(['status' => 'true','favourite_id'=>$fav->id], 200);
        }
        else{
            return response()->json(['status' => 'false'], 200);
        }
    }
}
