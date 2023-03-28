<?php $locale = App::getLocale();?>
@extends('frontend.layouts.app')
@section('content')
<div class="ad-page-section ad-page-detail-section section-bg">

    <section class="pt-6 pb-6 ">
        <div class="container">

            <div class="ad-news-page_detail">

                <?/*post title*/ ?>
                    <div class="ad-product-page_detail_title">
                        <h1 class="title">@if($locale =='en')
                                {!! $new->title_eng !!}
                            @else
                                {!! $new->title !!}
                            @endif</h1>
                        <div class="ad-breadcrumbs">
                            <ul>
                                <li><a href="{!! route('frontend.index') !!}">@lang('mega.home')</a></li>
                                ->
                                <li>@if($locale =='en')
                                        {!! $page->title_eng !!}
                                    @else
                                        {!! $page->title !!}
                                    @endif</li>
                                ->
                                <li><span>@if($locale =='en')
                                            {!! $new->title_eng !!}
                                        @else
                                            {!! $new->title !!}
                                        @endif</span></li>
                            </ul>
                        </div>

                    </div>


                <div class="ad-product-page_detail_content">
                    <div class="row">

                        <?/*post content*/ ?>
                        <div class="news-content col-lg-8 col-md-12">

                            <div class="section-body">
                                <div class="content">
                                    <div class="content">
                                        <div class="thumb">
                                            <img src="{!! $new->feature_photo !!}" class="img-fluid"
                                                 alt="{!! $new->title_eng !!}"
                                                 title="{!! $new->title_eng !!}" srcset="" loading="lazy">
                                        </div>

                                        @if($locale =='en')
                                            {!! $new->description_eng !!}
                                        @else
                                            {!! $new->description !!}
                                        @endif
                                    </div>

                                </div>

                                <div class="content-footer">

                                </div>
                            </div>

                        </div>

                        <?/*post sidebar*/ ?>
                        <aside class="news-aside col-lg-4 col-md-12">

                            <div class="news-aside-inner">

                                <div class="ad-widget-title">
                                    <h3 class="title"> @if($locale =='en')
                                            Last News & Events
                                        @else
                                            ព័ត៌មាន និងព្រឹត្តិការណ៍ចុងក្រោយ
                                        @endif</h3>
                                </div>

                                <div class="ad-widget-news">
                                    <div class="row">

                                        @foreach($news as $item)
                                            <article class="col-md-6 col-lg-12">
                                                <div class="ad-s-news_item">
                                                    <a href="{!! route('frontend.news',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}">
                                                        <div class="row">
                                                            <div class="col-5">
                                                                <div class="thumb">
                                                                    <img src="{!! $item->feature_photo !!}" class="img-fill"
                                                                         alt="" srcset="" loading="lazy">
                                                                </div>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="content">
                                                                    <div class="date"><i
                                                                                class="far fa-calendar-alt"></i>12-09-2021
                                                                    </div>
                                                                    <h4 class="title">@if($locale =='en')
                                                                            {!! $item->title_eng !!}
                                                                        @else
                                                                            {!! $item->title !!}
                                                                        @endif</h4>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </a>
                                                </div>
                                            </article>
                                        @endforeach

                                    </div>
                                </div>

                                <div class="ad-widget-title">
                                    <h3 class="title"> @if($locale =='en')
                                            Last Promotion
                                        @else
                                            ការផ្សព្វផ្សាយចុងក្រោយ
                                        @endif</h3>
                                </div>

                                <div class="ad-widget-news">
                                    <div class="row">

                                        @foreach($promotions as $item)
                                            <article class="col-md-6 col-lg-12">
                                                <div class="ad-s-news_item">
                                                    <a href="{!! route('frontend.promotion',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}">
                                                        <div class="row">
                                                            <div class="col-5">
                                                                <div class="thumb">
                                                                    <img src="{!! $item->feature_photo !!}"
                                                                         class="img-fill" alt="" srcset=""
                                                                         loading="lazy">
                                                                </div>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="content">
                                                                    <div class="date"><i
                                                                                class="far fa-calendar-alt"></i>{!! \Carbon\Carbon::parse($item->created_at)->format('d, M Y') !!}
                                                                    </div>
                                                                    <h4 class="title">@if($locale =='en')
                                                                            {!! $item->title_eng !!}
                                                                        @else
                                                                            {!! $item->title !!}
                                                                        @endif</h4>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </a>
                                                </div>
                                            </article>
                                        @endforeach

                                    </div>
                                </div>


                            </div>

                        </aside>

                    </div>
                </div>

            </div>


        </div>
    </section>



</div>
@endsection
