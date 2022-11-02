@extends('adminlte::page')

@section('title','Profile')

@section('content')
    <div class="container mt-5">
        <div class="row h-100 justify-content-center ">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Profile</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="display:none;"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ $urlSubmit }}" id="updateProfile" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            @include('flash::message')
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nama">Nama</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="name" 
                                        class="form-control" 
                                        value="{{ (old('name') ? old('name') : (($user->name === '') ? '' : $user->name)) }}"
                                        id="name"
                                    >
                                </div>
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="nama_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="email" 
                                        name="email" 
                                        class="form-control" 
                                        value="{{ (old('email') ? old('email') : (($user->email === '') ? '' : $user->email)) }}"
                                        id="email"
                                    >
                                </div>
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="email_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="password">New Password</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="password" 
                                        name="password" 
                                        class="form-control"
                                        placeholder="Enter New Password..."
                                        id="password"
                                    >
                                </div>
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="password_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="password_confirmation">Re-Enter New Password</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="password" 
                                        name="password_confirmation" 
                                        class="form-control"
                                        placeholder="Re-Enter New Password..."
                                        id="password_confirmation"
                                    >
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="password_confirmation_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="status">Status</label>
                                </div>
                                <div class="col-md-10">
                                   @if ($user->status === 0)
                                       Belum Diverifikasi
                                   @else
                                        Verified <i class="fas fa-check-circle text-primary"></i>
                                   @endif
                                </div>
                                @if ($errors->has('status'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="status_err"></p>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a class="btn btn-default mr-2" href="{{ route('dashboard') }}">Cancel</a>
                                <button type="button" class="btn btn-primary" id="btnSubmit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('user.profile-js-css')
@stop
