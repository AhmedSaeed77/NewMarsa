@extends('layout.metronic')

@section('content')

<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet p-5">
<div class="kt-portlet p-2">
    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
        <thead>
            <tr>
                <th>ID </th>
                <th>Code </th>
                <th>User Name </th>
                <th>User Phone </th>
                <th>User Email </th>
                <th>Total Price </th>
                <th>From </th>
                <th>To </th>
                <th>Adult Number </th>
                <th>child Number </th>
                <th> Infant Number </th>
                <th>Payment Method </th>
                <th>Pickup Date </th>
                <th>Pickup Time </th>
                <th>Cancel</th>
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
    {{-- <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"> </script> --}}
    @include('vue')
    <script>
        var KTDatatablesDataSourceAjaxServer = function() {
            var initTable1 = function() {
                var i=1;
                var table = $('#kt_table_1');

                // begin first table
                table.DataTable({
                    dom: 'Bfrtip',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('transportingbookings.transportingbookingsDatatablerefund') }}",
                        data: function(d) {
                            d.title = $('#title').val();
                            d.owner = $('#owner').val();
                        }
                    },
                    columns: [{
                        data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false
                        },
                        {
                            data: 'code'
                        },
                        {
                            data: 'user_name'
                        },
                        {
                            data: 'whatsapp'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: 'total_price'
                        },
                        {
                            data: 'from'
                        },
                        {
                            data: 'to'
                        },
                        {
                            data: 'adult_num'
                        },
                        {
                            data: 'child_num'
                        },
                        {
                            data: 'infant_num'
                        },
                        {
                            data: 'payment_method'
                        },
                    
                        {
                            data: 'pickup_date'
                        },
                        {
                            data: 'pickup_time'
                        },
                        {
                            data: 'cancel'
                        },
                        {
                            data: 'action'
                        }
                    ],
                    buttons: [
                        {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [0, 1, 2, 3, 5, 6, 7, 8, 9, 10]
                }},
                                    
                                    {
                                        extend : "excel",
                                        text: 'Excel',
                                        orientation : 'landscape',
                                        exportOptions: {
                                                columns: [ 0, 1, 2,3,5,6,7,8,9,10 ]
                                            }
                                    },
                                    {
                                        extend : "pdf",
                                        text: 'PDF',
                                        orientation : 'landscape',
                                        exportOptions: {
                                                columns: [ 0, 1, 2,3,5,6,7,8,9,10 ]
                                            }
                                    },
                            {
                extend: 'colvis',
                exportOptions: {
                    columns: [0, 1, 2, 3, 5, 6, 7, 8, 9, 10]
                }
                            
            }
                            
                           

                                ],
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
                        title: 'Are you sure you want to mark this transport as refunded',

                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Confirm !'
                    }).then((result) => {

                        if (result.isConfirmed) {
                            console.log('done')
                            $.ajax({
                                type: 'post',
                                url: "{{ route('transportingbookings.refundtransportingbookings') }}",
                                data: {
                                    '_token': "{{ csrf_token() }}",
                                    'id': value,
                                },
                                success: (response) => {
                                    console.log(response);
                                    if (response) {
                                        Swal.fire({
                                            position: 'top-center',
                                            icon: 'success',
                                            title: 'Marked as refunded',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                        console.log('hi');
                                        location.reload();
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