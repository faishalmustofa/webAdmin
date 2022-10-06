<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DSM extends Model
{
    protected $table = "dsms";

    protected $fillable = [
        'id_pemasok',
        'supplier',
        'nama_barang',
        'alamat',
        'pic',
        'no_telp',
        'no_kantor',
        'email',
        'file_prakualifikasi'
    ];

    protected $primaryKey = "id";

    public $rules = [
        'dsm' => [
            'id_pemasok' =>'required|integer',
            'supplier' =>'required',
            'nama_barang' =>'required',
            'alamat' =>'required',
            'pic' =>'required',
            'no_telp' =>'required',
            'no_kantor' =>'required',
            'email' =>'required|email',
            'file_prakualifikasi' =>'required|mimes:pdf',
        ]
    ];

    public $messages = [
        'dsm' => [
            'id_pemasok' =>'ID Pemasok field is Required',
            'supplier' =>'Supplier field is Required',
            'nama_barang' =>'Nama Barang field is Required',
            'alamat' =>'Alamat field is Required',
            'pic' =>'PIC is Required',
            'no_telp' =>'Nomor Telepon field is Required',
            'no_kantor' =>'Nomor Kantor field is Required',
            'email' =>'Emailfield is Required',
            'file_prakualifikasi' =>'File Prakualifikasi field is Required',
        ]
    ];
}
