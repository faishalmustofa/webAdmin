<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    protected $table = "monitorings";

    protected $fillable = [
        'deskripsi',
        'no_po',
        'no_project',
        'kode material',
        'supplier',
        'id_supplier',
        'nilai_inv',
        'no_inv',
        'metode_pembayaran',
        'tempo_pembayaran',
        'koor_dan',
        'mdan',
        'proyek',
        'ak-1',
        'ak-2',
        'mku',
        'dkhc',
        'umur_hutang'
    ];

    protected $primaryKey = "id";
}
