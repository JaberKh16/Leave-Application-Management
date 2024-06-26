<nav class="navbar navbar-expand-lg main-navbar flex justify-content-end">
  @auth
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      {{-- <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"> --}}
      <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->username }}</div></a>
      <div class="dropdown-menu dropdown-menu-right">
        {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
        {{-- <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Profile
        </a> --}}
        {{-- <a href="features-activities.html" class="dropdown-item has-icon">
          <i class="fas fa-bolt"></i> Activities
        </a>
        <a href="features-settings.html" class="dropdown-item has-icon">
          <i class="fas fa-cog"></i> Settings
        </a> --}}
        <div class="dropdown-divider"></div>
        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <x-dropdown-link :href="route('logout')" class="dropdown-item has-icon text-danger"
                  onclick="event.preventDefault();
                              this.closest('form').submit();">
                <i class="fas fa-sign-out-alt"></i> {{ __('Log Out') }}
          </x-dropdown-link>
        </form>
      </div>
    </li>
  </ul>
  @else
    <p>Not Authenticated, please login</p>
  @endauth
</nav>