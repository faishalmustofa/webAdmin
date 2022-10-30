@extends('adminlte::page')

@section('title','Edit User')

@section('content')
    <div class="container mt-5">
        <div class="row h-100 justify-content-center ">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit User</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="display:none;"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ $urlSubmit }}" id="editSPPM" method="POST" enctype="multipart/form-data">
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
                                        name="nama" 
                                        class="form-control" 
                                        value="{{ (old('nama') ? old('nama') : (($user->name === '') ? '' : $user->name)) }}"
                                        id="nama"
                                    >
                                </div>
                                @if ($errors->has('nama'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="nama_err"></p>
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

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="role">Role</label>
                                </div>
                                <div class="col-md-10">
                                    <select class="custom-select text-center" name="proses" id="proses" style="width: 50%;border:solid 2px">
                                        @foreach ($role as $item)
                                            <option value="0" {{ ( old('proses') ? old('proses') : ($item->slug === $user_roles->slug ? 'selected' : '') ) }} >{{ $item->slug }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('role'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="role_err"></p>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a class="btn btn-default mr-2" href="{{ route('users') }}">Cancel</a>
                                <button type="button" class="btn btn-primary" id="btnSubmit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{-- @include('user.edit-js-css') --}}
@stop
