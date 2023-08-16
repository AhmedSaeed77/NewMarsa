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
                <div class="fs-6 fw-semibold mt-2 mb-3">Activity title</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {{ $activity->title }}
            </div>
        </div>
        <!--end::row mt-3 mb-3-->
        <!--begin::row mt-3 mb-3-->
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Activity title (de)</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {{ $activity->title_de }}
            </div>
        </div>
        <!--end::row mt-3 mb-3-->
        <!--begin::row mt-3 mb-3-->
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Activity title (cz)</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                {{ $activity->title_cz }}
            </div>
        </div>
        <!--end::row mt-3 mb-3-->
        <!--begin::row mt-3 mb-3-->
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Activity Type</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9">
                {{ App\Models\ActivityType::find($activity->type_id)->type }}
            </div>
        </div>
        <!--end::row mt-3 mb-3-->
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Activity place</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9">
                {{ App\Models\Place::find($activity->place_id)->name }}
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
                {!! $activity->overview !!}
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
                {!! $activity->overview_de !!}
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
                {!! $activity->overview_cz !!}
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
                {!! $activity->terms_and_conditions !!}
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
                {!! $activity->terms_and_conditions_de !!}
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
                {!! $activity->terms_and_conditions_cz !!}
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
                {!! $activity->highlights !!}
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
                {!! $activity->highlights_de !!}
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
                {!! $activity->highlights_cz !!}
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
                {!! $activity->faqs !!}
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
                {!! $activity->faqs_de !!}
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
                {!! $activity->faqs_cz !!}
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
                {!! $activity->includes !!}
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
                {!! $activity->includes_de !!}
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
                {!! $activity->includes_cz !!}
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
                {!! $activity->exclude !!}
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
                {!! $activity->exclude_de !!}
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
                {!! $activity->exclude_cz !!}
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
                    {{ $activity->status }}
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
                {{ $activity->price }}
            </div>
        </div>
        <div class="row mt-3 mb-3 mb-5">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Activity image</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <!--begin::Image input-->
                <img style="max-width: 100%" src="{{ asset('/images/activities/' . $activity->image) }}" alt="">
            </div>
            <!--end::Col-->
        </div>
        <!--end::row mt-3 mb-3-->
        <div class="row mt-3 mb-3 mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-semibold mt-2 mb-3">Schedule</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row mt-3 mb-3">
                <div class="container">

                    {{-- <div class="calendar"></div> --}}
                    @foreach (explode(',', $activity->availability) as $row)
                        @php
                            $time = strtotime($row);
                            
                            $newformat = date('D M j Y', $time);
                            
                            
                        @endphp
                        {{$newformat}}<br>
                    @endforeach
                </div>


            </div>
            <!--begin::Col-->
        </div>

    </div>
    <!--end::Card body-->
    <!--begin::Card footer-->

    <!--end::Card footer-->
    <div id='hidden' style="display:none;">
        {{ $activity->availability }}
    </div>
@endsection


