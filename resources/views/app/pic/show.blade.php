@extends('layouts.app')

@section('title', trans('app.pic.title.show', ['name' => $pic->nama_jabatan]))

@section('content')
  <section class="section">
    @if (app()->environment() == 'production')
      <div class="section-header">
        <h1>{{ trans('app.pic.title.show', ['name' => $pic->nama_jabatan]) }}</h1>
      </div>
    @endif

    <div class="section-body">
      <div class="card">
        <div class="card-header d-flex justify-content-end">
          <h3 class="mr-auto">{{ $pic->nama_jabatan }}</h3>
          <div class="card-title">
            <a href="{{route('pic.edit', $pic->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
          </div>
        </div>
        <div class="card-body">
          @foreach ($pic->getAttributes() as $key => $value)
            @if (getConditionDetail($key))
              <div class="row">
                <div class="col-md-4">
                  <p>{{ trans("app.pic.column.{$key}") }}</p>
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
