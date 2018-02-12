@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12">
            <h4 class="center">Dashboard</h4>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <example api_token={{ Auth::user()->api_token }}></example>
        </div>
    </div>
</div>
@endsection
