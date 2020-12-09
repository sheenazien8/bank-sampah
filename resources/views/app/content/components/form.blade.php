<form method="POST" action="{{ isset($content) ? route('content.update', $content) : route('content.store') }}" class="needs-validation" novalidate="">
  @csrf
  @isset($content)
    @method('PUT')
  @endisset
  <div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">{{ trans('app.content.column.title') }}</label>
    <div class="col-sm-10">
      <input type="text"
             placeholder="{{ trans('app.content.placeholder.title') }}"
             class="form-control {{ $errors->first('title') ? 'is-invalid' : '' }}"
             id="title"
             name="title"
             value="{{ old('title', optional($content ?? '')->title ) }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="unit" class="col-sm-2 col-form-label">{{ trans('app.content.column.body') }}</label>
    <div class="col-sm-10">
      <textarea placeholder="{{ trans('app.content.placeholder.body') }}"
                id="body"
                class="form-control summernote {{ $errors->first('body') ? 'is-invalid' : '' }}"
                name="body"
                >{{ old('body', optional($content ?? '')->body ) }}</textarea>
    </div>
  </div>
  <div class="form-group">
    <button class="btn btn-primary">{{ trans('app.global.save') }}</button>
  </div>
</form>
