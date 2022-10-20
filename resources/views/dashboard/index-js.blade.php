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

            let tableSelesai = $('#selesai').DataTable({
                order : ['0','asc'],
                search: {
                    return: true,
                },
            });

            let data = [10,23,45,54,87,89,32,56,43,50,60,12];

            $.ajax({
                url: '{{ route('get-grafik') }}',
                method: 'GET',
                dataType: 'json',
                processData: false,
                contentType: false,
                // beforeSend: function(){
                //     console.log(data);
                // },
                success: function (res) {
                    console.log(res.data_po);
                    let dataGrafik = Object.keys(res.data_po);

                    const labels = [
                        '',
                        'January',
                        'February',
                        'March',
                        'April',
                        'May',
                        'June',
                        'July',
                        'August',
                        'September',
                        'October',
                        'November',
                        'December',
                    ];

                    data = new Array(12);
                    for (let index = 1; index <= dataGrafik.length; index++) {
                        if (res.data_po[index].length != 0){
                            let sum = res.data_po[index].reduce((a, b) => a + b, 0)
                            data[index] = sum;
                        } else {
                            data[index] = 0;
                        }
                    }
                    dataChart = {
                        labels: labels,
                        datasets: [
                            {
                                label: 'PO Pengeluaran',
                                // backgroundColor: 'rgb(255, 99, 132)',
                                borderColor: 'rgb(255, 99, 132)',
                                borderWidth: 2,
                                offsetGridLines: true,
                                data: data,
                            }
                        ]
                    };
                    const config = {
                        type: 'line',
                        data: dataChart,
                        options: {}
                    };

                    const myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                    );
                }
            });
            // var GetChartData = function () {
                
            // };
        });
    </script>
@stop