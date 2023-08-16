<?php

namespace App\Http\Controllers;

use App\Models\BookingActivity;
use App\Models\BookingTransport;
use Illuminate\Http\Request;

class PaymentRenderController extends Controller
{
    public function activityIndex()
    {
        $tapRecords = BookingActivity::where('payment_method','tap')->where('payment_status','fully payed')->where('refund',null)->get();
        $paypalRecords = BookingActivity::where('payment_method','paypal')->where('payment_status','fully payed')->where('refund',null)->get();
        $cashRecords = BookingActivity::where('payment_method','cash')->where('payment_status','fully payed')->where('refund',null)->get();
        // $count = 0;
        // foreach($cashRecords as $cach)
        // {
        //     $count += $cach->total_price;
        // }
        // return view('admin.payments.activityIndex',['tap'=>$tapRecords->sum('total_price'),'paypal'=>$paypalRecords->sum('total_price'),'cash'=>$cashRecords->sum('total_price')]);
        return view('admin.payments.activityIndex',['tap'=>$tapRecords->sum('total_price'),'paypal'=>$paypalRecords->sum('total_price'),'cash'=>$cashRecords->sum('total_price')]);
    }
    
    public function transportIndex()
    {
        $tapRecords = BookingTransport::where('payment_method','tap')->where('payment_status','fully payed')->where('refund',null)->get();
        $paypalRecords = BookingTransport::where('payment_method','paypal')->where('payment_status','fully payed')->where('refund',null)->get();
        $cashRecords = BookingTransport::where('payment_method','cash')->where('payment_status','fully payed')->where('refund',null)->get();
        return view('admin.payments.transportIndex',['tap'=>$tapRecords->sum('total_price'),'paypal'=>$paypalRecords->sum('total_price'),'cash'=>$cashRecords->sum('total_price')]);
    }
    
    public function test()
    {
        $cashRecords = BookingActivity::where('payment_method','cash')->where('payment_status','fully payed')->where('refund',null)->get();
        
        return $cashRecords->sum('total_price'); 
    }

}
