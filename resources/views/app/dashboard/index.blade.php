@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    @include('app.dashboard.components.card')

    <div class="section-body">
    </div>
  </section>
@endsection
