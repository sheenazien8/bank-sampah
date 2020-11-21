@extends('layouts.app')

@section('title', trans('app.item.title.show', ['name' => $item->nama]))

@section('content')
  <section class="section">
    @if (app()->environment() == 'production')
      <div class="section-header">
        <h1>{{ trans('app.item.title.show', ['name' => $item->nama]) }}</h1>
      </div>
    @endif

    <div class="section-body">
      <div class="card">
        <div class="card-header d-flex justify-content-end">
          <h3 class="mr-auto">{{ $item->nama }}</h3>
          <div class="card-title">
            <a href="{{route('item.edit', $item->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
            {{-- <a href="{{route('item.destroy', $item->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a> --}}
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <p>{{ trans('app.item.column.name') }}</p>
            </div>
            <div class="col-md-8">
              <p>{{ $item->nama }}</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-4">
              <p>{{ trans('app.item.column.unit') }}</p>
            </div>
            <div class="col-md-8">
              <p>{{ $item->unit->nama }}</p>
            </div>
          </div>
          <hr>
        </div>
      </div>
    </div>
  </section>
@endsection
