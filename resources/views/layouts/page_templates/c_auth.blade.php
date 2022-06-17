<div class="wrapper">
    @include('layouts.navbars.c_sidebar')
  <div class="main-panel">
    @include('layouts.navbars.navs.c_auth')
    @yield('content')
{{--    @include('layouts.footers.auth')--}}
  </div>
</div>
