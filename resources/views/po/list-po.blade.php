@extends('adminlte::page')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('title', 'Dashboard')

@section('css')
 <style>
    .table thead th {
        vertical-align: middle;
        text-align: center;
    }
    .table tbody td {
        vertical-align: middle;
        text-align: center;
    }
    table.dataTable thead .sorting:before, 
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting_asc:before, 
    table.dataTable thead .sorting_asc:after {
        display: none;
    }
 </style>
@stop

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">PO Table</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="display: none;"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                @include('flash::message')
                <table id="diproses" class="table responsive striped hoverable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Project</th>
                            <th>No. Project</th>
                            <th>No. SPPM</th>
                            <th>Nomor PO</th>
                            <th>Tanggal PO</th>
                            <th>Pemasok</th>
                            <th>ID Pemasok</th>
                            <th>Harga Realisasi</th>
                            <th>Qty Harga Realisasi</th>
                            <th>Efisiensi / Inefisiensi</th>
                            <th>Riealisasi Kedatangan</th>
                            <th>Metode Pembayaran</th>
                            <th>Tempo Pembayaran</th>
                            <th>Metode Penyerahan Barang</th>
                            <th>Lokasi Penyerahan Barang</th>
                            <th>Dokumen & Kontrak</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@stop

@include('po.list-po-js-css')
