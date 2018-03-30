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
    
<div class="fly-panel fly-panel-user" pad20>
  <div class="layui-tab layui-tab-brief" lay-filter="user">
    <ul class="layui-tab-title">
      <li><a href="<?php echo U('User/login');?>">登入</a></li>
      <li class="layui-this">注册</li>
    </ul>
    <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
      <div class="layui-tab-item layui-show">
        <div class="layui-form layui-form-pane">
          <form action="<?php echo U('User/reg');?>" method="post">
            <div class="layui-form-item">
              <label for="L_username" class="layui-form-label" style="color: #333;">昵称</label>
              <div class="layui-input-inline">
                <input type="text" id="L_username" name="nickname" required lay-verify="required" autocomplete="off" class="layui-input">
              </div>
            </div>
            <div class="layui-form-item">
              <label for="L_pass" class="layui-form-label" style="color: #333;">密码</label>
              <div class="layui-input-inline">
                <input type="password" id="L_pass" name="password" required lay-verify="required" autocomplete="off" class="layui-input">
              </div>
            </div>
            <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label" style="color: #333;">确认密码</label>
              <div class="layui-input-inline">
                <input type="password" id="L_repass" name="checkpass" required lay-verify="required" autocomplete="off" class="layui-input">
              </div>
            </div>
            <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label" style="color: #333;">手机号码</label>
              <div class="layui-input-inline">
                <input type="text" id="" name="phone" required lay-verify="required" autocomplete="off" class="layui-input">
              </div>
            </div>
            <div class="layui-form-item">
              <button class="layui-btn" type="submit">立即注册</button>
            </div>
          </form>
        </div>
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