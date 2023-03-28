<?php $locale = App::getLocale();?>
@extends('frontend.layouts.app')
@section('content')


    <div class="ad-page-banner" style="background-image: url({!! asset('megaleasing/assets/images/banner-bg.jpg') !!});">
        <div class="container">
            <div class="ad-page-banner_inner">
                <h1 class="title">
                    @if($locale =='en')
                        {!! $job->position->title_eng !!}
                    @else
                        {!! $job->position->title !!}
                    @endif
                </h1>

                <div class="ad-breadcrumbs">
                    <ul>
                        <li><a href="index.php">@lang('mega.home')</a></li>->
                        <li><span>@if($locale =='en')
                                    {!! $job->position->title_eng !!}
                                @else
                                    {!! $job->position->title!!}
                                @endif</span></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="ad-page-section ad-page-detail-section ad-job-detail-section section-bg">

        <section class="pt-6 pb-6 ">
            <div class="container">

                <div class="ad-news-page_detail">

                    <div class="ad-product-page_detail_content">
                        <div class="row">

                            <?/*post content*/ ?>
                            <div class="news-content job-content col-lg-8 col-md-12">

                                <div class="section-body">

                                    <ul class="meta-cate">
                                        <li>{!! \Carbon\Carbon::parse($job->deadline)->format('F d, Y') !!}</li>
                                        <li>{!! $job->title_eng !!}
                                            @if($locale =='en')
                                                {!! $job->title_eng !!}
                                            @else
                                                {!! $job->title !!}
                                            @endif</li>
                                        <li>{!! $job->post !!} @lang('mega.positions_in')  @if($locale =='en')
                                                {!! $job->province->title_eng !!}
                                            @else
                                                {!! $job->province->title !!}
                                            @endif</li>
                                    </ul>

                                    <div class="content">

                                        <h3 class="content-heading">@lang('mega.Job_responsibilities')</h3>


                                        @if($locale =='en')
                                            {!! $job->responsibilities_eng !!}
                                        @else
                                            {!! $job->responsibilities !!}
                                        @endif
                                        <h3 class="content-heading">@lang('mega.Job_requirements')</h3>


                                        @if($locale =='en')
                                            {!! $job->requirements_eng !!}
                                        @else
                                            {!! $job->requirements !!}
                                        @endif

                                    </div>

                                    <div class="content-form">

                                        <h5 class="title">@lang('mega.Job_Application')</h5>
                                        @if(session()->has('message'))
                                            <div class="alert alert-success">
                                                {{ session()->get('message') }}
                                            </div>
                                        @endif

                                            {{ Form::open(['route' => 'frontend.jobapplication', 'class' => 'needs-validation', 'role' => 'form', 'novalidate','method' => 'post', 'id' => 'create-explore']) }}
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">@lang('mega.Sector')</label>
                                                        <input type="text" class="form-control" id="t-product-name" name="tposition" value="@if($locale =='en') {!! $job->position->title_eng !!}
                                                        @else {!! $job->position->title!!} @endif" required readonly>
                                                        <div class="invalid-feedback">
                                                            Please provide a valid job Name.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">@lang('mega.name') </label>
                                                        <input type="text" class="form-control" id="t-name" value="" required name="tname">
                                                        <div class="invalid-feedback">
                                                            Please provide a valid Name.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">@lang('mega.email') </label>
                                                        <input type="email" class="form-control" id="t-email" value="" required name="temail">
                                                        <div class="invalid-feedback">
                                                            Please provide a valid email.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">@lang('mega.phone') </label>
                                                        <input type="tel" class="form-control" id="t-phone" value="" required name="tphone">
                                                        <div class="invalid-feedback">
                                                            Please provide a valid phone.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label"> @lang('mega.Attach_Your_Resumé') </label>
                                                        <input class="form-control" type="file" id="formFile" required name="cv">
                                                        <div class="invalid-feedback">
                                                            Please provide a valid Resumé file.
                                                        </div>
                                                        <div class="text-sm mt-1">@lang('mega.Files_size') 2 MB.<br>Allowed file types: rtf, pdf, doc, docx, odt.</div>
                                                    </div>
                                                </div>


                                                <div class="col-12">
                                                    <button class="btn-submit" type="submit"><i class="far fa-paper-plane"></i> @lang('mega.submit') </button>
                                                </div>

                                            </div>

                                        {{ Form::close() }}
                                    </div>
                                </div>

                            </div>

                            <?/*post sidebar*/ ?>
                            <aside class="news-aside col-lg-4 col-md-12">

                                <div class="news-aside-inner">

                                    <div class="ad-widget-title">
                                        <h3 class="title">@lang('mega.more_Opportunity')</h3>
                                    </div>

                                    <div class="ad-widget-job">
                                        <ul>
                                            @foreach($jobs as $item)
                                            <li>
                                                <a href="{!! route('frontend.jobdetail',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}"> @if($locale =='en')
                                                        {!! $item->position->title_eng !!}
                                                    @else
                                                        {!! $item->position->title !!}
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