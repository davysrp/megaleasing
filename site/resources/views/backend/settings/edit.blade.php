@extends ('backend.layouts.app') 

@section ('title', trans('labels.backend.settings.management') . ' | ' . trans('labels.backend.settings.edit'))

@section('page-header')
<h1>
	{{ trans('labels.backend.settings.management') }}
	<small>{{ trans('labels.backend.settings.edit') }}</small>
</h1>
@endsection 

@section('content') 
{{ Form::model($setting, ['route' => ['admin.settings.update', $setting], 'class' => 'form-horizontal',
'role' => 'form', 'method' => 'PATCH','files' => true, 'id' => 'edit-settings']) }}

<div class="box box-info">
	<div class="box-header">
		<h3 class="box-title">{{ trans('labels.backend.settings.edit') }}</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body setting-block">
		<!-- Nav tabs -->
		<ul id="myTab" class="nav nav-tabs setting-tab-list" role="tablist">
			<li role="presentation" class="active">
				<a href="#tab1" aria-controls="home" role="tab" data-toggle="tab">{{ trans('labels.backend.settings.seo') }}</a>
			</li>
			<li role="presentation">
				<a href="#tab2" aria-controls="1" role="tab" data-toggle="tab">{{ trans('labels.backend.settings.companydetails') }}</a>
			</li>
			<li role="presentation">
				<a href="#tab3" aria-controls="2" role="tab" data-toggle="tab">{{ trans('labels.backend.settings.mail') }}</a>
			</li>
			<li role="presentation">
				<a href="#tab8" aria-controls="3" role="tab" data-toggle="tab">Incoming Form eMail</a>
			</li>
			<li role="presentation">
				<a href="#tab4" aria-controls="4" role="tab" data-toggle="tab">{{ trans('labels.backend.settings.footer') }}</a>
			</li>
			<li role="presentation">
				<a href="#tab5" aria-controls="5" role="tab" data-toggle="tab">{{ trans('labels.backend.settings.terms') }}</a>
			</li>
			<li role="presentation">
				<a href="#tab6" aria-controls="6" role="tab" data-toggle="tab">{{ trans('labels.backend.settings.google') }}</a>
			</li>
			<li role="social">
				<a href="#tab7" aria-controls="7" role="tab" data-toggle="tab">Social Media</a>
			</li>
			<li role="social">
				<a href="#tab9" aria-controls="9" role="tab" data-toggle="tab">Popup First Visit</a>
			</li>
		</ul>

		<!-- Tab panes -->
		<div id="myTabContent" class="tab-content setting-tab">
			<div role="tabpanel" class="tab-pane active" id="tab1">
				<div class="form-group">
					{{ Form::label('logo', trans('validation.attributes.backend.settings.sitelogo'), ['class' => 'col-lg-2 control-label']) }}

					<div class="col-lg-10">

						<div class="custom-file-input">
							{!! Form::file('logo', array('class'=>'form-control inputfile inputfile-1' )) !!}
							<label for="logo">
								<i class="fa fa-upload"></i>
								<span>Choose a file</span>
							</label>
						</div>
						<div class="img-remove-logo">
							@if($setting->logo)
							<img height="50" width="50" src="{{ Storage::disk('public')->url('img/logo/' . $setting->logo) }}">
							<i id="remove-logo-img" class="fa fa-times remove-logo" data-id="logo" aria-hidden="true"></i>
							@endif
						</div>
					</div>
					<!--col-lg-10-->
				</div>
				<!--form control-->

				<div class="form-group">
					{{ Form::label('favicon', trans('validation.attributes.backend.settings.favicon'), ['class' => 'col-lg-2 control-label'])
					}}

					<div class="col-lg-10">
						<div class="custom-file-input">
							{!! Form::file('favicon', array('class'=>'form-control inputfile inputfile-1' )) !!}
							<label for="favicon">
								<i class="fa fa-upload"></i>
								<span>Choose a file</span>
							</label>
						</div>
						<div class="img-remove-favicon">
							@if($setting->favicon)
							<img height="50" width="50" src="{{ Storage::disk('public')->url('img/favicon/' . $setting->favicon) }}">
							<i id="remove-favicon-img" class="fa fa-times remove-logo" data-id="favicon" aria-hidden="true"></i>
							@endif
						</div>
					</div>
					<!--col-lg-10-->
				</div>
				<!--form control-->
				<div class="form-group">
					{{ Form::label('seo_title', trans('validation.attributes.backend.settings.metatitle'), ['class' => 'col-lg-2 control-label'])
					}}

					<div class="col-lg-10">
						{{ Form::text('seo_title', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.metatitle')])
						}}
					</div>
					<!--col-lg-10-->
				</div>
				<!--form control-->

				<div class="form-group">
					{{ Form::label('seo_keyword', trans('validation.attributes.backend.settings.metakeyword'), ['class' => 'col-lg-2 control-label'])
					}}

					<div class="col-lg-10">
						{{ Form::textarea('seo_keyword', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.metakeyword'),
						'rows' => 2]) }}
					</div>
					<!--col-lg-3-->
				</div>
				<!--form control-->

				<div class="form-group">
					{{ Form::label('seo_description', trans('validation.attributes.backend.settings.metadescription'), ['class' => 'col-lg-2
					control-label']) }}

					<div class="col-lg-10">
						{{ Form::textarea('seo_description', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.metadescription'),
						'rows' => 2]) }}
					</div>
					<!--col-lg-3-->
				</div>
				<!--form control-->
			</div>
			<div role="tabpanel" class="tab-pane" id="tab2">
				<div class="form-group">
					{{ Form::label('company_address', trans('validation.attributes.backend.settings.companydetails.address'), ['class' => 'col-lg-2
					control-label']) }}

					<div class="col-lg-10">
						{{ Form::textarea('company_address', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.companydetails.address'),
						'rows' => 2]) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('company_address_eng', "Company Address Eng", ['class' => 'col-lg-2
					control-label']) }}

					<div class="col-lg-10">
						{{ Form::textarea('company_address_eng', null,['class' => 'form-control', 'placeholder' => "Company Address Eng",
						'rows' => 2]) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('company_contact', trans('validation.attributes.backend.settings.companydetails.contactnumber'), ['class'
					=> 'col-lg-2 control-label']) }}

					<div class="col-lg-10">
						{{ Form::text('company_contact', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.companydetails.contactnumber'),
						'rows' => 2]) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('work_time', "Working Time", ['class'
					=> 'col-lg-2 control-label']) }}

					<div class="col-lg-10">
						{{ Form::text('work_time', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.companydetails.contactnumber'),
						'rows' => 2]) }}
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('work_time_eng', "Working Time Eng", ['class'
					=> 'col-lg-2 control-label']) }}

					<div class="col-lg-10">
						{{ Form::text('work_time_eng', null,['class' => 'form-control', 'placeholder' => "Working Time Eng",
						'rows' => 2]) }}
					</div>
				</div>
				<!--form control-->
			</div>
			<div role="tabpanel" class="tab-pane" id="tab3">
				<div class="form-group">
					{{ Form::label('from_name', trans('validation.attributes.backend.settings.mail.fromname'), ['class' => 'col-lg-2 control-label'])
					}}

					<div class="col-lg-10">
						{{ Form::text('from_name', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.mail.fromname'),
						'rows' => 2]) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('from_email', trans('validation.attributes.backend.settings.mail.fromemail'), ['class' => 'col-lg-2 control-label'])
					}}

					<div class="col-lg-10">
						{{ Form::text('from_email', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.mail.fromemail'),
						'rows' => 2]) }}
					</div>
				</div>
				<!--form control-->
			</div>
			<div role="tabpanel" class="tab-pane" id="tab8">
				<div class="form-group">
					{{ Form::label('jobFormMail', "Job Form eMail", ['class' => 'col-lg-2 control-label'])
					}}

					<div class="col-lg-10">
						{{ Form::text('jobFormMail', null,['class' => 'form-control', 'placeholder' => "Job Form eMail",
						'rows' => 2]) }}
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('feedbackFormMail', "Feedback Form eMail", ['class' => 'col-lg-2 control-label'])
					}}

					<div class="col-lg-10">
						{{ Form::text('feedbackFormMail', null,['class' => 'form-control', 'placeholder' => "Feedback Form eMail",
						'rows' => 2]) }}
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('onlineRequestFormMail', "Online Request Form eMail", ['class' => 'col-lg-2 control-label'])
					}}

					<div class="col-lg-10">
						{{ Form::text('onlineRequestFormMail', null,['class' => 'form-control', 'placeholder' => "Online Request Form eMail",
						'rows' => 2]) }}
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('corporateFormMail', "Corporate Form eMail", ['class' => 'col-lg-2 control-label'])
					}}

					<div class="col-lg-10">
						{{ Form::text('corporateFormMail', null,['class' => 'form-control', 'placeholder' => "Corporate Form eMail",
						'rows' => 2]) }}
					</div>
				</div>

				<!--form control-->
			</div>
			<div role="tabpanel" class="tab-pane" id="tab4">
				<div class="form-group">
					{{ Form::label('footer_text', trans('validation.attributes.backend.settings.footer.text'), ['class' => 'col-lg-2 control-label'])
					}}

					<div class="col-lg-10">
						{{ Form::text('footer_text', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.footer.text'),
						'rows' => 2]) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('copyright_text', trans('validation.attributes.backend.settings.footer.copyright'), ['class' => 'col-lg-2
					control-label']) }}

					<div class="col-lg-10">
						{{ Form::text('copyright_text', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.footer.copyright'),
						'rows' => 2]) }}
					</div>
				</div>
				<!--form control-->
			</div>
			<div role="tabpanel" class="tab-pane" id="tab5">
				<div class="form-group">
					{{ Form::label('terms', trans('validation.attributes.backend.settings.termscondition.terms'), ['class' => 'col-lg-2 control-label'])
					}}

					<div class="col-lg-10">
						{{ Form::textarea('terms', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.termscondition.terms')])
						}}
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('disclaimer', trans('validation.attributes.backend.settings.termscondition.disclaimer'), ['class' => 'col-lg-2
					control-label']) }}

					<div class="col-lg-10">
						{{ Form::textarea('disclaimer', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.termscondition.disclaimer')])
						}}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('calculate_note', 'Term Note', ['class' => 'col-lg-2
					control-label']) }}

					<div class="col-lg-10">
						{{ Form::textarea('calculate_note', null,['class' => 'form-control', 'placeholder' => 'Term Note'])
						}}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('calculate_note_eng', 'Term Note Eng', ['class' => 'col-lg-2
					control-label']) }}

					<div class="col-lg-10">
						{{ Form::textarea('calculate_note_eng', null,['class' => 'form-control', 'placeholder' => 'Term Note Eng'])
						}}
					</div>
				</div>
				<!--form control-->
			</div>
			<div role="tabpanel" class="tab-pane" id="tab6">
				<div class="form-group">
					{{ Form::label('google_analytics', trans('validation.attributes.backend.settings.google.analytic'), ['class' => 'col-lg-2
					control-label']) }}

					<div class="col-lg-10">
						{{ Form::textarea('google_analytics', null,['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.settings.google.analytic')])
						}}
					</div>
				</div>
				<!--form control-->
			</div>
			<div role="tabpanel" class="tab-pane" id="tab7">
				<div class="form-group">
					{{ Form::label('facebook', 'Facebook', ['class' => 'col-lg-2
					control-label']) }}

					<div class="col-lg-10">
						{{ Form::text('facebook', null,['class' => 'form-control', 'placeholder' => 'Facebook'])
						}}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('instagram', 'Instagram', ['class' => 'col-lg-2
					control-label']) }}

					<div class="col-lg-10">
						{{ Form::text('instagram', null,['class' => 'form-control', 'placeholder' => 'Instagram'])}}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('telegram', 'Telegram', ['class' => 'col-lg-2
					control-label']) }}

					<div class="col-lg-10">
						{{ Form::text('telegram', null,['class' => 'form-control', 'placeholder' => 'Telegram'])
						}}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('youtube', 'Youtube', ['class' => 'col-lg-2
					control-label']) }}

					<div class="col-lg-10">
						{{ Form::text('youtube', null,['class' => 'form-control', 'placeholder' => 'Youtube'])
						}}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('linkedin', 'LinkedIn', ['class' => 'col-lg-2
					control-label']) }}

					<div class="col-lg-10">
						{{ Form::text('linkedin', null,['class' => 'form-control', 'placeholder' => 'LinkedIn'])
						}}
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('twitter', 'Twitter', ['class' => 'col-lg-2
					control-label']) }}

					<div class="col-lg-10">
						{{ Form::text('twitter', null,['class' => 'form-control', 'placeholder' => 'Twitter'])
						}}
					</div>
				</div>
				<!--form control-->
			</div>


			<div role="tabpanel" class="tab-pane" id="tab9">
				<div class="form-group">
					{{ Form::label('popupImage', 'Popup Image', ['class' => 'col-lg-2
					control-label']) }}

					<div class="col-lg-10">
						{{ Form::text('popupImage', null,['class' => 'form-control', 'placeholder' => 'Popup Image'])
						}}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('popupVideo', 'Youtube video ID', ['class' => 'col-lg-2
					control-label']) }}

					<div class="col-lg-10">
						{{ Form::text('popupVideo', null,['class' => 'form-control', 'placeholder' => 'Youtube video ID'])}}
					</div>
				</div>
				<!--form control-->
			</div>


		</div>
	</div>
	<!-- /.box-body -->
	<div class="box-footer">
		<div class="row">
			<div class="col-lg-offset-2 col-lg-10 footer-btn">
				{{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div><!--box-->

<!-- hidden setting id variable -->
<input type="hidden" data-id="{{ $setting->id }}" id="setting">
{{ Form::close() }} 
@endsection

@section("after-scripts")
	<!-- CKEditor init -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
	<script>
		var route_prefix = '{!! route('frontend.index') !!}/filemanager';
		$('textarea[name=calculate_note_eng]').ckeditor({
			filebrowserImageBrowseUrl: route_prefix + '?type=Images',
			filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
			filebrowserBrowseUrl: route_prefix + '?type=Files',
			filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
		});
		$('textarea[name=calculate_note]').ckeditor({
			filebrowserImageBrowseUrl: route_prefix + '?type=Images',
			filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
			filebrowserBrowseUrl: route_prefix + '?type=Files',
			filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
		});
	</script>

@endsection

@section('after-scripts')
<script src='/js/backend/bootstrap-tabcollapse.js'></script>
<script>
	(function(){
		Backend.Utils.csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		Backend.Settings.selectors.RouteURL = "{{ route('admin.removeIcon', -1) }}";
		Backend.Settings.init();
		
	})();

	window.load = function(){
		
	}
	/*
	var route = "{{ route('admin.removeIcon', -1) }}";
    var data_id = $('#setting').data('id');
    
    route = route.replace('-1', data_id);

    $('.remove-logo').click(function() {
        var data = $(this).data('id');

        swal({
            title: "Warning",
            text: "Are you sure you want to remove?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: true
            }, function (confirmed) {
                if (confirmed)
                {
                    console.log(data);
                    if(data=='logo')
                    {
                        value= 'logo';
                        $('.img-remove-logo').addClass('hidden');
                    }
                    else
                    {
                        value= 'favicon';
                        $('.img-remove-favicon').addClass('hidden');
                    }
                    $.ajax({
                        url: route,
                        type: "POST",
                        data: {data: value},
                    });
                }
            });
    });
	
   */
    $('#myTab').tabCollapse({
        tabsClass: 'hidden-sm hidden-xs',
        accordionClass: 'visible-sm visible-xs'
    });

</script>
@endsection
