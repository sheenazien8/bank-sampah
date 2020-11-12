<form method="POST" action="{{ isset($transaction) ? route('transaction.update', $transaction) : route('transaction.store') }}" class="needs-validation" novalidate="">
  @csrf
  @isset($transaction)
    @method('PUT')
  @endisset
  <div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">{{ trans('app.transaction.column.name') }}</label>
    <div class="col-sm-10">
      <input type="text"
             placeholder="{{ trans('app.transaction.placeholder.name') }}"
             class="form-control"
             id="nama"
             name="nama"
             value="{{ optional($transaction ?? '')->nama }}">
    </div>
  </div>
  <div class="form-group">
    <button class="btn btn-primary">{{ trans('app.global.save') }}</button>
  </div>
</form>
