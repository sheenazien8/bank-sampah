<a href="{{route($resources.'.edit', $model->id)}}">
  <span><i class="fas fa-pen"></i></span>
</a>
<a href="{{route($resources.'.show', $model->id)}}">
  <span><i class="fas fa-eye"></i></span>
</a>
<form method="POST" class="d-inline" action="{{ route($resources.'.destroy', $model->id) }}">
  @csrf
  {{ method_field('DELETE') }}
  <button class="btn-link btn mr-0"><i class="fas fa-trash"></i></button>
</form>

