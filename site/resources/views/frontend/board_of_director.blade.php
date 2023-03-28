<?php $locale = App::getLocale();?>
@extends('frontend.layouts.app')
@section('content')
    <div class="ad-page-banner"
         style="background-image: url({!! asset('megaleasing/assets/images/banner-bg.jpg') !!});">
        <div class="container">
            <div class="ad-page-banner_inner">
                <h1 class="title">@if($locale =='en')
                        Board of Directors
                    @else
                        សមាសភាព និងសាវតារបស់ក្រុមប្រឹក្សភិបាល
                    @endif</h1>

                <div class="ad-breadcrumbs">
                    <ul>
                        <li><a href="index.php">@lang('mega.home')</a></li>
                        ->
                        <li><span>
                            @if($locale =='en')
                                    Board of Directors
                                @else
                                    សមាសភាព និងសាវតារបស់ក្រុមប្រឹក្សភិបាល
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

                                        @foreach($boarddirectors as $item)
                                            <div class="row">
                                                <div class="col-sm-12 col-md-3 col-lg-3">
                                                    <div style="width: 180px; height: 220px; overflow: hidden;">
                                                        <img class="img-thumbnail" style="width: 100%; height: 100%;" src="{!! asset($item->photo) !!}" alt="">
                                                    </div>

                                                </div>
                                                <div class="col-sm-12 col-md-9 col-lg-9">
                                                    <h2 style="padding: 0px; margin: 0px; font-size: 22px; color: #0066ab;">

                                                        @if($locale =='en')
                                                            {!! $item->name !!}
                                                        @else
                                                            {!! $item->name_kh !!}
                                                        @endif
                                                    </h2>
                                                    <h5 style="padding: 0px; margin: 5px 0px; font-size: 16px; color: #0066ab;">
                                                        @if($locale =='en')
                                                            {!! $item->title !!}
                                                        @else
                                                            {!! $item->title_kh !!}
                                                        @endif

                                                    </h5>
                                                    <p style="padding: 0px; margin:15px 0px 0px 0px;">
                                                        @if($locale =='en')
                                                            {!! $item->descriptions !!}
                                                        @else
                                                            {!! $item->descriptions_kh !!}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <br>
                                        @endforeach

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
                                        <div class="ad-widget-job ">

                                            <ul class="sidemenu-board-director">
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
