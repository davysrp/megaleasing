<?php $locale = App::getLocale();?>
@extends('frontend.layouts.app')
@section('content')
    <div class="ad-page-banner"
         style="background-image: url('{!! asset('megaleasing/assets/images/banner-bg.jpg') !!}');">
        <div class="container">
            <div class="ad-page-banner_inner">
                <h1 class="title">@if($locale =='en')
                        {!! $page->title_eng !!}
                    @else
                        {!! $page->title !!}
                    @endif</h1>
                <div class="ad-breadcrumbs">
                    <ul>
                        <li><a href="index.php">@lang('mega.home')</a></li>
                        ->
                        <li><span>@if($locale =='en')
                                    {!! $page->title_eng !!}
                                @else
                                    {!! $page->title !!}
                                @endif</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="ad-page-section section-bg">


        <?php /*senction branch*/

        $i=1;
        ?>
        <section class="pt-6 pb-6 ">
            <div class="container">

                <div class="ad-s-news ad-s-page-promotion">
                    <div class="row g-3">
                        @foreach($promotions as $item)
                            <article class="col-md-4">
                                <div class="ad-s-news_item">

                                    <div class="thumb">
                                        <a href="{!! route('frontend.report',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}">
                                            <img src="{!! $item->feature_photo !!}" class="img-fill" alt="{!! $item->title_eng !!}" title="{!! $item->title_eng !!}" srcset=""
                                                 loading="lazy">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <div class="date"><i class="far fa-calendar-alt"></i>{!! \Carbon\Carbon::parse($item->promotion_date)->format('d, M Y') !!}</div>
                                        <a href="{!! route('frontend.report',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}">
                                            <h3 class="title">
                                                @if($locale =='en')
                                                    {!! $item->title_eng !!}
                                                @else
                                                    {!! $item->title !!}
                                                @endif</h3>
                                        </a>
                                        <a href="{!! route('frontend.report',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}" class="btn-secondary">@lang('mega.readmore')  <i
                                                    class="fas fa-chevron-circle-right"></i></a>
                                    </div>

                                </div>
                            </article>

                            {{-- @if($i%3==0)
                         </div>
                                     <div class="row g-3">
                                 @endif--}}


                            <?php $i++; ?>
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
                        {!! $promotions->links() !!}
                    </div>

                </div>

            </div>
        </section>


    </div>
@endsection