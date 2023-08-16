@extends('layout.metronic')

@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet p-5">
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
                    
                </div>
               
                
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                        <tr>
                            <th style="margin-left:30px;">ID </th>
                          <th>Code </th>
                            <th>User Name </th>
                            <th>User Phone </th>
                            <th>User Email </th>
                            <th>Pick up </th>
                            <th>Drop off </th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Total Price </th>
                            <th>Car type </th>
                            <th>Car count </th>
                            <th>Adult Number </th>
                            <th>child Number </th>
                            <th>Infant Number </th>
                            <th>Payment Method </th>
                            <th>Payment Status </th>
                            <th>Notes </th>
                            <th>Cancel </th>
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
    {{-- <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script> --}}
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
                        url: "{{ route('transportingbookings.cashDatatable') }}",
                        data: function(d) {
                            d.title = $('#title').val();
                            d.month = $('#month').val();
                            d.method = $('#method').val();
                            d.type = $('#type').val();
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
                            data: 'payment_status'
                        },
                        {
                            data: 'notes'
                        },
                        {
                            data: 'cancel'
                        },
                       
                        {
                            data: 'action'
                        },
                    ],
                    buttons: [
                        {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [0, 1, 2, 3, 5, 6, 7, 8, 9, 10,11]
                }},

                        {
                            extend: "excel",
                            text: 'Excel',
                            orientation: 'landscape',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 5, 6, 7, 8, 9, 10,11]
                            }
                        },
                        {
                            extend: "pdf",
                            text: 'PDF',
                            orientation: 'landscape',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 5, 6, 7, 8, 9, 10,11]
                            }
                        },
                        {
                extend: 'colvis',
                exportOptions: {
                    columns: [0, 1, 2, 3, 5, 6, 7, 8, 9, 10,11]
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
                $('#type').change(function() {
                    
                    table.DataTable().draw();
                });
                $('#kt_table_1 tbody').on('click', '.delete', function() {
                    var value = $(this).attr("value");
                    console.log(value)
                    Swal.fire({
                        title: ' Are you sure you want to delete this booking  ',

                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'confirm !'
                    }).then((result) => {

                        if (result.isConfirmed) {
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
                                            title: 'Booking is deleted',
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