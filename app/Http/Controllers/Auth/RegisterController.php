<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use DB;
use Exception;

use App\User;

class RegisterController extends Controller
{
    public function register(Request $request)
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
                $user->password     = Hash::make($request->password);
                $user->is_admin     = 0; #DEFAULT NON ADMIN
                $user->is_active    = 1; #DEFAULT ACTIVE
                $user->created_by   = 1; #DEFAULT ADMIN KARENA REGISTRASI MANUAL
                $user->created_at   = date('Y-m-d H:i:s');
                $user->save();
                DB::commit();

                return redirect('login')->with('success','Sukses melakukan registrasi user!');
            }
            return view('auth.register');
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return redirect('register')->with('danger','Gagal melakukan registrasi user!');
        }
    }
}
