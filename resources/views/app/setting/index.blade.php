@extends('layouts.app')

@section('title', trans('app.setting.title.index'))

@section('content')
  <section class="section">
    @if (app()->environment() == 'production')
    <div class="section-header">
      <h1>{{ trans('app.setting.title.index') }}</h1>
    </div>
    @endif

    <div class="section-body">
      <div class="card">
        <div class="card-header d-flex justify-content-end">
          <h3 class="mr-auto">{{ trans('app.setting.title.index') }}</h3>
          <div class="card-title">
          </div>
        </div>
        <div class="card-body">
        </div>
      </div>
    </div>
  </section>
@endsection

