<div class="sidebar" data-color="orange" data-background-color="black" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag

        Tip 3: You can change the color of the sidebar using: data-background-color="black | white | red "
    -->
    <div class="logo">
        <a  class="simple-text logo-normal">
            <i><img style="width:25px" src="{{ asset('material') }}/img/DC-logo.jpg"></i>
            {{ __('Instructures Panel') }}
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
                            <a class="nav-link" href="{{ route('profile.edit_i') }}">
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

            <li class="nav-item {{ ($activePage == 'My Referrals') ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#REFERRALS" aria-expanded="true">
                    <i class="material-icons">toc</i>
                    <pe>{{ __('Referrals') }}
                        <b class="caret"></b>
                    </pe>
                </a>
                <div class="collapse show " id="REFERRALS">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'My Referrals' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('Referrals.index') }}">
                                <span class="sidebar-normal">{{ __('My Referrals') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ ($activePage == 'My applicant results') ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#APPLICANT" aria-expanded="true">
                    <i class="material-icons">toc</i>
                    <pe>{{ __('applicant results') }}
                        <b class="caret"></b>
                    </pe>
                </a>
                <div class="collapse show " id="APPLICANT">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'My applicant results' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('applicant_Result.index_r') }}">
                                <span class="sidebar-normal">{{ __('My applicant results') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
    </div>
