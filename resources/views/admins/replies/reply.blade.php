@extends('layout.metronic')

@section('content')
<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0" style="margin-left: 10px; margin-top:10px!important;
margin-bottom:-11px!important;"><!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/communication/com007.svg-->
    <span class="svg-icon svg-icon-muted svg-icon-2hx">Replies<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path opacity="0.3" d="M8 8C8 7.4 8.4 7 9 7H16V3C16 2.4 15.6 2 15 2H3C2.4 2 2 2.4 2 3V13C2 13.6 2.4 14 3 14H5V16.1C5 16.8 5.79999 17.1 6.29999 16.6L8 14.9V8Z" fill="currentColor"/>
    <path d="M22 8V18C22 18.6 21.6 19 21 19H19V21.1C19 21.8 18.2 22.1 17.7 21.6L15 18.9H9C8.4 18.9 8 18.5 8 17.9V7.90002C8 7.30002 8.4 6.90002 9 6.90002H21C21.6 7.00002 22 7.4 22 8ZM19 11C19 10.4 18.6 10 18 10H12C11.4 10 11 10.4 11 11C11 11.6 11.4 12 12 12H18C18.6 12 19 11.6 19 11ZM17 15C17 14.4 16.6 14 16 14H12C11.4 14 11 14.4 11 15C11 15.6 11.4 16 12 16H16C16.6 16 17 15.6 17 15Z" fill="currentColor"/>
    </svg>
    </span>
    <!--end::Svg Icon--></h1>
    <!--begin::Body-->
    <div class="card-body p-lg-20">
        @foreach($blogs as $blog)
        <div class="card mb-5 mb-xxl-8">
            <!--begin::Body-->
            <div class="card-body pb-0">
                <!--begin::Header-->
                <div class="d-flex align-items-center mb-5">
                    <!--begin::User-->
                    <div class="d-flex align-items-center flex-grow-1">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-45px me-5">
                            <img src="{{ asset('images/blogs/' .$blog->image) }}" alt="" />
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Info-->
                        <div class="d-flex flex-column">
                            <p  class="text-gray-900 text-hover-primary fs-6 fw-bold">{{$blog->title}}  ({{count(\App\Models\Comment::where('blog_id',$blog->id)->get())}})</p>
                            <span class="text-gray-400 fw-bold">
                                <div class="mb-5">
                                    <!--begin::Text-->
                                    <p class="text-gray-800 fw-normal mb-5"></p>
                                    <!--end::Text-->
                                    <!--begin::Toolbar-->
                                   
                                    {{-- @foreach ( \App\Models\Comment::where('blog_id',$blog->id)->get() as $comment ) --}}
                                </div>

                            </span>
                            
                        </div>
                        
                        <!--end::Info-->
                    </div>
                    
                    <div class="card-footer d-flex flex-stack pt-0">
                        <button type="submit" onclick="deleteFunction2({{ $blog->id }})"
                            class="btn btn-sm btn-danger flex-shrink-0">Delete</button>
                      
                    </div>
                </div>
                @foreach ( \App\Models\Comment::where('blog_id',$blog->id)->get() as $comment )
                
                <div class="separator mb-4"></div>
                
                <!--end::Separator-->
                <div class="mb-7" style="margin-left: auto ;">
                    
                    <span class="text-gray-400 fw-bold" >{{$comment->content}}   ({{(\App\Models\Reply::where('comment_id',$comment->id)->get()->count())}})<div class="d-flex align-items-center mb-5" style="margin-left: auto;">
                        <button type="button" onclick="deleteFunction({{ $comment->id }})"
                            class="btn btn-sm btn-primary flex-shrink-0 me-9" style="margin-left: auto;">Delete</button>
                    </div>
                </span>
                    <hr>
                    <!--begin::Reply-->
                    @foreach ( \App\Models\Reply::where('comment_id',$comment->id)->get() as $reply )
                    <div class="d-flex mb-5 " >
                        <!--begin::Avatar-->
                        <div class="symbol symbol-45px me-5" >
                            @if($reply->isAdmin == 'true')
                                <img src="{{ asset('images/admin/' .Auth::guard('admin')->user()->image) }}" alt="" />
                            @else
                                <img src="{{ asset('images/users/' .$reply->user->image) }}" alt="" />
                            @endif
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Info-->
                        <div class="d-flex flex-row-fluid justify-content-between" >
                            <div class="d-flex flex-column">
                                <!--begin::Info-->
                                @if($reply->isAdmin == 'true')
                                <div class="d-flex align-items-center flex-wrap mb-1">
                                    <p  class="text-gray-800 text-hover-primary fw-bold me-2">{{Auth::guard('admin')->user()->name}}</p>
                                    <span class="text-gray-400 fw-semibold fs-7"></span>
                                </div>
                                @else
                                <div class="d-flex align-items-center flex-wrap mb-1">
                                    <p  class="text-gray-800 text-hover-primary fw-bold me-2">{{$reply->user->fname}}</p>
                                    <span class="text-gray-400 fw-semibold fs-7"></span>
                                </div>
                                @endif
                                <!--end::Info-->
                                <!--begin::Post-->
                                <span class="text-gray-800 fs-7 fw-normal pt-1">{{$reply->content}}</span>
                                <!--end::Post-->
                            </div>
                            
                            <div class="card-footer d-flex flex-stack pt-0">
                                <button type="submit" onclick="deleteFunction1({{ $reply->id }})"
                                    class="btn btn-sm btn-primary flex-shrink-0" style="margin-left: auto;">
                                    Delete
                                </button>
                            </div>
                        </div>
                        
                        <!--end::Info-->
                        
                    </div>
                    <hr>
                    @endforeach
                </div>
                <form class="position-relative mb-6" action="{{route('reply.addreply',$comment->id)}}" method="post">
                    @csrf
                    <textarea class="form-control border-0 p-0 pe-10 resize-none min-h-25px" data-kt-autosize="true" rows="1" name="reply" placeholder="Reply.." required></textarea>
                    <div class="position-absolute top-0 end-0 me-n5">
                        <span class="btn btn-icon btn-sm btn-active-color-primary pe-0 me-2">
                            <!--begin::Svg Icon | path: icons/duotune/communication/com008.svg-->
                            
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="btn btn-icon btn-sm btn-active-color-primary ps-0">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                            
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary" >Reply</button>
                </form>
               @endforeach
                <!--edit::Reply input-->
            </div>
            <!--end::Body-->
        </div>

