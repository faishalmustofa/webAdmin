@section('js')
    <script>
        $(document).ready(function () {
            
            let dataTableDiproses = $('#diproses').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax: {
                    url     : '{!! URL::route("datatable.po") !!}',
                    type    : 'GET',
                    dataType: 'json',
                    success: function(res){
                        console.log(res);
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {data: 'nama_project', name: 'nama_project'},
                    {data: 'no_project', name: 'no_project'},
                    {data: 'no_sppm', name: 'no_sppm'},
                    {data: 'no_po', name: 'no_po'},
                    {data: 'tgl_po', name: 'tgl_po', 'width': '100px'},
                    {data: 'supplier', name: 'supplier'},
                    {data: 'id_supplier', name: 'id_supplier'},
					{data: 'hri', name: 'hri'},
                    {data: 'qty_hri', name: 'qty_hri', searchable:false},
                    {data: 'efisiensi', name: 'efisiensi', searchable:false},
                    {data: 'ri_ked', name: 'ri_ked', searchable:false},
                    {data: 'metode_pembayaran', name: 'metode_pembayaran', searchable:false},
                    {data: 'tempo_pembayaran', name: 'tempo_pembayaran', searchable:false},
                    {data: 'metode_penyerahan_barang', name: 'metode_penyerahan_barang', searchable:false},
                    {data: 'lokasi_penyerahan_barang', name: 'lokasi_penyerahan_barang', searchable:false},
                    {data: 'dokumen_kontrak', name: 'dokumen_kontrak', searchable:false},
                    {data: 'print', name: 'print'},
                    {data: 'action', name: 'action'},
                ],
                order : ['0','asc'],
                dom: 'Blfrtip',
                responsive: false,
                autoWidth: false,
                buttons: ['csv', 'excel', 'pdf', 'print'],
            });
        });
        
    </script>
@stop
