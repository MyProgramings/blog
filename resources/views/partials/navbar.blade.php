<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand pl-5" href="#">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <li class="nav-item me-5">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}">الصفحة الرئيسية</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">الصفحات</a>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </li>
      </ul>
      <ul class="navbar-nav mx-auto">
        @auth
        <li class="nav-item">
          <a href="{{ route('post.create') }}" class="nav-link"><i class="fa fa-plus fa-fw"></i>موضوع جديد</a>
        </li>
        @endauth
        <li>
          <form action="{{ route('search') }}" class="d-flex" method="POST" role="search">
            @csrf
            <input class="form-control ms-2" name="keyword" type="search" placeholder="ابحث عن منشور..." aria-label="Search">
            <button class="btn btn-outline-light" type="submit">ابحث</button>
          </form>
        </li>
      </ul>
      <ul class="navbar-nav mr-auto">
        {{-- <div class="topbar" style="z-index: 1">
          @auth

          <li class="nav-item dropdown no-arrow alert-dropdown mx-1">
            <a href="#" class="nav-link dropdown-toggle" id="alertsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell fa-fw fa-lg"></i>

              <span class="badge badge-sanger badge-counter notif-count" data-count=""></span>
            </a>

            <div class="dropdown-list dropdown-menu dropdown-menu-right text-right mt-2 mr-auto" aria-labelledby="alertsDropdown">
              <div class="alert-body">
                
              </div>
              <a href="#" class="dropdown-item text-center small text-gray-500">عرض جميع الاشعارات</a>
            </div>
          </li>            
          @endauth
        </div> --}}
        <div class="topbar" style="z-index: 1">
          @auth()

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow alert-dropdown mx-1" style="list-style: none">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw fa-lg"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter notif-count" data-count="{{ App\Models\Alert::where('user_id', Auth::user()->id)->first()->alert }}">{{ App\Models\Alert::where('user_id', Auth::user()->id)->first()->alert }}</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right text-right mt-2 mr-auto"
                aria-labelledby="alertsDropdown">
                <div class="alert-body">
                 
                </div>
                <a class="dropdown-item text-center small text-gray-500" href="{{ route('all.Notification') }}">عرض كل الإشعارات</a>
            </div>
        </li>
          @endauth
        </div>
        @guest
          <li class="nav-item my-auto">
            <a href="{{ route('login') }}" class="nav-link">{{ __('تسجيل الدخول') }}</a>
          </li>
          <li class="nav-item my-auto" style="list-style: none">
            <a href="{{ route('register') }}" class="nav-link">{{ __('إنشاء حساب') }}</a>
          </li>
        @else
        <li class="nav-item dropdown justify-content-left my-auto" style="list-style: none">
          <a href="#" class="nav-link" id="navbarDropdown" data-bs-toggle="dropdown">
            <img src="{{ Auth::user()->profile_photo_url }}" alt="" class="h-8 w-8 rounded-full object-cover" style="height: 25px; width: 25px;">
          </a>
          <div class="dropdown-menu dropdown-menu-left px-2 text-right mt-2">
            {{-- @admin
              <a href="#" class="dropdown-item">لوحة الإدارة</a>
            @endadmin --}}
            <div class="pt-4 pb-1 border-t border-gray-200">

              <div class="mt-3 space-y-1">
                  <x-responsive-nav-link href="{{ route('profile', Auth::user()->id) }}" :active="request()->routeIs('profile')">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                  </x-responsive-nav-link>
                  <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                      {{ __('pages.Profile') }}
                  </x-responsive-nav-link>
  
                  @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                      <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                          {{ __('API Tokens') }}
                      </x-responsive-nav-link>
                  @endif
  
                  <form method="POST" action="{{ route('logout') }}" x-data>
                      @csrf
  
                      <x-responsive-nav-link href="{{ route('logout') }}"
                                     @click.prevent="$root.submit();">
                          {{ __('pages.logout') }}
                      </x-responsive-nav-link>
                  </form>
  
                  @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                      <div class="border-t border-gray-200"></div>
  
                      <div class="block px-4 py-2 text-xs text-gray-400">
                          {{ __('Manage Team') }}
                      </div>
  
                      <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                          {{ __('Team Settings') }}
                      </x-responsive-nav-link>
  
                      @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                          <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                              {{ __('Create New Team') }}
                          </x-responsive-nav-link>
                      @endcan
  
                      <div class="border-t border-gray-200"></div>
  
                      <div class="block px-4 py-2 text-xs text-gray-400">
                          {{ __('Switch Teams') }}
                      </div>
  
                      @foreach (Auth::user()->allTeams() as $team)
                          <x-switchable-team :team="$team" component="responsive-nav-link" />
                      @endforeach
                  @endif
              </div>
            </div>
          </div>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
