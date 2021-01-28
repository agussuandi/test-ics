<?php

namespace App\Models\Panel\BioData;

use Illuminate\Database\Eloquent\Model;

class BioData extends Model
{
    protected $table = 'trans_h_biodata';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function pekerjaan()
    {
        return $this->hasMany('App\Models\Panel\BioData\BioDataPekerjaan', 'id_h_bio_data', 'id');
    }

    public function pendidikan()
    {
        return $this->hasMany('App\Models\Panel\BioData\BioDataPendidikan', 'id_h_bio_data', 'id');
    }

    public function pelatihan()
    {
        return $this->hasMany('App\Models\Panel\BioData\BioDataPelatihan', 'id_h_bio_data', 'id');
    }

    public function relPendidikan()
    {
        return $this->hasMany(BioDataPendidikan::class);
    }
}