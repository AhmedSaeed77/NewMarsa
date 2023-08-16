@extends('layout.metronic')

@section('content')
    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <form action="{{ route('hotel.update',$hotel->id) }}" method="POST" id="kt_project_settings_form" class="form"
            enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">
                        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/finance/fin001.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z"
                                    fill="currentColor" />
                            </svg> Edit Hotel
                        </span>
                        <!--end::Svg Icon-->
                        <i class="mr-2"></i>

                    </h3>
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('hotel.index') }}"
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
                                <div class="col-3">Hotel name:</div>
                                <div class="col-9">
                                    <input type="text" value="{{$hotel->name}}" class="form-control form-control-solid" name="name" placeholder="please enter the place name" />
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-10"></div>
                        <div class="my-5">
                            <div class="form-group row">
                                <div class="col-3">Hotel index:</div>
                                <div class="col-9">
                                    <input type="text" value="{{$hotel->indexx}}" class="form-control form-control-solid" name="indexx" placeholder="please enter the place index" />
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-10"></div>
                        <div class="my-5">
                            <div class="form-group row">
                                <label class="col-3">Zone:</label>
                                <div class="col-9">
                                    <select name="zone_id" class="form-control form-control-solid"
                                        aria-label="Disabled select example">
                                        <option selected disabled>Choose zone</option>
                                        @foreach (App\Models\Zone::all() as $zone)
                                            <option @if($zone->id == $hotel->zone_id) selected @endif value="{{ $zone->id }}">{{ $zone->name }}</option>
                                        @endforeach>
                                    </select>
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
@section('js')
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
        name: {
                          required: true,
                          minlength: 5,
                         // pattern: regx_ar
                      },
                      zone_id: {
                          required: true,
                         // minlength: 5,
                         // pattern: regx_ar
                      },
                      title_cz: {
                          required: true,
                          minlength: 5,
                         // pattern: regx_ar
                      },
                      content_en: {
                          required: true,
                          minlength: 5,
                         // pattern: regx_ar
                      },
                      content_de: {
                          required: true,
                          minlength: 5,
                         // pattern: regx_ar
                      },
                      content_cz: {
                          required: true,
                          minlength: 5,
                         // pattern: regx_ar
                      },
                      image :
                      {
                          required: true,
                          accept: "image/jpg, image/jpeg, image/png",
                          filesize: 2097152
                      }
              },
              
            
          messages: {
            name:   
                      {
                          required: "الاسم باللغة العربية مطلوب",
                          minlength: "الاسم 5 حروف على الاقل",
                          //pattern: "الاسم باللغة العربية ",
                      },
                      zone_id:   
                      {
                          required: " اسم المكان مطلوب  ",
                          //minlength: "الاسم 5 حروف على الاقل",
                          //pattern: "الاسم باللغة العربية ",
                      },
                      title_de:   
                      {
                          required: "الاسم باللغة العربية مطلوب",
                          minlength: "الاسم 5 حروف على الاقل",
                          //pattern: "الاسم باللغة العربية ",
                      },
                      title_cz:   
                      {
                          required: "الاسم باللغة العربية مطلوب",
                          minlength: "الاسم 5 حروف على الاقل",
                          //pattern: "الاسم باللغة العربية ",
                      },
                      image : 
                      {
                          required: "أرفق السيرة الذاتية الخاصة بك ",
                          accept: " مسموح فقط ب png ,jpeg,pdf,jpg",
                      },
                  }
  });
});
 </script>
@endsection

