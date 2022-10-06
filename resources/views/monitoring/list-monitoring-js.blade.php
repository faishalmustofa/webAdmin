@section('js')
    <script>
        $(document).ready(function () {
            
            let tableDiproses = $('#diproses').DataTable({
                buttons: [ 'copy', 'csv', 'excel' ],
                order : ['0','asc'],
                search: {
                    return: true,
                },
                aoColumnDefs: [
                    { bSortable: false, aTargets: [ 0, 1, 2, 3 ] }, 
                    // { "bSearchable": false, "aTargets": [ 0, 1, 2, 3 ] }
                ]
            });
        });
        
    </script>
@stop
