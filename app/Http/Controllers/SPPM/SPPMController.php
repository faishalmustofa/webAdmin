<?php

namespace App\Http\Controllers\SPPM;

use App\Http\Controllers\Controller;
use App\Models\ProsesSPPM;
use App\Models\SPPM;
use App\Role;
use App\User;
use App\UserRole;
use Auth;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use Validator;
use Barryvdh\DomPDF\Facade as PDF;

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
        $user = Auth::user();
        $user_roles = UserRole::where('user_id',$user->id)->with('role','user')->first();
        $data['admin_role'] = $user_roles->role;
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

        $data = $request->all();
        foreach ($data as $key => $value) {
            if (($key === 'hpp') || ($key === 'qty_hpp')){
                $data[$key] = (int)$value;
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
            $user = User::where('id',$request->input('id_pembuat'))->first();
            $data['id_pembuat'] = $user->id;

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
            
            $sppm = SPPM::create($data);
            
            if ($sppm->status === '6'){
                ProsesSPPM::create([
                    'id_sppm' => $sppm->id,
                    'tgl_proses_1' => Carbon::now(),
                    'tgl_proses_2' => Carbon::now(),
                    'tgl_proses_3' => Carbon::now(),
                    'tgl_proses_4' => Carbon::now(),
                    'tgl_proses_5' => Carbon::now(),
                    'tgl_proses_6' => Carbon::now(),
                    'status' => $sppm->status
                ]);
            } else {
                ProsesSPPM::create([
                    'id_sppm' => $sppm->id,
                    'status' => $sppm->status
                ]);
            }

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
        $user = Auth::user();
        $user_roles = UserRole::where('user_id',$user->id)->with('role','user')->first();
        $data['admin_role'] = $user_roles->role;
        $data['sppm'] = SPPM::where('id',$id)->first();
        $data['sppm']['target_kedatangan'] = Carbon::parse($data['sppm']['target_kedatangan'])->format('Y-m-d');
        $data['urlSubmit'] = route('update.sppm',$data['sppm']['id']);
        $data['admin'] = User::where('id',$data['sppm']['id_pembuat'])->first();
        return view('sppm.edit-sppm',$data);
    }

    public function updateSppm(Request $request,$id){
        $rules = $this->model->rules['sppm'];
        $messages = $this->model->messages['sppm'];

        if (!$request->hasFile('file_teknis')){
            $rules['file_teknis'] = "nullable";
        } 

        $data = $request->all();
        foreach ($data as $key => $value) {
            if (($key === 'hpp') || ($key === 'qty_hpp')){
                $data[$key] = (int)$value;
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
        // if ($request->ajax()) {
        //     return response()->json([
        //         "status" => true,
        //         "message" => "Data updated successfuly !",
        //         "data" => $request->all()
        //     ]);
        // }
        try {
            \DB::beginTransaction();
            $sppm = SPPM::where('id',$id)->first();

            if ($request->hasFile('file_teknis')){
                $file_teknis = $request->file('file_teknis');
                $path = public_path() . '/assets/sppm/';
                if (!is_dir($path)){
                    \File::makeDirectory($path, 0777, true, true);
                }
                $fileName = md5(time() . $file_teknis->getClientOriginalName()).'.'.$file_teknis->extension();
                $file_teknis->move($path,$fileName);
                \File::delete($path . $sppm->file_teknis);
                $data['file_teknis'] = $fileName;
            } else {
                $data['file_teknis'] = $sppm->file_teknis;
            }
            
            $sppm->update($data);

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

    public function detailProsesSPPM($id){
        $user = Auth::user();
        $user_roles = UserRole::where('user_id',$user->id)->with('role','user')->first();
        $data['admin_role'] = $user_roles->role;
        $data['proses_sppm'] = ProsesSPPM::where('id_sppm',$id)->with('sppm')->first();
        $data['created_at'] = $data['proses_sppm']['sppm']['created_at']->locale('id')->translatedFormat('d F Y, H:i:s');
        
        $data['tgl_proses_1'] = is_null($data['proses_sppm']['tgl_proses_1']) ? null :  Carbon::parse($data['proses_sppm']['tgl_proses_1'])->locale('id')->translatedFormat('d F Y, H:i:s');
        $data['tgl_proses_2'] = is_null($data['proses_sppm']['tgl_proses_2']) ? null :  Carbon::parse($data['proses_sppm']['tgl_proses_2'])->locale('id')->translatedFormat('d F Y, H:i:s');
        $data['tgl_proses_3'] = is_null($data['proses_sppm']['tgl_proses_3']) ? null :  Carbon::parse($data['proses_sppm']['tgl_proses_3'])->locale('id')->translatedFormat('d F Y, H:i:s');
        $data['tgl_proses_4'] = is_null($data['proses_sppm']['tgl_proses_4']) ? null :  Carbon::parse($data['proses_sppm']['tgl_proses_4'])->locale('id')->translatedFormat('d F Y, H:i:s');
        $data['tgl_proses_5'] = is_null($data['proses_sppm']['tgl_proses_5']) ? null :  Carbon::parse($data['proses_sppm']['tgl_proses_5'])->locale('id')->translatedFormat('d F Y, H:i:s');
        $data['tgl_proses_6'] = is_null($data['proses_sppm']['tgl_proses_6']) ? null :  Carbon::parse($data['proses_sppm']['tgl_proses_6'])->locale('id')->translatedFormat('d F Y, H:i:s');
        
        $data['urlSubmit'] = route('update.proses.sppm',$data['proses_sppm']['id']);
        return view('sppm.detail-proses-sppm',$data);
    }

    public function updateProsesSPPM(Request $request,$id){

        $proses_sppm = ProsesSPPM::where('id',$id)->with('sppm')->first();
        if ($request->input('proses') - $proses_sppm->status > 1){
            $messages = 'Pilih proses sesuai urutan';
            if ($request->ajax()) {
                return response()->json([
                    'messages' => $messages,
                    'status' => false
                ], 200);
            }
            return back()->withInput()->withErrors($messages);
        }

        try {
            \DB::beginTransaction();
            $proses_sppm = ProsesSPPM::where('id',$id)->with('sppm')->first();
            $sppm = $proses_sppm->sppm;
            $proses = (int) $request->input('proses');
            $tgl_proses = 'tgl_proses_'. $proses;

            if ($proses != 0) {
                $proses_sppm->update([
                    'status' => $proses,
                    'deskripsi' => $request->input('deskripsi'),
                    $tgl_proses => Carbon::now()
                ]);
                $sppm->update([
                    'status' => $proses
                ]);
            }
            
            $route = route('detail.proses.sppm',$sppm->id);

            \DB::commit();

            if ($request->ajax()) {
                return response()->json([
                    "status" => true,
                    "message" => "Proses diperbarui !",
                    "route" => $route,
                    "data" => null
                ]);
            }

            flash()->success('Data updated successfuly');
            return redirect()->route('detail.proses.sppm');
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

    public function datatables(Request $request)
    {
        $dives = (new SPPM);

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
                        ->addColumn('print',function($data){
                            $route = route('get.print.sppm',$data->id);
                            $print = '<a href="'.$route.'"><i class="fas fa-print"></i></a>';
                            return $print;
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
                        ->rawColumns(['no_project','tgl_sppm','target_kedatangan','file_teknis','status','print','action'])
                        ->addIndexColumn()
                        ->make(true);
    }

    public function getPrintSPPM($id)
    {
        $data['sppm'] = SPPM::where('id',$id)->first();
        $data['target_kedatangan'] = Carbon::parse($data['sppm']->targer_kedatangan)->format('d-M-Y');
        // dd($target_kedatangan);
        return view('sppm.print-sppm',$data);
    }
}