@endforeach

    </div>
</div>
@endsection
@section('js')
<script src="{{ URL::asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/sweetalert2@11.js') }}"></script>
        <script src="{{ URL::asset('js/sweetalert2.all.js') }}"></script>
    <!--begin::Page Vendors(used by this page) -->


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
                        url: "{{ route('reply.replyDatatable') }}",
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
                            data: 'comment_id'
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
                        title: ' سيتم مسح الرد بكافة سنداته ان وجد   ',

                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'تأكيد !'
                    }).then((result) => {

                        if (result.isConfirmed) {
                            console.log('done')
                            $.ajax({
                                type: 'post',
                                url: "{{ route('reply.deletereply') }}",
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
                    // Swal.fire(
                    //     'Deleted!',
                    //     'Your file has been deleted.',
                    //     'success'
                    // )
                }
            })
        }
    </script>
     <script>
        function deleteFunction2(id) {
            const id1 = id;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                background:'white',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
              
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
                    // Swal.fire(
                    //     'Deleted!',
                    //     'Your file has been deleted.',
                    //     'success'
                    // )
                }
            })
        }
    </script>
     <script>
        function deleteFunction1(id) {
            const id1 = id;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                background:'white',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
              
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('reply.deletereply') }}",
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
                    // Swal.fire(
                    //     'Deleted!',
                    //     'Your file has been deleted.',
                    //     'success'
                    // )
                }
            })
        }
    </script>
@endsection
