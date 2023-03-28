<?php $locale = App::getLocale();?>
@extends('frontend.layouts.app')
@section('content')

    <div class="ad-page-banner" style="background-image: url({!! asset('megaleasing/assets/images/banner-bg.jpg') !!});">
        <div class="container">
            <div class="ad-page-banner_inner">
                <h1 class="title">
                    @if($locale =='en')
                        {!! $page->title_eng !!}
                    @else
                        {!! $page->title !!}
                    @endif</h1>
                <div class="ad-breadcrumbs">
                    <ul>
                        <li><a href="{!! route('frontend.index') !!}">@lang('mega.home')</a></li>->
                        <li>@if($locale =='en')
                                {!! $parent->title_eng !!}
                            @else
                                {!! $parent->title !!}
                            @endif</li>->
                        <li><span> @if($locale =='en')
                                    {!! $page->title_eng !!}
                                @else
                                    {!! $page->title !!}
                                @endif</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="ad-page-section">


        <?php /*senction branch*/ ?>
        <section class="pt-6 pb-6 ">
            <div class="container">
                <div class="ad-content-item ">
                    <div class="row">

                        <div class="col-lg-6 col-md-12">
                            <div class="ad-content-item_text">
                                <h2 class="title">
                                    @if($locale =='en')
                                        {!! $page->title_eng !!}
                                    @else
                                        {!! $page->title !!}
                                    @endif</h2>
                                <div class="ad-title-divider">
                                    <div class="line-1"></div>
                                    <div class="line-2"></div>
                                </div>
                                <div class="content">
                                    <div class="ad-content-address">
                                        <div class="address-info">
                                            <div class="address-info_group">
                                                <div class="label">
                                                    <i class="fas fa-map-marker-alt"></i> <strong>@lang('mega.address')</strong>
                                                </div>
                                                <div class="text">
                                                    @if($locale =='en')
                                                        {!! $page->address_eng !!}
                                                    @else
                                                        {!! $page->address !!}
                                                    @endif

                                                </div>
                                            </div>

                                            <div class="address-info_group">
                                                <div class="label">
                                                    <i class="fas fa-fax"></i> <strong>@lang('mega.phone')</strong>
                                                </div>
                                                <div class="text">
                                                    @if($locale =='en')
                                                        {!! $page->phone_eng !!}
                                                    @else
                                                        {!! $page->phone !!}
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="address-info_group">
                                                <div class="label">
                                                    <i class="far fa-calendar-alt"></i> <strong>@lang('mega.worktime')</strong>
                                                </div>
                                                <div class="text">
                                                    @if($locale =='en')
                                                        {!! $page->work_time_eng !!}
                                                    @else
                                                        {!! $page->work_time !!}
                                                    @endif
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="ad-content-item_thumb">
                                {!! $page->map !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>



    </div>

@endsection