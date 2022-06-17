<div class="wrapper ">
    @include('layouts.navbars.i_sidebar')
  <div class="main-panel">
    @include('layouts.navbars.navs.i_auth')
    @yield('content')
{{--    @include('layouts.footers.auth')--}}
  </div>
</div>
