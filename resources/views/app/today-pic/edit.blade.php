@extends('layouts.app')

@section('title', trans('app.today_pic.title.edit', ['name' => $today_pic->user->nasabahProfile->nama_lengkap]))

@section('content')
  <section class="section">
    @if (app()->environment() == 'production')
      <div class="section-header">
        <h1>{{ trans('app.today_pic.title.edit', ['name' => $today_pic->user->nasabahProfile->nama_lengkap]) }}</h1>
      </div>
    @endif

    <div class="section-body">
      <div class="card">
        <div class="card-header d-flex justify-content-end">
          <h3 class="mr-auto">{{ trans('app.today_pic.title.edit', ['name' => $today_pic->user->nasabahProfile->nama_lengkap]) }}</h3>
          <div class="card-title">
          </div>
        </div>
        <div class="card-body">
          @include('app.today-pic.components.form')
        </div>
      </div>
    </div>
  </section>
@endsection
