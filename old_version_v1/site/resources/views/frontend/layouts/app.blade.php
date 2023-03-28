@php
    use Illuminate\Support\Facades\Route;
$locale = App::getLocale();
@endphp
        <!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name())</title>
    <link rel="shortcut icon" type="image/jpg" href="{!! asset('megaleasing/assets/images/megaleasing-icon.png') !!}"/>
    <!-- Meta -->
    <meta name="description" content="@yield('meta_description', 'AdminPanel')">
    <meta name="author" content="@yield('meta_author', 'DAVY DORN')">
    <meta name="keywords" content="@yield('meta_keywords', 'AdminPanel')">
@yield('meta')

<!-- Styles -->
@yield('before-styles')

<!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    @langrtl
    {{ Html::style(getRtlCss(mix('css/frontend.css'))) }}
    @else
        {{--        {{ Html::style(mix('css/frontend.css')) }}--}}
        @endlangrtl

        {!! Html::style('js/select2/select2.min.css') !!}
        @yield('after-styles')

    <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <?php
        if (!empty($google_analytics)) {
            echo $google_analytics;
        }
        ?>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content=""/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{!! asset('megaleasing/assets/fonts/font-awesome-pro-master/css/all.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('megaleasing/assets/css/swiper-bundle.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('megaleasing/assets/css/main.css') !!}" rel="stylesheet">
        <script src="{!! asset('megaleasing/assets/js/jquery.js') !!}"></script>

        <?php
        $setting = \App\Models\Settings\Setting::find(1);
        echo $setting->google_analytics;
        ?>


        @if($locale !='en')
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Content&family=Source+Sans+Pro&display=swap');

                body {
                    font-family: 'Content';
                    font-size: 15px;
                }
            </style>

        @endif

</head>
<body id="app-layout">

<?php
$pages = \App\Models\PageMenu\PageMenu::all();
$pro = \App\Models\PageMenu\PageMenu::find(20);

$report = \App\Models\PageMenu\PageMenu::find(22);
$sub_report = \App\Models\Report\Report::find(1);

$news = \App\Models\PageMenu\PageMenu::find(21);
$sub_news = \App\Models\News\News::find(13);
$setting = \App\Models\Settings\Setting::find(1);

$application = \App\Models\Explore\Explore::find(1);
$contact = \App\Models\Explore\Explore::find(4);
$feedback = \App\Models\Explore\Explore::find(2);
?>
<header class="ad-main-navbar" id="ad-main-navbar">

    <div class="ad-h-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="ad-h-top-left">
                        <ul class="ad-h-top-nav">


                            <li> <a href="{!!  route('frontend.calculate-interest')  !!}"> @lang('mega.calculate')</a></li>

                            <li>
                                <a href="{!! route('frontend.pagemenu2',['id'=>$sub_report->id,'parent'=>\Illuminate\Support\Str::slug($report->slug),'slug'=>\Illuminate\Support\Str::slug($sub_report->slug)]) !!}">@if($locale =='en')
                                        {!! $report->title_eng !!}
                                    @else
                                        {!! $report->title !!}
                                    @endif</a></li>
                            <li>
                                <a href="{!! route('frontend.explore',['id'=>$feedback->id,'slug'=>\Illuminate\Support\Str::slug($feedback->title_eng)]) !!}">
                                    @if($locale =='en')
                                        {!!  $feedback->title_eng !!}
                                    @else
                                        {!!  $feedback->title !!}
                                    @endif</a></li>
                            <li>
                                <a href="{!! route('frontend.explore',['id'=>$contact->id,'slug'=>\Illuminate\Support\Str::slug($contact->title_eng)]) !!}">
                                    @if($locale =='en')
                                        {!!  $contact->title_eng !!}
                                    @else
                                        {!!  $contact->title !!}
                                    @endif</a></li>

                        </ul>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="ad-h-top-right">
                        <ul class="ad-h-top-nav">
                            <li>
                                <a href="{!! $setting->facebook !!}" class="ad-social-item"><i
                                            class="fab fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="{!! $setting->instagram !!}" class="ad-social-item"><i
                                            class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="{!! $setting->youtube !!}" class="ad-social-item"><i
                                            class="fab fa-youtube"></i></a>
                            </li>
                            <li>
                                <a href="{!! $setting->telegram !!}" class="ad-social-item"><i
                                            class="fab fa-telegram-plane"></i></a>
                            </li>
                            <li>
                                <a href="{!! $setting->linkedin !!}" class="ad-social-item"><i
                                            class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li>
                                <a href="{!! $setting->twitter !!}" class="ad-social-item"><i
                                            class="fab fa-twitter"></i></a>
                            </li>

                            <li>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                       data-bs-toggle="dropdown">
                                        <i class="far fa-language"></i> English
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach (array_keys(config('locale.languages')) as $lang)
                                            <li><a class="dropdown-item"
                                                   href="{!! url('lang/'.$lang)!!}">{{ trans('menus.language-picker.langs.'.$lang)  }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ad-h-center">
        <div class="container">

            <div class="ad-h-center-row">

                <?php /* mobile navbar */ ?>
                <div class="ad-navbar-button">
                    <a class="" data-bs-toggle="offcanvas" href="#offcanvasnvbar" role="button">
                        <i class="fal fa-bars"></i>
                    </a>
                </div>

                <div class="ad-logo">
                    <a href="{!! route('frontend.index') !!}">
                        <img src="{!! asset('megaleasing/assets/images/megaleasing-logo-landscape.png') !!}"
                             alt="Home | Mega Leasing PLC"
                             title="Home | Mega Leasing PLC">
                    </a>
                </div>

                <div class="ad-h-center-right">
                    <ul>
                        <li>
                            <div class="ad-d-search">
                                {{ Form::open(['route' => 'frontend.search_product_by_key', 'class' => 'd-flex ad-h-search', 'role' => 'form', 'method' => 'get', 'id' => 'create-explore']) }}

                                <input class="form-control me-2 t-search" type="search" name="t-search"
                                       placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit"><i class="far fa-search"></i>
                                </button>
                                {{ Form::close() }}
                            </div>
                            <div class="ad-mb-search">
                                <a class="btn-search" data-bs-toggle="offcanvas" href="#offcanvassearch"
                                   role="button"><i class="far fa-search"></i></a>
                            </div>

                            <div class="offcanvas offcanvas-end offcanvas-search" tabindex="-1" id="offcanvassearch"
                                 aria-labelledby="offcanvassearch">
                                <div class="offcanvas-header">
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <form class="d-flex ad-h-search" action="" method="get">
                                        <input class="form-control me-2 t-search" type="search" name="t-search"
                                               placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit"><i
                                                    class="far fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="{!! route('frontend.explore',['id'=>$application->id,'slug'=>\Illuminate\Support\Str::slug($application->title_eng)]) !!}"
                               class="btn-primary"><i class="far fa-comment-alt"></i>
                                <span>@if($locale =='en')
                                        {!!  $application->title_eng !!}
                                    @else
                                        {!!  $application->title !!}
                                    @endif</span></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="ad-h-bottom">
        <div class="container">
            <nav class="ad-navbar">
                <ul>

                    @foreach($pages as $item)


                        @if($item->sub=='1')
                            <?php
                            $items = '';
                            if ($item->id == 17) {
                                $items = \App\Models\About\About::all();
                            } elseif ($item->id == 18) {
                                $items = \App\Models\Branch\Branch::all();
                            } elseif ($item->id == 19) {
                                $items = \App\Models\Product\Product::where('parent_id', null)->get();
                            } elseif ($item->id == 21) {
                                $items = \App\Models\News\News::all();
                            } elseif ($item->id == 22) {
                                $items = \App\Models\Report\Report::where('parent_id',null)->get();
                            } elseif ($item->id == 23) {
                                $items = \App\Models\Career\Career::all();
                            }
                            ?>




                            @if($item->id == 18)
                                <li class="has-submenu has-megamenu">
                                    <a href="javascript:void(0)">@if($locale =='en')
                                            {!! $item->title_eng !!}
                                        @else
                                            {!! $item->title !!}
                                        @endif </a>
                                    <span class="arrow"><i class="far fa-chevron-down"></i></span>
                                    <ul class="ad-sub-menu ad-sub-menu-mega">
                                        <li class="ad-sub-menu-mega_column">
                                            <ul>
                                                @php
                                                    $x=1;
                                                @endphp
                                                @foreach($items as $menu)


                                                    <li>
                                                        <a href="{!! route('frontend.pagemenu2',['id'=>$menu->id,'parent'=>\Illuminate\Support\Str::slug($item->slug),'slug'=>\Illuminate\Support\Str::slug($menu->title_eng)]) !!}">
                                                            @if($locale =='en')
                                                                {!! $menu->title_eng !!}
                                                            @else
                                                                {!! $menu->title !!}
                                                            @endif</a></li>

                                                    @if($x%5==0)
                                            </ul>
                                        </li>
                                        <li class="ad-sub-menu-mega_column">
                                            <ul>
                                                @endif
                                                @php
                                                    $x++;
                                                @endphp
                                                @endforeach
                                            </ul>
                                        </li>


                                    </ul>
                                </li>
                            @else
                                <li class="has-submenu">
                                    <a href="javascript:void(0)">
                                        @if($locale =='en')
                                            {!! $item->title_eng !!}
                                        @else
                                            {!! $item->title !!}
                                        @endif </a>
                                    <span class="arrow"><i class="far fa-chevron-down"></i></span>
                                    <ul class="ad-sub-menu">
                                        @foreach($items as $menu)
                                            <li>
                                                <a href="{!! route('frontend.pagemenu2',['id'=>$menu->id,'parent'=>\Illuminate\Support\Str::slug($item->slug),'slug'=>\Illuminate\Support\Str::slug($menu->title_eng)]) !!}">
                                                    @if($locale =='en')
                                                        {!! $menu->title_eng !!}
                                                    @else
                                                        {!! $menu->title !!}
                                                    @endif</a></li>
                                        @endforeach

                                    </ul>
                                </li>
                            @endif


                        @else
                            <li>
                                <a href="{!! route('frontend.pagemenu1',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->slug)]) !!}"
                                   class="">
                                    @if($locale =='en')
                                        {!! $item->title_eng !!}
                                    @else
                                        {!! $item->title !!}
                                    @endif
                                </a>
                            </li>
                        @endif
                    @endforeach

                </ul>
            </nav>
        </div>
    </div>

    <?php /* mobile navbar panel */ ?>
    <div class="ad-mb-offcanvas offcanvas offcanvas-start" tabindex="-1" id="offcanvasnvbar">
        <div class="offcanvas-header">
            <a href="javascript:" class="ad-btn-close text-reset" data-bs-dismiss="offcanvas"><i
                        class="fal fa-times"></i></a>
        </div>
        <div class="offcanvas-body">
            <nav class="ad-mb-navbar" id="ad-mb-navbar">
                <ul>

                    @foreach($pages as $item)


                        @if($item->sub=='1')
                            <?php
                            $items = '';
                            if ($item->id == 17) {
                                $items = \App\Models\About\About::all();
                            } elseif ($item->id == 18) {
                                $items = \App\Models\Branch\Branch::all();
                            } elseif ($item->id == 19) {
                                $items = \App\Models\Product\Product::where('parent_id', null)->get();
                            } elseif ($item->id == 21) {
                                $items = \App\Models\News\News::all();
                            } elseif ($item->id == 22) {
                                $items = \App\Models\Report\Report::all();
                            } elseif ($item->id == 23) {
                                $items = \App\Models\Career\Career::all();
                            }
                            ?>
                            <li class="has-submenu">
                                {{--                                {!! route('frontend.pagemenu1',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->slug)]) !!}--}}
                                <a href="javascript:void(0)">
                                    @if($locale =='en')
                                        {!! $item->title_eng !!}
                                    @else
                                        {!! $item->title !!}
                                    @endif</a>
                                <span class="arrow"><i class="far fa-chevron-down"></i></span>
                                <ul class="ad-sub-menu">
                                    @foreach($items as $menu)
                                        <li>
                                            <a href="{!! route('frontend.pagemenu2',['id'=>$menu->id,'parent'=>\Illuminate\Support\Str::slug($item->slug),'slug'=>\Illuminate\Support\Str::slug($menu->title_eng)]) !!}">
                                                @if($locale =='en')
                                                    {!! $menu->title_eng !!}
                                                @else
                                                    {!! $menu->title !!}
                                                @endif</a></li>
                                    @endforeach

                                </ul>
                            </li>
                        @else
                            <li>
                                <a href="{!! route('frontend.pagemenu1',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->slug)]) !!}"
                                   class="">
                                    @if($locale =='en')
                                        {!! $item->title_eng !!}
                                    @else
                                        {!! $item->title !!}
                                    @endif
                                </a>
                            </li>
                        @endif
                    @endforeach

                </ul>
            </nav>

        </div>
    </div>

