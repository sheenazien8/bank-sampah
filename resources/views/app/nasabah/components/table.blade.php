@if ($nasabahs->isNotEmpty())
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>{{ trans('app.nasabah.column.name') }}</th>
        <th>{{ trans('app.nasabah.column.id_number') }}</th>
        <th>{{ trans('app.nasabah.column.address') }}</th>
        <th>{{ trans('app.nasabah.column.curent_saldo') }}</th>
        <th>{{ trans('app.nasabah.column.username') }}</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($nasabahs as $key => $nasabah)
        <tr>
          <td>{{ ++$key }}</td>
          <td>{{ $nasabah->nama_lengkap }}</td>
          <td>{{ $nasabah->nomor_ktp }}</td>
          <td>{{ $nasabah->alamat }}</td>
          <td>{{ number_format($nasabah->saldo_akhir) }}</td>
          <td>{{ optional($nasabah->user)->username }}</td>
          <td>
            <a href="{{route('nasabah.edit', $nasabah->id)}}">
              <span><i class="fas fa-pen"></i></span>
            </a>
            <a href="{{route('nasabah.show', $nasabah->id)}}">
              <span><i class="fas fa-eye"></i></span>
            </a>
            <form method="POST" class="d-inline" action="{{ route('nasabah.destroy', $nasabah->id) }}">
              @csrf
              {{ method_field('DELETE') }}
              <button class="btn-link btn mr-0"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@else
  <h4 class="text-center">{{ trans('app.global.empty') }}</h4>
@endif

