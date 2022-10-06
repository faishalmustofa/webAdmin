<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PO extends Model
{
    protected $table = "pos";

    protected $fillable = [
        'supplier',
        'id_supplier',
        'hri',
        'qty_hri',
        'efisiensi',
        'metode_pembayaran',
        'tempo_pembayaran',
        'metode_penyerahan_barang',
        'lokasi_penyerahan_barang',
        'dokumen_kontrak'
    ];

    protected $primaryKey = "id";

    public $rules = [
        'po' => [
            'supplier' => 'required',
            'id_supplier' => 'required',
            'hri' => 'required',
            'qty_hri' => 'required',
            'efisiensi' => 'required',
            'ri_ked' => 'required|date',
            'metode_pembayaran' => 'required',
            'tempo_pembayaran' => 'required|date',
            'metode_penyerahan_barang' => 'required',
            'lokasi_penyerahan_barang' => 'required',
            'dokumen_kontrak' => 'required|mimes:pdf',
        ]
    ];

    public $messages = [
        'po' => [
            'supplier' => 'Supplier field is Required',
            'id_supplier' => 'ID Supplier field is Required',
            'hri' => 'H. Ri field is Required',
            'qty_hri' => 'Quantity H. Ri field is Required',
            'efisiensi' => 'efisiensi / Inefesiensi field is Required',
            'metode_pembayaran' => 'Metode Pembayaran field is Required',
            'tempo_pembayaran' => 'Tempo Pembayaran field is Required',
            'metode_penyerahan_barang' => 'Metode Penyerahan Barang field is Required',
            'lokasi_penyerahan_barang' => 'Lokasi Penyerahan Barang field is Required',
            'dokumen_kontrak' => 'Dokumen & Kontrak field is Required',
        ]
    ];
}
