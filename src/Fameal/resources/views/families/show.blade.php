@extends('layouts.app')
@include('layouts.header')
@section('content')
@include('layouts.footer')
<div class="content">
  <div class="content-header">
    <div class="content-header-title">
      <h1 class="header-family-name">{{ $family->name }}</h1>
    </div>
  </div>
  <div class="content-container">
    <div class="family-main">
      <div class="family-section">
        <h2 class="today-meal">今日のご飯は・・・</h2>
        @if ($schedule['menu_name'] !== "")
          <div>
            @if (isset($recipe))
              <img src="{{ $recipe->image }}" class="today-recipe">
              <div class="today-recipe-title"><span>{{ $recipe->title }}</span>です！</div>
            @else
              <img src="{{ asset('../assets/images/no-image.png') }}" alt="recipe-image" class="today-recipe">
              <div class="today-recipe-title"><span>{{ $schedule->menu_name }}</span>です！</div>
            @endif
          </div>
        @else
          <img src="{{ asset('../assets/images/no-image.png') }}" alt="recipe-image" class="today-recipe">
          <div class="today-recipe-title"><span>未定</span>です！</div>
        @endif
      </div>
      <div></div>
      <div class="consultation-section">
        <div id='calendar'></div>
      </div>
    </div>
  </div>
</div>
@endsection
