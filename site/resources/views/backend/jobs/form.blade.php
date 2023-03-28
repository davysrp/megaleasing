@php


    $province=\App\Models\Province\Province::pluck('title_eng','id')->toArray();
    $province_kh=\App\Models\Province\Province::pluck('title','id')->toArray();
    $position=\App\Models\JobPosition\JobPosition::pluck('title_eng','id')->toArray();
@endphp

<div class="box-body">
    <div class="form-group">
        {{ Form::label('title', "Title", ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' =>"Title", 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('deadline', "Deadline", ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('deadline', null, ['class' => 'form-control box-size', 'placeholder' =>"Deadline", 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('post', "Post", ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('post', null, ['class' => 'form-control box-size', 'placeholder' =>"Post", 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('title_eng', "Title Eng", ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('title_eng', null, ['class' => 'form-control box-size', 'placeholder' =>"Title Eng", 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group"  style="display: none;">
        {{ Form::label('province_id', "Province", ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::select('province_id',$province, 1, ['class' => 'form-control box-size', 'placeholder' =>"Province",'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('province_en', "Province English", ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::text('province_en', null, ['class' => 'form-control box-size', 'placeholder' =>"Province English", 'required' => 'required']) }}
<!--            {{ Form::select('province_en',$province, null, ['class' => 'form-control box-size', 'placeholder' =>"Province English", 'multiple'=>'multiple' ,'required' => 'required']) }}-->
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('province_kh', "Province Khmer", ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">

            {{ Form::text('province_kh', null, ['class' => 'form-control box-size', 'placeholder' =>"Province Khmer", 'required' => 'required']) }}
<!--            {{ Form::select('province_kh',$province_kh, null, ['class' => 'form-control box-size', 'placeholder' =>"Province Khmer", 'multiple'=>'multiple' ,'required' => 'required']) }}-->
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('position_id', "Position", ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::select('position_id',$position, null, ['class' => 'form-control box-size', 'placeholder' =>"Position",'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('responsibilities', "Responsibilities", ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('responsibilities', null, ['class' => 'form-control box-size', 'placeholder' =>"Responsibilities"]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('responsibilities_eng', "Responsibilities Eng", ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('responsibilities_eng', null, ['class' => 'form-control box-size', 'placeholder' =>"Responsibilities Eng"]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
  <div class="form-group">
        {{ Form::label('requirements', "Requirements", ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('requirements', null, ['class' => 'form-control box-size', 'placeholder' =>"Requirements"]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('requirements_eng', "Requirements Eng", ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('requirements_eng', null, ['class' => 'form-control box-size', 'placeholder' =>"Requirements eng"]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('status', "Status", ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::select('status',['active'=>'Active','inactive'=>'Inactive'], null, ['class' => 'form-control box-size', 'placeholder' =>"Status"]) }}
        </div><!--col-lg-10-->
    </div><!--form control-->




</div><!--box-body-->
@section("after-scripts")
    <script src="{!! asset('site/vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js') !!}"></script>


    <!-- CKEditor init -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script>
        var route_prefix = "/filemanager";
        $('textarea').ckeditor({
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
        });
        $('#deadline').datetimepicker({
            format:'YYYY-M-D'
        })

    </script>

@endsection
