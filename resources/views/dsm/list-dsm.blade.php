@extends('adminlte::page')

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

@section('title', 'Dashboard')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">DSM Table</h3>
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
                            <th>ID Pemasok</th>
                            <th>Supplier</th>
                            <th>Nama Barang</th>
                            <th>Alamat</th>
                            <th>PIC</th>
                            <th>No. Telepon</th>
                            <th>No. Kantor</th>
                            <th>Email</th>
                            <th>File Prakualifikasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@stop

@include('dsm.list-dsm-js-css')
