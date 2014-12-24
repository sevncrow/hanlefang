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
			{{ Form::open(['url' => 'admin/shop/','id'=>'create-form','class'=>'smart-form', 'enctype'=>'multipart/form-data']) }}
				<header>
					{{ trans('create.header_title') }}
				</header>
				<fieldset>
				<div class="row">
					<section class="col col-6">
					{{Form::label('title', trans('create.title'), ['class'=>'label'])}}
						<label class="input"> <i class="icon-append fa  fa-file"></i>
							{{Form::text('title','',['id'=>'title'])}}
						</label>
					</section>
					<section class="col col-6">
					{{Form::label('category_id', trans('create.category'), ['class'=>'label'])}}
						<select name="shop_categories_id" class="form-control">
							@foreach($categories as $category)
								<option value="{{ $category->id }}">{{ $category->text }}</option>
							@endforeach
						</select>
					</section>
				</div>
				<div class="row">
					<section class="col col-6">
						<label class="label" for="file">商铺缩略图</label> 
						<div class="input input-file">
							<span class="button"><input type="file" id="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">上传</span><input type="text" name="file_thumb" placeholder="请上传商铺缩略图" readonly="">
						</div>
					</section>
				</div>
				<div class="row">
					<section class="col col-md-12">
					{{Form::label('content', trans('create.content'), ['class'=>'label'])}}
					{{Form::textarea('content','',['id'=>'edit'])}}
					</section>
				</div>
				</fieldset>
				<footer>
					<a href="{{ URL::previous() }}" class="pull-right btn btn-primary">{{ trans('create.back') }}</a>
					{{Form::submit( trans('create.create'),['class'=>'btn btn-primary'])}}
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
	CKEDITOR.replace( 'edit', { height: '320px', startupFocus : true} );
	var $createForm = $("#create-form").validate({
				// Rules for form validation
				rules : {
					title : {
						required : true,
					},
					file_thumb : {
						required : true,
					}
				},
				// Messages for form validation
				messages : {
					title : {
						required : '{{ trans('notice.title_should_not_be_null') }}',
					},
					file_thumb : {
						required : '商铺缩略图不能为空',
					}
				},

				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
})
</script>
@stop