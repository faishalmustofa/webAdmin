<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SPPM extends Model
{
    protected $table = "sppms";

    protected $fillable = [
        'id_pembuat',
        'no_project',
        'no_sppm',
        'no_spk',
        'uraian',
        'kode_material',
        'spesifikasi',
        'satuan',
        'qty_sppm',
        'hpp',
        'qty_hpp',
        'target_kedatangan',
        'file_teknis',
        'status'
    ];

    protected $primaryKey = "id";

    public $rules = [
        'sppm' => [
            'id_pembuat' => 'required',
            'no_project' => 'required',
            'no_sppm' => 'required',
            'no_spk' => 'required',
            'uraian' => 'required',
            'kode_material' => 'required',
            'spesifikasi' => 'required',
            'satuan' => 'required',
            'qty_sppm' => 'required',
            'hpp' => 'required',
            'qty_hpp' => 'required',
            'target_kedatangan' => 'required',
            'file_teknis' => 'required|mimes:pdf',
            'status' => 'required'
        ]
    ];

    public $messages = [
        'sppm' => [
            'id_pembuat' =>'ID Pembuat field is Required',
            'no_project' =>'No. Project field is Required',
            'no_sppm' =>'No. SPPM field is Required',
            'no_spk' =>'No. SPK field is Required',
            'uraian' =>'Uraian field is Required',
            'kode_material' =>'Kode Material field is Required',
            'spesifikasi' =>'Spesifikasi field is Required',
            'satuan' =>'Satuan field is Required',
            'qty_sppm' =>'Qty SPPM field is Required',
            'hpp' =>'HPP field is Required',
            'qty_hpp' =>'Qty HPP field is Required',
            'target_kedatangan' =>'Target Kedatangan field is Required',
            'file_teknis' =>'File Teknis field is Required',
            'status' =>'Status field is Required',
        ]
    ];
}
