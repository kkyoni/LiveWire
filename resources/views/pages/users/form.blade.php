<div class="form-group row {{ $errors->has('first_name') ? 'has-error' : '' }}">
    <div class="mb-4">
        <label class="form-label" for="example-text-input-alt">{{ __('messages.First Name') }}</label>
        {!! Form::text('first_name', null, [
            'class' => 'form-control',
            'id' => 'example-text-input-alt',
            'placeholder' => 'Vorname',
        ]) !!}
        <span class="help-block">
            <font color="red"> {{ $errors->has('first_name') ? '' . $errors->first('first_name') . '' : '' }} </font>
        </span>
    </div>
</div>

<div class="form-group row {{ $errors->has('last_name') ? 'has-error' : '' }}">
    <div class="mb-4">
        <label class="form-label" for="example-text-input-alt">{{ __('messages.Last Name') }}</label>
        {!! Form::text('last_name', null, [
            'class' => 'form-control',
            'id' => 'example-text-input-alt',
            'placeholder' => 'Nachname',
        ]) !!}
        <span class="help-block">
            <font color="red"> {{ $errors->has('last_name') ? '' . $errors->first('last_name') . '' : '' }} </font>
        </span>
    </div>
</div>

<div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
    <div class="mb-4">
        <label class="form-label" for="example-text-input-alt">{{ __('messages.Email') }}</label>
        {!! Form::text('email', null, [
            'class' => 'form-control',
            'id' => 'example-text-input-alt',
            'placeholder' => 'Email',
        ]) !!}
        <span class="help-block">
            <font color="red"> {{ $errors->has('email') ? '' . $errors->first('email') . '' : '' }} </font>
        </span>
    </div>
</div>

<div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
    <div class="mb-4">
        <label class="form-label" for="example-text-input-alt">{{ __('messages.Password') }}</label>
        {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
        <span class="help-block">
            <font color="red"> {{ $errors->has('password') ? '' . $errors->first('password') . '' : '' }} </font>
        </span>
    </div>
</div>
@if (!empty($users))
    <div class="form-group row {{ $errors->has('roles_permissions') ? 'has-error' : '' }}">
        <div class="mb-4">
            <label class="form-label" for="example-text-input-alt">Roles Permissions</label>
            <select class="js-select2 form-select form-control" name="roles_permissions">
                <option>Choose one..</option>
                @foreach ($role_list as $list)
                    <option value="{{ $list->id }}" @if ($list->name == $users->role_list->permission_list->name) selected @else @endif>
                        {{ $list->name }}</option>
                @endforeach
            </select>
            <span class="help-block">
                <font color="red">
                    {{ $errors->has('roles_permissions') ? '' . $errors->first('roles_permissions') . '' : '' }}
                </font>
            </span>
        </div>
    </div>
@else
    <div class="form-group row {{ $errors->has('roles_permissions') ? 'has-error' : '' }}">
        <div class="mb-4">
            <label class="form-label" for="example-text-input-alt">Roles Permissions</label>
            {!! Form::select('roles_permissions', $role_list, null, [
                'class' => 'js-select2 form-select form-control',
                'placeholder' => 'Choose Roles..',
            ]) !!}
            <span class="help-block">
                <font color="red">
                    {{ $errors->has('roles_permissions') ? '' . $errors->first('roles_permissions') . '' : '' }}
                </font>
            </span>
        </div>
    </div>
@endif

<div class="form-group row {{ $errors->has('ist_aktivi') ? 'has-error' : '' }}">
    <div class="mb-4">
        <label class="form-label" for="example-text-input-alt">{{ __('messages.is_activi') }}</label>
        <div class="i-checks">
            <label>
                {{ Form::radio('ist_aktivi', 'true', true, ['id' => 'Active', 'class' => 'form-check-input']) }}
                <i></i>
                {{ __('messages.Active') }}
            </label>
            <label>
                {{ Form::radio('ist_aktivi', 'false', false, ['id' => 'In-Active', 'class' => 'form-check-input']) }}
                <i></i> {{ __('messages.In-Active') }}
            </label>
            <span class="help-block">
                <font color="red"> {{ $errors->has('ist_aktivi') ? '' . $errors->first('ist_aktivi') . '' : '' }}
                </font>
            </span>
        </div>
    </div>
</div>

@section('styles')
@endsection
@section('scripts')
@endsection
