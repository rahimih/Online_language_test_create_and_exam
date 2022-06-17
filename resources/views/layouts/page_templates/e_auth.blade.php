<div class="wrapper ">
    @include('layouts.navbars.e_sidebar')
  <div class="main-panel">
    @include('layouts.navbars.navs.e_auth')
    @yield('content')
{{--    @include('layouts.footers.auth')--}}
  </div>
</div>
