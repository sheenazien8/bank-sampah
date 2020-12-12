<form method="POST" action="{{ route('report.generate') }}" class="needs-validation" novalidate="">
  @csrf
  <div class="form-group row">
    <div class="col-md-12">
      <label for="nama" class="bold">{{ trans('app.item.column.name') }}</label>
      <select id="bulan" class="form-control" name="bulan">
        @foreach (get_month() as $key => $month)
          <option value="{{ $month }}" {{ request()->bulan == $key ? 'selected' : '' }}>{{ $month }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <button class="btn btn-primary">{{ trans('app.global.generate') }}</button>
  </div>
</form>

