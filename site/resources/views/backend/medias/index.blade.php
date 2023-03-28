@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.media.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.media.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.media.management') }}</h3>

        </div><!--box-header with-border-->

        <div class="box-body">
            <iframe src="/filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}

    <script>
        //Below written line is short form of writing $(document).ready(function() { })

    </script>
@endsection
