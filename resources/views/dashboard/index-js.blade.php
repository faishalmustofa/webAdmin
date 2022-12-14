@section('css')
 <style>
    .card-header>.card-tools {
        float: left;
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
                    {data: 'keterangan', name: 'keterangan', searchable:false},
                    {data: 'status', name: 'status', searchable:false},
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
                    {data: 'keterangan', name: 'keterangan', searchable:false},
                    {data: 'status', name: 'status', searchable:false},
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

            let dataTableSelesai = $('#selesai').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax: {
                    url     : '{!! URL::route("datatable.sppm.selesai") !!}',
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
                    {data: 'keterangan', name: 'keterangan', searchable:false},
                    {data: 'status', name: 'status', searchable:false},
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
        });
    </script>
@stop