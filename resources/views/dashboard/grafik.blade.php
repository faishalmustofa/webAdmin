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
                <div class="card-tools">
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

@include('dashboard.index-js')
