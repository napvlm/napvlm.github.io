@extends('layouts.site')
<script src="{{ asset('js/main.js') }}" defer></script>
@section('content')

    <div class="container-fluid">
        <!-- BANNER -->
        <div class="row">
        <div class="mainBanner">
                            <div class="iframe-container hide">
                                <iframe width="560" height="315" class="yt_vid" id="gbar-video" type="text/html" src="https://www.youtube.com/embed/ZHtgp0b_IiM" frameborder="0" allowfullscreen=""></iframe>
                            </div>
                            
                            <div class="video_wrap">
                                <video autoplay loop muted class="banner__video" poster="img/fallbackimg.png">
                                    <source src="img/videobgfull.mp4" type="video/mp4">
                                    <img src="img/fallbackimg.png">
                                </video>

                                <div class="text_on_video_wrap">
                                    <div class="text_on_video">
                                        <h1>
                                            <span class="primary">X Girl</span>
                                            <span class="sub">Explore yourself</span>
                                        </h1>
                                    </div>
                                    <div class="play_button">
                                        <span class="playVideoButton">
                                            <div class="icon-wrap">
                                                <i class="fa fa-play-circle play-icon"></i>
                                                <br>
                                                <span class="play-text">
                                                    СМОТРЕТЬ ВИДЕО
                                                </span>
                                            </div>
                                        </span>
                                     </div>
                                </div>
                            </div> <!-- end .video_wrap -->
                        </div> <!-- end .mainBanner -->
        </div>
        <!-- END BANNER -->
        
        <!-- HOME SLIDER -->
        <div class="row">
        <div id="overlay"></div><!-- Пoдлoжкa -->
        <div id="modal_form"><!-- Сaмo oкнo --> 

</div>  
            <div class="col-xs-12">
            <div class="home_slider" id="home_slider">

            <div class="owl-carousel owl-theme">
                @foreach($products as $product)
                <div class="item">
                    
                    <img src="{{ $product->getPictureUrl() }}" alt="" class="myBtn" data-id="{{ $product->id }}">                  
                    <div class="short_descr">
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

            <!-- <img class="small_page_images main_small_image_1" src="./img/main_small_1.png" alt=""> -->
            <img class="small_page_images main_small_image_2" src="./img/main_small_2.png" alt="">
            <!-- <img class="small_page_images main_small_image_3" src="./img/main_small_3.png" alt=""> -->
            </div>
            </div>
        </div>
        <!-- END HOME SLIDER -->
        
        <!-- GIRL_QUOTE -->
        <div class="row">
            <div class="col-xs-12">
                <div class="girl_quote">
                    <div class="image">
                            <img class="girl_qoute_img" src="./img/girl_qoute.png" alt="">
                            <a href="https://www.instagram.com/di_rozhkova/" target="_blank">
                                <p>@di_rozhkova</p>
                                <img src="./img/pink_instagram.png" alt="">
                            </a>
                    </div>


                    <div class="quote">
                        <div class="first_paragraph">
                            <span>
                                {{ $page_home_texts['hello_title'] }}
                            </span> <br>

                            {{ $page_home_texts['hello_text'] }}
                        </div>

                        <p class="second_paragraph" >
                            {!! $page_home_texts['main_text_p1'] !!}
                        </p>

                        <div class="line"></div>

                        <div class="third_paragraph">

                            {!! $page_home_texts['main_text_p2'] !!}

                            <p>
                                {!! $page_home_texts['main_text_end'] !!}
                            </p> 
                        </div>
                    </div>

                    <img class="small_page_images main_small_image_4" src="./img/main_small_4.png" alt="">
                    <img class="small_page_images main_small_image_5" src="./img/main_small_5.png" alt="">
                    <img class="small_page_images main_small_image_6" src="./img/main_small_6.png" alt="">
                </div>
            </div>
        </div>
        <!-- END GIRL_GUOTE -->
    </div>
@endsection
