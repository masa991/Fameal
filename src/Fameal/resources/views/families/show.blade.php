@extends('layouts.app')
@include('layouts.header')
@section('content')
@include('layouts.footer')
<div class="content top">
  <div>
    <div class="masthead">
      <div class="page-container">
        <div class="row col-6">
          <div class="masthead-form">
            <h1>Famealで<br>
              家族の食事を<br>
              もっと幸せにしよう
            </h1>
            <a class="top-register-button" href="{{ route('register') }}">{{ __('Register') }}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
