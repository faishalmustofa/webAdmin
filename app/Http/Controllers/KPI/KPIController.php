<?php

namespace App\Http\Controllers\KPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KPIController extends Controller
{
    public function getKpi(){
        return view('kpi.list-kpi');
    }

    public function createKpi(){
        return redirect()->route('kpi');
    }

    public function storeKpi(Request $request){
        return redirect()->route('kpi');
    }

    public function editKpi($id){
        return redirect()->route('kpi');
    }

    public function updateKpi(Request $request,$id){
        return redirect()->route('kpi');
    }

    public function deleteKpi($id){
        return redirect()->route('kpi');
    }
}
