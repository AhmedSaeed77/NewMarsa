@extends('layout.metronic')

@section('content')
<ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
    <li class="nav-item">

        <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_4"style="margin-left:10px;">English</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_5">German</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_6">Czech</a>
    </li>
</ul>
<form action="{{route('package.updatepackage',$package->id)}}" method="POST" id="kt_project_settings_form" class="form" enctype="multipart/form-data">
    @csrf
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="kt_tab_pane_4" role="tabpanel">

<div class="card card-custom card-sticky" id="kt_page_sticky_card">
    <div class="card-header">
     <div class="card-title">
      <h3 class="card-label" ><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/abstract/abs029.svg-->
       <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/general/gen005.svg-->
<!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/maps/map003.svg-->
<!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/art/art010.svg-->
<span class="svg-icon svg-icon-muted svg-icon-2hx" ><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path opacity="0.3" d="M22 4H5C4.4 4 4 4.4 4 5V22H13C13.6 22 14 21.6 14 21V18H17C17.6 18 18 17.6 18 17V14H21C21.6 14 22 13.6 22 13V4Z" fill="currentColor"/>
    <path d="M13 18H10V15C10 14.4 10.4 14 11 14H14V17C14 17.6 13.6 18 13 18ZM3 18C2.4 18 2 18.4 2 19V21C2 21.6 2.4 22 3 22H9C9.6 22 10 21.6 10 21V18H3ZM18 13V10H15C14.4 10 14 10.4 14 11V14H17C17.6 14 18 13.6 18 13ZM21 2H19C18.4 2 18 2.4 18 3V10H21C21.6 10 22 9.6 22 9V3C22 2.4 21.6 2 21 2Z" fill="currentColor"/>
    </svg>Edit Pakage
    </span>
    <!--end::Svg Icon-->
    <!--end::Svg Icon-->

       <i class="mr-2"></i>

      </h3>
     </div>
     <div class="card-toolbar">
     <a href="{{ route('package.packages') }}"
                                class="btn btn-light btn-active-light-primary me-2">Discard</a>
      <div class="btn-group">
       {{-- <button type="button" class="btn btn-primary font-weight-bolder">
        <i class="ki ki-check icon-sm"></i>
        Save Form
       </button> --}}
       <button type="submit" class="btn btn-primary" >Save Changes</button>
       {{-- <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       </button> --}}

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
            <div class="col-3">Package Name:</div>
          <div class="col-9">

            <input type="text" class="form-control form-control-solid" name="name_en" value="{{$package->name_en}}" required/>
          </div>
         </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="my-5">

         <div class="form-group row">
         </div>
         <div class="form-group row">
                            <div class="col-3">Package cities:</div>
                            <div class="col-9">

                                <select name="type" class="form-control form-control-solid"
                                    aria-label="Disabled select example">
                                    <option selected disabled>Choose cities</option>
                                    <option @if($package->type == 'hurghada') selected @endif value="hurghada">hurghada</option>
                                    <option @if($package->type == 'rest') selected @endif value="rest">Marsa Alam, Porto Ghaleb and El-Quseir</option>
                                </select>
                            </div>
                        </div>
        </div>
           <div class="separator separator-dashed my-10"></div>
           <div class="form-group row">
                            <div class="col-3">Duration:</div>
                            <div class="col-9">

                                <input type="text" class="form-control form-control-solid" name="duration"
                                        value="{{$package->duration}}" required />
                            </div>
                        </div>

           <div class="separator separator-dashed my-10"></div>
           <div class="form-group row">
                            <div class="col-3">Discount:</div>
                            <div class="col-9">

                                <input type="number" class="form-control form-control-solid" name="descount"
                                        value="{{$package->descount}}" required />
                            </div>
                        </div>

           <div class="separator separator-dashed my-10"></div>
           
        <div class="row mt-3 mb-3 mb-8">
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Price per person:</div>
            </div>
            <div class="col-xl-9 fv-row mt-3 mb-3">
                <input type="number" class="form-control form-control-solid" name="price"
                        value="{{$package->price}}" required/>
            </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        
        <div class="row mt-3 mb-3 mb-8">
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Price per child:</div>
            </div>

            <div class="col-xl-9 fv-row mt-3 mb-3">
                <input type="number" class="form-control form-control-solid" name="pricechild"
                    value="{{$package->price_child}}" required/>
            </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="row mt-3 mb-3 mb-8">
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Aditional Price:</div>
            </div>

            <div class="col-xl-9 fv-row mt-3 mb-3">
                 <input type="number" class="form-control form-control-solid" name="additionalprice"
                    placeholder="please enter the package adddtional price" value="{{$package->additionalprice}}" />
            </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="row mt-3 mb-3 mb-8">
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Description Aditional Price:</div>
            </div>

            <div class="col-xl-9 fv-row mt-3 mb-3">
                <textarea class="form-control" name="descriptiuonadditionalprice_en" rows="3" >{{$package->descriptiuonadditionalprice_en}}</textarea>
            </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        
        <div class="row mt-3 mb-3 mb-8">

            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Transport:</div>
            </div>
            
            <div class="col-xl-9 fv-row mt-3 mb-3">
            <input class="form-check-input" type="checkbox" name="transport" value="true"
                    @if($package->transport == 'true') checked @endif  id="form_checkbox" />
            </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="my-52">


           <div class="form-group mb-1">
            <label for="exampleTextarea">Description:</span></label>
            <textarea class="editor" name="description_en" rows="3" >{{$package->description_en}}</textarea>
           </div>

           </div>

        <div class="separator separator-dashed my-10"></div>
        <div class="my-52">
           <div class="form-group mb-1">
            <label for="exampleTextarea">Includes:</span></label>
            <textarea class="editor" name="includes_en" rows="3" >{{$package->includes_en}}</textarea>
           </div>

           </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="row mt-3 mb-3 mb-5">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Package image:</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Image input-->
                <div class="image-input image-input-outline" data-kt-image-input="true"
                    style="background-image: url({{ asset('images/package/'.$package->image) }})">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                        style="background-size: 75%; background-image: url({{ asset('images/package/'.$package->image) }})">
                    </div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="image" accept=".png, .jpg, .jpeg" />
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
            <div class="row mt-3 mb-3 mb-8">
                <!--begin::Col-->
                
                
                <!--end::Col-->
                <!--begin::Col-->

                <!--begin::Col-->
            </div>
            <div class="separator separator-dashed my-10"></div>
            <!--<div class="row mt-3 mb-3 mb-8">-->
           
            <!--    <div class="col-lg-4 col-md-6 col-sm-12">-->
            <!--        <div class="fs-6 fw-semibold mt-2 mb-3">Activity :</div>-->
            <!--    </div>-->
            <!--    <div class="col-l col-md col-sm-12">-->
            <!--        <div id="kt_docs_repeater_basic">-->
                    
            <!--            <div class="form-group">-->
            <!--                <div data-repeater-list="kt_docs_repeater_basic">-->
            <!--                    <div data-repeater-item>-->
            <!--                        <div class="form-group row">-->
            <!--                            <div class="col-md-6">-->
            <!--                                <select class="form-control" name="activity"  >-->
            <!--                                    @foreach (DB::table('activities')->get() as $activity)-->
            <!--                                        <option value="{{ $activity->id }}"> {{ $activity->title }} </option>-->
            <!--                                    @endforeach-->
            <!--                                </select>-->
            <!--                            </div>-->
            <!--                            <div class="col-md-4">-->
            <!--                                <a href="javascript:;" data-repeater-delete-->
            <!--                                    class="btn btn-sm btn-light-danger mt-3 mt-md-8">-->
            <!--                                    <i class="la la-trash-o"></i>Delete-->
            <!--                                </a>-->
            <!--                            </div>-->
    
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="form-group mt-5">-->
            <!--                <a href="javascript:;" data-repeater-create class="btn btn-light-primary">-->
            <!--                    <i class="la la-plus"></i>Add-->
            <!--                </a>-->
            <!--            </div>-->
                        
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
             <div class="row mt-3 mb-3 mb-8">
                
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="fs-6 fw-semibold mt-2 mb-3">activity :</div>
                </div>
                <div class="col-l col-md col-sm-12">
                    <select class="form-control" name="activity[]"  multiple>
                        @foreach (DB::table('activities')->get() as $activity)
                            <option value= "{{$activity->id }}" {{is_array($arr) && in_array($activity->id, $arr) ? 'selected' : '' }}> {{ $activity->title }} </option>
                        @endforeach
                    </select>
                </div>
               
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
        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.3" d="M22 4H5C4.4 4 4 4.4 4 5V22H13C13.6 22 14 21.6 14 21V18H17C17.6 18 18 17.6 18 17V14H21C21.6 14 22 13.6 22 13V4Z" fill="currentColor"/>
            <path d="M13 18H10V15C10 14.4 10.4 14 11 14H14V17C14 17.6 13.6 18 13 18ZM3 18C2.4 18 2 18.4 2 19V21C2 21.6 2.4 22 3 22H9C9.6 22 10 21.6 10 21V18H3ZM18 13V10H15C14.4 10 14 10.4 14 11V14H17C17.6 14 18 13.6 18 13ZM21 2H19C18.4 2 18 2.4 18 3V10H21C21.6 10 22 9.6 22 9V3C22 2.4 21.6 2 21 2Z" fill="currentColor"/>
            </svg>Edit German
            </span>
            </span><i class="mr-2"></i>

      </h3>
     </div>
     <div class="card-toolbar">
     <a href="{{ route('package.packages') }}"
                                class="btn btn-light btn-active-light-primary me-2">Discard</a>
      <div class="btn-group">
       {{-- <button type="button" class="btn btn-primary font-weight-bolder">
        <i class="ki ki-check icon-sm"></i>
        Save Form
       </button> --}}
       <button type="submit" class="btn btn-primary" >Save Changes</button>
       {{-- <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       </button> --}}

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
   <div class="col-3">Package Name:</div>
 <div class="col-9">

 <input type="text" class="form-control form-control-solid" name="name_de" value="{{$package->name_de}}"  />
 </div>
