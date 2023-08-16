<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use DataTables;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\PackageActivity;
use App\Models\PackageImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class PackageController extends Controller
{
    public function show($id)
    {
        $package = Package::find($id);
        
        $packActiv = PackageActivity::where('package_id',$package->id)->get();
       // $activities = $package->activities;
        
        return view('admins.packages.packagedetails', ['package'=>$package,'activities'=>$packActiv]);
    }

    public function index(Request $request)
    {
        $pakages = Package::all();
        return view('admins.packages.package',['pakages'=>$pakages]);
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Package::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit =  route('package.editpackage',$row->id) ;
                    $show =  route('package.showpackage', $row->id);
                    $actionBtn = '<a href=" ' . $edit . '" class="edit btn btn-success btn-sm m-1">Edit</a>';
                    $actionBtn .= '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    $actionBtn .= '<a href=" ' . $show . '" class="edit btn btn-dark btn-sm m-1">Show</a>';
                    return $actionBtn;
                })
                ->filter(
                    function ($instance) use ($request) {
                        if (request()->has('name')) {
                            $instance->where(function ($w) use ($request) {
                                $title = $request->get('title');
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
        return view('admins.packages.create2');
    }

    public function store(Request $request)
    {
       
        $request->validate([
           
        //     'name' => 'required',
        //     'duration'=> 'required',
        //     'descount'=> 'required',
        //     'price'=> 'required',
        //     'pricechild'=> 'required',
        //     'transport'=> 'required',
        //     'description_en'=> 'required',
        //     'description_de'=> 'required',
        //     'description_cz'=> 'required', 
        //     'image' => 'required' ,
        'images' => 'required' ,

        ],[
        //     'name'=>' اسم الباكدج مطلوب ',
        //     'duration'=>' مده الباكدج مطلوب ',
        //     'descount'=>' خصم الباكدج مطلوب ',
        //     'descount'=>' خصم الباكدج مطلوب ',
        //     'price'=>' سعر الباكدج مطلوب ',
        //     'pricechild'=>' سعرالاطفال الباكدج مطلوب ',
        //     'description_en'=>' وصف الباكدج مطلوب ',
        //     'description_de'=>' وصف الباكدج مطلوب ',
        //     'description_cz'=>' وصف الباكدج مطلوب ',
            'images'=>' صوره الباكدج مطلوب ',
        ]);

        //$packages = $request->kt_docs_repeater_basic;

        $pkg = new Package();
        $pkg->name_en = $request->name_en;
        
        $pkg->duration = $request->duration;
        $pkg->descount = $request->descount;
        $pkg->price = $request->price;
        $pkg->price_child = $request->pricechild;
        $pkg->type = $request->type;
        $pkg->description_en = $request->description_en;
        $pkg->includes_en = $request->includes_en;
        
        $pkg->additionalprice = $request->additionalprice;
        $pkg->descriptiuonadditionalprice_en = $request->descriptiuonadditionalprice_en;

            if ($request->descriptiuonadditionalprice_de != null) 
            {
                $pkg->descriptiuonadditionalprice_de = $request->descriptiuonadditionalprice_de;
            }
            else
            {
                $pkg->descriptiuonadditionalprice_de = $request->descriptiuonadditionalprice_en;
            }
            if ($request->descriptiuonadditionalprice_cz != null) 
            {
                $pkg->descriptiuonadditionalprice_ecz = $request->descriptiuonadditionalprice_cz;
            }
            else
            {
                $pkg->descriptiuonadditionalprice_cz = $request->descriptiuonadditionalprice_en;
            }
        
        if($request->name_de != null)
        {
            $pkg->name_de = $request->name_de;
        }
        else 
        {
            $pkg->name_de = $request->name_en;
        }

        if($request->name_cz != null)
        {
            $pkg->name_cz = $request->name_cz;
        }
        else 
        {
            $pkg->name_cz = $request->name_en;
        }

        if($request->description_de != null)
        {
            $pkg->description_de = $request->description_de;
        }
        else
        {
            $pkg->description_de = $request->description_en;
        }

        if($request->description_cz != null)
        {
            $pkg->description_cz = $request->description_cz;
        }
        else
        {
            $pkg->description_cz = $request->description_en;
        }

        if($request->includes_de != null)
        {
            $pkg->includes_de = $request->includes_de;
        }
        else
        {
            $pkg->includes_de = $request->includes_en;
        }

        if($request->includes_cz != null)
        {
            $pkg->includes_cz = $request->includes_cz;
        }
        else
        {
            $pkg->includes_cz = $request->includes_en;
        }

        if($request->transport != null)
        {
            $pkg->transport = $request->transport;
        }
        else 
        {
            $pkg->transport = 'false';
        }
        if ($request->has('image')) 
        {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/package', $filename);
            $pkg->image = $filename;
        }

        $pkg->save();

        foreach ($request->file('images') as $image) 
        {
            $pkgimage = new PackageImage();

            $pkgimage->package_id = $pkg->id;

            $file = $image;
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/package', $filename);
            $pkgimage->image = $filename;
            
            $pkgimage->save();
        }
        
        foreach ($request->kt_docs_repeater_basic as $activity) 
        {
            $pkgactive = new PackageActivity();
            $pkgactive->activity_id = $activity['activity'];
            $pkgactive->package_id = $pkg->id;
            $pkgactive->save();
        }
        
        $slugpackage = Package::where('id',$pkg->id)->first();
        $slugpackage->slug = str_replace(" ","-",$slugpackage->name_en).'-'.$slugpackage->id;
        $slugpackage->save();
        
        
        return FacadesRedirect::route('package.packages');
    }

    public function delete(Request $request)
    {
        $package = Package::findOrFail($request->id);

        if (File::exists('images/package/' .$package->image)) 
        {
            File::delete('images/package/'.$package->image);
        }
        
        $pkgs = PackageActivity::all();
        
        foreach($pkgs as $pkg)
        {
            if($pkg->package_id == $package->id)
            {
                $pkg->delete();
            }
        }

        $y = $package->delete();
        if($y)
        {
            return response()->json(['err' => false , 'msg' => 'deleted done'],200);
        }
        else
        {
            return response()->json(['err' => true , 'msg' => 'pro'],200);
        }
    }

    public function edit($id)
    {
        $package = Package::find($id);
        
         $packActiv = PackageActivity::where('package_id',$package->id)->get();
         //dd($package->activities);
        
        $arr = [] ;
        foreach($packActiv as $boat)
        {
            $arr[] = $boat->activity_id; 
        }
         //dd($arr);
        
        return view('admins.packages.edit', ['package'=>$package,'arr'=>$arr]);
    }

    public function update(Request $request,$id)
    {
        $package = Package::find($id);

        $package->name_en = $request->name_en;
        $package->slug = str_replace(" ","-",$package->name_en).'-'.$package->id;
        $package->duration = $request->duration;
        $package->descount = $request->descount;
        $package->price = $request->price;
        $package->price_child = $request->pricechild;
        $package->type = $request->type;
        $package->description_en = $request->description_en;
        $package->includes_en = $request->includes_en;
        
        $package->additionalprice = $request->additionalprice;
        $package->descriptiuonadditionalprice_en = $request->descriptiuonadditionalprice_en;
        $package->descriptiuonadditionalprice_cz = $request->descriptiuonadditionalprice_cz;
        $package->descriptiuonadditionalprice_de = $request->descriptiuonadditionalprice_de;
        
        if($request->name_de != null)
        {
            $package->name_de = $request->name_de;
        }
        else 
        {
            $package->name_de = $request->name_en;
        }

        if($request->name_cz != null)
        {
            $package->name_cz = $request->name_cz;
        }
        else 
        {
            $package->name_cz = $request->name_en;
        }

        if($request->description_de != null)
        {
            $package->description_de = $request->description_de;
        }
        else
        {
            $package->description_de = $request->description_en;
        }

        if($request->description_cz != null)
        {
            $package->description_cz = $request->description_cz;
        }
        else
        {
            $package->description_cz = $request->description_en;
        }

        if($request->includes_de != null)
        {
            $package->includes_de = $request->includes_de;
        }
        else
        {
            $package->includes_de = $request->includes_en;
        }

        if($request->includes_cz != null)
        {
            $package->includes_cz = $request->includes_cz;
        }
        else
        {
            $package->includes_cz = $request->includes_en;
        }

        if ($request->has('image')) 
        {
            if (File::exists('images/package/' .$package->image)) 
            {
                File::delete('images/package/'.$package->image);
            }
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/package', $filename);
            $package->image = $filename;
        }

        $package->save();

        if($request->file('images'))
        {
            $pkgimage = PackageImage::where('package_id', $package->id)->get();

            foreach($pkgimage as $image)
            {
                $image->delete();
                if (File::exists('images/package/' .$image->image)) 
                {
                    File::delete('images/package/'.$image->image);
                }
            }

            foreach ($request->file('images') as $image) 
            {

                $pkgimage = new PackageImage();

                $pkgimage->package_id = $package->id;

                $file = $image;
                $filename = $file->getClientOriginalName();
                $filename = str_replace(" ","",$filename);
                $file->move('images/package', $filename);
                $pkgimage->image = $filename;
                
                $pkgimage->save();
            }
        }

        //$pkgs = PackageActivity::all();

        // if($request->kt_docs_repeater_basic)
        // {
        //     $pkgs = PackageActivity::where('package_id',$package->id)->get();
        //     foreach ($pkgs as $pkg) 
        //     {
        //         $pkg->forceDelete();
        //     }
            
        //     foreach ($request->kt_docs_repeater_basic as $package) 
        //     {
        //         $pkgactive = new PackageActivity();
        //         $pkgactive->activity_id = $package['activity'];
        //         $pkgactive->package_id = $id;
        //         $pkgactive->save();
        //     }
        // }
        if($request->activity)
        {
            $activplace = PackageActivity::where('package_id', $package->id)->get();
            foreach($activplace as $place)
                {
                    $place->delete();
                }
                foreach ($request->activity as $place)
                {
                    $activplace = new PackageActivity();
                    $activplace->package_id = $package->id;
                    $activplace->activity_id = $place;
                    $activplace->save();
                }   
            }

        return FacadesRedirect::route('package.packages');
    }

    public function editimage()
    {
        return view('admins.packages.editimages');
    }

    public function getimagesvue($id)
    {
        $package = Package::findorfail($id);
        $packageimages =  $package->images()->orderBy('indexx','ASC')->get();
        foreach($packageimages as $a)
        {
            $a->image = url('images/package/'.$a->image);
        }
        return response()->json(['packageimages' => $packageimages], 200);
    }

    public function deleteimage(Request $request)
    {
        $packageimages = PackageImage::findorfail($request->id);
       
        $packageimages->delete();
         
        return response()->json(['err' => false, 'msg' => 'تم الحذف بنجاح'], 200);
    }

    public function updateimage(Request $request)
    {
        $image = new  PackageImage();
        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/package/', $filename);
            $image->image = $filename;
        }
        $image->indexx = $request->indexx;
        $image->package_id = $request->id;
        $image->save();
        return response()->json(['err' => false, 'msg' => 'تم الحفظ بنجاح'], 200);
    }
}
