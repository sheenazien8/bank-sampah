@extends('layouts.app')

@section('title', trans('app.activity.title.show', ['name' => $activity->nama]))

@section('content')
  <section class="section">
    @if (app()->environment() == 'production')
      <div class="section-header">
        <h1>{{ trans('app.activity.title.show', ['name' => $activity->nama]) }}</h1>
      </div>
    @endif

    <div class="section-body">
      <div class="card">
        <div class="card-header d-flex justify-activity-end">
          <h3 class="mr-auto">{{ $activity->nama }}</h3>
          <div class="card-title">
            <a href="{{route('activity.edit', $activity->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
            {{-- <a href="{{route('activity.destroy', $activity->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a> --}}
          </div>
        </div>
        <div class="card-body">
          @foreach ($activity->getAttributes() as $key => $value)
            @if (getConditionDetail($key, 'user_id'))
              <div class="row">
                <div class="col-md-4">
                  <p>{{ trans("app.activity.column.{$key}") }}</p>
                </div>
                <div class="col-md-8">
                  @if ($key == 'agenda')
                    {!! $value !!}
                  @else
                    <p>{{ $value }}</p>
                  @endif
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </section>
@endsection
