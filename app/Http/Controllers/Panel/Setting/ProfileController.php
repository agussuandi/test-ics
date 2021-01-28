<?php

namespace App\Http\Controllers\Panel\Setting;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

use DB;
use Auth;
use Hash;
use Exception;

use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->isMethod('post'))
        {
            try 
            {
                if (!(Hash::check($request->old_password, Auth::user()->password)))
                {
                    return redirect('setting/change-password')->with('danger', 'Password lama tidak sesuai dengan data, mohon masukan password lama dengan benar');
                }

                if(strcmp($request->old_password, $request->new_password) == 0)
                {
                    return redirect('setting/change-password')->with('danger', 'Password baru tidak boleh sama dengan password lama, mohon masukan password baru yang berbeda');
                }

                if (!strcmp($request->confirm_password, $request->new_password) == 0)
                {
                    return redirect('setting/change-password')->with('danger', 'Password baru dan password konfirmasi tidak sama, mohon masukan dengan benar');
                }

                DB::beginTransaction();
                $modelUser = User::find(Auth::user()->id);
                $modelUser->password = bcrypt($request->confirm_password);
                $modelUser->updated_by = Auth::user()->id;
                $modelUser->updated_at = date('Y-m-d H:i:s');
                $modelUser->save();
                DB::commit();

                return redirect('setting/change-password')->with('success', 'Password berhasil diubah');
            }
            catch(Exception $e)
            {
                DB::rollBack();
                return redirect('setting/change-password')->with('danger', 'Password gagal diubah');
            }
        }

        return view('panel.setting.change-password');
    }
}