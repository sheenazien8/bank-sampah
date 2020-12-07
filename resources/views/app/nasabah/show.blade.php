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
            <a href="{{route('nasabah.edit', $nasabah->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
          </div>
        </div>
        <div class="card-body">
          @foreach ($nasabah->user->getAttributes() as $key => $value)
            @if (getConditionDetail($key, 'password', 'email_verified_at', 'remember_token', 'is_nasabah'))
              <div class="row">
                <div class="col-md-4">
                  <p>{{ trans("app.nasabah.column.{$key}") }}</p>
                </div>
                <div class="col-md-8">
                  <p>{{ $value }}</p>
                </div>
              </div>
            @endif
          @endforeach
          @foreach ($nasabah->getAttributes() as $key => $value)
            @if (getConditionDetail($key))
              <div class="row">
                <div class="col-md-4">
                  <p>{{ trans("app.nasabah.column.{$key}") }}</p>
                </div>
                <div class="col-md-8">
                  @if ($key == 'saldo_akhir')
                    <p>{{ price_format($value) }}</p>
                  @else
                    <p>{{ $value }}</p>
                  @endif
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </section>
@endsection
