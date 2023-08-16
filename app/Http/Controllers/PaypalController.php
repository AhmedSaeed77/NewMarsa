<?php

namespace App\Http\Controllers;

use App\Models\BookingActivity;
use App\Models\BookingTransport;
use App\Models\PaypalActivity;
use App\Models\User;
use App\Models\Zone;
use App\Models\Activity;
use App\Models\Event;
use App\Models\Package;
use App\Models\LiveBoard;
use Illuminate\Support\Facades\Mail;
use App\Notifications\SuccessfulRegistration;
use Illuminate\Http\Request;
use Nafezly\Payments\Classes\PayPalPayment;


class PaypalController extends Controller
{

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */

    public function pay(Request $request)
    {
        $user = $request->user();
   
        // dd($request);
        if ($request->has('bookingActivity')) 
        { 
            $book = BookingActivity::find($request->bookingActivity);
            // dd($book);
            $book->payment_method = $request->method;
            if ($request->method == 'paypal') 
            {

                $payer = new PaypalActivity();
                $payer->amount = $book->total_price;
                $payer->fullcost = $book->total_price;
                // return response()->json($payer);
                $payment = new PayPalPayment();
                $invoice = $payment->pay($amount = $book->total_price );
                return $invoice;
                $book->payment_token = $invoice['payment_id'];
                $payer->token = $invoice['payment_id'];
                $book->save();
                $payer->save();
                return $invoice;
            } 
            elseif ($request->method == 'cash') 
            {
                $book->payment_status = 'cash payment';
                $user->notify(new SuccessfulRegistration());
                $book->save();
                
                if ($book->type == "activity")
                {
                    $book->activityName = Activity::where('id',$book->activity_id )->first()->title;
                    Mail::to($user->email)->send(new \App\Mail\Activity($book));
                }
                else if ($book->type == "event")
                {
                    $book->activityName = Event::where('id',$book->activity_id )->first()->title;
                    Mail::to($user->email)->send(new \App\Mail\Event($book));
                }
                else if ($book->type == "package")
                {
                    $book->activityName = Package::where('id',$book->activity_id )->first()->name_en;
                    Mail::to($user->email)->send(new \App\Mail\Package($book));
                }
                else if ($book->type == "liveboard")
                {
                    $book->activityName = LiveBoard::where('id',$book->activity_id )->first()->title;
                    Mail::to($user->email)->send(new \App\Mail\ContactUsMail($book));
                }
                
                
                //$user->notify(new BookingNotificaiton($book));
                if ($book->type == "activity")
                {
                    return response()->json(['redirect_url' => 'https://marsawaves.com/user/dashboard/main/myTrips']);
                } else if ($book->type == "event") {
                    return response()->json(['redirect_url' => 'https://marsawaves.com/user/dashboard/main/events']);
                } else if ($book->type == "package") {
                    return response()->json(['redirect_url' => 'https://marsawaves.com/user/dashboard/main/package']);
                } else if ($book->type == "liveboard") {
                    return response()->json(['redirect_url' => 'https://marsawaves.com/user/dashboard/main/live']);
                }
            }
        } else if ($request->has('bookingTransport')) {
            $book = BookingTransport::find($request->bookingTransport);
            $book->payment_method = $request->method;
            if ($request->method == 'paypal') {
                $payer = new PaypalActivity();
                $payer->amount = $book->total_price;
                $payer->fullcost = $book->total_price;
                $payment = new PayPalPayment();
                $invoice = $payment->pay(
                  $amount = $book->total_price
                );
                $book->payment_token = $invoice['payment_id'];
                $payer->token = $invoice['payment_id'];
                $book->save();
                $payer->save();
                return $invoice;
            } elseif ($request->method == 'cash') {
                $book = BookingTransport::find($request->bookingTransport);
               $book->payment_status = 'cash payment';
                $book->save();
                //$user->notify(new BookingNotificaiton($book));
                return response()->json(['redirect_url' => 'https://marsawaves.com/user/dashboard/main/transport']);
            }
        } else if ($request->has('firstTrip')) {
            $book = BookingTransport::find($request->firstTrip);
            $book->payment_method = $request->method;
            $book1 = BookingTransport::find($request->secondTrip);
            $book1->payment_method = $request->method;
            if ($request->method == 'paypal') {
                $payer = new PaypalActivity();
                $payer->amount = $book->total_price + $book1->total_price;
                $payer->fullcost = $book->total_price + $book1->total_price;
                $payment = new PayPalPayment();
                $invoice = $payment->pay(
                    $amount = $book->total_price + $book1->total_price
                );
                $book->payment_token = $invoice['payment_id'];
                $book1->payment_token = $invoice['payment_id'];
                $payer->token = $invoice['payment_id'];
                $book->save();
                $book1->save();
                $payer->save();
                return $invoice;
            } elseif ($request->method == 'cash') {
                $book = BookingTransport::find($request->bookingTransport);
                
                $book->save();
                return response()->json(['redirect_url' => 'https://marsawaves.com/user/dashboard/main/transport']);
            }
        }
    }
    public function payment_verify(Request $request)
    {
        // dd($request);
        $payment = new PayPalPayment();
        $invoice = $payment->verify($request);
        // dd($invoice);
        if ($invoice['success']) {
            $book = BookingActivity::where('payment_token', $invoice['payment_id'])->first();
            
            if ($book != null) {
               // $user = User::find($book->user_id);
                $book->payment_status = 'fully payed';
                $book->save();
                $user->notify(new SuccessfulRegistration());
                //$user->notify(new BookingNotificaiton($book));
                if ($book->type == "activity") {
                    return redirect('https://marsawaves.com/user/dashboard/main/myTrips');
                } else if ($book->type == "event") {
                    return redirect('https://marsawaves.com/user/dashboard/main/events');
                } else if ($book->type == "package") {
                    return redirect('https://marsawaves.com/user/dashboard/main/package');
                } else if ($book->type == "liveboard") {
                    return redirect('https://marsawaves.com/user/dashboard/main/live');
                }
            } else {
                $transport = BookingTransport::where('payment_token', $invoice['payment_id'])->get();
               // return $transport;
                
                foreach ($transport as $transport1) {
                    $user = User::find($transport1->user_id);
                   // $user->notify(new BookingNotificaiton($transport1));
                    $transport1->payment_status = 'fully payed';
                    $transport1->save();
                }
                

                return redirect('https://marsawaves.com/user/dashboard/main/transport');
            }
        } else {
            return $invoice['message'];
        }
    }
    public function payment(Request $request)
    {

        if ($request->has('bookingActivity')) {
            $book = BookingActivity::find($request->bookingActivity);
            $book->payment_method = 'tap';
            $total =  $book->total_price;
            $payment = [
                "amount" => $total,
                "description" =>  'مرحبا ' .  'amr' . 'انت على وشك اكمال عملية الدفع لتام ',
                "currency" => 'USD',
                "receipt" => [
                    "email" => true,
                    "sms" => false
                ],
                "customer" => [
                    "first_name" => 'aef',
                    "email" => 'adc@amr.com',
                    "phone" => [
                        "country_code" => 'IN',
                        "number" => '010000045445',
                    ]
                ],
                "metadata" => [
                    "user_id" => '1',
                    "wanted" => $total,

                ],
                "source" => [
                    "id" => "src_card"

                ],
                "redirect" => [
                    "url" => route('tap.callback')
                ]
            ];
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.tap.company/v2/charges",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($payment),
                CURLOPT_HTTPHEADER => array(
                    "authorization: Bearer sk_test_pGDAVUkl2wexvPEXfjqbmT7L", // SECRET API KEY
                    "content-type: application/json"
                ),
            ));

