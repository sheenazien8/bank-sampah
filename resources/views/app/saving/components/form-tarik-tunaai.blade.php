<form method="POST" action="{{ route('saving.tarik_tunai') }}" class="needs-validation tarik-tunai" novalidate="">
  @csrf
  <div class="form-group">
    <label for="nasabah" class="col-form-label">{{ trans('app.saving.column.nasabah') }}</label>
    <div class="">
      <input type="text"
             placeholder="{{ trans('app.saving.placeholder.nasabah') }}"
             class="form-control {{ $errors->first('nasabah') ? 'is-invalid' : '' }}"
             id="nasabah"
             readonly="true"
             name="nasabah"
             value="{{ $saving->nasabahUser->nomor_rekening }}">
    </div>
  </div>
  <div class="form-group">
    <label for="unit" class="col-form-label">{{ trans('app.saving.column.unit') }}</label>
    <div class="">
      <input type="number"
             placeholder="{{ trans('app.saving.placeholder.jumlah_uang') }}"
             class="form-control {{ $errors->first('jumlah_uang') ? 'is-invalid' : '' }}"
             id="jumlah_uang"
             name="jumlah_uang"
             value="">
    </div>
  </div>
</form>

