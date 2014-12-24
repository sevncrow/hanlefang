@extends("admin.layout.dashboard")
@section("content")
<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-table"></i> </span>
		<h2>{{ $header }}</h2>
	</header>
	<div>
		<div class="jarviswidget-editbox"></div>	
		<div class="widget-body no-padding">
			<div class="widget-body-toolbar"></div><!-- 放置工具栏的地方 -->
			<table id="dt_basic" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>{{ trans('travel.id') }}</th>
						<th>{{ trans('travel.title') }}</th>
						<th>{{ trans('travel.author') }}</th>
						<th>{{ trans('travel.passed') }}</th>
						<th>{{ trans('travel.content') }}</th>
						<th>{{ trans('travel.created_at') }}</th>
						<th>{{ trans('travel.updated_at') }}</th>
						<th>{{ trans('travel.operate') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($travels as $travel)
					<tr>
						<td>{{$travel->id}}</td>
						<td>{{str_limit($travel->title,$limit = 15, $end = '......')}}</td>
						<td>{{$travel->author}}</td>
						@if ($travel->passed==0) 
							<td>未通过</td>
						@else
							<td>通过</td>
						@endif
						<td>{{str_limit($travel->content,$limit = 35, $end = '......')}}</td>
						<td>{{$travel->created_at}}</td>
						<td>{{$travel->updated_at}}</td>
						<td>
							<a class="btn bg-color-blue txt-color-white" href="{{URL::to(trans('travel.url').$travel->id)}}" >{{ trans('travel.show') }}</a>
							@if ($travel->passed==0) 
							<form action="{{ URL::to('admin/travel-access/'.$travel->id)}}" method="post" style="display:inline">
								<input type="submit" class="btn bg-color-blue txt-color-white" value="{{ trans('travel.access') }}" />
							</form>
							@else
							<form action="{{ URL::to('admin/travel-hidden/'.$travel->id)}}" method="post" style="display:inline">
								<input type="submit" class="btn bg-color-blue txt-color-white" value="{{ trans('travel.hidden') }}" />
							</form>
							@endif
							
							{{ Form::open(['class' => 'pull-right' ,'id'=>'delete-form']) }}
							{{ Form::hidden('_method', 'DELETE') }}
							<a class="btn bg-color-teal txt-color-white" href="javascript:remove('{{URL::to(trans('travel.url').$travel->id)}}')" >{{ trans('travel.remove') }}</a> 
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