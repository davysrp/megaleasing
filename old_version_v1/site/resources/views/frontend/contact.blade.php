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
                    <li><a href="{!! route('frontend.index') !!}">@lang('mega.home')</a></li>->
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
            <div class="ad-content-item_ ">
                <div class="row">

                    <div class="col-lg-6 col-md-12 mb-3">

                        <div class="content">
                            @if($locale =='en')
                                {!! $page->description_eng !!}
                            @else
                                {!! $page->description !!}
                            @endif
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
                                        <div class="text">{!! $page->phone !!}

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

                    <div class="col-lg-6 col-md-12 mb-3">
                        <div class="product_content_title">
                            <h4 class="title"> @if($locale =='en')
                                    Write Us A Message
                                @else
                                    សរសេរសារមកយើង
                                @endif</h4>
                        </div>

                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                            {!! Form::open(['route'=>'frontend.contactSend','enctype'=>'multipart/form-data']) !!}

                            <div class="row">

                                <input type="text" class="form-control" id="t-product-name" value="Dream 125CC 2021" required disabled hidden>


                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">@lang('mega.name')</label>
                                        <input type="text" class="form-control" id="tname" ​ placeholder="Ex:​ Mega leasing..." required name="tname">
                                        <div class="invalid-feedback">
                                            Please provide a valid Name.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">@lang('mega.email')</label>
                                        <input type="email" class="form-control" id="temail" value="" placeholder="Ex: ex@gmail.com" ​required name="temail">
                                        <div class="invalid-feedback">
                                            Please provide a valid email.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">@lang('mega.phone')</label>
                                        <input type="tel" class="form-control" id="tphone" value="" ​ placeholder="Ex:​ 010 00 00 00" required name="tphone">
                                        <div class="invalid-feedback">
                                            Please provide a valid phone.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">@lang('mega.message')</label>

                                        <textarea class="form-control" name="tmessage" rows="3" placeholder="Ex: Your message..." required></textarea>
                                        <div class="invalid-feedback">
                                            Please provide a valid your message.
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn-submit" type="submit"><i class="far fa-paper-plane"></i> @lang('mega.send_message')</button>
                                </div>

                            </div>


                        {!! Form::open() !!}
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="ad-content-item_thumb">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15636.13515123877!2d104.89317000000001!3d11.549434!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcc34eec9c5c53d2d!2sMega%20Leasing%20Plc.!5e0!3m2!1sen!2skh!4v1634022851921!5m2!1sen!2skh" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


</div>



@endsection