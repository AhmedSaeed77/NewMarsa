<?php

namespace App\Http\Controllers;

use DataTables;
use Redirect;
use Auth;
use App\Models\Car;
use App\Models\Blog;
use App\Models\BlogImage;
use App\Models\CarImage;
use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class CarController extends Controller
{
    public function index(Request $request)
    {

        return view('admins.cars.index');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Car::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit =  route('car.editcar',$row->id) ;
                    $actionBtn = '<a href=" ' . $edit . '" class="edit btn btn-success btn-sm m-1">Edit</a>';
                    $actionBtn .= '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->filter(
                    function ($instance) use ($request) {
                        if (request()->has('name')) {
                            $instance->where(function ($w) use ($request) {
                                $title = $request->get('name');
                                $w->orWhere('title', 'LIKE', "%$title%");
                            });
                        }
                    }
                ,true)
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('admins.cars.addcar');
    }


    public function store(Request $request)
    {
       
       
    }


    public function edit($id)
    {
        $car =  Car::find($id);
        return view('admins.cars.edit', ['car'=>$car]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([

            'name'=>'required',
            'included'=>'required',
          ],[
             'name'=>' اسم السياره مطلوب ',
             'included'=>'محتوى السياره مطلوب', 
          ]);

        $car = Car::find($id);
        $car->name = $request->name;
        $car->included = $request->included;
        $car->save();
        
        if($request->file('images'))
            {
                $carimage = CarImage::where('car_id', $car->id)->get();

                foreach($carimage as $image)
                {
                    $image->delete();

                    if (File::exists('images/cars/' .$image->image)) 
                    {
                        File::delete('images/cars/'.$image->image);
                    }
                }

                foreach ($request->file('images') as $image) 
                {

                    $carimage = new CarImage();

                    $carimage->car_id = $car->id;

                    $file = $image;
                    $filename = $file->getClientOriginalName();
                    $filename = str_replace(" ","",$filename);
                    $file->move('images/cars', $filename);
                    $carimage->image = $filename;
                    
                    $carimage->save();
                }
            }

        return FacadesRedirect::route('car.cars');
    }


    public function destroy(Request $request)
    {
        $p = Car::findOrFail($request->id);
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

    public function editimage()
    {
        return view('admins.cars.editimages');
    }

    public function getimagesvue($id)
    {
        $car = Car::findorfail($id);
        $carimages =  $car->images()->orderBy('indexx','ASC')->get();
        foreach($carimages as $a)
        {
            $a->image = url('images/cars/'.$a->image);
        }
        return response()->json(['carimages' => $carimages], 200);
    }

    public function deleteimage(Request $request)
    {
        $car = CarImage::findorfail($request->id);
       
        $car->delete();
         
        return response()->json(['err' => false, 'msg' => 'تم الحذف بنجاح'], 200);
    }

    public function updateimage(Request $request)
    {
        $image = new  CarImage();
        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/cars/', $filename);
            $image->image = $filename;
        }
        $image->indexx = $request->indexx;
        $image->car_id = $request->id;
        $image->save();
        return response()->json(['err' => false, 'msg' => 'تم الحفظ بنجاح'], 200);
    }
}
