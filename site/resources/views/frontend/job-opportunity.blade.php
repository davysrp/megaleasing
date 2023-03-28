<?php $locale = App::getLocale();?>
@extends('frontend.layouts.app')
@section('content')

    <div class="ad-page-banner"
         style="background-image: url({!! asset('megaleasing/assets/images/banner-bg.jpg') !!});">
        <div class="container">
            <div class="ad-page-banner_inner">
                <h1 class="title">
                    @if($locale =='en')
                        {!! $page->title_eng !!}
                    @else
                        {!! $page->title !!}
                    @endif</h1>

                <div class="ad-breadcrumbs">
                    <ul>
                        <li><a href="{!! route('frontend.index') !!}">@lang('mega.home')</a></li>
                        ->
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
    <div class="ad-page-section section-bg">

        <section class="pt-6 pb-6 ">
            <div class="container">

                <div class="ad-product-page">

                    <?/* product filter */ ?>
                    <div class="ad-product_filter clearfix">
                        {{ Form::open(['route' => 'frontend.searchjob', 'class' => 'ad-product_filter_form', 'role' => 'form', 'method' => 'get', 'id' => 'create-explore']) }}
                        <div class="form-group">
                            <label><i class="far fa-sliders-h"></i> @lang('mega.filter')</label>
                        </div>
                        <div class="form-group">
                            <select name="position" class="form-select">
                                <option value="all">@lang('mega.all')</option>
                                @foreach($positions as $item)
                                    <option value="{!! $item->id !!}">
                                        @if($locale =='en')
                                            {!! $item->title_eng !!}
                                        @else
                                            {!! $item->title !!}
                                        @endif</option>
                                @endforeach


                            </select>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<select name="province" class="form-select">--}}

                                {{--<option value="all">@lang('mega.all')</option>--}}
                                {{--@foreach($provinces as $item)--}}
                                    {{--<option value="{!! $item->id !!}">@if($locale =='en')--}}
                                            {{--{!! $item->title_eng !!}--}}
                                        {{--@else--}}
                                            {{--{!! $item->title !!}--}}
                                        {{--@endif</option>--}}
                                {{--@endforeach--}}

                            {{--</select>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <button type="submit" class="btn-primary">@lang('mega.Search')</button>
                        </div>
                        {{ Form::close() }}


                    </div>


                    <div class="ad-job-list">

                        <div class="table-responsive">
                            <table class="table-job table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10%;">
                                        {{--@lang('mega.Sector')--}}
                                        @if($locale =='en')
                                        No.
                                        @else
                                        ល.រ
                                        @endif
                                    </th>
                                    <th style="width: 30%;">@lang('mega.Position')</th>
                                    <th style="width: 10%;">@lang('mega.Open_Post')</th>
                                    <th style="width: 35%;">@lang('mega.location')</th>
                                    <th style="width: 15%;">@lang('mega.Application_Deadline')</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($jobs as $key=>$item)
                                    <tr data-href="{!! route('frontend.jobdetail',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}">
                                        <a href="{!! route('frontend.jobdetail',['id'=>$item->id,'slug'=>\Illuminate\Support\Str::slug($item->title_eng)]) !!}">
                                            <td>
                                                {!! $key + 1 !!}
                                                {{--@if($locale =='en')--}}
                                                    {{--{!! $item->title_eng !!}--}}
                                                {{--@else--}}
                                                    {{--{!! $item->title !!}--}}
                                                {{--@endif--}}
                                            </td>
                                            <td>
                                                @if($locale =='en')
                                                {!! $item->title_eng !!}
                                                @else
                                                {!! $item->title !!}
                                                @endif
                                                {{--@if($locale =='en')--}}
                                                    {{--{!! $item->position->title_eng !!}--}}
                                                {{--@else--}}
                                                    {{--{!! $item->position->title !!}--}}
                                                {{--@endif--}}
                                            </td>
                                            <td>{!! $item->post !!}</td>
                                            <td>
                                                @if($locale =='en')
                                                {!! $item->province_en !!}
                                                @else
                                                {!! $item->province_kh !!}
                                                @endif

<!--                                                @if($locale =='en')-->
<!--                                                    {!! $item->province->title_eng !!}-->
<!--                                                @else-->
<!--                                                    {!! $item->province->title !!}-->
<!--                                                @endif-->
                                            </td>
                                            <td>
                                                {!! \Carbon\Carbon::parse($item->deadline)->format('d, M Y') !!}
                                            </td>
                                        </a>
                                    </tr>
                                @endforeach


                                </tbody>

                            </table>
                        </div>

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
                        {!! $jobs->links() !!}
                    </div>

                </div>
            </div>
        </section>


    </div>



@endsection