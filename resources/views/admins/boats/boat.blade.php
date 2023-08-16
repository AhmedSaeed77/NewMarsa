@extends('layout.metronic');

@section('content')
<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0" style="margin-top: -8px!important;
margin-bottom: 8px!important;"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/art/art010.svg-->
    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path opacity="0.3" d="M22 4H5C4.4 4 4 4.4 4 5V22H13C13.6 22 14 21.6 14 21V18H17C17.6 18 18 17.6 18 17V14H21C21.6 14 22 13.6 22 13V4Z" fill="currentColor"/>
    <path d="M13 18H10V15C10 14.4 10.4 14 11 14H14V17C14 17.6 13.6 18 13 18ZM3 18C2.4 18 2 18.4 2 19V21C2 21.6 2.4 22 3 22H9C9.6 22 10 21.6 10 21V18H3ZM18 13V10H15C14.4 10 14 10.4 14 11V14H17C17.6 14 18 13.6 18 13ZM21 2H19C18.4 2 18 2.4 18 3V10H21C21.6 10 22 9.6 22 9V3C22 2.4 21.6 2 21 2Z" fill="currentColor"/>
    </svg>Events
    </span>
    <!--end::Svg Icon--></h1>
<!--end::Title-->

<div class="card">
<!--begin::Body-->
<div class="card-body p-lg-20">
<div class="card-body p-lg-20">

   
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="card-title d-flex align-items-center">
            <a href="{{route('boat.createboat')}}" class="btn btn-primary" id="kt_project_settings_submit">Add Boat</a>
        </div>
        <!--begin::Col-->
        @foreach($boats as $boat)
        <div class="col-sm-6 col-xxl-4">
            <!--begin::Card widget 14-->
            <div class="card card-flush h-xl-100">
                <!--begin::Body-->
                <div class="card-body text-center pb-5">
                    <!--begin::Overlay-->
                    <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="{{ asset('images/boats/' .$boat->image) }}">
                        <!--begin::Image-->
                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mb-7" style="height: 266px;background-image:url({{ asset('images/boats/' .$boat->image) }})"></div>
                        <!--end::Image-->
                        <!--begin::Action-->
                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                            <i class="bi bi-eye-fill fs-2x text-white"></i>
                        </div>
                        <!--end::Action-->
                    </a>
                    <!--end::Overlay-->
                    <!--begin::Info-->
                    <div class="d-flex align-items-end flex-stack mb-1">
                        <!--begin::Title-->
                        <div class="text-start">
                            <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-4 d-block">{{$boat->name_en}}</span>
                            
                        </div>
                        <span class="text-gray-600 text-end fw-bold fs-6"> </span>
                    </div>
                </div>
                <div class="card-footer d-flex flex-stack pt-0">
                    <!--begin::Link-->
                    <button type="submit" class="btn btn-sm btn-info flex-shrink-0 me-2" ><a style="color:ffffff;" href="{{ route('boat.showboat',$boat->id) }}">Boat Details</a></button>
                    <button type="submit" class="btn btn-sm btn-dark flex-shrink-0 me-2" ><a style="color:ffffff;" href="{{ route('boat.editboat',$boat->id) }}">Boat Edit</a></button>
                    
                    <button type="submit" onclick="deleteFunction({{ $boat->id }})" class="btn btn-sm btn-danger flex-shrink-0">Delete</button>
                    <!--end::Link-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Card widget 14-->
        </div>
        <!--end::Col-->
        @endforeach
    </div>
    <!--end::Card body-->
    </div>
</div>

@endsection
@section('js')
        <script src="{{ URL::asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/sweetalert2@11.js') }}"></script>
        <script src="{{ URL::asset('js/sweetalert2.all.js') }}"></script>
        @include('vue')
<script>
    function deleteFunction(id) {
        const id1 = id;
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            background: 'white',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            size: '100px',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'post',
                    url: "{{ route('boat.deleteboat') }}",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'id': id1,
                    },
                    success: (response) => {
                        if (response) {
                            Swal.fire({
                                position: 'top-center',
                                icon: 'success',
                                title: 'success deleted',
                                background: 'white',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            location.reload();
                        }
                    },
                    error: function(reject) {
                        console.log(reject)
                    }
                })
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    }
</script>
    
@endsection
