@extends('layout.metronic');

@section('content')
    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"
        style="margin-top: -8px!important;
margin-bottom: 8px!important;">
        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/art/art010.svg-->
        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3"
                    d="M22 4H5C4.4 4 4 4.4 4 5V22H13C13.6 22 14 21.6 14 21V18H17C17.6 18 18 17.6 18 17V14H21C21.6 14 22 13.6 22 13V4Z"
                    fill="currentColor" />
                <path
                    d="M13 18H10V15C10 14.4 10.4 14 11 14H14V17C14 17.6 13.6 18 13 18ZM3 18C2.4 18 2 18.4 2 19V21C2 21.6 2.4 22 3 22H9C9.6 22 10 21.6 10 21V18H3ZM18 13V10H15C14.4 10 14 10.4 14 11V14H17C17.6 14 18 13.6 18 13ZM21 2H19C18.4 2 18 2.4 18 3V10H21C21.6 10 22 9.6 22 9V3C22 2.4 21.6 2 21 2Z"
                    fill="currentColor" />
            </svg>ِAdvisor
        </span>
    </h1>

    <div class="card" id="activty">
        <!--begin::Body-->
        
        <div class="card-body p-lg-20">
            <div class="card-body p-lg-20">
                

               
                    <form action="{{ route('advisor.addadvisort') }}" method="POST"  class="form" enctype="multipart/form-data" >
                        @csrf
                        <div class="row m-3">
                           
                            <div class="col-12 col-md-4">
                                <label class="form-label">    Image  </label>
                                <input  class="form-control"   name="images[]"     type="file" multiple>
                            </div>
                        </div>
                            <button type="submit" class="btn btn-primary">  save </button>
                           
                    </form>
                

                
            </div>

        </div>

    </div>
    
        @endsection
       
