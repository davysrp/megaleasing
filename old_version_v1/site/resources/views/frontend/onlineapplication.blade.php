<?php $locale = App::getLocale();?>
@extends('frontend.layouts.app')
@section('content')
    <div class="ad-page-banner" style="background-image: url({!! asset('megaleasing/assets/images/banner-bg.jpg') !!});">
        <div class="container">
            <div class="ad-page-banner_inner">
                <h1 class="title">
                    @if($locale =='en')
                        Online Application
                    @else
                        កម្មវិធីអនឡាញ
                    @endif</h1>

                <div class="ad-breadcrumbs">
                    <ul>
                        <li><a href="index.php">@lang('mega.home')</a></li>->
                        <li><span>@if($locale =='en')
                                    Online Application
                                @else
                                    កម្មវិធីអនឡាញ
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


            </div>
        </section>



    </div>
@endsection