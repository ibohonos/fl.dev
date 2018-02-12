@extends('layouts.app')

@section('title') Особистий кабінет @endsection

@section('content')

	<div class="container">
		<div class="row">
			<div class="col s12">
				<h1 class="center">Особистий кабінет</h1>
			</div>
		</div>

		<div class="row">
			<div class="col s3 m3 l3">
				<img src="{{ $user->avatar }}" style="width: 150px; height: 150px; border-radius: 50%; margin: 0 auto; display: block; ">
				<h2 style="clear: both; text-align: center; font-style: 35px; ">{{ $user->first_name }} {{ $user->last_name }}</h2>
			</div>
			<div class="col s9 m9 l9">
				<div role="tabpanel">
					<!-- Nav tabs -->
					<ul class="tabs">
						<li class="tab col s3">
							<a href="#home" class="active">Основна інформація</a>
						</li>
						<li class="tab col s3">
							<a href="#image">Аватар</a>
						</li>
						<li class="tab col s3">
							<a href="#contacts">Контактні дані</a>
						</li>
						<li class="tab col s3">
							<a href="#paymentdetails">Платіжні дані</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="col s12" id="home">
						<h2>Основна інформація</h2>
						@include('partials.errors')
						<form action="{{ route('account.save.basic') }}" method="POST" role="form">
							<div class="form-group">
								<label for="first_name">Ім'я</label>
								<input type="text" class="form-control" id="first_name" placeholder="Ім'я" name="first_name" value="{{ $user->first_name }}">
							</div>

							<div class="form-group">
								<label for="last_name">Прізвище</label>
								<input type="text" class="form-control" id="last_name" placeholder="Прізвище" name="last_name" value="{{ $user->last_name }}">
							</div>

							<div class="form-group">
								<label for="birthday">Дата народження</label>
								<input type="text" name="birthday" id="birthday" class="form-control datepicker_birthday" value="{{ $user->birthday }}">
							</div>

							<div class="form-group">
								<label for="resume">Резюме</label>
								<textarea name="resume" id="resume" class="editor" rows="5">{!! $user->resume !!}</textarea>
							</div>

							<input type="hidden" name="_token" class="form-control" value="{{ Session::token() }}">

							<button type="submit" class="btn waves-effect green">Зберегти</button>
						</form>
					</div>
					<div class="col s12" id="image">
						<h2>Аватар</h2>
						@include('partials.errors')
						<form action="{{ route('account.save.image') }}" method="POST" role="form" enctype="multipart/form-data">

							<div class="file-field input-field">
								<div class="btn">
									<span>Аватар</span>
									<input type="file" id="image" name="image">
								</div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text">
								</div>
							</div>

							<input type="hidden" name="_token" value="{{ Session::token() }}">

							<button type="submit" class="btn waves-effect green">Зберегти</button>
						</form>
					</div>
					<div class="col s12" id="contacts">
						<h2>Контактні дані</h2>
						<form action="{{ route('account.save.contacts') }}" method="POST" role="form">

							<div class="form-group">
								<label for="phone">Телефон</label>
								<input type="tel" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
							</div>

							<div class="form-group">
								<label for="email">E-mail</label>
								<input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
							</div>

							<input type="hidden" name="_token" class="form-control" value="{{ Session::token() }}">

							<button type="submit" class="btn waves-effect green">Зберегти</button>
						</form>
					</div>
					<div class="col s12" id="paymentdetails">
						<h2>Платіжні дані</h2>
						<form action="{{ route('account.save.pay') }}" method="POST" role="form">

							<div class="form-group">
								<label for="pay_card_pb">Карта ПриватБанка</label>
								<input type="text" name="pay_card_pb" id="pay_card_pb" class="form-control" value="{{ $user->pay_card_pb }}">
							</div>

							<div class="form-group">
								<label for="pay_card_2">Платіжна карта #2</label>
								<input type="text" name="pay_card_2" id="pay_card_2" class="form-control" value="{{ $user->pay_card_2 }}">
							</div>

							<input type="hidden" name="_token" class="form-control" value="{{ Session::token() }}">

							<button type="submit" class="btn waves-effect green">Зберегти</button>
						</form>
					</div>
				</div>

			</div>
		</div>
		
	</div>
@endsection