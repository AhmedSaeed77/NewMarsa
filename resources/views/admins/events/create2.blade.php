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
<form action="{{route('event.addevent')}}" method="POST" id="kt_project_settings_form" class="form" enctype="multipart/form-data">
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
    </svg>Add Event
    </span>
    <!--end::Svg Icon-->
    <!--end::Svg Icon-->

       <i class="mr-2"></i>

      </h3>
     </div>
     <div class="card-toolbar">
     <a href="{{ route('event.events') }}"
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
            <div class="col-3">Event title:</div>
          <div class="col-9">

            <input type="text" class="form-control form-control-solid" name="title" placeholder="please enter the event title" required/>
          </div>
         </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="my-5">

         <div class="form-group row">
         </div>
         <div class="form-group row">
          <label class="col-3">Event City:</label>
          <div class="col-9">
            <select name="place_id" class="form-control form-control-solid" aria-label="Disabled select example">
                <option selected disabled>Choose place</option>
                @foreach (App\Models\Place::all() as $place)
                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                @endforeach>
            </select>
          </div>
         </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="my-52">
            <div class="form-group mb-1">
                <label for="exampleTextarea">Overview:</label>
                <textarea class="form-control formdataforev"   name="overview" rows="3" ></textarea>
               </div>
        </div>
           <div class="separator separator-dashed my-10"></div>
        <div class="my-52">

         <div class="form-group mb-1">
            <label for="exampleTextarea">Includes:</span></label>
            <textarea class="form-control formdataforev"  name="includes" rows="3" ></textarea>
           </div>

           </div>
           <div class="separator separator-dashed my-10"></div>
        <div class="my-52">

         <div class="form-group mb-1">
            <label for="exampleTextarea">excludes:</span></label>
            <textarea class="form-control formdataforev" name="excludes" rows="3" ></textarea>
           </div>
           </div>

           <div class="separator separator-dashed my-10"></div>
             
        <div class="my-52">

         <div class="form-group mb-1">
            <label for="exampleTextarea">How can i contact the organizer with any question?:</span></label>
            <textarea class="form-control formdataforev" name="how" rows="3" ></textarea>
           </div>
           </div>

           <div class="separator separator-dashed my-10"></div>
        <div class="row mt-3 mb-3 mb-8">
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Price per person:</div>
            </div>
            <div class="col-xl-9 fv-row mt-3 mb-3">
                <input type="number" class="form-control form-control-solid" name="price"
                    placeholder="please enter the event price" required/>
            </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        
        <div class="row mt-3 mb-3 mb-8">
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Price per child:</div>
            </div>

            <div class="col-xl-9 fv-row mt-3 mb-3">
                <input type="number" class="form-control form-control-solid" name="pricechild"
                    placeholder="please enter the event price for the child" required/>
            </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="row mt-3 mb-3 mb-8">
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Aditional Price:</div>
            </div>

            <div class="col-xl-9 fv-row mt-3 mb-3">
                <input type="number" class="form-control form-control-solid" name="additionalprice"
                    placeholder="please enter the event additional price " />
            </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="row mt-3 mb-3 mb-8">
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Latitude :</div>
            </div>

            <div class="col-xl-9 fv-row mt-3 mb-3">
                <input type="text" class="form-control form-control-solid"  name="latitude" placeholder="please enter the event latitude " />
            </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="row mt-3 mb-3 mb-8">
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">longitude :</div>
            </div>

            <div class="col-xl-9 fv-row mt-3 mb-3">
                <input type="text" class="form-control form-control-solid"  name="longitude" placeholder="please enter the event longitude " />
            </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="row mt-3 mb-3 mb-8">
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Description Aditional Price:</div>
            </div>

            <div class="col-xl-9 fv-row mt-3 mb-3">
                <textarea class="form-control" name="descriptiuonadditionalprice_en" rows="3" ></textarea>
            </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <!--<div class="row mt-3 mb-3 mb-8">-->

        <!--    <div class="col-xl-3">-->
        <!--        <div class="fs-6 fw-semibold mt-2 mb-3">Event Availabilty:</div>-->
        <!--    </div>-->

        <!--    <div class="col-xl-9 fv-row mt-3 mb-3">-->
        <!--        <input type="date" class="form-control form-control-solid" name="availabilty"-->
        <!--            placeholder="please enter the activity price for the child" />-->
        <!--    </div>-->
        <!--</div>-->
        <!--<div class="separator separator-dashed my-10"></div>-->
                                    <div class="row mt-3 mb-3 mb-8">
                                        <!--begin::Col-->
                                        <div class="col-xl-3">
                                            <div class="fs-6 fw-semibold mt-2 mb-3">Schedule:</div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-xl-9 fv-row mt-3 mb-3">
                                            <div class="container">

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="sat" type="checkbox"
                                                        id="sat" value="sat">
                                                    <label class="form-check-label" for="sat">Saturday</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="sun" type="checkbox"
                                                        id="sun" value="sun">
                                                    <label class="form-check-label" for="sun">Sunday</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="mon" type="checkbox"
                                                        id="mon" value="mon">
                                                    <label class="form-check-label" for="mon">Monday
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="tue" type="checkbox"
                                                        id="tue" value="tue">
                                                    <label class="form-check-label" for="tue">Tuesday</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="wed" type="checkbox"
                                                        id="wed" value="wed">
                                                    <label class="form-check-label" for="wed">Wednesday</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="thu" type="checkbox"
                                                        id="thu" value="thu">
                                                    <label class="form-check-label" for="thu">Thursday
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" name="fri" type="checkbox"
                                                        id="fri" value="fri">
                                                    <label class="form-check-label" for="fri">Friday
                                                    </label>
                                                </div>
                                            </div>


                                        </div>
                                        <!--begin::Col-->
                                    </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="row mt-3 mb-3 mb-8">

            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Event Time:</div>
            </div>

            <div class="col-xl-9 fv-row mt-3 mb-3">
                <input type="time" class="form-control form-control-solid" name="time"
                    placeholder="please enter the activity price for the child" required/>
            </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="row mt-3 mb-3 mb-5">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Event image:</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Image input-->
                <div class="image-input image-input-outline" data-kt-image-input="true"
                    style="background-image: url('assets/media/svg/avatars/blank.svg')">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                        style="background-size: 75%; background-image: url('assets/media/svg/brand-logos/volicity-9.svg')">
                    </div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="image" accept=".png, .jpg, .jpeg" required/>
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
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="fs-6 fw-semibold mt-2 mb-3">Images  Event :</div>
                </div>
                <div class="col-l col-md col-sm-12">
                    <input name="images[]"  type="file" class="form-control form-control-solid" required multiple>
                </div>
                <!--end::Col-->
                <!--begin::Col-->

                <!--begin::Col-->
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
            </svg>Add Event  German
            </span>
            </span><i class="mr-2"></i>

      </h3>
     </div>
     <div class="card-toolbar">
     <a href="{{ route('event.events') }}"
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
        @include('admins.events.germ')
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
            </svg>Add Event Czech
            </span><i class="mr-2"></i>

      </h3>
     </div>
     <div class="card-toolbar">
     <a href="{{ route('event.events') }}"
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
            <label class="col-3">Event title :</label>
            <div class="col-9">
             <input class="form-control form-control-solid" type="text" name="title_cz" placeholder="please enter the activity title" />
            </div>
           </div>


        </div>
         <div class="separator separator-dashed my-10"></div>
        <div class="my-5">


         <div class="form-group row">
            <label class="col-3">Description Aditional Price:</label>
            <div class="col-9">
             <textarea class="form-control" name="descriptiuonadditionalprice_cz" rows="3"></textarea>
            </div>
           </div>


        </div>
        
       
        <div class="separator separator-dashed my-10"></div>
        <div class="my-52">
               <div class="form-group mb-1">
                <label for="exampleTextarea">Overview:</span></label>
                <textarea class="form-control formdataforev"  name="overview_cz" rows="3" ></textarea>
               </div>
        </div>

           <div class="separator separator-dashed my-10"></div>
        <div class="my-52">
        <div class="my-52">
           <div class="form-group mb-1">
            <label for="exampleTextarea">Includes:</span></label>
            <textarea class="form-control formdataforev" name="includes_cz" rows="3" ></textarea>
           </div>

           </div>

 <div class="separator separator-dashed my-10"></div>
             
        <div class="my-52">

         <div class="form-group mb-1">
            <label for="exampleTextarea">How can i contact the organizer with any question?:</span></label>
            <textarea class="form-control formdataforev" name="how_cz" rows="3" ></textarea>
           </div>
           </div>


           <div class="separator separator-dashed my-10"></div>
        <div class="my-52">


           <div class="form-group mb-1">
            <label for="exampleTextarea">Excludes:</span></label>
            <textarea class="form-control formdataforev"  name="excludes_cz" rows="3" ></textarea>
           </div>
           </div>
          
       </div>
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
<script>
    flatpickr("input[type=datetime-local]", {
        mode: "multiple",
    });
</script>
    <script>
        tinymce.init({
            selector: '.formdataforev',
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
