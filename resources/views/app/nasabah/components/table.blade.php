<div class="table-responsive">
  {{ $dataTable->table() }}
</div>

@push('javascript')
  {{ $dataTable->scripts() }}
@endpush
