<?php $locale = App::getLocale();?>
@extends('frontend.layouts.app')
@section('content')
    <div class="ad-page-banner"
         style="background-image: url({!! asset('megaleasing/assets/images/banner-bg.jpg') !!});">
        <div class="container">
            <div class="ad-page-banner_inner">
                <h1 class="title">Photos & Videos</h1>

                <div class="ad-breadcrumbs">
                    <ul>
                        <li><a href="index.php">@lang('mega.home')</a></li>
                        ->
                        <li><span>Photos & Videos</span></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="ad-page-section">


        <?php /*senction branch*/


        $photos = \App\Models\PhotoVideo\PhotoVideo::where('type', 'photo')->orderBy('created_at', 'DESC')->get();
        $videos = \App\Models\PhotoVideo\PhotoVideo::where('type', 'video')->orderBy('created_at', 'DESC')->get();


        ?>
        <section class="pt-6 pb-6 ">
            <div class="container">

                <div class="ad-news-page_detail">

                    <ul class="nav product_table_nav gallery_nav" id="pills-tab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-n-2" data-bs-toggle="pill"
                                    data-bs-target="#tab-panel-n-2" type="button" role="tab" aria-selected="true">
                                Photos
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="nav-tab-n-1" data-bs-toggle="pill"
                                    data-bs-target="#tab-panel-n-1" type="button" role="tab" aria-selected="false">
                                Videos
                            </button>
                        </li>

                    </ul>

                    <div class="ad-tab-content tab-content " id="pills-tabContent">

                        <div class="tab-pane active" id="tab-panel-n-2" role="tabpanel">

                            <div class="ad-gallery-grid">
                                <div class="row g-2">

                                    @foreach($photos as $item)
                                        <div class="col-6 col-lg-3 col-md-4">
                                            <a class="ad-gallery-item" data-fslightbox="gallery"
                                               href="{!! asset($item->feature_photo) !!}">
                                                <img src="{!! asset($item->feature_photo) !!}" class="img-fluid" alt=""
                                                     srcset="" loading="lazy">
                                            </a>
                                        </div>
                                    @endforeach


                                </div>
                            </div>

                        </div>

                        <div class="tab-pane " id="tab-panel-n-1" role="tabpanel">

                            <div class="ad-video-grid">
                                <div class="row g-2">
                                    @foreach($videos as $item)

                                        @if($item->link_type=='yt')
                                            <div class="col-12 col-lg-6 col-md-6">
                                                <div class="ratio ratio-16x9">
                                                    <iframe width="560" height="315"
                                                            src="https://www.youtube.com/embed/{!! $item->yt_link !!}"
                                                            title="YouTube video player" frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                            allowfullscreen loading="lazy"></iframe>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-12 col-lg-6 col-md-6">
                                                <div class="ratio ratio-16x9">
                                                    <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fweb.facebook.com%2Fmegaleasing%2Fvideos%2F{!! $item->yt_link !!}%2F&show_text=false&width=560&t=0"
                                                            width="560" height="314" style="border:none;overflow:hidden"
                                                            scrolling="no" frameborder="0" allowfullscreen
                                                            loading="lazy"
                                                    ="true" allow="
                                                    autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share
                                                    " allowFullScreen="true"></iframe>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach


                                </div>
                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </section>


    </div>

@endsection