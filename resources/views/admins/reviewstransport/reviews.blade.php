@extends('layout.metronic')

@section('content')

<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet p-5">
<div class="kt-portlet p-5">
    
    <table class="table table-striped table-row-bordered gy-5 gs-7" id="kt_table_1">
        <thead>
            <tr>
                <th>ID </th>
                <th>Review </th>
                <th>Rating </th>
                <th>User name </th>
                <th>Action</th>
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
                        url: "{{ route('reviewtransport.reviewDatatable') }}",
                        data: function(d) {
                            d.title = $('#title').val();
                            d.owner = $('#owner').val();
                        }
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'review'
                        },
                        {
                            data: 'rating'
                        },
                        {
                            data: 'user'
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
                        title: ' سيتم مسح الرأى بكافة سنداته ان وجد   ',

                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'تأكيد !'
                    }).then((result) => {

                        if (result.isConfirmed) {
                            console.log('done')
                            $.ajax({
                                type: 'post',
                                url: "{{ route('reviewtransport.deletereview') }}",
                                data: {
                                    '_token': "{{ csrf_token() }}",
                                    'id': value,
                                },
                                success: (response) => {
                                    if (response) {
                                        Swal.fire({
                                            position: 'top-center',
                                            icon: 'success',
                                            title: 'تم مسح الرأى بنجاح',
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