<div class="box-body">
    <div class="form-group">
        {{ Form::label('title','Title', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' =>'Title', 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('description', 'Description', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::textarea('description', null, ['class' => 'form-control box-size', 'placeholder' =>'Description', 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->



    <div class="form-group">
        {{ Form::label('photo', '"Photo"', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-8">
            <div class="input-group">
   <span class="input-group-btn">
     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> Choose
     </a>
   </span>

                {{ Form::text('photo', null, ['class' => 'form-control box-size ','id'=>'thumbnail', 'placeholder' => "Photo"]) }}
            </div>
            <img id="holder" style="margin-top:15px;max-height:100px;">
        </div>
    </div>




</div><!--box-body-->
@section("after-scripts")
    <script src="{!! asset('site/vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js') !!}"></script>

    <script type="text/javascript">
         var domain='{!! route('frontend.index') !!}/filemanager';
        $('#lfm').filemanager('image',{prefix:domain});
    </script>

@endsection