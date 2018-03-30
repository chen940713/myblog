<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog</title>
        
		
        <!-- Vendor CSS -->
        <link href="/day05/Public/Admin/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="/day05/Public/Admin/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="/day05/Public/Admin/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="/day05/Public/Admin/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="/day05/Public/Admin/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
            
        <!-- CSS -->
        <link href="/day05/Public/Admin/css/app.min.1.css" rel="stylesheet">
        <link href="/day05/Public/Admin/css/app.min.2.css" rel="stylesheet">
        
        
        
    </head>
    <body>
        <header id="header" class="clearfix" data-current-skin="blue">
            <ul class="header-inner">
                <li id="menu-trigger" data-trigger="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>

                <li class="logo hidden-xs">
                    <a href="index.html">Blog</a>
                </li>

                <li class="pull-right">
                    <ul class="top-menu">
                        <li id="toggle-width">
                            <div class="toggle-switch">
                                <input id="tw-switch" type="checkbox" hidden="hidden">
                                <label for="tw-switch" class="ts-helper"></label>
                            </div>
                        </li>

                        <li class="dropdown">
                            <a data-toggle="dropdown" href=""><i class="tm-icon zmdi zmdi-more-vert"></i></a>
                            <ul class="dropdown-menu dm-icon pull-right">
                                <li class="skin-switch hidden-xs">
                                    <span class="ss-skin bgm-lightblue" data-skin="lightblue"></span>
                                    <span class="ss-skin bgm-bluegray" data-skin="bluegray"></span>
                                    <span class="ss-skin bgm-cyan" data-skin="cyan"></span>
                                    <span class="ss-skin bgm-teal" data-skin="teal"></span>
                                    <span class="ss-skin bgm-orange" data-skin="orange"></span>
                                    <span class="ss-skin bgm-blue" data-skin="blue"></span>
                                </li>
                                <li class="divider hidden-xs"></li>
                                <li class="hidden-xs">
                                    <a data-action="fullscreen" href=""><i class="zmdi zmdi-fullscreen"></i> 全屏</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
        
        <section id="main" data-layout="layout-1">
            <aside id="sidebar" class="sidebar c-overflow">
                <div class="profile-menu">
                    <a href="">
                        <div class="profile-pic">
                            <img src="/day05/Public/Admin/img/profile-pics/1.jpg" alt="">
                        </div>

                        <div class="profile-info">
                            admin

                            <i class="zmdi zmdi-caret-down"></i>
                        </div>
                    </a>

                    <ul class="main-menu">
                        <li>
                            <a href=""><i class="zmdi zmdi-time-restore"></i> Logout</a>
                        </li>
                    </ul>
                </div>

                <ul class="main-menu">
                    <li class="active">
                        <a href="<?php echo U('Index/index');?>"><i class="zmdi zmdi-home"></i> 主页</a>
                    </li>
                    <li class="sub-menu">
                        <a href=""><i class="zmdi zmdi-view-compact"></i> 用户管理</a>

                        <ul>
                            <li><a href="<?php echo U('User/index');?>">用户列表</a></li>
                            <li><a href="<?php echo U('User/add');?>">用户添加</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href=""><i class="zmdi zmdi-collection-text"></i> 文章管理</a>
                        <ul>
                            <li><a href="<?php echo U('Article/index');?>">文章列表</a></li>
                            <li><a href="<?php echo U('Article/add');?>">发布文章</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href=""><i class="zmdi zmdi-swap-alt"></i> 心情管理</a>
                        <ul>
                            <li><a href="<?php echo U('Mood/index');?>">心情列表</a></li>
                            <li><a href="<?php echo U('Mood/add');?>">写心情</a></li>
                        </ul>
                    </li>
                </ul>
            </aside>
            
            <section id="content">
            	
	<div class="container">

		<div class="card">
			<div class="card-header">
				<h2>文章列表</h2>
			</div>

			<div class="card-body card-padding">
				<div id="data-table-basic-header" class="bootgrid-header container-fluid">
					<table id="data-table-basic" class="table table-striped bootgrid-table" aria-busy="false">
						<thead>
							<tr>
								<th data-column-id="id" class="text-left" style="">
									<a href="javascript:void(0);" class="column-header-anchor sortable"><span class="text">ID</span><span class="zmdi icon "></span></a>
								</th>
								<th data-column-id="sender" class="text-left" style="">
									<a href="javascript:void(0);" class="column-header-anchor sortable"><span class="text">标题</span><span class="zmdi icon "></span></a>
								</th>
								<th data-column-id="received" class="text-left" style="">
									<a href="javascript:void(0);" class="column-header-anchor sortable"><span class="text">作者</span><span class="zmdi icon zmdi-expand-more"></span></a>
								</th>
								<th data-column-id="received" class="text-left" style="">
									<a href="javascript:void(0);" class="column-header-anchor sortable"><span class="text">简介</span><span class="zmdi icon zmdi-expand-more"></span></a>
								</th>
								<th data-column-id="received" class="text-left" style="">
									<a href="javascript:void(0);" class="column-header-anchor sortable"><span class="text">关键词</span><span class="zmdi icon zmdi-expand-more"></span></a>
								</th>
								<th data-column-id="received" class="text-left" style="">
									<a href="javascript:void(0);" class="column-header-anchor sortable"><span class="text">点击</span><span class="zmdi icon zmdi-expand-more"></span></a>
								</th>
								<th data-column-id="received" class="text-left" style="">
									<a href="javascript:void(0);" class="column-header-anchor sortable"><span class="text">回复</span><span class="zmdi icon zmdi-expand-more"></span></a>
								</th>
								<th data-column-id="received" class="text-left" style="">
									<a href="javascript:void(0);" class="column-header-anchor sortable"><span class="text">发布时间</span><span class="zmdi icon zmdi-expand-more"></span></a>
								</th>
								<th data-column-id="received" class="text-left" style="">
									<a href="javascript:void(0);" class="column-header-anchor sortable"><span class="text">操作</span><span class="zmdi icon zmdi-expand-more"></span></a>
								</th>
							</tr>
						</thead>
						<tbody id="tbody">
							<?php if($data): if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr data-id = "<?php echo ($v['id']); ?>">
									<td><?php echo ($v['id']); ?></td>
									<td><?php echo ($v['title']); ?></td>
									<td><?php echo ($v['author']); ?></td>
									<td><?php echo ($v['intro']); ?></td>
									<td><?php echo ($v['keywords']); ?></td>
									<td><?php echo ($v['click_num']); ?></td>
									<td><?php echo ($v['reply_num']); ?></td>
									<td><?php echo ($v['insert_at']); ?></td>
									<td>
										<button class="btn btn-primary btn-xs waves-effect modify" data-id="<?php echo ($v['id']); ?>">修改</button>
										<button class="btn btn-xs btn-danger waves-effect del" data-id="<?php echo ($v['id']); ?>">删除</button>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							<?php else: ?>
								<tr>暂无数据</tr><?php endif; ?>
						</tbody>
					</table>
				</div>
				<div id="data-table-basic-footer" class="bootgrid-footer container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<ul class="pagination">
								<!--<li class="first disabled" aria-disabled="true">
									<a data-page="first" class="button"><i class="zmdi zmdi-more-horiz"></i></a>
								</li>
								<li class="prev disabled" aria-disabled="true">
									<a data-page="prev" class="button"><i class="zmdi zmdi-chevron-left"></i></a>
								</li>-->
								<?php $__FOR_START_814254954__=1;$__FOR_END_814254954__=$total+1;for($i=$__FOR_START_814254954__;$i < $__FOR_END_814254954__;$i+=1){ ?><li class="page-<?php echo ($i); ?>" aria-disabled="false" aria-selected="true">
										<a data-page="<?php echo ($i); ?>" data-id="<?php echo ($i); ?>" class="button"><?php echo ($i); ?></a>
									</li><?php } ?>
								<!--<li class="next" aria-disabled="false">
									<a data-page="next" class="button"><i class="zmdi zmdi-chevron-right"></i></a>
								</li>
								<li class="last" aria-disabled="false">
									<a data-page="last" class="button"><i class="zmdi zmdi-more-horiz"></i></a>
								</li>-->
							</ul>
						</div>
						<!--<div class="col-sm-6 infoBar">
							<div class="infos">Showing 1 to 10 of 20 entries</div>
						</div>-->
					</div>
				</div>
			</div>
		</div>

            </section>
        </section>
        
        <!-- Page Loader -->
        <div class="page-loader">
            <div class="preloader pls-blue">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>

                <p>Please wait...</p>
            </div>
        </div>
        
        
        
        <!-- Javascript Libraries -->
        <script src="/day05/Public/Admin/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="/day05/Public/Admin/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <script src="/day05/Public/Admin/vendors/bower_components/flot/jquery.flot.js"></script>
        <script src="/day05/Public/Admin/vendors/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="/day05/Public/Admin/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
        <script src="/day05/Public/Admin/vendors/sparklines/jquery.sparkline.min.js"></script>
        <script src="/day05/Public/Admin/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        
        <script src="/day05/Public/Admin/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="/day05/Public/Admin/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js "></script>
        <script src="/day05/Public/Admin/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
        <script src="/day05/Public/Admin/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="/day05/Public/Admin/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="/day05/Public/Admin/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="/day05/Public/Admin/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        
        <script src="/day05/Public/Admin/js/flot-charts/curved-line-chart.js"></script>
        <script src="/day05/Public/Admin/js/flot-charts/line-chart.js"></script>
        <script src="/day05/Public/Admin/js/charts.js"></script>
        
        <script src="/day05/Public/Admin/js/charts.js"></script>
        <script src="/day05/Public/Admin/js/functions.js"></script>
        <script src="/day05/Public/Admin/js/demo.js"></script>
        
        
        

        <!--scroll js-->
        <script src="/day05/Public/Admin/js/jquery.nicescroll.min.js"></script>
        
        
        
	<script type="text/javascript">
		$(document).ready(function() {
			$(".page-1").addClass('active');
			$(".pagination").on('click','li',function(ev){
				$(this).addClass('active').siblings().removeClass('active');
				var page = ev.target.dataset.id;
				$.get("/day05/index.php/Admin/Article/ajax?p="+page, function(data){
					var html = "";
					for (let i=0; i<data.length; i++) {
						html += "<tr>"+
							"<td>"+data[i].id+"</td>"+
							"<td>"+data[i].title+"</td>"+
							"<td>"+data[i].author+"</td>"+
							"<td>"+data[i].intro+"</td>"+
							"<td>"+data[i].keywords+"</td>"+
							"<td>"+data[i]['click_num']+"</td>"+
							"<td>"+data[i]['reply_num']+"</td>"+
							"<td>"+data[i]['insert_at']+"</td>"+
							'<td><button class="btn btn-primary btn-xs waves-effect modify data-id="'+data[i].id+'">修改</button> '+
								'<button class="btn btn-xs btn-danger waves-effect del" data-id="'+data[i].id+'">删除</button>'+
							"</td></tr>";
					}
					$("#tbody").html(html);
				})
			})
			
			$("table").on('click', '.modify', function(ev){
				var id = ev.target.dataset.id;
				location.href = "/day05/index.php/Admin/Article/edit?id="+id;
			})
			$("table").on('click', '.del', function(ev){
				var id = ev.target.dataset.id;
				$.get("/day05/index.php/Admin/Article/del?id="+id, function(data){
					if (data == "success") {
						alert('删除成功');
						location.reload();
					}
				})
			})
		})
	</script>

    </body>
</html>