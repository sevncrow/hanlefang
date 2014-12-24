@extends("admin.layout.dashboard")
@section("content")
<div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
		<h2>{{ trans('create.header') }}</h2>				
	</header>
	<div>
		<div class="jarviswidget-editbox"></div>
		<div class="widget-body no-padding">
			{{ Form::model($shop, array('route' => array('admin.shop.update', $shop->id), 'id'=>'edit-form', 'class'=>'smart-form', 'method' => 'PUT','enctype' =>'multipart/form-data')) }}
				<header>
					{{ trans('create.header_title') }}
				</header>
				<fieldset>
				<div class="row">
					<section class="col col-6">
					{{Form::label('title', trans('create.title'), ['class'=>'label'])}}
						<label class="input"> <i class="icon-append fa  fa-file"></i>
							{{Form::text('title',$shop->title,['id'=>'title'])}}
						</label>
					</section>
				</div>
				<div class="row">
					<section class="col col-6">
						<label class="label" for="file">商铺缩略图</label> 
						<img src="../../../../{{$shop->thumb_url}}" alt="{{$shop->thumb_url}}">
					</section>
				</div>
				<div class="row">
					<section class="col col-6">
						<div class="input input-file">
							<span class="button"><input type="file" id="file"  name="file" onchange="this.parentNode.nextSibling.value = this.value" >修改</span><input type="text" placeholder="Include some files" readonly="" value="{{$shop->thumb_url}}">
						</div>
					</section>
				</div>
				<div class="row">
					<section class="col col-md-12">
					{{Form::label('content', trans('create.content'), ['class'=>'label'])}}
					{{Form::textarea('content',$shop->content,['id'=>'edit'])}}
					</section>
				</div>
				</fieldset>
				<footer>
					<a href="{{ URL::previous() }}" class="pull-right btn btn-primary">{{ trans('create.back') }}</a>
					{{Form::submit( trans('edit.update'),['class'=>'btn btn-primary'])}}
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
	var $createForm = $("#create-form").validate({
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