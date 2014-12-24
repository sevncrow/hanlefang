@extends("admin.layout.dashboard")
@section("content")
<div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
		<h2>{{ trans('edit.header') }}</h2>				
	</header>
	<div>
		<div class="jarviswidget-editbox"></div>
		<div class="widget-body no-padding">
			{{ Form::model($post, ['url' =>trans('route.create').$post->id, 'id'=>'edit-form','class'=>'smart-form', 'method' => 'PUT']) }}
				<header>
					{{ trans('edit.header_title') }}
				</header>
				<fieldset>
				<div class="row">
					<section class="col col-6">
					{{Form::label('title', trans('edit.title'), ['class'=>'label'])}}
						<label class="input"> <i class="icon-append fa  fa-file"></i>
							{{Form::text('title',$post->title,['id'=>'title'])}}
						</label>
					</section>
					<section class="col col-6">
					{{Form::label('levels_id', trans('edit.category'), ['class'=>'label'])}}
						<label class="input"> <i class="icon-append fa  fa-file"></i>
							@if(App::getLocale()=='zh')
							{{Form::text('levels_id',$post->levels->key,['id'=>'title','disabled'=>true])}}
							@else
							{{Form::text('levels_id',$post->levels->key_kr,['id'=>'title','disabled'=>true])}}
							@endif
						</label>
					</section>
				</div>
				<div class="row">
					<section class="col col-md-12">
						{{Form::label('abstract', trans('create.abstract'), ['class'=>'label'])}}
						<label class="textarea"> <i class="icon-append fa fa-comment"></i>
						{{Form::textarea('abstract',$post->abstract,['id'=>'abstract'])}}
						</label>
					</section>
				</div>
				<div class="row">
					<section class="col col-md-12">		
					{{Form::label('content', trans('edit.content'), ['class'=>'label'])}}
					{{Form::textarea('content',$post->body,['id'=>'edit'])}}
					</section>
				</div>
				</fieldset>
				<footer>
				<a href="{{ URL::previous() }}" class="pull-right btn btn-primary">{{ trans('create.back') }}</a>
					{{Form::submit( trans('edit.update'),['class'=>'btn btn-primary'] )}}
				</footer>
			{{ Form::close() }}
		</div>
		<!-- end widget content -->
	</div>
	<!-- end widget div -->
</div>
<!-- end widget -->		
@stop
@section("jslib")
{{ HTML::script('admin/js/plugin/jquery-validate/jquery.validate.min.js'); }}
{{ HTML::script('admin/js/plugin/jquery-form/jquery-form.min.js'); }}
{{ HTML::script('admin/js/plugin/ckeditor/ckeditor.js'); }}
<script type="text/javascript">
$(document).ready(function() {
	CKEDITOR.replace( 'edit', { height: '350px', startupFocus : true} );
	var $editForm = $("#edit-form").validate({
				// Rules for form validation
				rules : {
					title : {
						required : true,
					},
				},
				// Messages for form validation
				messages : {
					title : {
						required : '{{ trans('notice.title_should_not_be_null') }}',
					},
				},

				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
})
</script>
@stop