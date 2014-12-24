@extends("admin.layout.dashboard")
@section("content")
<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-table"></i> </span>
		@if(isset($header))
			<h2>{{ $header }}</h2>
		@else
			<h2>信息列表</h2>
		@endif
	</header>
	<div>
		<div class="jarviswidget-editbox"></div>	
		<div class="widget-body no-padding">
			<div class="widget-body-toolbar"></div><!-- 放置工具栏的地方 -->
			<table id="dt_basic" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>{{ trans('index.id') }}</th>
						<th>{{ trans('index.title') }}</th>
						<th>{{ trans('index.author') }}</th>
						<th>{{ trans('index.category') }}</th>
						<th>{{ trans('index.abstract') }}</th>
						<th>{{ trans('index.created_at') }}</th>
						<th>{{ trans('index.updated_at') }}</th>
						<th>{{ trans('index.operate') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $post)
					<tr>
						<td>{{$post->id}}</td>
						<td>{{str_limit($post->title,$limit = 15, $end = '......')}}</td>
						<td>{{$post->author}}</td>
						@if(App::getLocale()=='zh')
						<td>{{$post->levels->key}}</td>
						@else
						<td>{{$post->levels->key_kr}}</td>
						@endif
						<td>{{str_limit($post->abstract,$limit = 35, $end = '......')}}</td>
						<td>{{$post->created_at}}</td>
						<td>{{$post->updated_at}}</td>
						<td>
							<a class="btn bg-color-blue txt-color-white" href="{{URL::to(trans('route.index').$post->id)}}" >{{ trans('index.show') }}</a>
							<a class="btn bg-color-blue txt-color-white" href="{{ URL::to(trans('route.index').$post->id.'/edit') }}" >{{ trans('index.edit') }}</a>
							{{ Form::open(['class' => 'pull-right' ,'id'=>'delete-form']) }}
							{{ Form::hidden('_method', 'DELETE') }}
							<a class="btn bg-color-teal txt-color-white" href="javascript:remove('{{URL::to(trans('route.remove').$post->id)}}')" >{{ trans('index.remove') }}</a> 
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