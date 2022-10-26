@extends('adminlte::page')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('plugins.Chartjs', true)

@section('title', 'Grafik')

@section('content')
    <div class="container mt-5">
        @include('flash::message')
        <div class="card">
            <div class="card-header">
                <h3>Grafik Pengeluaran</h3>
                <div class="card-tools justify-align-start">
                    Filter by :
                    <form action="{{ route('filter.grafik') }}" id="filterGrafik" method="POST" enctype="multipart/form-data">
                        @csrf
                        <select class="custom-select text-center" name="filter" id="filter" style="border:solid 1px">
                            <option value="">-- Select Filter --</option>
                            @foreach ($sppm as $item)
                                <option value="{{ $item->kode_material }}" >{{ $item->uraian }}</option>
                            @endforeach
                        </select>
                    </form>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="display: none;"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer"></div>
        </div>

    </div>
@stop

@include('dashboard.grafik-js-css')
