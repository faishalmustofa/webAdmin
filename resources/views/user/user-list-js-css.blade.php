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