@extends('layouts.skeleton')

@section('app')
  <div class="main-wrapper">
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
      @include('partials.topnav')
    </nav>
    <div class="main-sidebar">
      @include('partials.sidebar')
    </div>

    <!-- Main Content -->
    <div class="main-content">
      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <h4 class="alert-heading">{{ trans('app.global.ohno422') }}</h4>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
           @foreach ($errors->all() as $error)
             <p><b>{{ $error }}</b></p>
            @endforeach
        </div>
      @endif
      @include('partials.flash-message')
      @yield('content')
    </div>
    <footer class="main-footer">
      @include('partials.footer')
    </footer>
  </div>
@endsection

