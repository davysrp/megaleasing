@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.productphotos.management') . ' | ' . trans('labels.backend.productphotos.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.productphotos.management') }}
        <small>{{ trans('labels.backend.productphotos.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.productphotos.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-productphoto']) }}

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.productphotos.create') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.productphotos.partials.productphotos-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('title', trans('validation.attributes.backend.pages.title'), ['class' => 'col-lg-2 control-label required']) }}

                <div class="col-lg-10">
                    {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.pages.title'), 'required' => 'required']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->
            <div class="form-group">
                {{-- Including Form blade file --}}

                <div class="form-group">
                    {{ Form::label('photo', trans('validation.attributes.backend.blogs.image'), ['class' => 'col-lg-2 control-label required']) }}
                    <div class="col-lg-8">
                        <div class="input-group">
<span class="input-group-btn">
 <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
   <i class="fa fa-picture-o"></i> Choose
 </a>
</span>

                            {{ Form::text('photo', null, ['class' => 'form-control box-size ','id'=>'thumbnail', 'placeholder' => trans('validation.attributes.backend.blogs.image')]) }}
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:300px;"></div>
                    </div>
                </div>
                {{ Form::hidden('product_id',$id, ['class' => 'form-control box-size']) }}

                <div class="edit-form-btn">
                    {{ link_to_route('admin.productphotos.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']) }}
                    <div class="clearfix"></div>
                </div><!--edit-form-btn-->
            </div><!-- form-group -->
        </div><!--box-body-->
    </div><!--box box-success-->
    {{ Form::close() }}



    @php

        $photos=\App\Models\ProductPhoto\ProductPhoto::where('product_id',$id)->get()


    @endphp
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Photo</h3>


        </div><!--box-header with-border-->

        <div class="box-body">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Photo</th>
                    <th>Action#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($photos as $item)
                    <tr>
                        <td>{!! $item->title !!}</td>
                        <td class="text-center">
                            <img src="{!! asset($item->photo) !!}" style="width: 5%">
                        </td>
                        <td>
                            <a href="{!! route('admin.productphotos.destroy',$item->id) !!}"
                               class="btn btn-flat btn-default" data-method="delete"
                               data-trans-button-cancel="{!! trans('buttons.general.cancel') !!}"
                               data-trans-button-confirm="{!! trans('buttons.general.crud.delete') !!}"
                               data-trans-title="{!! trans('strings.backend.general.are_you_sure') !!}">
                                <i data-toggle="tooltip" data-placement="top" title="Delete" class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>



@endsection
@section("after-scripts")
    <script src="{!! asset('site/vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js') !!}"></script>

 <script type="text/javascript">
        var domain='{!! route('frontend.index') !!}/filemanager';
        $('#lfm').filemanager('image',{prefix:domain});
    </script>

@endsection