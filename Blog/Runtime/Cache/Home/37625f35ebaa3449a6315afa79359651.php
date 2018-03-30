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
      <li class="layui-nav-item ">
        <a href="<?php echo U('Article/index');?>"><i class="iconfont icon-wenda"></i>学无止境</a>
      </li>
      <li class="layui-nav-item ">
        <a href="<?php echo U('User/msg');?>"><i class="iconfont icon-renshu"></i>留言板</a>
      </li>
    </ul>
    
    
    <ul class="layui-nav fly-nav-user">
    	<?php if($_SESSION['userid']== ''): ?><!-- 未登入的状态 -->
      <li class="layui-nav-item">
        <a class="iconfont icon-touxiang layui-hide-xs" href="user/login.html"></a>
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
    
<div class="fly-home fly-panel" style="background-image: url();">
  <img src="/day05/Public/Admin/images/<?php echo ($data["avatar"]); ?>" alt="<?php echo ($data["nickname"]); ?>">
  <h1>
    <?php echo ($data["nickname"]); ?>
  </h1>


  <p class="fly-home-info">
    <i class="iconfont icon-shijian"></i><span><?php echo ($time); ?> 加入</span>
    <i class="iconfont icon-chengshi"></i><span>来自杭州</span>
  </p>

  <p class="fly-home-sign">（人生仿若一场修行）</p>

</div>
<div class="layui-container">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md6 fly-home-jie">
      <div class="fly-panel">
        <h3 class="fly-panel-title"><?php echo ($data["nickname"]); ?> 最近的回复</h3>
        <ul class="jie-row">
        <?php if(is_array($reply)): foreach($reply as $key=>$v): ?><li>
            <a href="<?php echo U('Article/detail', array('id'=> $v['aid']));?>" class="jie-title"> <?php echo ($v['title']); ?></a><br />
            <i>回复于 <?php echo ($v['reply_at']); ?></i>
            <em class="layui-hide-xs"><?php echo ($v['click_num']); ?>阅</em>
          </li><?php endforeach; endif; ?>
          <!-- <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><i style="font-size:14px;">没有发表任何求解</i></div> -->
        </ul>
      </div>
    </div>
    
    <div class="layui-col-md6 fly-home-da">
      <div class="fly-panel">
        <h3 class="fly-panel-title"><?php echo ($data["nickname"]); ?> 最近动态</h3>
        <ul class="home-jieda">
           <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><span>没有动态</span></div> 
        </ul>
      </div>
    </div>
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