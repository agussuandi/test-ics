@extends('layouts.app')
@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Create Bio Data</h3>
        </div>
        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/bio-data') }}">Bio Data</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Bio Data</li>
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
                                    <input type="text" autocomplete="off" class="form-control" placeholder="First Name" name="first_name" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Last Name" name="last_name" required />
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Birth Place</label>
                                            <input type="text" autocomplete="off" class="form-control" placeholder="Birth Place" name="birth_place" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Birth Date</label>
                                            <input type="date" autocomplete="off" class="form-control" placeholder="Birth Date" name="birth_date" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Address" name="address" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">City/State/Zip</label>
                                    <input type="text" autocomplete="off" class="form-control" placeholder="City/State/Zip" name="city" required />
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Home Phone</label>
                                            <input type="text" autocomplete="off" class="form-control" placeholder="Home Phone" name="home_phone" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label">Cell Number</label>
                                            <input type="text" autocomplete="off" class="form-control" placeholder="Cell Number" name="cell_number" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" autocomplete="off" class="form-control" placeholder="Email" name="email" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Applied Position</label>
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Applied Position" name="applied_position" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Expected Salary</label>
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Expected Salary" name="expected_salary" required />
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    <button type="button" class="btn btn-info" onclick="handleEducation()">Add Education</button>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Riwayat Pelatihan</label>
                                    <table class="table table-bordered" id="tablePelatihan">
                                        <thead>
                                            <tr>
                                                <th>Nama Kursus / Seminar</th>
                                                <th>Sertifikat</th>
                                                <th>Tahun</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    <button type="button" class="btn btn-info" onclick="handlePelatihan()">Add Riwayat Pelatihan</button>
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    <button type="button" class="btn btn-info" onclick="handlePekerjaan()">Add Riwayat Pekerjaan</button>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Skill</label>
                                    <textarea class="form-control" placeholder="Skill" name="skill" rows="4" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('/bio-data') }}" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('javascript')
    <script>
        handleEducation = () =>  {
            const table = document.getElementById('tableEducation').getElementsByTagName('tbody')[0]
            const row = table.insertRow(0)
            const cellJenjang = row.insertCell(0)
            const cellIntitusi = row.insertCell(1)
            const cellJurusan = row.insertCell(2)
            const cellTahun = row.insertCell(3)
            const cellIpk = row.insertCell(4)
            const cellButton = row.insertCell(5)

            cellJenjang.innerHTML = `<input type="text" autocomplete="off" class="form-control" name="jenjang[]" />`
            cellIntitusi.innerHTML = `<input type="text" autocomplete="off" class="form-control" name="intitusi[]" />`
            cellJurusan.innerHTML = `<input type="text" autocomplete="off" class="form-control" name="jurusan[]" />`
            cellTahun.innerHTML = `<input type="text" autocomplete="off" class="form-control" name="tahunPendidikan[]" />`
            cellIpk.innerHTML = `<input type="text" autocomplete="off" class="form-control" name="ipk[]" />`
            cellButton.innerHTML = `<button type="button" class="btn btn-danger btn-sm" onclick="handleDelete()">Delete</button> `
        }

        handlePelatihan = () =>  {
            const table = document.getElementById('tablePelatihan').getElementsByTagName('tbody')[0]
            const row = table.insertRow(0)
            const cellPelatihan = row.insertCell(0)
            const cellSertifkat = row.insertCell(1)
            const cellTahun = row.insertCell(2)
            const cellButton = row.insertCell(3)
            
            cellPelatihan.innerHTML = `<input type="text" autocomplete="off" class="form-control" name="pelatihan[]" />`
            cellSertifkat.innerHTML = `<input type="text" autocomplete="off" class="form-control" name="sertifikat[]" />`
            cellTahun.innerHTML = `<input type="text" autocomplete="off" class="form-control" name="tahunPelatihan[]" />`
            cellButton.innerHTML = `<button type="button" class="btn btn-danger btn-sm" onclick="handleDelete()">Delete</button> `
        }

        handlePekerjaan = () =>  {
            const table = document.getElementById('tablePekerjaan').getElementsByTagName('tbody')[0]
            const row = table.insertRow(0)
            const cellPerusahaan = row.insertCell(0)
            const cellPosisi = row.insertCell(1)
            const cellPendapatan = row.insertCell(2)
            const cellTahun = row.insertCell(3)
            const cellButton = row.insertCell(4)
            
            cellPerusahaan.innerHTML = `<input type="text" autocomplete="off" class="form-control" name="perusahaan[]" />`
            cellPosisi.innerHTML = `<input type="text" autocomplete="off" class="form-control" name="posisi[]" />`
            cellPendapatan.innerHTML = `<input type="text" autocomplete="off" class="form-control" name="pendapatan[]" />`
            cellTahun.innerHTML = `<input type="text" autocomplete="off" class="form-control" name="tahunPekerjaan[]" />`
            cellButton.innerHTML = `<button type="button" class="btn btn-danger btn-sm" onclick="handleDelete()">Delete</button> `
        }

        handleDelete = () => {
            const td = event.target.parentNode; 
            const tr = td.parentNode;
            tr.parentNode.removeChild(tr);
        }
    </script>
@endsection