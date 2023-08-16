<?php

namespace App\Http\Controllers;

use App\Models\BookingTransport;
use Illuminate\Http\Request;
use App\Models\TransportBookingsBooking;
use DataTables;
use App\Models\User;
use App\Models\PoupularTransaction;
use App\Models\Zone;

class TransportingsBookingsController extends Controller
{
    public function popularquestion()
    {
        $popular = PoupularTransaction::find(1);
        return view('admins.TransportingsBookings.popularquestion',['$popular'=>$popular]); 
    }
    
    public function updatepopularquestion(Request $request)
    {
        try{
            $request->validate([
                'popular_en'=>'required',
                'popular_de'=>'required',
                'popular_cz'=>'required',
            ],[
                'popular_en'=>'الاسئئله مطلوبه',
                'popular_de'=>'الاسئئله مطلوبه',
                'popular_cz'=>'الاسئئله مطلوبه',
            ]);
    
            $popular = PoupularTransaction::find(1);
            $popular->popular_en = $request->popular_en;
            $popular->popular_de = $request->popular_de;
            $popular->popular_cz = $request->popular_cz;
            $popular->save();
            return redirect()->route('index');
        
        }
        catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }
    
    public function popularquestionapi()
    {
        $populars = PoupularTransaction::all();
        return $populars;
    }
    
    
    public function show($id)
    {
        $transport = BookingTransport::find($id);

        return view('admins.TransportingsBookings.show', ['transport'=>$transport]);
    }
    public function index()
    {
        return view('admins.TransportingsBookings.index');
    }
    

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = TransportBookingsBooking::where('payment_status','fully payed');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user_name', function ($row) {
                    $name = User::where('id',$row->user_id)->first()->fname  ?? 'تم حذفه';
                    return $name;
                })
                ->addColumn('zone_name', function ($row) {
                    $name = Zone::where('id',$row->zone_id)->first()->name  ?? 'تم حذفه';
                    return $name;
                })->addColumn('user_phone', function ($row) {
                    $name = User::where('id',$row->user_id)->first()->phone  ?? 'تم حذفه';
                    return $name;
                })
                ->addColumn('user_email', function ($row) {
                    $name = User::where('id',$row->user_id)->first()->email  ?? 'تم حذفه';
                    return $name;
                })
                ->addColumn('action', function ($row) {
                    $show = 'https://web.whatsapp.com/send?phone='.$row->whatsapp;
                    $actionBtn = '<a href="'.$show.' " class="edit m-1 btn btn-success btn-sm" target="_blank">Whats</a>';
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

    public function delete(Request $request)
    {
        $p = BookingTransport::findOrFail($request->id);
        $y = $p->delete();
        if ($y) 
        {
            return response()->json(['err' => false, 'msg' => 'deleted done'], 200);
        } 
        else 
        {
            return response()->json(['err' => true, 'msg' => 'pro'], 200);
        }
    }

    public function indexrefund()
    {
        return view('admins.TransportingsBookings.indexrefund');
    }

    public function datatablerefund(Request $request)
    {
        if ($request->ajax()) {
            $data = BookingTransport::where('refund', null )->where( 'cancel','requested')->where('payment_status','fully payed')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user_name', function ($row) {
                    $name = User::where('id',$row->user_id)->first()->fname  ?? 'تم حذفه';
                    return $name;
                })
                // ->addColumn('user_phone', function ($row) {
                //     $name = User::where('id',$row->user_id)->first()->phone  ?? 'تم حذفه';
                //     return $name;
                // })
                // ->addColumn('user_email', function ($row) {
                //     $name = User::where('id',$row->user_id)->first()->email  ?? 'تم حذفه';
                //     return $name;
                // })
                ->addColumn('zone_name', function ($row) {
                    $name = Zone::where('id',$row->zone_id)->first()->name  ?? 'تم حذفه';
                    return $name;
                })
                ->addColumn('action', function ($row) {
                    $show = 'https://web.whatsapp.com/send?phone='.$row->whatsapp;
                    $actionBtn = '<a href="'.$show.' " class="edit m-1 btn btn-success btn-sm" target="_blank">Whats</a>';
                    $actionBtn .= '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Refund</a>';
                    return $actionBtn;
                })
                ->filter(
                    function ($instance) use ($request) {
                        if (request()->has('name')) {
                            $instance->where(function ($w) use ($request) {
                                $name = $request->get('name');
                                $w->orWhere('name', 'LIKE', "%$name%");
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
        $activityBooking = BookingTransport::findOrFail($request->id);
        $activityBooking->refund= 'done';
        $activityBooking->save();
        return response()->json(['err' => false, 'msg' => 'refund done'], 200);
    }
    public function cashDatatable(Request $request)
    {

        if ($request->ajax()) {
            $data = BookingTransport::select('*')->where([['payment_method', 'cash'],['cancel','not requested'],['payment_status','cash payment']])->latest();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user_name', function ($row) {
                    $name = User::where('id', $row->user_id)->first()->fname  ?? 'لا يوجد ';
                    return $name;
                })
                ->addColumn('user_phone', function ($row) {
                    $name = User::where('id', $row->user_id)->first()->phone  ?? 'لا يوجد ';
                    return $name;
                })->addColumn('user_email', function ($row) {
                    $name = User::where('id', $row->user_id)->first()->email  ?? 'لا يوجد ';
                    return $name;
                })
                ->addColumn('activity_title', function ($row) {
                    $name =  $row->activity->title ?? 'تم حذفه';
                    return $name;
                })
               ->addColumn('action', function ($row) {
                   $show = 'https://web.whatsapp.com/send?phone='.$row->whatsapp;
                    $actionBtn = '<a href="'.$show.' " class="edit m-1 btn btn-success btn-sm" target="_blank">Whats</a>';
                    $edit = route('transportingbookings.cashCollect',$row->id);
                    $actionBtn .= '<a href="' . $edit . '" class="edit m-1 btn btn-primary btn-sm">Collect</a>';
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
    
     public function indexCashDeleted()
    {
        return view('admins.TransportingsBookings.cashdeletes');
    }
    
    // public function indexCashDeleted ()
    // {
        
    // }
    
    public function cashDeleteDatatable(Request $request)
    {

        if ($request->ajax()) {
            $data = BookingTransport::onlyTrashed()->where([['payment_method', 'cash'],['cancel','not requested']]);
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
                    $show =  route('transportingbookings.showtransportingbookings', $row->id);
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
    
    public function deletecash(Request $request)
    {
        $p = BookingTransport::onlyTrashed()->findOrFail($request->id);
        $p->forceDelete();
        
    }
    
    public function cashCollect(Request $request)
    {
        $p = BookingTransport::findOrFail($request->id);
        $p->payment_status = 'fully payed';
        $p->save();
        return redirect()->route('transportingbookings.indexCash');
        // if ($p) {
        //     return response()->json(['err' => false, 'msg' => 'done'], 200);
        // } else {
        //     return response()->json(['err' => true, 'msg' => 'pro'], 200);
        // }
    }
    public function indexCash()
    {
        return view('admins.TransportingsBookings.cash');
    }
}
