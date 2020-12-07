<form method="POST" action="{{ isset($transaction) ? route('transaction.update', $transaction) : route('transaction.store') }}" class="needs-validation" novalidate="">
  @csrf
  @isset($transaction)
    @method('PUT')
  @endisset
  <div class="form-group row">
    <label for="nasabah" class="col-sm-2 col-form-label">{{ trans('app.transaction.column.nasabah') }}</label>
    <div class="col-sm-10">
      <select name="nasabah" id="nasabah" class="form-control" style="width: 100%">
        <option value="" disabled>{{ trans('app.transaction.placeholder.nasabah') }}</option>
        @foreach ($nasabah as $nasabah)
          <option value="{{ $nasabah['value'] }}">{{ $nasabah['text'] }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>{{ trans('app.transaction.column.item') }}</th>
        <th>{{ trans('app.transaction.column.quantity') }}</th>
        <th>{{ trans('app.transaction.column.price') }}</th>
        <th>{{ trans('app.transaction.column.satuan') }}</th>
      </tr>
    </thead>
    <tbody class="tbody-transaction">
      <tr class="row-table-transaction">
        <td>
          <input
            type="text"
            placeholder="{{ trans('app.transaction.placeholder.item') }}"
            class="form-control row row-item"
            name="item[]"
            value=""
          >
        </td>
        <td>
          <input
            type="text"
            placeholder="{{ trans('app.transaction.placeholder.quantity') }}"
            class="form-control row row-satuan"
            name="quantity[]"
            value=""
          >
        </td>
        <td>
          <input
            type="text"
            placeholder="{{ trans('app.transaction.placeholder.price') }}"
            class="form-control row row-price"
            name="price[]"
            value=""
          >
        </td>
        <td>
          <div class="row">
            <input
                 type="text"
                 placeholder="{{ trans('app.transaction.placeholder.satuan') }}"
                 class="form-control row-satuan col"
                 name="satuan[]"
                 value=""
                 >
                 <button class="btn btn-danger col close-row">X</button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="form-group">
    <button class="btn btn-primary">{{ trans('app.global.save') }}</button>
    <button type="button" class="btn btn-info add-item">{{ trans('app.transaction.add_item') }}</button>
  </div>
</form>
