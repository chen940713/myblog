<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>博客</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="/day05/Public/Home/layui/css/layui.css">
  <link rel="stylesheet" href="/day05/Public/Home/css/global.css">
  
  	
  
</head>
<body>

<div class="fly-header layui-bg-black">
  <div class="layui-container">
    <a class="fly-logo" href="<?php echo U('Index/index');?>">
      <img src="/day05/Public/Home/images/logo.png" alt="layui">
    </a>
    <ul class="layui-nav fly-nav layui-hide-xs">
      <li class="layui-nav-item ">
        <a href="<?php echo U('Index/index');?>"><i class="iconfont icon-shouye"></i>首页</a>
      </li>
      <li class="layui-nav-item ">
        <a href="<?php echo U('About/index');?>"><i class="iconfont icon-iconmingxinganli"></i>关于我</a>
      </li>
      <li class="layui-nav-item ">
        <a href="<?php echo U('Mood/index');?>"><i class="iconfont icon-jiaoliu"></i>碎言碎语</a>
      </li>
      <li class="layui-nav-item layui-this">
        <a href="<?php echo U('Article/index');?>"><i class="iconfont icon-wenda"></i>学无止境</a>
      </li>
      <li class="layui-nav-item ">
        <a href="<?php echo U('User/msg');?>"><i class="iconfont icon-renshu"></i>留言板</a>
      </li>
    </ul>
    
    
    <ul class="layui-nav fly-nav-user">
    	<?php if($_SESSION['userid']== ''): ?><!-- 未登入的状态 -->
      <li class="layui-nav-item">
        <a class="iconfont icon-touxiang layui-hide-xs" href="<?php echo U('User/login');?>"></a>
      </li>
      <li class="layui-nav-item">
        <a href="<?php echo U('User/login');?>">登入</a>
      </li>
      <li class="layui-nav-item">
        <a href="<?php echo U('User/register');?>">注册</a>
      </li>
      <?php else: ?>
      <!-- 登入后的状态 -->
      <li class="layui-nav-item">
        <a class="fly-nav-avatar" href="<?php echo U('User/personal', array('id'=> session('userid')));?>">
          <cite class="layui-hide-xs"><?php echo (session('username')); ?></cite>
          <i class="iconfont icon-renzheng layui-hide-xs" title=""></i>
          <img src="/day05/Public/Admin/images/<?php echo (session('img')); ?>">
        </a>
        <dl class="layui-nav-child">
          <dd><a href="<?php echo U('User/logout');?>" style="text-align: center;">退出</a></dd>
        </dl>
      </li><?php endif; ?>
    </ul>
  </div>
  
</div>


<div class="fly-panel fly-column">
  <div class="layui-container">
    <ul class="layui-clear">
    </ul>
    <div class="fly-column-right layui-hide-xs">
      <span class="fly-search"><i class="layui-icon"></i></span>
      <a href="##" class="layui-btn">发表新帖</a>
    </div>
    <div class="layui-hide-sm layui-show-xs-block" style="margin-top: -10px; padding-bottom: 10px; text-align: center;">
      <a href="##" class="layui-btn">发表新帖</a>
    </div>
  </div>
</div>

<div class="layui-container">
  <div class="layui-row layui-col-space15">
    
<div class="layui-col-md8">
  <div class="fly-panel" style="margin-bottom: 0;">

    <div class="fly-panel-title fly-filter">
      <span class="fly-filter-right layui-hide-xs">
        <a href="<?php echo U('Article/index?t=news');?>" class="<?php if($ac == "news"): ?>layui-this<?php endif; ?>">按最新</a>
        <span class="fly-mid"></span>
        <a href="<?php echo U('Article/index?t=hot');?>" class="<?php if($ac == "hot"): ?>layui-this<?php endif; ?>">按热议</a>
      </span>
    </div>

    <ul class="fly-list">
    	<?php if(is_array($article)): foreach($article as $key=>$v): ?><li>
        <a href="user/home.html" class="fly-avatar">
          <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="user">
        </a>
        <h2>
          <a class="layui-badge">动态</a>
          <a href="<?php echo U('Article/detail',array('id'=>$v['id']));?>"><?php echo ($v['title']); ?></a>
        </h2>
        <div class="fly-list-info">
          <a href="user/home.html" link>
            <cite><?php echo ($v['author']); ?></cite>
          </a>
          <span><?php echo ($v['insert_at']); ?></span>
          <span class="fly-list-nums">
            <i class="iconfont icon-liulanyanjing" title="浏览"></i> <?php echo ($v['click_num']); ?>
            <i class="iconfont icon-pinglun1" title="回答"></i> 0
          </span>
        </div>
        <div class="fly-list-badge">
        	<?php if($v['click_num'] > 8000): ?><span class="layui-badge layui-bg-red">精帖</span><?php endif; ?>
        	<?php if($v['click_num'] < 1000): ?><span class="layui-badge layui-bg-green">新帖</span><?php endif; ?>
        </div>
      </li><?php endforeach; endif; ?>
    </ul>

    <!-- <div class="fly-none">没有相关数据</div> -->

    <div style="text-align: center">
      <div class="laypage-main">
      	<?php if($page > 1): ?><a href="<?php echo U('Article/index',array('t'=>$ac,'page'=>$page-1));?>">上一页</a>
       	 	<a href="<?php echo U('Article/index',array('t'=>$ac,'page'=>1));?>" title="首页">首页</a><?php endif; ?>
      	<?php $__FOR_START_2007353338__=1;$__FOR_END_2007353338__=$total+1;for($i=$__FOR_START_2007353338__;$i < $__FOR_END_2007353338__;$i+=1){ if($page != $i): ?><a href="<?php echo U('Article/index',array('t'=>$ac,'page'=>$i));?>"><?php echo ($i); ?></a>
					<?php else: ?>
					<span class="laypage-curr"><?php echo ($i); ?></span><?php endif; } ?>
        <?php if($page < $total): ?><a href="<?php echo U('Article/index',array('t'=>$ac,'page'=>$total));?>" title="尾页">尾页</a>
        <a href="<?php echo U('Article/index',array('t'=>$ac,'page'=>$page+1));?>">下一页</a><?php endif; ?>
      </div>
    </div>

  </div>
