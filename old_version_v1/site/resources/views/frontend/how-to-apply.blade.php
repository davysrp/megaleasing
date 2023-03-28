<?php $locale = App::getLocale();?>
@extends('frontend.layouts.app')
@section('content')
<div class="ad-page-banner" style="background-image: url({!! asset('megaleasing/assets/images/banner-bg.jpg') !!});">
    <div class="container">
        <div class="ad-page-banner_inner">
            <h1 class="title">@if($locale =='en')
                    {!! $page->title_eng !!}
                @else
                    {!! $page->title !!}
                @endif</h1>

            <div class="ad-breadcrumbs">
                <ul>
                    <li><a href="index.php">@lang('mega.home')</a></li>->
                    <li><span>
                            @if($locale =='en')
                                {!! $page->title_eng !!}
                            @else
                                {!! $page->title !!}
                            @endif
                        </span></li>
                </ul>
            </div>

        </div>
    </div>
</div>

<div class="ad-page-section">


    <?php /*senction branch*/ ?>
    <section class="pt-6 pb-6 ">
        <div class="container">

            <div class="ad-content-item  ad-content-item-2 ">
                <div class="row">


                    <div class="col-lg-6 col-md-12">
                        <div class="ad-content-item_text">

                            <div class="content">
                                <div class="content">
                                    @if($locale =='en')
                                        {!! $page->description_eng !!}
                                    @else
                                        {!! $page->description !!}
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="ad-content-item_thumb">
                            <img src="{!! asset( $page->feature_photo) !!}" class="img-fill" alt="" srcset="" loading="lazy">
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>



</div>



@endsection