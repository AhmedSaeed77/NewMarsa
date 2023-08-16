@extends('layout.metronic');

@section('content')
<div class="card card-flush">
    <!--begin::Header-->
    <div class="card-header pt-7">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold text-gray-800"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/maps/map007.svg-->
                <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M21 11H18.9C18.5 7.9 16 5.49998 13 5.09998V3C13 2.4 12.6 2 12 2C11.4 2 11 2.4 11 3V5.09998C7.9 5.49998 5.50001 8 5.10001 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H5.10001C5.50001 16.1 8 18.4999 11 18.8999V21C11 21.6 11.4 22 12 22C12.6 22 13 21.6 13 21V18.8999C16.1 18.4999 18.5 16 18.9 13H21C21.6 13 22 12.6 22 12C22 11.4 21.6 11 21 11ZM12 17C9.2 17 7 14.8 7 12C7 9.2 9.2 7 12 7C14.8 7 17 9.2 17 12C17 14.8 14.8 17 12 17Z" fill="currentColor"/>
                <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="currentColor"/>
                </svg>Zones
                </span>
                <!--end::Svg Icon--></span>

        </h3>
        <!--end::Title-->
        <!--begin::Toolbar-->
        {{-- <div class="card-toolbar">
            <a href="#" class="btn btn-sm btn-light" data-bs-toggle='tooltip' data-bs-dismiss='click' data-bs-custom-class="tooltip-inverse" title="Logistics App is coming soon">View All</a>
        </div> --}}
        <!--end::Toolbar-->
    </div>
    <div class="card-toolbar d-flex flex-row-reverse m-5">
        <a href="{{ route('zone.index') }}"
            class="btn btn-light btn-active-light-primary me-2">Discard</a>
            <div class="btn-group">

                <a href="{{ route('zone.edit',$zone->id) }}" type="submit" class="btn btn-primary">Edit</a>


            </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-bodyy">
        <!--begin::Nav-->
        <ul class="nav nav-pills nav-pills-custom row position-relative mx-0 mb-9">
            <!--begin::Item-->
            <li class="nav-item col-44 mx-0 p-0">
                <!--begin::Link-->
                <a class="nav-link active d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_10_tab_1">
                    <!--begin::Subtitle-->
                    <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">High bus</span>
                    <!--end::Subtitle-->
                    <!--begin::Bullet-->
                    <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                    <!--end::Bullet-->
                </a>
                <!--end::Link-->
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="nav-item col-44 mx-0 px-0">
                <!--begin::Link-->
                <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_list_widget_10_tab_2">
                    <!--begin::Subtitle-->
                    <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">Limousine</span>
                    <!--end::Subtitle-->
                    <!--begin::Bullet-->
                    <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                    <!--end::Bullet-->
                </a>
                <!--end::Link-->
            </li>
            <!--end::Item-->
            <!--begin::Item-->

            <!--end::Item-->
            <!--begin::Bullet-->

            <!--end::Bullet-->
        </ul>
        <!--end::Nav-->
        <!--begin::Tab Content-->
        <div class="tab-content">
            <!--begin::Tap pane-->
            <div class="tab-pane fade show active" id="kt_list_widget_10_tab_1">
                <!--begin::Item-->
                <div class="m-0">
                    <!--begin::Wrapper-->
                    <div class="d-flex align-items-sm-center mb-5">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-45px me-4">
                            <span class="symbol-label bg-primary">
                                <i class="text-inverse-primary fs-1 lh-0 fonticon-train"></i>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a  class="text-gray-800 fs-6 fw-semibold">{{$zone->name}}</a>

                            </div>

                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Timeline-->
                    <div class="timeline">
                        <!--begin::Timeline item-->
                        <div class="timeline-item align-items-center mb-7">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px mt-6 mb-n12"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon" style="margin-left: 11px">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen015.svg-->
                                <span class="svg-icon svg-icon-2 svg-icon-danger">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10ZM6.39999 9.89999C6.99999 8.19999 8.40001 6.9 10.1 6.4C10.6 6.2 10.9 5.7 10.7 5.1C10.5 4.6 9.99999 4.3 9.39999 4.5C7.09999 5.3 5.29999 7 4.39999 9.2C4.19999 9.7 4.5 10.3 5 10.5C5.1 10.5 5.19999 10.6 5.39999 10.6C5.89999 10.5 6.19999 10.2 6.39999 9.89999ZM14.8 19.5C17 18.7 18.8 16.9 19.6 14.7C19.8 14.2 19.5 13.6 19 13.4C18.5 13.2 17.9 13.5 17.7 14C17.1 15.7 15.8 17 14.1 17.6C13.6 17.8 13.3 18.4 13.5 18.9C13.6 19.3 14 19.6 14.4 19.6C14.5 19.6 14.6 19.6 14.8 19.5Z" fill="currentColor" />
                                        <path d="M16 12C16 14.2 14.2 16 12 16C9.8 16 8 14.2 8 12C8 9.8 9.8 8 12 8C14.2 8 16 9.8 16 12ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content m-0">
                                <!--begin::Title-->
                                <span class="fs-6 text-gray-400 fw-semibold d-block"> Marsa Alam airport</span>
                                <!--end::Title-->
                                <!--begin::Title-->
                                {{-- <span class="fs-6 fw-bold text-gray-800">Hotel</span> --}}
                                <!--end::Title-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item align-items-center">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon" style="margin-left: 11px">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                <span class="svg-icon svg-icon-2 svg-icon-info">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
                                        <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content m-0">
                                <!--begin::Title-->
                                <span class="fs-6 text-gray-400 fw-semibold d-block" style="margin-bottom: 20px;">Hotel</span>
                                <!--end::Title-->
                                <!--begin::Title-->
                                {{-- <span class="fs-6 fw-bold text-gray-800">Tallin, EST</span> --}}
                                <!--end::Title-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                    </div>
                    <div class="overflow-auto pb-5">
                        <!--begin::Record-->
                        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-5" style="margin:5px;">
                            <!--begin::Title-->
                            <a  class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">Price:</a>
                            <!--end::Title-->
                            <!--begin::Label-->
                            <div class="min-w-175px pe-2">
                                <span class="badge badge-light text-muted">{{$zone->marsa_hs}}$</span>
                            </div>
                            <!--end::Label-->
                            <!--begin::Users-->

                            <!--end::Users-->
                            <!--begin::Progress-->

                            <!--end::Progress-->
                            <!--begin::Action-->

                            <!--end::Action-->
                        </div>
                        <!--end::Record-->
                        <!--begin::Record-->
                        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0" style="margin:5px;">
                            <!--begin::Title-->
                            <a class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">Price for extra:</a>
                            <!--end::Title-->
                            <!--begin::Label-->
                            <div class="min-w-175px">
                                <span class="badge badge-light text-muted">{{$zone->added_hs_per_person}}$</span>
                            </div>
                            <!--end::Label-->
                            <!--begin::Users-->

                            <!--end::Users-->
                            <!--begin::Progress-->

                            <!--end::Action-->
                        </div>
                        <!--end::Record-->
                        <!--begin::Record-->
                        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0" style="margin:5px; ">
                            <!--begin::Title-->
                            <a class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px" >Price for child:</a>
                            <!--end::Title-->
                            <!--begin::Label-->
                            <div class="min-w-175px">
                                <span class="badge badge-light text-muted">{{$zone->marsa_hs_child}}$</span>
                            </div>
                            <!--end::Label-->
                            <!--begin::Users-->

                            <!--end::Users-->
                            <!--begin::Progress-->

                            <!--end::Action-->
                        </div>
                        <!--end::Record-->
                        <!--begin::Record-->
                        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0" style="margin:5px; ">
                            <!--begin::Title-->
                            <a class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">Price for extra child:</a>
                            <!--end::Title-->
                            <!--begin::Label-->
                            <div class="min-w-175px">
                                <span class="badge badge-light text-muted">{{$zone->added_hs_per_child}}$</span>
                            </div>
                            <!--end::Label-->
                            <!--begin::Users-->

                            <!--end::Users-->
                            <!--begin::Progress-->

                            <!--end::Action-->
                        </div>
                        <!--end::Record-->
                    </div>
                    <!--end::Timeline-->
                </div>
                <!--end::Item-->
                <!--begin::Separator-->
                <div class="separator separator-dashed my-6"></div>
                <!--end::Separator-->
                <!--begin::Item-->
                <div class="m-0">
                    <!--begin::Wrapper-->
                    <div class="d-flex align-items-sm-center mb-5">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-45px me-4">
                            <span class="symbol-label bg-primary">
                                <i class="text-inverse-primary fs-1 lh-0 fonticon-train"></i>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a class="text-gray-800 fs-6 fw-semibold">{{$zone->name}}</a>

                            </div>

                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Timeline-->
                    <div class="timeline">
                        <!--begin::Timeline item-->
                        <div class="timeline-item align-items-center mb-7">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px mt-6 mb-n12"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon" style="margin-left: 11px">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen015.svg-->
                                <span class="svg-icon svg-icon-2 svg-icon-danger">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10ZM6.39999 9.89999C6.99999 8.19999 8.40001 6.9 10.1 6.4C10.6 6.2 10.9 5.7 10.7 5.1C10.5 4.6 9.99999 4.3 9.39999 4.5C7.09999 5.3 5.29999 7 4.39999 9.2C4.19999 9.7 4.5 10.3 5 10.5C5.1 10.5 5.19999 10.6 5.39999 10.6C5.89999 10.5 6.19999 10.2 6.39999 9.89999ZM14.8 19.5C17 18.7 18.8 16.9 19.6 14.7C19.8 14.2 19.5 13.6 19 13.4C18.5 13.2 17.9 13.5 17.7 14C17.1 15.7 15.8 17 14.1 17.6C13.6 17.8 13.3 18.4 13.5 18.9C13.6 19.3 14 19.6 14.4 19.6C14.5 19.6 14.6 19.6 14.8 19.5Z" fill="currentColor" />
                                        <path d="M16 12C16 14.2 14.2 16 12 16C9.8 16 8 14.2 8 12C8 9.8 9.8 8 12 8C14.2 8 16 9.8 16 12ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content m-0">
                                <!--begin::Title-->
                                <span class="fs-6 text-gray-400 fw-semibold d-block" > Hurgada airport</span>
                                <!--end::Title-->
                                <!--begin::Title-->

                                <!--end::Title-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item align-items-center">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon" style="margin-left: 11px">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                <span class="svg-icon svg-icon-2 svg-icon-info">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
                                        <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content m-0">
                                <!--begin::Title-->
                                <span class="fs-6 text-gray-400 fw-semibold d-block"style="margin-bottom: 20px;">Hotel</span>
                                <!--end::Title-->
                                <!--begin::Title-->

                                <!--end::Title-->
                            </div>

                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <div class="overflow-auto pb-5">
                            <!--begin::Record-->
                            <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0" style="margin:5px; ">
                                <!--begin::Title-->
                                <a class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">Price :</a>
                                <!--end::Title-->
                                <!--begin::Label-->
                                <div class="min-w-175px">
                                    <span class="badge badge-light text-muted">{{$zone->hurgada_hs}}$</span>
                                </div>
                                <!--end::Label-->
                                <!--begin::Users-->

                                <!--end::Users-->
                                <!--begin::Progress-->

                                <!--end::Action-->
                            </div>
                            <!--end::Record-->
                            <!--begin::Record-->
                            <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0" style="margin:5px; ">
                                <!--begin::Title-->
                                <a class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">Price for extra :</a>
                                <!--end::Title-->
                                <!--begin::Label-->
                                <div class="min-w-175px">
                                    <span class="badge badge-light text-muted">{{$zone->added_hs_per_person}}$</span>
                                </div>
                                <!--end::Label-->
                                <!--begin::Users-->

                                <!--end::Users-->
                                <!--begin::Progress-->

                                <!--end::Action-->
                            </div>
                            <!--end::Record-->
                            <!--begin::Record-->
                            <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0" style="margin:5px; ">
                                <!--begin::Title-->
                                <a class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">Price for child:</a>
                                <!--end::Title-->
                                <!--begin::Label-->
                                <div class="min-w-175px">
                                    <span class="badge badge-light text-muted">{{$zone->added_hs_per_child}}$</span>
                                </div>
                                <!--end::Label-->
                                <!--begin::Users-->

                                <!--end::Users-->
                                <!--begin::Progress-->

                                <!--end::Action-->
                            </div>
                        <!--end::Record-->
                        <!--begin::Record-->
                        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0" style="margin:5px; ">
                            <!--begin::Title-->
                            <a class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">Price for extra child:</a>
                            <!--end::Title-->
                            <!--begin::Label-->
                            <div class="min-w-175px">
                                <span class="badge badge-light text-muted">{{$zone->hurgada_hs_child}}$</span>
                            </div>
                            <!--end::Label-->
                            <!--begin::Users-->

                            <!--end::Users-->
                            <!--begin::Progress-->

                            <!--end::Action-->
                        </div>
                        <!--end::Record-->
                        </div>
                    </div>
                    <!--end::Timeline-->
                </div>
                <!--end::Item-->
                <!--begin::Separator-->
                <div class="separator separator-dashed my-6"></div>
                <!--end::Separator-->
                <!--begin::Item-->

                <!--end::Item-->
                <!--begin::Separator-->

                <!--end::Separator-->
                <!--begin::Item-->

                <!--end::Item-->
            </div>
            <!--end::Tap pane-->
            <!--begin::Tap pane-->
            <div class="tab-pane fade" id="kt_list_widget_10_tab_2">
                <!--begin::Item-->
                <div class="m-0">
                    <!--begin::Wrapper-->
                    <div class="d-flex align-items-sm-center mb-5">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-45px me-4">
                            <span class="symbol-label bg-primary">
                                <i class="text-inverse-primary fs-1 lh-0 fonticon-train"></i>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a  class="text-gray-800 fs-6 fw-semibold">{{$zone->name}}</a>

                            </div>

                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Timeline-->
                    <div class="timeline">
                        <!--begin::Timeline item-->
                        <div class="timeline-item align-items-center mb-7">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px mt-6 mb-n12"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon" style="margin-left: 11px">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen015.svg-->
                                <span class="svg-icon svg-icon-2 svg-icon-danger">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10ZM6.39999 9.89999C6.99999 8.19999 8.40001 6.9 10.1 6.4C10.6 6.2 10.9 5.7 10.7 5.1C10.5 4.6 9.99999 4.3 9.39999 4.5C7.09999 5.3 5.29999 7 4.39999 9.2C4.19999 9.7 4.5 10.3 5 10.5C5.1 10.5 5.19999 10.6 5.39999 10.6C5.89999 10.5 6.19999 10.2 6.39999 9.89999ZM14.8 19.5C17 18.7 18.8 16.9 19.6 14.7C19.8 14.2 19.5 13.6 19 13.4C18.5 13.2 17.9 13.5 17.7 14C17.1 15.7 15.8 17 14.1 17.6C13.6 17.8 13.3 18.4 13.5 18.9C13.6 19.3 14 19.6 14.4 19.6C14.5 19.6 14.6 19.6 14.8 19.5Z" fill="currentColor" />
                                        <path d="M16 12C16 14.2 14.2 16 12 16C9.8 16 8 14.2 8 12C8 9.8 9.8 8 12 8C14.2 8 16 9.8 16 12ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content m-0">
                                <!--begin::Title-->
                                <span class="fs-6 text-gray-400 fw-semibold d-block"> Marsa Alam airport</span>
                                <!--end::Title-->
                                <!--begin::Title-->
                                {{-- <span class="fs-6 fw-bold text-gray-800">Hotel</span> --}}
                                <!--end::Title-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item align-items-center">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon" style="margin-left: 11px">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                <span class="svg-icon svg-icon-2 svg-icon-info">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
                                        <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content m-0">
                                <!--begin::Title-->
                                <span class="fs-6 text-gray-400 fw-semibold d-block" style="margin-bottom: 20px;">Hotel</span>
                                <!--end::Title-->
                                <!--begin::Title-->
                                {{-- <span class="fs-6 fw-bold text-gray-800">Tallin, EST</span> --}}
                                <!--end::Title-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                    </div>
                    <div class="overflow-auto pb-5">
                        <!--begin::Record-->
                        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0" style="margin:5px; ">
                            <!--begin::Title-->
                            <a class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">Price:</a>
                            <!--end::Title-->
                            <!--begin::Label-->
                            <div class="min-w-175px">
                                <span class="badge badge-light text-muted">{{$zone->marsa_limo}}$</span>
                            </div>
                            <!--end::Label-->
                            <!--begin::Users-->

                            <!--end::Users-->
                            <!--begin::Progress-->

                            <!--end::Action-->
                        </div>
                        <!--end::Record-->
                        <!--begin::Record-->
                      
                        <!--end::Record-->
                        <!--begin::Record-->
                        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0" style="margin:5px; ">
                            <!--begin::Title-->
                            <a class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">Price for child:</a>
                            <!--end::Title-->
                            <!--begin::Label-->
                            <div class="min-w-175px">
                                <span class="badge badge-light text-muted">{{$zone->marsa_limo_child}}$</span>
                            </div>
                            <!--end::Label-->
                            <!--begin::Users-->

                            <!--end::Users-->
                            <!--begin::Progress-->

                            <!--end::Action-->
                        </div>
                        <!--end::Record-->
                        <!--begin::Record-->
                    
                        <!--end::Record-->
                    </div>
                    <!--end::Timeline-->
                </div>
                <!--end::Item-->
                <!--begin::Separator-->
                <div class="separator separator-dashed my-6"></div>
                <!--end::Separator-->
                <!--begin::Item-->
                <div class="m-0">
                    <!--begin::Wrapper-->
                    <div class="d-flex align-items-sm-center mb-5">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-45px me-4">
                            <span class="symbol-label bg-primary">
                                <i class="text-inverse-primary fs-1 lh-0 fonticon-train"></i>
                            </span>
                        </div>
                        <!--end::Symbol-->
                        <!--begin::Section-->
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2">
                                <a  class="text-gray-800 fs-6 fw-semibold">{{$zone->name}}</a>

                            </div>

                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Timeline-->
                    <div class="timeline">
                        <!--begin::Timeline item-->
                        <div class="timeline-item align-items-center mb-7">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px mt-6 mb-n12"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon" style="margin-left: 11px">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen015.svg-->
                                <span class="svg-icon svg-icon-2 svg-icon-danger">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10ZM6.39999 9.89999C6.99999 8.19999 8.40001 6.9 10.1 6.4C10.6 6.2 10.9 5.7 10.7 5.1C10.5 4.6 9.99999 4.3 9.39999 4.5C7.09999 5.3 5.29999 7 4.39999 9.2C4.19999 9.7 4.5 10.3 5 10.5C5.1 10.5 5.19999 10.6 5.39999 10.6C5.89999 10.5 6.19999 10.2 6.39999 9.89999ZM14.8 19.5C17 18.7 18.8 16.9 19.6 14.7C19.8 14.2 19.5 13.6 19 13.4C18.5 13.2 17.9 13.5 17.7 14C17.1 15.7 15.8 17 14.1 17.6C13.6 17.8 13.3 18.4 13.5 18.9C13.6 19.3 14 19.6 14.4 19.6C14.5 19.6 14.6 19.6 14.8 19.5Z" fill="currentColor" />
                                        <path d="M16 12C16 14.2 14.2 16 12 16C9.8 16 8 14.2 8 12C8 9.8 9.8 8 12 8C14.2 8 16 9.8 16 12ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content m-0">
                                <!--begin::Title-->
                                <span class="fs-6 text-gray-400 fw-semibold d-block" > Hurgada airport</span>
                                <!--end::Title-->
                                <!--begin::Title-->

                                <!--end::Title-->
                            </div>
                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <!--begin::Timeline item-->
                        <div class="timeline-item align-items-center">
                            <!--begin::Timeline line-->
                            <div class="timeline-line w-40px"></div>
                            <!--end::Timeline line-->
                            <!--begin::Timeline icon-->
                            <div class="timeline-icon" style="margin-left: 11px">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                <span class="svg-icon svg-icon-2 svg-icon-info">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
                                        <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Timeline icon-->
                            <!--begin::Timeline content-->
                            <div class="timeline-content m-0">
                                <!--begin::Title-->
                                <span class="fs-6 text-gray-400 fw-semibold d-block"style="margin-bottom: 20px;">Hotel</span>
                                <!--end::Title-->
                                <!--begin::Title-->

                                <!--end::Title-->
                            </div>

                            <!--end::Timeline content-->
                        </div>
                        <!--end::Timeline item-->
                        <div class="overflow-auto pb-5">
                            <!--begin::Record-->
                            <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0" style="margin:5px; ">
                                <!--begin::Title-->
                                <a class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">Price :</a>
                                <!--end::Title-->
                                <!--begin::Label-->
                                <div class="min-w-175px">
                                    <span class="badge badge-light text-muted">{{$zone->hurgada_limo}}$</span>
                                </div>
                                <!--end::Label-->
                                <!--begin::Users-->

                                <!--end::Users-->
                                <!--begin::Progress-->

                                <!--end::Action-->
                            </div>
                            <!--end::Record-->
                            <!--begin::Record-->
                          
                            <!--end::Record-->
                            <!--begin::Record-->
                            <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0" style="margin:5px; ">
                                <!--begin::Title-->
                                <a class="fs-5 text-dark text-hover-primary fw-semibold w-375px min-w-200px">Price for  child:</a>
                                <!--end::Title-->
                                <!--begin::Label-->
                                <div class="min-w-175px">
                                    <span class="badge badge-light text-muted">{{$zone->hurgada_limo_child}}$</span>
                                </div>
                                <!--end::Label-->
                                <!--begin::Users-->

                                <!--end::Users-->
                                <!--begin::Progress-->

                                <!--end::Action-->
                            </div>
                        <!--end::Record-->
                        <!--begin::Record-->
                       
                        <!--end::Record-->
                        </div>
                    </div>
                    <!--end::Timeline-->
                </div>
                <!--end::Item-->
                <!--begin::Separator-->
                <div class="separator separator-dashed my-6"></div>
                <!--end::Separator-->
                <!--begin::Item-->

                <!--end::Item-->
            </div>
            <!--end::Tap pane-->
            <!--begin::Tap pane-->

            <!--end::Tap pane-->
        </div>
        <!--end::Tab Content-->
        <a  class="btn btn-dark mt-3 mb-0"  href="{{route('zone.index')}}" role="button">Back</a>
    </div>
    <!--end: Card Body-->

