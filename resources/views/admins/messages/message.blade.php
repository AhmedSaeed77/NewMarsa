@extends('layout.metronic')

@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Messages</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a  class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Inbox</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
           
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Inbox App - Messages -->
                <div class="d-flex flex-column flex-lg-row">
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                        <!--begin::Card-->
                        <div class="card">
                            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                <!--begin::Actions-->
                                <div class="d-flex flex-wrap gap-2">
                                    <!--begin::Checkbox-->
                                    <p>All Messages</p>
                                </div>
                                <!--end::Actions-->
                                <!--begin::Actions-->
                                
                                <!--end::Actions-->
                            </div>
                            <div class="card-body p-0">
                                <!--begin::Table-->
                                <table class="table table-hover table-row-dashed fs-6 gy-5 my-0" id="kt_inbox_listing">
                                    <!--begin::Table head-->
                                    <thead class="d-none">
                                        <tr>
                                            <th>Checkbox</th>
                                            <th>Email</th>
                                            <th>Author</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        @foreach($messages as $msg)
                                        <tr>
                                            <td class="ps-9">
                                                <!--begin::Checkbox-->
                                                
                                                    <button type="submit" onclick="deleteFunction({{ $msg->id }})"
                                                        class="btn btn-sm btn-danger flex-shrink-0" style="margin-left: auto;">
                                                        Delete
                                                    </button>
                                                
                                                <!--end::Checkbox-->
                                            </td>
                                            <td class="w-150px w-md-175px">
                                                <a class="d-flex align-items-center text-dark">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px me-3">
                                                       
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Name-->
                                                    <span class="fw-semibold">{{$msg->email}}</span>
                                                    <!--end::Name-->
                                                </a>
                                            </td>
                                           
                                            <!--begin::Author-->
                                            <td class="w-150px w-md-175px">
                                                <a class="d-flex align-items-center text-dark">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px me-3">
                                                       
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Name-->
                                                    <span class="fw-semibold">{{$msg->name}}</span>
                                                    <!--end::Name-->
                                                </a>
                                            </td>
                                            <!--end::Author-->
                                            <!--begin::Title-->
                                            <td>
                                                <div class="text-dark mb-1">
                                                    <!--begin::Heading-->
                                                    <a  class="text-dark">
                                                        <span class="fw-bold">{{$msg->subject}}</span>
                                                        <span class="fw-bold d-none d-md-inine">-</span>
                                                        <span class="d-none d-md-inine text-muted"></span>
                                                    </a>
                                                    <!--end::Heading-->
                                                </div>
                                                <!--begin::Badges-->
                                                <div class="badge badge-light-danger">new</div>
                                                <!--end::Badges-->
                                            </td>
                                            <!--end::Title-->
                                            <!--begin::Date-->
                                            <td class="w-100px text-end fs-7 pe-9">
                                                <span class="fw-semibold text-muted">{{$msg->created_at}}</span>
                                            </td>
                                            <!--end::Date-->
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Inbox App - Messages -->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    <!--begin::Footer-->
    <div id="kt_app_footer" class="app-footer">
        <!--begin::Footer container-->
        <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted fw-semibold me-1">2022&copy;</span>
                
            </div>
            <!--end::Copyright-->
            <!--begin::Menu-->
            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                <li class="menu-item">
                    <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                </li>
                <li class="menu-item">
                    <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                </li>
                <li class="menu-item">
                    <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
                </li>
            </ul>
            <!--end::Menu-->
        </div>
        <!--end::Footer container-->
    </div>
    <!--end::Footer-->
</div>
@endsection
@section('js')
    <!--begin::Page Vendors(used by this page) -->

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
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d34',
              
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('message.deletemessage') }}",
                            data: {
                                '_token': "{{ csrf_token() }}",
                                'id': id1,
                            },
                            success: (response) => {
                                if (response) {
                                    //console.log(response);
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
