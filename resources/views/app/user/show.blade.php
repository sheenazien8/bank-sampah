@extends('layouts.app')

@section('title', trans('app.user.title.show', ['name' => $user->username]))

@section('content')
  <section class="section">
    @if (app()->environment() == 'production')
      <div class="section-header">
        <h1>{{ trans('app.user.title.show', ['name' => $user->username]) }}</h1>
      </div>
    @endif

    <div class="section-body">
      <div class="card">
        <div class="card-header d-flex justify-content-end">
          <h3 class="mr-auto">{{ $user->username }}</h3>
          <div class="card-title">
            <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
          </div>
        </div>
        <div class="card-body">
          @foreach ($user->getAttributes() as $key => $value)
            @if (getConditionDetail($key, 'remember_token', 'email_verified_at', 'password', 'is_nasabah', 'nomor_rekening'))
              <div class="row">
                <div class="col-md-4">
                  <p>{{ trans("app.user.column.{$key}") }}</p>
                </div>
                <div class="col-md-8">
                  <p>{{ $value }}</p>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </section>
@endsection
