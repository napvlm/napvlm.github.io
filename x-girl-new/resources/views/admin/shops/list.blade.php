@extends('layouts.admin')

@section('content')

<div class="row">

	<div class="col-md-6">
		<h2>Магазины</h2>
	</div>

	<div class="col-md-6">
		<a href="{{ route('admin.shops.create') }}" class="btn btn-success float-md-right">
			<i class="fa fa-plus"></i>
			<span>Добавить магазин</span>
		</a>
	</div>

</div>

<br>


<table class="table table-bordered">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Город</th>
			<th scope="col">Улица</th>
			<th scope="col">Телефон</th>
			<th scope="col">Действия</th>
		</tr>
	</thead>
	<tbody>
		@foreach($items as $shop)
		<tr>
			<th scope="row">{{ $shop->id }}</th>
			<td>{{ $shop->city }}</td>
			<td>{{ $shop->street }}</td>
			<td>{{ $shop->phone }}</td>
			<td>
				<a href="{{ url(request()->path() . '/' . $shop->id . '/edit') }}">
					Изменить
					<i class="fa fa-pencil edit-icon text-inverse m-r-10"></i>
				</a>
				<a data-href="{{ url(request()->path() . '/' . $shop->id) }}" class="remove-item" data-item-id="{{ $shop->id }}">
					Удалить
					<i class="fa fa-close icon-close text-danger"></i>
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
