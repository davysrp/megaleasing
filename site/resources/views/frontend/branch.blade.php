<?php $locale = App::getLocale();?>
@extends('frontend.layouts.app')
@section('content')
    <?php /*senction branch*/

    $branchs = \App\Models\Branch\Branch::all();
    ?>
    <div class="ad-page-banner" style="background-image: url({!! asset('megaleasing/assets/images/banner-bg.jpg') !!});">
        <div class="container">
            <div class="ad-page-banner_inner">
                <h1 class="title">{!! $page->title !!}</h1>
                <div class="ad-breadcrumbs">
                    <ul>
                        <li><a href="index.php">@lang('mega.home')</a></li>
                        ->
                        <li><span>{!! $page->title !!}</span></li>
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
                            <div class="ad-content-item_thumb">
                                <img src="{!! asset($page->feature_photo) !!}" class="img-fill" alt="{!! $page->title !!}" srcset="" loading="lazy">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="ad-content-item_text">

                                <div class="content">

                                    <ul class="branch-list">
                                        @foreach($branchs as $item)
                                            <li>
                                                <a href="{!! route('frontend.pagemenu2',['id'=>$item->id,'parent'=>\Illuminate\Support\Str::slug($page->title_eng),'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}"><i
                                                            class="fal fa-map-marker-check"></i>
                                                    @if($locale =='en')
                                                        {!! $item->title_eng !!}
                                                    @else
                                                        {!! $item->title !!}
                                                    @endif
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </section>



    </div>



@endsection
