@extends('layout.metronic')

@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet p-5">
            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-sm-6 col-xl-3 mb-xl-10">
                    <!--begin::Card widget 2-->
                    <div class="card h-lg-100">
                        <!--begin::Body-->
                        <div class="card-body d-flex justify-content-between flex-column">
                            <!--begin::Icon-->
                            <div class="m-0">
                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/communication/com014.svg-->
                                
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Icon-->
                            <!--begin::Section-->
                            <div class="d-flex flex-column my-7 text-center">
                                <!--begin::Number-->
                                <div class="m-2">
                                    <span class="fw-semibold fs-5 text-gray-400 ">Ravenue from paypal</span>
                                </div>
                                <span
                                    class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $paypal }}$</span>
                                <!--end::Number-->
                                <!--begin::Follower-->
                                
                                <!--end::Follower-->
                            </div>

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card widget 2-->
                </div>
                <div class="col-sm-6 col-xl-3 mb-xl-10">
                    <!--begin::Card widget 2-->
                    <div class="card h-lg-100">
                        <!--begin::Body-->
                        <div class="card-body d-flex justify-content-between align-items-center flex-column">
                            <!--begin::Icon-->
                            <div class="m-0">
                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/communication/com014.svg-->
                                
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Icon-->
                            <!--begin::Section-->
                            <div class="d-flex flex-column my-7">
                                <!--begin::Number-->
                                <div class="m-2">
                                    <span class="fw-semibold fs-5 text-gray-400">Ravenue from tap</span>
                                </div>
                                <span
                                    class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $tap }}$</span>
                                <!--end::Number-->
                                <!--begin::Follower-->
                                
                                <!--end::Follower-->
                            </div>

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card widget 2-->
                </div>
                <div class="col-sm-6 col-xl-3 mb-xl-10">
                    <!--begin::Card widget 2-->
                    <div class="card h-lg-100">
                        <!--begin::Body-->
                        <div class="card-body d-flex justify-content-between align-items-center flex-column">
                            <!--begin::Icon-->
                            <div class="m-0">
                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/communication/com014.svg-->
                                
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Icon-->
                            <!--begin::Section-->
                            <div class="d-flex flex-column my-7">
                                <!--begin::Number-->
                                <div class="m-2">
                                    <span class="fw-semibold fs-5 text-gray-400">Ravenue from cash</span>
                                </div>
                                <span
                                    class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $cash }}$</span>
                                <!--end::Number-->
                                <!--begin::Follower-->
                                
                                <!--end::Follower-->
                            </div>

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card widget 2-->
                </div>
                <div class="col-sm-6 col-xl-3 mb-xl-10">
                    <!--begin::Card widget 2-->
                    <div class="card h-lg-100">
                        <!--begin::Body-->
                        <div class="card-body d-flex justify-content-between align-items-center flex-column">
                            <!--begin::Icon-->
                            <div class="m-0">
                                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-24-050857/core/html/src/media/icons/duotune/communication/com014.svg-->
                                
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Icon-->
                            <!--begin::Section-->
                            <div class="d-flex flex-column my-7">
                                <!--begin::Number-->
                                <div class="m-2">
                                    <span class="fw-semibold fs-5 text-gray-400">Total ravenue</span>
                                </div>
                                <span
                                    class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $cash + $paypal + $tap }}$</span>
                                <!--end::Number-->
                                <!--begin::Follower-->
                                
                                <!--end::Follower-->
                            </div>

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card widget 2-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
              
              
                <!--end::Col-->
            </div>
            <div class="kt-portlet p-2">
                <div class="row">
                    <div class="col">
                        <label><strong>choose month:</strong></label>
                        <select class="form-control" style="width: 250px" name="month" id="month">
                            <option selected="true" value="">Choose Month</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">Septemper</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>

                    </div>
                    <div class="col">
                        <label><strong>choose payment method:</strong></label>
                        <select class="form-control" style="width: 250px" name="method" id="method">
                            <option selected="true" value="">Choose Payment method</option>
                            <option value="cash">Cash</option>
                            <option value="paypal">Paypal</option>
                            <option value="tap">Tap</option>
                        </select>
                    </div>
                </div>
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                        <tr>
                            <th style="margin-left:30px;">ID </th>
                            <th>User Name </th>
                            <th>User Phone </th>
                            <th>User Email </th>
                            <th>User Whatsapp </th>
                            <th>Pick up </th>
                            <th>Drop off </th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Total Price </th>
                            <th>Car type </th>
                            <th>Car count </th>
                            <th>Payment Status </th>
                            <th>Payment Method </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!--begin::Page Vendors(used by this page) -->

    <script src="{{ URL::asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('js/sweetalert2@11.js') }}"></script>
    <script src="{{ URL::asset('js/sweetalert2.all.js') }}"></script>
    @include('vue')
    <script>
        var KTDatatablesDataSourceAjaxServer = function() {
            var initTable1 = function() {
                var table = $('#kt_table_1');

                // begin first table
                table.DataTable({
                    dom: 'Bfrtip',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    searching:false,
                    ajax: {
                        url: "{{ route('transportingbookings.transportingbookingsDatatable') }}",
                        data: function(d) {
                            d.title = $('#title').val();
                            d.month = $('#month').val();
                            d.method = $('#method').val();
                        
                        }
                    },
                    columns: [{
                        data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false
                        },

                        {
                            data: 'user_name'
                        },
                        {
                            data: 'user_phone'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: 'whatsapp'
                        },
                        {
                            data: 'from'
                        },
                        {
                            data: 'to'
                        },
                        {
                            data: 'pickup_date'
                        },
                        {
                            data: 'pickup_time'
                        },
                        {
                            data: 'total_price'
                        },
                        {
                            data: 'car_type'
                        },
                        {
                            data: 'car_count'
                        },
                        {
                            data: 'payment_method'
                        },
                        {
                            data: 'payment_method'
                        },

                        {
                            data: 'action'
                        },
                    ],
                    buttons: [
                        {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [0, 1, 2, 3, 5, 6, 7,8,9,10,11,12]
                }},

                        {
                            extend: "excel",
                            text: 'Excel',
                            orientation: 'landscape',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 5, 6, 7,8,9,10,11,12]
                            }
                        },
                        {
                            extend: "pdf",
                            text: 'PDF',
                            orientation: 'landscape',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 5, 6, 7,8,9,10,11,12]
                            }
                        },
                        {
                extend: 'colvis',
                exportOptions: {
                    columns: [0, 1, 2, 3, 5, 6, 7,8,9,10,11,12]
                }
                            
            }
                        

                    ],
                });
                $('#name').keyup(function() {
                    table.DataTable().draw();
                });
                $('#month').change(function() {
                    
                    table.DataTable().draw();
                });
                $('#method').change(function() {
                    
                    table.DataTable().draw();
                });
                $('#kt_table_1 tbody').on('click', '.delete', function() {
                    var value = $(this).attr("value");
                    console.log(value)
                    Swal.fire({
                        title: ' سيتم مسح الحجز بكافة سنداته ان وجد   ',

                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'تأكيد !'
                    }).then((result) => {

                        if (result.isConfirmed) {
                            ///////
                            console.log('done')
                            $.ajax({
                                type: 'post',
                                url: "{{ route('transportingbookings.deleteactivitytransportingbookings') }}",
                                data: {
                                    '_token': "{{ csrf_token() }}",
                                    'id': value,
                                },
                                success: (response) => {
                                    if (response) {
                                        Swal.fire({
                                            position: 'top-center',
                                            icon: 'success',
                                            title: 'تم مسح الحجز بنجاح',
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
