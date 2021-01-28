<?php

namespace App\Http\Controllers\Panel\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

use DB;
use Auth;
use Exception;

use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next) {
            if (Auth::user()->is_admin == 0) {
                return redirect('bio-data')->send();
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $userList = User::select('*');
        if ($request->name != null)
        {
            $userList = $userList->where('name', 'like', '%'.$request->name.'%');
        }
        if ($request->username != null)
        {
            $userList = $userList->where('username', 'like', '%'.$request->username.'%');
        }
        if (is_numeric($request->status) && $request->status != null)
        {
            $userList = $userList->where('is_active', $request->status);
        }
        $userList = $userList->paginate(10);

        return view('panel.master-data.users.users', [
            'userList' => $userList
        ]);
    }

    public function create(Request $request)
    {
        try
        {
            if ($request->isMethod('post'))
            {
                DB::beginTransaction();
                $user               = new User;
                $user->name         = $request->name;
                $user->username     = $request->username;
                $user->email        = $request->email;
                $user->password     = $request->password;
                $user->password     = bcrypt($request->password);
                $user->created_by   = Auth::user()->id;
                $user->created_at   = date('Y-m-d H:i:s');
                $user->is_admin     = $request->is_admin;
                $user->is_active    = User::ACTIVE; #DEFAULT ACTIVE
                $user->save();
                DB::commit();
                
                return redirect('master-data/users')->with('success','Sukses membuat user!');
            }
            return view('panel.master-data.users.create-user', [
            ]);
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return redirect('master-data/users')->with('danger','Gagal membuat user!');
        }
    }

    public function update($id, Request $request)
    {
        try
        {
            if ($request->isMethod('post'))
            {
                DB::beginTransaction();
                $user               = User::find(Crypt::decryptString($id));
                $user->name         = $request->name;
                $user->email        = $request->email;
                if ($request->password != null) {
                    $user->password     = bcrypt($request->password);
                }
                $user->updated_by   = Auth::user()->id;
                $user->updated_at   = date('Y-m-d H:i:s');
                $user->is_admin     = $request->is_admin;
                $user->is_active    = $request->is_active;
                $user->save();
                DB::commit();
                
                return redirect('master-data/users')->with('success','Sukses mengubah user!');
            }
            
            $user = User::where('id', Crypt::decryptString($id))->first();

            return view('panel.master-data.users.update-user', [
                'user'  => $user
            ]);
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return redirect('master-data/users')->with('danger','Gagal mengubah user!');
        }
    }
}
