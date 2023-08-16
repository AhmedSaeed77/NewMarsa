@extends('layout.metronic')

@section('content')
<ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
    <li class="nav-item">

        <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_4" style="margin-left:10px;">English</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_5">German</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_6">Czech</a>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="kt_tab_pane_4" role="tabpanel">
    <form action="{{route('boat.updateboat',$boat->id)}}" method="POST" id="kt_project_settings_form" class="form" enctype="multipart/form-data">
        @csrf
<div class="card card-custom card-sticky" id="kt_page_sticky_card">
    <div class="card-header">
     <div class="card-title">
      <h3 class="card-label"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/general/gen011.svg-->
        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.3" d="M16 0.200012H4C1.8 0.200012 0 2.00001 0 4.20001V16.2C0 18.4 1.8 20.2 4 20.2H16C18.2 20.2 20 18.4 20 16.2V4.20001C20 2.00001 18.2 0.200012 16 0.200012ZM15 10.2C15 10.9 14.8 11.6 14.6 12.2H18V16.2C18 17.3 17.1 18.2 16 18.2H12V14.8C11.4 15.1 10.7 15.2 10 15.2C9.3 15.2 8.6 15 8 14.8V18.2H4C2.9 18.2 2 17.3 2 16.2V12.2H5.4C5.1 11.6 5 10.9 5 10.2C5 9.50001 5.2 8.80001 5.4 8.20001H2V4.20001C2 3.10001 2.9 2.20001 4 2.20001H8V5.60001C8.6 5.30001 9.3 5.20001 10 5.20001C10.7 5.20001 11.4 5.40001 12 5.60001V2.20001H16C17.1 2.20001 18 3.10001 18 4.20001V8.20001H14.6C14.8 8.80001 15 9.50001 15 10.2Z" fill="currentColor"/>
        <path d="M12 1.40002C15.4 2.20002 18 4.80003 18.8 8.20003H14.6C14.1 7.00003 13.2 6.10003 12 5.60003V1.40002ZM5.40001 8.20003C5.90001 7.00003 6.80001 6.10003 8.00001 5.60003V1.40002C4.60001 2.20002 2.00001 4.80003 1.20001 8.20003H5.40001ZM14.6 12.2C14.1 13.4 13.2 14.3 12 14.8V19C15.4 18.2 18 15.6 18.8 12.2H14.6ZM8.00001 14.8C6.80001 14.3 5.90001 13.4 5.40001 12.2H1.20001C2.00001 15.6 4.60001 18.2 8.00001 19V14.8Z" fill="currentColor"/>
        </svg>Add New Boat
        </span>
        <!--end::Svg Icon-->
       <i class="mr-2"></i>

      </h3>
     </div>
     <div class="card-toolbar">
     <a href="{{ route('boat.boats') }}" class="btn btn-light btn-active-light-primary me-2">Discard</a>
      <div class="btn-group">
       
       <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Save Changes</button>
      
      </div>
     </div>
    </div>
    <div class="card-body">
     <!--begin::Form-->
     
      <div class="row">
       <div class="col-xl-2"></div>
       <div class="col-xl-8">
        <div class="my-5">

         <div class="form-group row">
            <div class="col-3">Boat Name:</div>
          <div class="col-9">

            <input type="text" class="form-control input-custom"  name="name_en"  value ="{{$boat->name_en}}" required/>
          </div>
         </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="my-5">

         <div class="form-group row">
            <div class="col-3">Overview:</div>
          <div class="col-9">

          <textarea class="form-control editor"  name="overview_en" rows="3">{{$boat->overview_en}}</textarea>
          </div>
         </div>
        </div>
                <div class="separator separator-dashed my-10"></div>
        <div class="row mt-3 mb-3 mb-5">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Boat image:</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Image input-->
                <div class="image-input image-input-outline" data-kt-image-input="true"
                    style="background-image: url({{ asset('images/boats/'. $boat->image) }})">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                        style="background-size: 75%; background-image: url({{ asset('images/boats/'. $boat->image) }})">
                    </div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label--> 
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="image" accept=".png, .jpg, .jpeg" class="form-control input-custom" />
                        <input type="hidden" name="avatar_remove" />
                        <!--end::Inputs-->
                    </label>
                    <!--end::Label-->
                    <!--begin::Cancel-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel image">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Cancel-->
                    <!--begin::Remove-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove image">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Remove-->
                </div>
                <!--end::Image input-->
                <!--begin::Hint-->
                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                <!--end::Hint-->
            </div>
            <div class="separator separator-dashed my-10"></div>
            <div class="my-5">

                
               </div>
               <div class="separator separator-dashed my-10"></div>
            
        </div>
       </div>
       <div class="col-xl-2"></div>
      </div>
 
     <!--end::Form-->
    </div>
   </div>
    </div>
    <div class="tab-pane fade" id="kt_tab_pane_5" role="tabpanel">

