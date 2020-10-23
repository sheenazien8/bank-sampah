<form method="POST" action="{{ isset($unit) ? route('unit.update', $unit) : route('unit.store') }}" class="needs-validation" novalidate="">
  @csrf
  @isset($unit)
    @method('PUT')
  @endisset
  <div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">{{ trans('app.unit.column.name') }}</label>
    <div class="col-sm-10">
      <input type="text"
             placeholder="{{ trans('app.unit.placeholder.name') }}"
             class="form-control"
             id="nama"
             name="nama"
             value="{{ optional($unit ?? '')->nama }}">
    </div>
  </div>
  <div class="form-group">
    <button class="btn btn-primary">{{ trans('app.global.save') }}</button>
  </div>
</form>
