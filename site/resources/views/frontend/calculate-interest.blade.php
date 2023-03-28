<?php $locale = App::getLocale();?>
@extends('frontend.layouts.app')
@section('content')
    <div class="ad-page-banner"
         style="background-image: url({!! asset('megaleasing/assets/images/banner-bg.jpg') !!});">
        <div class="container">
            <div class="ad-page-banner_inner">
                <h1 class="title">@if($locale =='en')
                        Payment Calculate
                    @else
                        គណនាប្រាក់បង់រំលស់
                    @endif</h1>

                <div class="ad-breadcrumbs">
                    <ul>
                        <li><a href="index.php">@lang('mega.home')</a></li>
                        ->
                        <li><span>
                           @if($locale =='en')
                                   Payment Calculate
                                @else
                                    គណនាប្រាក់បង់រំលស់
                                @endif
                        </span></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="ad-page-section section-bg">

        <section class="pt-6 pb-6 ">
            <div class="container">

                <!-- product notice -->
                <div class="ad-product-page_detail section-body" id="product-enquiry">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">

                            <div class="content-inner">
                                <div class="product_content_title">
                                    <h4 class="title">@lang('mega.Online_Installment_Request')</h4>
                                </div>

                                <form action="" method="get" class="needs-validation" novalidate>

                                    <div class="row">

                                        <input type="text" class="form-control" id="t-product-name"
                                               value="Dream 125CC 2021" required disabled hidden>


                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('mega.name')</label>
                                                <input type="text" class="form-control" id="t-name" value="" ​
                                                       placeholder="@lang('mega.namePlaceholder')">
                                                <div class="invalid-feedback">
                                                    Please provide a valid Name.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('mega.email')</label>
                                                <input type="email" class="form-control" id="t-email" value=""
                                                       placeholder="@lang('mega.emailPlaceholder')">
                                                <div class="invalid-feedback">
                                                    Please provide a valid email.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('mega.phone')</label>
                                                <input type="tel" class="form-control" id="t-phone" value="" ​
                                                       placeholder="@lang('mega.phonePlaceholder')">
                                                <div class="invalid-feedback">
                                                    Please provide a valid phone.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('mega.address')</label>
                                                <input type="text" class="form-control" id="t-address" value="" ​
                                                       placeholder="@lang('mega.addressPlaceholder')">
                                                <div class="invalid-feedback">
                                                    Please provide a valid address.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">@lang('mega.job')</label>
                                                <input type="text" class="form-control" id="t-job" value=""
                                                       placeholder="@lang('mega.jobPlaceholder')">
                                                <div class="invalid-feedback">
                                                    Please provide a valid job.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button id="checkfield" class="btn-submit" type="submit"><i
                                                        class="far fa-paper-plane"></i> @lang('mega.submit_application')
                                            </button>
                                        </div>

                                    </div>


                                </form>

                            </div>

                        </div>

                        <div class="col-lg-6 col-md-12">

                            <div class="content-inner">
                                <div class="product_content_title">
                                    <h4 class="title">@lang('mega.Payment_calculation')</h4>
                                </div>

                                <div class="product_table">

                                    <div class="content">
                                        <table class="ad-price-table-2">
                                            <tr>
                                                <td>@lang('mega.price')</td>
                                                <td>
                                                    <div class="input-group input-group-price_label">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="number" class="form-control" name="t_price" id="t_price" value="0">
                                                    </div>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>@lang('mega.prepaid_water')</td>
                                                <td>
                                                    <div class="ad-range-wrap">
                                                        <div class="ad-range-value" id="t_rangeV"></div>
                                                        <input id="t_range" type="range" name="down_payment" min="0" max="100" value="0" step="5">
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
                                                        <input type="number" class="form-control t-field-readonly" name="t_deposit" id="t_deposit" value="0" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>@lang('mega.installment_period')</td>
                                                <td>
                                                    <div class="form-check form-check-inline" style="margin-right: 8px !important;">
                                                        <input class="form-check-input" type="radio" name="installment_payment" id="t_installment_payment_1" value="12" ​​ checked>
                                                        <label class="form-check-label" for="t_installment_payment_1">12 @lang('mega.month')</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" style="margin-right: 8px !important;">
                                                        <input class="form-check-input" type="radio" name="installment_payment" id="t_installment_payment_2" value="24">
                                                        <label class="form-check-label" for="t_installment_payment_2">24 @lang('mega.month')</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" style="margin-right: 8px !important;">
                                                        <input class="form-check-input" type="radio" name="installment_payment" id="t_installment_payment_3" value="36">
                                                        <label class="form-check-label" for="t_installment_payment_3">36 @lang('mega.month')</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" style="margin-right: 8px !important;">
                                                        <input class="form-check-input" type="radio"
                                                               name="installment_payment" id="t_installment_payment_4"
                                                               value="48">
                                                        <label class="form-check-label"
                                                               for="t_installment_payment_3">48 @lang('mega.month')</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" style="margin-right: 8px !important;">
                                                        <input class="form-check-input" type="radio"
                                                               name="installment_payment" id="t_installment_payment_5"
                                                               value="60">
                                                        <label class="form-check-label"
                                                               for="t_installment_payment_3">60 @lang('mega.month')</label>
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
                                                        <input type="number" class="form-control t-field-readonly" name="t_monlty_payment" id="t_monlty_payment" value="0" readonly>
                                                    </div>
                                            </tr>
                                        </table>
                                    </div>


                                    <script>
                                        $('#checkfield').click(function (e) {

                                            var name = $("#t-name").val();
                                            var phone = $("#t-phone").val();
                                            var address = $("#t-address").val();

                                            if(name == '' || name == undefined){
                                                e.preventDefault();
                                                $("#t-name").next().css('display', 'inherit');
                                            }else {
                                                $("#t-name").next().css('display', 'none');
                                            }

                                            if(phone == '' || phone == undefined){
                                                e.preventDefault();
                                                $("#t-phone").next().css('display', 'inherit');
                                            }else {
                                                $("#t-phone").next().css('display', 'none');
                                            }

                                            if(address == '' || address == undefined){
                                                e.preventDefault();
                                                $("#t-address").next().css('display', 'inherit');
                                            }else {
                                                $("#t-address").next().css('display', 'none');
                                            }

                                        });
                                    </script>

                                    <div class="product_content_note">
{{--                                        <p><span class="text-red">*</span>@lang('mega.Notice')</p>--}}
                                        <p>@lang('mega.Notice')</p>
                                    </div>

                                    <div class="content pt-2">
                                        @php
                                        $setting=\App\Models\Settings\Setting::find(1)
                                        @endphp
                                        @if($locale =='en')
                                            {!! $setting->calculate_note_eng !!}
                                        @else
                                            {!! $setting->calculate_note !!}
                                        @endif

                                    </div>


                                </div>
                            </div>

                        </div>


                    </div>

                </div>


            </div>
        </section>



    </div>

@endsection
