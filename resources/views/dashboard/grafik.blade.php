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
                <div class="jumbotron mt-0 mb-0 p-2">
                    <h1 class="display-5 mb-0">Grafik Pengeluaran</h1>
                    <hr class="my-2 ">
                </div>
                <div class="card-tools justify-align-start">
                    Filter by :
                    <form action="{{ route('filter.grafik') }}" id="filterGrafik" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <select class="custom-select text-center" name="filter" id="filter" style="border:solid 1px">
                                    <option value="">-- Select Material --</option>
                                    @foreach ($sppm as $item)
                                        <option value="{{ $item->kode_material }}" >{{ $item->uraian }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" name="year" id="datepicker" class="form-control" placeholder="Select Year" style="border:solid 1px">
                                {{-- <input type="year" class="form-control"> --}}
                            </div>
                            <div class="col">
                                <a type="button" class="btn btn-success" id="apply-filter">Apply</a>
                            </div>
                        </div>
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
