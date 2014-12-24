@extends("admin.layout.dashboard")
@section("content")
<div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
		<h2>{{ trans('show.header') }}</h2>				
	</header>
	<div>
		<div class="jarviswidget-editbox"></div>
		<div class="widget-body no-padding">
			<div class="smart-form">
				<header>
					{{ trans('show.header_title') }}
				</header>
				<fieldset>
					<div class="row">
						<section class="col col-md-12">
							<h2 class="text-center">
								{{ $shop->title }}
							</h2>
						</section>
					</div>
					<div class="row">
						<section class="col col-md-12">
							<p>
								{{ $shop->content }}
							</p>
						</section>
					</div>
				</fieldset>
				<footer>
					<a href="{{ URL::previous() }}" class="pull-right btn btn-primary">{{ trans('show.back') }}</a>
				</footer>
			</div>
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