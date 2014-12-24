@extends("admin.layout.dashboard")
@section("content")
<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-table"></i> </span>
		@if(isset($header))
			<h2>{{ $header }}</h2>
		@else
			<h2>商铺列表</h2>
		@endif
	</header>
	<div>
		<div class="jarviswidget-editbox"></div>	
		<div class="widget-body no-padding">
			<div class="widget-body-toolbar"></div><!-- 放置工具栏的地方 -->
			<table id="dt_basic" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>商铺编号</th>
						<th>商铺名称</th>
						<th>商铺分类</th>
						<th>商铺缩略图</th>
						<th>{{ trans('index.created_at') }}</th>
						<th>{{ trans('index.updated_at') }}</th>
						<th>{{ trans('index.operate') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($shops as $shop)
					<tr>
						<td>{{$shop->id}}</td>
						<td>{{$shop->title}}</td>
						<td>{{$shop->shopCategories->text}}</td>
						<td><img src="{{$shop->thumb_url}}" alt="{{$shop->thumb_url}}"></td>
						<td>{{$shop->created_at}}</td>
						<td>{{$shop->updated_at}}</td>
						<td>
							<a class="btn bg-color-blue txt-color-white" href="{{ URL::to('admin/shop/'.$shop->id)}}" >{{ trans('index.show') }}</a>
							<a class="btn bg-color-blue txt-color-white" href="{{ URL::to('admin/shop/'.$shop->id.'/edit') }}" >{{ trans('index.edit') }}</a>
							{{ Form::open(['class' => 'pull-right' ,'id'=>'delete-form']) }}
							{{ Form::hidden('_method', 'DELETE') }}
							<a class="btn bg-color-teal txt-color-white" href="javascript:remove('{{URL::to('admin/shop/'.$shop->id)}}')" >{{ trans('index.remove') }}</a> 
							{{ Form::close() }}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop
@section("jslib")
	{{ HTML::script('admin/js/plugin/datatables/jquery.dataTables-cust.min.js'); }}
	{{ HTML::script('admin/js/plugin/datatables/DT_bootstrap.js'); }}
	
	<script type="text/javascript">
	$(document).ready(function() {
		$('#dt_basic').dataTable({
			"sPaginationType" : "bootstrap_full",
			"oLanguage": {
				"sProcessing": "{{ trans('notice.dg_precess') }}",
				"sZeroRecords": "{{ trans('notice.dg_zero_record') }}",
				"sEmptyTable": "{{ trans('notice.dg_zero_record') }}",
				"sInfo": "{{ trans('notice.dg_bottom_info') }}",
				"sInfoFiltered": "{{ trans('notice.dg_total_info') }}",
				"oPaginate": {
					"sFirst": "<<",
					"sPrevious": "<",
					"sNext": ">",
					"sLast": ">>"
				}
			}
		});
	})
	function remove(url)
	{
		$.SmartMessageBox({
			title:'{{ trans('notice.remove_notice_title') }}',
			content:'{{ trans('notice.remove_notice_content') }}',
			buttons : '[{{ trans('notice.yes') }}][{{ trans('notice.no') }}]'

		}, function(ButtonPressed) {
			if (ButtonPressed == "{{ trans('notice.yes') }}") {
				$("#delete-form").attr("action",url);
				$("#delete-form").submit();
			}

		});
	}
	</script>

@stop