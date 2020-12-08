<form class="form-inline mr-auto" action="">
  <ul class="navbar-nav mr-3">
    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
  </ul>
</form>
<ul class="navbar-nav navbar-right">
  <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      @if (auth()->user())
        <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->username }}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-title">@lang('app.global.wellcome', ['user' => auth()->user()->profileName])</div>
          @if (auth()->user()->is_nasabah)
            <a href="{{ route('nasabah.show', auth()->user()->nasabahProfile->id) }}" class="dropdown-item has-icon">
              <i class="far fa-user"></i> @lang('app.global.profile')
            </a>
          @endif
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item has-icon text-danger logout">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
      @endif
  </li>
</ul>
<form method="POST" class="d-inline logout-form" action="{{ route('logout') }}">
  @csrf
</form>

@push('javascript')
  <script>
    $('.logout').on('click', () => {
      $('.logout-form').submit()
    })
  </script>
@endpush
