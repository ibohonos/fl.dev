@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col s8 offset-m2">
			<h4 class="center">Реєстрація</h4>
			<div class="clearfix"><br></div>

			<form class="form-horizontal" method="POST" action="{{ route('register') }}">
				{{ csrf_field() }}

				<div class="input-field col s12 m6{{ $errors->has('first_name') ? ' has-error' : '' }}">
					<label for="first_name">Ім'я</label>
					<input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

					@if ($errors->has('first_name'))
						<span class="help-block">
							<strong>{{ $errors->first('first_name') }}</strong>
						</span>
					@endif
				</div>

				<div class="input-field col s12 m6{{ $errors->has('last_name') ? ' has-error' : '' }}">
					<label for="last_name">Прізвище</label>
					<input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>

					@if ($errors->has('last_name'))
						<span class="help-block">
							<strong>{{ $errors->first('last_name') }}</strong>
						</span>
					@endif
				</div>

				<div class="input-field col s12{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email">E-Mail</label>
					<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>

				<div class="input-field col s12 m6{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password">Пароль</label>
					<input id="password" type="password" class="form-control" name="password" required>

					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
				</div>

				<div class="input-field col s12 m6">
					<label for="password-confirm">Підтвердити пароль</label>
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
				</div>

				<p>
					<input name="role" type="radio" id="test1" value="Freelancer" checked />
					<label for="test1">Фрілансер</label>
				</p>
				<p>
					<input name="role" type="radio" id="test2" value="Employer" />
					<label for="test2">Замовник</label>
				</p>
							
				<div class="clearfix"><br></div>
				<button type="submit" class="col s6 offset-m3 btn green waves-effect waves-light">
					Реєстрація
				</button>
			</form>
		</div>
	</div>
</div>
@endsection
