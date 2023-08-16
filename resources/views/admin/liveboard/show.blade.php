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
                <div class="fs-6 fw-semibold mt-2 mb-3">LiveAboard title</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {{ $live->title }}
            </div>
        </div>
        <!--end::row mt-3 mb-3-->
        <!--begin::row mt-3 mb-3-->
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">LiveAboard title (de)</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {{ $live->title_de }}
            </div>
        </div>
        <!--end::row mt-3 mb-3-->
        <!--begin::row mt-3 mb-3-->
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">LiveAboard title (cz)</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {{ $live->title_cz }}
            </div>
        </div>
        <!--end::row mt-3 mb-3-->
        <!--begin::row mt-3 mb-3-->
        
        <!--end::row mt-3 mb-3-->
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">LiveAboard place</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9">
                {{ App\Models\Place::find($live->place_id)->name }}
            </div>
        </div>
        <!--begin::row mt-3 mb-3-->
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Overview</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {!! $live->overview !!}
            </div>
            <!--begin::Col-->
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Overview (de)</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {!! $live->overview_de !!}
            </div>
            <!--begin::Col-->
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Overview (cz)</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {!! $live->overview_cz !!}
            </div>
            <!--begin::Col-->
        </div>
        <!--end::row mt-3 mb-3-->
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Terms and conditions</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {!! $live->terms_and_conditions !!}
            </div>
            <!--begin::Col-->
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Terms and conditions (de)</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {!! $live->terms_and_conditions_de !!}
            </div>
            <!--begin::Col-->
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Terms and conditions (cz)</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {!! $live->terms_and_conditions_cz !!}
            </div>
            <!--begin::Col-->
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">highlights</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {!! $live->highlights !!}
            </div>
            <!--begin::Col-->
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">highlights (de)</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {!! $live->highlights_de !!}
            </div>
            <!--begin::Col-->
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">highlights (cz)</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {!! $live->highlights_cz !!}
            </div>
            <!--begin::Col-->
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Popular questions</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {!! $live->faqs !!}
            </div>
            <!--begin::Col-->
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Popular questions (de)</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {!! $live->faqs_de !!}
            </div>
            <!--begin::Col-->
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Popular questions (cz)</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {!! $live->faqs_cz !!}
            </div>
            <!--begin::Col-->
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Includes</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {!! $live->includes !!}
            </div>
            <!--begin::Col-->
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Includes (de)</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {!! $live->includes_de !!}
            </div>
            <!--begin::Col-->
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Includes (cz)</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {!! $live->includes_cz !!}
            </div>
            <!--begin::Col-->
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Excludes</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {!! $live->exclude !!}
            </div>
            <!--begin::Col-->
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Excludes (de)</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {!! $live->exclude_de !!}
            </div>
            <!--begin::Col-->
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Excludes (cz)</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {!! $live->exclude_cz !!}
            </div>
            <!--begin::Col-->
        </div>
        <!--begin::row mt-3 mb-3-->


        <!--end::row mt-3 mb-3-->
        <!--begin::row mt-3 mb-3-->
        <div class="row mt-3 mb-3">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Status</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9">
                <div class="form-check form-switch form-check-custom form-check-solid">
                    {{ $live->status }}
                </div>
            </div>
            <!--end::Col-->
        </div>
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Price per person</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {{ $live->price }}
            </div>
        </div>
        <div class="row mt-3 mb-3 mb-5">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">LiveAboard image</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Image input-->
                <img style="max-width: 100%" src="{{ asset('/images/liveboard/' . $live->image) }}" alt="">
            </div>
            <!--end::Col-->
        </div>
        <!--end::row mt-3 mb-3-->
        <div class="row mt-3 mb-3 mb-8">
            <div class="row mt-3 mb-3 mb-8">
                <!--begin::Col-->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="fs-6 fw-semibold mt-2 mb-3">from</div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    {{$live->from_date}}
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                
                <!--begin::Col-->
            </div>
            <div class="row mt-3 mb-3 mb-8">
                <!--begin::Col-->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="fs-6 fw-semibold mt-2 mb-3">to</div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    {{$live->to_date}}
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                
                <!--begin::Col-->
            </div>
        </div>

    </div>
    <!--end::Card body-->
    <!--begin::Card footer-->

    <!--end::Card footer-->
    
@endsection


