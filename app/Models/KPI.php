<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KPI extends Model
{
    protected $table = "kpis";

    protected $fillable = [
        'no_po',
        'supplier',
        'id_supplier',
        'persen_ok_ng',
        'persen_ked',
        'persen_biaya',
        'persen_pelayanan',
        'persen_daya_saing',
        'persen_smt',
        'dok_evaluasi'
    ];

    protected $primaryKey = "id";
}
