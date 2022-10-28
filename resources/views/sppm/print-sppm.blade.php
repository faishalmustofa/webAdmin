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
    <div class="container mt-5">
        <div class="row mb-3">
            <div class="col-md-3">
                <img src="{{ asset('img/logo/WikaIndustriEnergi.png') }}" alt="" style="width: 50%">
            </div>
            <div class="col-md-9 text-left">
                <h3>SURAT PERMINTAAN PENGADAAN MATERIAL</h3>
            </div>
        </div>
        
        <table class="table" style="width:100%;text-align: center">
            <thead>
                <tr>
                    <th>Proyek</th>
                    <td>{{ $sppm->nama_project }}</td>
                </tr>
                <tr>
                    <th>No SPK</th>
                    <td>{{ $sppm->no_spk }}</td>
                </tr>
                <tr>
                    <th>No SPPM</th>
                    <td>{{ $sppm->no_sppm }}</td>
                </tr>
                <tr>
                    <th>Forecast</th>
                    <td>{{ $sppm->qty_sppm }}</td>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Material</th>
                    <th>Spesifikasi</th>
                    <th>Volume SPPM</th>
                    <th>Satuan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $sppm->uraian }}</td>
                    <td>{{ $sppm->spesifikasi }}</td>
                    <td>{{ $sppm->qty_sppm }}</td>
                    <td>{{ $sppm->satuan }}</td>
                </tr>
            </tbody>
        </table>
        <div class="text-right" style="margin-right: 200px">
            <b>Ra. Kedatangan </b>  {{ $target_kedatangan }}
        </div>
        <div class="row">
            <div class="col-md-8 text-center">
                Disetujui <br>
                <br>
                <br>
                <br>
               <u><b>Firmansyah</b></u> <br>
               Manajer Pabrik
            </div>
            <div class="col-md-2 text-center">
                Diperiksa <br>
                <br>
                <br>
                <br>
               <u><b>Nafroh Bifadhlih</b></u> <br>
               Kasie PEP
            </div>
            <div class="col-md-2 text-center">
                Dibuat <br>
                <br>
                <br>
                <br>
               <u><b>Hujjah</b></u> <br>
               Staf PEP
            </div>
        </div>
    </div>
</body>
</html>