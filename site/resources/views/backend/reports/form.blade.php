@php
    $parent=\App\Models\Report\Report::where('parent_id',null)->pluck('title_eng','id')->toArray();

@endphp
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
        {{ Form::label('parent_id', "Category", ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::select('parent_id', $parent,null, ['class' => 'form-control box-size', 'placeholder' =>"Category"]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('feature_photo',' Feature Photo Eng', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-8">
            <div class="input-group">
               <span class="input-group-btn">
                 <a data-input="thumbnail" data-preview="holder" class="btn btn-primary lfm1">
                   <i class="fa fa-picture-o"></i> Choose
                 </a>
               </span>
                {{ Form::text('feature_photo', null, ['class' => 'form-control box-size ','id'=>'thumbnail', 'placeholder' => 'Feature Photo Eng']) }}
            </div>
            <img id="holder" style="margin-top:15px;max-height:100px;">
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('feature_photo_kh',' Feature Photo KH', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-8">
            <div class="input-group">
               <span class="input-group-btn">
                 <a data-input="thumbnail-featureKH" data-preview="holder-featureKH" class="btn btn-primary lfm1">
                   <i class="fa fa-picture-o"></i> Choose
                 </a>
               </span>
                {{ Form::text('feature_photo_kh', null, ['class' => 'form-control box-size ','id'=>'thumbnail-featureKH', 'placeholder' => 'Feature Photo KH']) }}
            </div>
            <img id="holder-featureKH" style="margin-top:15px;max-height:100px;">
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('downloadLinkEng',' Download Link Eng', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-8">
            <div class="input-group">
               <span class="input-group-btn">
                 <a data-input="link_downloadLinkEng" data-preview="holder-downloadLinkEng" class="btn btn-primary lfm2">
                   <i class="fa fa-picture-o"></i> Choose
                 </a>
               </span>
                {{ Form::text('downloadLinkEng', null, ['class' => 'form-control box-size ','id'=>'link_downloadLinkEng', 'placeholder' => 'Download Link Eng']) }}
            </div>

        </div>
    </div>

    <div class="form-group">
        {{ Form::label('downloadLinkKh',' Download Link Kh', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-8">
            <div class="input-group">
               <span class="input-group-btn">
                 <a data-input="link_downloadLinkKh" data-preview="holder-downloadLinkKh" class="btn btn-primary lfm2">
                   <i class="fa fa-picture-o"></i> Choose
                 </a>
               </span>
                {{ Form::text('downloadLinkKh', null, ['class' => 'form-control box-size ','id'=>'link_downloadLinkKh', 'placeholder' => 'Download Link Kh']) }}
            </div>

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
        // $('#downloadEng').filemanager('image',{prefix:domain});

        $('[class*="lfm1"]').each(function () {
            $(this).filemanager('image', {prefix: domain});
        });

        $('[class*="lfm2"]').each(function () {
            $(this).filemanager("image", {prefix: domain});
        });


    </script>

    <!-- CKEditor init -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script>
        var route_prefix ='{!! route('frontend.index') !!}/filemanager';
        $('textarea').ckeditor({
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
        });
    </script>
@endsection
