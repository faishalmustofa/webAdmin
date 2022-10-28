@extends('adminlte::page')

@section('title','Edit PO')


@section('content')
    <div class="container mt-5">
        <div class="row h-100 justify-content-center ">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit PO</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="display:none;"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ $urlSubmit}}" id="editPO" method="POST" enctype="multipart/form-data">
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
                                            <option class="text-center" value="{{ $item->id }}" {{ ( old('id_sppm') ? old('id_sppm') : ($item->id === $po->id_sppm ? 'selected' : '') ) }}>{{ $item->nama_project }}</option>
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
                                    <label for="id_sppm">Pemasok</label>
                                </div>
                                <div class="col-md-10">
                                    <select class="custom-select" name="supplier" id="supplier" style="width:35%">
                                        <option class="text-center" value="">-- Select Pemasok --</option>
                                        @foreach ($dsm as $item)
                                            <option class="text-center" value="{{$item->id}}" {{ ( old('id_sppm') ? old('id_sppm') : ($item->id === $po->id_dsm ? 'selected' : '') ) }}>{{ $item->supplier }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('supplier'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('supplier') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="supplier_err"></p>
                            </div>

                            {{-- <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="supplier">Pemasok</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="supplier" 
                                        class="form-control" 
                                        placeholder="Enter Pemasok..."
                                        value="{{ (old('supplier') ? old('supplier') : (($po->supplier === '') ? '' : $po->supplier)) }}"
                                        id="supplier"
                                    >
                                </div>
                                @if ($errors->has('supplier'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('supplier') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="supplier_err"></p>
                            </div> --}}

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
                                        value="{{ (old('id_supplier') ? old('id_supplier') : (($po->id_supplier === '') ? '' : $po->id_supplier)) }}"
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
                                    <label for="hri">H. Ri</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="hri" 
                                        class="form-control" 
                                        placeholder="Enter H. Ri..."
                                        value="{{ (old('hri') ? old('hri') : (($po->hri === '') ? '' : $po->hri)) }}"
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
                                    <label for="qty_hri">Qty H. Ri</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="qty_hri" 
                                        class="form-control" 
                                        placeholder="Enter Qty H. Ri..."
                                        value="{{ (old('qty_hri') ? old('qty_hri') : (($po->qty_hri === '') ? '' : $po->qty_hri)) }}"
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
                                        <option class="text-center" value="0" {{ (old('efisiensi') ? old('efisiensi') : (($po->efisiensi === 0) ? 'selected' : '')) }}>Efisiensi</option>
                                        <option class="text-center" value="1" {{ (old('efisiensi') ? old('efisiensi') : (($po->efisiensi === 1) ? 'selected' : '')) }}>Inefisiensi</option>
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
                                        value="{{ (old('ri_ked') ? old('ri_ked') : (($po->ri_ked === '') ? '' : $po->ri_ked)) }}"
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
                                        value="{{ (old('metode_pembayaran') ? old('metode_pembayaran') : (($po->metode_pembayaran === '') ? '' : $po->metode_pembayaran)) }}"
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
                                        placeholder="Enter Tempo Pembayaran..."
                                        value="{{ (old('tempo_pembayaran') ? ( old('tempo_pembayaran') === $po->tempo_pembayaran ? $po->tempo_pembayaran : '' ) : (($po->tempo_pembayaran === '') ? '' : $po->tempo_pembayaran)) }}"
                                        >
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
                                            value="{{ (old('metode_penyerahan_barang') ? old('metode_penyerahan_barang') : (($po->metode_penyerahan_barang === '') ? '' : $po->metode_penyerahan_barang)) }}"
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
                                            value="{{ (old('lokasi_penyerahan_barang') ? old('lokasi_penyerahan_barang') : (($po->lokasi_penyerahan_barang === '') ? '' : $po->lokasi_penyerahan_barang)) }}"
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
                                    <label for="penawaran">Penawaran</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="text" 
                                        name="penawaran" 
                                        class="form-control" 
                                        placeholder="Enter Penawaran..."
                                        value="{{ (old('penawaran') ? old('penawaran') : (($po->penawaran === '') ? '' : $po->penawaran)) }}"
                                        id="penawaran">
                                </div>
                                @if ($errors->has('penawaran'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('penawaran') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="penawaran_err"></p>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="tgl_penawaran">Tanggal Penawaran</label>
                                </div>
                                <div class="col-md-10">
                                    <input 
                                        type="date" 
                                        name="tgl_penawaran" 
                                        class="form-control" 
                                        placeholder="dd-mm-yyyy"
                                        
                                        id="tgl_penawaran"
                                        style="width:35%">
                                </div>
                                @if ($errors->has('tgl_penawaran'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('tgl_penawaran') }}</strong>
                                    </div>
                                @endif
                                <p class="text-danger text_err" id="tgl_penawaran_err"></p>
                            </div>

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
                                            title="{{ (old('dokumen_kontrak') ? old('dokumen_kontrak') : (($po->dokumen_kontrak === '') ? 'No File Chosen' : $po->dokumen_kontrak)) }}"
                                            placeholder="{{ (old('dokumen_kontrak') ? old('dokumen_kontrak') : (($po->dokumen_kontrak === '') ? '' : $po->dokumen_kontrak)) }}"
                                        >
                                        <label class="custom-file-label" for="dokumen_kontrak">
                                            {{ (old('dokumen_kontrak') ? old('dokumen_kontrak') : (($po->dokumen_kontrak === '') ? 'Choose File' : $po->dokumen_kontrak)) }}
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
@include('po.edit-js-css')
@stop
