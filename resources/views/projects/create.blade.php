@extends('layouts.app')

@section('title') Створити проект @endsection

@section('content')

	<div class="container">
		<div class="row">
			<div class="col s12">
				<h1 class="center">Створити проект</h1>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				@include('partials.errors')
				<form action="{{ route('project.submit') }}" method="post">
					<div class="row">
						<div class="input-field col s12">
							<input id="title" type="text" name="title" class="validate" required data-length="255">
							<label for="title">Заголовок *</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<textarea id="description" name="description" class="materialize-textarea validate" required></textarea>
							<label for="description">Опис *</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12 m6">
							<input type="text" class="datepicker" name="end_date" id="end_date">
							<label for="end_date">Дата закінчення</label>
						</div>
						<div class="input-field col s12 m6">
							<input type="text" class="price" id="price" name="price">
							<label for="price">Ціна</label>
						</div>
					</div>
					<div class="row">
						<div class="col s12">
							<input type="checkbox" name="remote" id="remote" />
							<label for="remote">Віддалено?</label>
						</div>
					</div>
                	{{ csrf_field() }}
                	<button type="submit" class="col s6 offset-m3 btn green waves-effect waves-light">
	                    Оприлюднити
	                </button>
				</form>
			</div>
		</div>
	</div>

@endsection