            $response = curl_exec($curl);

            $err = curl_error($curl);

            curl_close($curl);

            $response = json_decode($response);

            $book->payment_token = $response->id;

            $book->save();

            return response()->json(['payment_id' => $response->id, 'link' => $response->transaction->url], 200);
        } else if ($request->has('bookingTransport')) {
            $book = BookingTransport::find($request->bookingTransport);
           
            $book->payment_method = 'tap';
            $total =  $book->total_price;
            $payment = [
                "amount" => $total,
                "description" =>  'مرحبا ' .  'amr' . 'انت على وشك اكمال عملية الدفع لتام ',
                "currency" => 'USD',
                "receipt" => [
                    "email" => true,
                    "sms" => false
                ],
                "customer" => [
                    "first_name" => 'aef',
                    "email" => 'adc@amr.com',
                    "phone" => [
                        "country_code" => 'IN',
                        "number" => '010000045445',
                    ]
                ],
                "metadata" => [
                    "user_id" => '1',
                    "wanted" => $total,

                ],
                "source" => [
                    "id" => "src_card"

                ],
                "redirect" => [
                    "url" => route('tap.callback')
                ]
            ];
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.tap.company/v2/charges",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($payment),
                CURLOPT_HTTPHEADER => array(
                    "authorization: Bearer sk_test_pGDAVUkl2wexvPEXfjqbmT7L", // SECRET API KEY
                    "content-type: application/json"
                ),
            ));

            $response = curl_exec($curl);

            $err = curl_error($curl);

            curl_close($curl);

            $response = json_decode($response);
            $book->payment_token = $response->id;

            $book->save();

            return response()->json(['payment_id' => $response->id, 'link' => $response->transaction->url], 200);
        } else {
            $book = BookingTransport::find($request->firstTrip);
            $book->payment_method = 'tap';
            $book1 = BookingTransport::find($request->secondTrip);
            $book1->payment_method = 'tap';
            $total =  $book->total_price + $book1->total_price;
            $payment = [
                "amount" => $total,
                "description" =>  'مرحبا ' .  'amr' . 'انت على وشك اكمال عملية الدفع لتام ',
                "currency" => 'USD',
                "receipt" => [
                    "email" => true,
                    "sms" => false
                ],
                "customer" => [
                    "first_name" => 'aef',
                    "email" => 'adc@amr.com',
                    "phone" => [
                        "country_code" => 'IN',
                        "number" => '010000045445',
                    ]
                ],
                "metadata" => [
                    "user_id" => '1',
                    "wanted" => $total,

                ],
                "source" => [
                    "id" => "src_card"

                ],
                "redirect" => [
                    "url" => route('tap.callback')
                ]
            ];
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.tap.company/v2/charges",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($payment),
                CURLOPT_HTTPHEADER => array(
                    "authorization: Bearer sk_test_pGDAVUkl2wexvPEXfjqbmT7L", // SECRET API KEY
                    "content-type: application/json"
                ),
            ));

            $response = curl_exec($curl);

            $err = curl_error($curl);

            curl_close($curl);

            $response = json_decode($response);

            $book->payment_token = $response->id;
            $book1->payment_token = $response->id;
            $book->save();
            $book1->save();
            return response()->json(['payment_id' => $response->id, 'link' => $response->transaction->url], 200);
        }
    }
    public function callback(Request $request)
    {

        $input = $request->all();

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.tap.company/v2/charges/" . $input['tap_id'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{}",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer sk_test_pGDAVUkl2wexvPEXfjqbmT7L" // SECRET API KEY
            ),
        ));
        $response = curl_exec($curl);
        // DB::table('paylogs')->insert([
        //     'pay_id' => $input['tap_id'],
        //     'data' => $response
        // ]);
        $err = curl_error($curl);
        curl_close($curl);


        $responseTap = json_decode($response);
        if ($responseTap->status == 'CAPTURED') {
            $activity = BookingActivity::where('payment_token', $responseTap->id)->first();
            
            if ($activity != null) {
                $user = User::find($activity->user_id);
                $activity->payment_status = 'fully payed';
                $activity->save();
                $user->notify(new SuccessfulRegistration());
                if ($activity->type == "activity") {
                    return redirect('https://marsawaves.com/user/dashboard/main/myTrips');
                } else if ($activity->type == "event") {
                    return redirect('https://marsawaves.com/user/dashboard/main/events');
                } else if ($activity->type == "package") {
                    return redirect('https://marsawaves.com/user/dashboard/main/package');
                } else if ($activity->type == "liveboard") {
                    return redirect('https://marsawaves.com/user/dashboard/main/live');
                }
            }
            $transport = BookingTransport::where('payment_token', $responseTap->id)->get();
            //return $transport;
            foreach ($transport as $transport1) {
                $transport1->payment_status = 'fully payed';
                $transport1->save();
                $user = User::find($transport1->user_id);
              //  $user->notify(new BookingNotificaiton($transport1));
            }
            return redirect('https://marsawaves.com/user/dashboard/main/transport');
        } else {
            return redirect('https://marsawaves.com/home');
        }
    }
    /**
     * @function getDistance()
     * Calculates the distance between two address
     * 
     * @params
     * $addressFrom - Starting point
     * $addressTo - End point
     * $unit - Unit type
     * 
     * @author CodexWorld
     * @url https://www.codexworld.com
     *
     */
    // function getDistance(Request $request)
    // {
    //     // Google API key
    //     $zone = Zone::find(7);
    //     //return $zones;
    //     // $distances = [];

    //     $addressFrom = $zone->location;
    //     $addressTo = $request->addressTo;
    //     $apiKey = 'AIzaSyCng_shetGsjg8HEoCK_ulHzxi_SJhYYSI';
    //     // return $addressFrom;
    //     // Change address format
    //     $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
    //     $formattedAddrTo     = str_replace(' ', '+', $addressTo);
    //     // return  $formattedAddrFrom;
    //     // Geocoding API request with start address
    //     $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrFrom . '&sensor=false&key=' . $apiKey);
    //     $outputFrom = json_decode($geocodeFrom);
    //     if (!empty($outputFrom->error_message)) {
    //         return $outputFrom->error_message;
    //     }

    //     // Geocoding API request with end address
    //     $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrTo . '&sensor=false&key=' . $apiKey);
    //     $outputTo = json_decode($geocodeTo);
    //     if (!empty($outputTo->error_message)) {
    //         return $outputTo->error_message;
    //     }

    //     // Get latitude and longitude from the geodata
    //     $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
    //     $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
    //     $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
    //     $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
    //     return response()->json(['latitude' => $latitudeFrom, 'longitude' => $longitudeFrom]);
    //     // Calculate distance between latitude and longitude
    //     $theta    = $longitudeFrom - $longitudeTo;
    //     $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    //     $dist    = acos($dist);
    //     $dist    = rad2deg($dist);
    //     //array_push($distances,$dist);

    //     //$zone = Zone::find(array_search(min($distances),$distances)+1);


    // }
}
