<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\UserRole;
use Auth;
use DataTables;
use Hash;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function profile($id)
    {
        $data['user'] = User::where('id',$id)->first();
        $data['urlSubmit'] = route('update.profile',$data['user']->id);
        $data['url_profile'] = route('profile',$data['user']->id);
        return view('user.profile',$data);
    }

    public function updateProfile(Request $request,$id)
    {
        $rules = $this->model->rules['update-profile'];
        $messages = $this->model->messages['update-profile'];
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

            $user = User::where('id',$id)->first();
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            \DB::commit();

            if ($request->ajax()) {
                return response()->json([
                    "status" => true,
                    "message" => "Profile successfuly updated !",
                    "data" => null
                ]);
            }

            flash()->success('Profile updated successfuly');
            toastr()->success('Profile successfully updated!');
            return redirect()->route('profile');
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

    public function userList()
    {
        $data['users'] = User::where('name','<>','super-admin')->get();
        return view('user.user-list',$data);
    }

    public function editUser($id)
    {
        $data['user'] = User::where('id',$id)->first();
        $data['role'] = Role::where('slug','<>','super-admin')->get();
        $user_roles = UserRole::where('user_id',$data['user']->id)->with('role','user')->first();
        $data['user_roles'] = $user_roles->role;
        $data['urlSubmit'] = route('update.user',$data['user']->id);
        return view('user.user-edit',$data);
    }

    public function updateUser(Request $request,$id)
    {
        try {
            \DB::beginTransaction();
            $user = User::where('id',$id)->first();
            $user_role = UserRole::where('user_id',$user->id);
            $user->update([
                'name' => $request->input('nama'),
            ]);
            $user_role->update([
                'role_id' => $request->input('role')
            ]);

            \DB::commit();

            if ($request->ajax()) {
                return response()->json([
                    "status" => true,
                    "message" => "Data updated successfuly !",
                    "data" => null
                ]);
            }

            flash()->success('User updated successfuly');
            toastr()->success('User successfully updated!');
            return redirect()->route('users');
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

    public function deleteUser($id)
    {
        try {
            $user = User::findorfail($id);
            $user_role = UserRole::where('user_id',$user->id);

            $user->delete();
            $user_role->delete();
            toastr()->success('User successfully deleted!');
            flash()->success('User successfully deleted!');
            return redirect()->route('users');
        } catch (\Exception $e) {
            \Log::error($e);
            flash()->error('Data failed to delete');
            return redirect()->back();
        }
    }

    public function verifyUser($id)
    {
        $user = User::where('id',$id)->first();
        $user->update([
            'status' => 1
        ]);
        return redirect()->route('users');
    }

    public function datatableUsers()
    {
        $users = (new User);

        return DataTables::of($users->where('name','<>','super-admin')->get())
                        ->addColumn('nama_user', function($data){
                            $nama_user = $data->name;
                            return $nama_user;
                        })
                        ->addColumn('status', function($data){
                            if($data->status === 0 || $data->status === '0'){
                                $status = 'Belum Diverifikasi ';
                            } else {
                                $status = 'Verified';
                            }
                            
                            return $status;
                        })
                        ->addColumn('action', function($data){
                            $user = Auth::user();
                            $user_roles = UserRole::where('user_id',$user->id)->with('role','user')->first();
                            $admin_role = $user_roles->role;

                            // $show_url = route('dives.show',$data->divecenter_id);
                            $verify = route('verify.users',$data->id);
                            $edit_url = route('edit.user',$data->id);
                            $delete_url = route('delete.user',$data->id);
                            $button = '';
                            $button .= '<div class="btn-group" role="group">';
                            if ( $admin_role->slug === 'super-admin' ){
                                if ($data->status === 0 || $data->status === '0') {
                                    $button .= '<a class="btn" onclick="return confirm(\'Are you sure?\')"  href="'.$verify.'"><i class="fas fa-user-check text-success"></i></a>';
                                }
                                $button .= '<a class="btn" href="'.$edit_url.'"><i class="fa fa-edit text-warning"></i></a>';
                                $button .= '<a class="btn" onclick="return confirm(\'Are you sure?\')"  href="'.$delete_url.'"><i class="fa fa-trash text-danger"></i></a>';
                            }
                            
                            $button .= '</div>';
                            return $button;
                        })
                        ->rawColumns(['nama_user','status','action'])
                        ->addIndexColumn()
                        ->make(true);
    }
}
