@extends('layouts.admin')

@section('content')

<div class="row">

	<div class="col-md-6">
		<h2>Заказы</h2>
	</div>

	<div class="col-md-6" style="display:none">
		<a href="{{ route('admin.orders.create') }}" class="btn btn-success float-md-right">
			<i class="fa fa-plus"></i>
			<span>Добавить заказ</span>
		</a>
	</div>

</div>

<br>

@if($items->count())
<table class="table table-bordered">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Время</th>
			<th scope="col">Товар</th>
			<th scope="col">Имя</th>
			<th scope="col">Телефон</th>
			<th scope="col">Email</th>
			<th scope="col">Действия</th>
		</tr>
	</thead>
	<tbody>
		@foreach($items as $order)
		<tr>
			<th scope="row">{{ $order->id }}</th>
			<td>{{ $order->created_at }}</td>
			<td>{{ $order->product->name }}</td>
			<td>{{ $order->name }}</td>
			<td>{{ $order->phone }}</td>
			<td>{{ $order->email }}</td>

			<td>
				<a href="{{ url(request()->path() . '/' . $order->id ) }}" class="btn btn-primary">
					Просмотреть
					<!-- <i class="fa fa-pencil edit-icon text-inverse m-r-10"></i> -->
				</a>
				<a data-href="{{ url(request()->path() . '/' . $order->id) }}" class="remove-item btn btn-danger text-white" data-item-id="{{ $order->id }}">
					Удалить
					<!-- <i class="fa fa-close icon-close text-danger"></i> -->
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>

	<tfoot>
    <tr>
        <td colspan="7">
            <div class="table-paginator">
                {!! $items->appends(\Request::except('page'))->render() !!}
            </div>
        </td>
    </tr>
    </tfoot>
</table>


@else

 <h3>Нет заказов</h3>

@endif

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

			var isConfirmed = confirm('Вы уверены что хотите удалить заказ?');

			if (!isConfirmed) {
				return false;
			}

			// alert(isConfirmed);
			removeItem($(self).data('href'));

		});

	});

</script>
@endpush