</div>
</div>

       <div class="separator separator-dashed my-10"></div>
       <div class="my-52">


           <div class="form-group mb-1">
            <label for="exampleTextarea">Description Aditional Price:</span></label>
            <textarea class="form-control" name="descriptiuonadditionalprice_de" rows="3" >{{$package->descriptiuonadditionalprice_de}}</textarea>
           </div>

           </div>

        <div class="separator separator-dashed my-10"></div>
        <div class="my-52">


           <div class="form-group mb-1">
            <label for="exampleTextarea">Description:</span></label>
            <textarea class="editor" name="description_de" rows="3" >{{$package->description_de}}</textarea>
           </div>

           </div>

        <div class="separator separator-dashed my-10"></div>
        <div class="my-52">
           <div class="form-group mb-1">
            <label for="exampleTextarea">Includes:</span></label>
            <textarea class="editor" name="includes_de" rows="3" >{{$package->includes_de}}</textarea>
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
        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.3" d="M22 4H5C4.4 4 4 4.4 4 5V22H13C13.6 22 14 21.6 14 21V18H17C17.6 18 18 17.6 18 17V14H21C21.6 14 22 13.6 22 13V4Z" fill="currentColor"/>
            <path d="M13 18H10V15C10 14.4 10.4 14 11 14H14V17C14 17.6 13.6 18 13 18ZM3 18C2.4 18 2 18.4 2 19V21C2 21.6 2.4 22 3 22H9C9.6 22 10 21.6 10 21V18H3ZM18 13V10H15C14.4 10 14 10.4 14 11V14H17C17.6 14 18 13.6 18 13ZM21 2H19C18.4 2 18 2.4 18 3V10H21C21.6 10 22 9.6 22 9V3C22 2.4 21.6 2 21 2Z" fill="currentColor"/>
            </svg>Edit Czech
            </span><i class="mr-2"></i>

      </h3>
     </div>
     <div class="card-toolbar">
     <a href="{{ route('package.packages') }}"
                                class="btn btn-light btn-active-light-primary me-2">Discard</a>
      <div class="btn-group">
       {{-- <button type="button" class="btn btn-primary font-weight-bolder">
        <i class="ki ki-check icon-sm"></i>
        Save Form
       </button> --}}
       <button type="submit" class="btn btn-primary" >Save Changes</button>
       {{-- <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       </button> --}}

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
   <div class="col-3">Package Name:</div>
 <div class="col-9">

   <input type="text" class="form-control form-control-solid" name="name_cz" value="{{$package->name_cz}}" />
 </div>
