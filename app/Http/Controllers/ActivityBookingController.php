<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityBooking;
use App\Models\BookingActivity;
use App\Models\Event;
use App\Models\LiveBoard;
use App\Models\Package;
use App\Models\User;

use DataTables;

class ActivityBookingController extends Controller
{
    public function index()
    {

        return view('admins.ActivityBookings.index');
    }

    public function datatable(Request $request)
    {

        if ($request->ajax()) {
            $data = ActivityBooking::select('*')->where('payment_status', '<>', 'not payed')->latest();
            //dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user_name', function ($row) {
                    $name = User::where('id', $row->user_id)->first()->fname  ?? 'لا يوجد';
                    return $name;
                })
                ->addColumn('user_phone', function ($row) {
                    $name = User::where('id', $row->user_id)->first()->phone  ?? 'لا يوجد';
                    return $name;
                })->addColumn('user_email', function ($row) {
                    $name = User::where('id', $row->user_id)->first()->email  ?? 'لا يوجد';
                    return $name;
                })
                ->addColumn('activity_title', function ($row) {
                    if ($row->type == 'activity') {
                        $name =  $row->activity->title ?? 'تم حذفه';
                    } else  if ($row->type == 'event') {
                        $name =  Event::where('id', $row->activity_id)->first()->title  ?? 'لا يوجد ';
                    } else  if ($row->type == 'package') {
                        $name =  Package::where('id', $row->activity_id)->first()->name_en  ?? ' لا يوجد';
                    } else  if ($row->type == 'liveboard') {
                        $name =  LiveBoard::where('id', $row->activity_id)->first()->title  ?? 'لا يوجد ';
                    }
                    return $name;
                })
                ->addColumn('action', function ($row) {
                    // $edit =  route('activitybookings.editactivitybookings', $row->id);
                    // $actionBtn = '<a href=" ' . $edit . '" class="edit btn btn-success btn-sm m-1">Edit</a>';
                    $show = 'https://web.whatsapp.com/send?phone='.$row->whats;
                    $actionBtn = '<a href="'.$show.' " class="edit m-1 btn btn-success btn-sm" target="_blank">Whats</a>';
                    $actionBtn .= '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->filter(
                    function ($instance) use ($request) {
                        if ($request->month) {
                            $name = $request->month;
                            $instance->whereMonth('activity_date', $name)->whereYear('activity_date',date('Y'));
                        }
                        if ($request->method) {
                            $name = $request->method;
                            $instance->where('payment_method', $name);
                        }
                        if ($request->type) {
                            $name = $request->type;

                            $instance->where('type', $name);
                        }
                    },
                    true
                )
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    
    public function datatablepayment(Request $request)
    {

        if ($request->ajax()) {
            $data = ActivityBooking::select('*')->where('payment_status', 'fully payed')->latest();
            //dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user_name', function ($row) {
                    $name = User::where('id', $row->user_id)->first()->fname  ?? 'لا يوجد';
                    return $name;
                })
                ->addColumn('user_phone', function ($row) {
                    $name = User::where('id', $row->user_id)->first()->phone  ?? 'لا يوجد';
                    return $name;
                })->addColumn('user_email', function ($row) {
                    $name = User::where('id', $row->user_id)->first()->email  ?? 'لا يوجد';
                    return $name;
                })
                ->addColumn('activity_title', function ($row) {
                    if ($row->type == 'activity') {
                        $name =  $row->activity->title ?? 'تم حذفه';
                    } else  if ($row->type == 'event') {
                        $name =  Event::where('id', $row->activity_id)->first()->title  ?? 'لا يوجد ';
                    } else  if ($row->type == 'package') {
                        $name =  Package::where('id', $row->activity_id)->first()->name_en  ?? ' لا يوجد';
                    } else  if ($row->type == 'liveboard') {
                        $name =  LiveBoard::where('id', $row->activity_id)->first()->title  ?? 'لا يوجد ';
                    }
                    return $name;
                })
                ->addColumn('action', function ($row) {
                    // $edit =  route('activitybookings.editactivitybookings', $row->id);
                    // $actionBtn = '<a href=" ' . $edit . '" class="edit btn btn-success btn-sm m-1">Edit</a>';
                    $show = 'https://web.whatsapp.com/send?phone='.$row->whats;
                    $actionBtn = '<a href="'.$show.' " class="edit m-1 btn btn-success btn-sm" target="_blank">Whats</a>';
                    $actionBtn .= '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->filter(
                    function ($instance) use ($request) {
                        if ($request->month) {
                            $name = $request->month;
                            $instance->whereMonth('activity_date', $name)->whereYear('activity_date',date('Y'));
                        }
                        if ($request->method) {
                            $name = $request->method;
                            $instance->where('payment_method', $name);
                        }
                        if ($request->type) {
                            $name = $request->type;

                            $instance->where('type', $name);
                        }
                    },
                    true
                )
                ->rawColumns(['action'])
                ->make(true);
        }
    }



