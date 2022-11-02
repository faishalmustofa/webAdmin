@section('css')
 <style>
    .card-header>.card-tools {
        float: left;
    }
 </style>
@stop
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#btnSubmit').click(function(e){
                e.preventDefault();
                let $this = $(this);
                let url = '{{ $urlSubmit }}';
                let form_selector = "form#updateProfile";
                let form = $(form_selector).serializeArray();

                let request = new FormData();
                
                form.forEach(value => {
                    request.append(value.name, value.value);
                });
                // console.log(form);

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
                        console.log(res.messages);
                        if(res.status === false){
                            $.each(res.messages, function(name, key){
								let selector = `#${name}_err`;
                                // toastr.error(key);
								$(selector).html(key[0]);
                            });
                            swal.fire({
                                icon: 'warning',
                                text: 'Something error on your submitions'
                            });
                        } else {
                            swal.fire({
                                icon: 'success',
                                title: 'Updated',
                                text: 'Profile has been updated!'
                            }).then(() => {
                                window.location.href = '{{ $url_profile }}';
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
@stop