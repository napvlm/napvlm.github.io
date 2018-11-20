@extends('layouts.admin')

@section('content')

<div class="row">

	<div class="col-md-6">
		<h2>Товары</h2>
	</div>

	<div class="col-md-6">
		<a href="{{ route('admin.products.create') }}" class="btn btn-success float-md-right">
			<i class="fa fa-plus"></i>
			<span>Добавить товар</span>
		</a>
	</div>

</div>

<br>


<table class="table table-bordered">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Название</th>
			<th scope="col">Описание</th>
			<th scope="col">Описание 2</th>
			<th scope="col">Заказов</th>
			<th scope="col">Действия</th>
		</tr>
	</thead>
	<tbody>
		@foreach($items as $product)
		<tr>
			<th scope="row">{{ $product->id }}</th>
			<td>{{ $product->name }}</td>
			<td>{{ substr($product->description, 0, 50) }}</td>
			<td>{{ substr($product->description2, 0, 50) }}</td>
			<td>{{ $product->orders->count() }}</td>
			<td>
				<a href="{{ url(request()->path() . '/' . $product->id . '/edit') }}" class="btn btn-primary">
					Изменить
					<!-- <i class="fa fa-pencil edit-icon text-inverse m-r-10"></i> -->
				</a>
				<a data-href="{{ url(request()->path() . '/' . $product->id) }}" class="remove-item btn btn-danger text-white" data-item-id="{{ $product->id }}">
					Удалить
					<!-- <i class="fa fa-close icon-close text-danger"></i> -->
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection


@push('script')
<script>

	$(function(){

		function removeItem(url) {

			$.ajax({
				url: url,
				method: 'POST',
				data: {
					"_token": '{{ csrf_token() }}',
					"_method": 'DELETE'
				},
				success: function (response) {
					location.reload();
				},
				error: function (response) {
					alert('Ошибка!')
				}
			});

		}

		$('.remove-item').on('click', function (e) {

			e.preventDefault();

			var self = this;

			var isConfirmed = confirm('Вы уверены что хотите удалить товар?');

			if (!isConfirmed) {
				return false;
			}

			// alert(isConfirmed);
			removeItem($(self).data('href'));

		});

	});

</script>
@endpush
