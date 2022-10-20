@section('css')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
@endsection

@push('js')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#proses').on('change',function(e){

                e.preventDefault();
                let $this = $(this);
                let url = '{{ $urlSubmit }}';
                let form_selector = "form#updateProsesSPPM";
                let form = $(form_selector).serializeArray();

                let request = new FormData();

                var textSelected = $("#proses option:selected").text();

                request.append('_token', form[0].value );
                request.append('proses', this.value );
                request.append('deskripsi', textSelected);

                $.ajax({
                    type: "POST",
                    url: url,
                    data: request,
                    processData: false,
                    contentType: false,
                    beforeSend: function(){
                        $('.text_err').html('');
                    },
                    success: function(res){
                        console.log(res);
                        if(res.status === false){
                            swal.fire({
                                icon: 'warning',
                                text: res.messages
                            });
                        } else {
                            swal.fire({
                                icon: 'success',
                                title: 'Diperbarui',
                                text: 'Data berhasil diperbarui! '
                            }).then(() => {
                                window.location.href = res.route;
                            });
                        }
						
                    },
                    error: function(res){
                        console.log("error : ", res);
                        toastr.error(res.responseJSON.message);
                    }
                });
            });
        });
    </script>
@endpush