@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s8 offset-m2">
            <h4 class="center">Вхід</h4>
            <div class="clearfix"><br></div>

            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="input-field col s12{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">E-Mail</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field col s12{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">Пароль</label>
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col s12">
                    <div class="checkbox">
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                            Запам'ятати мене?
                        </label>
                    </div>
                </div>
                <div class="clearfix"><br></div>
                <div class="col s8 offset-m2">
                    <button type="submit" class="btn green waves-effect waves-light">
                        Вхід
                    </button>

                    <a class="btn waves-effect waves-light" href="{{ route('password.request') }}">
                        Забули пароль?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
