<div>
  <div class="mb-3">
    @if ($route != '')
      <a href="{{ $route }}" class="btn btn-{{ $color }}"><i class="{{ $icon }}"></i> {{ $title }}</a>
    @else
      <button type="{{ $type }}" class="btn btn-{{ $color }}"><i class="{{ $icon }}"></i> {{ $title }}</button>
    @endif
  </div>
</div>
