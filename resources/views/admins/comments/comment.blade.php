@extends('layout.metronic')

@section('content')
<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0" style="margin-left: 10px; margin-top:10px!important; margin-bottom:-11px!important;"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/communication/com007.svg-->
    <span class="svg-icon svg-icon-muted svg-icon-2hx">comments<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path opacity="0.3" d="M8 8C8 7.4 8.4 7 9 7H16V3C16 2.4 15.6 2 15 2H3C2.4 2 2 2.4 2 3V13C2 13.6 2.4 14 3 14H5V16.1C5 16.8 5.79999 17.1 6.29999 16.6L8 14.9V8Z" fill="currentColor"/>
    <path d="M22 8V18C22 18.6 21.6 19 21 19H19V21.1C19 21.8 18.2 22.1 17.7 21.6L15 18.9H9C8.4 18.9 8 18.5 8 17.9V7.90002C8 7.30002 8.4 6.90002 9 6.90002H21C21.6 7.00002 22 7.4 22 8ZM19 11C19 10.4 18.6 10 18 10H12C11.4 10 11 10.4 11 11C11 11.6 11.4 12 12 12H18C18.6 12 19 11.6 19 11ZM17 15C17 14.4 16.6 14 16 14H12C11.4 14 11 14.4 11 15C11 15.6 11.4 16 12 16H16C16.6 16 17 15.6 17 15Z" fill="currentColor"/>
    </svg>
    </span>
    <!--end::Svg Icon--></h1>
{{-- <div class="card"> --}}
    <!--begin::Body-->
    <div class="card-body p-lg-20">
        @if(count($comments) > 0)
        @foreach($comments as $comment)
<div class="card mb-5 mb-xxl-8">
    <!--begin::Body-->
    <div class="card-body pb-0">
        <!--begin::Header-->
        <div class="d-flex align-items-center mb-5">
            <!--begin::User-->
            <div class="d-flex align-items-center flex-grow-1">
                <!--begin::Avatar-->
                <div class="symbol symbol-45px me-5">
                    <img src="{{ asset('images/blogs/' .$comment->blog->image) }}" alt="" />
                    <p>{{$comment->blog->title_en}}</p>
                </div>
            </div>
            <div class="card-footer d-flex flex-stack pt-0">
                <button type="submit" onclick="deleteFunction({{ $comment->id }})"
                    class="btn btn-sm btn-danger mx-2 flex-shrink-0">Delete</button>
                 {{-- <a class="btn btn-dark mb-0 mx-2"  href="{{route('comment.editcomment',$comment->id)}}" role="button">Edit</a> --}}
            </div>
        </div>
        <!--end::Header-->  
        <!--begin::Post-->
        <div class="mb-5">
            <!--begin::Text-->
            <p class="text-gray-800 fw-normal mb-5">{{$comment->content}}</p>
            <!--end::Text-->
           {{-- adc --}}
        </div>
        
        {{-- <form class="position-relative mb-6">
            <textarea class="form-control border-0 p-0 pe-10 resize-none min-h-25px" data-kt-autosize="true" rows="1" placeholder="Reply.."></textarea>
           
        </form> --}}
        <!--edit::Reply input-->
    </div>
    <!--end::Body-->
</div>
@endforeach
@else
<h2>no comments yet</h2>
@endif

    </div>
{{-- </div> --}}
@endsection
@section('js')
    <!--begin::Page Vendors(used by this page) -->

    <script src="{{ URL::asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('js/sweetalert2@11.js') }}"></script>
    <script src="{{ URL::asset('js/sweetalert2.all.js') }}"></script>
    <script>
        function deleteFunction(id) {
            const id1 = id;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                size: '100px',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        url: "{{ route('comment.deletecomment') }}",
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
    @include('vue')
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
                        url: "{{ route('comment.commentDatatable') }}",
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
                            data: 'blog_id'
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
                        title: ' سيتم مسح التعليق بكافة سنداته ان وجد   ',

                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'تأكيد !'
                    }).then((result) => {

                        if (result.isConfirmed) {
                            console.log('done')
                            $.ajax({
                                type: 'post',
                                url: "{{ route('comment.deletecomment') }}",
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
    </script> --}}
@endsection
