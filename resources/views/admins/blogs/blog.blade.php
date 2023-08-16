@extends('layout.metronic')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 m-auto w-100">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 w-100">
                    <!--begin::Title-->

                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0" style="margin-top: -8px!important;
                    margin-bottom: 8px!important;"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/art/art010.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z" fill="currentColor"/>
                            <path opacity="0.3" d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z" fill="currentColor"/>
                            </svg> Blogs
                            </span>
                        <!--end::Svg Icon--></h1>
                    <!--end::Title-->

        <div class="card">
            <!--begin::Body-->
            <div class="card-body p-lg-20">
<div class="card-body p-lg-20">
    <!--begin::Section-->
    
    <div class="card-title d-flex align-items-center">
        <a href="{{route('blog.createblog')}}" class="btn btn-primary" id="kt_project_settings_submit">Add Blog</a>
    </div>
    <br>
    <div class="mb-17">
<div class="mb-17">
    <!--begin::Title-->
    <h3 class="text-dark mb-7">Latest Blogs</h3>
    <!--end::Title-->
    <!--begin::Separator-->
    <div class="separator separator-dashed mb-9"></div>
    <!--end::Separator-->
    <!--begin::Row-->
    <div class="row d-flex align-item-center">
    @foreach($blogs as $blog)
   
        
        
            
            <div class="col-md-6 ps-lg-6 mb-16 mt-md-0 mt-17 mx-auto">
                <!--begin::Body-->
                <div class="mb-6">
                    <!--begin::Title-->
                    <h3 >{{$blog->title_en}}</h3>
                    <!--end::Title-->
                    <!--begin::Text-->

                    <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="{{ asset('images/blogs/' .$blog->image) }}">
                        <!--begin::Image-->
                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url({{ asset('images/blogs/' .$blog->image) }})"></div>
                        <!--end::Image-->
                        <!--begin::Action-->
                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                            <i class="bi bi-eye-fill fs-2x text-white"></i>
                        </div>
                        <!--end::Action-->
                    </a>
                    <div class="fw-semibold fs-5 mt-4 text-gray-600 text-dark"></div>
                    <!--end::Text-->
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="col-12">
                    <!--begin::Item-->
                    <div class="d-flex align-items-center pe-2">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-35px symbol-circle me-3">
                            
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Text-->
                        <div class="fs-5 fw-bold">
                            <a href="" class="text-gray-700 text-hover-primary"></a>
                            <span class="text-muted">on  {{$blog->created_at}}</span>
                        </div>
                        <!--end::Text-->
                       <div></div> 
                        <div class="card-footer d-flex flex-stack pt-0">
                            <button type="submit" onclick="deleteFunction({{ $blog->id }})"
                                class="btn btn-sm btn-danger flex-shrink-0  mt-4">Delete</button>
                                
                            <!--end::Link-->
                        </div>
                        <div class="card-footer d-flex flex-stack pt-0 ">
                            <a class="btn btn-dark mt-4" href="{{route('blog.editblog',$blog->id)}}" role="button">Edit</a>
                            <!--end::Link-->
                        </div>
                    </div>
                    <!--end::Item-->
                    <!--begin::Label-->
                    
                    <!--end::Label-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Post-->
            
            
        @endforeach
    </div>

        <!--begin::Col-->
        
        <!--end::Col-->
    </div>
    <!--begin::Row-->
</div>
@endsection
@section('js')
        <script src="{{ URL::asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/sweetalert2@11.js') }}"></script>
        <script src="{{ URL::asset('js/sweetalert2.all.js') }}"></script>
        @include('vue')
    <!--begin::Page Vendors(used by this page) -->
    <script>
        function deleteFunction(id) {
            const id1 = id;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                background:'white',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                size: '100px',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        url: "{{ route('blog.deleteblog') }}",
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

    <script>
        var KTDatatablesDataSourceAjaxServer = function() {
            var initTable1 = function() {
                var table = $('#kt_table_1');

                // begin first table
                table.DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('blog.blogDatatable') }}",
                        data: function(d) {
                            d.title = $('#title').val();
                            d.owner = $('#owner').val();
                        }
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'title'
                        },
                        {
                            data: 'content'
                        },
                        {
                            data: 'user_name'
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
                        title: ' سيتم مسح المقال بكافة سنداته ان وجد   ',

                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'تأكيد !'
                    }).then((result) => {

                        if (result.isConfirmed) {
                            console.log('done')
                            $.ajax({
                                type: 'post',
                                url: "{{ route('blog.deleteblog') }}",
                                data: {
                                    '_token': "{{ csrf_token() }}",
                                    'id': value,
                                },
                                success: (response) => {
                                    if (response) {
                                        Swal.fire({
                                            position: 'top-center',
                                            icon: 'success',
                                            title: 'تم مسح المقال بنجاح',
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
    </script>

@endsection
