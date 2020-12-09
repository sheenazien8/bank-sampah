@extends('layouts.app')

@section('title', trans('app.content.title.show', ['name' => $content->nama]))

@section('content')
  <section class="section">
    @if (app()->environment() == 'production')
      <div class="section-header">
        <h1>{{ trans('app.content.title.show', ['name' => $content->nama]) }}</h1>
      </div>
    @endif

    <div class="section-body">
      <div class="card">
        <div class="card-header d-flex justify-content-end">
          <h3 class="mr-auto">{{ $content->nama }}</h3>
          <div class="card-title">
            @if (auth()->user()->whoami == 'admin')
              <a href="{{route('content.edit', $content->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
            @endif
          </div>
        </div>
        <div class="card-body">
          @foreach ($content->getAttributes() as $key => $value)
            @if (getConditionDetail($key, 'user_id'))
              <div class="row">
                <div class="col-md-4">
                  <p>{{ trans("app.content.column.{$key}") }}</p>
                </div>
                <div class="col-md-8">
                  @if ($key == 'body')
                    {!! $value !!}
                  @else
                    <p><b>{{ $value }}</b></p>
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
