@extends('frontend.layouts.app')

@section('content')


        <div class="container mb-3">
            <div class="col-md-6 offset-md-3 mt-5" >

                <div class="card panel-default">
                    <div class="card-header">Mega Leasing PLC Administration</div>

                    <div class="card-body">

                        <div class="text-center" style="margin: 0 auto">
                            <img src="{!! asset('megaleasing/assets/images/megaleasing-logo-landscape.png') !!}" style="width: 50%">
                        </div>
                        <Br>

                            {{ Form::open(['route' => 'frontend.auth.login', 'class' => 'form-horizontal']) }}

                            <div class="form-group">
                                {{ Form::label('email', trans('validation.attributes.frontend.register-user.email'), ['class' => 'col-md-4 control-label']) }}
                                <div class="col-md-12">
                                    {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
                                </div><!--col-md-6-->
                            </div><!--form-group-->

                            <div class="form-group">
                                {{ Form::label('password', trans('validation.attributes.frontend.register-user.password'), ['class' => 'col-md-4 control-label']) }}
                                <div class="col-md-12">
                                    {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.password')]) }}
                                </div><!--col-md-6-->
                            </div><!--form-group-->

                            {{--<div class="form-group">
                                <div class="col-md-12 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            {{ Form::checkbox('remember') }} {{ trans('labels.frontend.auth.remember_me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>--}}

                            <div class="form-group mt-3">
                                <div class="col-md-6 col-md-offset-4">
                                    {{ Form::submit(trans('labels.frontend.auth.login_button'), ['class' => 'btn btn-primary', 'style' => 'margin-right:15px']) }}
                                </div><!--col-md-6-->
                            </div><!--form-group-->

                            {{ Form::close() }}

                            <div class="row text-center">

                            </div>
                    </div><!-- panel body -->

                </div><!-- panel -->

            </div><!-- col-md-8 -->
        </div>

@endsection