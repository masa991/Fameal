@extends('layouts.app')
@include('layouts.header')
@section('content')
@include('layouts.footer')
<div class="content register">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 mt-5">
        <div class="card">
          <div class="card-header">グループ作成</div>
          <div class="card-body pt-5 pb-5">
            @include('error_message')
            <form method="POST" action="{{ route('families.update') }}">
              <input type="hidden" name="id" value="{{ $family->id }}">
              @csrf
              <div class="row mb-4">
                <label for="name" class="col-md-4 col-form-label text-md-end">グループ名</label>
                <div class="col-md-6">
                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>
              </div>
              <div class="button-box">
                <button type="submit" class="button">作成する</button>
              </div>
            </form>
          </div>
        </dv>
      </div>
    </div>
  </div>
</div>
@endsection
