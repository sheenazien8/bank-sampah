<form method="POST" action="{{ isset($item) ? route('item.update', $item) : route('item.store') }}" class="needs-validation" novalidate="">
  @csrf
  @isset($item)
    @method('PUT')
  @endisset
  <div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">{{ trans('app.item.column.name') }}</label>
    <div class="col-sm-10">
      <input type="text"
             placeholder="{{ trans('app.item.placeholder.name') }}"
             class="form-control {{ $errors->first('nama') ? 'is-invalid' : '' }}"
             id="nama"
             name="nama"
             value="{{ old('nama',  optional($item ?? '')->nama ) }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="unit" class="col-sm-2 col-form-label">{{ trans('app.item.column.unit') }}</label>
    <div class="col-sm-10">
      <input type="text"
             placeholder="{{ trans('app.item.placeholder.unit') }}"
             class="form-control {{ $errors->first('unit') ? 'is-invalid' : '' }}"
             id="unit"
             name="unit"
             value="{{ old('unit',  optional($item ?? '')->unit ) }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="price" class="col-sm-2 col-form-label">{{ trans('app.item.column.price') }}</label>
    <div class="col-sm-10">
      <input type="number"
             placeholder="{{ trans('app.item.placeholder.price') }}"
             class="form-control {{ $errors->first('price') ? 'is-invalid' : '' }}"
             id="price"
             name="price"
             value="{{ old('price',  optional($item ?? '')->price ) }}">
    </div>
  </div>
  <div class="form-group">
    <button class="btn btn-primary">{{ trans('app.global.save') }}</button>
  </div>
</form>
