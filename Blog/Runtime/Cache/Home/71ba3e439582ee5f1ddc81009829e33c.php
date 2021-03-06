<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>博客</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="/day05/Public/Home/layui/css/layui.css">
  <link rel="stylesheet" href="/day05/Public/Home/css/global.css">
  
<link rel="stylesheet" type="text/css" href="/day05/Public/Home/css/H-ui.min.css"/>
<link rel="stylesheet" type="text/css" href="/day05/Public/Home/css/timeline.css"/>

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
      <li class="layui-nav-item layui-this">
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
    
<section class="container">
    <div class="container-fluid">
        <div class="about" style="height: 780px;">
            <h2>Just about me</h2>
            <ul>
                <p>一枚正在努力进步的Web程序员。专长领域为Web开发、服务器端开发，目前正在向全栈工程师进发。。。</p>
            </ul>
            <h2>About my blog</h2>
            <ul>
                <p>域  名：xxx.com 注册于2017年02月02日</p>
                <p>服务器：腾讯云服务器 ，于2017年02月23日完成备案</p>
                <p>备案号：皖ICP备17002922号</p>
                <p>本站定位为IT技术博客站，博客内容主要涉及编程语言、前端开发、服务端开发及一些热门技术等方面，同时分享实用的学习和开发资料。</p>
            </ul>
            <h2>Contact  me</h2>
            <ul>
                <p>qq : *********暂不公开 : (</p>
                <p>git：<a href="https://git.oschina.net/wilco" class="blog_link" >https://git.oschina.net/wilco</a></p>
                <p>email : <a class="blog_link" href="mailto:wfyv@qq.com">wfyv@qq.com</a></p>
            </ul>
        </div>

    </div>
</section>

    
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