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
                        ->addColumn('no_project',function($data){
                            $no_project = $data->id;
                            return $no_project;
                        })                 
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
                        ->addColumn('no_project',function($data){
                            $no_project = $data->id;
                            return $no_project;
                        })                  
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
                        ->rawColumns(['no_project','tgl_sppm','target_kedatangan','file_teknis','status','action'])
                        ->addIndexColumn()
                        ->make(true);
    }

    public function grafik()
    {
        $pos = (new PO)->with('sppm');
        $pos = $pos->get();
        $data['sppm'] = array();
        foreach ($pos as $key => $value) {
            # code...
            array_push($data['sppm'],$value->sppm);
        }
        $data['urlSubmit'] = route('filter.grafik');
        return view('dashboard.grafik',$data);
    }

    public function getGrafik(Request $request)
    {
        $labels = [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10',
            '11',
            '12',
        ];

        $thisYear = Carbon::now()->format('Y');
        $data = array();
        foreach ($labels as $key => $value) {
            $data[$value] = PO::whereYear('created_at','=',$thisYear)
                                ->whereMonth('created_at','=',$value)
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
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10',
            '11',
            '12',
        ];

        if ($request->has('year')){
            $thisYear = $request->input('year');
        } else {
            $thisYear = Carbon::now()->format('Y');
        }  
        // if ($request->ajax()) {
        //     return response()->json([
        //         "status" => true,
        //         "data_po" => $request->has('year') && is_null($request->input('filter')),
        //     ]);
        // }
        
        $data = array();
        foreach ($labels as $key => $value) {
            // $month = Carbon::parse($value)->format('m');
            // $data[$value] = PO::join('sppms','sppms.id','=','pos.id_sppm')
            //                     ->where('sppms.kode_material','=',$request->input('filter'))
            //                     ->whereYear('pos.created_at','=',$thisYear)
            //                     ->whereMonth('pos.created_at','=',$value)
            //                     ->pluck('pos.qty_hri');

            $po = PO::join('sppms','sppms.id','=','pos.id_sppm');
            if (!is_null($request->input('filter')) ) {
                $po = $po->where('sppms.kode_material','=',$request->input('filter'))
                         ->whereYear('pos.created_at','=',$thisYear)
                         ->whereMonth('pos.created_at','=',$value)
                         ->pluck('pos.qty_hri');
            } else {
                $po = $po->whereYear('pos.created_at','=',$thisYear)
                         ->whereMonth('pos.created_at','=',$value)
                         ->pluck('pos.qty_hri');
            }
            $data[$value] = $po;
        }

        if ($request->ajax()) {
            return response()->json([
                "status" => true,
                "data_po" => $data,
            ]);
        }  
    }
}
