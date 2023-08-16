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
<form action="{{route('live.update',$live->id)}}" method="POST" id="kt_project_settings_form" class="form" enctype="multipart/form-data">
    @csrf
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="kt_tab_pane_4" role="tabpanel">

<div class="card card-custom card-sticky" id="kt_page_sticky_card">
    <div class="card-header">
     <div class="card-title">
      <h3 class="card-label"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/general/gen011.svg-->
        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.3" d="M16 0.200012H4C1.8 0.200012 0 2.00001 0 4.20001V16.2C0 18.4 1.8 20.2 4 20.2H16C18.2 20.2 20 18.4 20 16.2V4.20001C20 2.00001 18.2 0.200012 16 0.200012ZM15 10.2C15 10.9 14.8 11.6 14.6 12.2H18V16.2C18 17.3 17.1 18.2 16 18.2H12V14.8C11.4 15.1 10.7 15.2 10 15.2C9.3 15.2 8.6 15 8 14.8V18.2H4C2.9 18.2 2 17.3 2 16.2V12.2H5.4C5.1 11.6 5 10.9 5 10.2C5 9.50001 5.2 8.80001 5.4 8.20001H2V4.20001C2 3.10001 2.9 2.20001 4 2.20001H8V5.60001C8.6 5.30001 9.3 5.20001 10 5.20001C10.7 5.20001 11.4 5.40001 12 5.60001V2.20001H16C17.1 2.20001 18 3.10001 18 4.20001V8.20001H14.6C14.8 8.80001 15 9.50001 15 10.2Z" fill="currentColor"/>
        <path d="M12 1.40002C15.4 2.20002 18 4.80003 18.8 8.20003H14.6C14.1 7.00003 13.2 6.10003 12 5.60003V1.40002ZM5.40001 8.20003C5.90001 7.00003 6.80001 6.10003 8.00001 5.60003V1.40002C4.60001 2.20002 2.00001 4.80003 1.20001 8.20003H5.40001ZM14.6 12.2C14.1 13.4 13.2 14.3 12 14.8V19C15.4 18.2 18 15.6 18.8 12.2H14.6ZM8.00001 14.8C6.80001 14.3 5.90001 13.4 5.40001 12.2H1.20001C2.00001 15.6 4.60001 18.2 8.00001 19V14.8Z" fill="currentColor"/>
        </svg>Add Liveboard
        </span>
        <!--end::Svg Icon-->
       <i class="mr-2"></i>
      </h3>
     </div>
     <div class="card-toolbar">
        <a href="{{ route('live.index') }}"
            class="btn btn-light btn-active-light-primary me-2">Discard</a>
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Save Changes</button>
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
            <div class="col-3">liveboard title:</div>
          <div class="col-9">
            <input type="text" class="form-control form-control-solid" value="{{$live->title}}"  name="title" placeholder="please enter the liveboard title" required/>
          </div>
         </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="my-5">
         <div class="form-group row">
          <label class="col-3">liveboard City:</label>
          <div class="col-9">
            <select name="place[]" class="form-control form-control-solid" aria-label="Disabled select example" multiple>
                <option selected disabled>Choose place</option>
                @foreach (App\Models\Place::all() as $place)
                    <option value= "{{$place->id }}" {{is_array($arr1) && in_array($place->id, $arr1) ? 'selected' : '' }}>{{ $place->name }}</option>
                @endforeach>
            </select>
          </div>
         </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="my-5">
            <div class="form-group row">
             <label class="col-3">liveboard Boat:</label>
             <div class="col-9">
               <select name="boat[]" class="form-control form-control-solid" aria-label="Disabled select example" multiple>
                   {{-- <option selected disabled>Choose boat</option> --}}
                   @foreach (App\Models\Boat::all() as $boat)
                       {{-- <option @if($boat->id == $live->boat_id) selected @endif value="{{ $boat->id }}">{{ $boat->name_en }}</option> --}}
                       <option value= "{{$boat->id }}" {{is_array($arr) && in_array($boat->id, $arr) ? 'selected' : '' }} >{{ $boat->name_en }}</option>
                   @endforeach>
               </select>
             </div>
            </div>
           </div>
           <div class="separator separator-dashed my-10"></div>
        <div class="my-52">
            <div class="form-group mb-1">
                <label for="exampleTextarea">Overview:</label>
                <textarea class="form-control editor"  name="overview" rows="3">{!!$live->overview!!}</textarea>
               </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="my-52">
         <div class="form-group mb-1">
            <label for="exampleTextarea">Terms and conditions:</span></label>
            <textarea class="form-control editor"  name="terms" rows="3">{!!$live->terms_and_conditions!!}</textarea>
           </div>
        </div>
           <div class="separator separator-dashed my-10"></div>
        <div class="my-52">
         <div class="form-group mb-1">
            <label for="exampleTextarea">Highlights:</span></label>
            <textarea class="form-control editor"  name="highlights" rows="3">{!!$live->highlights!!}</textarea>
           </div>
           </div>
           <div class="separator separator-dashed my-10"></div>
        <div class="my-52">
         <div class="form-group mb-1">
            <label for="exampleTextarea">Popular questions:</span></label>
            <textarea class="form-control editor"  name="faqs" rows="3">{!!$live->faqs!!}</textarea>
           </div>
           </div>
           <div class="separator separator-dashed my-10"></div>
        <div class="my-52">
         <div class="form-group mb-1">
            <label for="exampleTextarea">Includes:</span></label>
            <textarea class="form-control editor"  name="includes" rows="3">{!!$live->includes!!}</textarea>
           </div>
           </div>
           <div class="separator separator-dashed my-10"></div>
        <div class="my-52">
         <div class="form-group mb-1">
            <label for="exampleTextarea">excludes:</span></label>
            <textarea class="form-control editor"  name="excludes" rows="3">{!!$live->exclude!!}</textarea>
           </div>
           </div>
           <div class="separator separator-dashed my-10"></div>
           <div class="my-52">
            <div class="form-group mb-1">
               <label for="exampleTextarea">plan:</span></label>
               <textarea class="form-control editor"  name="plan" rows="3">{!!$live->plan!!}</textarea>
              </div>
              </div>
              <div class="separator separator-dashed my-10"></div>
           <div class="row mt-3 mb-3">

            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Status:</div>
            </div>

            <div class="col-xl-9">
                <div class="form-check form-switch form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" value="active" id="status" name="status"
                        checked="checked" />
                    <label class="form-check-label fw-semibold text-gray-400 ms-3" for="status">Active</label>
                </div>
            </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="row mt-3 mb-3 mb-8">
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Price per person:</div>
            </div>
            <div class="col-xl-9 fv-row mt-3 mb-3">
                <input type="number" value="{{$live->price}}" class="form-control form-control-solid" name="price"
                    placeholder="please enter the liveboard price" required/>
            </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="row mt-3 mb-3 mb-8">
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Price per child:</div>
            </div>
            <div class="col-xl-9 fv-row mt-3 mb-3">
                <input type="number" value="{{$live->price_child}}" class="form-control form-control-solid" name="price_child"
                    placeholder="please enter the liveboard price" required/>
            </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="row mt-3 mb-3 mb-8">
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Additional Price:</div>
            </div>
            <div class="col-xl-9 fv-row mt-3 mb-3">
                <input type="number" value="{{$live->additionalprice}}" class="form-control form-control-solid" name="additionalprice"
                    placeholder="please enter the liveboard price" />
            </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="row mt-3 mb-3 mb-8">
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Description Additional Price:</div>
            </div>
            <div class="col-xl-9 fv-row mt-3 mb-3">
               <textarea class="form-control" name="descriptiuonadditionalprice_en" rows="3" >{{$live->descriptiuonadditionalprice_en}}</textarea>
            </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="row mt-3 mb-3 mb-5">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">liveboard image:</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Image input-->
                <div class="image-input image-input-outline" data-kt-image-input="true"
                    style="background-image: url({{ asset('images/liveboard/'. $live->image) }})">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                        style="background-size: 75%; background-image: url({{ asset('images/liveboard/'. $live->image) }})">
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

            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Location image:</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Image input-->
                <div class="image-input image-input-outline" data-kt-image-input="true"
                    style="background-image: url({{ asset('images/liveboard/location/'. $live->locationimage) }})">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                        style="background-size: 75%; background-image: url({{ asset('images/liveboard/location/'. $live->locationimage) }})">
                    </div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="locationimage" accept=".png, .jpg, .jpeg" />
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

            <!--<div class="separator separator-dashed my-10"></div>-->
            <!--<div class="row mt-3 mb-3 mb-8">-->
                <!--begin::Col-->
               
                <!--end::Col-->
                <!--begin::Col-->

                <!--begin::Col-->
            <!--</div>-->
            <!--<div class="separator separator-dashed my-10"></div>-->
            <!--                        <div class="row mt-3 mb-3 mb-8">-->
                                        <!--begin::Col-->
            <!--                            <div class="col-lg-4 col-md-6 col-sm-12">-->
            <!--                                <div class="fs-6 fw-semibold mt-2 mb-3">Schedule :</div>-->
            <!--                            </div>-->
            <!--                            <div class="col-l col-md col-sm-12">-->
            <!--                                <div id="kt_docs_repeater_basic">-->
                                                <!--begin::Form group-->
            <!--                                    <div class="form-group">-->
            <!--                                        <div data-repeater-list="kt_docs_repeater_basic">-->
            <!--                                            <div data-repeater-item>-->
            <!--                                                <div class="form-group row">-->
            <!--                                                    <div class="col-md-3">-->
            <!--                                                        <label class="form-label">From:</label>-->
            <!--                                                        <input type="date" name="from"-->
            <!--                                                            class="form-control form-control-solid" required>-->
            <!--                                                    </div>-->
            <!--                                                    <div class="col-md-3">-->
            <!--                                                        <label class="form-label">to:</label>-->
            <!--                                                        <input type="date" name="to"-->
            <!--                                                            class="form-control form-control-solid" required>-->
            <!--                                                    </div>-->
        
            <!--                                                    <div class="col-md-4">-->
            <!--                                                        <a href="javascript:;" data-repeater-delete-->
            <!--                                                            class="btn btn-sm btn-light-danger mt-3 mt-md-8">-->
            <!--                                                            <i class="la la-trash-o"></i>Delete-->
            <!--                                                        </a>-->
            <!--                                                    </div>-->

            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->
            <!--                                    </div>-->
                                                <!--end::Form group-->
        
                                                <!--begin::Form group-->
            <!--                                    <div class="form-group mt-5">-->
            <!--                                        <a href="javascript:;" data-repeater-create class="btn btn-light-primary">-->
            <!--                                            <i class="la la-plus"></i>Add-->
            <!--                                        </a>-->
            <!--                                    </div>-->
                                                <!--end::Form group-->
            <!--                                </div>-->
            <!--                            </div>-->
                                        <!--end::Col-->
                                        <!--begin::Col-->

                                        <!--begin::Col-->
            <!--                        </div>-->
                                    <!--begin::Repeater-->
                                   
                                    <!--end::Repeater-->
            <div class="separator separator-dashed my-10"></div>
           

        
            <div class="row mt-3 mb-3 mb-8">
                <!--begin::Col-->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="fs-6 fw-semibold mt-2 mb-3">Duration</div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <input  type="text" value="{{$live->duration}}" name="duration" class="form-control form-control-solid" required />
                </div>
                <!--end::Col-->
                <!--begin::Col-->

                <!--begin::Col-->
            </div>

            <div class="separator separator-dashed my-10"></div>
            <div class="row mt-3 mb-3 mb-8">
                <!--begin::Col-->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="fs-6 fw-semibold mt-2 mb-3">Rating</div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <input  type="number" value="{{$live->rating}}" name="rating" class="form-control form-control-solid" required />
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
        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.3" d="M16 0.200012H4C1.8 0.200012 0 2.00001 0 4.20001V16.2C0 18.4 1.8 20.2 4 20.2H16C18.2 20.2 20 18.4 20 16.2V4.20001C20 2.00001 18.2 0.200012 16 0.200012ZM15 10.2C15 10.9 14.8 11.6 14.6 12.2H18V16.2C18 17.3 17.1 18.2 16 18.2H12V14.8C11.4 15.1 10.7 15.2 10 15.2C9.3 15.2 8.6 15 8 14.8V18.2H4C2.9 18.2 2 17.3 2 16.2V12.2H5.4C5.1 11.6 5 10.9 5 10.2C5 9.50001 5.2 8.80001 5.4 8.20001H2V4.20001C2 3.10001 2.9 2.20001 4 2.20001H8V5.60001C8.6 5.30001 9.3 5.20001 10 5.20001C10.7 5.20001 11.4 5.40001 12 5.60001V2.20001H16C17.1 2.20001 18 3.10001 18 4.20001V8.20001H14.6C14.8 8.80001 15 9.50001 15 10.2Z" fill="currentColor"/>
            <path d="M12 1.40002C15.4 2.20002 18 4.80003 18.8 8.20003H14.6C14.1 7.00003 13.2 6.10003 12 5.60003V1.40002ZM5.40001 8.20003C5.90001 7.00003 6.80001 6.10003 8.00001 5.60003V1.40002C4.60001 2.20002 2.00001 4.80003 1.20001 8.20003H5.40001ZM14.6 12.2C14.1 13.4 13.2 14.3 12 14.8V19C15.4 18.2 18 15.6 18.8 12.2H14.6ZM8.00001 14.8C6.80001 14.3 5.90001 13.4 5.40001 12.2H1.20001C2.00001 15.6 4.60001 18.2 8.00001 19V14.8Z" fill="currentColor"/>
            </svg>Add Liveboard
            </span> <i class="mr-2"></i>

      </h3>
     </div>
     <div class="card-toolbar">
        <a href="{{ route('live.index') }}"
            class="btn btn-light btn-active-light-primary me-2">Discard</a>
            <div class="btn-group">

                <button type="submit" class="btn btn-primary">Save Changes</button>


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
          <label class="col-3">liveboard title :</label>
          <div class="col-9">
           <input class="form-control form-control-solid" value="{{$live->title_de}}" type="text" name="title_de" placeholder="please enter the liveboard title" required />
          </div>
         </div>



        </div>
        
        <div class="separator separator-dashed my-10"></div>
        <div class="my-52">


               <div class="form-group mb-1">
                <label for="exampleTextarea">Description Additional Price:</label>
                <textarea class="form-control"  name="descriptiuonadditionalprice_de" rows="3" >{!!$live->descriptiuonadditionalprice_de!!}</textarea>
               </div>


        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="my-52">


               <div class="form-group mb-1">
                <label for="exampleTextarea">Overview:</label>
                <textarea class="form-control editor"  name="overview_de" rows="3">{!!$live->overview_de!!}</textarea>
               </div>


        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="my-52">


           <div class="form-group mb-1">
            <label for="exampleTextarea">Terms and conditions:</span></label>
            <textarea class="form-control editor"  name="terms_de" rows="3">{!!$live->terms_and_conditions_de!!}</textarea>
           </div>

        </div>



           <div class="separator separator-dashed my-10"></div>
        <div class="my-52">

           <div class="form-group mb-1">
            <label for="exampleTextarea">Highlights:</span></label>
            <textarea class="form-control editor"  name="highlights_de" rows="3">{!!$live->overview!!}</textarea>
           </div>

           </div>

           <div class="separator separator-dashed my-10"></div>
        <div class="my-52">

           <div class="form-group mb-1">
            <label for="exampleTextarea">Popular questions:</span></label>
            <textarea class="form-control editor"  name="faqs_de" rows="3">{!!$live->faqs_de!!}</textarea>
           </div>

           </div>

           <div class="separator separator-dashed my-10"></div>
        <div class="my-52">


           <div class="form-group mb-1">
            <label for="exampleTextarea">Includes:</span></label>
            <textarea class="form-control editor"  name="includes_de" rows="3">{!!$live->includes_de!!}</textarea>
           </div>

           </div>


           <div class="separator separator-dashed my-10"></div>
           
        <div class="my-52">


           <div class="form-group mb-1">
            <label for="exampleTextarea">Excludes:</span></label>
            <textarea class="form-control editor"  name="excludes_de" rows="3">{!!$live->exclude_de!!}</textarea>
           </div>
           </div>
           <div class="my-52">
            <div class="form-group mb-1">
               <label for="exampleTextarea">plan:</span></label>
               <textarea class="form-control editor"  name="plan_de" rows="3">{!!$live->plan_de!!}</textarea>
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
            </svg>Add Liveboard
            </span> <i class="mr-2"></i>

      </h3>
     </div>
     <div class="card-toolbar">
        <a href="{{ route('live.index') }}"
            class="btn btn-light btn-active-light-primary me-2">Discard</a>
            <div class="btn-group">

                <button type="submit" class="btn btn-primary">Save Changes</button>


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
            <label class="col-3">liveboard title :</label>
            <div class="col-9">
             <input class="form-control form-control-solid" value="{{$live->title_cz}}" type="text" name="title_cz" placeholder="please enter the liveboard title"/>
            </div>
           </div>


        </div>
        
        <div class="separator separator-dashed my-10"></div>
        <div class="my-52">
               <div class="form-group mb-1">
                <label for="exampleTextarea">Description Additional Price:</span></label>
                <textarea class="form-control editor"  name="descriptiuonadditionalprice_cz" rows="3" >{!!$live->descriptiuonadditionalprice_cz!!}</textarea>
               </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="my-52">
               <div class="form-group mb-1">
                <label for="exampleTextarea">Overview:</span></label>
                <textarea class="form-control editor"  name="overview_cz" rows="3">{!!$live->overview_cz!!}</textarea>
               </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="my-52">


           <div class="form-group mb-1">
            <label for="exampleTextarea">Terms and conditions:</span></label>
            <textarea class="form-control editor"  name="terms_cz" rows="3">{!!$live->terms_and_conditions_cz!!}</textarea>
           </div>
        </div>



           <div class="separator separator-dashed my-10"></div>
        <div class="my-52">



           <div class="form-group mb-1">
            <label for="exampleTextarea">Highlights:</span></label>
            <textarea class="form-control editor"  name="highlights_cz" rows="3">{!!$live->highlights_cz!!}</textarea>
           </div>
           </div>

           <div class="separator separator-dashed my-10"></div>
        <div class="my-52">

         <div class="form-group mb-1">

           <div class="form-group mb-1">
            <label for="exampleTextarea">Popular questions:</span></label>
            <textarea class="form-control editor"  name="faqs_cz" rows="3">{!!$live->faqs_cz!!}</textarea>
           </div>
           </div>

           <div class="separator separator-dashed my-10"></div>
        <div class="my-52">


           <div class="form-group mb-1">
            <label for="exampleTextarea">Includes:</span></label>
            <textarea class="form-control editor"  name="includes_cz" rows="3">{!!$live->includes_cz!!}</textarea>
           </div>

           </div>


           <div class="separator separator-dashed my-10"></div>
        <div class="my-52">
           <div class="form-group mb-1">
                <label for="exampleTextarea">Excludes:</span></label>
                <textarea class="form-control editor"  name="excludes_cz" rows="3">{!!$live->exclude_cz!!}</textarea>
           </div>
        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="my-52">

            <div class="form-group mb-1">
               <label for="exampleTextarea">plan:</span></label>
               <textarea class="form-control editor"  name="plan_cz" rows="3">{!!$live->plan_cz!!}</textarea>
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
<script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>

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
    </script>
<script>
    flatpickr("input[type=datetime-local]", {
        mode: "multiple",
    });
</script>
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
    
@endsection
