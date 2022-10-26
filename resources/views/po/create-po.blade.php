@extends('adminlte::page')

@section('title','Create PO')

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
                        <h3 class="card-title">Create PO</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="display:none;"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ $urlSubmit}}" id="storePO" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            @include('flash::message')
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="id_sppm">SPPM</label>
                                </div>
                                <div class="col-md-10">
                                    <select class="custom-select" name="id_sppm" id="id_sppm" style="width:35%">
                                        <option class="text-center" value="">-- Select SPPM Project --</option>
                                        @foreach ($sppm as $item)
                                            <option class="text-center" value="{{$item->id}}">{{ $item->nama_project }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('supplier'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('id_sppm') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="id_sppm_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="supplier">Pemasok</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="supplier" 
                                        class="form-control" 
                                        placeholder="Enter Pemasok..."
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
                                    <label for="id_supplier">ID Pemasok</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="id_supplier" 
                                        class="form-control" 
                                        placeholder="Enter ID Pemasok..."
                                        id="id_supplier"
                                        >
                                </div>
                                @if ($errors->has('id_supplier'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('id_supplier') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="id_supplier_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="hri">Harga Realisasi</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="hri" 
                                        class="form-control" 
                                        placeholder="Enter Harga Realisasi..."
                                        id="hri"
                                    >
                                </div>
                                @if ($errors->has('hri'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('hri') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="hri_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="qty_hri">Qty Harga Realisasi</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="qty_hri" 
                                        class="form-control" 
                                        placeholder="Enter Qty Harga Realisasi..."
                                        id="qty_hri"
                                    >
                                </div>
                                @if ($errors->has('qty_hri'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('qty_hri') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="qty_hri_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="efisiensi">Efisiensi / Inefisiensi</label>
                                </div>
                                <div class="col-md-10">
                                    <select class="custom-select" name="efisiensi" id="efisiensi" style="width:35%">
                                        <option class="text-center" value=""> -- Select Efisiensi / Inefisiensi -- </option>
                                        <option class="text-center" value="0" {{ (old('status') ? 'selected' : '') }}>Efisiensi</option>
                                        <option class="text-center" value="1" {{ (old('status') ? 'selected' : '') }}>Inefisiensi</option>
                                    </select>
                                </div>
                                @if ($errors->has('efisiensi'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('efisiensi') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="efisiensi_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="ri_ked">Ri Ked</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="date" 
                                        name="ri_ked" 
                                        class="form-control" 
                                        placeholder="dd-mm-yyyy"
                                        id="ri_ked"
                                        style="width:35%">
                                </div>
                                @if ($errors->has('ri_ked'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('ri_ked') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="ri_ked_err"></p>
                            </div>

                            <hr>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="cara_pembayaran">Cara Pembayaran :</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="metode_pembayaran">Metode Pembayaran</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="metode_pembayaran" 
                                        class="form-control" 
                                        placeholder="Enter Metode Pembayaran..."
                                        id="metode_pembayaran">
                                </div>
                                @if ($errors->has('metode_pembayaran'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('metode_pembayaran') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="metode_pembayaran_err"></p>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="tempo_pembayaran">Tempo Pembayaran</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="number" 
                                        name="tempo_pembayaran" 
                                        class="form-control" 
                                        id="tempo_pembayaran"
                                        placeholder="Enter Tempo Pembayaran...">
                                </div>
                                @if ($errors->has('tempo_pembayaran'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('tempo_pembayaran') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="tempo_pembayaran_err"></p>
                            </div>
                            

                            <hr>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="cara_pembayaran">Penyerahan Barang :</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="metode_penyerahan_barang">Metode Penyerahan Barang</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input 
                                            type="text" 
                                            name="metode_penyerahan_barang" 
                                            class="form-control" 
                                            placeholder="Enter Metode Penyerahan Barang..."
                                            id="metode_penyerahan_barang">
                                    </div>
                                    @if ($errors->has('metode_penyerahan_barang'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('metode_penyerahan_barang') }}</strong>
                                        </div>
                                    @endif
                                    <p class="text-danger text_err" id="metode_penyerahan_barang_err"></p>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="lokasi_penyerahan_barang">Lokasi Penyerahan Barang</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input 
                                            type="text" 
                                            name="lokasi_penyerahan_barang" 
                                            class="form-control" 
                                            placeholder="Enter Lokasi Penyerahan Barang..."
                                            id="lokasi_penyerahan_barang">
                                    </div>
                                    @if ($errors->has('lokasi_penyerahan_barang'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('lokasi_penyerahan_barang') }}</strong>
                                        </div>
                                    @endif
                                    <p class="text-danger text_err" id="lokasi_penyerahan_barang_err"></p>
                                </div>
                            <hr>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="dokumen_kontrak">Dokumen & Kontrak</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="custom-file" id="customFile">
                                        <input 
                                            type="file" 
                                            name="dokumen_kontrak"
                                            class="custom-file-input" 
                                            id="dokumen_kontrak"
                                            accept="application/pdf"
                                        >
                                        <label class="custom-file-label" for="dokumen_kontrak">
                                            Choose a file
                                         </label>
                                    </div>
                                    
                                </div>
                                @if ($errors->has('dokumen_kontrak'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('dokumen_kontrak') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="dokumen_kontrak_err"></p>
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
@include('po.create-js-css')
@stop
