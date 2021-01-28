@extends('layouts.app')
@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Bio Data</h3>
        </div>
        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item active" aria-current="page">Bio Data</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Search</h5>
                </div>
                <form role="form" method="GET">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Name" name="name" value="{{ app('request')->input('name') }}"/>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Position</label>
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Position" name="position" value="{{ app('request')->input('position') }}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Tingkat Pendidikan</label>
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Tingkat Pendidikan" name="pendidikan" value="{{ app('request')->input('pendidikan') }}"/>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary float-right mt-4">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Bio Data List</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3" style="padding-top: 0px">
                        <a href="{{ url('/bio-data/create') }}" class="btn btn-primary">Create Bio Data</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Posisi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bioData as $keyBioData => $valBioData)
                            <tr>
                                <td>{{ $keyBioData + 1 }}</td>
                                <td>{{ $valBioData->first_name }} {{ $valBioData->last_name }}</td>
                                <td>{{ $valBioData->birth_place }}, {{ $valBioData->birth_date }}</td>
                                <td>{{ $valBioData->applied_position }}</td>
                                <td class="table-action">
                                    <a href="{{ url('/bio-data/view'.\Crypt::encryptString($valBioData->id).'') }}"><i class="align-middle" data-feather="eye"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align: center">Empty Data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $bioData->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
@section('javascript')

@endsection