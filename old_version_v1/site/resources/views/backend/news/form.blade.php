<div class="box-body">
    <div class="form-group">
        {{ Form::label('title', trans('validation.attributes.backend.pages.title'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.pages.title'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('title_eng', 'Title Eng', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('title_eng', null, ['class' => 'form-control box-size', 'placeholder' => 'Title Eng', 'required' => 'required']) }}
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
            <img id="holder" style="margin-top:15px;max-height:100px;">
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('description', "Description", ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('description', null,['class' => 'form-control', 'placeholder' => "Description"]) }}
        </div><!--col-lg-3-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('description_eng', "Description", ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('description_eng', null,['class' => 'form-control', 'placeholder' => "Description Eng"]) }}
        </div><!--col-lg-3-->
    </div><!--form control-->
</div><!--box-body-->

@section("after-scripts")
    <script src="{!! asset('site/vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js') !!}"></script>

 <script type="text/javascript">
        var domain='{!! route('frontend.index') !!}/filemanager';
        $('#lfm').filemanager('image',{prefix:domain});
    </script>
    <!-- CKEditor init -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script>
        var route_prefix = '{!! route('frontend.index') !!}/filemanager';
        $('textarea[name=description]').ckeditor({
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
        });
        $('textarea[name=description_eng]').ckeditor({
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
        });
    </script>
@endsection