<div class="card card-custom card-sticky" id="kt_page_sticky_card">
    <div class="card-header">
     <div class="card-title">
      <h3 class="card-label">
        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.3" d="M16 0.200012H4C1.8 0.200012 0 2.00001 0 4.20001V16.2C0 18.4 1.8 20.2 4 20.2H16C18.2 20.2 20 18.4 20 16.2V4.20001C20 2.00001 18.2 0.200012 16 0.200012ZM15 10.2C15 10.9 14.8 11.6 14.6 12.2H18V16.2C18 17.3 17.1 18.2 16 18.2H12V14.8C11.4 15.1 10.7 15.2 10 15.2C9.3 15.2 8.6 15 8 14.8V18.2H4C2.9 18.2 2 17.3 2 16.2V12.2H5.4C5.1 11.6 5 10.9 5 10.2C5 9.50001 5.2 8.80001 5.4 8.20001H2V4.20001C2 3.10001 2.9 2.20001 4 2.20001H8V5.60001C8.6 5.30001 9.3 5.20001 10 5.20001C10.7 5.20001 11.4 5.40001 12 5.60001V2.20001H16C17.1 2.20001 18 3.10001 18 4.20001V8.20001H14.6C14.8 8.80001 15 9.50001 15 10.2Z" fill="currentColor"/>
            <path d="M12 1.40002C15.4 2.20002 18 4.80003 18.8 8.20003H14.6C14.1 7.00003 13.2 6.10003 12 5.60003V1.40002ZM5.40001 8.20003C5.90001 7.00003 6.80001 6.10003 8.00001 5.60003V1.40002C4.60001 2.20002 2.00001 4.80003 1.20001 8.20003H5.40001ZM14.6 12.2C14.1 13.4 13.2 14.3 12 14.8V19C15.4 18.2 18 15.6 18.8 12.2H14.6ZM8.00001 14.8C6.80001 14.3 5.90001 13.4 5.40001 12.2H1.20001C2.00001 15.6 4.60001 18.2 8.00001 19V14.8Z" fill="currentColor"/>
            </svg>Add New Boat
            </span> <i class="mr-2"></i>

      </h3>
     </div>
     <div class="card-toolbar">
     <a href="{{ route('boat.boats') }}" class="btn btn-light btn-active-light-primary me-2">Discard</a>
      <div class="btn-group">
      
       <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Save Changes</button>
      </div>
     </div>
    </div>
    <div class="card-body">
     <!--begin::Form-->
     
      <div class="row">
       <div class="col-xl-2"></div>
       <div class="col-xl-8">
        <div class="my-5">


         <div class="form-group row">
          <label class="col-3">Boat Name :</label>
          <div class="col-9">
           <input class="form-control input-custom" type="text" name="name_de"  value ="{{$boat->name_de}}" required/>
          </div>
         </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="my-5">

            <div class="form-group row">
               <div class="col-3">Overview:</div>
             <div class="col-9">
   
             <textarea class="form-control editor"  name="overview_de" rows="3">{{$boat->overview_de}}</textarea>
             </div>
            </div>
           </div>    
        <div class="separator separator-dashed my-10"></div>
       </div>
       <div class="col-xl-2"></div>
      </div>
  
     <!--end::Form-->
    </div>
   </div>
    </div>
    <div class="tab-pane fade" id="kt_tab_pane_6" role="tabpanel">

<div class="card card-custom card-sticky" id="kt_page_sticky_card">
    <div class="card-header">
     <div class="card-title">
      <h3 class="card-label">
        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.3" d="M16 0.200012H4C1.8 0.200012 0 2.00001 0 4.20001V16.2C0 18.4 1.8 20.2 4 20.2H16C18.2 20.2 20 18.4 20 16.2V4.20001C20 2.00001 18.2 0.200012 16 0.200012ZM15 10.2C15 10.9 14.8 11.6 14.6 12.2H18V16.2C18 17.3 17.1 18.2 16 18.2H12V14.8C11.4 15.1 10.7 15.2 10 15.2C9.3 15.2 8.6 15 8 14.8V18.2H4C2.9 18.2 2 17.3 2 16.2V12.2H5.4C5.1 11.6 5 10.9 5 10.2C5 9.50001 5.2 8.80001 5.4 8.20001H2V4.20001C2 3.10001 2.9 2.20001 4 2.20001H8V5.60001C8.6 5.30001 9.3 5.20001 10 5.20001C10.7 5.20001 11.4 5.40001 12 5.60001V2.20001H16C17.1 2.20001 18 3.10001 18 4.20001V8.20001H14.6C14.8 8.80001 15 9.50001 15 10.2Z" fill="currentColor"/>
            <path d="M12 1.40002C15.4 2.20002 18 4.80003 18.8 8.20003H14.6C14.1 7.00003 13.2 6.10003 12 5.60003V1.40002ZM5.40001 8.20003C5.90001 7.00003 6.80001 6.10003 8.00001 5.60003V1.40002C4.60001 2.20002 2.00001 4.80003 1.20001 8.20003H5.40001ZM14.6 12.2C14.1 13.4 13.2 14.3 12 14.8V19C15.4 18.2 18 15.6 18.8 12.2H14.6ZM8.00001 14.8C6.80001 14.3 5.90001 13.4 5.40001 12.2H1.20001C2.00001 15.6 4.60001 18.2 8.00001 19V14.8Z" fill="currentColor"/>
            </svg>Add New Blog
            </span> <i class="mr-2"></i>
      </h3>
     </div>
    <div class="card-toolbar">
        <a href="{{ route('boat.boats') }}" class="btn btn-light btn-active-light-primary me-2">Discard</a>
        <div class="btn-group">
            <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Save Changes</button>
        </div>
    </div>
    </div>
    <div class="card-body">
     <!--begin::Form-->
    
      <div class="row">
       <div class="col-xl-2"></div>
       <div class="col-xl-8">
        <div class="my-5">


         <div class="form-group row">
            <label class="col-3">Boat Name :</label>
            <div class="col-9">
             <input class="form-control input-custom" type="text" name="name_cz" value ="{{$boat->name_cz}}" required/>
            </div>
           </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="my-5">

            <div class="form-group row">
               <div class="col-3">Content:</div>
             <div class="col-9">
   
             <textarea class="form-control editor"  name="overview_cz" rows="3"  >{{$boat->overview_cz}}</textarea>
             </div>
            </div>
           </div>
                  
           <div class="separator separator-dashed my-10"></div>
        </div>
       </div>
       <div class="col-xl-2"></div>
      </div>
     </form>
     <!--end::Form-->
    </div>
   </div>
    </div>
