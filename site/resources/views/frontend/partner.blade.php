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

<div class="ad-page-section ad-small-section  section-bg">


    <?php /*senction branch*/ ?>
    <section class="pt-6 pb-6 ">
        <div class="container">

            <!-- product notice -->
            <div class="ad-product-page_detail section-body" id="product-enquiry">

                <div class="content">

                @if($locale =='en')
                    {!! $page->description_eng !!}
                @else
                    {!! $page->description !!}
                @endif

                    <!-- feedback form -->
                    <div class="pt-4">
                        <div class="product_content_title">
                            <h4 class="title">@lang('mega.fill_form_partner') </h4>
                        </div>
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif


                        {!! Form::open(['route'=>'frontend.sendPartnerMail','enctype'=>'multipart/form-data']) !!}
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="mb-3 row">
                                        <label class="form-label col-sm-3 col-form-label ">@lang('mega.name')</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="tname" value="" placeholder="@lang('mega.namePlaceholder')" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid Name.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 row">
                                        <label class="form-label col-sm-3 col-form-label ">@lang('mega.phone')</label>
                                        <div class="col-sm-9">
                                            <input type="tel" class="form-control" name="tphone" value=""  placeholder="@lang('mega.phonePlaceholder')" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid phone.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 row">
                                        <label class="form-label col-sm-3 col-form-label ">@lang('mega.email')</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" value="" name="temail"  placeholder="@lang('mega.emailPlaceholder')" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid email.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 row">
                                        <label class="form-label col-sm-3 col-form-label ">@lang('mega.partner_address')</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="taddress" value="" placeholder="@lang('mega.addressPlaceholder')" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid address.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 row">
                                        <label class="form-label col-sm-3 col-form-label ">@lang('mega.Type_of_partner')</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" value="" name="ttype_partner" required>
                                                <option value="@lang('mega.Exclusive')" selected>@lang('mega.Exclusive')</option>
                                                <option value="@lang('mega.Not_exclusive')">@lang('mega.Not_exclusive')</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please provide a valid choose type of partner.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 row">
                                        <label class="form-label col-sm-3 col-form-label ">@lang('mega.Products_Services')</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="tpro_category" value="" required>
                                                @foreach($cats as $item)
                                                <option value="{!! $item->title_eng !!}-{!! $item->title !!}">@if($locale =='en')
                                                        {!! $item->title_eng !!}
                                                    @else
                                                        {!! $item->title !!}
                                                    @endif</option>

                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Please provide a valid choose product & services.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-2 mb-3">
                                    <p><strong>@lang('mega.Description')</strong></p>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 row">
                                        <div class="col-sm-12">
                                            <textarea class="form-control" value="" name="tmessage" rows="4" placeholder="@lang('mega.messagePlaceholder')" required></textarea>
                                            <div class="invalid-feedback">
                                                Please provide a valid your messahe.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn-submit" type="submit"><i class="far fa-paper-plane"></i> @lang('mega.submit')</button>
                                </div>

                            </div>

                            {!! Form::open() !!}

                    </div>

                </div>

            </div>
        </div>
    </section>



</div>



@endsection
