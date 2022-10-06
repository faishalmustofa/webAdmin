<?php

namespace App\Http\Controllers\SPPM;

use App\Http\Controllers\Controller;
use App\Models\SPPM;
use App\User;
use Auth;
use DataTables;
use Illuminate\Http\Request;
use Validator;

class SPPMController extends Controller
{
    public function __construct(SPPM $model)
    {
        $this->model = $model;
    }

    public function getSppm(){
        return view('sppm.list-sppm');
    }

    public function createSppm(){
        $data['form'] = [
            'route' => ['store.sppm'],
            'method' => 'POST',
            'enctype'=>'multipart/form-data',
            'id' => 'submitSPPM',
        ];
        $data['urlSubmit'] = route('store.sppm');
        $data['admin'] = Auth::user();
        return view('sppm.create-sppm',$data);
    }

    public function storeSppm(Request $request){
        $rules = $this->model->rules['sppm'];
        $messages = $this->model->messages['sppm'];

        

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
            $user = User::where('id',$request->input('id_pembuat'))->first();
            $data = [
                'id_pembuat' => $user->id,
                'no_project' => $request->input('no_project'),
                'no_sppm' => $request->input('no_sppm'),
                'no_spk' => $request->input('no_spk'),
                'uraian' => $request->input('uraian'),
                'kode_material' => $request->input('kode_material'),
                'spesifikasi' => $request->input('spesifikasi'),
                'satuan' => $request->input('satuan'),
                'qty_sppm' => $request->input('qty_sppm'),
                'hpp' => $request->input('hpp'),
                'qty_hpp' => $request->input('qty_hpp'),
                'target_kedatangan' => $request->input('target_kedatangan'),
            ];

            if ($request->hasFile('file_teknis')){
                $file_teknis = $request->file('file_teknis');
                $path = public_path() . '/assets/sppm/';
                if (!is_dir($path)){
                    \File::makeDirectory($path, 0777, true, true);
                }
                $fileName = md5(time() . $file_teknis->getClientOriginalName()).'.'.$file_teknis->extension();
                $file_teknis->move($path,$fileName);
                $data['file_teknis'] = $fileName;
            }
            SPPM::create($data);

            \DB::commit();
            if ($request->ajax()) {
                return response()->json([
                    "status" => true,
                    "message" => "Data created successfuly !",
                    "data" => null
                ],200);
            }

            flash()->success('Data created successfuly');
            return redirect()->route('sppm');
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
            return redirect()->route('create.sppm');
        }
    }

    public function editSppm($id){
        $data['sppm'] = SPPM::where('id',$id)->first();
        $data['urlSubmit'] = route('update.sppm',$data['sppm']['id']);
        $data['admin'] = User::where('id',$data['sppm']['id'])->first();
        return view('sppm.edit-sppm',$data);
    }

    public function updateSppm(Request $request,$id){
        $rules = $this->model->rules['sppm'];
        $messages = $this->model->messages['sppm'];

        if (!$request->hasFile('file_teknis')){
            $rules['file_teknis'] = "nullable";
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
            $sppm = SPPM::where('id',$id)->first();

            $sppm->update([
                'id_pembuat' => $request->input('id_pembuat'),
                'no_project' => $request->input('no_project'),
                'no_sppm' => $request->input('no_sppm'),
                'no_spk' => $request->input('no_spk'),
                'uraian' => $request->input('uraian'),
                'kode_material' => $request->input('kode_material'),
                'spesifikasi' => $request->input('spesifikasi'),
                'satuan' => $request->input('satuan'),
                'qty_sppm' => $request->input('qty_sppm'),
                'hpp' => $request->input('hpp'),
                'qty_hpp' => $request->input('qty_hpp'),
                'target_kedatangan' => $request->input('target_kedatangan'),
                'status' => $request->input('status'),
            ]);

            if ($request->hasFile('file_teknis')){
                $file_teknis = $request->file('file_teknis');
                $path = public_path() . '/assets/sppm/';
                if (!is_dir($path)){
                    \File::makeDirectory($path, 0777, true, true);
                }
                $fileName = md5(time() . $file_teknis->getClientOriginalName()).'.'.$file_teknis->extension();
                $file_teknis->move($path,$fileName);
                \File::delete($path . $sppm->file_teknis);
                $sppm->file_teknis = $fileName;
                $sppm->update();
            }

            \DB::commit();

            if ($request->ajax()) {
                return response()->json([
                    "status" => true,
                    "message" => "Data updated successfuly !",
                    "data" => null
                ]);
            }

            flash()->success('Data updated successfuly');
            return redirect()->route('sppm');
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
            return redirect()->route('edit.sppm',$id);
        }
    }

    public function deleteSppm($id){
        try {
            $sppm = SPPM::findorfail($id);
            
            $path = public_path() . '/assets/sppm/';
            
            \File::delete($path . $sppm->file_teknis);
            $sppm->delete();
            flash()->success('Data successfully deleted!');
            return redirect()->route('sppm');
        } catch (\Exception $e) {
            \Log::error($e);
            flash()->error('Data failed to delete');
            return redirect()->back();
        }
    }

    public function datatables(Request $request)
    {
        $dives = (new SPPM);

        return DataTables::of($dives->get())
                        ->addColumn('nama_pembuat', function($data){
                            $user = User::where('id',$data->id_pembuat)->first();
                            $nama_pembuat = $user->name;
                            return $nama_pembuat;
                        })
                        ->addColumn('tgl_sppm',function($data){
                            // $tgl_sppm = $data->created_at->format('d-m-Y');
                            $tgl_sppm = date($data->created_at);
                            return $tgl_sppm;
                        })
                        ->addColumn('file_teknis', function($data){
                            $url = asset('assets/sppm/'.$data->file_teknis);
                            $link = '';
                            $link .= '<a href="'.$url.'">'.$data->file_teknis.'</a>';
                            return $link;
                        })
                        ->addColumn('status',function($data){
                            if($data->status == 0){
                                $status = 'Diproses';
                            } else {
                                $status = 'DONE';
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
                        ->rawColumns(['nama_pembuat','tgl_sppm','file_teknis','status','action'])
                        ->addIndexColumn()
                        ->make(true);
    }
}
