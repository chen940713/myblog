<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	
	/**
	 * 主页初始化数据
	 */
    public function index(){
    	
		$article = M('article');
		$articleList = $article->order('insert_at desc')->limit('0,10')->select();
		$this->assign('article', $articleList);
		
		$reply = M('reply');
		$res = $reply->query("select COUNT(r.id) count,r.aid,a.title from reply r,article a WHERE r.aid = a.id GROUP BY r.aid ORDER BY count desc");
		$this->assign('hotList', $res);
		$this->assign('reply', $reply);
		
		$clickList = $article->order('click_num desc')->limit('0,10')->select();
        $this->assign('hot',$clickList);
		
		$user = M('users');
        $userList = $user->query("select * from users order by last_login desc limit 0,8");
        $this->assign('users',$userList);

        $this->display('Index/index');
    }
	
    public function info(){

        //session 设置方式
        session('sid', 10);
        var_dump(session());

        //cookie 设置方式
        cookie('cid', 20);
        var_dump(cookie());

        //获取 post 参数
        $res1 = I('post.username');
        $res2 = $_POST['username'];
//        var_dump($res1);
//        var_dump($res2);

        //获取 get 参数
        $res1 = I('get.username');
        $res2 = $_GET['username'];
//        var_dump($res1);
//        var_dump($res2);

        //获取session信息
        $res1 = I('session.sid');
        $res2 = session('sid');
        $res3 = $_SESSION['sid'];
//        var_dump($res1);
//        var_dump($res2);
//        var_dump($res3);

        //获取cookie信息
        $res1 = I('cookie.cid');
        $res2 = cookie('cid');
        $res3 = $_COOKIE['cid'];
//        var_dump($res1);
//        var_dump($res2);
//        var_dump($res3);

        //获取 server 信息
        $res1 = I('server.HTTP_REFERER');
        $res2 = $_SERVER['HTTP_REFERER'];
//        var_dump($res1);
//        var_dump($res2);

        //清除 session 信息
        unset($_SESSION['sid']);
        session('sid', null);

        //清除 cookie 信息
//        unset($_COOKIE['cid']);       //不能删除 cookie 信息
//        setcookie('cid','');          //不能删除 cookie 信息
        cookie('cid', null);          //可以删除 cookie 信息

        //获取 session 和 cookie 所有信息
        var_dump(session());
        var_dump(cookie());
    }
}