</div>
@endsection
@section('js')
<script>
    "use strict";

// Class definition
var KTDatatablesServerSide = function () {
    // Shared variables
    var table;
    var dt;
    var filterPayment;

    // Private functions
    var initDatatable = function () {
        dt = $("#kt_datatable_example_1").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[5, 'desc']],
            stateSave: true,
            select: {
                style: 'multi',
                selector: 'td:first-child input[type="checkbox"]',
                className: 'row-selected'
            },
            ajax: {
                url: "https://preview.keenthemes.com/api/datatables.php",
            },
            columns: [
                { data: 'ID' },
                { data: 'Name' },
                { data: 'Email' },
                { data: 'Company' },
                { data: 'CreditCardNumber' },
                { data: 'Datetime' },
                { data: null },
            ],
            columnDefs: [
                {
                    targets: 0,
                    orderable: false,
                    render: function (data) {
                        return `
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="${data}" />
                            </div>`;
                    }
                },
                {
                    targets: 4,
                    render: function (data, type, row) {
                        return `<img src="${hostUrl}media/svg/card-logos/${row.CreditCardType}.svg" class="w-35px me-3" alt="${row.CreditCardType}">` + data;
                    }
                },
                {
                    targets: -1,
                    data: null,
                    orderable: false,
                    className: 'text-end',
                    render: function (data, type, row) {
                        return `
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                Actions
                                <span class="svg-icon svg-icon-5 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-docs-table-filter="edit_row">
                                        Edit
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-docs-table-filter="delete_row">
                                        Delete
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        `;
                    },
                },
            ],
            // Add data-filter attribute
            createdRow: function (row, data, dataIndex) {
                $(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
            }
        });

        table = dt.$;

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        dt.on('draw', function () {
            initToggleToolbar();
            toggleToolbars();
            handleDeleteRows();
            KTMenu.createInstances();
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            dt.search(e.target.value).draw();
        });
    }

    // Filter Datatable
    var handleFilterDatatable = () => {
        // Select filter options
        filterPayment = document.querySelectorAll('[data-kt-docs-table-filter="payment_type"] [name="payment_type"]');
        const filterButton = document.querySelector('[data-kt-docs-table-filter="filter"]');

        // Filter datatable on submit
        filterButton.addEventListener('click', function () {
            // Get filter values
            let paymentValue = '';

            // Get payment value
            filterPayment.forEach(r => {
                if (r.checked) {
                    paymentValue = r.value;
                }

                // Reset payment value if "All" is selected
                if (paymentValue === 'all') {
                    paymentValue = '';
                }
            });

            // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
            dt.search(paymentValue).draw();
        });
    }

    // Delete customer
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll('[data-kt-docs-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get customer name
                const customerName = parent.querySelectorAll('td')[1].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + customerName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        // Simulate delete request -- for demo purpose only
                        Swal.fire({
                            text: "Deleting " + customerName,
                            icon: "info",
                            buttonsStyling: false,
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function () {
                            Swal.fire({
                                text: "You have deleted " + customerName + "!.",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            }).then(function () {
                                // delete row data from server and re-draw datatable
                                dt.draw();
                            });
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: customerName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    }

    // Reset Filter
    var handleResetForm = () => {
        // Select reset button
        const resetButton = document.querySelector('[data-kt-docs-table-filter="reset"]');

        // Reset datatable
        resetButton.addEventListener('click', function () {
            // Reset payment type
            filterPayment[0].checked = true;

            // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
            dt.search('').draw();
        });
    }

    // Init toggle toolbar
    var initToggleToolbar = function () {
        // Toggle selected action toolbar
        // Select all checkboxes
        const container = document.querySelector('#kt_datatable_example_1');
        const checkboxes = container.querySelectorAll('[type="checkbox"]');

        // Select elements
        const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

        // Toggle delete selected toolbar
        checkboxes.forEach(c => {
            // Checkbox on click event
            c.addEventListener('click', function () {
                setTimeout(function () {
                    toggleToolbars();
                }, 50);
            });
        });

        // Deleted selected rows
        deleteSelected.addEventListener('click', function () {
            // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
            Swal.fire({
                text: "Are you sure you want to delete selected customers?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                showLoaderOnConfirm: true,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                },
            }).then(function (result) {
                if (result.value) {
                    // Simulate delete request -- for demo purpose only
                    Swal.fire({
                        text: "Deleting selected customers",
                        icon: "info",
                        buttonsStyling: false,
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function () {
                        Swal.fire({
                            text: "You have deleted all selected customers!.",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        }).then(function () {
                            // delete row data from server and re-draw datatable
                            dt.draw();
                        });

                        // Remove header checked box
                        const headerCheckbox = container.querySelectorAll('[type="checkbox"]')[0];
                        headerCheckbox.checked = false;
                    });
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Selected customers was not deleted.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary",
                        }
                    });
                }
            });
        });
    }

    // Toggle toolbars
    var toggleToolbars = function () {
        // Define variables
        const container = document.querySelector('#kt_datatable_example_1');
        const toolbarBase = document.querySelector('[data-kt-docs-table-toolbar="base"]');
        const toolbarSelected = document.querySelector('[data-kt-docs-table-toolbar="selected"]');
        const selectedCount = document.querySelector('[data-kt-docs-table-select="selected_count"]');

        // Select refreshed checkbox DOM elements
        const allCheckboxes = container.querySelectorAll('tbody [type="checkbox"]');

        // Detect checkboxes state & count
        let checkedState = false;
        let count = 0;

        // Count checked boxes
        allCheckboxes.forEach(c => {
            if (c.checked) {
                checkedState = true;
                count++;
            }
        });

        // Toggle toolbars
        if (checkedState) {
            selectedCount.innerHTML = count;
            toolbarBase.classList.add('d-none');
            toolbarSelected.classList.remove('d-none');
        } else {
            toolbarBase.classList.remove('d-none');
            toolbarSelected.classList.add('d-none');
        }
    }

    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
            initToggleToolbar();
            handleFilterDatatable();
            handleDeleteRows();
            handleResetForm();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesServerSide.init();
});
    </script>
    {{-- <script>
        var KTDatatablesDataSourceAjaxServer = function() {

            var initTable1 = function() {
                var table = $('#kt_table_1');

                // begin first table
                table.DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('place.datatable') }}",
                        data: function(d) {
                            d.name = $('#name').val();
                            d.owner = $('#owner').val();
                        }
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'name'
                        },

                        {
                            data: 'action'
                        }
                    ]
                });
                $('#name').keyup(function() {
                    table.DataTable().draw();
                });
                $('#owner').change(function() {
                    table.DataTable().draw();
                });
                $('#kt_table_1 tbody').on('click', '.delete', function() {
                    var value = $(this).attr("value");
                    console.log(value)
                    Swal.fire({
                        title: 'Are you sure you want to delete?',

                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'confirm !'
                    }).then((result) => {

                        if (result.isConfirmed) {
                            console.log('done')
                            $.ajax({
                                type: 'post',
                                url: "{{ route('place.delete') }}",
                                data: {
                                    '_token': "{{ csrf_token() }}",
                                    'id': value,
                                },
                                success: (response) => {
                                    if (response) {
                                        Swal.fire({
                                            position: 'top-center',
                                            icon: 'success',
                                            title: 'Place deleted',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                        table.DataTable().draw();
                                    }
                                },
                                error: function(reject) {
                                    console.log(reject)
                                }

                            })

                        }
                    })
                    // console.log($(this).attr("value"));
                });

            };

            return {

                //main function to initiate the module
                init: function() {
                    initTable1();
                },

            };

        }();

        jQuery(document).ready(function() {
            KTDatatablesDataSourceAjaxServer.init();
        });
    </script> --}}
@endsection
