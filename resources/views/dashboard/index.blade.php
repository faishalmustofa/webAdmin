@extends('adminlte::page')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('title', 'Dashboard')

@section('content')
    <div class="container mt-5">
        @include('flash::message')
        

        <div class="jumbotron mt-0 mb-0 p-1">
            <h1 class="display-5 mb-0">Dashboard</h1>
            <hr class="my-2 ">
        </div>

        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Belum Diproses</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="display: none;"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                
                <table id="belum_diproses" class="table responsive striped hoverable">
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
                            <th>Keterangan</th>
                            <th>Status PO</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Diproses</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="display: none;"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                
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
                            <th>Keterangan</th>
                            <th>Status PO</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Selesai</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="display: none;"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                @include('flash::message')
                <table id="selesai" class="table table-bordered table-hover responsive striped hoverable with-buttons">
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
                            <th>Keterangan</th>
                            <th>Status PO</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@stop

@include('dashboard.index-js')
