<?php

namespace App\Http\Controllers\Monitoring;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function getMonitoring(){
        return view('monitoring.list-monitoring');
    }

    public function createMonitoring(){
        return redirect()->route('monitoring');
    }

    public function storeMonitoring(Request $request){
        return redirect()->route('monitoring');
    }

    public function editMonitoring($id){
        return redirect()->route('monitoring');
    }

    public function updateMonitoring(Request $request,$id){
        return redirect()->route('monitoring');
    }

    public function deleteMonitoring($id){
        return redirect()->route('monitoring');
    }
}
