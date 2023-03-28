<?php $locale = App::getLocale();?>
@extends('frontend.layouts.app')
@section('content')
    <div class="ad-page-banner"
         style="background-image: url({!! asset('megaleasing/assets/images/banner-bg.jpg') !!});">
        <div class="container">
            <div class="ad-page-banner_inner">
                <h1 class="title">@if($locale =='en')
                        {!! $about->title_eng !!}
                    @else
                        {!! $about->title !!}
                    @endif</h1>

                <div class="ad-breadcrumbs">
                    <ul>
                        <li><a href="index.php">@lang('mega.home')</a></li>
                        ->
                        <li><span>
                            @if($locale =='en')
                                    {!! $about->title_eng !!}
                                @else
                                    {!! $about->title !!}
                                @endif
                        </span></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>


    <div class="ad-page-section ad-page-detail-section ad-job-detail-section section-bg">


        <?php /*senction branch*/ ?>
        <section class="pt-6 pb-6 ">
            <div class="container">

                <div class="ad-news-page_detail">

                    <div class="ad-product-page_detail_content">
                        <div class="row">

                            <?/*post content*/ ?>
                            <div class="news-content job-content col-lg-8 col-md-12">

                                <div class="section-body">
                                    <div class="content">
                                        <img src="{!! asset($about->feature_photo) !!}" alt="" srcset=""
                                             class="img-fill">
                                        @if($locale =='en')
                                            {!! $about->description_eng !!}
                                        @else
                                            {!! $about->description !!}
                                        @endif
                                    </div>

                                </div>

                            </div>

                            <?/*post sidebar*/ ?>
                            <aside class="news-aside col-lg-4 col-md-12">

                                <div class="news-aside-inner">

                                    <!-- <div class="ad-widget-title">
                                        <h3 class="title">More Job</h3>
                                    </div> -->
                                    @php
                                        $parent=\App\Models\PageMenu\PageMenu::find(17);
                                            $items = \App\Models\About\About::all();
                                    @endphp
                                    <div class="ad-widget-job">

                                        <ul>
                                            @foreach($items as $item)
                                                <li>
                                                    <a href="{!! route('frontend.pagemenu2',['id'=>$item->id,'parent'=>\Illuminate\Support\Str::slug($parent->slug),'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}">
                                                        @if($locale =='en')
                                                            {!! $item->title_eng !!}
                                                        @else
                                                            {!! $item->title !!}
                                                        @endif</a>
                                                </li>

                                            @endforeach
                                        </ul>
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