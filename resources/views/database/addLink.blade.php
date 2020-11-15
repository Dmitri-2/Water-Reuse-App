@extends('layouts.master')

@section('body')
  <div class="container">
    <div class="row my-3">
      <a href="{{url()->previous()}}" class="btn btn-primary col-md-2"> <i class="fas fa-arrow-circle-left"></i> Back
      </a>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card h-100 mt-5 shadow mx-auto">
          <h2 class="card-header text-center"> Add Link </h2>
          <form method="POST" action="{{ route('linkAddSubmit') }}">
            {{ csrf_field() }}
            <div class="card-body mt-3">
              <div class="row justify-content-center">
                <div class="form-row">
                  <label class="col-md-4 col-form-label text-md-right" for="name"> Link Name </label>
                  <div class="col-md-7">
                    <input type="text" class="form-control" id="name" name="name" placeholder="New link Name">
                  </div>
                </div>
              </div>
              <div class="row justify-content-center mt-2 mt-md-4">
                <div class="form-row">
                  <label class="col-md-4 col-form-label text-md-right" for="link"> Link URL </label>
                  <div class="col-md-7">
                    <input type="text" class="form-control" id="link" name="link" placeholder="New link URL">
                  </div>
                </div>
              </div>
              <div class="form-row mt-5 justify-content-center">
                <div class="col-sm-5">
                  <button type="submit" class="btn btn-success w-100"><i class="fas fa-plus-circle"></i> Add Link
                  </button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
@push('css')
  <style>
    body::before {
      content: "";
      position: fixed;
      width: 200%;
      height: 200%;
      top: -50%;
      left: -50%;
      z-index: -1;
      background-size: cover;
      background-image: url('https\3a //scontent.fhio2-1.fna.fbcdn.net/v/t15.5256-10/cp0/e15/q65/p600x600/20505009_401019313628316_6647662209365180416_n.jpg?_nc_cat\3d 102\26 ccb\3d 2\26 _nc_sid\3d ccf8b3\26 _nc_ohc\3d XdbCgFERuygAX-1bAXs\26 _nc_ht\3d scontent.fhio2-1.fna\26 oh\3d 11dfc9e7c7ba03c61b70c4b3b4f3bd0c\26 oe\3d 5FD1716B');
      no-repeat fixed center center;
      background-size: cover;
      transform: scaleY(-1);
      filter: brightness(80%);
    }
  </style>

@endpush