    public function indexrefund()
    {
        return view('admins.ActivityBookings.indexrefund');
    }
    public function indexCash()
    {
        return view('admins.ActivityBookings.cash');
    }
    public function datatablerefund(Request $request)
    {
        if ($request->ajax()) {
            $data = ActivityBooking::where('refund', null)->where('cancel', 'requested')->where('payment_status', 'fully payed')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user_name', function ($row) {
                    $name = User::where('id', $row->user_id)->first()->fname  ?? ' لا يوجد';
                    return $name;
                })->addColumn('user_email', function ($row) {
                    $name = User::where('id', $row->user_id)->first()->email  ?? ' لا يوجد';
                    return $name;
                })->addColumn('user_phone', function ($row) {
                    $name = User::where('id', $row->user_id)->first()->phone  ?? ' لا يوجد';
                    return $name;
                })
                ->addColumn('activity_title', function ($row) {
                    if ($row->type == 'activity') {
                        $name =  $row->activity->title ?? 'تم حذفه';
                    } else  if ($row->type == 'event') {
                        $name =  Event::where('id', $row->activity_id)->first()->title  ?? 'لا يوجد';
                    } else  if ($row->type == 'package') {
                        $name =  Package::where('id', $row->activity_id)->first()->name  ?? 'لا يوجد';
                    } else  if ($row->type == 'liveboard') {
                        $name =  LiveBoard::where('id', $row->activity_id)->first()->title  ?? 'لا يوجد';
                    }
                    return $name;
                })
                ->addColumn('action', function ($row) {
                    // $edit =  route('activitybookings.editactivitybookings', $row->id);
                    // $actionBtn = '<a href=" ' . $edit . '" class="edit btn btn-success btn-sm m-1">Edit</a>';
                    
                    $actionBtn = '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Refund</a>';
                    return $actionBtn;
                })
                ->filter(
                    function ($instance) use ($request) {
                        if (request()->has('type')) {
                            $instance->where(function ($w) use ($request) {
                                $name = $request->get('type');
                                $w->orWhere('type', 'LIKE', "%$name%");
                            });
                        }
                    },
                    true
                )
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    

    public function refund(Request $request)
    {
        $activityBooking = BookingActivity::findOrFail($request->id);
        $activityBooking->refund = 'done';
        $activityBooking->save();
        return response()->json(['err' => false, 'msg' => 'refund done'], 200);
    }

