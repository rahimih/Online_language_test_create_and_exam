<div class="sidebar" data-color="orange" data-background-color="black" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag

      Tip 3: You can change the color of the sidebar using: data-background-color="black | white | red "
  -->
  <div class="logo">
    <a  class="simple-text logo-normal">
     <i><img style="width:25px" src="{{ asset('material') }}/img/DC-logo.jpg"></i>
      {{ __('Examiner Panel') }}
    </a>
  </div>
<div class="sidebar-wrapper">
  <ul class="nav">
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'Setting') ? ' active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#CUSER" aria-expanded="true">
              <pe>
                  <button class="btn btn-default btn-fab btn-fab-mini btn-round" disabled>
                      <i class="material-icons">#</i>
                  </button>
                  {{ Auth::user()->fname }}  {{ Auth::user()->lname }}
                  <b class="caret"></b>
              </pe>
          </a>
          <div class="collapse show " id="CUSER">
              <ul class="nav">
                  <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('profile.edit_e') }}">
                          <span class="sidebar-normal">{{ __('My Profile') }} </span>
                      </a>
                  </li>

                  <li class="nav-item{{ $activePage == 'Setting' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Dashboard') }}">
                          <span class="sidebar-normal"> {{ __('Setting') }} </span>
                      </a>
                  </li>

                  <li class="nav-item{{ $activePage == 'logout' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                          <span class="sidebar-normal"> {{ __('logout') }} </span>
                      </a>
                  </li>

              </ul>
          </div>
      </li>

      <li class="nav-item{{ $activePage == 'Dashboard' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('Dashboard') }}">
              <i class="material-icons">dashboard</i>
              <pe>{{ __('Dashboard') }}</pe>
          </a>
      </li>

      <li class="nav-item {{ ($activePage == 'Speaking' || $activePage == 'Writing') ? ' active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#WORKS" aria-expanded="true">
              <i class="material-icons">assignment_ind</i>
              <pe>{{ __('My Works') }}
                  <b class="caret"></b>
              </pe>
          </a>
          <div class="collapse show" id="WORKS">
              <ul class="nav">
                {{--  <li class="nav-item {{ ($activePage == 'Speaking work list' || $activePage == 'Speaking Corrected List') ? ' active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#SPEAKING" aria-expanded="true">
                <i class="material-icons">record_voice_over</i>
                <pe>{{ __('Speaking') }}
                    <b class="caret"></b>
                </pe>
            </a>
            <div class="collapse show" id="SPEAKING">
                <ul class="nav">
                    <li class="nav-item{{ $activePage == 'speaking work list' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('Dashboard') }}">
--}}{{--                            <span class="sidebar-mini"> SU </span>--}}{{--
                            <span class="sidebar-normal">{{ __('Speaking work list') }} </span>
                        </a>
                    </li>
                    <li class="nav-item{{ $activePage == 'Speaking Corrected List' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('Dashboard') }}">
--}}{{--                            <span class="sidebar-mini"> v </span>--}}{{--
                            <span class="sidebar-normal"> {{ __('Speaking Corrected List') }} </span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>--}}
                  <li class="nav-item {{ ($activePage == 'Speaking work list' || $activePage == 'Speaking Corrected List') ? ' active' : '' }}">
                      <a class="nav-link" data-toggle="collapse" href="#SPEAKING_C" aria-expanded="true">
                          <i class="material-icons">assignment</i>
                          <pe>{{ __('Speaking') }}
                              <b class="caret"></b>
                          </pe>
                      </a>
                      <div class="collapse show " id="SPEAKING_C">
                          <ul class="nav">
                              <li class="nav-item{{ $activePage == 'Speaking work list' ? ' active' : '' }}">
                                  <a class="nav-link" href="{{ route('SPEAKING_SERVICES.index_s') }}">
                                      {{--                    <span class="sidebar-mini"> WU </span>--}}
                                      <pe>{{ __('Speaking work list') }}</pe>
                                  </a>
                              </li>
                              <li class="nav-item{{ $activePage == 'Speaking Corrected List' ? ' active' : '' }}">
                                  <a class="nav-link" href="{{ route('SPEAKING_SERVICES.index_sv') }}">
                                      {{--                    <span class="sidebar-mini"> VW </span>--}}
                                      <pe>{{ __('Speaking Corrected List') }}</pe>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </li>

                  <li class="nav-item {{ ($activePage == 'Writing work list' || $activePage == 'Writing Corrected List') ? ' active' : '' }}">
    <a class="nav-link" data-toggle="collapse" href="#WRITING_C" aria-expanded="true">
        <i class="material-icons">assignment</i>
        <pe>{{ __('Writing') }}
            <b class="caret"></b>
        </pe>
    </a>
    <div class="collapse show " id="WRITING_C">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'Writing work list' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('WRITING_SERVICES.index') }}">
{{--                    <span class="sidebar-mini"> WU </span>--}}
                    <pe>{{ __('Writing work list') }}</pe>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'Writing Corrected List' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('WRITING_SERVICES.index_wv') }}">
{{--                    <span class="sidebar-mini"> VW </span>--}}
                    <pe>{{ __('Writing Corrected List') }}</pe>
                </a>
            </li>
        </ul>
    </div>
</li>

              </ul>
          </div>
      </li>


      <li class="nav-item {{ ($activePage == 'report1' || $activePage == 'report2' || $activePage == 'report3') ? ' active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#ACCOUNTING" aria-expanded="true">
              <i class="material-icons">toc</i>
              <pe>{{ __('My Payments') }}
                  <b class="caret"></b>
              </pe>
          </a>
          <div class="collapse show " id="ACCOUNTING">
              <ul class="nav">
                  <li class="nav-item{{ $activePage == 'report1' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Dashboard') }}">
                          <span class="sidebar-mini"> R1 </span>
                          <span class="sidebar-normal">{{ __('report1') }} </span>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'report2' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Dashboard') }}">
                          <span class="sidebar-mini"> R2 </span>
                          <span class="sidebar-normal"> {{ __('report2') }} </span>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'report3' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Dashboard') }}">
                          <span class="sidebar-mini"> R3 </span>
                          <span class="sidebar-normal"> {{ __('report3') }} </span>
                      </a>
                  </li>
              </ul>
          </div>
      </li>

     </ul>
 </div>
</div>
