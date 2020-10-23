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
            {{-- <a href="{{route('nasabah.destroy', $nasabah->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a> --}}
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <p>{{ trans('app.nasabah.column.name') }}</p>
            </div>
            <div class="col-md-8">
              <p>{{ $nasabah->nama_lengkap }}</p>
            </div>
          </div>
          <hr>
        </div>
      </div>
    </div>
  </section>
@endsection
