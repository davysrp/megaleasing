<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', trans('validation.attributes.backend.clients.table.name'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.clients.table.name'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->



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
            <img id="holder" style="margin-top:15px;max-height:100px;">
        </div>
    </div>



</div>

@section("after-scripts")
    <script src="{!! asset('site/vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js') !!}"></script>

    <script type="text/javascript">
        $('#lfm').filemanager('image');
    </script>

@endsection