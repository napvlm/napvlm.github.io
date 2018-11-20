@extends('layouts.admin')

@section('content')

<div class="container">

	<div class="row">
		<div class="col-md-6">
			<a href="{{ route('admin.products.index') }}" class="btn btn-lg btn-block btn-primary btn-outline-primary">Товары</a>
		</div>

		<div class="col-md-6">
			<a href="{{ route('admin.orders.index') }}" class="btn btn-lg btn-block btn-primary btn-outline-primary">Заказы</a>
		</div>
	</div>

	<br>

	<div class="row">
		<div class="col-md-6">
			<a href="{{ route('admin.shops.index') }}" class="btn btn-lg btn-block btn-primary btn-outline-primary">Магазины</a>
		</div>

		<div class="col-md-6">
			<a href="{{ route('admin.callbacks.index') }}" class="btn btn-lg btn-block btn-primary btn-outline-primary">Обратная связь</a>
		</div>
	</div>

	<br>



</div>

@endsection
