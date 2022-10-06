@section('css')
 <style>
    .table thead th {
        vertical-align: middle;
        text-align: center;
    }
    .table tbody td {
        vertical-align: middle;
        text-align: center;
    }
    table.dataTable thead .sorting:before, 
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting_asc:before, 
    table.dataTable thead .sorting_asc:after {
        display: none;
    }
 </style>
@stop
@section('js')
    <script>
        $(document).ready(function () {
            let dataTableDiproses = $('#diproses').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax: {
                    url     : '{!! URL::route("datatable.dsm") !!}',
                    type    : 'GET',
                    dataType: 'json',
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {data: 'id_pemasok', name: 'id_pemasok'},
                    {data: 'supplier', name: 'supplier'},
					{data: 'nama_barang', name: 'nama_barang'},
                    {data: 'alamat', name: 'alamat', searchable:false},
                    {data: 'pic', name: 'pic', searchable:false},
                    {data: 'no_telp', name: 'no_telp', searchable:false},
                    {data: 'no_kantor', name: 'no_kantor', searchable:false},
                    {data: 'email', name: 'email', searchable:false},
                    {data: 'file_prakualifikasi', name: 'file_prakualifikasi', searchable:false},
                    {data: 'action', name: 'action'},
                ],
                order : ['0','asc'],
                dom: '<"row"<"col-md-3"f><"#date-filter.col-md-3 filter-block"><"#order-status-filter.col-md-2 filter-block"><"#payment-method-filter.col-md-2 filter-block"><"#payment-status-filter.col-md-2 filter-block">>rt<"float-left"li><"float-right"p>',
                responsive: false,
                buttons: [
                    {
                        text: '<i class="fa fa-plus-circle"></i> Tambah DSM',
                        action: function ( e, dt, node, config ) {
                            window.location = '{{ route("dsm") }}';
                        }
                    }
                ],
            });
            
            // let tableDiproses = $('#diproses').DataTable({
            //     buttons: [ 'copy', 'csv', 'excel' ],
            //     order : ['0','asc'],
            //     search: {
            //         return: true,
            //     },
            // });
        });
        
    </script>
@stop
