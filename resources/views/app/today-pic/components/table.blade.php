@if ($today_pics->isNotEmpty())
<div class="table-responsive-xl">
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>{{ trans('app.today_pic.column.user') }}</th>
        <th>{{ trans('app.today_pic.column.date') }}</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($today_pics as $key => $today_pic)
        <tr>
          <td>{{ ++$key }}</td>
          <td>{{ $today_pic->user->nasabahProfile->nama_lengkap }}</td>
          <td>{{ $today_pic->tanggal_tugas }}</td>
          <td>
            <a href="{{route('today-pic.edit', $today_pic->id)}}">
              <span><i class="fas fa-pen"></i></span>
            </a>
            <a href="{{route('today-pic.show', $today_pic->id)}}">
              <span><i class="fas fa-eye"></i></span>
            </a>
            <form method="POST" class="d-inline" action="{{ route('today-pic.destroy', $today_pic->id) }}">
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

