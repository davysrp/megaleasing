<div class="box-body">
    <div class="form-group">
        {{ Form::label('title', trans('validation.attributes.backend.pages.title'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.pages.title'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('icons', "Icons", ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('icons', null, ['class' => 'form-control box-size', 'placeholder' =>"Icon", 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('feature_photo', trans('validation.attributes.backend.blogs.image'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-8">
            <div class="input-group">
<span class="input-group-btn">
 <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
   <i class="fa fa-picture-o"></i> Choose
 </a>
</span>

                {{ Form::text('feature_photo', null, ['class' => 'form-control box-size ','id'=>'thumbnail', 'placeholder' => trans('validation.attributes.backend.blogs.image')]) }}
            </div>
            <div id="holder" style="margin-top:15px;max-height:300px;"></div>
        </div>
    </div>




    <div class="form-group">
        {{ Form::label('description', trans('validation.attributes.backend.pages.description'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::textarea('description', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.pages.description')]) }}
        </div><!--col-lg-3-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('seo_title', trans('validation.attributes.backend.pages.seo_title'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('seo_title', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.pages.seo_title')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('seo_keyword', trans('validation.attributes.backend.pages.seo_keyword'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('seo_keyword', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.pages.seo_keyword')]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('seo_description', trans('validation.attributes.backend.pages.seo_description'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('seo_description', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.pages.seo_description')]) }}
        </div><!--col-lg-3-->
    </div><!--form control-->
    @section("after-scripts")
        <script src="{!! asset('site/vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js') !!}"></script>

        <script type="text/javascript">
            $('#lfm').filemanager('image');
        </script>

        <!-- CKEditor init -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
        <script>
            var route_prefix = "/filemanager";
            $('textarea[name=description]').ckeditor({
                filebrowserImageBrowseUrl: route_prefix + '?type=Images',
                filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
                filebrowserBrowseUrl: route_prefix + '?type=Files',
                filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
            });
        </script>
@endsection