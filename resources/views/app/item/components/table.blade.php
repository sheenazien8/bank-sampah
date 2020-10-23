@if ($items->isNotEmpty())
<div class="table-responsive-xl">
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>{{ trans('app.item.column.name') }}</th>
        <th>{{ trans('app.item.column.unit') }}</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($items as $key => $item)
        <tr>
          <td>{{ ++$key }}</td>
          <td>{{ $item->nama }}</td>
          <td>{{ $item->unit->nama }}</td>
          <td>
            <a href="{{route('item.edit', $item->id)}}">
              <span><i class="fas fa-pen"></i></span>
            </a>
            <a href="{{route('item.show', $item->id)}}">
              <span><i class="fas fa-eye"></i></span>
            </a>
            <form method="POST" class="d-inline" action="{{ route('item.destroy', $item->id) }}">
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

