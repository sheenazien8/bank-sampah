@extends('layouts.app')

@section('title', trans('app.nasabah.title.show', ['name' => $nasabah->nama_lengkap]))

@section('content')
  <section class="section">
    @if (app()->environment() == 'production')
      <div class="section-header">
        <h1>{{ trans('app.nasabah.title.show', ['name' => $nasabah->nama_lengkap]) }}</h1>
      </div>
    @endif

    <div class="section-body">
      <div class="card">
        <div class="card-header d-flex justify-content-end">
          <h3 class="mr-auto">{{ $nasabah->nama_lengkap }}</h3>
          <div class="card-title">
            @if ($nasabah->user->getSaving)
              @if (!auth()->user()->is_nasabah)
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> @lang('app.saving.tarik_tunai')</a>
              @endif
              <a href="{{route('saving.show', $nasabah->user->getSaving->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i> @lang('app.saving.detail')</a>
            @endif
            <a href="{{route('nasabah.edit', $nasabah->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <h4>{{ trans("app.nasabah.column.saldo_akhir") }}</h4>
            </div>
            <div class="col-md-8">
              <h4>{{ price_format($nasabah->saldo_akhir) }}</h4>
            </div>
          </div>
          <hr>
          @foreach ($nasabah->user->getAttributes() as $key => $value)
            @if (getConditionDetail($key, 'password', 'email_verified_at', 'remember_token', 'is_nasabah'))
              <div class="row">
                <div class="col-md-4">
                  <p>{{ trans("app.nasabah.column.{$key}") }}</p>
                </div>
                <div class="col-md-8">
                  <p><b>{{ $value }}</b></p>
                </div>
              </div>
            @endif
          @endforeach
          @foreach ($nasabah->getAttributes() as $key => $value)
            @if (getConditionDetail($key, 'user_id', 'saldo_akhir'))
              <div class="row">
                <div class="col-md-4">
                  <p>{{ trans("app.nasabah.column.{$key}") }}</p>
                </div>
                <div class="col-md-8">
                  <p><b>{{ $value }}</b></p>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </section>
  @if ($nasabah->user->getSaving)
    @include('app.saving.components.tarik-tunai', [
      'saving' => $nasabah->user->getSaving
    ])
  @endif
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