    public function delete(Request $request)
    {
        $p = BookingActivity::findOrFail($request->id);
        $y = $p->delete();
        if ($y) {
            return response()->json(['err' => false, 'msg' => 'deleted done'], 200);
        } else {
            return response()->json(['err' => true, 'msg' => 'pro'], 200);
        }
    }
    public function cashDatatable(Request $request)
    {

        if ($request->ajax()) {
            $data = ActivityBooking::select('*')->where([['payment_method', 'cash'],['cancel','not requested'],['payment_status','cash payment']])->latest();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user_name', function ($row) {
                    $name = User::where('id', $row->user_id)->first()->fname  ?? 'لا يوجد';
                    return $name;
                })
                ->addColumn('user_phone', function ($row) {
                    $name = User::where('id', $row->user_id)->first()->phone  ?? 'لا يوجد';
                    return $name;
                })->addColumn('user_email', function ($row) {
                    $name = User::where('id', $row->user_id)->first()->email  ?? 'لا يوجد';
                    return $name;
                })
                ->addColumn('activity_title', function ($row) {
                    if ($row->type == 'activity') {
                        $name =  $row->activity->title ?? 'تم حذفه';
                    } else  if ($row->type == 'event') {
                        $name =  Event::where('id', $row->activity_id)->first()->title  ?? 'لا يوجد';
                    } else  if ($row->type == 'package') {
                        $name =  Package::where('id', $row->activity_id)->first()->name  ?? 'لا يوجد';
                    } else  if ($row->type == 'liveboard') {
                        $name =  LiveBoard::where('id', $row->activity_id)->first()->title  ?? 'لا يوجد ';
                    }
                    return $name;
                })
                ->addColumn('action', function ($row) {
                    $disabled = '';
                    if ($row->payment_status == 'fully payed') {
                        $disabled = 'style="display:none;"';
                    }
                    $show = 'https://web.whatsapp.com/send?phone='.$row->whats;
                    $edit = route('activitybookings.cashCollect1',$row->id);
                    $actionBtn = '<a href="'.$show.' " class="edit m-1 btn btn-success btn-sm" target="_blank">Whats</a>';
                    $actionBtn .= '<a href="' . $edit . '" class="edit m-1 btn btn-primary btn-sm">Collect</a>';
                    // $actionBtn .= '<a href="javascript:void(0)" ' . $disabled . '  value="' . $row->id . '" class="delete btn btn-primary btn-sm">collect</a>';
                    $actionBtn .= '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->filter(
                    function ($instance) use ($request) {
                        if ($request->month) {
                            $name = $request->month;
                            $instance->whereMonth('created_at', $name);
                        }
                        if ($request->method) {
                            $name = $request->method;
                            $instance->where('payment_method', $name);
                        }
                        if ($request->type) {
                            $name = $request->type;

                            $instance->where('type', $name);
                        }
                    },
                    true
                )
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    
    public function cashDeleteDatatable(Request $request)
    {

        if ($request->ajax()) {
            $data = ActivityBooking::onlyTrashed()->where([['payment_method', 'cash'],['cancel','not requested']]);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user_name', function ($row) {
                    $name = User::where('id', $row->user_id)->first()->fname  ?? 'تم حذفه';
                    return $name;
                })
                ->addColumn('user_phone', function ($row) {
                    $name = User::where('id', $row->user_id)->first()->phone  ?? 'تم حذفه';
                    return $name;
                })->addColumn('user_email', function ($row) {
                    $name = User::where('id', $row->user_id)->first()->email  ?? 'تم حذفه';
                    return $name;
                })
                ->addColumn('activity_title', function ($row) {
                    $name =  $row->activity->title ?? 'تم حذفه';
                    return $name;
                })
                ->addColumn('action', function ($row) {
                    //$show =  route('transportingbookings.showtransportingbookings', $row->id);
                    $actionBtn = '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                
                    return $actionBtn;
                })
                ->filter(
                    function ($instance) use ($request) {
                        if ($request->month) {
                            $name = $request->month;
                            $instance->whereMonth('created_at', $name);
                        }
                        if ($request->method) {
                            $name = $request->method;
                            $instance->where('payment_method', $name);
                        }
                        if ($request->type) {
                            $name = $request->type;

                            $instance->where('type', $name);
                        }
                    },
                    true
                )
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    
    
    public function cashCollect(Request $request)
    {
        $p = BookingActivity::findOrFail($request->id);
        $p->payment_status = 'fully payed';
        $p->save();
        
        if ($p) 
        {
            return response()->json(['err' => false, 'msg' => 'done'], 200);
        } 
        else 
        {
            return response()->json(['err' => true, 'msg' => 'pro'], 200);
        }
    }
    
    public function cashCollect1(Request $request)
    {
        $p = BookingActivity::findOrFail($request->id);
        $p->payment_status = 'fully payed';
        $p->save();
        return redirect()->route('activitybookings.indexCash');
        // if ($p) 
        // {
        //     return response()->json(['err' => false, 'msg' => 'done'], 200);
        // } 
        // else 
        // {
        //     return response()->json(['err' => true, 'msg' => 'pro'], 200);
        // }
    }
    
    public function indexCashDeleted()
    {
        return view('admins.ActivityBookings.cashdeletes');
        
    }
    
    public function deletecash(Request $request)
    {
        $p = BookingActivity::withTrashed()->findOrFail($request->id);
        $p->forceDelete();
    }
    
}
