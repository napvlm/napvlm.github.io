@extends('layouts.site')
<script src="{{ asset('js/main.js') }}" defer></script>
@section('content')

<div id="overlay"></div><!-- Пoдлoжкa -->
    <div class="product_wrapper">
        <div class="product_block odd-product">
            <img src="{{ $products_2[0]->getPictureUrl() }}" alt="" class="myBtn">
            <div id="modal_form"><!-- Сaмo oкнo --> 

            </div>
            <div class="description">
                <p class="name">
                    {{ $products_2[0]->name }}
                </p>
                <p class="text">
                    {{ $products_2[0]->description }}
                </p>

                <button class="buy_one_click" data-id="{{ $products_2[0]->id }}">
                    КУПИТЬ В ОДИН КЛИК
                </button>
            </div>
        </div>

        <div class="product_block even-product">
            <img src="{{ $products_2[1]->getPictureUrl() }}" alt="" class="myBtn">
            <div class="description">
                <div id="modal_form"><!-- Сaмo oкнo --> 

                </div>
                <p class="name">
                    {{ $products_2[1]->name }}
                </p>
                <p class="text">
                    {{ $products_2[1]->description }}
                </p>

                <button class="buy_one_click" data-id="{{ $products_2[1]->id }}">
                    КУПИТЬ В ОДИН КЛИК
                </button>
            </div>

            <!-- popup -->
            <div id="mypopup" class="popup">
                <div class="popup-content">
                    <div class="popup-header">
                    <h2>header</h2>
                    <span class="close">&times;</span>
                    </div>
                    <div class="popup-body">
                    <p>Some text</p>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Consequuntur assumenda ad modi itaque eveniet, voluptatem ipsum,
                        impedit consequatur libero quidem sunt voluptatum minus quia saepe
                        ab illum? Itaque, quidem nesciunt.
                    </p>
                    </div>
                    <div class="popup-footer"><h3>popup Footer</h3></div>
                </div>
            </div>
        </div>

        <!-- <img class="small_page_images product_small_1" src="./img/product_small_1.png" alt=""> -->
        <!-- <img class="small_page_images product_small_2" src="./img/product_small_2.png" alt=""> -->
    </div>

    <div class="product_wrapper products_other" style="display:none">

        @foreach($products_other as $key => $product)

        @php
            $oddOrEven = (($key % 2 == 0) ? 'odd' : 'even') . '-product';
        @endphp

        <div class="product_block {{ $oddOrEven }}">
            <div id="overlay"></div><!-- Пoдлoжкa -->
            <img src="{{ $product->getPictureUrl() }}" alt="" class="myBtn" data-id="{{ $product->id }}">
            <div class="description">
                <div id="modal_form"><!-- Сaмo oкнo --> 

                </div>
                <p class="name">
                    {{ $product->name }}
                </p>
                <p class="text" style="font-weight: bold;">
                    {{ $product->description2 }}
                </p>
                <p class="text">
                    {{ $product->description }}
                </p>

                <button class="buy_one_click" data-id="{{ $product->id }}">
                    КУПИТЬ В ОДИН КЛИК
                </button>
            </div>
        </div>
        @endforeach


    </div>

@endsection

@push('script')
<script>

    $(function(){

        $('.find_more').on('click', function (e) {

            e.preventDefault();

            $(this).hide();

            $('.products_other').show();            
        });
    });

</script>
@endpush
