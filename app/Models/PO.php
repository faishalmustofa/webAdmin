<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PO extends Model
{
    protected $table = "pos";

    protected $fillable = [
        'id_dsm',
        'id_sppm',
        'supplier',
        'id_supplier',
        'hri',
        'qty_hri',
        'efisiensi',
        'ri_ked',
        'metode_pembayaran',
        'tempo_pembayaran',
        'metode_penyerahan_barang',
        'lokasi_penyerahan_barang',
        'penawaran',
        'tgl_penawaran',
        'dokumen_kontrak'
    ];

    protected $primaryKey = "id";

    public function sppm()
    {
        return $this->belongsTo(SPPM::class, 'id_sppm', 'id');
    }

    public function dsm()
    {
        return $this->belongsTo(DSM::class, 'id_dsm', 'id');
    }

    public $rules = [
        'po' => [
            'id_sppm' => 'required',
            'supplier' => 'required',
            'id_supplier' => 'required',
            'hri' => 'required',
            'qty_hri' => 'required',
            // 'efisiensi' => 'required',
            // 'ri_ked' => 'required|date',
            'metode_pembayaran' => 'required',
            'tempo_pembayaran' => 'required',
            'metode_penyerahan_barang' => 'required',
            'lokasi_penyerahan_barang' => 'required',
            'penawaran' => 'required',
            'tgl_penawaran' => 'required',
            'dokumen_kontrak' => 'required|mimes:pdf',
        ]
    ];

    public $messages = [
        'po' => [
            'id_sppm' => 'ID SPPM field is Required',
            'supplier' => 'Supplier field is Required',
            'id_supplier' => 'ID Supplier field is Required',
            'hri' => 'H. Ri field is Required',
            'qty_hri' => 'Quantity H. Ri field is Required',
            // 'efisiensi' => 'efisiensi / Inefesiensi field is Required',
            'metode_pembayaran' => 'Metode Pembayaran field is Required',
            'tempo_pembayaran' => 'Tempo Pembayaran field is Required',
            'metode_penyerahan_barang' => 'Metode Penyerahan Barang field is Required',
            'lokasi_penyerahan_barang' => 'Lokasi Penyerahan Barang field is Required',
            'penawaran' => 'Penawaran field is Required',
            'tgl_penawaran' => 'Tanggal penawaran field is Required',
            'dokumen_kontrak' => 'Dokumen & Kontrak field is Required',
        ]
    ];
}