</div>
@endsection

@section('js')


<script>
        tinymce.init({
            selector: '.editor',
            height: '800',
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            link_list: [{
                    title: 'My page 1',
                    value: 'https://www.codexworld.com'
                },
                {
                    title: 'My page 2',
                    value: 'http://www.codexqa.com'
                }
            ],
            image_list: [{
                    title: 'My page 1',
                    value: 'https://www.codexworld.com'
                },
                {
                    title: 'My page 2',
                    value: 'http://www.codexqa.com'
                }
            ],
            image_class_list: [{
                    title: 'None',
                    value: ''
                },
                {
                    title: 'Some class',
                    value: 'class-name'
                }
            ],
            importcss_append: true,
            file_picker_callback: (callback, value, meta) => {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    callback('https://www.google.com/logos/google.jpg', {
                        text: 'My text'
                    });
                }

                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    callback('https://www.google.com/logos/google.jpg', {
                        alt: 'My alt text'
                    });
                }

                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    callback('movie.mp4', {
                        source2: 'alt.ogg',
                        poster: 'https://www.google.com/logos/google.jpg'
                    });
                }
            },
            templates: [{
                    title: 'New Table',
                    description: 'creates a new table',
                    content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
                },
                {
                    title: 'Starting my story',
                    description: 'A cure for writers block',
                    content: 'Once upon a time...'
                },
                {
                    title: 'New list with dates',
                    description: 'New List with dates',
                    content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
                }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 400,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image table',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });
    </script>



<script>
    $(document).ready(function () {

    
    $("#kt_project_settings_form").validate({

        highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass('is-valid').removeClass('is-invalid');
            },

        rules: {
                title_en: 
                        {
                            required: true,
                        },
                        title_de: 
                        {
                            required: true,
                           // minlength: 5,
                           // pattern: regx_ar
                        },
                        title_cz: {
                            required: true,
                            //minlength: 5,
                           // pattern: regx_ar
                        },
                        content_en: {
                            required: true,
                            //minlength: 5,
                           // pattern: regx_ar
                        },
                        content_de: {
                            required: true,
                            //minlength: 5,
                           // pattern: regx_ar
                        },
                        content_cz: {
                            required: true,
                        }
                },
                
              
            messages: {
                        title_en:   
                        {
                            required: "الاسم باللغة الانجليزيه مطلوب",
                            //minlength: "الاسم 5 حروف على الاقل",
                            //pattern: "الاسم باللغة العربية ",
                        },
                        content_en:   
                        {
                            required: "الوصف باللغة الانجليزيه مطلوب",
                            //minlength: "الاسم 5 حروف على الاقل",
                            //pattern: "الاسم باللغة العربية ",
                        },
                        title_de:   
                        {
                            required: "الاسم باللغة الالمانيه مطلوب",
                           // minlength: "الاسم 5 حروف على الاقل",
                            //pattern: "الاسم باللغة العربية ",
                        },
                        title_cz:   
                        {
                            required: "الاسم باللغة التشيكيه مطلوب",
                           // minlength: "الاسم 5 حروف على الاقل",
                            //pattern: "الاسم باللغة العربية ",
                        },
                        image:   
                        {
                            required: " الصوره مطلوبه  ",
                           // minlength: "الاسم 5 حروف على الاقل",
                            //pattern: "الاسم باللغة العربية ",
                        },
                        images:   
                        {
                            required: " الصور مطلوبه  ",
                           // minlength: "الاسم 5 حروف على الاقل",
                            //pattern: "الاسم باللغة العربية ",
                        },
                        
                    }
    });
});
   </script>

@endsection
