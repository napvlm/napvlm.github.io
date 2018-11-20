@extends('layouts.site')

@section('content')

	<div class="contacts_slider">
		<div class="owl-carousel owl-theme">

			@foreach($products as $product)

            <div class="item">
                <div class="description">
                    <p class="name">
                        {{ $product->name }}
                    </p>
                    <p class="text">
                        {{ $product->description }}
                    </p>

                    <button class="buy_one_click" data-id="{{ $product->id }}">КУПИТЬ В ОДИН КЛИК</button>
                </div>

                <img src="{{ $product->getPictureUrl() }}" alt="">
            </div>

            @endforeach

		</div>

		<img class="small_page_images contacts_small_1" src="./img/product_small_1.png" alt="">
		<img class="small_page_images contacts_small_2" src="./img/product_small_2.png" alt="">
	</div>

	<div class="contacts">

		@foreach($shops as $key => $shop)
		@if ($key == 0)
		<div class="maps">
		@else
		<div class="maps notactive">
		@endif
			{!! $shop->map_iframe !!}
		</div>
		@endforeach


		<div class="contacts_block">
			<p class="name">Наши amazing shops: </p>

			<ul class="market_adresses">

				@foreach($shops as $key => $shop)
				<li>
					<p>
						<span class="city">{{ $shop->city }}</span>
						{{ $shop->street }}
					</p>
					<p><span class="tel">тел.</span> <a href="tel:{{ $shop->phone }}">{{ $shop->phone }}</a></p>

					@php
						$index = $key + 1;
					@endphp

					@if ($key == 0)
						<div data-index="{{ $index }}" class="point active">{{ $index }}</div>
					@else
						<div data-index="{{ $index }}" class="point">{{ $index }}</div>
					@endif

				</li>
				@endforeach

			</ul>

			<button class="callback_btn">обратная связь</button>
		</div>
	</div>


@endsection
