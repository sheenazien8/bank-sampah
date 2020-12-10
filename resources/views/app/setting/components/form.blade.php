<form method="POST" action="{{ route('setting.store') }}" class="needs-validation col-md-6" novalidate="">
  @csrf
  <div class="form-group">
    <label for="bahasa">@lang('app.setting.bahasa')</label>
    <select id="bahasa" class="form-control" name="bahasa">
      <option {{ setting('bahasa') == 'id' ? 'selected' : '' }} value="id">Bahasa Indonesia</option>
      <option {{ setting('bahasa') == 'en' ? 'selected' : '' }} value="en">English</option>
    </select>
  </div>
  <div class="form-group">
    <label for="profit_bank_sampah">@lang('app.setting.profit_bank_sampah')</label>
    <input type="number"
           class="form-control"
           id="profit_bank_sampah"
           placeholder="@lang('app.setting.placeholder.profit_bank_sampah')"
           name="profit_bank_sampah"
           value="{{ setting('profit_bank_sampah') }}">
  </div>
  <div class="form-group">
    <label for="profit_bank_sampah">@lang('app.setting.profit_total_petugas')</label>
    <input type="number"
           class="form-control"
           id="profit_total_petugas"
           placeholder="@lang('app.setting.placeholder.profit_total_petugas')"
           name="profit_total_petugas"
           value="{{ setting('profit_total_petugas') }}">
  </div>
  <hr>
  <div class="form-group">
    <label for="pin_register_telegram">@lang('app.setting.pin_register_telegram')</label>
    <input type="number"
           class="form-control {{ $errors->first('pin_register_telegram') ? 'is-invalid' : '' }}"
           id="pin_register_telegram"
           placeholder="@lang('app.setting.placeholder.pin_register_telegram')"
           name="pin_register_telegram"
           value="{{ setting('pin_register_telegram') }}">
  </div>
  <button type="submit" class="btn btn-primary">@lang('app.global.save')</button>
</form>
