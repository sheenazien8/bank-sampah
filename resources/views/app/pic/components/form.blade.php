<form method="POST" action="{{ isset($pic) ? route('pic.update', $pic) : route('pic.store') }}" class="needs-validation" novalidate="">
  @csrf
  @isset($pic)
    @method('PUT')
  @endisset
  <div class="form-group row">
    <label for="nama_jabatan" class="col-sm-2 col-form-label">{{ trans('app.pic.column.name') }}</label>
    <div class="col-sm-10">
      <input type="text"
             placeholder="{{ trans('app.pic.placeholder.name') }}"
             class="form-control {{ $errors->first('nama_jabatan') ? 'is-invalid' : '' }}"
             id="nama_jabatan"
             name="nama_jabatan"
             value="{{ optional($pic ?? '')->nama_jabatan }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="keterangan" class="col-sm-2 col-form-label">{{ trans('app.pic.column.description') }}</label>
    <div class="col-sm-10">
      <input type="text"
             placeholder="{{ trans('app.pic.placeholder.description') }}"
             class="form-control {{ $errors->first('keterangan') ? 'is-invalid' : '' }}"
             id="keterangan"
             name="keterangan"
             value="{{ optional($pic ?? '')->keterangan }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="nilai_setiap_tugas" class="col-sm-2 col-form-label">{{ trans('app.pic.column.value') }}</label>
    <div class="col-sm-10">
      <input type="text"
             placeholder="{{ trans('app.pic.placeholder.value') }}"
             class="form-control {{ $errors->first('nilai_setiap_tugas') ? 'is-invalid' : '' }}"
             id="nilai_setiap_tugas"
             name="nilai_setiap_tugas"
             value="{{ optional($pic ?? '')->nilai_setiap_tugas }}">
    </div>
  </div>
  <div class="form-group">
    <button class="btn btn-primary">{{ trans('app.global.save') }}</button>
  </div>
</form>
