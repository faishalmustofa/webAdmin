<?php

namespace App\Http\Controllers\DSM;

use DataTables;
use App\Http\Controllers\Controller;
use App\Models\DSM;
use App\UserRole;
use Auth;
use Illuminate\Http\Request;
use JeroenNoten\LaravelAdminLte\View\Components\Widget\Alert;
use Validator;
use Yoeunes\Toastr\Toastr as toastr;

class DSMController extends Controller
{
    public function __construct(DSM $model)
    {
        $this->model = $model;
    }

    public function getDsm()
    {
        return view('dsm.list-dsm');
    }

    public function createDsm()
    {
        $user = Auth::user();
        $user_roles = UserRole::where('user_id',$user->id)->with('role','user')->first();
        $admin_role = $user_roles->role;
        if ($admin_role->slug === 'produksi'){
            toastr()->error('Anda tidak memiliki akses untuk ke halaman ini.');
            return redirect()->route('dsm');
        }
        $data['form'] = [
            'route' => ['store.dsm'],
            'method' => 'POST',
            'enctype'=>'multipart/form-data',
            'id' => 'submitDSM',
        ];
        $data['urlSubmit'] = route('store.dsm');
        return view('dsm.create-dsm',$data);
    }

    public function storeDsm(Request $request)
    {
        $rules = $this->model->rules['dsm'];
        $messages = $this->model->messages['dsm'];

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
                'id_pemasok' => $request->input('id_pemasok'),
                'supplier' => $request->input('supplier'),
                'nama_barang' => $request->input('nama_barang'),
                'alamat' => $request->input('alamat'),
                'pic' => $request->input('pic'),
                'no_telp' => $request->input('no_telp'),
                'no_kantor' => $request->input('no_kantor'),
                'email' => $request->input('email'),
            ];

            if ($request->hasFile('file_prakualifikasi')){
                $file_prakualifikasi = $request->file('file_prakualifikasi');
                $path = public_path() . '/assets/dsm/';
                if (!is_dir($path)){
                    \File::makeDirectory($path, 0777, true, true);
                }
                $fileName = md5(time() . $file_prakualifikasi->getClientOriginalName()).'.'.$file_prakualifikasi->extension();
                $file_prakualifikasi->move($path,$fileName);
                $data['file_prakualifikasi'] = $fileName;
            }
            DSM::create($data);

            \DB::commit();
            if ($request->ajax()) {
                return response()->json([
                    "status" => true,
                    "message" => "Data created successfuly !",
                    "data" => null
                ]);
            }

            flash()->success('Data created successfuly');
            return redirect()->route('dsm');
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
            return redirect()->route('create.dsm');
        }
    }

    public function editDsm($id)
    {
        $data['dsm'] = DSM::where('id',$id)->first();
        $data['urlSubmit'] = route('update.dsm',$data['dsm']['id']);
        return view('dsm.edit-dsm',$data);
    }

    public function updateDsm(Request $request,$id)
    {
        $rules = $this->model->rules['dsm'];
        $messages = $this->model->messages['dsm'];

        if (!$request->hasFile('file_prakualifikasi')){
            $rules['file_prakualifikasi'] = "nullable";
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
            $dsm = DSM::where('id',$id)->first();

            $dsm->update([
                'id_pemasok' => $request->input('id_pemasok'),
                'supplier' => $request->input('supplier'),
                'nama_barang' => $request->input('nama_barang'),
                'alamat' => $request->input('alamat'),
                'pic' => $request->input('pic'),
                'no_telp' => $request->input('no_telp'),
                'no_kantor' => $request->input('no_kantor'),
                'email' => $request->input('email'),
            ]);

            if ($request->hasFile('file_prakualifikasi')){
                $file_prakualifikasi = $request->file('file_prakualifikasi');
                $path = public_path() . '/assets/dsm/';
                if (!is_dir($path)){
                    \File::makeDirectory($path, 0777, true, true);
                }
                $fileName = md5(time() . $file_prakualifikasi->getClientOriginalName()).'.'.$file_prakualifikasi->extension();
                $file_prakualifikasi->move($path,$fileName);
                \File::delete($path . $dsm->file_prakualifikasi);
                $dsm->file_prakualifikasi = $fileName;
                $dsm->update();
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
            return redirect()->route('dsm');
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
            return redirect()->route('edit.dsm',$id);
        }
    }

    public function deleteDsm($id)
    {
        try {
            $dsm = DSM::findorfail($id);
            
            $path = public_path() . '/assets/dsm/';
            
            \File::delete($path . $dsm->file_prakualifikasi);
            $dsm->delete();
            flash()->success('Data successfully deleted!');
            return redirect()->route('dsm');
        } catch (\Exception $e) {
            \Log::error($e);
            flash()->error('Data failed to delete');
            return redirect()->route('dsm');
        }
    }

    public function datatables(Request $request)
    {
        $dsm = (new DSM);

        return DataTables::of($dsm->get())
                        ->addColumn('id_pemasok', function($data){
                            $id_pemasok = $data->id;
                            return $id_pemasok;
                        })                
                        ->addColumn('file_prakualifikasi', function($data){
                            $url = asset('assets/dsm/'.$data->file_prakualifikasi);
                            $link = '';
                            $link .= '<a href="'.$url.'">'.$data->file_prakualifikasi.'</a>';
                            return $link;
                        })
                        ->addColumn('action', function($data){
                            $user = Auth::user();
                            $user_roles = UserRole::where('user_id',$user->id)->with('role','user')->first();
                            $admin_role = $user_roles->role;

                            // $show_url = route('dives.show',$data->divecenter_id);
                            $edit_url = route('edit.dsm',$data->id);
                            $delete_url = route('delete.dsm',$data->id);
                            $button = '';
                            $button .= '<div class="btn-group" role="group">';
                            if ($admin_role->slug === 'pengadaan'){
                                // $button .= '<a class="btn" href="'.$show_url.'"><i class="fa fa-search text-info"></i></a>';
                                $button .= '<a class="btn" href="'.$edit_url.'"><i class="fa fa-edit text-warning"></i></a>';
                                $button .= '<a class="btn" onclick="return confirm(\'Are you sure?\')"  href="'.$delete_url.'"><i class="fa fa-trash text-danger"></i></a>';
                            }
                            
                            $button .= '</div>';
                            return $button;
                        })
                        ->rawColumns(['id_pemasok','file_prakualifikasi','action'])
                        ->addIndexColumn()
                        ->make(true);
    }


    public function testView()
    {
        return view();
    }

    public function printDSM()
    {

    }
}
