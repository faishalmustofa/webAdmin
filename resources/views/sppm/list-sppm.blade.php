@extends('adminlte::page')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('title', 'List SPPM')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">SPPM</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="display: none;"></i></button>
                    </div>
                </div>
            <div class="card-body">
                <div class="row align-center">
                    <div class="col-4" align="center">
                        <div class="notify-container-belum-diproses">
                            @if ($belum_diproses != 0)
                                <span class="badge badge-danger notify-bubble-belum-diproses">{{ $belum_diproses }}</span>
                            @endif
                            <a class="text-dark" href="{{ route('sppm.belum.diproses') }}">
                                <i class="fa fa-plus-square text-dark fa-5x"></i>
                                <p style="margin:0;">Belum Diproses</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-4" align="center">
                        <div class="notify-container-diproses">
                            @if ($diproses != 0)
                                <span class="badge badge-danger notify-bubble-diproses">{{ $diproses }}</span>
                            @endif
                            <a class="text-dark" href="{{ route('sppm.diproses') }}">
                                <i class="fa fa-cog text-dark fa-5x"></i>
                                <p style="margin:0;">Diproses</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-4" align="center">
                        <div class="notify-container-selesai">
                            @if ($selesai != 0)
                                <span class="badge badge-danger notify-bubble-selesai">{{ $selesai }}</span>
                            @endif
                            <a class="text-dark" href="{{ route('sppm.selesai') }}">
                                <i class="fa fa-check-square text-dark fa-5x"></i>
                                <p style="margin:0;">Selesai</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@include('sppm.list-sppm-js-css')
