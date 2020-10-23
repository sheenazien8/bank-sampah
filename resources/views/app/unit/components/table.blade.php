@if ($units->isNotEmpty())
<div class="table-responsive-xl">
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>{{ trans('app.unit.column.name') }}</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($units as $key => $unit)
        <tr>
          <td>{{ ++$key }}</td>
          <td>{{ $unit->nama }}</td>
          <td>
            <a href="{{route('unit.edit', $unit->id)}}">
              <span><i class="fas fa-pen"></i></span>
            </a>
            <a href="{{route('unit.show', $unit->id)}}">
              <span><i class="fas fa-eye"></i></span>
            </a>
            <form method="POST" class="d-inline" action="{{ route('unit.destroy', $unit->id) }}">
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

