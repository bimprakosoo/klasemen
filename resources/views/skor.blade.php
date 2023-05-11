@extends('layouts.user_type.auth')

@section('content')
  <div>
    <div class="container-fluid">
      <div class="card">
        <div class="card-header pb-0 px-3">
          <h6 class="mb-0">Tambah Skor Satu per Satu</h6>
        </div>
        <div class="card-body pt-4 p-3">
          <form action="{{ url('skor') }}" method="POST" role="form text-left">
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
                  <label for="klub1" class="form-control-label">{{ __('Klub 1') }}</label>
                  <div class="@error('klub1')border border-danger rounded-3 @enderror">
                    <select name="klub1" id="klub1" class="form-control">
                      <option value="">Pilih Klub</option>
                      @foreach ($klub as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                      @endforeach
                    </select>
                    @error('klub1')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="klub1" class="form-control-label">{{ __('Klub 2') }}</label>
                  <div class="@error('klub2')border border-danger rounded-3 @enderror">
                    <select name="klub2" id="klub2" class="form-control">
                      <option value="">Pilih Klub</option>
                      @foreach ($klub as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                      @endforeach
                    </select>
                    @error('klub2')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="klub" class="form-control-label">{{ __('Skor Klub 1') }}</label>
                  <div class="@error('skor.klub1')border border-danger rounded-3 @enderror">
                    <input class="form-control" type="text" placeholder="Skor Klub 1"
                           id="skor-klub1" name="skor_klub1">
                    @error('skor.klub1')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="klub" class="form-control-label">{{ __('Skor Klub 2') }}</label>
                  <div class="@error('skor.klub2')border border-danger rounded-3 @enderror">
                    <input class="form-control" type="text" placeholder="Skor Klub 2"
                           id="skor-klub2" name="skor_klub2">
                    @error('skor.klub2')
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
          <h6 class="mb-0">Tambah Skor Multiple</h6>
        </div>
        <div class="card-body pt-4 p-3">
          <form action="{{ url('multiple-skor') }}" method="POST" role="form text-left" id="multiple-skor">
            <input type="hidden" name="klubCount" id="klubCount" value="3">
            @csrf
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="klub1" class="form-control-label">{{ __('Klub 1') }}</label>
                  <div class="@error('klub1')border border-danger rounded-3 @enderror">
                    <select name="klub1" id="klub1" class="form-control">
                      <option value="">Pilih Klub</option>
                      @foreach ($klub as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                      @endforeach
                    </select>
                    @error('klub1')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="klub1" class="form-control-label">{{ __('Klub 2') }}</label>
                  <div class="@error('klub2')border border-danger rounded-3 @enderror">
                    <select name="klub2" id="klub2" class="form-control">
                      <option value="">Pilih Klub</option>
                      @foreach ($klub as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                      @endforeach
                    </select>
                    @error('klub2')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="klub" class="form-control-label">{{ __('Skor Klub 1') }}</label>
                  <div class="@error('skor.klub1')border border-danger rounded-3 @enderror">
                    <input class="form-control" type="text" placeholder="Skor Klub 1"
                           id="skor-klub1" name="skor_klub1">
                    @error('skor.klub1')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="klub" class="form-control-label">{{ __('Skor Klub 2') }}</label>
                  <div class="@error('skor.klub2')border border-danger rounded-3 @enderror">
                    <input class="form-control" type="text" placeholder="Skor Klub 2"
                           id="skor-klub2" name="skor_klub2">
                    @error('skor.klub2')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
            <div id="klub-container"></div>
            <div class="d-flex justify-content-end">
              <button type="button" class="btn bg-gradient-dark btn-md mt-4 mb-4" id="add-klub-btn">{{ 'Add' }}</button>
            </div>            <div class="d-flex justify-content-end">
              <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      let klubCount = 3; // Initial count of klub inputs

      // Function to add klub inputs
      function addKlubInput() {
        const klubContainer = $('#klub-container');

        // Create the HTML for the new klub inputs
        const klubInputHtml = `
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="klub${klubCount}" class="form-control-label">{{ __('Klub ${klubCount}') }}</label>
          <div class="@error('klub${klubCount}')border border-danger rounded-3 @enderror">
            <select name="klub${klubCount}" id="klub${klubCount}" class="form-control">
              <option value="">Pilih Klub</option>
              @foreach ($klub as $row)
        <option value="{{ $row->id }}">{{ $row->name }}</option>
              @endforeach
        </select>
@error('klub${klubCount}')
        <p class="text-danger text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="klub${klubCount + 1}" class="form-control-label">{{ __('Klub ${klubCount + 1}') }}</label>
          <div class="@error('klub${klubCount + 1}')border border-danger rounded-3 @enderror">
            <select name="klub${klubCount + 1}" id="klub${klubCount + 1}" class="form-control">
              <option value="">Pilih Klub</option>
              @foreach ($klub as $row)
        <option value="{{ $row->id }}">{{ $row->name }}</option>
              @endforeach
        </select>
@error('klub${klubCount + 1}')
        <p class="text-danger text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="skor" class="form-control-label">{{ __('Skor Klub ${klubCount}') }}</label>
          <div class="@error('skor.klub${klubCount}')border border-danger rounded-3 @enderror">
            <input class="form-control" type="text" placeholder="Skor Klub ${klubCount}"
                   id="skor-klub${klubCount}" name="skor_klub${klubCount}">
            @error('skor.klub${klubCount}')
        <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="skor" class="form-control-label">{{ __('Skor Klub ${klubCount + 1}') }}</label>
          <div class="@error('skor.klub${klubCount + 1}')border border-danger rounded-3 @enderror">
            <input class="form-control" type="text" placeholder="Skor Klub ${klubCount + 1}"
                   id="skor-klub${klubCount + 1}" name="skor_klub${klubCount + 1}">
            @error('skor.klub${klubCount + 1}')
        <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
      </div>
    </div>
  </div>`;

        klubContainer.append(klubInputHtml); // Append the new klub inputs to the container
        klubCount += 2; // Increment the klub count
      }

      // Event listener for the "Add" button
      $('#add-klub-btn').click(function() {
        addKlubInput();
        $('#klubCount').val(klubCount); // Update the hidden input field value with the current klubCount
      });

        // Event listener for the form submission
        $('#multiple-skor').submit(function(event) {
          // Add the klubCount value to the form data before submitting
          $('<input>').attr({
            type: 'hidden',
            name: 'klubCount',
            value: klubCount
          }).appendTo($(this));

          return true; // Allow the form submission to proceed
      });
    });
  </script>

@endsection


