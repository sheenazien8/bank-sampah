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
             class="form-control {{ $errors->first('tanggal_tugas') ? 'is-invalid' : '' }}"
             id="tanggal_tugas"
             name="tanggal_tugas"
             value="{{ old('tanggal_tugas', optional($today_pic ?? '')->tanggal_tugas ) }}"
             >
    </div>
  </div>
  <div class="form-group row">
    <label for="user" class="col-sm-2 col-form-label">{{ trans('app.today_pic.column.user') }}</label>
    <div class="col-sm-10">
      <select id="user" name="user_id" class="form-control {{ $errors->first('user_id') ? 'is-invalid' : '' }}">
        <option value="" disabled selected>@lang('app.today_pic.placeholder.user')</option>
        @foreach (App\Models\User::select('username', 'id')->where('is_nasabah', true)->get() as $user)
          <option {{ old('user_id', optional($today_pic ?? '')->user_id )== $user->id ? 'selected' : ''}} value="{{ $user->id }}"> {{ $user->username }} </option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="pic_id" class="col-sm-2 col-form-label">{{ trans('app.today_pic.column.pics') }}</label>
    <div class="col-sm-10">
      <select id="pic_id" name="pic_id" class="form-control {{ $errors->first('pic_id') ? 'is-invalid' : '' }}">
        <option value="" disabled selected>@lang('app.today_pic.placeholder.pics')</option>
        @foreach (App\Models\Pic::select('nama_jabatan', 'id')->get() as $pic)
          <option {{ old('pic_id', optional($today_pic ?? '')->pic_id) == $pic->id ? 'selected' : ''}} value="{{ $pic->id }}"> {{ $pic->nama_jabatan }} </option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <button class="btn btn-primary">{{ trans('app.global.save') }}</button>
  </div>
</form>
