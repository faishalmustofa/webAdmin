<?php

namespace App\Http\Controllers\PO;

use App\Http\Controllers\Controller;
use App\Models\DSM;
use App\Models\PO;
use App\Models\SPPM;
use App\UserRole;
use Auth;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use Seld\PharUtils\Timestamps;
use Validator;

class POController extends Controller
{
    public function __construct(PO $model)
    {
        $this->model = $model;
    }

    public function getPo()
    {
        return view('po.list-po');
    }

    public function createPo()
    {
        $user = Auth::user();
        $user_roles = UserRole::where('user_id',$user->id)->with('role','user')->first();
        $admin_role = $user_roles->role;
        if ($admin_role->slug === 'produksi' || $admin_role->slug === 'super-admin'){
            toastr()->error('Anda tidak memiliki akses untuk ke halaman ini.');
            return redirect()->route('po');
        }

        $data['sppm'] = SPPM::get();
        $data['dsm'] = DSM::get();
        $data['form'] = [
            'route' => ['store.po'],
            'method' => 'POST',
            'enctype'=>'multipart/form-data',
            'id' => 'submitPO',
        ];
        $data['urlSubmit'] = route('store.po');
        return view('po.create-po',$data);
    }

    public function storePo(Request $request)
    {
        $rules = $this->model->rules['po'];
        $messages = $this->model->messages['po'];

        $data = $request->all();
        foreach ($data as $key => $value) {
            if (($key === 'hri') || ($key === 'qty_hri') || ($key === 'penawaran')){
                if (!is_null($value)){
                    $data[$key] = (int)$value;
                }
            }
        }
        $validator = Validator::make($data, $rules, $messages);
        if($validator->fails()){
            if ($request->ajax()) {
                return response()->json([
                    'messages' => $validator->messages(),
                    'status' => false
                ], 200);
            }
            return back()->withInput()->withErrors($validator);
        }
        try {
            \DB::beginTransaction();

            if ($request->hasFile('dokumen_kontrak')){
                $dokumen_kontrak = $request->file('dokumen_kontrak');
                $path = public_path() . '/assets/po/';
                if (!is_dir($path)){
                    \File::makeDirectory($path, 0777, true, true);
                }
                $fileName = md5(time() . $dokumen_kontrak->getClientOriginalName()).'.'.$dokumen_kontrak->extension();
                $dokumen_kontrak->move($path,$fileName);
                $data['dokumen_kontrak'] = $fileName;
            }
            $dsm = DSM::where('id',$request->input('supplier'))->first();
            $data['id_dsm'] = $request->input('supplier');
            $data['supplier'] = $dsm->supplier;
            PO::create($data);

            \DB::commit();
            if ($request->ajax()) {
                return response()->json([
                    "status" => true,
                    "message" => "Data created successfuly !",
                    "data" => null
                ]);
            }

            flash()->success('Data created successfuly');
            return redirect()->route('po');
        } catch (\Exception $e) {
            \Log::error($e);
            \DB::rollback();
            if (request()->ajax()) {
                return response()->json([
                    "success" => false,
                    "message" => $e->getMessage(),
                    "data" => null
                ]);
            }

            flash()->error('Something went wrong. Failed to submit data.');
            return redirect()->route('create.po');
        }
        
    }

    public function editPo($id)
    {
        $data['sppm'] = SPPM::get();
        $data['dsm'] = DSM::get();
        $data['po'] = PO::where('id',$id)->first();
        $data['po']['ri_ked'] = Carbon::parse($data['po']['ri_ked'])->format('Y-m-d');
        $data['po']['tgl_penawaran'] = Carbon::parse($data['po']['tgl_penawaran'])->format('Y-m-d');
        $data['urlSubmit'] = route('update.po',$data['po']['id']);
        return view('po.edit-po',$data);
    }

