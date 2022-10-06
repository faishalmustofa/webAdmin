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
    /* .table tbody td {
        vertical-align: middle;
        text-align: center;
    } */
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
            <h3 class="card-title">KPI Table</h3>
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
                            <th>No. PO</th>
                            <th>Tahun</th>
                            <th>Bulan</th>
                            <th>Supplier</th>
                            <th>ID Supplier</th>
                            <th>% OK/NG</th>
                            <th>% Ked</th>
                            <th>% Biaya</th>
                            <th>% Pelayanan</th>
                            <th>% Daya Saing</th>
                            <th>% SMT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1192848</td>
                            <td>2015</td>
                            <td>Januari</td>
                            <td>Tiger Nixon</td>
                            <td>20110425</td>
                            <td>32</td>
                            <td>65</td>
                            <td>80</td>
                            <td>44</td>
                            <td>53</td>
                            <td>52</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@stop

@include('dsm.list-dsm-js')
