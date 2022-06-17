<div class="wrapper ">
    @include('layouts.navbars.a_sidebar')
  <div class="main-panel">
    @include('layouts.navbars.navs.a_auth')
    @yield('content')
{{--    @include('layouts.footers.auth')--}}
  </div>
</div>
