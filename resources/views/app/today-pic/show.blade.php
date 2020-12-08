@extends('layouts.app')

@section('title', trans('app.today_pic.title.show', ['name' => $today_pic->user->nasabahProfile->nama_lengkap ]))

@section('content')
  <section class="section">
    @if (app()->environment() == 'production')
      <div class="section-header">
        <h1>{{ trans('app.today_pic.title.show', ['name' =>  $today_pic->user->nasabahProfile->nama_lengkap ]) }}</h1>
      </div>
    @endif

    <div class="section-body">
      <div class="card">
        <div class="card-header d-flex justify-content-end">
          <h3 class="mr-auto">{{ $today_pic->user->nasabahProfile->nama_lengkap }}</h3>
          <div class="card-title">
            <a href="{{route('today-pic.edit', $today_pic->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <p>{{ trans('app.today_pic.column.name') }}</p>
            </div>
            <div class="col-md-8">
              <p>{{ $today_pic->user->nasabahProfile->nama_lengkap }}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <p>{{ trans('app.today_pic.column.date') }}</p>
            </div>
            <div class="col-md-8">
              <p><b>{{ $today_pic->tanggal_tugas }}</b></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
