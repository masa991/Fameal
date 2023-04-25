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
            <div id='calendar'></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
