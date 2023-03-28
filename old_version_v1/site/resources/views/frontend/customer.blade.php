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
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
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
                            <h4 class="title">@lang('mega.fill_form_partner')</h4>
                        </div>

                            {!! Form::open(['route'=>'frontend.customerFeedBack','enctype'=>'multipart/form-data','class'=>'needs-validation','novalidate']) !!}
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="mb-3 row">
                                        <label class="form-label col-sm-3 col-form-label ">@lang('mega.name')</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="tname" name="tname" value="" placeholder="ឧទ៖​ មេហ្គាលីស..." required>
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
                                            <input type="tel" class="form-control" name="tphone"  value=""​ placeholder="ឧទ៖​ 010 00 00 00" required>
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
                                            <input type="email" class="form-control" id="temail" name="temail" value="" placeholder="ឧទ៖​ ex@gmail.com" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid email.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 row">
                                        <label class="form-label col-sm-3 col-form-label ">@lang('mega.address')</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="taddress" value="" placeholder="ឧទ៖​ ភូមិ, ឃុំ, ស្រុក, ខេត្ត" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid address.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-2 mb-3">
                                    <p​​><strong>@lang('mega.choose_service')</strong></p​​>
                                </div>

                                @php
                                    $cats=\App\Models\Product\Product::where('parent_id',null)->get()

                                @endphp
                                <div class="col-md-12">
                                    <div class="mb-3 row">
                                        <div class="col-sm-12">
                                            <select class="form-select" name="t_pro_category" required>
                                                @foreach($cats as $item)
                                                    <option value="{!! $item->title_eng !!}-{!! $item->title !!}">@if($locale =='en')
                                                            {!! $item->title_eng !!}
                                                        @else
                                                            {!! $item->title !!}
                                                        @endif</option>

                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Please provide a valid choose services.
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="pt-2 mb-3">
                                    <p​​><strong>@lang('mega.fact')</strong></p​​>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 row">
                                        <div class="col-sm-12">
                                            <textarea class="form-control" name="tproblem" rows="5" placeholder="ឧទ៖​ អង្គហេតុរបស់អ្នក..." required></textarea>
                                            <div class="invalid-feedback">
                                                Please provide a valid your problem.
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="pt-2 mb-3">
                                    <p​​><strong>@lang('mega.problem')</strong></p​​>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 row">
                                        <div class="col-sm-12">
                                            <textarea class="form-control" name="tmessage" rows="6" placeholder="ឧទ៖​ យោបលរបស់អ្នក..." required></textarea>
                                            <div class="invalid-feedback">
                                                Please provide a valid your message.
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <button class="btn-submit" type="submit"><i class="far fa-paper-plane"></i> @lang('mega.submit')</button>
                                </div>

                            </div>

                        {!! Form::close() !!}

                    </div>

                </div>

            </div>


        </div>
    </section>


</div>


@endsection