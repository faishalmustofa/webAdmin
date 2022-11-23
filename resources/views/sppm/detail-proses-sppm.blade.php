@extends('adminlte::page')

@section('title', 'Detail Proses SPPM')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Detail Proses SPPM</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="display: none;"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-proses text-center mb-3">
                    <form action="{{ route('update.proses.sppm',$proses_sppm->sppm->id) }}" id="updateProsesSPPM" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($admin_role->slug === 'pengadaan')
                            <select class="custom-select text-center" name="proses" id="proses" style="width: 50%;border:solid 2px">
                                <option value="0" {{ ( old('proses') ? old('proses') : ($proses_sppm->status === 0 ? 'selected' : '') ) }} >Diterima</option>
                                <option value="1" {{ ( old('proses') ? old('proses') : ($proses_sppm->status === 1 ? 'selected' : '') ) }} >Prakualifikasi Supplier</option>
                                <option value="2" {{ ( old('proses') ? old('proses') : ($proses_sppm->status === 2 ? 'selected' : '') ) }} >Pengusulan RAB dan Material</option>
                                <option value="3" {{ ( old('proses') ? old('proses') : ($proses_sppm->status === 3 ? 'selected' : '') ) }} >Penawaran supplier</option>
                                <option value="4" {{ ( old('proses') ? old('proses') : ($proses_sppm->status === 4 ? 'selected' : '') ) }} >Pembuatan PO</option>
                                <option value="5" {{ ( old('proses') ? old('proses') : ($proses_sppm->status === 5 ? 'selected' : '') ) }} >Pembelian</option>
                                <option value="6" {{ ( old('proses') ? old('proses') : ($proses_sppm->status === 6 ? 'selected' : '') ) }} >Selesai</option>
                            </select>

                            <input type="text" name="deskripsi" id="deskripsi" value="" hidden>
                        @else
                            <select class="custom-select text-center" name="proses" id="proses" style="width: 50%;border:solid 2px" disabled>
                                <option value="0" {{ ( old('proses') ? old('proses') : ($proses_sppm->status === 0 ? 'selected' : '') ) }} >Diterima</option>
                                <option value="1" {{ ( old('proses') ? old('proses') : ($proses_sppm->status === 1 ? 'selected' : '') ) }} >Prakualifikasi Supplier</option>
                                <option value="2" {{ ( old('proses') ? old('proses') : ($proses_sppm->status === 2 ? 'selected' : '') ) }} >Pengusulan RAB dan Material</option>
                                <option value="3" {{ ( old('proses') ? old('proses') : ($proses_sppm->status === 3 ? 'selected' : '') ) }} >Penawaran supplier</option>
                                <option value="4" {{ ( old('proses') ? old('proses') : ($proses_sppm->status === 4 ? 'selected' : '') ) }} >Pembuatan PO</option>
                                <option value="5" {{ ( old('proses') ? old('proses') : ($proses_sppm->status === 5 ? 'selected' : '') ) }} >Pembelian</option>
                                <option value="6" {{ ( old('proses') ? old('proses') : ($proses_sppm->status === 6 ? 'selected' : '') ) }} >Selesai</option>
                            </select>

                            <input type="text" name="deskripsi" id="deskripsi" value="" hidden>
                        @endif
                    </form>
                </div>
                
                <hr style="width:65%;border-top:solid 1px">

                <div class="timeline-proses">
                    @if ($proses_sppm->status >= 6 && $proses_sppm->status === 6)
                        <h5 class="text-center" style="font-weight: bold">Proses selesai, material sudah diterima</h5>
                        <div class="row mt-3">
                            @if (is_null($tgl_proses_6))
                                <div class="col-md-5 text-right">-</div>
                            @else
                                <div class="col-md-5 text-right">{{ $tgl_proses_6 }} WIB</div>
                            @endif
                            <div class="col-md-1 text-center"><i class="fas fa-circle" style="color:lime"></i></div>
                            <div class="col-md-6 text-left">Selesai</div>
                        </div>
                    @elseif ($proses_sppm->status >= 6 && $proses_sppm->status != 6)
                        <div class="row mt-3">
                            @if (is_null($tgl_proses_6))
                                <div class="col-md-5 text-right">-</div>
                            @else
                                <div class="col-md-5 text-right">{{ $tgl_proses_6 }} WIB</div>
                            @endif
                            <div class="col-md-1 text-center"><i class="fas fa-circle" style="color:slategray"></i></div>
                            <div class="col-md-6 text-left">Selesai</div>
                        </div>
                    @endif

                    @if ($proses_sppm->status >= 5 && $proses_sppm->status === 5)
                        <h5 class="text-center" style="font-weight: bold">Sedang proses pembelian, material sudah dipesan</h5>
                        <div class="row mt-3">
                            @if (is_null($tgl_proses_5))
                                <div class="col-md-5 text-right">-</div>
                            @else
                                <div class="col-md-5 text-right">{{ $tgl_proses_5 }} WIB</div>
                            @endif
                            <div class="col-md-1 text-center"><i class="fas fa-circle" style="color:lime"></i></div>
                            <div class="col-md-6 text-left">Pembelian</div>
                        </div>
                    @elseif ($proses_sppm->status >= 5 && $proses_sppm->status != 5)
                        <div class="row mt-3">
                            @if (is_null($tgl_proses_5))
                                <div class="col-md-5 text-right">-</div>
                            @else
                                <div class="col-md-5 text-right">{{ $tgl_proses_5 }} WIB</div>
                            @endif
                            <div class="col-md-1 text-center"><i class="fas fa-circle" style="color:slategray"></i></div>
                            <div class="col-md-6 text-left">Pembelian</div>
                        </div>
                    @endif

                    @if ($proses_sppm->status >= 4 && $proses_sppm->status === 4)
                        <h5 class="text-center" style="font-weight: bold">Sedang proses pembuatan PO</h5>
                        <div class="row mt-3">
                            @if (is_null($tgl_proses_4))
                                <div class="col-md-5 text-right">-</div>
                            @else
                                <div class="col-md-5 text-right">{{ $tgl_proses_4 }} WIB</div>
                            @endif
                            <div class="col-md-1 text-center"><i class="fas fa-circle" style="color:lime"></i></div>
                            <div class="col-md-6 text-left">Pembuatan PO</div>
                        </div>
                    @elseif ($proses_sppm->status >= 4 && $proses_sppm->status != 4)
                        <div class="row mt-3">
                            @if (is_null($tgl_proses_4))
                                <div class="col-md-5 text-right">-</div>
                            @else
                                <div class="col-md-5 text-right">{{ $tgl_proses_4 }} WIB</div>
                            @endif
                            <div class="col-md-1 text-center"><i class="fas fa-circle" style="color:slategray"></i></div>
                            <div class="col-md-6 text-left">Pembuatan PO</div>
                        </div>
                    @endif

                    @if ($proses_sppm->status >= 3 && $proses_sppm->status === 3)
                        <h5 class="text-center" style="font-weight: bold">Sedang proses penawaran supplier</h5>
                        <div class="row mt-3">
                            @if (is_null($tgl_proses_3))
                                -
                            @else
                                <div class="col-md-5 text-right">{{ $tgl_proses_3 }} WIB</div>
                            @endif
                            <div class="col-md-1 text-center"><i class="fas fa-circle" style="color:lime"></i></div>
                            <div class="col-md-6 text-left">Penawaran supplier</div>
                        </div>
                    @elseif ($proses_sppm->status >= 3 && $proses_sppm->status != 3)
                        <div class="row mt-3">
                            @if (is_null($tgl_proses_3))
                                <div class="col-md-5 text-right">-</div>
                            @else
                                <div class="col-md-5 text-right">{{ $tgl_proses_3 }} WIB</div>
                            @endif
                            <div class="col-md-1 text-center"><i class="fas fa-circle" style="color:slategray"></i></div>
                            <div class="col-md-6 text-left">Penawaran supplier</div>
                        </div>
                    @endif

                    @if ($proses_sppm->status >= 2 && $proses_sppm->status === 2)
                        <h5 class="text-center" style="font-weight: bold">Sedang proses pengusulan RAB dan Material</h5>
                        <div class="row mt-3">
                            @if (is_null($tgl_proses_2))
                                <div class="col-md-5 text-right">-</div>
                            @else
                                <div class="col-md-5 text-right">{{ $tgl_proses_2 }} WIB</div>
                            @endif
                            <div class="col-md-1 text-center"><i class="fas fa-circle" style="color:lime"></i></div>
                            <div class="col-md-6 text-left">Pengusulan RAB dan Material</div>
                        </div>
                    @elseif ($proses_sppm->status >= 2 && $proses_sppm->status != 2)
                        <div class="row mt-3">
                            @if (is_null($tgl_proses_2))
                                <div class="col-md-5 text-right">-</div>
                            @else
                                <div class="col-md-5 text-right">{{ $tgl_proses_2 }} WIB</div>
                            @endif
                            <div class="col-md-1 text-center"><i class="fas fa-circle" style="color:slategray"></i></div>
                            <div class="col-md-6 text-left">Pengusulan RAB dan Material</div>
                        </div>
                    @endif

                    @if ($proses_sppm->status >= 1 && $proses_sppm->status === 1)
                        <h5 class="text-center" style="font-weight: bold">Sedang proses prakualifikasi supplier</h5>
                        <div class="row mt-3">
                            @if (is_null($tgl_proses_1))
                                <div class="col-md-5 text-right">-</div>
                            @else
                                <div class="col-md-5 text-right">{{ $tgl_proses_1 }} WIB</div>
                            @endif
                            <div class="col-md-1 text-center"><i class="fas fa-circle" style="color:lime"></i></div>
                            <div class="col-md-6 text-left">Prakualifikasi Supplier</div>
                        </div>
                    @elseif ($proses_sppm->status >= 1 && $proses_sppm->status != 1)
                        <div class="row mt-3">
                            @if (is_null($tgl_proses_1))
                                <div class="col-md-5 text-right">-</div>
                            @else
                                <div class="col-md-5 text-right">{{ $tgl_proses_1 }} WIB</div>
                            @endif
                            <div class="col-md-1 text-center"><i class="fas fa-circle" style="color:slategray"></i></div>
                            <div class="col-md-6 text-left">Prakualifikasi Supplier</div>
                        </div>
                    @endif

                    @if ($proses_sppm->status >= 0 && $proses_sppm->status === 0)
                        <h5 class="text-center" style="font-weight: bold">SPPM telah diterima</h5>
                        <div class="row mt-3">
                            <div class="col-md-5 text-right">{{ $created_at }} WIB</div>
                            <div class="col-md-1 text-center"><i class="fas fa-circle" style="color:lime"></i></div>
                            <div class="col-md-6 text-left">Diterima</div>
                        </div>
                    @elseif ($proses_sppm->status >= 0 && $proses_sppm->status != 0)
                        <div class="row mt-3">
                            <div class="col-md-5 text-right">{{ $created_at }} WIB</div>
                            <div class="col-md-1 text-center"><i class="fas fa-circle" style="color:slategray"></i></div>
                            <div class="col-md-6 text-left">Diterima</div>
                        </div>
                    @endif
                </div>
                
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@stop

@include('sppm.detail-proses-sppm-js-css')