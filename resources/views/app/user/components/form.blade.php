<form method="POST" action="{{ isset($user) ? route('user.update', $user) : route('user.store') }}" class="needs-validation" novalidate="">
  @csrf
  @isset($user)
    @method('PUT')
  @endisset
  <div class="form-group row">
    <label for="username" class="col-sm-2 col-form-label">{{ trans('app.user.column.username') }}</label>
    <div class="col-sm-10">
      <input type="text"
             placeholder="{{ trans('app.user.placeholder.username') }}"
             class="form-control {{ $errors->first('username') ? 'is-invalid' : '' }}"
             id="username"
             name="username"
             value="{{ old('username', optional($user ?? '')->username ) }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label">{{ trans('app.user.column.phone') }}</label>
    <div class="col-sm-10">
      <input type="text"
             placeholder="{{ trans('app.user.placeholder.phone') }}"
             class="form-control {{ $errors->first('phone') ? 'is-invalid' : '' }}"
             id="phone"
             name="phone"
             value="{{ old('phone', optional($user ?? '')->phone ) }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="telegram_account" class="col-sm-2 col-form-label">{{ trans('app.user.column.telegram_account') }}</label>
    <div class="col-sm-10">
      <input type="text"
             placeholder="{{ trans('app.user.placeholder.telegram_account') }}"
             class="form-control {{ $errors->first('telegram_account') ? 'is-invalid' : '' }}"
             id="telegram_account"
             name="telegram_account"
             value="{{ old('telegram_account', optional($user ?? '')->telegram_account ) }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">{{ trans('app.user.column.password') }}</label>
    <div class="col-sm-10">
      <input type="password"
             placeholder="{{ trans('app.user.placeholder.password') }}"
             class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }}"
             id="password"
             name="password"
             value="">
    </div>
  </div>
  <div class="form-group">
    <button class="btn btn-primary">{{ trans('app.global.save') }}</button>
  </div>
</form>
