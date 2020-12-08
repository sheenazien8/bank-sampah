<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-list"></i>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    @if (!isset($tanpaedit))
      <a class="dropdown-item" href="{{route($resources.'.edit', $model->id)}}">
        <span><i class="fas fa-pen"></i></span> {{ trans('app.global.edit') }}
      </a>
    @endif
    @if (!isset($tanpadetail))
      <a class="dropdown-item" href="{{route($resources.'.show', $model->id)}}">
        <span><i class="fas fa-eye"></i></span> {{ trans('app.global.show') }}
      </a>
    @endif
    @if (!isset($tanpadelete))
      <a class="dropdown-item" href="#">
        <form method="POST" class="d-inline" action="{{ route($resources.'.destroy', $model->id) }}">
          @csrf
          {{ method_field('DELETE') }}
          <button class="btn btn-sm btn-block text-left"><i class="fas fa-trash"></i> {{ trans('app.global.delete') }}</button>
        </form>
      </a>
    @endif
  </div>
</div>
