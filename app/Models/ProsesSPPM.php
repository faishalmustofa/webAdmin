<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProsesSPPM extends Model
{
    protected $table = "proses_s_p_p_m_s";

    protected $fillable = [
        'id_sppm',
        'status',
        'deskripsi',
        'tgl_proses_1',
        'tgl_proses_2',
        'tgl_proses_3',
        'tgl_proses_4',
        'tgl_proses_5',
        'tgl_proses_6',
    ];

    public function sppm()
    {
        return $this->belongsTo(SPPM::class, 'id_sppm', 'id');
    }

    protected $primaryKey = "id";
}
