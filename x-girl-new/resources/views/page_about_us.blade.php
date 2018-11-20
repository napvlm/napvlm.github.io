@extends('layouts.site')

@section('content')

	<div class="about_us_slider">
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
    </div>

	<div class="about_us">
		<div class="xgirl_is">
			{!! $page_about_us_texts['main_title'] !!}
			<img src="./img/x_girl_arrow.png" alt="">
		</div>
		<div class="description">
			<p class="heading">
				{!! $page_about_us_texts['secondary_title'] !!}
			</p>

			{!! $page_about_us_texts['main_text'] !!}

		</div>
	</div>

	<div class="advantages">
		<p class="block_name">Преимущества</p>

		<div class="advantage">
			<img src="./img/adv_1.png" alt="">
			<p>Доступный</p>
		</div>
		<div class="advantage">
			<img src="./img/adv_2.png" alt="">
			<p>модный</p>
		</div>
		<div class="advantage">
			<img src="./img/adv_3.png" alt="">
			<p>must have</p>
		</div>
	</div>


@endsection
