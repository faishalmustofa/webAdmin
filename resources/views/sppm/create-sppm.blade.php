@extends('adminlte::page')

@section('title','Create SPPM')

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
@stop

@section('content')
    <div class="container mt-5">
        <div class="row h-100 justify-content-center ">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create SPPM</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="display:none;"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ route('store.sppm') }}" id="storeSPPM" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            @include('flash::message')
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nama_pembuat">Nama Pembuat</label>
                                </div>
                                <div class="col-md-10">
                                    <input name="id_pembuat" value="{{ $admin->id }}" hidden>
                                    <input 
                                        type="text" 
                                        name="nama_pembuat" 
                                        class="form-control"
                                        placeholder="Enter Nama Pembuat..."
                                        id="nama_pembuat"
                                    >
                                </div>
                                @if ($errors->has('nama_pembuat'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('nama_pembuat') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="nama_pembuat_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nama_project">Nama Project</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="nama_project" 
                                        class="form-control"
                                        placeholder="Enter Nama Project..."
                                        id="nama_project"
                                    >
                                </div>
                                @if ($errors->has('nama_project'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('nama_project') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="nama_project_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="no_project">No. Project</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="no_project" 
                                        class="form-control" 
                                        placeholder="Enter No. Project..."
                                        id="no_project"
                                    >
                                </div>
                                @if ($errors->has('no_project'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('no_project') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="no_project_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="no_sppm">No. SPPM</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="no_sppm" 
                                        class="form-control" 
                                        placeholder="Enter No. SPPM..."
                                        id="no_sppm"
                                    >
                                </div>
                                @if ($errors->has('no_sppm'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('no_sppm') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="no_sppm_err"></p>
                            </div>

                            {{-- tgl sppm --}}
                            {{-- <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="nama_pembuat">Nama Pembuat</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="nama_pembuat" 
                                        class="form-control" 
                                        placeholder="Enter Nama Pembuat..."
                                        id="nama_pembuat"
                                    >
                                </div>
                                @if ($errors->has('id_pemasok'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('id_pemasok') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="id_pemasok_err"></p>
                            </div> --}}

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="no_spk">No. SPK</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="no_spk" 
                                        class="form-control" 
                                        placeholder="No. SPK..."
                                        id="no_spk"
                                    >
                                </div>
                                @if ($errors->has('no_spk'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('no_spk') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="no_spk_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="uraian">Uraian</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="uraian" 
                                        class="form-control" 
                                        placeholder="Enter Uraian..."
                                        id="uraian"
                                    >
                                </div>
                                @if ($errors->has('uraian'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('uraian') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="uraian_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="kode_material">Kode Material</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="kode_material" 
                                        class="form-control" 
                                        placeholder="Enter Kode Material..."
                                        id="kode_material"
                                    >
                                </div>
                                @if ($errors->has('kode_material'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('kode_material') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="kode_material_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="spesifikasi">Spesifikasi</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="spesifikasi" 
                                        class="form-control" 
                                        placeholder="Enter Spesifikasi..."
                                        id="spesifikasi"
                                    >
                                </div>
                                @if ($errors->has('spesifikasi'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('spesifikasi') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="spesifikasi_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="satuan">Satuan</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="satuan" 
                                        class="form-control" 
                                        placeholder="Enter Satuan..."
                                        id="satuan"
                                    >
                                </div>
                                @if ($errors->has('satuan'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('satuan') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="satuan_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="qty_sppm">Qty SPPM</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="number" 
                                        name="qty_sppm" 
                                        class="form-control" 
                                        placeholder="Enter Qty SPPM..."
                                        id="qty_sppm"
                                    >
                                </div>
                                @if ($errors->has('qty_sppm'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('qty_sppm') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="qty_sppm_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="hpp">HPP</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="hpp" 
                                        class="form-control" 
                                        placeholder="Enter HPP..."
                                        id="hpp"
                                    >
                                </div>
                                @if ($errors->has('hpp'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('hpp') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="hpp_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="qty_hpp">Qty HPP</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="qty_hpp" 
                                        class="form-control" 
                                        placeholder="Enter Qty HPP..."
                                        id="qty_hpp"
                                    >
                                </div>
                                @if ($errors->has('qty_hpp'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('qty_hpp') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="qty_hpp_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="target_kedatangan">Target Kedatangan</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="date" 
                                        name="target_kedatangan" 
                                        class="form-control" 
                                        placeholder="dd-mm-yyyy"
                                        id="target_kedatangan"
                                        style="width:35%">
                                </div>
                                @if ($errors->has('target_kedatangan'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('target_kedatangan') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="target_kedatangan_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="file_teknis">File Teknis</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="custom-file" id="customFile">
                                        <input 
                                            type="file" 
                                            name="file_teknis"
                                            class="custom-file-input" 
                                            id="file_teknis"
                                            accept="application/pdf"
                                        >
                                        <label class="custom-file-label" for="file_teknis">
                                            Choose a file
                                         </label>
                                    </div>
                                </div>
                                @if ($errors->has('file_teknis'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('file_teknis') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="file_teknis_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="status">Status</label>
                                </div>
                                <div class="col-md-10">
                                    @if ($admin_role->slug === 'pengadaan')
                                        <select class="custom-select" name="status" id="status" style="width:35%">
                                            <option class="text-center" value=""> -- Select Status -- </option>
                                            <option class="text-center" value="0" {{ (old('status') ? 'selected' : '') }}>Diproses</option>
                                            <option class="text-center" value="1" {{ (old('status') ? 'selected' : '') }}>DONE</option>
                                        </select>
                                    @else
                                        <select class="custom-select" name="status" id="status" style="width:35%" disabled>
                                            <option class="text-center" value=""> -- Select Status -- </option>
                                            <option class="text-center" value="0" selected>Diproses</option>
                                        </select>
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
                                <a class="btn btn-default mr-2" href="{{ route('sppm') }}">Cancel</a>
                                <button type="button" class="btn btn-primary" id="btnSubmit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop

@include('sppm.create-js-css')