    public function updatePo(Request $request,$id)
    {
        $rules = $this->model->rules['po'];
        $messages = $this->model->messages['po'];

        if (!$request->hasFile('dokumen_kontrak')){
            $rules['dokumen_kontrak'] = "nullable";
        } 

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            if ($request->ajax()) {
                return response()->json([
                    'messages' => $validator->messages(),
                    'status' => false
                ], 200);
            }
            return back()->withInput()->withErrors($validator);
        }

        try {
            \DB::beginTransaction();
            $po = PO::where('id',$id)->first();
            $dsm = DSM::where('id',$request->input('supplier'))->first();
            $supplier = $dsm->supplier;

            $po->update([
                'supplier' => $supplier,
                'id_supplier' => $request->input('id_supplier'),
                'hri' => $request->input('hri'),
                'qty_hri' => $request->input('qty_hri'),
                'efisiensi' => $request->input('efisiensi'),
                'ri_ked' => $request->input('ri_ked'),
                'metode_pembayaran' => $request->input('metode_pembayaran'),
                'tempo_pembayaran' => $request->input('tempo_pembayaran'),
                'metode_penyerahan_barang' => $request->input('metode_penyerahan_barang'),
                'lokasi_penyerahan_barang' => $request->input('lokasi_penyerahan_barang'),
                'penawaran' => $request->input('penawaran'),
                'tgl_penawaran' => $request->input('tgl_penawaran'),
            ]);

            if ($request->hasFile('dokumen_kontrak')){
                $dokumen_kontrak = $request->file('dokumen_kontrak');
                $path = public_path() . '/assets/po/';
                if (!is_dir($path)){
                    \File::makeDirectory($path, 0777, true, true);
                }
                $fileName = md5(time() . $dokumen_kontrak->getClientOriginalName()).'.'.$dokumen_kontrak->extension();
                $dokumen_kontrak->move($path,$fileName);
                \File::delete($path . $po->dokumen_kontrak);
                $po->dokumen_kontrak = $fileName;
                $po->update();
            }

            \DB::commit();

            if ($request->ajax()) {
                return response()->json([
                    "status" => true,
                    "message" => "Data updated successfuly !",
                    "data" => null
                ]);
            }

            flash()->success('Data created successfuly');
            return redirect()->route('po');
        } catch (\Exception $e) {
            \Log::error($e);
            \DB::rollback();
            if (request()->ajax()) {
                return response()->json([
                    "success" => false,
                    "message" => $e->getMessage(),
                    // "message" => "Something went wrong. Failed to submit data.",
                    "data" => null
                ]);
            }

            flash()->error('Something went wrong. Failed to submit data.');
            return redirect()->route('edit.po',$id);
        }
    }

    public function deletePo($id)
    {
        try {
            $po = PO::findorfail($id);
            
            $path = public_path() . '/assets/po/';
            
            \File::delete($path . $po->dokumen_kontrak);
            $po->delete();
            flash()->success('Data successfully deleted!');
            return redirect()->route('po');
        } catch (\Exception $e) {
            \Log::error($e);
            flash()->error('Data failed to delete');
            return redirect()->route('po');
        }
    }

    public function datatables(Request $request)
    {
        $dives = (new PO)->with('sppm');

        return DataTables::of($dives->get())
                        ->addColumn('nama_project', function($data){
                            $sppm = $data->sppm;
                            $nama_project = $sppm->nama_project;
                            return $nama_project;
                        })                
                        ->addColumn('no_project', function($data){
                            $sppm = $data->sppm;
                            $no_project = $sppm->id;
                            return $no_project;
                        })
                        ->addColumn('no_sppm', function($data){
                            $sppm = $data->sppm;
                            $no_sppm = $sppm->no_sppm;
                            return $no_sppm;
                        })
                        ->addColumn('no_po', function($data){
                            $no_po = $data->id;
                            return $no_po;
                        })
                        ->addColumn('tgl_po', function($data){
                            $tgl_po = Carbon::parse($data->created_at)->format('d-m-Y');
                            return $tgl_po;
                        })
                        ->addColumn('hri', function($data){
                            $hri = number_format($data->hri);
                            return $hri;
                        })
                        ->addColumn('efisiensi', function($data){
                            if ($data->efisiensi === 0){
                                $efisiensi = 'Efisiensi';
                            } else {
                                $efisiensi = 'Inefisiensi';
                            }
                            return $efisiensi;
                        })
                        ->addColumn('qty_hri', function($data){
                            $qty_hri = number_format($data->qty_hri);
                            return $qty_hri;
                        })
                        ->addColumn('ri_ked', function($data){
                            $ri_ked = Carbon::parse($data->ri_ked)->format('d-m-Y');
                            return $ri_ked;
                        })
                        ->addColumn('dokumen_kontrak', function($data){
                            $url = asset('assets/po/'.$data->dokumen_kontrak);
                            $link = '';
                            // $link .= '<a href="'.$url.'">'.$data->dokumen_kontrak.'</a>';
                            $link .= '<a href="'.$url.'">View File</a>';
                            return $link;
                        })
                        ->addColumn('print',function($data){
                            $user = Auth::user();
                            $user_roles = UserRole::where('user_id',$user->id)->with('role','user')->first();
                            $admin_role = $user_roles->role;
                            $print = '';

                            if ($admin_role->slug != 'super-admin'){
                                $route = route('get.print.po',$data->id);
                                $print = '<a href="'.$route.'"><i class="fas fa-print"></i></a>';
                            }
                            
                            return $print;
                        })
                        ->addColumn('action', function($data){
                            $user = Auth::user();
                            $user_roles = UserRole::where('user_id',$user->id)->with('role','user')->first();
                            $admin_role = $user_roles->role;

                            // $show_url = route('dives.show',$data->divecenter_id);
                            $edit_url = route('edit.po',$data->id);
                            $delete_url = route('delete.po',$data->id);
                            $button = '';
                            $button .= '<div class="btn-group" role="group">';
                            if ( ($admin_role->slug === 'pengadaan') ){
                                // $button .= '<a class="btn" href="'.$show_url.'"><i class="fa fa-search text-info"></i></a>';
                                $button .= '<a class="btn" href="'.$edit_url.'"><i class="fa fa-edit text-warning"></i></a>';
                                $button .= '<a class="btn" onclick="return confirm(\'Are you sure?\')"  href="'.$delete_url.'"><i class="fa fa-trash text-danger"></i></a>';
                            }
                            $button .= '</div>';
                            return $button;
                        })
                        ->rawColumns(['no_po','tgl_po','hri','qty_hri','efisiensi','ri_ked','dokumen_kontrak','print','action'])
                        ->addIndexColumn()
                        ->make(true);
    }

    public function getPrintPO($id)
    {
        $data['po'] = PO::where('id',$id)->with('sppm')->first();
        $data['tgl_po'] = Carbon::parse($data['po']->created_at)->format('d-M-Y');
        $data['tahun_po'] = Carbon::parse($data['po']->created_at)->format('Y');
        $data['ri_ked'] = Carbon::parse($data['po']->ri_ked)->format('d-M-Y');
        $data['penawaran'] = number_format($data['po']->penawaran);
        $data['tgl_penawaran'] = Carbon::parse($data['po']->tgl_penawaran)->format('d-M-Y');
        $jumlah = $data['po']->qty_hri;
        $ppn = $jumlah * 11/100;
        $data['total'] = number_format($jumlah + $ppn);
        $data['jumlah'] = number_format($jumlah);
        $data['ppn'] = number_format($ppn);

        $data['sppm'] = $data['po']->sppm;
        $data['sppm']['hpp'] = number_format($data['sppm']->hpp);
        $data['sppm']['qty_hpp'] = number_format($data['sppm']->qty_hpp);
        $data['bulan_sppm'] = Carbon::parse($data['sppm']->created_at)->format('F');
        $data['target_kedatangan'] = Carbon::parse($data['sppm']->target_kedatangan)->format('d-M-Y');
        
        $data['dsm'] = $data['po']->dsm;
        
        return view('po.print-po',$data);
    }
}
