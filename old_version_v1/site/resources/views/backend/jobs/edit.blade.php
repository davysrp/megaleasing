@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.jobs.management') . ' | ' . trans('labels.backend.jobs.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.jobs.management') }}
        <small>{{ trans('labels.backend.jobs.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($jobs, ['route' => ['admin.jobs.update', $jobs], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-job']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.jobs.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.jobs.partials.jobs-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.jobs.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.jobs.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
