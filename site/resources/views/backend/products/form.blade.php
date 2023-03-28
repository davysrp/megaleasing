@php
    $parent=\App\Models\Product\Product::where('parent_id',null)->pluck('title_eng','id')->toArray();

@endphp
<div class="box-body">
    <div class="form-group">
        {{ Form::label('title', trans('validation.attributes.backend.pages.title'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.pages.title'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('title_eng', "Title Eng", ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('title_eng', null, ['class' => 'form-control box-size', 'placeholder' =>"Title Eng", 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('parent_id', "Category", ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::select('parent_id', $parent,null, ['class' => 'form-control box-size', 'placeholder' =>"Category"]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('price', "Price", ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('price', null, ['class' => 'form-control box-size', 'placeholder' =>"Price", 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('payment', "Monthly Payment", ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('payment', null, ['class' => 'form-control box-size', 'placeholder' =>"Monthly Payment", 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('interest_rate', "Interest rate", ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('interest_rate', null, ['class' => 'form-control box-size', 'placeholder' =>"Interest rate (%)", 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('max_installment_period', "Max Installment Period", ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('max_installment_period', null, ['class' => 'form-control box-size', 'placeholder' =>"Max Installment Period(Year)", 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('feature_photo', trans('validation.attributes.backend.blogs.image'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-8">
            <div class="input-group">
<span class="input-group-btn">
 <a  data-input="thumbnail" data-preview="holder" class="btn btn-primary lfm1">
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
        {{ Form::label('description_eng', 'Description Eng', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::textarea('description_eng', null,['class' => 'form-control', 'placeholder' => 'Description']) }}
        </div><!--col-lg-3-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('documents', 'Required documents', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::textarea('documents', null,['class' => 'form-control', 'placeholder' => 'Required documents']) }}
        </div><!--col-lg-3-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('documents_eng', 'Required documents', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::textarea('documents_eng', null,['class' => 'form-control', 'placeholder' => 'Required documents Eng']) }}
        </div><!--col-lg-3-->
    </div><!--form control-->


{{--    <div class="form-group">
        {{ Form::label('promotion', 'Promotion', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::textarea('promotion', null,['class' => 'form-control', 'placeholder' => 'Promotion']) }}
        </div><!--col-lg-3-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('promotion_eng', 'Promotions Eng', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::textarea('promotion_eng', null,['class' => 'form-control', 'placeholder' => 'Promotions Eng']) }}
        </div><!--col-lg-3-->
    </div><!--form control-->--}}

    <div class="form-group">
        {{ Form::label('payment_term', 'Payment Term', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::textarea('payment_term', null,['class' => 'form-control', 'placeholder' => 'Payment Term']) }}
        </div><!--col-lg-3-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('payment_term_eng', 'Payment Term Eng', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::textarea('payment_term_eng', null,['class' => 'form-control', 'placeholder' => 'Payment Term Eng']) }}
        </div><!--col-lg-3-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('promotion_photo', 'Promotion Photo', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-8">
            <div class="input-group">
<span class="input-group-btn">
 <a  data-input="thumbnail-promotion" data-preview="holder-promotion" class="btn btn-primary lfm1">
   <i class="fa fa-picture-o"></i> Choose
 </a>
</span>

                {{ Form::text('promotion_photo', null, ['class' => 'form-control box-size ','id'=>'thumbnail-promotion', 'placeholder' =>'Promotion Photo']) }}
            </div>
            <div id="holder-promotion" style="margin-top:15px;max-height:300px;"></div>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('promotion_status', 'Show/Hide Promotion', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            <div class="control-group">
                <label class="control control--checkbox">
                    @if(isset($product->status) && !empty ($product->status))
                        {{ Form::checkbox('promotion_status', 1, true) }}
                    @else
                        {{ Form::checkbox('promotion_status', 1, false) }}
                    @endif
                    <div class="control__indicator"></div>
                </label>
            </div>
        </div><!--col-lg-3-->
    </div>


    @section("after-scripts")
        <script src="{!! asset('site/vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js') !!}"></script>

        <script type="text/javascript">
            var domain='{!! route('frontend.index') !!}/filemanager';
            // $('#lfm').filemanager('image',{prefix:domain});

            $('[class*="lfm1"]').each(function () {
                $(this).filemanager('image', {prefix: domain});
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
