@extends('layout.metronic');

@section('content')
    {{-- <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/art/art010.svg-->
    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path opacity="0.3" d="M22 4H5C4.4 4 4 4.4 4 5V22H13C13.6 22 14 21.6 14 21V18H17C17.6 18 18 17.6 18 17V14H21C21.6 14 22 13.6 22 13V4Z" fill="currentColor"/>
    <path d="M13 18H10V15C10 14.4 10.4 14 11 14H14V17C14 17.6 13.6 18 13 18ZM3 18C2.4 18 2 18.4 2 19V21C2 21.6 2.4 22 3 22H9C9.6 22 10 21.6 10 21V18H3ZM18 13V10H15C14.4 10 14 10.4 14 11V14H17C17.6 14 18 13.6 18 13ZM21 2H19C18.4 2 18 2.4 18 3V10H21C21.6 10 22 9.6 22 9V3C22 2.4 21.6 2 21 2Z" fill="currentColor"/>
    </svg>Activities
    </span>
    <!--end::Svg Icon--></h1> --}}
    <!--end::Title-->


    <div class="col-xl-6 m-auto">
        <!--begin::Contacts-->
        <div class="card card-flush h-lg-100" id="kt_contacts_main">
            <!--begin::Card header-->
            <div class="card-header pt-7" id="kt_chat_contacts_header">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                    <span class="svg-icon svg-icon-1 me-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z"
                                fill="currentColor" />
                            <path opacity="0.3"
                                d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <h2>Event Details</h2>
                </div>

            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-5">
                <!--begin::Profile-->
                <div class="d-flex gap-7 align-items-center">
                    <!--begin::Avatar-->
                    <div class="mb-6">
                        <a class="fw-bold text-dark mb-4 fs-2 lh-base text-hover-primary">{{ $event->title }}</a>
                        <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                            href="{{ asset('/images/events/' . $event->image) }}">
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                style="padding-right:400px ; background-image:url({{ asset('/images/events/' . $event->image) }})"></div>
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                <i class="bi bi-eye-fill fs-2x text-white"></i>
                            </div>
                        </a>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($event->images as $img)
                              <div class="carousel-item active">
                                <img src="{{ asset('/images/liveboard/'.$img->image) }}" class="d-block w-100" alt="...">
                              </div>
                              @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                    </div>
                </div>
                <div class="tab-content" id="">
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade show active" id="kt_contact_view_general" role="tabpanel">
                        <!--begin::Additional details-->
                        <div class="d-flex flex-column gap-5 mt-7">
                            <div class="d-flex flex-column gap-1">
                                <div class="fw-bold text-muted">Event Availability</div>
                                <div class="fw-bold fs-5">{{$event->availability}}</div>
                            </div>
                            <div class="d-flex flex-column gap-1">
                                <div class="fw-bold text-muted">Event Time</div>
                                <div class="fw-bold fs-5">{{$event->time}}</div>
                            </div>
                            <div class="d-flex flex-column gap-1">
                                <div class="fw-bold text-muted">Event Adult Price</div>
                                <div class="fw-bold fs-5">{{$event->price}}</div>
                            </div>
                            <div class="d-flex flex-column gap-1">
                                <div class="fw-bold text-muted">Event child Price</div>
                                <div class="fw-bold fs-5">{{$event->pricechild}}</div>
                            </div>
                            <div class="d-flex flex-column gap-1">
                                <div class="fw-bold text-muted">overview</div>
                                {!!$event->overview!!}
                            </div>
                            <div class="d-flex flex-column gap-1">
                                <div class="fw-bold text-muted">Icludes</div>
                                {!!$event->includes!!}
                            </div>
                            <div class="d-flex flex-column gap-1">
                                <div class="fw-bold text-muted">Excludes</div>
                                {!!$event->exclude!!}
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Tab content-->


                <div class="d-flex justify-content-between"  >
                    <a class="btn btn-primary" href="{{route('event.editevent',$event->id)}}">Edit</a>
                    <a  class="btn btn-dark mt-3 mb-0"  href="{{route('event.events')}}" role="button">Back</a>
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Contacts-->
    </div>
@endsection

