@extends("admin.layout.dashboard")
@section("content")
<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div data-widget-fullscreenbutton="false" data-widget-deletebutton="false" data-widget-colorbutton="false" data-widget-editbutton="false" id="wid-id-2" class="jarviswidget jarviswidget-color-darken">
		<header>
			<h2 class="font-md"><strong>站点服务器信息</strong> <i></i></h2>				
		</header>
		<div>
			<div class="jarviswidget-editbox">
			</div>
			<div class="widget-body">
				<table id="dt_basic" class="table table-hover">
					<tbody>
						<tr>
							<td colspan="2"><h4>服务器信息</h4></td>
						</tr>
						<tr>
							<td>服务器主机名称</td>
							<td>{{ $_SERVER['SERVER_NAME']}}</td>
						</tr>
						<tr>
							<td>服务器IP</td>
							<td>{{GetHostByName($_SERVER['SERVER_NAME'])}}</td>
						</tr>
						<tr>
							<td>服务器端口</td>
							<td>{{ $_SERVER['SERVER_PORT']}}</td>
						</tr>
						<tr>
							<td colspan="2"><h4>操作系统信息</h4></td>
						</tr>
						<tr>
							<td>操作系统类型</td>
							<td>{{ php_uname('s')}}</td>
						</tr>
						<tr>
							<td>操作系统版本号</td>
							<td>{{php_uname('r')}}</td>
						</tr>
						<tr>
							<td colspan="2"><h4>PHP版本信息</h4></td>
						</tr>
						<tr>
							<td>PHP版本</td>
							<td>{{ PHP_VERSION }}</td>
						</tr>
						<tr>
							<td>PHP运行方式</td>
							<td>{{ php_sapi_name() }}</td>
						</tr>
						<tr>
							<td colspan="2"><h4>其他数据信息</h4></td>
						</tr>
						<tr>
							<td>数据库链接信息</td>
							<td>{{mysql_get_client_info() }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</article>
@stop