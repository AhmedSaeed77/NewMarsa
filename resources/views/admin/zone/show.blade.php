@extends('layout.metronic')

@section('content')
    <!--begin::Card body-->
    <div class="card-body p-9">
        <!--begin::row mt-3 mb-3-->

        <!--end::row mt-3 mb-3-->
        <!--begin::row mt-3 mb-3-->
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Zone name</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {{ $zone->name }}
            </div>
        </div>
        <!--end::row mt-3 mb-3-->
        <!--begin::row mt-3 mb-3-->
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Price for high s from and to Marsa Alam airport</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {{ $zone->marsa_hs }}
            </div>
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Price for high s from and to Hurgada airport</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {{ $zone->hurgada_hs }}
            </div>
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Price for limousine from and to Marsa Alam airport</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {{ $zone->marsa_limo }}
            </div>
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Price for limousine from and to Hurgada airport</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {{ $zone->hurgada_limo }}
            </div>
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Added fee for extra person in high s</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {{ $zone->added_hs_per_person }}
            </div>
        </div>
        <!--end::row mt-3 mb-3-->
        <!--begin::row mt-3 mb-3-->
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Price for high s from and to Marsa Alam airport for children</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {{ $zone->marsa_hs_child }}
            </div>
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Price for high s from and to Hurgada airport for children</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {{ $zone->hurgada_hs_child }}
            </div>
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Price for limousine from and to Marsa Alam airport for children</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {{ $zone->marsa_limo_child }}
            </div>
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Price for limousine from and to Hurgada airport for children</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {{ $zone->hurgada_limo_child }}
            </div>
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Added fee for extra child in high s</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {{ $zone->added_hs_per_child }}
            </div>
        </div>


    </div>
    <!--begin::row mt-3 mb-3-->
  
    <!--end::row mt-3 mb-3-->
    <!--begin::row mt-3 mb-3-->
    
    <!--end::Card body-->
    <!--begin::Card footer-->

    <!--end::Card footer-->
@endsection
