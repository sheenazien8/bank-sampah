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
          </div>
        </div>
        <div class="card-body">
          @foreach ($item->getAttributes() as $key => $value)
            @if (getConditionDetail($key))
              <div class="row">
                <div class="col-md-4">
                  <p>{{ trans("app.item.column.{$key}") }}</p>
                </div>
                <div class="col-md-8">
                  <p><b>{{ $value }}</b></p>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </section>
@endsection
