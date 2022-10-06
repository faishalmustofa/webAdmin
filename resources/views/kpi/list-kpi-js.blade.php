@section('js')
    <script>
        $(document).ready(function () {
            
            let tableDiproses = $('#diproses').DataTable({
                buttons: [ 'copy', 'csv', 'excel' ],
                order : ['0','asc'],
                search: {
                    return: true,
                },
            });
        });
        
    </script>
@stop
