@extends('layouts.app')

@section('title', trans('app.pic.title.index'))

@section('content')
  <section class="section">
    @if (app()->environment() == 'production')
    <div class="section-header">
      <h1>{{ trans('app.pic.title.index') }}</h1>
    </div>
    @endif

    <div class="section-body">
      <div class="card">
        <div class="card-header d-flex justify-content-end">
          <h3 class="mr-auto">{{ trans('app.pic.title.index') }}</h3>
          <div class="card-title">
            <a href="{{route('pic.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> <span>{{ trans('app.global.add', ['name' => 'Item']) }}</span></a>
          </div>
        </div>
        <div class="card-body">
          @include('app.pic.components.table')
        </div>
      </div>
    </div>
  </section>
@endsection
