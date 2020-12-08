<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="">{{ env('APP_NAME') }}</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="#">{{ strtoupper(substr(env('APP_NAME'), 0, 2)) }}</a>
  </div>
  <ul class="sidebar-menu">
    @foreach (config('menu') as $menu)
      @if (isset($menu['has_dropdown']))
      @else
        @if (isset($menu['menu-header']))
          @if (in_array(auth()->user()->whoami, $menu['display_for']))

          @endif
          <li class="menu-header">{{ $menu['menu-header'] }}</li>
        @endif
        @if (in_array(auth()->user()->whoami, $menu['display_for']))
          <li class="{{ getActiveClass($menu['active']) }}">
            <a href="{{ route($menu['route']) }}"><i class="fas {{$menu['icon']}}"></i> <span>{{ $menu['menu_title'] }}</span></a>
          </li>
        @endif
      @endif
    @endforeach
  </ul>
</aside>
