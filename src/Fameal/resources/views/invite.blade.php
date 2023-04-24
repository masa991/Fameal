@extends('layouts.app')
@include('layouts.header')
@section('content')
@include('layouts.footer')
<div class="bg-paper py-4">
  <div class="container" style="max-width: 540px">
    <h3 class="text-center">
      家族招待メール送信
    </h3>
    <p style="font-size: 14px;">
      　本棚の共有するために招待したい、家族のメールアドレスを入力してください。<br>
      　入力したメールアドレス宛てに、招待用のユーザー登録ページの案内をお送りします。
    </p>
    <div class="card my-4 shadow-sm">
      <div class="card-body">
        @include('error_message')
        @if (session('status'))
        <div class="card-text alert alert-success">
          {{ session('status') }}
        </div>
        @endif
        <form method="POST" action="{{ route('invite.email') }}">
          @csrf
          <div class="form-group">
            <label for="email">メールアドレス</label>
            <input class="form-control" type="email" id="email" name="email" required placeholder="メールアドレスを入力" value="{{ old('email') }}" {{ Auth::id() === config('const.GUEST_USER_ID') ? 'readonly' : '' }}>
            <p class="text-muted small ml-1 mb-0">※招待したい家族のメールアドレスを入力してください。</p>
            <p class="text-muted small ml-1">※メール送信後、24時間以内に登録してください。</p>
          </div>
          <button type="submit" class="btn btn-block btn-teal1 mt-4">
            <b>送信する</b>
          </button>
          <button type="button" onClick="history.back()" class="btn btn-block bg-white btn-outline-teal1 text-decoration-none text-teal1 mt-3">
            <i class="fas fa-arrow-left mr-1"></i>戻る
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
