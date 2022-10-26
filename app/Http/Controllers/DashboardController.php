<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PO;
use App\Models\SPPM;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DataTables;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::check();
        if (!$user){
            return redirect()->route('login');
        }
        return view('dashboard.index');
    }

    public function datatableDiproses()
    {
        $dives = (new SPPM);
        $dives = $dives->where('status','<>', 6);

        return DataTables::of($dives->get())
                        ->addColumn('tgl_sppm',function($data){
                            $tgl_sppm = Carbon::parse($data->created_at)->format('d-m-Y');
                            return $tgl_sppm;
                        })
                        ->addColumn('target_kedatangan',function($data){
                            $target_kedatangan = Carbon::parse($data->target_kedatangan)->format('d-m-Y');
                            return $target_kedatangan;
                        })
                        ->addColumn('file_teknis', function($data){
                            $url = asset('assets/sppm/'.$data->file_teknis);
                            $link = '';
                            $link .= '<a href="'.$url.'">'.$data->file_teknis.'</a>';
                            return $link;
                        })
                        ->addColumn('status',function($data){
                            $detail_proses = route('detail.proses.sppm',$data->id);
                            $status = '';
                            if($data->status === 6){
                                $status .= '<a href="'.$detail_proses.'">Selesai</a>';
                            } else {
                                $status .= '<a href="'.$detail_proses.'">Diproses</a>';
                            }
                            return $status;
                        })
                        ->addColumn('action', function($data){
                            // $show_url = route('dives.show',$data->divecenter_id);
                            $edit_url = route('edit.sppm',$data->id);
                            $delete_url = route('delete.sppm',$data->id);
                            $button = '';
                            $button .= '<div class="btn-group" role="group">';
                            // $button .= '<a class="btn" href="'.$show_url.'"><i class="fa fa-search text-info"></i></a>';
                            $button .= '<a class="btn" href="'.$edit_url.'"><i class="fa fa-edit text-warning"></i></a>';
                            $button .= '<a class="btn" onclick="return confirm(\'Are you sure?\')"  href="'.$delete_url.'"><i class="fa fa-trash text-danger"></i></a>';
                            $button .= '</div>';
                            return $button;
                        })
                        ->rawColumns(['tgl_sppm','target_kedatangan','file_teknis','status','action'])
                        ->addIndexColumn()
                        ->make(true);
    }

    public function datatableSelesai()
    {
        $dives = (new SPPM);
        $dives = $dives->where('status','=', 6);
        return DataTables::of($dives->get())
                        ->addColumn('tgl_sppm',function($data){
                            $tgl_sppm = Carbon::parse($data->created_at)->format('d-m-Y');
                            return $tgl_sppm;
                        })
                        ->addColumn('target_kedatangan',function($data){
                            $target_kedatangan = Carbon::parse($data->target_kedatangan)->format('d-m-Y');
                            return $target_kedatangan;
                        })
                        ->addColumn('file_teknis', function($data){
                            $url = asset('assets/sppm/'.$data->file_teknis);
                            $link = '';
                            $link .= '<a href="'.$url.'">'.$data->file_teknis.'</a>';
                            return $link;
                        })
                        ->addColumn('status',function($data){
                            $detail_proses = route('detail.proses.sppm',$data->id);
                            $status = '';
                            if($data->status === 6){
                                $status .= '<a href="'.$detail_proses.'">Selesai</a>';
                            } else {
                                $status .= '<a href="'.$detail_proses.'">Diproses</a>';
                            }
                            return $status;
                        })
                        ->addColumn('action', function($data){
                            // $show_url = route('dives.show',$data->divecenter_id);
                            $edit_url = route('edit.sppm',$data->id);
                            $delete_url = route('delete.sppm',$data->id);
                            $button = '';
                            $button .= '<div class="btn-group" role="group">';
                            // $button .= '<a class="btn" href="'.$show_url.'"><i class="fa fa-search text-info"></i></a>';
                            $button .= '<a class="btn" href="'.$edit_url.'"><i class="fa fa-edit text-warning"></i></a>';
                            $button .= '<a class="btn" onclick="return confirm(\'Are you sure?\')"  href="'.$delete_url.'"><i class="fa fa-trash text-danger"></i></a>';
                            $button .= '</div>';
                            return $button;
                        })
                        ->rawColumns(['tgl_sppm','target_kedatangan','file_teknis','status','action'])
                        ->addIndexColumn()
                        ->make(true);
    }

    public function grafik(){
        $pos = PO::with('sppm')->get();
        $data['sppm'] = SPPM::where('status','=',6)->get();
        $data['urlSubmit'] = route('filter.grafik');
        return view('dashboard.grafik',$data);
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

        if ($request->ajax()) {
            return response()->json([
                "status" => true,
                "data_po" => $data,
            ]);
        }
    }

    public function filterGrafik(Request $request)
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

        $thisYear = Carbon::now()->format('Y');
        $data = array();
        foreach ($labels as $key => $value) {
            $month = Carbon::parse($value)->format('m');
            $data[(int)$month] = PO::join('sppms','sppms.id','=','pos.id_sppm')
                                ->where('sppms.kode_material','=',$request->input('filter'))
                                ->whereYear('pos.created_at','=',$thisYear)
                                ->whereMonth('pos.created_at','=',(int)$month)
                                ->pluck('pos.qty_hri');
        }

        if ($request->ajax()) {
            return response()->json([
                "status" => true,
                "data" => $data,
            ]);
        }  
    }
}