</div>

    
    <div class="layui-col-md4">

      <div class="fly-panel">
        <h3 class="fly-panel-title">博主信息</h3>
        <ul class="fly-panel-main fly-list-one">
        	<li>姓名： xxx</li>
        	<li>职业： web前端开发</li>
        	<li>邮箱： xxx@qq.com</li>
        	<li>定位： 杭州</li>
        </ul>
      </div>
      
      <dl class="fly-panel fly-list-one">
        <dt class="fly-panel-title">热门推荐</dt>
        <?php if(count($hotList) < 1): ?><div class="fly-none">没有相关数据</div>
        <?php else: ?>
	        <?php if(is_array($hotList)): foreach($hotList as $key=>$v): ?><dd>
	          <a href="<?php echo U('Article/detail',array('id'=>$v['aid']));?>"><?php echo ($v['title']); ?></a>
	          <span><i class="iconfont icon-pinglun1"></i> <?php echo ($v['count']); ?></span>
	        </dd><?php endforeach; endif; endif; ?>
      </dl>
      
      <dl class="fly-panel fly-list-one">
        <dt class="fly-panel-title">点击排行</dt>
        <?php if(count($hot) < 1): ?><div class="fly-none">没有相关数据</div>
        <?php else: ?>
	        <?php if(is_array($hot)): foreach($hot as $key=>$v): ?><dd>
	          <a href="<?php echo U('Article/detail',array('id'=>$v['id']));?>"><?php echo ($v['title']); ?></a>
	          <span><i class="iconfont icon-liulanyanjing"></i> <?php echo ($v['click_num']); ?></span>
	        </dd><?php endforeach; endif; endif; ?>
      </dl>

      <div class="fly-panel fly-link">
        <h3 class="fly-panel-title">友情链接</h3>
        <dl class="fly-panel-main">
        	
          <dd><a href="##">百度</a><dd>
          <dd><a href="##">天猫</a><dd>
          <dd><a href="##">淘宝</a><dd>
          <dd><a href="##">京东</a><dd>
        </dl>
      </div>

      <div class="fly-panel fly-rank fly-rank-reply" id="LAY_replyRank">
        <h3 class="fly-panel-title">最近访客</h3>
        <dl>
          <?php if(count($users) > 0): if(is_array($users)): foreach($users as $key=>$v): ?><dd>
            <a href="<?php echo U('User/personal', array('id'=> $v['id']));?>">
              <img src="/day05/Public/Admin/images/<?php echo ($v['avatar']); ?>"><cite><?php echo ($v['nickname']); ?></cite>
            </a>
          </dd><?php endforeach; endif; ?>
          <?php else: ?>
          <dd>
            暂无访客
          </dd><?php endif; ?>
        </dl>
      </div>
    </div>
    
  </div>
</div>


<div class="fly-footer">
  
</div>

	

<script src="/day05/Public/Home/layui/layui.js"></script>
<script src="/day05/Public/Home/js/jquery-1.11.3.min.js"></script>
<script>
layui.cache.page = '';
layui.cache.user = {
  username: '游客'
  ,uid: -1
  ,avatar: '/day05/Public/Home/images/avatar/00.jpg'
  ,experience: 83
  ,sex: '男'
};

layui.config({
    version: "3.0.0"
    ,base: '/day05/Public/Home/js/'
}).extend({
    fly: 'index'
}).use(['fly', 'face'], function(){
    var $ = layui.$
        ,fly = layui.fly;
    //如果你是采用模版自带的编辑器，你需要开启以下语句来解析。
    /*
    $('.detail-body').each(function(){
      var othis = $(this), html = othis.html();
      othis.html(fly.content(html));
    });
    */
});




</script>

</body>
</html>