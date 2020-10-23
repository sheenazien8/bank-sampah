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
             class="form-control"
             id="nama"
             name="nama"
             value="{{ optional($item ?? '')->nama }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="unit" class="col-sm-2 col-form-label">{{ trans('app.item.column.unit') }}</label>
    <div class="col-sm-10">
      <select id="inputState" name="unit_id" class="form-control">
        @foreach (App\Models\Unit::select('nama', 'id')->get() as $unit)
          <option {{ optional(optional($item ?? '')->unit ?? '')->id == $unit->id ? 'selected' : ''}} value="{{ $unit->id }}">{{ $unit->nama }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <button class="btn btn-primary">{{ trans('app.global.save') }}</button>
  </div>
</form>
