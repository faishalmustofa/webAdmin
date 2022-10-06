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
            $('#dokumen_kontrak').on('change',function(e){
                //get the file name
                var fileName = $('#dokumen_kontrak')[0].files;
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName[0].name);
            });

            $('#btnSumbit').click(function(e){
                e.preventDefault();
                let $this = $(this);
                let url = '{{ $urlSubmit }}';
                let form_selector = "form#storePO";
                let form = $(form_selector).serializeArray();

                let request = new FormData();

                let dokumen_kontrak = $('#dokumen_kontrak')[0].files;
                request.append('dokumen_kontrak', (dokumen_kontrak.length > 0 ? dokumen_kontrak[0] : ''));
                form.forEach(value => {
                    request.append(value.name, value.value);
                });

                // console.log(request.getAll('dokumen_kontrak'));
                
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
                            $.each(res.messages, function(name, key){
								let selector = `#${name}_err`;
                                // toastr.error(key)
								$(selector).html(key[0])
                            });
                            swal.fire({
                                icon: 'warning',
                                text: 'Some fields required to fill in !'
                            });
                        } else {
                            swal.fire({
                                icon: 'success',
                                title: 'Created',
                                text: 'Data has been created! '
                            }).then(() => {
                                window.location.href = '{{ route("po") }}';
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