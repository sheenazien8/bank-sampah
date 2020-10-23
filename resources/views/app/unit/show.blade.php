@extends('layouts.app')

@section('title', trans('app.unit.title.show', ['name' => $unit->nama]))

@section('content')
  <section class="section">
    @if (app()->environment() == 'production')
      <div class="section-header">
        <h1>{{ trans('app.unit.title.show', ['name' => $unit->nama]) }}</h1>
      </div>
    @endif

    <div class="section-body">
      <div class="card">
        <div class="card-header d-flex justify-content-end">
          <h3 class="mr-auto">{{ $unit->nama }}</h3>
          <div class="card-title">
            <a href="{{route('unit.edit', $unit->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <p>{{ trans('app.unit.column.name') }}</p>
            </div>
            <div class="col-md-8">
              <p>{{ $unit->nama }}</p>
            </div>
          </div>
          <hr>
        </div>
      </div>
    </div>
  </section>
@endsection
