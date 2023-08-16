@extends('layout.metronic')

@section('content')
    <!--begin::Card body-->
    <div class="card-body p-9">
        <!--begin::row mt-3 mb-3-->

        <!--end::row mt-3 mb-3-->
        <!--begin::row mt-3 mb-3-->
        <div class="row mt-5 mb-5 ">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">City name</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {{ $place->name }}
            </div>
        </div>
        <div class="row mt-5 mb-5">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">City image</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Image input-->
                <img style="max-width: 100%" src="{{ asset('/images/places/'.$place->image) }}" alt="">
            </div>
            <!--end::Col-->
        </div>
        <div class="row mt-5 mb-5">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">City location</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Image input-->
                <iframe src="{{$place->location}}" width="100%" height="200%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!--end::Col-->
        </div>
    @endsection
