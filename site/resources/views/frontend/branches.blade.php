<?php $locale = App::getLocale();?>
@extends('frontend.layouts.app')
@section('content')
    <?php /*senction branch*/

    $branch = \App\Models\PageMenu\PageMenu::find(18);
    $branchs = \App\Models\Branch\Branch::all();
    ?>
    <div class="ad-page-banner"
         style="background-image: url({!! asset('megaleasing/assets/images/banner-bg.jpg') !!});">
        <div class="container">
            <div class="ad-page-banner_inner">
                <h1 class="title">@if($locale =='en')
                        Branch Network
                    @else
                        បណ្តាញសាខា
                    @endif</h1>

                <div class="ad-breadcrumbs">
                    <ul>
                        <li><a href="index.php">@lang('mega.home')</a></li>
                        ->
                        <li><span>
                           @if($locale =='en')
                                    Branch Network
                                @else
                                    បណ្តាញសាខា
                                @endif
                        </span></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <section class="pt-6 pb-6 ">
        <div class="container">
            <div class="ad-content-item">

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="ad-content-item_thumb">
                            <img src="{!! $branch->feature_photo !!}" class="img-fill" alt="{!! $branch->title_eng !!}" title="{!! $branch->title_eng !!}" srcset="" loading="lazy">
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="ad-content-item_text">

                            <div class="content">
                                <ul class="branch-list branch-list-signle">
                                    @foreach($branchs as $item)
                                        <li>
                                            <a href="{!! route('frontend.pagemenu2',['id'=>$item->id,'parent'=>\Illuminate\Support\Str::slug($branch->title_eng),'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}"><i
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
        </div>
    </section>
@endsection
