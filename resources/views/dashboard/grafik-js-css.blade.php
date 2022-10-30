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

            $('#filter').on('change',function(e){

                e.preventDefault();
                let $this = $(this);
                let url = '{{ $urlSubmit }}';
                let form_selector = "form#filterGrafik";
                let form = $(form_selector).serializeArray();

                let request = new FormData();

                request.append('_token', form[0].value );
                request.append('filter', this.value );

                $.ajax({
                    type: "POST",
                    url: url,
                    data: request,
                    processData: false,
                    contentType: false,
                    success: function(res){
                        console.log(res);
                    },
                    error: function(res){
                        console.log("error : ", res);
                        // toastr.error(res.responseJSON.message);
                    }
                });
            });

            $.ajax({
                url: '{{ route('get-grafik') }}',
                method: 'GET',
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (res) {
                    console.log(res.data_po);
                    let dataGrafik = Object.keys(res.data_po);
                    // console.log(dataGrafik);

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
                        if ((typeof res.data_po[index]) === 'object'){
                            let sum = res.data_po[index].reduce((a, b) => a + b, 0)
                            data[index] = sum;
                        } else if( ( (typeof res.data_po[index]) === 'object') && (res.data_po[index] != 0) ){
                            data[index] = res.data_po[index];
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

        });
    </script>
@stop