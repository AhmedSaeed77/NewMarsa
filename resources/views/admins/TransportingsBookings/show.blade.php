@extends('layout.metronic')

@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
<div class="col-xl-12">
    <div class="card card-flush h-lg-100" id="kt_contacts_main">
        <div class="card-header pt-7" id="kt_chat_contacts_header">
            <div class="card-title">
                <span class="svg-icon svg-icon-1 me-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor" />
                        <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor" />
                    </svg>
                </span>
                <h2>Show Transporting Bookings</h2>
            </div>
        </div>
        <div class="card-body pt-5">
                
                <div class="fv-row mb-7">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required"> Airport</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7"  ></i>
                    </label>
                    <br>
                    <div class="d-inline p-2 bg-dark text-white">{{$transport->airport}}</div>
                    {{-- <input type="text" class="form-control form-control-solid" value="{{$transport->airport}}"  readonly/> --}}
                </div>
                <div class="fv-row mb-7">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span>Adult Number</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" ></i>
                    </label>
                    <br>
                    <div class="d-inline p-2 bg-dark text-white">{{$transport->adult_num}}</div>
                    {{-- <input type="text"  class="form-control" value="{{$transport->adult_num}}" readonly> --}}
                </div>
                <div class="fv-row mb-7">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span>Child Number</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" ></i>
                    </label>
                    <br>
                    <div class="d-inline p-2 bg-dark text-white">{{$transport->child_num}}</div>
                    {{-- <input type="text"  class="form-control" value="{{$transport->child_num}}" readonly> --}}
                </div>
                <div class="fv-row mb-7">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span>Total Price</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" ></i>
                    </label>
                    <br>
                    <div class="d-inline p-2 bg-dark text-white">{{$transport->total_price}}</div>
                    {{-- <input type="text"  class="form-control" value="{{$transport->total_price}}" readonly> --}}
                </div>
                <div class="fv-row mb-7">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span>Payment Status</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" ></i>
                    </label>
                    <br>
                    <div class="d-inline p-2 bg-dark text-white">{{$transport->payment_status}}</div>
                    {{-- <input type="text" class="form-control" value="{{$transport->payment_status}}" readonly> --}}
                </div>
                <div class="fv-row mb-7">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span>Pick up Date</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" ></i>
                    </label>
                    <br>
                    <div class="d-inline p-2 bg-dark text-white">{{$transport->pickup_date}}</div>
                    {{-- <input type="text"  class="form-control" value="{{$transport->pickup_date}}" readonly> --}}
                </div>
                <div class="fv-row mb-7">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span>Pick up Time</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" ></i>
                    </label>
                    <br>
                    <div class="d-inline p-2 bg-dark text-white">{{$transport->pickup_time}}</div>
                    {{-- <input type="text"  class="form-control" value="{{$transport->pickup_time}}" readonly> --}}
                </div>
                <div class="fv-row mb-7">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span>flight Number</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" ></i>
                    </label>
                    <br>
                    <div class="d-inline p-2 bg-dark text-white">{{$transport->flight_number}}</div>
                    {{-- <input type="text"  class="form-control" value="{{$transport->flight_number}}" readonly> --}}
                </div>
                <div class="fv-row mb-7">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span>flight Time</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" ></i>
                    </label>
                    <br>
                    <div class="d-inline p-2 bg-dark text-white">{{$transport->flight_time}}</div>
                    {{-- <input type="text"  class="form-control" value="{{$transport->flight_time}}" readonly> --}}
                </div>
                <div class="fv-row mb-7">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span>From</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" ></i>
                    </label>
                    <br>
                    <div class="d-inline p-2 bg-dark text-white">{{$transport->from}}</div>
                    {{-- <input type="text"  class="form-control" value="{{$transport->from}}" readonly> --}}
                </div>
                <div class="fv-row mb-7">
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <span>To</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" ></i>
                    </label>
                    <br>
                    <div class="d-inline p-2 bg-dark text-white">{{$transport->to}}</div>
                    {{-- <input type="text"  class="form-control" value="{{$transport->to}}" readonly> --}}
                </div>
                <div class="separator mb-6"></div>
                <div class="d-flex flex-row-reverse justify-content-between">
                    <a class="btn btn-dark" href="{{route('transportingbookings.transportingbookings')}}" role="button">Back</a>
                </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('js')
@endsection