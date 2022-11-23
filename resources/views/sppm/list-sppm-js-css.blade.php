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
    .dt-buttons {
        margin-bottom: 10px;
    }

    .notify-container-belum-diproses {
        position: relative;
        display: inline-block;
        margin-top: 10px;
    }
    .notify-bubble-belum-diproses {
        position: absolute;
        top: -5px;
        right: 0;
        padding: 2px 5px 2px 6px;
    }

    .notify-container-diproses {
        position: relative;
        display: inline-block;
        margin-top: 10px;
    }
    .notify-bubble-diproses {
        position: absolute;
        top: -5px;
        right: -10px;
        padding: 2px 5px 2px 6px;
    }

    .notify-container-selesai {
        position: relative;
        display: inline-block;
        margin-top: 10px;
    }
    .notify-bubble-selesai {
        position: absolute;
        top: -5px;
        right: -18px;
        padding: 2px 5px 2px 6px;
    }
 </style>
@stop
@section('js')
    <script>
        $(document).ready(function () {
            let dataTableBelumDiproses = $('#belum_diproses').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax: {
                    url     : '{!! URL::route("datatable.sppm.belum.diproses") !!}',
                    type    : 'GET',
                    dataType: 'json',
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {data: 'nama_pembuat', name: 'nama_pembuat'},
                    {data: 'nama_project', name: 'nama_project'},
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
                    {data: 'keterangan', name: 'keterangan', searchable:false},
                    {data: 'status', name: 'status', searchable:false},
                    {data: 'print', name: 'print'},
                    {data: 'action', name: 'action'},
                ],
                order : ['0','asc'],
                dom: 'Blfrtip',
                responsive: false,
                buttons: ['copy', 'excel', 'csv',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL'
                    }, 'print'
                ]
            });

            let dataTableDiproses = $('#diproses').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax: {
                    url     : '{!! URL::route("datatable.sppm.diproses") !!}',
                    type    : 'GET',
                    dataType: 'json',
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {data: 'nama_pembuat', name: 'nama_pembuat'},
                    {data: 'nama_project', name: 'nama_project'},
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
                    {data: 'keterangan', name: 'keterangan', searchable:false},
                    {data: 'status', name: 'status', searchable:false},
                    {data: 'print', name: 'print'},
                    {data: 'action', name: 'action'},
                ],
                order : ['0','asc'],
                dom: 'Blfrtip',
                responsive: false,
                buttons: ['copy', 'excel', 'csv',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL'
                    }, 'print'
                ]
            });

            let dataTableSelesai = $('#selesai').DataTable({
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
                    {data: 'keterangan', name: 'keterangan', searchable:false},
                    {data: 'status', name: 'status', searchable:false},
                    {data: 'print', name: 'print'},
                    {data: 'action', name: 'action'},
                ],
                order : ['0','asc'],
                dom: 'Blfrtip',
                responsive: false,
                buttons: ['copy', 'excel', 'csv',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL'
                    }, 'print'
                ]
            });
        });
        
    </script>
@stop
