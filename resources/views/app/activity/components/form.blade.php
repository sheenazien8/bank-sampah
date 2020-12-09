<form method="POST" action="{{ isset($activity) ? route('activity.update', $activity) : route('activity.store') }}" class="needs-validation" novalidate="">
  @csrf
  @isset($activity)
  @method('PUT')
  @endisset
<div class="form-group row">
  <label for="title" class="col-sm-2 col-form-label">{{ trans('app.activity.column.title') }}</label>
  <div class="col-sm-10">
    <input type="text"
           placeholder="{{ trans('app.activity.placeholder.title') }}"
           class="form-control {{ $errors->first('title') ? 'is-invalid' : '' }}"
           id="title"
           name="title"
           value="{{ old('title', optional($activity ?? '')->title ) }}">
  </div>
</div>
<div class="form-group row">
  <label for="tanggal" class="col-sm-2 col-form-label">{{ trans('app.activity.column.tanggal') }}</label>
  <div class="col-sm-10">
    <input type="date"
           placeholder="{{ trans('app.activity.placeholder.tanggal') }}"
           class="form-control {{ $errors->first('tanggal') ? 'is-invalid' : '' }}"
           id="tanggal"
           name="tanggal"
           value="{{ old('tanggal', optional($activity ?? '')->tanggal ) }}">
  </div>
</div>
<div class="form-group row">
  <label for="agenda" class="col-sm-2 col-form-label">{{ trans('app.activity.column.agenda') }}</label>
  <div class="col-sm-10">
    <textarea
      placeholder="{{ trans('app.activity.placeholder.agenda') }}"
      class="form-control summernote {{ $errors->first('tanggal') ? 'is-invalid' : '' }}"
      id="agenda"
      name="agenda"
      row="30"
      >{!! old('agenda',optional($activity ??  '')->agenda) !!}</textarea>
  </div>
</div>
<div class="form-group">
  <button class="btn btn-primary">{{ trans('app.global.save') }}</button>
</div>
</form>

