@extends('layouts.app')

@section('title', trans('app.content.title.edit', ['name' => $content->title]))

@section('content')
  <section class="section">
    @if (app()->environment() == 'production')
      <div class="section-header">
        <h1>{{ trans('app.content.title.edit', ['name' => $content->title]) }}</h1>
      </div>
    @endif

    <div class="section-body">
      <div class="card">
        <div class="card-header d-flex justify-content-end">
          <h3 class="mr-auto">{{ trans('app.content.title.edit', ['name' => $content->title]) }}</h3>
          <div class="card-title">
          </div>
        </div>
        <div class="card-body">
          @include('app.content.components.form')
        </div>
      </div>
    </div>
  </section>
@endsection
