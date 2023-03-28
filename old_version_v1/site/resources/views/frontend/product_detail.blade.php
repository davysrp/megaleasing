<?php $locale = App::getLocale();?>
@extends('frontend.layouts.app')
@section('content')


    <div class="ad-page-section ad-page-detail-section section-bg">

        <section class="pt-6 pb-6 ">
            <div class="container">

                <div class="ad-product-page_detail section-body">

                    <div class="ad-product-page_detail_title">
                        <h1 class="title">{!! $product->title !!}</h1>
                        <div class="ad-breadcrumbs">
                            <ul>
                                <li><a href="{!! route('frontend.index') !!}">@lang('mega.home')</a></li>
                                ->
                                <li><span>{!! $product->title_eng !!}</span></li>
                            </ul>
                        </div>

                        <div class="price-label">
                            <div class="label"><i class="fas fa-tag"></i></div>
                            <div class="price">${!! number_format($product->price,2) !!}</div>
                        </div>
                    </div>


                    <?php

                    $photos = \App\Models\ProductPhoto\ProductPhoto::where('product_id', $product->id)->get();

                    ?>

                    <div class="ad-product-page_detail_content">
                        <div class="row">

                            <div class="product_gallery col-lg-6 col-md-12 clearfix">
                                <div class="swiper-container">
                                    <div class="swiper swiper-pro-gallery ">

                                        <div class="swiper-wrapper">
                                            @foreach($photos as $item)
                                                <div class="swiper-slide">
                                                    <a data-fslightbox="gallery" href="{!! asset($item->photo) !!}">
                                                        <img src="{!! asset($item->photo) !!}"/>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="ad-slider-nav_arrow">
                                            <div class="ad-slider-nav_prev arrow-btn"><i
                                                        class="far fa-chevron-left"></i></div>
                                            <div class="ad-slider-nav_next arrow-btn"><i
                                                        class="far fa-chevron-right"></i></div>
                                        </div>

                                    </div>

                                    <div thumbsSlider="" class="swiper swiper-pro-thumb">

                                        <div class="swiper-wrapper">
                                            @foreach($photos as $item)
                                                <div class="swiper-slide">
                                                    <img src="{!! asset($item->photo) !!}"/>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="product_content col-lg-6 col-md-12">

                                <div class="product_content_title">
                                    <h4 class="title">@lang('mega.Payment_calculation')</h4>
                                </div>

                                <div class="product_table">

                                    <div class="content">
                                        <table class="ad-price-table-2">
                                            <tr>
                                                <td>@lang('mega.price')</td>
                                                <td>

                                                    <div class="input-group input-group-price">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" class="form-control t-field-readonly"
                                                               name="t_price" id="t_price"
                                                               value="{!! $product->price !!}" readonly>
                                                    </div>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>@lang('mega.prepaid_water')</td>
                                                <td>
                                                    <div class="ad-range-wrap">
                                                        <div class="ad-range-value" id="t_rangeV"></div>
                                                        <input id="t_range" type="range" name="down_payment" min="0"
                                                               max="100" value="0" step="5">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>@lang('mega.Installment_payment')</td>
                                                <td>
                                                    <div class="input-group input-group-price">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" class="form-control t-field-readonly"
                                                               name="t_deposit" id="t_deposit" value="0" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>@lang('mega.installment_period')</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                               name="installment_payment" id="t_installment_payment_1"
                                                               value="12" ​​ checked>
                                                        <label class="form-check-label"
                                                               for="t_installment_payment_1">12 @lang('mega.month')</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                               name="installment_payment" id="t_installment_payment_2"
                                                               value="24">
                                                        <label class="form-check-label"
                                                               for="t_installment_payment_2">24 @lang('mega.month')</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                               name="installment_payment" id="t_installment_payment_3"
                                                               value="36">
                                                        <label class="form-check-label"
                                                               for="t_installment_payment_3">36 @lang('mega.month')</label>
                                                    </div>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>@lang('mega.First_month_payment')</td>
                                                <td>
                                                    <div class="input-group input-group-price">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" class="form-control t-field-readonly"
                                                               name="t_monlty_payment" id="t_monlty_payment" value="0"
                                                               readonly>
                                                    </div>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="product_content_note">
                                        <p><span class="text-red">*</span>@lang('mega.Notice')</p>
                                    </div>

                                </div>


                                @if($product->promotion_status=='1')
                                    <img src="{!! asset($product->promotion_photo) !!}" class="w-100">
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <!-- product notice -->
                <div class="ad-product-page_detail section-body" id="product-enquiry">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">

                            <div class="content-inner">
                                <div class="product_content_title">
                                    <h4 class="title">@lang('mega.Online_Installment_Request')</h4>
                                </div>

                                    @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                    {!! Form::open(['route'=>'frontend.onlineapplicationsubmit','enctype'=>'multipart/form-data']) !!}
                                    <div class="row">

                                        <input type="text" class="form-control" id="t-product-name"
                                               value="{!! $product->title !!}-{!! $product->title_eng !!}" required disabled hidden name="product">


                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('mega.name')</label>
                                                <input type="text" class="form-control" id="tname" name="tname" value="" ​
                                                       placeholder="ឧទ៖​ មេហ្គាលីស..." required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid Name.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('mega.email')</label>
                                                <input type="email" class="form-control" id="t-email" name="temail"
                                                       placeholder="ឧទ៖​ ex@gmail.com" ​required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid email.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('mega.phone')</label>
                                                <input type="tel" class="form-control" id="t-phone" name="tphone" value="" ​
                                                       placeholder="ឧទ៖​ 010 00 00 00" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid phone.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('mega.address')</label>
                                                <input type="text" class="form-control" id="t-address" name="taddress" value="" ​
                                                       placeholder="ឧទ៖​ ភូមិ, ឃុំ, ស្រុក, ខេត្ត" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid address.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('mega.job')</label>
                                                <input type="text" class="form-control" id="t-job" value="" name="tjob"
                                                       placeholder="ឧទ៖​ មុខរបររបស់អ្នក..." required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid job.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn-submit" type="submit"><i
                                                        class="far fa-paper-plane"></i> @lang('mega.submit_application')
                                            </button>
                                        </div>

                                    </div>


                                </form>

                            </div>

                        </div>

                        {{-- <div class="col-lg-6 col-md-12">

                             <div class="content-inner">
                                 <div class="product_content_title">
                                     <h4 class="title">@lang('mega.promotion')</h4>
                                 </div>

                                 <div class="content">

                                     @if($locale =='en')
                                         {!! $product->promotion_eng !!}
                                     @else
                                         {!! $product->promotion !!}
                                     @endif


                                 </div>
                             </div>

                         </div>--}}
                        <div class="col-lg-6 col-md-12">

                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="content-inner">
                                        <div class="product_content_title">
                                            <h4 class="title">@lang('mega.payment_terms')</h4>
                                        </div>

                                        <div class="content">

                                            @if($locale =='en')
                                                {!! $product->payment_term_eng !!}
                                            @else
                                                {!! $product->payment_term !!}
                                            @endif

                                            <img src="{!! asset('megaleasing/assets/images/payment-logo.jpg') !!}" alt=""
                                                 srcset="" class="img-fluid" loading="lazy">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">

                                    <div class="content-inner">
                                        <div class="product_content_title">
                                            <h4 class="title">@lang('mega.Installment_terms') </h4>
                                        </div>

                                        <div class="content">
                                            @if($locale =='en')
                                                {!! $product->documents_eng !!}
                                            @else
                                                {!! $product->documents !!}
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="ad-product-page_other section-body">

                    <?/* product relate */ ?>

                    <div class="ad-product-page-related">
                        <h2 class="title">@lang('mega.Product_related')</h2>
                    </div>

                    <div class="ad-product_grid">
                        <?/* product grid */ ?>
                        <div class="row g-3">
                            @foreach($related as $item)
                                <div class="col-lg-3 col-md-4 col-6 product-col">
                                    <div class="ad-pro-item-slider_item ad-pro-item-grid_item">
                                        <div class="thumb">
                                            <a href="{!! route('frontend.productDetail',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}">
                                                <img src="{!! $item->feature_photo !!}" class="img-fill"
                                                     alt="{!! $item->title_eng !!}" title="{!! $item->title_eng !!}"
                                                     srcset=""
                                                     loading="lazy">
                                            </a>
                                            <div class="enquiry">
                                                <a href="{!! route('frontend.productDetail',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}#product-enquiry"><i
                                                            class="fas fa-envelope-open-text"></i> @lang('mega.enquiry')
                                                </a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <a href="{!! route('frontend.productDetail',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}">
                                                <h3 class="title">
                                                    @if($locale =='en')
                                                        {!! $item->title_eng !!}
                                                    @else
                                                        {!! $item->title !!}
                                                    @endif</h3>
                                            </a>
                                            <div class="price">@lang('mega.price'): <span
                                                        class="text-red">${!! number_format($item->price,2)  !!}</span>
                                            </div>
                                            <div class="monthly-payment price">@lang('mega.payment'): <span
                                                        class="text-blue">{!! $item->payment !!}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>


                    </div>

                </div>
            </div>
        </section>


    </div>


@endsection