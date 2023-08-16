@extends('layout.metronic')

@section('content')
<ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1" style="margin-left:10px;">Adults</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">Children</a>
    </li>

</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
<div class="card card-custom card-sticky" id="kt_page_sticky_card">
    <div class="card-header">
     <div class="card-title">
      <h3 class="card-label"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/maps/map007.svg-->
        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.3" d="M21 11H18.9C18.5 7.9 16 5.49998 13 5.09998V3C13 2.4 12.6 2 12 2C11.4 2 11 2.4 11 3V5.09998C7.9 5.49998 5.50001 8 5.10001 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H5.10001C5.50001 16.1 8 18.4999 11 18.8999V21C11 21.6 11.4 22 12 22C12.6 22 13 21.6 13 21V18.8999C16.1 18.4999 18.5 16 18.9 13H21C21.6 13 22 12.6 22 12C22 11.4 21.6 11 21 11ZM12 17C9.2 17 7 14.8 7 12C7 9.2 9.2 7 12 7C14.8 7 17 9.2 17 12C17 14.8 14.8 17 12 17Z" fill="currentColor"/>
        <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="currentColor"/>
        </svg> Add Zone
        </span>
        <!--end::Svg Icon-->
       <i class="mr-2"></i>
      </h3>
     </div>
     <div class="card-toolbar">
            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
          <div class="btn-group">
           <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Save Changes</button>
          </div>
         </div>
    </div>
    <div class="card-body">
     <!--begin::Form-->
     <form action="{{route('zone.add')}}" method="POST" id="kt_project_settings_form" class="form" enctype="multipart/form-data">
        @csrf
      <div class="row">
       <div class="col-xl-2"></div>
       <div class="col-xl-8">
        <div class="my-5">

         <div class="form-group row">
            <div class="col-3">Zone name:</div>
          <div class="col-9">
            <input type="text" class="form-control form-control-solid" name="name" placeholder="please enter the place name" rerquired/>
          </div>
         </div>
        </div>
         <div class="separator separator-dashed my-10"></div>
        <div class="form-group row">
            <div class="col-3">Price for high bus from and to Marsa Alam airport:</div>
          <div class="col-9">

            <input type="number"  step="0.01" class="form-control form-control-solid" name="marsa_hs" placeholder="please enter the price" required/>
          </div>
         </div>
         <div class="separator separator-dashed my-10"></div>
        <div class="form-group row">
            <div class="col-3">Price for high bus from and to Hurgada airport:</div>
          <div class="col-9">

            <input type="number" step="0.01" class="form-control form-control-solid" name="hurgada_hs" placeholder="please enter the price" required/>
          </div>
         </div>
         <div class="separator separator-dashed my-10"></div>
        <div class="form-group row">
            <div class="col-3">Price for limousine from and to Marsa Alam airport:</div>
          <div class="col-9">

            <input type="number" step="0.01" class="form-control form-control-solid" name="marsa_limo" placeholder="please enter the price" required/>
          </div>
         </div>
         <div class="separator separator-dashed my-10"></div>
        <div class="form-group row">
            <div class="col-3">Price for limousine from and to Hurgada airport:</div>
          <div class="col-9">

            <input type="number" step="0.01" class="form-control form-control-solid" name="hurgada_limo" placeholder="please enter the price" required/>
          </div>
         </div>
         <div class="separator separator-dashed my-10"></div>
        <div class="form-group row">
            <div class="col-3">Added fee for extra person in high bus:</div>
          <div class="col-9">

            <input type="number" step="0.01" class="form-control form-control-solid" name="added_hs_per_person" placeholder="please enter the price" required/>
          </div>
         </div>
         
         
         <div class="separator separator-dashed my-10"></div>
        <div class="form-group row">
            <div class="col-3">latitude:</div>
          <div class="col-9">

            <input type="number" step="0.00000000000000001" class="form-control form-control-solid" name="latitude" placeholder="please enter the latitude" required/>
          </div>
         </div>
         
         <div class="separator separator-dashed my-10"></div>
        <div class="form-group row">
            <div class="col-3">longitude:</div>
          <div class="col-9">
            <input type="number" step="0.00000000000000001" class="form-control form-control-solid" name="longitude" placeholder="please enter the longitude" required/>
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
   <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div class="card-header">
         <div class="card-title">
          <h3 class="card-label"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/maps/map007.svg-->
            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.3" d="M21 11H18.9C18.5 7.9 16 5.49998 13 5.09998V3C13 2.4 12.6 2 12 2C11.4 2 11 2.4 11 3V5.09998C7.9 5.49998 5.50001 8 5.10001 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H5.10001C5.50001 16.1 8 18.4999 11 18.8999V21C11 21.6 11.4 22 12 22C12.6 22 13 21.6 13 21V18.8999C16.1 18.4999 18.5 16 18.9 13H21C21.6 13 22 12.6 22 12C22 11.4 21.6 11 21 11ZM12 17C9.2 17 7 14.8 7 12C7 9.2 9.2 7 12 7C14.8 7 17 9.2 17 12C17 14.8 14.8 17 12 17Z" fill="currentColor"/>
            <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="currentColor"/>
            </svg> Add Zone
            </span>
            <!--end::Svg Icon-->
           <i class="mr-2"></i>

          </h3>
         </div>
         <div class="card-toolbar">
            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
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
            

             <div class="separator separator-dashed my-10"></div>
             <div class="form-group row">
                 <div class="col-3">Price for high bus from and to Marsa Alam airport for child</div>
               <div class="col-9">

                 <input type="number" step="0.01" class="form-control form-control-solid" name="marsa_hs_child" placeholder="please enter the price" required/>
               </div>
              </div>
              <div class="separator separator-dashed my-10"></div>
             <div class="form-group row">
                 <div class="col-3">Price for high bus from and to Hurgada airport for child:</div>
               <div class="col-9">

                 <input type="number" step="0.01" class="form-control form-control-solid" name="hurgada_hs_child" placeholder="please enter the price" required/>
               </div>
              </div>
              <div class="separator separator-dashed my-10"></div>
             <div class="form-group row">
                 <div class="col-3">Price for limousine from and to Marsa Alam airport for child:</div>
               <div class="col-9">

                 <input type="number" step="0.01" class="form-control form-control-solid" name="marsa_limo_child" placeholder="please enter the price" required/>
               </div>
              </div>
              <div class="separator separator-dashed my-10"></div>
             <div class="form-group row">
                 <div class="col-3">Price for limousine from and to Hurgada airport for child:</div>
               <div class="col-9">

                 <input type="number" step="0.01" class="form-control form-control-solid" name="hurgada_limo_child" placeholder="please enter the price" required/>
               </div>
              </div>
              <div class="separator separator-dashed my-10"></div>
             <div class="form-group row">
                 <div class="col-3">Added fee for extra child in high bus:</div>
               <div class="col-9">

                 <input type="number" step="0.01" class="form-control form-control-solid" name="added_hs_per_child" placeholder="please enter the price" required/>
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


@endsection
