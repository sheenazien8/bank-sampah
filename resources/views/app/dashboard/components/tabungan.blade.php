<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-dollar-sign"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>@lang('app.dashboard.tabungan')</h4>
        </div>
        <div class="card-body">
          {{ price_format(auth()->guard()->user()->tabungan->saldo_akhir) }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="fas fa-user-friends"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>@lang('app.dashboard.total_nasabah')</h4>
        </div>
        <div class="card-body">
          {{ $nasabah }}
        </div>
      </div>
    </div>
  </div>
</div>
