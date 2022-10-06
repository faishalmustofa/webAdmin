<?php

namespace App\Http\Controllers\Pembinaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembinaanController extends Controller
{
    public function getPembinaan(){
        return view('dashboard.index');
    }

    public function createPembinaan(){
        return redirect()->route('pembinaan');
    }

    public function storePembinaan(Request $request){
        return redirect()->route('pembinaan');
    }

    public function editPembinaan($id){
        return redirect()->route('pembinaan');
    }

    public function updatePembinaan(Request $request,$id){
        return redirect()->route('pembinaan');
    }

    public function deletePembinaan($id){
        return redirect()->route('pembinaan');
    }
}
