@extends('layouts.app')

@section('title', trans('app.transaction.title.index'))

@section('content')
  <section class="section">
    @if (app()->environment() == 'production')
    <div class="section-header">
      <h1>{{ trans('app.transaction.title.index') }}</h1>
    </div>
    @endif

    <div class="section-body">
      <div class="card">
        <div class="card-header">
          <h3 class="mr-auto">{{ trans('app.transaction.title.create') }}</h3>
        </div>
        <div class="card-body">
          @include('app.transaction.components.form')
        </div>
      </div>
      <div class="card">
        <div class="card-header d-flex justify-content-end">
          <h3 class="mr-auto">{{ trans('app.transaction.title.index') }}</h3>
        </div>
        <div class="card-body">
          @include('app.transaction.components.table')
        </div>
      </div>
    </div>
  </section>
@endsection

@push('javascript')
  <script>
    $(document).on('keyup', '.row-item', function(e) {
      $('.tbody-transaction .row-table-transaction .row-item').autocomplete({
        source: function(req, res) {
          axios.get(`/item?type=select2&term=${req.term}`)
            .then((data) => {
              res(data.data.payload)
            })
            .catch((err) => {

            })
        },
        select: function (event, ui) {
          // Set selection
          $(event.target.closest('.row-table-transaction').children[3]).find('input.row-satuan')[0].value = ui.item.unit
          return false;
        }
      })
    })
    $(document).ready(() => {
      $('select[name=nasabah]').select2({
        width: 'resolve',
        theme: "bootstrap"
      })
      @if ($errors->first('nasabah'))
       $('select[name=nasabah]').addClass('is-invalid')
      @endif

      $('.add-item').on('click', function($event) {
        let rowTable = $('.row-table-transaction')
        let trow = $('<tr class="row-table-transaction"></tr>')
        $('.tbody-transaction').append(trow.append(rowTable.html()))
      })
    })
    $(document).on('click', '.close-row', (e) => {
      e.preventDefault()
      if($('.row-table-transaction').length > 1) {
        $(e.target).parents()[2].remove()
      }
    });

  </script>
@endpush
