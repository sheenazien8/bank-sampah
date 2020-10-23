<form method="POST" action="{{ isset($nasabah) ? route('nasabah.update', $nasabah) : route('nasabah.store') }}" class="needs-validation" novalidate="">
  @csrf
  @isset($nasabah)
    @method('PUT')
  @endisset
  <div class="form-group row">
    <label for="nama_lengkap" class="col-sm-2 col-form-label">{{ trans('app.nasabah.column.name') }}</label>
    <div class="col-sm-10">
      <input type="text"
             placeholder="{{ trans('app.nasabah.placeholder.name') }}"
             class="form-control"
             id="nama_lengkap"
             name="nama_lengkap"
             value="{{ optional($nasabah ?? '')->nama_lengkap }}">
    </div>
  </div>
  <div class="form-group">
    <button class="btn btn-primary">{{ trans('app.global.save') }}</button>
  </div>
</form>
