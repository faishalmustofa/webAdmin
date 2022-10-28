<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <title>SURAT PERMINTAAN PENGADAAN MATERIAL</title>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row mb-3">
            <div class="col-md-3">
                <img src="{{ asset('img/logo/WikaIndustriEnergi.png') }}" alt="" style="width: 100%">
            </div>
            <div class="col-md-9 text-center">
                <h1>SURAT PESANAN BARANG</h1>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-7">
                <div class="row mb-5">
                    <div class="col">
                        <b>Kantor Pusat : </b> <br>
                        Jl. DI Panjaitan Kav 9 Cipinang Cempedak <br>
                        Jatinegara Jakarta 13340 <br>
                        Telp : [021] 8686 3293 <br>
                        Fax : [021] 8686 3294
                    </div>
                    <div class="col">
                        <b>Pabrik : </b> <br>
                        Jl. Raya Narogong KM 26 <br>
                        Cileungsi, Bogor 16820 <br>
                        Telp : [021] 8686 3293 <br>
                        Fax : [021] 8686 3294
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12"></div>
                    <h5>{{$dsm->supplier}}</h5>
                    <div class="col-md-12">
                        {{ $dsm->alamat }} <br>
                        Telp : {{ $dsm->no_kantor }}<br>
                        Fax : {{ $dsm->no_kantor }}<br>
                        {{$dsm->pic}}
                    </div>
                </div>
                
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-sm-6">
                        <b>Tanggal : </b>
                    </div>
                    <div class="col-sm-6 text-left">
                        {{ $tgl_po }}
                    </div>
                    <br>
                    <div class="col-sm-6">
                        <b>P.O.# </b>
                    </div>
                    <div class="col-sm-6 text-left">
                        <b>KU.08.02/LCIB.{{$po->id}}/{{$tahun_po}}</b>
                    </div>
                    <br><br>

                    <div class="col-sm-6">
                        <b>Reff SPP</b>
                    </div>
                    <div class="col-sm-6 text-left">
                        {{ $sppm->no_sppm }}
                    </div>
                    <div class="col-sm-6">
                        <b>Keterangan</b>
                    </div>
                    <div class="col-sm-6 text-left">
                        {{ $sppm->keterangan }}
                    </div>
                    <div class="col-sm-6">
                        <b>Bulan</b>
                    </div>
                    <div class="col-sm-6 text-left">
                        {{ $bulan_sppm }}
                    </div>
                    <br><br>

                    <div class="col-sm-6">
                        <b>Penawaran</b>
                    </div>
                    <div class="col-sm-6 text-left">
                        {{ $penawaran }}
                    </div>
                    <div class="col-sm-6 ">
                        <b>Tanggal</b>
                    </div>
                    <div class="col-sm-6 text-left">
                        {{ $tgl_penawaran }}
                    </div>
                    <br><br>

                    <div class="col-sm-12">
                        <b>Pengiriman paling lambat : </b>
                    </div>
                    <div class="col-sm-12 text-center">
                        {{ $target_kedatangan }}
                    </div>
                </div>

            </div>
        </div>

        <div class="table-responsive">
            <table class="table" style="width:100%;text-align: center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Spesifikasi</th>
                        <th>Satuan</th>
                        <th>Qty</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ $sppm->uraian }}</td>
                        <td>{{ $sppm->spesifikasi }}</td>
                        <td>{{ $sppm->satuan }}</td>
                        <td>{{ $sppm->qty_sppm }}</td>
                        <td>{{ $sppm->hpp }}</td>
                        <td>{{ $sppm->qty_hpp }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="perhitungan mr-4 mb-3">
            <div class="row text-right">
                <div class="col-sm-10">Sub Jumlah</div>
                <div class="col-sm-2">{{ $jumlah }}</div>
            </div>
            <div class="row text-right">
                <div class="col-sm-10">Ppn 11%h</div>
                <div class="col-sm-2">{{ $ppn }}</div>
            </div>
            <div class="row text-right">
                <div class="col-sm-10"><b>TOTAL</b></div>
                <div class="col-sm-2">{{ $total }}</div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12 text-right">PT WIKA INDUSTRI ENERGI</div>
            <div class="col-md-5 text-left">
                Menyetujui, <br>
                <br>
                <br>
                <br>
               <u><b>{{ $dsm->pic }}</b></u> <br>
               {{ $dsm->supplier }}
            </div>
            <div class="col-md-4 text-center">
                Mengetahui, <br>
                <br>
                <br>
                <br>
               <u><b>Dwi Arief Wibisono</b></u> <br>
               Manajer Pengadaan
            </div>
            <div class="col-md-3 text-center">
                Dipesan Oleh, <br>
                <br>
                <br>
                <br>
               <u><b>Tommi Surbakti</b></u> <br>
               Staf Pengadaan
            </div>
        </div>
    </div>
</body>
</html>