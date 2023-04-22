@section('footer')
<div class="fameal_footer">
  <div class="footer-container">
    <div class="footer-row">
      <div class="footer-nav-menu">
        <a class="nav-link footer-menu" href="{{ url('/terms') }}">{{ __('homes.terms') }}</a>
        <a class="nav-link footer-menu center" href="{{ url('/privacy_policy') }}">{{ __('homes.privacy_policy') }}</a>
      </div>
      <div class="footer-copyright">
        <p>©︎ 2023 Fameal All rights reserved.</p>
      </div>
    </div>
  </div>
</div>
@endsection
