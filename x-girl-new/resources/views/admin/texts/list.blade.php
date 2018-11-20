@extends('layouts.admin')

@section('content')

<div class="row">

	<div class="col-md-6">
		<h2>Тексты</h2>
	</div>

	<div class="col-md-6">
		<a href="{{ route('admin.texts.create') }}" class="btn btn-success float-md-right">
			<i class="fa fa-plus"></i>
			<span>Добавить текст</span>
		</a>
	</div>

</div>

<br>


<table class="table table-bordered">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">page_key</th>
			<th scope="col">block_key</th>
			<th scope="col">Название страницы</th>
			<th scope="col">Название блок</th>
			<th scope="col">Действия</th>
		</tr>
	</thead>
	<tbody>
		@foreach($items as $textBlock)
		<tr>
			<th scope="row">{{ $textBlock->id }}</th>
			<td>{{ $textBlock->page_key }}</td>
			<td>{{ $textBlock->block_key }}</td>
			<td>{{ $textBlock->page_name }}</td>
			<td>{{ $textBlock->block_name }}</td>
			<td>
				<a href="{{ url(request()->path() . '/' . $textBlock->id . '/edit') }}">
					Изменить
					<i class="fa fa-pencil edit-icon text-inverse m-r-10"></i>
				</a>
				<a style="display:none" data-href="{{ url(request()->path() . '/' . $textBlock->id) }}" class="remove-item" data-item-id="{{ $textBlock->id }}">
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
