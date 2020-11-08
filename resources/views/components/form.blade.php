<div class="d-flex justify-content-center">
  <div class="{{ $card ? 'card' : ''}} col-md-{{ $size }} p-0">
    {{ Aire::open($route)->rules($rules)->addClass($addclass)->enctype('multipart/form-data') }}
      @if ($card)
        <div class="card-header">
          <h4>{{ $title }}</h4>
        </div>
      @endif
      <div class="{{ $card ? 'card-body' : '' }}">
        @csrf
        @method($method)
        {{ $slot }}
      </div>
      <div class="{{ $card ? 'card-footer' : '' }}">
        @if ($withsubmit)
          <div class="{{ $card ? '' : 'col-12' }}">
            {{ Aire::submit(__('app.global.submit')) }}
          </div>
        @endif
      </div>
    {{ Aire::close() }}
  </div>
</div>
