<div class="sidebar" data-color="orange" data-background-color="black" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag

      Tip 3: You can change the color of the sidebar using: data-background-color="black | white | red "
  -->
  <div class="logo">
    <a  class="simple-text logo-normal">
     <i><img style="width:25px" src="{{ asset('material') }}/img/DC-logo.jpg"></i>
      {{ __('Admin Panel') }}
    </a>
  </div>
<div class="sidebar-wrapper">
  <ul class="nav">
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'Setting') ? ' active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#CUSER" aria-expanded="true">
              {{--              <i><img style="width:25px" src="{{ asset('material') }}/img/users.svg"></i>--}}
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
                      <a class="nav-link" href="{{ route('profile.edit') }}">
                          <span class="sidebar-mini"> UP </span>
                          <span class="sidebar-normal">{{ __('User Profile') }} </span>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'Setting' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Dashboard') }}">
                          <span class="sidebar-mini"> S </span>
                          <span class="sidebar-normal"> {{ __('Setting') }} </span>
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

      <li class="nav-item {{ ($activePage == 'Users Management' || $activePage == 'Setting') ? ' active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#USERS" aria-expanded="true">
              <i class="material-icons">assignment_ind</i>
              <pe>{{ __('Users') }}
                  <b class="caret"></b>
              </pe>
          </a>
          <div class="collapse show" id="USERS">
              <ul class="nav">
                  <li class="nav-item{{ $activePage == 'Users Management' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('User.index') }}">
                          <span class="sidebar-mini"> UM </span>
                          <span class="sidebar-normal">{{ __('Users Management') }} </span>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'Setting' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Dashboard') }}">
                          <span class="sidebar-mini"> S </span>
                          <span class="sidebar-normal"> {{ __('Setting') }} </span>
                      </a>
                  </li>
              </ul>
          </div>
      </li>

      <li class="nav-item {{ ($activePage == 'Institute' || $activePage == 'LanguageT' || $activePage == 'MainT' || $activePage == 'Parts'|| $activePage == 'Questions_t'|| $activePage == 'Skill'|| $activePage == 'SubGroup' || $activePage == 'TestSkill' || $activePage == 'TestPart' || $activePage == 'TestGrade') ? ' active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#DEFINE" aria-expanded="true">
{{--              <i><img style="width:25px" src="{{ asset('material') }}/img/users.svg"></i>--}}
              <i class="material-icons">assignment</i>
              <pe>{{ __('Main Definitions') }}
                  <b class="caret"></b>
              </pe>
          </a>
          <div class="collapse show " id="DEFINE">
              <ul class="nav">
                  <li class="nav-item{{ $activePage == 'Institute' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Institute.index') }}">
                          <span class="sidebar-mini"> IN </span>
{{--                          <i class="material-icons">library_books</i>--}}
                          <span class="sidebar-normal">{{ __('Institute') }}</span>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'LanguageT' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('language.index') }}">
                          <span class="sidebar-mini"> LT </span>
{{--                          <i class="material-icons">language</i>--}}
                          <span class="sidebar-normal">{{ __('Language Type') }}</span>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'MainT' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('M_Test.index') }}">
                          <span class="sidebar-mini"> MT </span>
{{--                          <i class="material-icons">unarchive</i>--}}
                          <span class="sidebar-normal">{{ __('Main Test') }}</span>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'SubGroup' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Subgroup_Test.index') }}">
                          <span class="sidebar-mini"> SG </span>
                          {{--                          <i class="material-icons">language</i>--}}
                          <span class="sidebar-normal">{{ __('SubGroup Test') }}</span>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'Parts' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('parts_name.index') }}">
                       <span class="sidebar-mini"> PA </span>
{{--                          <i class="material-icons">location_ons</i>--}}
                          <span class="sidebar-normal">{{ __('Parts Name') }}</span>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'Questions_t' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Question_type.index') }}">
{{--                          <i class="material-icons">location_ons</i>--}}
                          <span class="sidebar-mini"> QT </span>
                          <span class="sidebar-normal">{{ __('Question Type') }}</span>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'Skill' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Skill_type.index') }}">
                          <span class="sidebar-mini"> ST </span>
{{--                          <i class="material-icons">language</i>--}}
                          <span class="sidebar-normal">{{ __('Skill Type') }}</span>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'TestSkill' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Test_skill.index') }}">
                       <span class="sidebar-mini"> TS </span>
{{--                          <i class="material-icons">language</i>--}}
                          <span class="sidebar-normal">{{ __('Test Skill') }}</span>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'TestPart' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Test_part.index') }}">
                          <span class="sidebar-mini"> TP </span>
                          {{--                          <i class="material-icons">language</i>--}}
                          <span class="sidebar-normal">{{ __('Test Parts') }}</span>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'TestGrade' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Test_Grade.index') }}">
                          <span class="sidebar-mini"> TG </span>
                          {{--                          <i class="material-icons">language</i>--}}
                          <span class="sidebar-normal">{{ __('Test Grades') }}</span>
                      </a>
                  </li>

              </ul>
          </div>
      </li>

      <li class="nav-item {{ ($activePage == 'Package' || $activePage == 'Tests' || $activePage == 'Questions') ? ' active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#TESTS" aria-expanded="true">
              <i class="material-icons">toc</i>
          {{-- <i><img style="width:25px" src="{{ asset('material') }}/img/users.svg"></i>--}}
              <pe>{{ __('Tests') }}
                  <b class="caret"></b>
              </pe>
          </a>
          <div class="collapse show " id="TESTS">
              <ul class="nav">
                  <li class="nav-item{{ $activePage == 'Package' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Q_Package.index') }}">
                          <span class="sidebar-mini"> PD </span>
                          <span class="sidebar-normal">{{ __('Package Definitions') }} </span>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'Questions' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('QP_Creator.index') }}">
                          <span class="sidebar-mini"> TD </span>
                          <span class="sidebar-normal"> {{ __('Questions Definitions') }} </span>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'Tests' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Tests.index') }}">
                          <span class="sidebar-mini"> TD </span>
                          <span class="sidebar-normal"> {{ __('Tests Definitions') }} </span>
                      </a>
                  </li>
              </ul>
          </div>
      </li>

     </ul>
 </div>
</div>
