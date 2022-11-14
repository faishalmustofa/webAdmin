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
            hpp.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                hpp.value = formatRupiah(this.value, '');
            });
            qty_hpp.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                qty_hpp.value = formatRupiah(this.value, '');
            });

            /* Fungsi formatRupiah */
            function formatRupiah(angka, prefix){
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split   		= number_string.split(','),
                sisa     		= split[0].length % 3,
                rupiah     		= split[0].substr(0, sisa),
                ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
                
                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if(ribuan){
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                
                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
            };

            $('#file_teknis').on('change',function(e){
                //get the file name
                var fileName = $('#file_teknis')[0].files;
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName[0].name);
            });

            $('#qty_sppm').on('change',function(e){
                e.preventDefault();
                let qty_sppm = parseInt($(this).val());
                let hpp = $('#hpp').val();
                hpp = parseInt(hpp.split('.').join(''));
                let qty_hpp = 0;
                if (hpp != 0) {
                    let qty_hpp = qty_sppm * hpp;
                    qty_hpp = String(qty_hpp);
                    qty_hpp = formatRupiah(qty_hpp, '');
                    $('#qty_hpp').val(qty_hpp);
                }
            });

            $('#hpp').on('change',function(e){
                e.preventDefault();
                let hpp = $(this).val();
                hpp = parseInt(hpp.split('.').join(''));
                let qty_sppm = parseInt($('#qty_sppm').val());
                // hpp = parseInt(hpp.split('.').join(''));
                // console.log('qty_sppm : ',qty_sppm);
                // console.log('hpp : ',hpp);
                let qty_hpp = 0;
                if (hpp != 0) {
                    let qty_hpp = qty_sppm * hpp;
                    qty_hpp = String(qty_hpp);
                    qty_hpp = formatRupiah(qty_hpp, '');
                    console.log(qty_hpp);
                    $('#qty_hpp').val(qty_hpp);
                }
                
            });

            $('#btnSubmit').click(function(e){
                e.preventDefault();
                let $this = $(this);
                let url = '{{ $urlSubmit }}';
                let form_selector = "form#storeSPPM";
                let form = $(form_selector).serializeArray();

                let request = new FormData();

                let file_teknis = $('#file_teknis')[0].files;
                request.append('file_teknis', (file_teknis.length > 0 ? file_teknis[0] : ''));
                // console.log(form);
                
                form.forEach(value => {
                    if (value.name === 'hpp' || value.name === 'qty_hpp') {
                        currency = value.value.split('.');
                        currency = currency.join('');
                        request.append(value.name, currency);
                    } else {
                        request.append(value.name, value.value);
                    }
                });

                // console.log(request.getAll('qty_hpp'));

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
                                window.location.href = '{{ route("sppm") }}';
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