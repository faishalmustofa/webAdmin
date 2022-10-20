<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PO;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::check();
        if (!$user){
            return redirect()->route('login');
        }
        return view('dashboard.index');
    }

    public function grafik(){
        // $pos = PO::select('hri')->with('sppm')->get();
        $pos = PO::with('sppm')->pluck('hri');
        return view('dashboard.grafik');
    }

    public function getGrafik(Request $request)
    {
        $labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        ];
        // $pos = PO::select('qty_hri','created_at')->with('sppm')->get();

        $thisYear = Carbon::now()->format('Y');
        $data = array();
        foreach ($labels as $key => $value) {
            $month = Carbon::parse($value)->format('m');
            $data[(int)$month] = PO::whereYear('created_at','=',$thisYear)
                                ->whereMonth('created_at','=',(int)$month)
                                ->with('sppm')->pluck('qty_hri');
        }

        // $data = [];
        // foreach ($labels as $valueLabel) {
        //     $temp_pengeluaran = 0;
        //     foreach ($pos as $valuePO) {
        //         $date = $valuePO->created_at->monthName;
        //         if ($date === $valueLabel){
        //             $data[$valueLabel] = $temp_pengeluaran + $valuePO->qty_hri;
        //             $temp_pengeluaran = $data[$valueLabel];
        //         }
        //     }
        // }
       

        if ($request->ajax()) {
            return response()->json([
                "status" => true,
                "data_po" => $data,
            ]);
        }
    }
}
