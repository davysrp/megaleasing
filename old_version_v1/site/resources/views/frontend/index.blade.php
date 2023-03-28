<?php $locale = App::getLocale();?>
@extends('frontend.layouts.app')

@section('content')

    <?php $sliders = \App\Models\Slide\Slide::all() ?>
    <div id="ad-header-slider" class="ad-header-slider">

        <div class="swiper-container swiper-heading-slider">

            <div class="swiper-wrapper">
                @foreach($sliders as $item)
                    <a href="#" class="swiper-slide">
                        <div class="ad-heading-slider_item"
                             style="background-image: url({!! $item->photo !!})"></div>
                    </a>
                @endforeach

            </div>

            <div class="swiper-pagination"></div>
        </div>

    </div>

    <?php /*senction branch*/

    $branch = \App\Models\PageMenu\PageMenu::find(18);
    $branchs = \App\Models\Branch\Branch::all();
    ?>
    <section class="pt-6 pb-6 ">
        <div class="container">
            <div class="ad-content-item">

                <div class="ad-content-item_title text-center">
                    <h2 class="title">
                        @if($locale =='en')
                            {!! $branch->title_eng !!}
                        @else
                            {!! $branch->title !!}
                        @endif</h2>

                    <div class="ad-title-divider_center">
                        <div class="line-1"></div>
                        <div class="line-2"></div>
                        <div class="line-3"></div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="ad-content-item_thumb">
                            <img src="{!! $branch->feature_photo !!}" class="img-fill" alt="{!! $branch->title_eng !!}" title="{!! $branch->title_eng !!}" srcset="" loading="lazy">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="ad-content-item_text">

                            <div class="content">
                                <ul class="branch-list">
                                    @foreach($branchs as $item)
                                        <li>
                                            <a href="{!! route('frontend.pagemenu2',['id'=>$item->id,'parent'=>\Illuminate\Support\Str::slug($branch->title_eng),'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}"><i
                                                        class="fal fa-map-marker-check"></i>
                                                @if($locale =='en')
                                                    {!! $item->title_eng !!}
                                                @else
                                                    {!! $item->title !!}
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <a href="{!! route('frontend.pagemenu1',['id'=>$branch->id,'slug'=>\Illuminate\Support\Str::slug($branch->slug)]) !!}" class="btn-primary">@lang('mega.viewmore')​<i
                                        class="fas fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php /*senction employer*/

    $employ = \App\Models\About\About::find(10);
    ?>
    <section class="pt-6 pb-6 section-bg">
        <div class="container">
            <div class="ad-content-item  ad-content-item-2 ">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="ad-content-item_text">
                            <h2 class="title"> @if($locale =='en')
                                    {!! $employ->title_eng !!}
                                @else
                                    {!! $employ->title !!}
                                @endif</h2>
                            <div class="ad-title-divider">
                                <div class="line-1"></div>
                                <div class="line-2"></div>
                            </div>
                            <div class="content">
                                <div class="content">

                                    @if($locale =='en')
                                        {!! $employ->description_eng !!}
                                    @else
                                        {!! $employ->description !!}
                                    @endif
                                </div>
                            </div>
                            <a href="{!! route('frontend.pagemenu2',['id'=>$employ->id,'parent'=>\Illuminate\Support\Str::slug('about-company'),'slug'=>\Illuminate\Support\Str::slug($employ->title_eng)]) !!}" class="btn-primary">@lang('mega.viewmore') <i class="fas fa-chevron-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="ad-content-item_thumb">
                            <img src="{!! asset($employ->feature_photo) !!}" class="img-fill" alt="" srcset="" loading="lazy">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <?php /*senction product*/

    $categories = \App\Models\Product\Product::where('parent_id', null)->get();
    $products = \App\Models\Product\Product::where('parent_id', '!=', 0)->get();

    ?>
    <section class="pt-6 pb-6 ad-s-category">
        <div class="container">

            <div class="s-heading-title">
                <div class="s-heading-title-btn">
                    <h3 class="title">@lang('mega.products')</h3>
                    <div class="ad-heading-button">
                        <a href="{!! route('frontend.index') !!}/page/1/products-services/motorbike" class="btn-primary">@lang('mega.viewmore') <i class="fas fa-chevron-circle-right"></i></a>
                    </div>
                </div>

            </div>

            <div class="ad-pro-slider-section">
                <div class="row">

                    <div class="col-md-4 col-lg-3">
                        <div class="ad-cate-list">
                            <h4 class="title">CATEGORY</h4>
                            <div class="ad-title-divider ad-title-divider-sm">
                                <div class="line-1"></div>
                                <div class="line-2"></div>
                            </div>
                            <?php

                            $parent = \App\Models\PageMenu\PageMenu::find(19);
                            ?>
                            <ul>
                                @foreach($categories as $item)
                                    <li><a href="{!! route('frontend.pagemenu2',['id'=>$item->id,'parent'=>\Illuminate\Support\Str::slug($parent->slug),'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}">@if($locale =='en')
                                                {!! $item->title_eng !!}
                                            @else
                                                {!! $item->title !!}
                                            @endif</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="ad-slider-nav_arrow">
                            <div class="ad-slider-nav_prev arrow-btn"><i class="far fa-chevron-left"></i></div>
                            <div class="ad-slider-nav_next arrow-btn"><i class="far fa-chevron-right"></i></div>
                        </div>
                    </div>


                    <div class="col-md-8 col-lg-9">
                        <div class="ad-pro-slide-slider">
                            <div class="swiper-container swiper-pro-slider">
                                <div class="swiper-wrapper">
                                    @foreach($products as $item)
                                    <div class="ad-pro-item-slider_item swiper-slide">
                                        <div class="thumb">
                                            <a href="{!! route('frontend.productDetail',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}">
                                                <img src="{!! $item->feature_photo !!}" class="img-fill" alt="{!! $item->title_eng !!}" title="{!! $item->title_eng !!}" srcset=""
                                                     loading="lazy">
                                            </a>
                                            <div class="enquiry">
                                                <a href="{!! route('frontend.productDetail',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}#product-enquiry"><i
                                                            class="fas fa-envelope-open-text"></i> @lang('mega.enquiry')</a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <a href="{!! route('frontend.productDetail',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}">
                                                <div class="title">
                                                    @if($locale =='en')
                                                        {!! $item->title_eng !!}
                                                    @else
                                                        {!! $item->title !!}
                                                    @endif</div>
                                            </a>
                                            <div class="price">@lang('mega.price'): <span class="text-red">${!! $item->price !!}</span></div>
                                            <div class="monthly-payment price">Monthly Payment: <span class="text-blue">{!! $item->payment !!}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>

        </div>
    </section>


    <?php /*senction news*/

    $news = \App\Models\NewsList\NewsList::take(3)->get();

    $new_menu = \App\Models\PageMenu\PageMenu::find(21);
    $news_sub = \App\Models\News\News::find(13);
    ?>
    <section class="pt-6 pb-6">
        <div class="container">

            <div class="s-heading-title">
                <div class="s-heading-title-btn">
                    <h3 class="title">@if($locale =='en')
                            NEWS & EVENTS
                        @else
                            ព័ត៌មាន និងកម្មវិធី
                        @endif</h3>
                    <div class="ad-heading-button">
                        <a href="{!! route('frontend.pagemenu2',['id'=>$news_sub->id,'parent'=>\Illuminate\Support\Str::slug($new_menu->slug),'slug'=>\Illuminate\Support\Str::slug($news_sub->title_eng)]) !!}" class="btn-primary">@lang('mega.viewmore') <i class="fas fa-chevron-circle-right"></i></a>
                    </div>
                </div>

            </div>

            <div class="ad-s-news">
                <div class="row g-3">

                    @foreach($news as $item)
                        <article class="col-md-4">
                            <div class="ad-s-news_item">

                                <div class="thumb">
                                    <a href="{!! route('frontend.news',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}">
                                        <img src="{!! $item->feature_photo !!}" class="img-fill" alt="" srcset=""
                                             loading="lazy">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="date"><i class="far fa-calendar-alt"></i>{!! \Carbon\Carbon::parse($item->created_at)->format('d, M Y') !!}</div>
                                    <a href="{!! route('frontend.news',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}">
                                        <h3 class="title">@if($locale =='en')
                                                {!! $item->title_eng !!}
                                            @else
                                                {!! $item->title !!}
                                            @endif</h3>
                                    </a>
                                    <a href="{!! route('frontend.news',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}" class="btn-secondary">@lang('mega.readmore') <i
                                                class="fas fa-chevron-circle-right"></i></a>
                                </div>
                            </div>
                        </article>

                    @endforeach


                </div>
            </div>

        </div>
    </section>

@endsection