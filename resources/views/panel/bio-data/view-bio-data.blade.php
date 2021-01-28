@extends('layouts.app')
@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>View Bio Data</h3>
        </div>
        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/bio-data') }}">Bio Data</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Bio Data</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Bio Data</h5>
                </div>
                <form role="form" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" disabled class="form-control" placeholder="First Name" value="{{ $bioData->first_name }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" disabled class="form-control" placeholder="Last Name" value="{{ $bioData->last_name }}" />
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Birth Place</label>
                                            <input type="text" disabled class="form-control" placeholder="Birth Place" value="{{ $bioData->birth_place }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Birth Date</label>
                                            <input type="date" disabled class="form-control" placeholder="Birth Date" value="{{ $bioData->birth_date }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" disabled class="form-control" placeholder="Address" value="{{ $bioData->address }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">City/State/Zip</label>
                                    <input type="text" disabled class="form-control" placeholder="City/State/Zip" value="{{ $bioData->city }}" />
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Home Phone</label>
                                            <input type="text" disabled class="form-control" placeholder="Home Phone" value="{{ $bioData->home_phone }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Cell Number</label>
                                            <input type="text" disabled class="form-control" placeholder="Cell Number" value="{{ $bioData->cell_phone }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" disabled class="form-control" placeholder="Email" value="{{ $bioData->email }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Applied Position</label>
                                    <input type="text" disabled class="form-control" placeholder="Applied Position" value="{{ $bioData->applied_position }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Expected Salary</label>
                                    <input type="text" disabled class="form-control" placeholder="Expected Salary" value="{{ $bioData->expected_salary }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Education</label>
                                    <table class="table table-bordered" id="tableEducation">
                                        <thead>
                                            <tr>
                                                <th>Jenjang Pendidikan Terakhir</th>
                                                <th>Nama Intitusi Akademik</th>
                                                <th>Jurusan</th>
                                                <th>Tahun Lulus</th>
                                                <th>IPK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bioData->pendidikan as $keyPendidikan => $valPendidikan)
                                            <tr>
                                                <td>{{ $valPendidikan->jenjang }}</td>
                                                <td>{{ $valPendidikan->nama_intitusi }}</td>
                                                <td>{{ $valPendidikan->jurusan }}</td>
                                                <td>{{ $valPendidikan->tahun_lulus }}</td>
                                                <td>{{ $valPendidikan->ipk }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Riwayat Pelatihan</label>
                                    <table class="table table-bordered" id="tablePelatihan">
                                        <thead>
                                            <tr>
                                                <th>Nama Kursus / Seminar</th>
                                                <th>Sertifikat</th>
                                                <th>Tahun</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bioData->pelatihan as $keyPelatihan => $valPelatihan)
                                            <tr>
                                                <td>{{ $valPelatihan->nama_pelatihan }}</td>
                                                <td>{{ $valPelatihan->sertifikat == 1 ? 'Ada' : 'Tidak Ada' }}</td>
                                                <td>{{ $valPelatihan->tahun_lulus }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Riwayat Pekerjaan</label>
                                    <table class="table table-bordered" id="tablePekerjaan">
                                        <thead>
                                            <tr>
                                                <th>Nama Perusahaan</th>
                                                <th>Posisi Terakhir</th>
                                                <th>Pendapatan Terakhir</th>
                                                <th>Tahun</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bioData->pekerjaan as $keyPekerjaan => $valPekerjaan)
                                            <tr>
                                                <td>{{ $valPekerjaan->nama_perusahaan }}</td>
                                                <td>{{ $valPekerjaan->posisi_terakhir }}</td>
                                                <td>{{ $valPekerjaan->pendapatan_terakhir }}</td>
                                                <td>{{ $valPekerjaan->tahun }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Skill</label>
                                    <textarea class="form-control" readonly rows="4">{{ $bioData->skill }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('/bio-data') }}" class="btn btn-primary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('javascript')
@endsection