@extends('layouts.app')

@section('title', trans('app.activity.title.edit'))

@section('content')
  <section class="section">
    @if (app()->environment() == 'production')
      <div class="section-header">
        <h1>{{ trans('app.activity.title.edit') }}</h1>
      </div>
    @endif

    <div class="section-body">
      <div class="card">
        <div class="card-header d-flex justify-content-end">
          <h3 class="mr-auto">{{ trans('app.activity.title.edit') }}</h3>
          <div class="card-title">
          </div>
        </div>
        <div class="card-body">
          <form method="POST" action="{{route('activity.update', $activity->id) }}" class="needs-validation" novalidate="">
  @csrf
  @isset($activity)
    @method('PUT')
  @endisset

  <div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">{{ trans('app.activity.column.title') }}</label>
    <div class="col-sm-10">
      <input type="text"
             placeholder="{{ trans('app.activity.placeholder.title') }}"
             class="form-control"
             id="title"
             name="title"
             value="{{ $activity->title }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="tanggal" class="col-sm-2 col-form-label">{{ trans('app.activity.column.tanggal') }}</label>
    <div class="col-sm-10">
      <input type="date"
             placeholder="{{ trans('app.activity.placeholder.tanggal') }}"
             class="form-control"
             id="tanggal"
             name="tanggal"
             value="{{ optional($activity ?? '')->tanggal }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="agenda" class="col-sm-2 col-form-label">{{ trans('app.activity.column.agenda') }}</label>
    <div class="col-sm-10">
      <textarea
      placeholder="{{ trans('app.activity.placeholder.agenda') }}"
             class="form-control"
             id="agenda"
             name="agenda"
             row="30"
      >{{ $activity->agenda }}</textarea>
    </div>
  </div>
  <div class="form-group">
    <button class="btn btn-primary">{{ trans('app.global.save') }}</button>
  </div>
</form>

        </div>
      </div>
    </div>
  </section>
@endsection
