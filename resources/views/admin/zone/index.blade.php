@extends('layout.metronic');

@section('content')
<div class="card-title d-flex align-items-center flex-row-reverse">

    {{-- <a href="{{route('zone.create')}}" class="btn btn-primary" style="margin-right: 50px;margin-top:30px" id="kt_project_settings_submit">Add zone</a> --}}

   
</div>
    <div>
        <a href="{{route('zone.create')}}" class="btn btn-primary" id="kt_project_settings_submit">Add Zone</a>
    </div>
    <div class="kt-portlet p-5">
        
        <div class="card-title d-flex align-items-center">
            
        </div>
        <table class="table table-striped table-row-bordered gy-5 gs-7" id="kt_table_1">
            <thead>
                <tr>
                    <th>ID </th>
                    <th>Name </th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        

    </div>
@endsection
@section('js')
{{-- <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"> </script> --}}
    <script src="{{ URL::asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
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
                    ajax: {
                        url: "{{ route('zone.datatable') }}",
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
                            data: 'action'
                        }
                    ],
                    buttons: [
                        {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [0, 1]
                }},
                                    
                                    {
                                        extend : "excel",
                                        text: 'Excel',
                                        orientation : 'landscape',
                                        exportOptions: {
                                                columns: [ 0, 1 ]
                                            }
                                    },
                                    {
                                        extend : "pdf",
                                        text: 'PDF',
                                        orientation : 'landscape',
                                        exportOptions: {
                                                columns: [ 0, 1]
                                            }
                                    },
                            {
                extend: 'colvis',
                exportOptions: {
                    columns: [0, 1]
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
                        title: 'Are you sure you want to delete?',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'confirm !'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            console.log('done')
                            $.ajax({
                                type: 'post',
                                url: "{{ route('zone.delete') }}",
                                data: {
                                    '_token': "{{ csrf_token() }}",
                                    'id': value,
                                },
                                success: (response) => {
                                    if (response) {
                                        Swal.fire({
                                            position: 'top-center',
                                            icon: 'success',
                                            title: 'Zone deleted',
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