</header>


@yield('content')

<footer class="ad-main-footer">
    <div class="container">
        <div class="ad-footer-content">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="ad-footer_item">
                        <h4 class="title">@lang('mega.contactus')</h4>
                        <div class="content">

                            <p><strong>@lang('mega.call') :</strong> {!! $setting->company_contact !!}</p>
                            <p><strong>@lang('mega.email') :</strong> {!! $setting->from_email !!}</p>
                            <p><strong>@lang('mega.address') :</strong>
                                @if($locale =='en')
                                    {!! $setting->company_address_eng !!}
                                @else
                                    {!! $setting->company_address !!}
                                @endif
                            </p>
                            <p><strong>@lang('mega.open') :</strong> @if($locale =='en')
                                    {!! $setting->work_time_eng !!}
                                @else
                                    {!! $setting->work_time !!}
                                @endif</p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-6">
                    <div class="ad-footer_item">
                        <h4 class="title"> @lang('mega.Products_Services')</h4>
                        <div class="content">
                            <?php

                            $services = \App\Models\Product\Product::where('parent_id', null)->get();
                            $parent = \App\Models\PageMenu\PageMenu::find(19);
                            ?>
                            <ul>
                                @foreach($services as $item)
                                    <li>
                                        <a href="{!! route('frontend.pagemenu2',['id'=>$item->id,'parent'=>\Illuminate\Support\Str::slug($parent->slug),'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}">
                                            @if($locale =='en')
                                                {!! $item->title_eng !!}
                                            @else
                                                {!! $item->title !!}
                                            @endif</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-6">

                    <div class="ad-footer_item">
                        <h4 class="title">@lang('mega.Explore')</h4>
                        <div class="content">
                            <ul>

                                @php
                                    $explore=\App\Models\Explore\Explore::all();

                                @endphp
                                @foreach($explore as $item)
                                    <li>
                                        <a href="{!! route('frontend.explore',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}">  @if($locale =='en')
                                                {!! $item->title_eng !!}
                                            @else
                                                {!! $item->title !!}
                                            @endif</a></li>
                                @endforeach
                                {{--  <li><a href="{!! route('frontend.onlineapplication') !!}">@if($locale =='en')
                                              Online Application
                                          @else
                                              កម្មវិធីអនឡាញ
                                          @endif</a></li>
                                  <li><a href="#">Customer Feedback</a></li>
                                  <li><a href="#">FAQ</a></li>
                                  <li><a href="#">@lang('mega.contactus')</a></li>--}}
                            </ul>
                        </div>
                    </div>

                    <div class="ad-footer_item">
                        <h4 class="title">Follow Us</h4>
                        <div class="content">
                            <ul class="ad-social">
                                <li>
                                    <a href="{!! $setting->facebook !!}" class="ad-social-item"><i
                                                class="fab fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="{!! $setting->instagram !!}" class="ad-social-item"><i
                                                class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="{!! $setting->youtube !!}" class="ad-social-item"><i
                                                class="fab fa-youtube"></i></a>
                                </li>
                                <li>
                                    <a href="{!! $setting->telegram !!}" class="ad-social-item"><i
                                                class="fab fa-telegram-plane"></i></a>
                                </li>
                                <li>
                                    <a href="{!! $setting->linkedin !!}" class="ad-social-item"><i
                                                class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li>
                                    <a href="{!! $setting->twitter !!}" class="ad-social-item"><i
                                                class="fab fa-twitter"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="ad-footer_item">
                        <h4 class="title">Newsletter</h4>
                        <div class="content">
                            <p>Sign up to our email newsletter to receive our latest news and offers:</p>
                            {{ Form::open(['route' => 'frontend.subscribe', 'class' => 'd-flex ad-h-search ad-newsletter', 'role' => 'form', 'method' => 'get', 'id' => 'create-explore']) }}

                            <input class="form-control me-2 t-search" type="email" name="t-email"
                                   placeholder="Email address" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit"><i class="far fa-paper-plane"></i>
                            </button>
                            {{ Form::close() }}
                            <p class="t-small">© 2019 Mega Leasing Plc - All Rights Reserved. Website Designed by <a
                                        href="https://angkordesign.com" target="_blank">Angkor Design</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>


<!-- Site script -->
<!-- <script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="{!! asset('megaleasing/assets/js/swiper-bundle.min.js') !!}"></script>
<script src="{!! asset('megaleasing/assets/js/fslightbox.js') !!}"></script>
<script src="{!! asset('megaleasing/assets/js/main.js') !!}"></script>


</body>
</html>
