@extends('layout.metronic')

@section('content')
<!--begin::Repeater-->
<div class="card card-custom card-sticky" id="kt_page_sticky_card">
    <div class="card-header">
     <div class="card-title">
      <h3 class="card-label"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/coding/cod007.svg-->
        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.3" d="M18.4 5.59998C18.7766 5.9772 18.9881 6.48846 18.9881 7.02148C18.9881 7.55451 18.7766 8.06577 18.4 8.44299L14.843 12C14.466 12.377 13.9547 12.5887 13.4215 12.5887C12.8883 12.5887 12.377 12.377 12 12C11.623 11.623 11.4112 11.1117 11.4112 10.5785C11.4112 10.0453 11.623 9.53399 12 9.15698L15.553 5.604C15.9302 5.22741 16.4415 5.01587 16.9745 5.01587C17.5075 5.01587 18.0188 5.22741 18.396 5.604L18.4 5.59998ZM20.528 3.47205C20.0614 3.00535 19.5074 2.63503 18.8977 2.38245C18.288 2.12987 17.6344 1.99988 16.9745 1.99988C16.3145 1.99988 15.661 2.12987 15.0513 2.38245C14.4416 2.63503 13.8876 3.00535 13.421 3.47205L9.86801 7.02502C9.40136 7.49168 9.03118 8.04568 8.77863 8.6554C8.52608 9.26511 8.39609 9.91855 8.39609 10.5785C8.39609 11.2384 8.52608 11.8919 8.77863 12.5016C9.03118 13.1113 9.40136 13.6653 9.86801 14.132C10.3347 14.5986 10.8886 14.9688 11.4984 15.2213C12.1081 15.4739 12.7616 15.6039 13.4215 15.6039C14.0815 15.6039 14.7349 15.4739 15.3446 15.2213C15.9543 14.9688 16.5084 14.5986 16.975 14.132L20.528 10.579C20.9947 10.1124 21.3649 9.55844 21.6175 8.94873C21.8701 8.33902 22.0001 7.68547 22.0001 7.02551C22.0001 6.36555 21.8701 5.71201 21.6175 5.10229C21.3649 4.49258 20.9947 3.93867 20.528 3.47205Z" fill="currentColor"/>
        <path d="M14.132 9.86804C13.6421 9.37931 13.0561 8.99749 12.411 8.74695L12 9.15698C11.6234 9.53421 11.4119 10.0455 11.4119 10.5785C11.4119 11.1115 11.6234 11.6228 12 12C12.3766 12.3772 12.5881 12.8885 12.5881 13.4215C12.5881 13.9545 12.3766 14.4658 12 14.843L8.44699 18.396C8.06999 18.773 7.55868 18.9849 7.02551 18.9849C6.49235 18.9849 5.98101 18.773 5.604 18.396C5.227 18.019 5.0152 17.5077 5.0152 16.9745C5.0152 16.4413 5.227 15.93 5.604 15.553L8.74701 12.411C8.28705 11.233 8.28705 9.92498 8.74701 8.74695C8.10159 8.99737 7.5152 9.37919 7.02499 9.86804L3.47198 13.421C2.52954 14.3635 2.00009 15.6417 2.00009 16.9745C2.00009 18.3073 2.52957 19.5855 3.47202 20.528C4.41446 21.4704 5.69269 21.9999 7.02551 21.9999C8.35833 21.9999 9.63656 21.4704 10.579 20.528L14.132 16.975C14.5987 16.5084 14.9689 15.9544 15.2215 15.3447C15.4741 14.735 15.6041 14.0815 15.6041 13.4215C15.6041 12.7615 15.4741 12.108 15.2215 11.4983C14.9689 10.8886 14.5987 10.3347 14.132 9.86804Z" fill="currentColor"/>
        </svg>Account settings
        </span>
        <!--end::Svg Icon--> <i class="mr-2"></i>

      </h3>
     </div>
     <form action="{{ route('user.updateuser', $user->id) }}" method="post" class="form" enctype="multipart/form-data">
      @csrf
     <div class="card-toolbar">
        
      <div class="btn-group">
       {{-- <button type="button" class="btn btn-primary font-weight-bolder">
        <i class="ki ki-check icon-sm"></i>
         
       </button> --}}
       <a href="{{ route('user.users') }}"
                                class="btn btn-light btn-active-light-primary me-2">Discard</a>
        
       <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Save Changes</button>
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

            <!--end::Col-->
            <!--begin::Col-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-semibold fs-6">Picture:</label>
                <div class="col-lg-8">
                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('images/users/' .$user->image) }})"></div>
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                            <i class="bi bi-pencil-fill fs-7"></i>
                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                            <input type="hidden" name="avatar_remove" />
                        </label>
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                    </div>
                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                </div>
            </div>
            <div class="separator separator-dashed my-10"></div>
         <div class="form-group row">
            <div class="col-3">First Name:</div>
          <div class="col-9">

            <input type="text" name="fname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{$user->fname}}" required/>
          </div>
         </div>




        </div>
        <div class="separator separator-dashed my-10"></div>
        <div class="form-group row">
          <div class="col-3">Last Name:</div>
        <div class="col-9">

          <input type="text" name="lname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{$user->lname}}" required/>
        </div>
       </div>

       <div class="separator separator-dashed my-10"></div>
       <div class="form-group row">
         <div class="col-3">Phone:</div>
       <div class="col-9">
 
         <input type="text" name="phone" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{$user->phone}}" required/>
       </div>
      </div>
      <div class="separator separator-dashed my-10"></div>
      <div class="form-group row">
        <div class="col-3">Email:</div>
      <div class="col-9">
  
        <input type="email" name="email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{$user->email}}" required/>
      </div>
     </div>
 
 
       </div>
 
     </div>
     
      




  </div>
 






        </div>
       </div>
       <div class="col-xl-2"></div>
      </div>
     </form>
     <!--end::Form-->
    </div>
   </div>
    </div>
@endsection
