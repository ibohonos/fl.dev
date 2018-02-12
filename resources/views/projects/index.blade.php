@extends('layouts.app')

@section('title') Проекти @endsection

@section('content')

	<div class="container">
		<div class="row">
			<div class="col s12">
				<h1 class="center">Проекти</h1>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m4">
				<h4>Категорії</h4>
			</div>
			<div class="col s12 m8">
				<h4>Список</h4>
				@auth
					@if(Auth::user()->hasAnyRole(['admin', 'employer']))
						<a href="{{ route('project.add') }}" class="btn_add_project btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">add</i></a>
					@endif
				@endauth
				<projects></projects>
			</div>
		</div>
	</div>
@endsection