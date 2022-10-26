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
                    url     : '{!! URL::route("datatable.sppm") !!}',
                    type    : 'GET',
                    dataType: 'json',
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {data: 'nama_pembuat', name: 'nama_pembuat'},
                    {data: 'nama_project', name: 'nama_project'},
                    {data: 'no_project', name: 'no_project'},
					{data: 'no_sppm', name: 'no_sppm'},
                    {data: 'tgl_sppm', name: 'tgl_sppm'},
                    {data: 'no_spk', name: 'no_spk', searchable:false},
                    {data: 'uraian', name: 'uraian', searchable:false},
                    {data: 'kode_material', name: 'kode_material', searchable:false},
                    {data: 'spesifikasi', name: 'spesifikasi', searchable:false},
                    {data: 'satuan', name: 'satuan', searchable:false},
                    {data: 'qty_sppm', name: 'qty_sppm', searchable:false},
                    {data: 'hpp', name: 'hpp', searchable:false},
                    {data: 'qty_hpp', name: 'qty_hpp', searchable:false},
                    {data: 'target_kedatangan', name: 'target_kedatangan', searchable:false},
                    {data: 'file_teknis', name: 'file_teknis', searchable:false},
                    {data: 'status', name: 'status', searchable:false},
                    {data: 'action', name: 'action'},
                ],
                order : ['0','asc'],
                dom: 'Blfrtip',
                responsive: false,
                buttons: ['csv', 'excel', 'pdf', 'print'],
            });
        });
        
    </script>
@stop
