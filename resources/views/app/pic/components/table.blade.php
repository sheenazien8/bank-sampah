@if ($pics->isNotEmpty())
<div class="table-responsive-xl">
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>{{ trans('app.pic.column.name') }}</th>
        <th>{{ trans('app.pic.column.description') }}</th>
        <th>{{ trans('app.pic.column.value') }}</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($pics as $key => $pic)
        <tr>
          <td>{{ ++$key }}</td>
          <td>{{ $pic->nama_jabatan }}</td>
          <td>{{ $pic->keterangan }}</td>
          <td>{{ $pic->nilai_setiap_tugas }}</td>
          <td>
            <a href="{{route('pic.edit', $pic->id)}}">
              <span><i class="fas fa-pen"></i></span>
            </a>
            <a href="{{route('pic.show', $pic->id)}}">
              <span><i class="fas fa-eye"></i></span>
            </a>
            <form method="POST" class="d-inline" action="{{ route('pic.destroy', $pic->id) }}">
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

