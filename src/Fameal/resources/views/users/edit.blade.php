@extends('layouts.app')
@include('layouts.header')
@section('content')
@include('layouts.footer')
<div class="content">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 mt-5">
        <div class="card">
          <div class="card-header">プロフィール編集</div>
          <div class="card-body pt-5 pb-5">
            @include('error_message')
            <form method="POST" enctype="multipart/form-data" action="{{ route('users.update') }}">
              <input type="hidden" name="id" value="{{ $user->id }}">
              @csrf
              <div class="row mb-4">
                <label for="name" class="col-md-4 col-form-label text-md-end">ニックネーム</label>
                <div class="col-md-6">
                  <input id="nickname" type="text" class="form-control" name="nickname" value="{{ old('nickname', $user->nickname) }}" required autocomplete="name" autofocus>
                </div>
              </div>
              <div class="row mb-4">
                <label for="name" class="col-md-4 col-form-label text-md-end">プロフィール画像</label>
                <div class="col-md-6">
                  <input id="avatar" type="file" class="form-control" name="avatar">
                </div>
              </div>
              <div class="button-box">
                <button type="submit" class="button">更新する</button>
              </div>
            </form>
          </div>
        </dv>
      </div>
    </div>
  </div>
</div>
@endsection
