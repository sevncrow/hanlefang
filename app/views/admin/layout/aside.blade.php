<nav>
	<ul>
		<li>
			<a href="{{URL::to('admin/home')}}"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">首页</span></a>
		</li>
		<li>
			<a href="#"><i class="fa fa-lg fa-fw fa-leaf"></i> <span class="menu-item-parent">中文信息</span></a>
			<ul>
				<li>
					<li><a href="{{URL::to('admin/news')}}">新闻管理</a></li>
					<li><a href="{{URL::to('admin/notice')}}">公告管理</a></li>
					<li><a href="{{URL::to('admin/active-notice')}}">活动管理</a></li>
					<li><a href="{{URL::to('admin/active-news')}}">往期活动管理</a></li>
					<li><a href="{{URL::to('admin/shop')}}">商铺管理</a></li>
					<li><a href="{{URL::to('admin/travel')}}">游记审核</a></li>
					<!--
						<ul> 
							<li><a href="{{URL::to('admin/post')}}">综合管理</a></li>
							<li><a href="{{URL::to('admin/news')}}">新闻管理</a></li>
							<li><a href="{{URL::to('admin/active')}}">活动管理</a></li>
							<li><a href="{{URL::to('admin/board')}}">公告管理</a></li>
							<li><a href="{{URL::to('admin/faq')}}">问答管理</a></li>
							<li><a href="{{URL::to('admin/site')}}">景点管理</a></li>
							<li><a href="{{URL::to('admin/place')}}">体验场所管理</a></li>
							<li><a href="{{URL::to('admin/shop')}}">购物信息管理</a></li> 
						</ul>
					-->
				</li>
				<li><a href="{{URL::to('admin/post/create')}}">信息发布</a></li>
				<li><a href="{{URL::to('admin/shop/create')}}">添加商铺</a></li>
			</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-lg fa-fw fa-leaf"></i> <span class="menu-item-parent">한국어 정보</span></a>
			<ul>
				<li>
					<a href="#">정보관리</a>
					<ul>
						<li><a href="{{URL::to('admin/kr/post')}}">종합관리</a></li>
						<li><a href="{{URL::to('admin/kr/news')}}">뉴스관리</a></li>
						<li><a href="{{URL::to('admin/kr/active')}}">활동관리</a></li>
						<li><a href="{{URL::to('admin/kr/board')}}">공지관리</a></li>
						<li><a href="{{URL::to('admin/kr/faq')}}">Q&A관리</a></li>
						<li><a href="{{URL::to('admin/kr/site')}}">관광지관리</a></li>
						<li><a href="{{URL::to('admin/kr/place')}}">체험장소관리</a></li>
						<li><a href="{{URL::to('admin/kr/shop')}}">쇼핑정보관리</a></li>
					</ul>
				</li>
				<li><a href="{{URL::to('admin/kr/post/create')}}">정보발표</a></li>
			</ul>
		</li>
	</ul>
</nav>
<span class="minifyme"> <i class="fa fa-arrow-circle-left hit"></i> </span>