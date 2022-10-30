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
            
            let dataTableUsers = $('#users').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax: {
                    url     : '{!! URL::route("datatable.users") !!}',
                    type    : 'GET',
                    dataType: 'json',
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {data: 'nama_user', name: 'nama_user'},
                    {data: 'status', name: 'status'},
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