<div class="sidebar"  data-color="orange" data-background-color="black" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <div class="logo">
    <a  class="simple-text logo-normal">
      {{ __('Candidate Panel') }}
        <i><img style="width:25px" src="{{ asset('material') }}/img/DC-logo.jpg"></i>
    </a>
  </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div class="sidebar-wrapper right">
  <ul class="nav">
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'Message' || $activePage == 'logout') ? ' active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#CUSER" aria-expanded="true">
              <p>
                  <button class="btn btn-default btn-fab btn-fab-mini btn-round" disabled>
                      <i><img style="width:25px" src="{{ asset('material') }}/img/DC-logo.jpg"></i>
                  </button>
                  <strong> {{ Auth::user()->fname }}  {{ Auth::user()->lname }} </strong>
                  <b class="caret"></b>
              </p>
          </a>
          <div class="collapse show " id="CUSER">
              <ul class="nav">
                  <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('profiles.edit') }}">
{{--                          <span class="sidebar-normal">{{ __('پروفایل') }} </span>--}}
                          <p>{{ __('پروفایل') }}</p>
                      </a>
                  </li>

                  <li class="nav-item{{ $activePage == 'Message' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Dashboard') }}">
                          <p>{{ __('پیام') }}</p>
                      </a>
                  </li>

                  <li class="nav-item{{ $activePage == 'logout' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                          <p>{{ __('خروج') }}</p>
                      </a>
                  </li>

              </ul>
          </div>
      </li>

      <li class="nav-item{{ $activePage == 'Dashboard' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('Dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>{{ __('داشبورد') }}</p>
          </a>
      </li>

      <li class="nav-item {{ ($activePage == 'Level Test' || $activePage == 'Result Test' ) ? ' active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#LEVEL" aria-expanded="true">
              &nbsp;
              <i class="material-icons">leaderboard</i>
              <p>{{ __('تعیین سطح') }}
                  <b class="caret"></b>
              </p>
          </a>
          <div class="collapse show " id="LEVEL">
              <ul class="nav">
                  <li class="nav-item{{ $activePage == 'Level Test' ? ' active' : '' }}">
                      <a class="nav-link" href="{{route('Test_Register.index_l') }}">
                          <p>{{ __('آزمون تعیین سطح') }}</p>
                      </a>
                  </li>

                  <li class="nav-item{{ $activePage == 'Result Test' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Test_Register.LevelResult') }}">
                          <p>{{ __('نتایج آزمون') }}</p>
                      </a>
                  </li>


              </ul>
          </div>
      </li>

      <li class="nav-item {{ ($activePage == 'Registered Test' || $activePage == 'Start Test' || $activePage == 'Speaking Test' || $activePage == 'Register Test' || $activePage == 'Passed Test' || $activePage == 'Writing Correction' ) ? ' active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#EXAM" aria-expanded="true">
              &nbsp;
              <i class="material-icons">wysiwyg</i>
              <p>{{ __('آزمون ها') }}
                  <b class="caret"></b>
              </p>
          </a>
          <div class="collapse show " id="EXAM">
              <ul class="nav">
                  <li class="nav-item{{ $activePage == 'Register Test' ? ' active' : '' }}">
                      <a class="nav-link" href="{{route('Test_Register.index_d') }}">
                          <p>{{ __('ثبت نام در آزمون') }}</p>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'Start Test' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Test_Register.Select_Test') }}">
                          <p>{{ __('شروع آزمون') }}</p>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'Speaking Test' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Test_Register.Speaking_Test') }}">
                          <p>{{ __('آزمون Speaking') }}</p>
                      </a>
                  </li>

                  <li class="nav-item{{ $activePage == '------------' ? ' active' : '' }}">
                          <span class="sidebar-mini">  </span>
                          <p>{{ __('_______________________') }}</p>
                  </li>

                  <li class="nav-item{{ $activePage == 'Registered Test' ? ' active' : '' }}">
                      <a class="nav-link" href="{{route('Test_Register.index') }}">
                          <p>{{ __('آزمون های ثبت نام شده') }}</p>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'Passed Test' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Test_Register.Passed_Test') }}">
                          <p>{{ __('ازمون های تکمیل شده') }}</p>
                      </a>
                  </li>


              </ul>
          </div>
      </li>

      <li class="nav-item {{ ($activePage == 'Writing Correction' || $activePage == 'Send File'|| $activePage == 'Results' || $activePage == 'chart1') ? ' active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#WS" aria-expanded="true">
              &nbsp;
              <i class="material-icons">article</i>
              <p>{{ __('تصحیح Writing') }}
                  <b class="caret"></b>
              </p>
          </a>
          <div class="collapse show " id="WS">
              <ul class="nav">
                  <li class="nav-item{{ $activePage == 'Writing Correction' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Test_Register.index_ws') }}">
                          <p>{{ __('تصحیح Writing') }}</p>
                      </a>
                  </li>

{{--                  <li class="nav-item{{ $activePage == 'Send File' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Test_Register.Send_Files') }}">
                          <p>{{ __('ارسال فایل') }}</p>
                      </a>
                  </li>--}}

                  <li class="nav-item{{ $activePage == 'Results' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('WRITING_SERVICES.index_c') }}">
                          <p>{{ __('نتایج آزمون') }}</p>
                      </a>
                  </li>

                  <li class="nav-item{{ $activePage == 'chart1' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('CHARTS.index') }}">
                          <p>{{ __('نمودار نمرات کل ') }}</p>
                      </a>
                  </li>

                  <li class="nav-item{{ $activePage == 'chart2' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('CHARTS.Index_P') }}">
                          <p>{{ __('نمودار نمرات هر بخش  ') }}</p>
                      </a>
                  </li>


              </ul>
          </div>
      </li>

      <li class="nav-item {{ ($activePage == 'Test Report' || $activePage == 'Skill Report' || $activePage == 'Question Type Report'|| $activePage == 'Section Report') ? ' active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#REPORT" aria-expanded="true">
              <i class="material-icons">description</i>
              &nbsp;
              <p>{{ __('گزارشات') }}
                  <b class="caret"></b>
              </p>
          </a>
          <div class="collapse show " id="REPORT">
              <ul class="nav">
                  <li class="nav-item{{ $activePage == 'Test Report' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('TRF.index') }}">
                          <span class="sidebar-normal">{{ __('کارنامه') }} </span>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'Tests Chart' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('Dashboard') }}">
                          <span class="sidebar-normal"> {{ __('نمودار پیشرفت') }} </span>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'Skill Chart' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('CHARTS.Index_T') }}">
                          <span class="sidebar-normal"> {{ __('نمودار میله ای نمرات بر اساس مهارت') }} </span>
                      </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'Question Type Chart' ? ' active' : '' }}">
                      <a class="nav-link" href="{{ route('CHARTS.Index_TL') }}">
                          <span class="sidebar-normal"> {{ __('نمودار خطی نمرات بر اساس مهارت') }} </span>
                      </a>
                  </li>

              </ul>
          </div>
      </li>

     </ul>
 </div>
</div>
