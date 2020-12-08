@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    @if (auth()->user()->whoami == 'admin')
      @include('app.dashboard.components.card')
    @else
      @include('app.dashboard.components.tabungan')
    @endif

    <div class="section-body">
    </div>
  </section>
@endsection
