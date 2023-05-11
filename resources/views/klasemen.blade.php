@extends('layouts.user_type.auth')

@section('content')
  <div>
    <div class="container-fluid py-4">
      <div class="card">
        <div class="card-header pb-0 px-3">
          <h6 class="mb-0">Data Klasemen</h6>
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
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Posisi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Klub</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ma</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Me</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">K</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">GM</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">GK</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Point</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $position = 1; @endphp
                    @foreach($statistics as $stat)
                      <tr>
                        <td class="text-center">{{ $position }}</td>
                        <td class="text-center">{{ $stat['klub'] }}</td>
                        <td class="text-center">{{ $stat['Ma'] }}</td>
                        <td class="text-center">{{ $stat['Me'] }}</td>
                        <td class="text-center">{{ $stat['S'] }}</td>
                        <td class="text-center">{{ $stat['K'] }}</td>
                        <td class="text-center">{{ $stat['GM'] }}</td>
                        <td class="text-center">{{ $stat['GK'] }}</td>
                        <td class="text-center">{{ $stat['Point'] }}</td>
                      </tr>
                      @php $position++; @endphp
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

