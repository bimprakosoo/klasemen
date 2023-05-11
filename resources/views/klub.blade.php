@extends('layouts.user_type.auth')

@section('content')
  <div>
    <div class="container-fluid">
      <div class="card">
        <div class="card-header pb-0 px-3">
          <h6 class="mb-0">Tambah Klub</h6>
        </div>
        <div class="card-body pt-4 p-3">
          <form action="{{ url('klub') }}" method="POST" role="form text-left">
            @csrf
            @if($errors->any())
              <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-text text-white">
                            {{$errors->first()}}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  <i class="fa fa-close" aria-hidden="true"></i>
                </button>
              </div>
            @endif
            @if(session('success'))
              <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                            <span class="alert-text text-white">
                            {{ session('success') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  <i class="fa fa-close" aria-hidden="true"></i>
                </button>
              </div>
            @endif
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="klub" class="form-control-label">{{ __('Nama Klub') }}</label>
                  <div class="@error('name')border border-danger rounded-3 @enderror">
                    <input class="form-control" type="text" placeholder="Nama klub"
                           id="klub" name="name">
                    @error('name')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kota-klub" class="form-control-label">{{ __('Kota Klub') }}</label>
                  <div class="@error('kota.klub')border border-danger rounded-3 @enderror">
                    <input class="form-control" type="text" placeholder="Kota Klub" id="kota-klub" name="kota_klub">
                    @error('kota_klub')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="card">
        <div class="card-header pb-0 px-3">
          <h6 class="mb-0">Data Klub</h6>
        </div>
        <div class="card-body pt-4 p-3">
          <div class="row">
            <div class="col-12">
              <div class="card-header pb-0">
                <div class="d-flex flex-row justify-content-between">
                </div>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Klub</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kota</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Point</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($no = 1)
                    @foreach ($klub as $row)
                      <tr>
                        <td class="text-center"><p class="text-xs font-weight-bold mb-0">{{ $no++ }}</p></td>
                        <td class="text-center"><p class="text-xs font-weight-bold mb-0">{{ $row->name }}</p></td>
                        <td class="text-center"><p class="text-xs font-weight-bold mb-0">{{ $row->kota_klub }}</p></td>
                        <td class="text-center"><p class="text-xs font-weight-bold mb-0">{{ $row->point }}</p></td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

