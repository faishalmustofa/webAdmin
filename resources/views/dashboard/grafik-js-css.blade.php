@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
 <style>
    .card-header>.card-tools {
        float: left;
    }
    .ui-datepicker-calendar {
        display: none;
    }
    .ui-datepicker-month {
        display: none;
    }
 </style>
@stop
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#datepicker').datepicker( {
                changeMonth: false,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'yy',
                onClose: function(dateText, inst) { 
                        // var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                        $(this).datepicker('setDate', new Date(year, 1));
                }
            });

            $('#apply-filter').on('click', function(e){
                e.preventDefault();

                let $this = $(this);
                let url = '{{ $urlSubmit }}';
                let form_selector = "form#filterGrafik";
                let form = $(form_selector).serializeArray();

                let request = new FormData();

                let this_year = new Date();

                form.forEach(value => {
                    if (value.name === 'year'){
                        if (value.value === ''){
                            request.append(value.name, this_year.getFullYear());
                        } else {
                            request.append(value.name, value.value);
                        }
                    } else {
                        request.append(value.name, value.value);
                    }
                });

                if (form[1].value === '' && form[2].value === ''){
                    toastr.error('Filter belum terisi');
                    alert('Filter belum terisi');
                } else {
                    postFilter(request,url);
                }
                
            });

            function postFilter(request,url) {

                $.ajax({
                    type: "POST",
                    url: url,
                    data: request,
                    processData: false,
                    contentType: false,
                    success: function(res){
                        // console.log(res);
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
                    },
                    error: function(res){
                        console.log("error : ", res);
                        // toastr.error(res.responseJSON.message);
                    }
                });
            }

            $.ajax({
                url: '{{ route('get-grafik') }}',
                method: 'GET',
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (res) {
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