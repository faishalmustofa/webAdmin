@extends('adminlte::page')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('title', 'List SPPM')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">SPPM Table</h3>
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
                            <th>No</th>
                            <th>Nama Pembuat</th>
                            <th>Nama Project</th>
                            <th>No. Project</th>
                            <th>No. SPPM</th>
                            <th>Tanggal SPPM</th>
                            <th>No. SPK</th>
                            <th>Uraian</th>
                            <th>Kode Material</th>
                            <th>Spesifikasi</th>
                            <th>Satuan</th>
                            <th>Qty SPPM</th>
                            <th>HPP</th>
                            <th>Qty x HPP</th>
                            <th>Target Kedatangan</th>
                            <th>File Teknis</th>
                            <th>Status PO</th>
                            <th>Print</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@stop

@include('sppm.list-sppm-js-css')
