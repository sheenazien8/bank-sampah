<form method="POST" action="{{ isset($today_pic) ? route('today-pic.update', $today_pic) : route('today-pic.store') }}" class="needs-validation" novalidate="">
  @csrf
  @isset($today_pic)
    @method('PUT')
  @endisset
  <div class="form-group row">
    <label for="user->nasabah->nama_lengkap" class="col-sm-2 col-form-label">{{ trans('app.today_pic.column.date') }}</label>
    <div class="col-sm-10">
      <input type="date"
             placeholder="{{ trans('app.today_pic.placeholder.date') }}"
             class="form-control"
             id="tanggal_tugas"
             name="tanggal_tugas"
             value="{{ optional($today_pic ?? '')->tanggal_tugas }}"
             >
    </div>
  </div>
  <div class="form-group row">
    <label for="user" class="col-sm-2 col-form-label">{{ trans('app.item.column.user') }}</label>
    <div class="col-sm-10">
      <select id="user" name="user_id" class="form-control">
        @foreach (App\Models\User::select('username', 'id')->where('is_nasabah', true)->get() as $user)
          <option {{ optional($today_pic ?? '')->user_id == $user->id ? 'selected' : ''}} value="{{ $user->id }}"> {{ $user->username }} </option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <button class="btn btn-primary">{{ trans('app.global.save') }}</button>
  </div>
</form>