</div>
</div>
       <div class="separator separator-dashed my-10"></div>
       <div class="my-52">
           <div class="form-group mb-1">
            <label for="exampleTextarea">Description Aditional Price:</span></label>
            <textarea class="form-control" name="descriptiuonadditionalprice_cz" rows="3" >{{$package->descriptiuonadditionalprice_cz}}</textarea>
           </div>
           </div>

        <div class="separator separator-dashed my-10"></div>
        <div class="my-52">


           <div class="form-group mb-1">
            <label for="exampleTextarea">Description:</span></label>
            <textarea class="editor" name="description_cz" rows="3" >{{$package->description_cz}}</textarea>
           </div>

           </div>

        <div class="separator separator-dashed my-10"></div>
        <div class="my-52">
           <div class="form-group mb-1">
            <label for="exampleTextarea">Includes:</span></label>
            <textarea class="editor" name="includes_cz" rows="3" >{{$package->includes_cz}}</textarea>
           </div>

           </div>
        <div class="separator separator-dashed my-10"></div>
       <div class="col-xl-2"></div>
      </div>

     <!--end::Form-->
    </div>
   </div>
    </div>
</div>
{{-- <button type="submit" class="btn btn-primary" >Add</button> --}}
</form>
@endsection
@section('js')
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"
        integrity="sha512-foIijUdV0fR0Zew7vmw98E6mOWd9gkGWQBWaoA1EOFAx+pY+N8FmmtIYAVj64R98KeD2wzZh1aHK0JSpKmRH8w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#kt_docs_repeater_basic').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });



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
@endsection
