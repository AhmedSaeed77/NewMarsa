@extends('layout.metronic');

@section('content')
    <div  class="kt-portlet p-5">
        <div class="card-title d-flex align-items-center">
            <a href="{{route('hotel.create')}}" class="btn btn-primary" id="kt_project_settings_submit">Add Hotel</a>
        </div>
        
        <!--<table style="" style="text-align: center" class="table table-striped table-dark table-hover" id="kt_table_1">-->
        <table id="kt_datatable_both_scrolls" class="table table-striped table-row-bordered gy-5 gs-7"/>
            <thead>
                <tr class="fw-semibold fs-6 text-gray-800">
                    <th>ID </th>
                    <th>Name </th>
                    <th>Zone </th>
                    <th>Index </th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        

    </div>
@endsection
@section('js')
        <script src="{{ URL::asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/sweetalert2@11.js') }}"></script>
        <script src="{{ URL::asset('js/sweetalert2.all.js') }}"></script>
    @include('vue')
    <script>
        var KTDatatablesDataSourceAjaxServer = function() {
            
            var initTable1 = function() {
                var table = $('#kt_datatable_both_scrolls');
                // begin first table
                table.DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('hotel.datatable') }}",
                        data: function(d) {
                            d.name = $('#name').val();
                            d.owner = $('#owner').val();
                        }
                    },
                    columns: [{
                        data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false
                        },
                        {
                            data: 'name'
                        },
                        {
                            data:'zone'
                        },
                        {
                            data:'indexx'
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
                $('#kt_datatable_both_scrolls tbody').on('click', '.delete', function() {
                    var value = $(this).attr("value");
                    console.log(value)
                    Swal.fire({
                        title: 'Are you sure you want to delete?',
                        showCancelButton: true,
                        background: 'white',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'confirm !'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            console.log('done')
                            $.ajax({
                                type: 'post',
                                url: "{{ route('hotel.delete') }}",
                                data: {
                                    '_token': "{{ csrf_token() }}",
                                    'id': value,
                                },
                                success: (response) => {
                                    if (response) {
                                        Swal.fire({
                                            position: 'top-center',
                                            icon: 'success',
                                            title: 'hotel deleted',
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