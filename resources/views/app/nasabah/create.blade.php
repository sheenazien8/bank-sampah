@extends('layouts.app')

@section('title', trans('app.nasabah.title.create'))

@section('content')
  <section class="section">
    @if (app()->environment() == 'production')
      <div class="section-header">
        <h1>{{ trans('app.nasabah.title.create') }}</h1>
      </div>
    @endif

    <div class="section-body">
      <div class="card">
        <div class="card-header d-flex justify-content-end">
          <h3 class="mr-auto">{{ trans('app.nasabah.title.create') }}</h3>
          <div class="card-title">
          </div>
        </div>
        <div class="card-body">
          @include('app.nasabah.components.form')
        </div>
      </div>
    </div>
  </section>
@endsection
