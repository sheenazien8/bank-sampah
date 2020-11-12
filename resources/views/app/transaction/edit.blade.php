@extends('layouts.app')

@section('title', trans('app.transaction.title.edit', ['name' => $transaction->nama]))

@section('content')
  <section class="section">
    @if (app()->environment() == 'production')
      <div class="section-header">
        <h1>{{ trans('app.transaction.title.edit', ['name' => $transaction->nama]) }}</h1>
      </div>
    @endif

    <div class="section-body">
      <div class="card">
        <div class="card-header d-flex justify-content-end">
          <h3 class="mr-auto">{{ trans('app.transaction.title.edit', ['name' => $transaction->nama]) }}</h3>
          <div class="card-title">
          </div>
        </div>
        <div class="card-body">
          @include('app.transaction.components.form')
        </div>
      </div>
    </div>
  </section>
@endsection
