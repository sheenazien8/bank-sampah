@extends('layouts.app')

@section('title', trans('app.transaction.title.show', ['name' => $transaction->nama]))

@section('content')
  <section class="section">
    @if (app()->environment() == 'production')
      <div class="section-header">
        <h1>{{ trans('app.transaction.title.show', ['name' => $transaction->nama]) }}</h1>
      </div>
    @endif

    <div class="section-body">
      <div class="card">
        <div class="card-header d-flex justify-content-end">
          <h3 class="mr-auto">{{ $transaction->nasabah->nama_lengkap }}</h3>
          <div class="card-title">
            <a href="{{route('saving.show', ['saving' => $transaction->nasabah->user->getSaving->id])}}" class="btn btn-primary"><i class="fas fa-eye"></i> @lang('app.saving.detail')</a>
          </div>
        </div>
        <div class="card-body">
          @foreach ($transaction->getAttributes() as $key => $value)
            @if (getConditionDetail($key, 'user_id', 'nasabah_id'))
              <div class="row">
                <div class="col-md-4">
                  <p>{{ trans("app.transaction.column.{$key}") }}</p>
                </div>
                <div class="col-md-8">
                  <p><b>{{ $value }}</b></p>
                </div>
              </div>
            @endif
          @endforeach
          <table class="table table-bordered">
            <thead>
              <tr>
                <th></th>
                <th>@lang('app.transaction.column.item')</th>
                <th>@lang('app.transaction.column.quantity')</th>
                <th>@lang('app.transaction.column.price')</th>
                <th>@lang('app.transaction.column.satuan')</th>
                <th>@lang('profit')</th>
              </tr>
            </thead>
            @php
              $total = 0;
              $qtyTotal = 0;
            @endphp
            @foreach ($transaction->detailTransaksi as $detailTransaksi)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $detailTransaksi->item->nama }}</td>
                <td>{{ $detailTransaksi->jumlah }}</td>
                <td>{{ price_format($detailTransaksi->harga_sekarang) }}</td>
                <td>{{ $detailTransaksi->item->unit }}</td>
                <td>{{ $detailTransaksi->profit_bank_sampah }}%</td>
              </tr>
              @php
                $total += $detailTransaksi->harga_sekarang;
                $qtyTotal += $detailTransaksi->jumlah;
              @endphp
            @endforeach
            <tr>
              <td><b>Total:</b></td>
              <td><b>{{ $qtyTotal }}</b></td>
              <td><b>{{ price_format($total) }}</b></td>
              <td><b>{{ price_format($total * $qtyTotal) }}</b></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </section>
@endsection
