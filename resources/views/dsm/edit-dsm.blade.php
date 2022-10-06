@extends('adminlte::page')

@section('title','Edit DSM')


@section('content')
    <div class="container mt-5">
        <div class="row h-100 justify-content-center ">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit DSM</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="display:none;"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ $urlSubmit }}" id="editDSM" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            @include('flash::message')
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="id_pemasok">ID Pemasok</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="number" 
                                        name="id_pemasok" 
                                        class="form-control" 
                                        placeholder="Enter ID Pemasok..."
                                        value="{{ (old('id_pemasok') ? old('id_pemasok') : (($dsm->id_pemasok === '') ? '' : $dsm->id_pemasok)) }}"
                                        id="id_pemasok"
                                    >
                                </div>
                                @if ($errors->has('id_pemasok'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('id_pemasok') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="id_pemasok_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="supplier">Supplier</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="supplier" 
                                        class="form-control" 
                                        placeholder="Enter Supplier..."
                                        value="{{ (old('supplier') ? old('supplier') : (($dsm->supplier === '') ? '' : $dsm->supplier)) }}"
                                        id="supplier"
                                    >
                                </div>
                                @if ($errors->has('supplier'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('supplier') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="supplier_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nama_barang">Nama Barang</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="nama_barang" 
                                        class="form-control" 
                                        placeholder="Enter ID Nama Barang..."
                                        value="{{ (old('nama_barang') ? old('nama_barang') : (($dsm->nama_barang === '') ? '' : $dsm->nama_barang)) }}"
                                        id="nama_barang"
                                        >
                                </div>
                                @if ($errors->has('nama_barang'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('nama_barang') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="nama_barang_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="alamat">Alamat</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="textarea" 
                                        name="alamat" 
                                        class="form-control" 
                                        placeholder="Enter Alamat..."
                                        value="{{ (old('alamat') ? old('alamat') : (($dsm->alamat === '') ? '' : $dsm->alamat)) }}"
                                        id="alamat"
                                    >
                                </div>
                                @if ($errors->has('alamat'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="alamat_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="pic">PIC</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="pic" 
                                        class="form-control" 
                                        placeholder="Enter PIC..." 
                                        value="{{ (old('pic') ? old('pic') : (($dsm->pic === '') ? '' : $dsm->pic)) }}"
                                        id="pic"
                                    >
                                </div>
                                @if ($errors->has('pic'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('pic') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="pic_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="no_telp">No. Telpon</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="number" 
                                        name="no_telp" 
                                        class="form-control" 
                                        placeholder="Enter No. Telepon..." 
                                        value="{{ (old('no_telp') ? old('no_telp') : (($dsm->no_telp === '') ? '' : $dsm->no_telp)) }}"
                                        id="no_telp">
                                </div>
                                @if ($errors->has('no_telp'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('no_telp') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="no_telp_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="no_kantor">No. Kantor</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="number" 
                                        name="no_kantor" 
                                        class="form-control" 
                                        placeholder="Enter No. Kantor..." 
                                        value="{{ (old('no_kantor') ? old('no_kantor') : (($dsm->no_kantor === '') ? '' : $dsm->no_kantor)) }}"
                                        id="no_kantor">
                                </div>
                                @if ($errors->has('no_kantor'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('no_kantor') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="no_kantor_err"></p>
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
                                        placeholder="Enter Email..." 
                                        value="{{ (old('email') ? old('email') : (($dsm->email === '') ? '' : $dsm->email)) }}"
                                        id="email">
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
                                    <label for="file_prakualifikasi">File Prakualifikasi</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="custom-file" id="customFile">
                                        <input 
                                            type="file" 
                                            name="file_prakualifikasi"
                                            title="{{ (old('file_prakualifikasi') ? old('file_prakualifikasi') : (($dsm->file_prakualifikasi === '') ? 'No File Chosen' : $dsm->file_prakualifikasi)) }}"
                                            class="custom-file-input" 
                                            id="file_prakualifikasi"
                                            placeholder="{{ (old('file_prakualifikasi') ? old('file_prakualifikasi') : (($dsm->file_prakualifikasi === '') ? '' : $dsm->file_prakualifikasi)) }}"
                                            accept="application/pdf" 
                                            multiple
                                        >
                                        <label class="custom-file-label" for="exampleInputFile">
                                            {{ (old('file_prakualifikasi') ? old('file_prakualifikasi') : (($dsm->file_prakualifikasi === '') ? '' : $dsm->file_prakualifikasi)) }}
                                         </label>
                                    </div>
                                    
                                </div>
                                @if ($errors->has('file_prakualifikasi'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('file_prakualifikasi') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="file_prakualifikasi_err"></p>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a class="btn btn-default mr-2" href="{{ route('dsm') }}">Cancel</a>
                                <button type="button" id="btnSumbit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('dsm.edit-js-css')
@stop
