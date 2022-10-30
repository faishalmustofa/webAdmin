<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\UserRole;
use Auth;
use DataTables;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
