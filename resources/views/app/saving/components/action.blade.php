<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-list"></i>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{route($resources.'.show', $model->id)}}">
      <span><i class="fas fa-eye"></i></span> {{ trans('app.global.show') }}
    </a>
  </div>
</div>

