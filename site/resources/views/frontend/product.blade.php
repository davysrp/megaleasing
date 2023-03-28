<?php $locale = App::getLocale();?>
@extends('frontend.layouts.app')
@section('content')

    <div class="ad-page-banner"
         style="background-image: url({!! asset('megaleasing/assets/images/banner-bg.jpg') !!});">
        <div class="container">
            <div class="ad-page-banner_inner">
                <h1 class="title">
                    @if($locale =='en')
                        {!! $cat->title_eng !!}
                    @else
                        {!! $cat->title !!}
                    @endif</h1>
                <div class="ad-breadcrumbs">
                    <ul>
                        <li><a href="index.php">@lang('mega.home')</a></li>
                        ->
                        <li><a href="index.php">
                                @if($locale =='en')
                                    {!! $page->title_eng !!}
                                @else
                                    {!! $page->title !!}
                                @endif</a></li>
                        ->
                        <li><span>
                                @if($locale =='en')
                                    {!! $cat->title_eng !!}
                                @else
                                    {!! $cat->title !!}
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
                <div class="ad-product-page">

                    <div class="ad-product-page-content">
                        <div class="ad-content-item">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="ad-content-item_thumb">
                                        <img src="{!! asset($cat->feature_photo) !!}" alt="" srcset="" class="img-fill">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="ad-content-item_text">
                                        <div class="content">


                                            @if($locale =='en')
                                                {!! $cat->description_eng !!}
                                            @else
                                                {!! $cat->description !!}
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>








                    <?/* product filter */

                    ?>
                    <div class="ad-product_filter clearfix">
                        {{ Form::open(['route' => 'frontend.searchproduct', 'class' => 'ad-product_filter_form', 'role' => 'form', 'method' => 'get', 'id' => 'create-explore']) }}

                            <div class="form-group">
                                <label><i class="far fa-sliders-h"></i> @lang('mega.filter')</label>
                            </div>
                            <div class="form-group">
                                <select name="category" class="form-select">
{{--                                    <option value="all" selected>All</option>--}}
                                    @foreach($cats as $item)
                                    <option value="{!! $item->id !!}">
                                        @if($locale =='en')
                                            {!! $item->title_eng !!}
                                        @else
                                            {!! $item->title !!}
                                        @endif
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @php
                                $sorts = \Illuminate\Support\Facades\DB::table('short')->get();
                            @endphp
                            <div class="form-group">
                                <select name="price" class="form-select">
                                    @foreach($sorts as $item)
                                    <option value="{!! $item->id !!}">@if($locale =='en')
                                            {!! $item->title_eng !!}
                                        @else
                                            {!! $item->title !!}
                                        @endif</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-primary" >@lang('mega.Search')</button>
                            </div>
                        {{ Form::close() }}

                        <p style="margin: 10px 0px 0px 0px; padding: 0px;">
                            @if($locale =='en')
                                <span style="color: red;">**Note៖</span> Price may differ by market
                            @else
                                <span style="color: red;">**បញ្ជាក់៖</span> តម្លៃប្រែប្រួលទៅតាមទីផ្សារ
                            @endif

                        </p>

                    </div>

                    <div class="ad-product_grid">
                        <?/* product grid */?>
                        <div class="row g-3">
                            @foreach($products as $item)
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
                                                            class="fas fa-envelope-open-text"></i> @lang('mega.enquiry')</a>
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

                        <?/*pagination*/?>
                        <div class="ad-product_grid_pagination">
                            {{--<nav aria-label="...">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <span class="page-link"><i class="fas fa-chevron-left"></i></span>
                                    </li>
                                    <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item ">
                                        <span class="page-link">2</span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>--}}
                            {!! $products->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </section>


    </div>

@endsection
