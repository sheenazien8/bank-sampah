@extends('layouts.app')

@section('title', trans('app.saving.title.show', ['name' => $saving->saldo_akhir ]))

@section('content')
  <section class="section">
    @if (app()->environment() == 'production')
      <div class="section-header">
        <h1>{{ trans('app.saving.title.show', ['name' =>  $saving->saldo_akhir ]) }}</h1>
      </div>
    @endif

    <div class="section-body">
      <div class="card">
        <div class="card-header d-flex justify-content-end">
          <h3 class="mr-auto">{{ $saving->nasabahUser->nasabahProfile->nama_lengkap }}</h3>
          @if (!auth()->user()->is_nasabah)
            <div class="card-title">
              <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-pen"></i> @lang('app.saving.tarik_tunai')</a>
            </div>
          @endif
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <h5>{{ trans('app.saving.column.saldo_akhir') }}</h5>
            </div>
            <div class="col-md-8">
              <h5>{{price_format($saving->saldo_akhir)}}</h5>
            </div>
          </div>
          <br>
          <div class="row">
            <table class="table">
              <thead>
                <tr>
                  <th>@lang('app.saving.tanggal_transaksi')</th>
                  <th>@lang('app.saving.type')</th>
                  <th>@lang('app.saving.jumlah_uang')</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($saving->savingHistories as $savingHistory)
                  <tr>
                    <td>{{ $savingHistory->tanggal }}</td>
                    <td>{{ $savingHistory->type_string }}</td>
                    <td>{{ price_format( $savingHistory->jumlah_uang ) }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  @include('app.saving.components.tarik-tunai')
@endsection
@push('javascript')
  <script charset="utf-8">
    $(document).ready(() => {
      $('.save').click(() => {
        $('form.tarik-tunai').submit()
      })
    })
  </script>
@endpush
