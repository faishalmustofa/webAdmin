<?php

namespace App\Http\Controllers\PO;

use App\Http\Controllers\Controller;
use App\Models\PO;
use DataTables;
use Illuminate\Http\Request;
use Validator;

class POController extends Controller
{
    public function __construct(PO $model)
    {
        $this->model = $model;
    }

    public function getPo(){
        return view('po.list-po');
    }

    public function createPo(){
        $data['form'] = [
            'route' => ['store.po'],
            'method' => 'POST',
            'enctype'=>'multipart/form-data',
            'id' => 'submitPO',
        ];
        $data['urlSubmit'] = route('store.po');
        return view('po.create-po',$data);
    }

    public function storePo(Request $request){
        $rules = $this->model->rules['po'];
        $messages = $this->model->messages['po'];

        // if ($request->ajax()) {
        //     return response()->json([
        //         "status" => true,
        //         "request" => $request->all(),
        //         "data" => null
        //     ]);
        // }
        
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
            $data = [
                'supplier' => $request->input('supplier'),
                'id_supplier' => $request->input('id_supplier'),
                'hri' => $request->input('hri'),
                'qty_hri' => $request->input('qty_hri'),
                'efisiensi' => $request->input('efisiensi'),
                'ri_ked' => $request->input('ri_ked'),
                'metode_pembayaran' => $request->input('metode_pembayaran'),
                'tempo_pembayaran' => $request->input('tempo_pembayaran'),
                'metode_penyerahan_barang' => $request->input('metode_penyerahan_barang'),
                'lokasi_penyerahan_barang' => $request->input('lokasi_penyerahan_barang'),
            ];

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

    public function editPo($id){
        return redirect()->route('po');
    }

    public function updatePo(Request $request,$id){
        return redirect()->route('po');
    }

    public function deletePo($id){
        try {
            $po = PO::findorfail($id);
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
        // $dives = (new Dive)->with(['coverageAreas.province','city','operator'])->get();
        $dives = (new PO);

        return DataTables::of($dives->get())
						
                        ->addColumn('action', function($data){
                            // $show_url = route('dives.show',$data->divecenter_id);
                            $edit_url = route('edit.po',$data->id);
                            $delete_url = route('delete.po',$data->id);
                            $button = '';
                            $button .= '<div class="btn-group" role="group">';
                            // $button .= '<a class="btn" href="'.$show_url.'"><i class="fa fa-search text-info"></i></a>';
                            $button .= '<a class="btn" href="'.$edit_url.'"><i class="fa fa-edit text-warning"></i></a>';
                            $button .= '<a class="btn" onclick="return confirm(\'Are you sure?\')"  href="'.$delete_url.'"><i class="fa fa-trash text-danger"></i></a>';
                            $button .= '</div>';
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
    }
}
