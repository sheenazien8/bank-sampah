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
             class="form-control {{ $errors->first('nama_lengkap') ? 'is-invalid' : '' }}"
             id="nama_lengkap"
             name="nama_lengkap"
             value="{{ old('nama_lengkap', optional($nasabah ?? '')->nama_lengkap) }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="nomor_ktp" class="col-sm-2 col-form-label">{{ trans('app.nasabah.column.id_number') }}</label>
    <div class="col-sm-10">
      <input type="text"
             placeholder="{{ trans('app.nasabah.placeholder.id_number') }}"
             class="form-control {{ $errors->first('nomor_ktp') ? 'is-invalid' : '' }}"
             id="nomor_ktp"
             name="nomor_ktp"
             value="{{ old('nomor_ktp', optional($nasabah ?? '')->nomor_ktp) }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label">{{ trans('app.nasabah.column.address') }}</label>
    <div class="col-sm-10">
      <input type="text"
             placeholder="{{ trans('app.nasabah.placeholder.address') }}"
             class="form-control {{ $errors->first('alamat') ? 'is-invalid' : '' }}"
             id="alamat"
             name="alamat"
             value="{{ old('alamat', optional($nasabah ?? '')->alamat) }}">
    </div>
  </div>
  <hr>
  <div class="form-group row">
    <label for="username" class="col-sm-2 col-form-label">{{ trans('app.nasabah.column.username') }}</label>
    <div class="col-sm-10">
      <input type="text"
             placeholder="{{ trans('app.nasabah.placeholder.username') }}"
             class="form-control {{ $errors->first('username') ? 'is-invalid' : '' }}"
             id="username"
             name="username"
             value="{{ old('username', optional(optional($nasabah ?? '')->user ?? '')->username) }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="nomor_rekening" class="col-sm-2 col-form-label">{{ trans('app.nasabah.column.account_number') }}</label>
    <div class="col-sm-10">
      <input type="text"
             placeholder="{{ trans('app.nasabah.placeholder.account_number') }}"
             class="form-control {{ $errors->first('nomor_rekening') ? 'is-invalid' : '' }}"
             id="nomor_rekening"
             name="nomor_rekening"
             value="{{ old('nomor_rekening',  optional(optional($nasabah ?? '')->user ?? '')->nomor_rekening ) }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label">{{ trans('app.nasabah.column.phone') }}</label>
    <div class="col-sm-10">
      <input type="text"
             placeholder="{{ trans('app.nasabah.placeholder.phone') }}"
             class="form-control {{ $errors->first('phone') ? 'is-invalid' : '' }}"
             id="phone"
             name="phone"
             value="{{ old('phone',  optional(optional($nasabah ?? '')->user ?? '')->phone ) }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="telegram_account" class="col-sm-2 col-form-label">{{ trans('app.nasabah.column.telegram_account') }}</label>
    <div class="col-sm-10">
      <input type="text"
             placeholder="{{ trans('app.nasabah.placeholder.telegram_account') }}"
             class="form-control {{ $errors->first('telegram_account') ? 'is-invalid' : '' }}"
             id="telegram_account"
             name="telegram_account"
             value="{{ old('telegram_account',  optional(optional($nasabah ?? '')->user ?? '')->telegram_account ) }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">{{ trans('app.nasabah.column.password') }}</label>
    <div class="col-sm-10">
      <input type="password"
             placeholder="{{ trans('app.nasabah.placeholder.password') }}"
             class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }}"
             id="password"
             name="password"
             value="">
    </div>
  </div>
  <div class="form-group">
    <button class="btn btn-primary">{{ trans('app.global.save') }}</button>
  </div>
</form>
