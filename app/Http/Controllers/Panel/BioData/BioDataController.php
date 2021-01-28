<?php

namespace App\Http\Controllers\Panel\BioData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

use DB;
use Auth;
use Exception;

use App\Models\Panel\BioData\BioData;
use App\Models\Panel\BioData\BioDataPekerjaan;
use App\Models\Panel\BioData\BioDataPelatihan;
use App\Models\Panel\BioData\BioDataPendidikan;

class BioDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $bioData = BioData::select('trans_h_biodata.id', 'trans_h_biodata.first_name', 'trans_h_biodata.last_name', 'trans_h_biodata.birth_place', 'trans_h_biodata.birth_date', 'trans_h_biodata.applied_position')->distinct();
        if (Auth::user()->is_admin == 0)
        {
            $bioData = $bioData->where('trans_h_biodata.created_by', Auth::user()->id);
        }
        if ($request->name != null)
        {
            $bioData = $bioData->where('first_name', 'like', '%'.$request->name.'%')->orWhere('last_name', 'like', '%'.$request->name.'%');
        }
        if ($request->pendidikan != null)
        {
            $bioData = $bioData->where('trans_d_biodata_pendidikan.jenjang', $request->pendidikan);
        }
        if ($request->position != null)
        {
            $bioData = $bioData->where('applied_position', 'like', '%'.$request->position.'%');
        }
        $bioData = $bioData->leftJoin('trans_d_biodata_pendidikan', 'trans_h_biodata.id', '=', 'trans_d_biodata_pendidikan.id_h_bio_data')->paginate(10);

        return view('panel.bio-data.bio-data', [
            'bioData' => $bioData
        ]);
    }

    public function view(Request $request, $id)
    {
        $bioData = BioData::find(Crypt::decryptString($id));
        
        return view('panel.bio-data.view-bio-data', [
            'bioData' => $bioData
        ]);
    }

    public function create(Request $request)
    {
        try
        {
            if ($request->isMethod('post'))
            {
                DB::beginTransaction();
                $bioData                    = new BioData;
                $bioData->first_name        = $request->first_name;
                $bioData->last_name         = $request->last_name;
                $bioData->birth_place       = $request->birth_place;
                $bioData->birth_date        = $request->birth_date;
                $bioData->address           = $request->address;
                $bioData->city              = $request->city;
                $bioData->home_phone        = $request->home_phone;
                $bioData->cell_phone        = $request->cell_number;
                $bioData->email             = $request->email;
                $bioData->applied_position  = $request->applied_position;
                $bioData->expected_salary   = $request->expected_salary;
                $bioData->skill             = $request->skill;
                $bioData->created_by        = Auth::user()->id;
                $bioData->created_at        = date('Y-m-d H:i:s');
                $bioData->save();

                foreach ($request->jenjang as $keyJenjang => $valJenjang)
                {
                    $bioDataPendidikan                  = new BioDataPendidikan;
                    $bioDataPendidikan->id_h_bio_data   = $bioData->id;
                    $bioDataPendidikan->jenjang         = $valJenjang;
                    $bioDataPendidikan->nama_intitusi   = $request->intitusi[$keyJenjang];
                    $bioDataPendidikan->jurusan         = $request->jurusan[$keyJenjang];
                    $bioDataPendidikan->tahun_lulus     = $request->tahunPendidikan[$keyJenjang];
                    $bioDataPendidikan->ipk             = $request->ipk[$keyJenjang];
                    $bioDataPendidikan->created_by      = Auth::user()->id;
                    $bioDataPendidikan->created_at      = date('Y-m-d H:i:s');
                    $bioDataPendidikan->save();
                }

                foreach ($request->pelatihan as $keyPelatihan => $valPelatihan)
                {
                    $bioDataPelatihan                  = new BioDataPelatihan;
                    $bioDataPelatihan->id_h_bio_data   = $bioData->id;
                    $bioDataPelatihan->nama_pelatihan  = $valPelatihan;
                    $bioDataPelatihan->sertifikat      = $request->sertifikat[$keyPelatihan];
                    $bioDataPelatihan->tahun_lulus     = $request->tahunPelatihan[$keyPelatihan];
                    $bioDataPelatihan->created_by      = Auth::user()->id;
                    $bioDataPelatihan->created_at      = date('Y-m-d H:i:s');
                    $bioDataPelatihan->save();
                }

                foreach ($request->perusahaan as $keyPerusahaan => $valPerusahaan)
                {
                    $bioDataPerusahaan                      = new BioDataPekerjaan;
                    $bioDataPerusahaan->id_h_bio_data       = $bioData->id;
                    $bioDataPerusahaan->nama_perusahaan     = $valPerusahaan;
                    $bioDataPerusahaan->posisi_terakhir     = $request->posisi[$keyPerusahaan];
                    $bioDataPerusahaan->pendapatan_terakhir = $request->pendapatan[$keyPerusahaan];
                    $bioDataPerusahaan->tahun               = $request->tahunPekerjaan[$keyPerusahaan];
                    $bioDataPerusahaan->created_by          = Auth::user()->id;
                    $bioDataPerusahaan->created_at          = date('Y-m-d H:i:s');
                    $bioDataPerusahaan->save();
                }

                DB::commit();
                
                return redirect('bio-data')->with('success','Sukses membuat user!');
            }
            return view('panel.bio-data.create-bio-data', [
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
