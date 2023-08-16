@extends('layout.metronic')

@section('content')
    <form  action="{{route('hotel.update',$hotel->id)}}" method="POST" id="kt_project_settings_form" class="form" enctype="multipart/form-data">
        @csrf
        <!--begin::Card body-->
        <div class="card-body p-9">
            <!--begin::row mt-3 mb-3-->

            <!--end::row mt-3 mb-3-->
            <!--begin::row mt-3 mb-3-->
            <div class="row mt-3 mb-3 mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-semibold mt-2 mb-3">Hotel name</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row mt-3 mb-3">
                    {{$hotel->name}}
                </div>
            </div>
            <!--end::row mt-3 mb-3-->
            <!--begin::row mt-3 mb-3-->
            <div class="row mt-3 mb-3 mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-semibold mt-2 mb-3">Zone</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9">
                    {{App\Models\Zone::find($hotel->zone_id)->name}}
                </div>
            </div>
            <!--end::row mt-3 mb-3-->
            <!--begin::row mt-3 mb-3-->
            
           

        </div>
        <!--end::Card body-->
        <!--begin::Card footer-->
        
        <!--end::Card footer-->
    </form>
@endsection
