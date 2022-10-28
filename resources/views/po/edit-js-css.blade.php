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
            penawaran.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                penawaran.value = formatRupiah(this.value, '');
            });
            hri.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                hri.value = formatRupiah(this.value, '');
            });
            qty_hri.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                qty_hri.value = formatRupiah(this.value, '');
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

            $('#dokumen_kontrak').on('change',function(){
                //get the file name
                var fileName = $('#dokumen_kontrak')[0].files;
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName[0].name);
            });

            $('#supplier').on('change',function(e){
                $('#id_supplier').val(this.value);
            });

            $('#btnSumbit').click(function(e){
                e.preventDefault();
                let $this = $(this);
                let url = '{{ $urlSubmit }}';
                let form_selector = "form#editPO";
                let form = $(form_selector).serializeArray();

                let request = new FormData();

                form.forEach(value => {
                    if (value.name === 'hri' || value.name === 'qty_hri' || value.name === 'penawaran') {
                        currency = value.value.split('.');
                        currency = currency.join('');
                        request.append(value.name, currency);
                    } else {
                        request.append(value.name, value.value);
                    }
                });

                let dokumen_kontrak = $('#dokumen_kontrak')[0].files;
                request.append('dokumen_kontrak', (dokumen_kontrak.length > 0 ? dokumen_kontrak[0] : ''));

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
                                title: 'Updated',
                                text: 'Data has been updated!'
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