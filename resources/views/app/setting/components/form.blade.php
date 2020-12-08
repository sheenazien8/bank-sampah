<form method="POST" action="{{ route('setting.store') }}" class="needs-validation col-md-6" novalidate="">
  @csrf
  <div class="form-group">
    <label for="bahasa">@lang('app.setting.bahasa')</label>
    <select id="bahasa" class="form-control" name="bahasa">
      <option selected="{{ setting('bahasa') == 'id' ? true : '' }}" value="id">Bahasa Indonesia</option>
      <option selected="{{ setting('bahasa') == 'en' ? true : '' }}" value="en">English</option>
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
  <button type="submit" class="btn btn-primary">@lang('app.global.save')</button>
</form>
