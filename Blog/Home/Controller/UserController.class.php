<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
	
	public function register()
	{
		$this->display('User/register');
	}
	
	/**
	 *  用户注册功能
	 */
	public function reg()
	{
		$user = new Model('users');

		unset($_POST['checkpass']);
		$_POST['password'] = md5($_POST['password']);
		
		if($user->add($_POST)){
			$this->tips('添加成功!',2,'./index.php?c=user&a=login','success');				
		}else{
			$this->tips('添加失败!',2,'./index.php?c=user&a=register','error');				
		}
	}
	
	/**
	 *  用户登入功能
	 */
	public function log_in()
	{
		$user = M('users');
		$nickname = I("post.nickname");

		$res = $user->where("nickname = '{$nickname}'")->select();
		if($res && $res[0]['password'] == md5($_POST['password'])){

			// 将用户登入的相关信息更新到数据库
            date_default_timezone_set('PRC');
            $lastLogin = date('Y-m-d H:i:s');
			$id = $res[0]['id'];
			$data['last_login'] = $lastLogin;
			$data['id'] = $id;
			$user->save($data);
			
			// session中添加登入用户信息
			session('username', $_POST['nickname']);
			session('userid', $res[0]['id']);
			session('img', $res[0]['avatar']);
			
			$this->success('登入成功', I("post.back"), 2);
		}else{
			$this->error('登入失败', I('server.HTTP_REFERER'), 2);
		}
	}
	
	/**
	 *  用户退出登入
	 */
	public function logout()
	{
        $user = M('users');
        date_default_timezone_set('PRC');
        $lastLogout = date('Y-m-d H:i:s');
		$data['last_logout'] = $lastLogout;
		$data['id'] = session('userid');
		$user->save($data);
	
		// 清楚seesion中用户的信息
		session('username', null);
		session('userid', null);
		session('img', null);
	
		$this->success('退出成功', I("server.HTTP_REFERER"),2);
	}
	
	/**
	 * 	用户给用户留言的页面跳转
	 */
	public function replymsg(){
		
		if(!isset($_SESSION['username'])){
			$this->error('抱歉，您还未登入,去登入', U("User/login"), 2);
			die;
		}
		$this->assign('id', I("get.id"));
		$this->display('User/replymsg');
	}
	
	/**
	 *  用户给网站留言
	 */
	public function domsg(){
		
		if(!isset($_SESSION['username'])){
			$this->error('抱歉，您还未登入,去登入', U("User/login"), 2);
			die;
		}
		
		$comm = M('comment');
		
		$res = $comm->add($_POST);
		if($res){
			$this->success('留言成功', U("User/msg"), 2);
		}else{
			$this->error('留言失败', U("User/msg"), 2);
		}
	}
	
	/**
	 *  用户回复其他用户的留言
	 */
	public function domsg2(){
		
		$comm = M('comment');
		
		$res = $comm->add($_POST);
		if($res){
			$this->success('回复成功', U("User/msg"), 2);
		}else{
			$this->error('回复失败', U("User/msg"), 2);
		}
	}
	
	/**
	 *  用户登入页跳转
	 */
    public function login()
	{
	    if(isset($_GET['back'])){
            $this->assign('backurl',"http://localhost/day05/index.php/Home/Article/detail/id/{$_GET['back']}");
        }else{
            $this->assign('backurl', $_SERVER['HTTP_REFERER']);
        }
		$this->display('User/login');
	}
	
	/**
	 *  用户留言模块跳转，初始化
	 */
	public function msg(){
		
		$comm = M('comment');
		$arr = $comm->query("select c.*, u.nickname nickname, u.avatar avatar from comment c, users u where c.uid = u.id");
		$res = self::tree($arr);
		
		$this->assign('list', $res);
		
		$this->display('User/msg');
	}
	
	/**
	 *  将留言表进行整理
	 */
	public static function tree($array,$child="child", $pid = null)  
	{  
	    $temp = [];  
	    foreach ($array as $v) {  
	        if ($v['pid'] == $pid) {  
	            $v[$child] = self::tree($array,$child,$v['id']);  
	            $temp[] = $v;  
	        }  
	    }  
	    return $temp;  
	}
	
	public function personal()
	{
		$id = I("get.id");
		$user = M('users');
		$data = $user->find($id);
		$time = explode(' ', $data['register_at'])[0];
		$this->assign('time', $time);
		
		$reply = M('reply');
		$replyList = $reply->query("select r.*, a.* from reply r, article a where r.aid = a.id and r.uid = {$id} order by r.reply_at desc limit 0,7");
		
		$this->assign('data', $data);
		$this->assign('reply', $replyList);
		$this->display('User/personal');
		
	}
}