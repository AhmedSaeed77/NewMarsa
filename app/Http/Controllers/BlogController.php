<?php

namespace App\Http\Controllers;
use DataTables;
use Redirect;
use Auth;
use App\Models\Blog;
use App\Models\BlogImage;
use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        $blogs = Blog::all();
        //dd($blogs);
        return view('admins.blogs.blog',['blogs'=>$blogs]);
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user_name', function ($row) {
                    $name =  $row->admin->name ?? 'تم حذفه';
                    return $name;
                })
                ->addColumn('action', function ($row) {
                    $edit =  route('blog.editblog',$row->id) ;
                    $actionBtn = '<a href=" ' . $edit . '" class="edit btn btn-success btn-sm m-1">Edit</a>';
                    $actionBtn .= '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
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
        return view('admins.blogs.addblog');
    }


    public function store(Request $request)
    {
       
        $request->validate([
          'title_en'=>'required',
          'content_en'=>'required',
        //   'title_de'=>'required',
        //   'content_de'=>'required',
        //   'title_cz'=>'required',
        //   'content_cz'=>'required',
           'image'=>'required',
        ],[
           'title_en'=>' عنوان المقال مطلوب ',
           'content_en'=>'محتوى المقال مطلوب',
        //    'title_de'=>' عنوان المقال مطلوب ',
        //    'content_de'=>'محتوى المقال مطلوب',
        //    'title_cz'=>' عنوان المقال مطلوب ',
        //    'content_cz'=>'محتوى المقال مطلوب',
         //  'image'=>'صوره  المقال مطلوب  ', 
        ]);

        $blog= new Blog();

        $blog->title_en = $request->title_en;
        
        $blog->content_en = $request->content_en;

        if($request->title_de != null)
        {
            $blog->title_de = $request->title_de;
        }
        else
        {
            $blog->title_de = $request->title_en;
        }

        if($request->title_cz != null)
        {
            $blog->title_cz = $request->title_cz;
        }
        else
        {
            $blog->title_cz = $request->title_en;
        }

        if($request->content_de != null)
        {
            $blog->content_de = $request->content_de;
        }
        else
        {
            $blog->content_de = $request->content_en;
        }

        if($request->content_cz != null)
        {
            $blog->content_cz = $request->content_cz;
        }
        else
        {
            $blog->content_cz = $request->content_en;
        }

        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $filename = str_replace(" ","",$filename);
        $file->move('images/blogs',$filename);
        $blog->image = $filename;
        $blog->admin_id	 = auth()->guard('admin')->user()->id ;

        $blog->save();

        
        foreach ($request->file('images') as $image) 
        {

            $blogimage = new BlogImage();

            $blogimage->blog_id = $blog->id;
            $file = $image;
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/blogs', $filename);
            $blogimage->image = $filename;
                    
            $blogimage->save();
        }
        
        $slugblog = Blog::where('id',$blog->id)->first();
        $slugblog->slug = str_replace(" ","-",$slugblog->title_en).'-'.$slugblog->id;
        $slugblog->save();
        
        return FacadesRedirect::route('blog.blogs');
    }

    public function delete(Request $request)
    {
        $blog = Blog::findOrFail($request->id);
        
        if (File::exists('images/blogs/' .$blog->image)) 
        {
            File::delete('images/blogs/'.$blog->image);
        }
        $blog->images()->delete();
        $y = $blog->delete();
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
        $blog =  Blog::find($id);
        return view('admins.blogs.edit', ['blog'=>$blog]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([

            'title_en'=>'required',
            'content_en'=>'required',
            // 'title_de'=>'required',
            // 'content_de'=>'required',
            // 'title_cz'=>'required',
            // 'content_cz'=>'required',
            //'image'=>'required',
          ],[
             'title_en'=>' عنوان المقال مطلوب ',
             'content_en'=>'محتوى المقال مطلوب',
             'title_de'=>' عنوان المقال مطلوب ',
             'content_de'=>'محتوى المقال مطلوب',
             'title_cz'=>' عنوان المقال مطلوب ',
             'content_cz'=>'محتوى المقال مطلوب',
             //'image'=>'صوره  المقال مطلوب  ', 
          ]);

        $blog = Blog::find($id);
        $blog->title_en = $request->title_en;
        $blog->slug = str_replace(" ","-",$blog->title_en).'-'.$blog->id;
        $blog->content_en = $request->content_en;

        if($request->title_de != null)
        {
            $blog->title_de = $request->title_de;
        }
        else
        {
            $blog->title_de = $request->title_en;
        }

        if($request->title_cz != null)
        {
            $blog->title_cz = $request->title_cz;
        }
        else
        {
            $blog->title_cz = $request->title_en;
        }

        if($request->content_de != null)
        {
            $blog->content_de = $request->content_de;
        }
        else
        {
            $blog->content_de = $request->content_en;
        }

        if($request->content_cz != null)
        {
            $blog->content_cz = $request->content_cz;
        }
        else
        {
            $blog->content_cz = $request->content_en;
        }

        if($request->hasfile('image'))
        {
            if (File::exists('images/blogs/' .$blog->image)) 
            {
                File::delete('images/blogs/'.$blog->image);
            }
            $file=$request->file('image');
            $filename=$file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/blogs',$filename);
            $blog->image=$filename ;
        }
        
        $blog->save();

        if($request->file('images'))
            {
                $blogimage = BlogImage::where('blog_id', $blog->id)->get();

                foreach($blogimage as $image)
                {
                    $image->delete();

                    if (File::exists('images/blogs/' .$image->image)) 
                    {
                        File::delete('images/blogs/'.$image->image);
                    }
                }

                foreach ($request->file('images') as $image) 
                {

                    $blogimage = new BlogImage();

                    $blogimage->blog_id = $blog->id;

                    $file = $image;
                    $filename = $file->getClientOriginalName();
                    $filename = str_replace(" ","",$filename);
                    $file->move('images/blogs', $filename);
                    $blogimage->image = $filename;
                    
                    $blogimage->save();
                }
            }
        return FacadesRedirect::route('blog.blogs');
    }

    public function editimage()
    {
        return view('admins.blogs.editimages');
    }

    public function getimagesvue($id)
    {
        $blog = Blog::findorfail($id);
        $blogimages =  $blog->images()->orderBy('indexx','ASC')->get();
        foreach($blogimages as $a)
        {
            $a->image = url('images/blogs/'.$a->image);
        }
        return response()->json(['blogimages' => $blogimages], 200);
    }

    public function deleteimage(Request $request)
    {
        $liveboard = BlogImage::findorfail($request->id);
       
        $liveboard->delete();
         
        return response()->json(['err' => false, 'msg' => 'تم الحذف بنجاح'], 200);
    }

    public function updateimage(Request $request)
    {
        $image = new  BlogImage();
        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $filename = str_replace(" ","",$filename);
            $file->move('images/blogs/', $filename);
            $image->image = $filename;
        }
        $image->indexx = $request->indexx;
        $image->blog_id = $request->id;
        $image->save();
        return response()->json(['err' => false, 'msg' => 'تم الحفظ بنجاح'], 200);
    }

}
